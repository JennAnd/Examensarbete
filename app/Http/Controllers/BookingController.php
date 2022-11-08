<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\UserYogaclass;
use App\Models\Yogaclass;

class BookingController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {

        // TO BOOK A CLASS
        $user = Auth::user();
        $yogaclassId = (int)$request->get('id');
        // var_dump($user->id);
        // var_dump((int)$request->get('id'));

        $book = new UserYogaclass([
            'yogaclass_id' => $yogaclassId,
            'user_id' => $user->id
        ]);

        $book->save();

        // CHANGE TOTAL AMOUNT CLASSES LEFT

        $userId = $user->id;
        $currentTotalClasses = $user->total_classes;
        $thisUser = User::find($userId);
        $thisUser->total_classes = $currentTotalClasses - 1;
        $thisUser->update();

        // Change Yogaclass availability and reserved
        $yogaclass = Yogaclass::find($yogaclassId);
        $currentAvailable = $yogaclass->available;
        $currentReserved = $yogaclass->reserved;
        $yogaclass->available = $currentAvailable - 1;
        $yogaclass->reserved = $currentReserved + 1;
        $yogaclass->update();

        return redirect('dashboard');
    }
}
