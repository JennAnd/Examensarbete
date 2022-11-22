<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Membership;

class AdminMembershipsController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {

        $memberships = Membership::select('*')->get();
        return view('adminmemberships', [
            'memberships' => $memberships
        ]);
    }

    public function confirmDeleteMembershipView()
    {

        $memberships = Membership::select('*')->get();
        $chosenMembership = Membership::find($_GET['membership_id']);

        return view('admindeletemembership', [
            'memberships' => $memberships,
            'chosen_membership' => $chosenMembership
        ]);
    }
}
