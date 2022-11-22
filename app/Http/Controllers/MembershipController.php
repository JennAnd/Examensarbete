<?php

namespace App\Http\Controllers;

use App\Models\Membership;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MembershipController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {

        $membership = new Membership([
            'type' => $request->get('type'),
            'price' => $request->get('price'),
            'amount_classes' => $request->get('amount_classes'),

        ]);

        $membership->save();
        return redirect('adminmemberships')->with('message', "You have created a membership.");
    }

    public function deleteMembership(Request $request)
    {
        $membershipId = $request->get('membership_id');
        Membership::select('*')->where('id', $membershipId)->delete();

        return redirect('adminmemberships')->with('message', "You have deleted a membership.");
    }

    public function showMemberships()
    {
        $memberships = Membership::select('*')->get();

        return view('memberships', [
            'memberships' => $memberships,
        ]);
    }

    public function editContactInfo(Request $request)
    {
        $user = User::find(Auth::user()->id);
        $user->firstname = $request->get('firstname');
        $user->lastname = $request->get('lastname');
        $user->email = $request->get('email');
        $user->address = $request->get('address');
        $user->postal_code = $request->get('postal_code');
        $user->city = $request->get('city');
        $user->country = $request->get('country');
        $user->update();

        return redirect()->back()->with('message', "You've successfully updated your contact information.");
    }
}
