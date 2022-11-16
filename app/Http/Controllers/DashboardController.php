<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\UserYogaclass;
use App\Models\Yogaclass;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        $user = Auth::user();
        $id = $user->id;


        $yogaclasses = Yogaclass::select('*')
            ->orderBy('date', 'ASC')->orderBy('time', 'ASC')->get();
        $bookedYogaclasses = Auth::user()->yogaclasses;
        // $notBookedYogaclasses = Yogaclass::doesntHave('users')->get();
        $notBookedYogaclasses = Yogaclass::whereNotIn('id', $bookedYogaclasses->pluck('id')->toArray())->orderBy('date', 'ASC')->orderBy('time', 'ASC')->get();
        // dd($bookedYogaclasses->only('id')->toArray());

        // Delete classes that expired

        // foreach ($yogaclasses as $yogaclass) {
        //     if (strtotime('now') >= strtotime($yogaclass->time)) {
        //         $expiredYogaclass = Yogaclass::find($yogaclass->id);
        //         $expiredYogaclass->delete();
        //     }
        // }

        // Fetch again after deleted yoga class
        $yogaclasses = Yogaclass::select('*')
            ->orderBy('date', 'ASC')->orderBy('time', 'ASC')->get();

        return view('dashboard', [
            'user' => $user,
            'yogaclasses' => $yogaclasses,
            'bookedYogaclasses' => $bookedYogaclasses,
            'notBookedYogaclasses' => $notBookedYogaclasses
        ]);
    }


    public function bookYogaclass(Request $request)
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

        return redirect('dashboard')->with('message', "Your yogaclass is booked");
    }

    public function cancelBookedYogaclass(Request $request)
    {

        // Cancel booked yogaclass
        $user =  Auth::user();
        $yogaclassId = (int)$request->get('id');
        // dd($yogaclassId);
        UserYogaclass::select('*')->where('yogaclass_id', $yogaclassId)->delete();

        // CHANGE TOTAL AMOUNT CLASSES LEFT
        $userId = $user->id;
        $currentTotalClasses = $user->total_classes;
        $thisUser = User::find($userId);
        $thisUser->total_classes = $currentTotalClasses + 1;
        $thisUser->update();

        // Change Yogaclass availability and reserved
        $yogaclass = Yogaclass::find($yogaclassId);
        $currentAvailable = $yogaclass->available;
        $currentReserved = $yogaclass->reserved;
        $yogaclass->available = $currentAvailable + 1;
        $yogaclass->reserved = $currentReserved - 1;
        $yogaclass->update();


        return redirect('dashboard')->with('message', "Your yoga class is cancelled.");
    }
}
