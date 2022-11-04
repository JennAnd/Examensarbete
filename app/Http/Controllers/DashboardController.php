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
            ->get();
        $bookedYogaclasses = UserYogaclass::select('*')->where('user_id', '=', $id)->get();
        // $availableYogaclasses = Yogaclass::select('*')->


        return view('dashboard', [
            'user' => $user,
            'yogaclasses' => $yogaclasses,
            'bookedYogaclasses' => $bookedYogaclasses
        ]);
    }
}
