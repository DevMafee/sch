<?php

namespace App\Http\Controllers;

use App\Setresult;
use Illuminate\Http\Request;

class SetresultController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index()
    {
        $all_grades = Setresult::all();
        return view('results.setresults',['all_grades'=>$all_grades]);
    }

    public function create(Request $request)
    {
        $data = new Setresult();
        $data->grade = $request->grade;
        $data->point_lowest = $request->point_lowest;
        $data->point_highest = $request->point_highest;
        $data->markrange_lowest = $request->markrange_lowest;
        $data->markrange_highest = $request->markrange_highest;
        $data->save();

        return redirect('/set-grades')->with('message','Grade Added Successfully!');
    }

    public function update(Request $request)
    {
        $data = Setresult::find($request->id);
        $data->grade = $request->grade;
        $data->point_lowest = $request->point_lowest;
        $data->point_highest = $request->point_highest;
        $data->markrange_lowest = $request->markrange_lowest;
        $data->markrange_highest = $request->markrange_highest;
        $data->save();

        return redirect('/set-grades')->with('message','Grade Updated Successfully!');
    }

    public function delete($id)
    {
        $data = Setresult::find($id);
        $data->delete();
        return redirect('/set-grades')->with('message','Grade Deleted Successfully!');
    }
}
