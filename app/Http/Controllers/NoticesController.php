<?php

namespace App\Http\Controllers;

use App\Notices;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class NoticesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index()
    {
        $notices = Notices::all();
        return view('notice.home',['notices'=>$notices]);
    }

    public function create(Request $request)
    {
        $notice_file = $request->file('notice_file');
        $extension = $notice_file->getClientOriginalExtension();
        $fileName = 'notice-'.time().'.'.$extension;
        $notice_file->move('notices/',$fileName);

        $data = new Notices();
        $data->notice_title = $request->notice_title;
        $data->notice_description = $request->notice_description;
        $data->notice_file = $fileName;
        $data->save();
        return redirect('/allnotices')->with('message','New Notice Added Successfully!');
    }

    public function show(Notices $notices)
    {
        //
    }

    public function update(Request $request)
    {
        $data = Notices::find($request->id);

        $notice_file = $request->file('notice_file');
        
        if ($notice_file != '') {
            Storage::delete('notices/'.$data->notice_file);
            $extension = $notice_file->getClientOriginalExtension();
            $fileName = 'notice-'.time().'.'.$extension;
            $notice_file->move('notices/',$fileName);
            $data->notice_title = $request->notice_title;
            $data->notice_description = $request->notice_description;
            $data->notice_file = $fileName;
        }else{
            $data->notice_title = $request->notice_title;
            $data->notice_description = $request->notice_description;
        }

        $data->save();

        return redirect('/allnotices')->with('message','Notice Updated Successfully!');
    }

    public function delete($id)
    {
        $data = Notices::find($id);
        Storage::delete('notices/'.$data->notice_file);
        $data->delete();
        return redirect('/allnotices')->with('message','Notice Deleted Successfully!');
    }
}
