<?php

namespace App\Http\Controllers;

use App\Session;
use Illuminate\Http\Request;

class SessionController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $sessions = Session::all();
        return view('dashboard.sessions',['sessions'=>$sessions]);
    }

    public function create(Request $request)
    {
        $data = new Session();
        $data->sessions_name = $request->sessions_name;

        $data->save();

        return redirect('/sessions')->with('message','Session Added Successfully!');
    }

    public function update(Request $request)
    {
        $data = Session::find($request->id);
        $data->sessions_name = $request->sessions_name;
        $data->save();

        return redirect('/sessions')->with('message','Session Updated Successfully!');
    }

    public function delete($id)
    {
        $data = Session::find($id);
        $data->delete();
        return redirect('/sessions')->with('message','Session Deleted Successfully!');
    }
}
