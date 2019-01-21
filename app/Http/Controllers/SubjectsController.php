<?php

namespace App\Http\Controllers;

use App\Subjects;
use Illuminate\Http\Request;

class SubjectsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $subjects = Subjects::all();
        return view('subjects.home',['subjects'=>$subjects]);
    }

    public function create(Request $request)
    {
        $data = new Subjects();
        $data->subject_name = $request->subject_name;
        $data->subject_code = $request->subject_code;
        $data->subject_type = $request->subject_type;
        $data->subject_class = $request->subject_class;
        $data->subject_mark = $request->subject_mark;
        $data->subject_pass_mark = $request->subject_pass_mark;
        $data->save();
        return redirect('/subjects')->with('message','Subject Added Successfully!');
    }

    public function update(Request $request)
    {
        $data = Subjects::find($request->id);
        $data->subject_name = $request->subject_name;
        $data->subject_code = $request->subject_code;
        $data->subject_type = $request->subject_type;
        $data->subject_class = $request->subject_class;
        $data->subject_mark = $request->subject_mark;
        $data->subject_pass_mark = $request->subject_pass_mark;
        $data->save();

        return redirect('/subjects')->with('message','Subject Updated Successfully!');
    }

    public function delete($id)
    {
        $data = Subjects::find($id);
        $data->delete();
        return redirect('/subjects')->with('message','Subject Deleted Successfully!');
    }
}
