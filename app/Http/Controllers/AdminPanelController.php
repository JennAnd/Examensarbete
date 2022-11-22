<?php

namespace App\Http\Controllers;

use App\Models\Membership;
use App\Models\Yogaclass;
use Illuminate\Http\Request;

class AdminPanelController extends Controller
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
            ->orderBy('datetime', 'ASC')->get();


        $memberships = Membership::select('*')->get();
        return view('adminpanel', [
            'yogaclasses' => $yogaclasses,
            'memberships' => $memberships
        ]);
    }
    public function adminDeleteYogaclassView()
    {

        $yogaclasses = Yogaclass::select('*')
            ->orderBy('datetime', 'ASC')->get();

        $memberships = Membership::select('*')->get();

        $chosenYogaclass = Yogaclass::find($_GET['yogaclass_id']);

        return view('admindeleteyogaclass', [
            'yogaclasses' => $yogaclasses,
            'memberships' => $memberships,
            'chosen_yogaclass' => $chosenYogaclass
        ]);
    }
}
