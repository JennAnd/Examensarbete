<?php

namespace App\Http\Controllers;

use App\Models\Yogaclass;
use Illuminate\Http\Request;

class SchemeController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        $yogaclasses = Yogaclass::select('*')
            ->get();


        return view('scheme', ['yogaclasses' => $yogaclasses]);
    }
}
