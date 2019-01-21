<?php

namespace App\Http\Controllers;

use App\StudentRegistrations;
use App\Session;
use App\Classes;
use App\Sections;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class StudentRegistrationsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index()
    {
        $classes_data = Classes::all();
        $session_data = Session::all();
        $sections_data = Sections::all();

        $registrations = DB::table('student_registrations')
                        ->join('sessions','sessions.id','=','sessions_id')
                        ->join('classes','classes.id','=','classes_id')
                        ->join('sections','sections.id','=','sections_id')
                        ->select('student_registrations.*','sessions.id as stusent_session_id','sessions.sessions_name as stusent_session','classes.id as student_class_id','classes.classes_name as student_class','sections.id as student_section_id','sections.sections_name as student_section')
                        ->simplePaginate(10);
        return view('dashboard.new-registration',[
                                                    'registrations'=>$registrations,
                                                    'classes_data'=>$classes_data,
                                                    'sessions_data'=>$session_data,
                                                    'sections_data'=>$sections_data
                                                ]);

    }

    public function create(Request $request)
    {
        $data = new StudentRegistrations();
        $data->reg_no = $request->reg_no;
        $data->sessions_id = $request->sessions_id;
        $data->classes_id = $request->classes_id;
        $data->sections_id = $request->sections_id;
        $data->student_name = $request->student_name;
        $data->student_dob = $request->student_dob;
        $data->student_gender = $request->student_gender;
        $data->student_phone = $request->student_phone;
        $data->student_address1 = $request->student_address1;
        $data->student_address2 = $request->student_address2;
        $data->email = $request->email;
        $data->password = Hash::make($request->password);

        $data->save();
        return redirect('/new-registration')->with('message','Student Registration was Successful!');
        // dd($request);
    }


    public function delete($id)
    {
        $data = StudentRegistrations::find($id);
        $data->delete();
        return redirect('/new-registration')->with('message','Registration Deleted Successfully!');
    }
}
