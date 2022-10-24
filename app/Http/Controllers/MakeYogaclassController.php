<?php

namespace App\Http\Controllers;

use App\Models\Yogaclass;
use Illuminate\Http\Request;

class MakeYogaclassController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        // $this->validate($request, [
        //     'class_name' => 'required|string',
        //     'teacher' => 'required|string',
        //     'date' => 'required|date',
        //     'time' => 'required|time',
        //     'class-length' => 'required|string',
        //     'available' => 'required|integer',
        // ]);

        $yogaclass = new Yogaclass([
            'class_name' => $request->get('class_name'),
            'teacher' => $request->get('teacher'),
            'date' => $request->get('date'),
            'time' => $request->get('time'),
            'length' => $request->get('class-length'),
            'available' => $request->get('available'),
            'reserved' => $request->get('reserved'),
        ]);

        $yogaclass->save();
        return redirect('adminpanel');
    }
}
