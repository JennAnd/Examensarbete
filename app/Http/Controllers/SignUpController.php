<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class SignUpController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        $this->validate($request, [
            'firstname' => 'required|string',
            'lastname' => 'required|string',
            'email' => 'required|email',
            'password' => 'required|confirmed|min:8',
            'address' => 'required|string',
            'postal_code' => 'required|integer',
            'city' => 'required|string',
            'country' => 'required|string',
        ]);

        $user = new User([
            'firstname' => $request->get('firstname'),
            'lastname' => $request->get('lastname'),
            'email' => $request->get('email'),
            'password' => Hash::make($request['password']),
            'address' => $request->get('address'),
            'postal_code' => $request->get('postal_code'),
            'city' => $request->get('city'),
            'country' => $request->get('country'),

        ]);

        $user->save();
        return redirect('login')->with('message', "You've successfully created an account. Please, login.");

        // $user = User::create(['firstname' => $request['firstname'], 'lastname' => $request['lastname'], 'email' => $request['email'], 'password' => Hash::make($request['password'])]);
        // return redirect('dashboard');
    }
}
