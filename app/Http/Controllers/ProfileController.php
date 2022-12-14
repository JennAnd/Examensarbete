<?php

namespace App\Http\Controllers;

use App\Models\Invoice;
use App\Models\Membership;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

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
            'user' => $user
        ]);
    }


    public function buyMembership(Request $request)
    {
        //first check if password is correct to this authorised user
        $passwordToCheck = $request->get('password');
        $userId = Auth::user()->id;
        $user = User::find($userId);
        if (Hash::check($passwordToCheck, $user->password)) {
            // Success


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
                'firstname' => $user->firstname,
                'lastname' => $user->lastname,
                'address' => $user->address,
                'postal_code' => $user->postal_code,
                'city' => $user->city,
                'country' => $user->country
            ]);
            $invoice->save();

            return redirect('payments')->with('message', "You've successfully purchased yoga classes. You can see your invoice to the right and find your balance in 'My profile'");
        } else {
            return redirect()->back()->with('message', "You've provided the wrong password. Please try again.");
        }
    }

    public function profileConfirmView()
    {
        $user = Auth::user();

        if ($user->address) {
            $memberships = Membership::select('*')
                ->get();
            $total_classes = $user->total_classes;
            $membership = Membership::find($_GET['hidden-input-id']);

            return view('profileconfirm', [
                'memberships' => $memberships,
                'total_classes' => $total_classes,
                'user' => $user,
                'membership' => $membership
            ]);
        } else {
            return redirect()->back()->with('message', "You have to complete your contact information before purchase.");
        }
    }

    public function confirmMembershipView()
    {
        $user = Auth::user();
        $memberships = Membership::select('*')
            ->get();
        $total_classes = $user->total_classes;
        $chosenMembership = Membership::find($_GET['hidden-input-id']);
        // dd($chosenMembership);

        return view('confirmmembership', [
            'memberships' => $memberships,
            'total_classes' => $total_classes,
            'user' => $user,
            'chosen_membership' => $chosenMembership
        ]);
    }
}
