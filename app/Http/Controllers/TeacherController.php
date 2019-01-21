<?php

namespace App\Http\Controllers;

use App\Teacher;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class TeacherController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $teachers = Teacher::all();

        return view('dashboard.teachers',['teachers'=>$teachers]);
    }

    public function create(Request $request)
    {
        $photo = $request->file('photo');
        $extension = $photo->getClientOriginalExtension();
        $fileName = 'teacher-'.time().'.'.$extension;
        $photo->move('public/teachers/',$fileName);

        $data = new Teacher();
        $data ->name = $request->name;
        $data ->sex = $request->sex;
        $data ->religion = $request->religion;
        $data ->blood_group = $request->blood_group;
        $data ->phone = $request->phone;
        $data ->photo = $fileName;
        $data ->address = $request->address;
        $data ->email = $request->email;
        $data->password = Hash::make($request->password);
        $data->save();

        return redirect('/teachers')->with('message','Teacher Added Successfully!');
    }

    public function update(Request $request)
    {
        $photo = $request->file('photo');

        $data = Teacher::find($request->id);
        
        if ($photo != '') {
            
            if (file_exists('public/teachers/'.$data->photo)) {
                Storage::delete('public/teachers/'.$data->photo);
            }
            $extension = $photo->getClientOriginalExtension();
            $fileName = 'teacher-'.time().'.'.$extension;
            $photo->move('public/teachers/',$fileName);
            $data ->name = $request->name;
            $data ->sex = $request->sex;
            $data ->religion = $request->religion;
            $data ->blood_group = $request->blood_group;
            $data ->phone = $request->phone;
            $data ->photo = $fileName;
            $data ->address = $request->address;
        }else{
            $data ->name = $request->name;
            $data ->sex = $request->sex;
            $data ->religion = $request->religion;
            $data ->blood_group = $request->blood_group;
            $data ->phone = $request->phone;
            $data ->address = $request->address;
        }
        $data->save();
        return redirect('/teachers')->with('message','Teacher Information Updated Successfully!');
    }

    public function delete($id)
    {
        $data = Teacher::find($id);
        $data->delete();
        return redirect('/teachers')->with('message','Teacher Deleted Successfully!');
    }
}
