<?php

namespace App\Http\Controllers;

use App\Models\Invoice;
use App\Models\Membership;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        $memberships = Membership::select('*')
            ->get();

        $user = Auth::user();
        $total_classes = $user->total_classes;


        return view('profile', [
            'memberships' => $memberships,
            'total_classes' => $total_classes,
        ]);
    }

    public function buyMembership(Request $request)
    {

        // Change amount of classes this user have in account
        $user = Auth::user();
        $userId = $user->id;
        $currentTotalClasses = $user->total_classes;
        $thisUser = User::find($userId);
        $thisUser->total_classes = $currentTotalClasses + (int)$request->input('amount_classes');
        $thisUser->update();

        // Fetch membership_price based on membership_id
        $membershipId = $request->get('membership_id');
        $membership = Membership::find($membershipId);
        $membershipPrice = $membership->price;
        $totalPrice = $membershipPrice * 1.2;
        // Make invoice
        $d = strtotime('+30 Days');
        $dueDate = date("Y-m-d", $d);
        $invoice = new Invoice([
            'user_id' => $userId,
            'membership_id' => $request->get('membership_id'),
            'due_date' => $dueDate,
            'total_amount' => $totalPrice,
        ]);
        $invoice->save();

        return redirect('payments')->with('message', "You've successfully purchased yoga classes. You can see your invoice to the right and find your yogaclasses in 'My membership'");
    }
}
