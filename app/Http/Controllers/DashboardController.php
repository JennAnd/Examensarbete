<?php

namespace App\Http\Controllers;

use App\Models\UserYogaclass;
use App\Models\Yogaclass;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        $user = Auth::user();
        $id = $user->id;
        var_dump($id);

        $yogaclasses = Yogaclass::select('*')
            ->orderBy('date', 'ASC')->orderBy('time', 'ASC')->get();
        $bookedYogaclasses = UserYogaclass::select('*')->where('user_id', '=', $id)->join('yogaclasses', 'user_yogaclass.yogaclass_id', '=', 'yogaclasses.id')->orderBy('date', 'ASC')->orderBy('time', 'ASC')->get();
        // $availableYogaclasses = Yogaclass::select('*')->

        // Flytta bokade pass från schema till klasser när den är bokad
        // Hämta alla pass som INTE är bokade
        // $notBookedYogaclasses = Yogaclass::select('*')->where('user_id', '=', $id)->join('user_yogaclass', 'yogaclass.id', '=', 'user_yogaclass.yogaclass_id')->get();

        return view('dashboard', [
            'user' => $user,
            'yogaclasses' => $yogaclasses,
            'bookedYogaclasses' => $bookedYogaclasses
        ]);
    }
}
