<?php

namespace App\Http\Controllers;

use App\Models\Membership;
use App\Models\Yogaclass;
use Illuminate\Http\Request;

class AdminScheduleController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {

        $yogaclasses = Yogaclass::select('*')
            ->get();


        $memberships = Membership::select('*')->get();
        return view('adminpanel', [
            'yogaclasses' => $yogaclasses,
            'memberships' => $memberships
        ]);
    }
}
