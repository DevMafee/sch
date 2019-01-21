<?php

namespace App\Http\Controllers;

use App\Syllabus;
use App\Subjects;
use Illuminate\Http\Request;
use DB;
use App\Logos;

class SyllabusController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $syllabus = DB::table('syllabi')
                    ->join('subjects','subjects.id','=','syllabi.subject')
                    ->select('syllabi.*','subjects.subject_name as subject_name')
                    ->paginate(10);
        $subjects = Subjects::all();
        return view('syllabus.home',['syllabus'=>$syllabus,'subjects' => $subjects]);
    }

    public function create(Request $request)
    {
        $data = new Syllabus();
        $data->subject = $request->subject;
        $data->details = $request->details;
        $data->save();
        return redirect('/syllabus')->with('message','Syllabus Added Successfully!');
    }

    public function show(Syllabus $syllabus)
    {
        //
    }

    public function edit(Syllabus $syllabus)
    {
        //
    }

    public function update(Request $request)
    {
        $data = Syllabus::find($request->id);
        $data->subject = $request->subject;
        $data->details = $request->details;
        $data->save();

        return redirect('/syllabus')->with('message','Subject Updated Successfully!');
    }

    public function delete($id)
    {
        $data = Syllabus::find($id);
        $data->delete();
        return redirect('/syllabus')->with('message','Syllabus Deleted Successfully!');
    }

    public function idCardShow()
    {
        return view('idcard.home');
    }
}
