<?php

namespace App\Http\Controllers;

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
        $yogaclasses = Yogaclass::select('*')
            ->get();


        return view('dashboard', [
            'user' => $user,
            'yogaclasses' => $yogaclasses,
        ]);
    }
}
