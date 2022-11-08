<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\UserYogaclass;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CancelBookedYogaclassController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {

        // Cancel booked yogaclass
        $user =  Auth::user();
        $yogaclassId = (int)$request->get('id');

        UserYogaclass::select('*')->where('yogaclass_id', $yogaclassId)->delete();

        // CHANGE TOTAL AMOUNT CLASSES LEFT
        $userId = $user->id;
        $currentTotalClasses = $user->total_classes;
        $thisUser = User::find($userId);
        $thisUser->total_classes = $currentTotalClasses + 1;
        $thisUser->update();

        return redirect('dashboard');
    }
}
