<?php

namespace App\Http\Controllers;

use App\Models\Membership;
use Illuminate\Http\Request;

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
        return redirect('adminpanel')->with('message', "You have created a membership.");
    }

    public function deleteMembership(Request $request)
    {
        $membershipId = $request->get('membership_id');
        Membership::select('*')->where('id', $membershipId)->delete();

        return redirect()->back()->with('message', "You have deleted a membership.");
    }
}
