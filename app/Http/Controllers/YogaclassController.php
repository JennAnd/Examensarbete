<?php

namespace App\Http\Controllers;

use App\Models\Yogaclass;
use Illuminate\Http\Request;

class YogaclassController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {

        $yogaclass = new Yogaclass([
            'class_name' => $request->get('class_name'),
            'teacher' => $request->get('teacher'),
            'date' => $request->get('date'),
            'time' => $request->get('time'),
            'length' => $request->get('class-length'),
            'available' => $request->get('available'),
            'reserved' => 0,
        ]);

        $yogaclass->save();
        return redirect('adminpanel')->with('message', "You have created a yoga class.");
    }

    public function deleteYogaclass(Request $request)
    {
        $yogaclassId = $request->get('yogaclass_id');
        Yogaclass::select('*')->where('id', $yogaclassId)->delete();

        return redirect()->back()->with('message', "You have deleted a yoga class.");
    }
}
