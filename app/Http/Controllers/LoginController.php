<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {


        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            $userName = Auth::user()->firstname;


            $user = Auth::user();

            if ($user->total_classes == 0) {
                $message = "Welcome $user->firstname! You currently have 0 classes in your balance.In order to book a yoga class, please go to 'My profile' to buy classes.";
            } else {
                $message = "Welcome $user->firstname!";
            }


            return redirect()->intended('dashboard')->with('message', $message);
        }

        return back()->withErrors([
            'email' => 'Sign in to your account with your full login information',
        ])->onlyInput('email');
    }

    public function loginAdmin(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            $user = Auth::user();
            if ($user->is_admin) {
                return redirect()->intended('adminpanel');
            } else {
                Auth::logout();
                return redirect('/login')->with('message', 'Please login here instead.');
            }
        } else {

            return back()->withErrors([
                'email' => 'Sign in to your account with your full login information',
            ])->onlyInput('email');
        }
    }
}
