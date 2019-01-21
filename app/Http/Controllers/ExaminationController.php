<?php

namespace App\Http\Controllers;

use App\Examination;
use Illuminate\Http\Request;

class ExaminationController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $exams = Examination::all();
        return view('exam.exam',['exams'=>$exams]);
    }

    public function create(Request $request)
    {
        $data = new Examination();
        $data->name = $request->name;
        $data->exam_class = $request->exam_class;
        $data->exam_date = $request->exam_date;
        $data->comment = $request->comment;
        $data->save();
        return redirect('/exams')->with('message','Examination Added Successfully!');
    }

    public function update(Request $request, Examination $examination)
    {
        $data = Examination::find($request->id);
        $data->name = $request->name;
        $data->exam_class = $request->exam_class;
        $data->exam_date = $request->exam_date;
        $data->comment = $request->comment;
        $data->save();
        return redirect('/exams')->with('message','Examination Updated Successfully!');
    }

    public function delete($id)
    {
        $data = Examination::find($id);
        $data->delete();
        return redirect('/exams')->with('message','Examination Deleted Successfully!');
    }
}
