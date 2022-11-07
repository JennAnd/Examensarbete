<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class BuyMembershipController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {

        // Change amount of classes this user have in account
        $user = Auth::user();
        $userId = $user->id;
        $currentTotalClasses = $user->total_classes;
        $thisUser = User::find($userId);
        $thisUser->total_classes = $currentTotalClasses + (int)$request->input('amount_classes');
        $thisUser->update();

        // Make invoice


        return redirect('profile');
    }
}
