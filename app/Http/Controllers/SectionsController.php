<?php

namespace App\Http\Controllers;

use App\Sections;
use Illuminate\Http\Request;

class SectionsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $sections = Sections::all();
        return view('dashboard.sections',['sections'=>$sections]);
    }

    public function create(Request $request)
    {
        $data = new Sections();
        $data->sections_name = $request->sections_name;
        $data->sections_rank = $request->sections_rank;

        $data->save();

        return redirect('/sections')->with('message','Sections Added Successfully!');
    }

    public function update(Request $request)
    {
        $data = Sections::find($request->id);
        $data->sections_name = $request->sections_name;
        $data->sections_rank = $request->sections_rank;
        $data->save();

        return redirect('/sections')->with('message','Sections Updated Successfully!');
    }

    public function delete($id)
    {
        $data = Sections::find($id);
        $data->delete();
        return redirect('/sections')->with('message','Sections Deleted Successfully!');
    }
}
