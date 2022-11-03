<?php

namespace App\Http\Controllers;

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
        $user =  Auth::user();
        $yogaclassId = (int)$request->get('id');

        UserYogaclass::select('*')->where('yogaclass_id', $yogaclassId)->delete();
        return redirect('dashboard');
    }
}
