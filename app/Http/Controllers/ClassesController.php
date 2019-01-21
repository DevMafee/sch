<?php

namespace App\Http\Controllers;

use App\Classes;
use Illuminate\Http\Request;

class ClassesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $classes = Classes::all();
        return view('dashboard.classes',['classes'=>$classes]);
    }

    public function create(Request $request)
    {
        $data = new Classes();
        $data->classes_name = $request->classes_name;
        $data->classes_rank = $request->classes_rank;
        $data->save();
        return redirect('/classes')->with('message','Class Added Successfully!');
    }

    public function update(Request $request)
    {
        $data = Classes::find($request->id);
        $data->classes_name = $request->classes_name;
        $data->classes_rank = $request->classes_rank;
        $data->save();

        return redirect('/classes')->with('message','Class Updated Successfully!');
    }

    public function delete($id)
    {
        $data = Classes::find($id);
        $data->delete();
        return redirect('/classes')->with('message','Class Deleted Successfully!');
    }
}
