<?php

namespace App\Http\Controllers;

use App\Models\Membership;
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
}
