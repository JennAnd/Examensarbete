<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\UserYogaclass;

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

        $user = Auth::user();
        $yogaclassId = (int)$request->get('id');
        // var_dump($user->id);
        // var_dump((int)$request->get('id'));

        $book = new UserYogaclass([
            'yogaclass_id' => $yogaclassId,
            'user_id' => $user->id
        ]);

        $book->save();
        return redirect('dashboard');
    }
}
