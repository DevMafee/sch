<?php

namespace App\Http\Controllers;

use App\Feetype;
use Illuminate\Http\Request;

class FeetypeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $feetypes = Feetype::all();
        return view('accounts.fee-type',['feetypes'=>$feetypes]);
    }

    public function create(Request $request)
    {
        $data = new Feetype();
        $data->type_name = $request->type_name;
        $data->save();
        return redirect('/fee-type')->with('message','Fee Type Added Successfully!');
    }

    public function update(Request $request)
    {
        $data = Feetype::find($request->id);
        $data->type_name = $request->type_name;
        $data->save();
        return redirect('/fee-type')->with('message','Fee Type Updated Successfully!');
    }

    public function delete($id)
    {
        $data = Feetype::find($id);
        $data->delete();
        return redirect('/fee-type')->with('message','Fee Type Deleted Successfully!');
    }
}
