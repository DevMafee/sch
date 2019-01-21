<?php

namespace App\Http\Controllers;

use App\Disciplines;
use Illuminate\Http\Request;

class DisciplinesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index()
    {
        $disciplinies = Disciplines::all();
        return view('disciplinies.home',['disciplinies'=>$disciplinies]);
    }

    public function create()
    {
        return view('disciplinies.createDisciplin');
    }

    public function store(Request $request)
    {
        // dd($request);
        $data = new Disciplines();
        $data->disciplines_title = $request->disciplines_title;
        $data->disciplines_description = $request->disciplines_description;
        $data->save();

        return redirect('/disciplines')->with('message','Discipline Added Successfully!');
    }

    public function showSingle($id)
    {
        //
    }

    public function edit(Request $request)
    {
        //
    }

    public function update(Request $request)
    {
        $data = Disciplines::find($request->id);
        $data->disciplines_title = $request->disciplines_title;
        $data->disciplines_description = $request->disciplines_description;
        $data->save();

        return redirect('/disciplines')->with('message','Discipline Updated Successfully!');
    }

    public function delete($id)
    {
        // Disciplines::destroy($id);
        $data = Disciplines::find($id);
        $data->delete();
        return redirect('/disciplines')->with('message','Discipline Deleted Successfully!');
    }
}
