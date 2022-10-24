<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Yogaclass;

class UserSchemeController extends Controller

{
    public function showClasses()
    {
        $yogaclasses = Yogaclass::select('*')
            ->get();

        return view('scheme', ['yogaclasses' => $yogaclasses]);
    }
}
