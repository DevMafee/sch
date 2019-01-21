<?php

namespace App\Http\Controllers;

use App\Students;
use App\Session;
use App\Classes;
use App\Sections;
use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class StudentsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $students = DB::table('students')
                        ->join('sessions','sessions.id','=','session_id')
                        ->join('classes','classes.id','=','class_id')
                        ->join('sections','sections.id','=','section_id')
                        ->select('students.*','sessions.sessions_name as stusent_session','classes.classes_name as student_class','sections.sections_name as student_section')
                        ->paginate(10);
        return view('students.home',['students'=>$students]);
    }

    public function create()
    {
        $classes_all = Classes::all();
        $sessions_all = Session::all();
        $sections_all = Sections::all();
        return view('students.create',['classes_all'=>$classes_all,'sessions_all'=>$sessions_all,'sections_all'=>$sections_all]);
    }

    public function store(Request $request)
    {
        $photo = $request->file('photo');
        $extension = $photo->getClientOriginalExtension();
        $fileName = 'student-'.time().'.'.$extension;
        $photo->move('public/students/',$fileName);

        $data = new Students();
        $data->reg_no = $request->reg_no;
        $data->name = $request->name;
        $data->birthday = $request->birthday;
        $data->gender = $request->gender;
        $data->address1 = $request->address1;
        $data->address2 = $request->address2;
        $data->phone = $request->phone;
        $data->email = $request->email;
        $data->password = Hash::make($request->password);
        $data->session_id = $request->session_id;
        $data->class_id = $request->class_id;
        $data->section_id = $request->section_id;
        $data->photo = $fileName;

        $data->save();
        return redirect('/all-students')->with('message','Student Admission was Successful!');
    }

    public function edit($id)
    {
        $student = Students::find($id);
        $classes_all = Classes::all();
        $sessions_all = Session::all();
        $sections_all = Sections::all();
        return view('students.edit',
                        ['classes_all'=>$classes_all,
                        'sessions_all'=>$sessions_all,
                        'sections_all'=>$sections_all,
                        'student'=>$student]);
    }

    public function update(Request $request)
    {
        $photo = $request->file('photo');

        $data = Students::find($request->id);
        
        if ($photo != '') {
            
            if (file_exists('public/students/'.$data->photo)) {
                Storage::delete('public/students/'.$data->photo);
            }
            $extension = $photo->getClientOriginalExtension();
            $fileName = 'student-'.time().'.'.$extension;
            $photo->move('public/students/',$fileName);
            $data->reg_no = $request->reg_no;
            $data->name = $request->name;
            $data->birthday = $request->birthday;
            $data->gender = $request->gender;
            $data->father_name = $request->father_name;
            $data->mother_name = $request->mother_name;
            $data->religion = $request->religion;
            $data->address1 = $request->address1;
            $data->address2 = $request->address2;
            $data->phone = $request->phone;
            $data->session_id = $request->session_id;
            $data->class_id = $request->class_id;
            $data->section_id = $request->section_id;
            $data->photo = $fileName;
        }else{
            $data->reg_no = $request->reg_no;
            $data->name = $request->name;
            $data->birthday = $request->birthday;
            $data->gender = $request->gender;
            $data->father_name = $request->father_name;
            $data->mother_name = $request->mother_name;
            $data->religion = $request->religion;
            $data->address1 = $request->address1;
            $data->address2 = $request->address2;
            $data->phone = $request->phone;
            $data->session_id = $request->session_id;
            $data->class_id = $request->class_id;
            $data->section_id = $request->section_id;
        }
        $data->save();
        return redirect('/all-students')->with('message','Student Update was Successful!');
    }

    public function viewSingle( $id )
    {
        $student = Students::find( $id );
        $student->load( 'class' );
        $student->load( 'session' );
        $student->load( 'section' );

        return view('students.singleStudent',[ 'student'=>$student ]);
    }

    public function findStudent(Request $request)
    {
        if($request->ajax()){
            $output="";
            $query = $request->get('query');
            if ($query != '') {
                $students = DB::table('students')
                            ->join('sessions', 'students.session_id', '=', 'sessions.id')
                            ->join('classes', 'students.class_id', '=', 'classes.id')
                            ->join('sections', 'students.section_id', '=', 'sections.id')
                            ->select('students.*', 'sessions.sessions_name as session_name', 'classes.classes_name as class_name', 'sections.sections_name as section_name')
                            ->where('name','LIKE','%'.$query."%")
                            ->orWhere('reg_no','LIKE','%'.$query."%")
                            ->orWhere('phone','LIKE','%'.$query."%")
                            ->orWhere('email','LIKE','%'.$query."%")
                            ->orderBy('id', 'asc')
                            ->paginate(10);
                $total_student = $students->count();
                if ($total_student > 0) {
                    $i = 0;
                    foreach ($students as $student) {
                        $output .='<tr>
                                    <td>'.++$i.'</td>
                                    <td>'.$student->name.'</td>
                                    <td>'.$student->reg_no.'</td>
                                    <td><img src="public/students/'.$student->photo.'" style="height: 80px; width: 80px;"></td>
                                    <td>'.$student->phone.'</td>
                                    <td><a href="students/view/'.$student->id.'" ><i class="fa fa-eye btn btn-info"></i></a></td>
                                </tr>';
                    }

                }else{
                    $output .= '
                        <tr><td colspan="6" style="text-align:center;"><h4>No Data Found!</h4></td></tr>
                    ';
                }
            }else{
                $students = DB::table('students')
                            ->join('sessions', 'students.session_id', '=', 'sessions.id')
                            ->join('classes', 'students.class_id', '=', 'classes.id')
                            ->join('sections', 'students.section_id', '=', 'sections.id')
                            ->select('students.*', 'sessions.sessions_name as session_name', 'classes.classes_name as class_name', 'sections.sections_name as section_name')
                            ->orderBy('id', 'asc')
                            ->paginate(10);
                $total_student = $students->count();
                if ($total_student > 0) {
                    $i = 0;
                    foreach ($students as $student) {
                        $output .='<tr>
                                    <td>'.++$i.'</td>
                                    <td>'.$student->name.'</td>
                                    <td>'.$student->reg_no.'</td>
                                    <td><img src="public/students/'.$student->photo.'" style="height: 80px; width: 80px;"></td>
                                    <td>'.$student->phone.'</td>
                                    <td><a href="students/view/'.$student->id.'" ><i class="fa fa-eye btn btn-info"></i></a></td>
                                </tr>';
                    }

                }else{
                    $output .= '
                        <tr><td colspan="6" style="text-align:center;"><h4>No Data Found!</h4></td></tr>
                    ';
                }
            }
            $data = array(
                    'allData'   =>  $output
                );
             
            echo json_encode($data);
        }

    }

    public function delete($id)
    {
        $data = Students::find($id);
        $data->delete();
        return redirect('/all-students')->with('message','Student Deleted Successfully!');
    }

    public function xxxxxxxxx_importStudent(Request $request)
    {
        $output = 'File Format is Not Supported!';
        $allowed_ext = array('csv');
        $student_file = $request->file('student_file');
        $extension = $student_file->getClientOriginalExtension();
        $fileName = 'csv-students-'.time().'.'.$extension;
        
        if (in_array($extension, $allowed_ext)) {
            $student_file->move('public/students/',$fileName);
            $file_data = fopen("public/students/".$fileName, 'r');
            while ($row = fgetcsv($file_data)) {
                $data = new Students();
                $data->reg_no = mysqli_real_escape_string($row[0]);
                $data->name = mysqli_real_escape_string($row[1]);
                $data->birthday = md5(mysqli_real_escape_string($row[2])).$salt;
                $data->gender = mysqli_real_escape_string($row[3]);
                $data->religion = mysqli_real_escape_string($row[4]);
                $data->blood_group = mysqli_real_escape_string($row[5]);
                $data->address1 = mysqli_real_escape_string($row[6]);
                $data->address2 = mysqli_real_escape_string($row[7]);
                $data->phone = mysqli_real_escape_string($row[8]);
                $data->email = mysqli_real_escape_string($row[9]);
                $data->password = Hash::make('123456');
                $data->father_name = mysqli_real_escape_string($row[10]);
                $data->mother_name = mysqli_real_escape_string($row[11]);
                $data->session_id = mysqli_real_escape_string($row[12]);
                $data->class_id = mysqli_real_escape_string($row[13]);
                $data->section_id = mysqli_real_escape_string($row[14]);
                $data->parent_id = 1;
                $data->roll = mysqli_real_escape_string($row[15]);
                $data->save();
                $output = 'Student Import Was Successful!';
            }
        }else{
            $output = "File Format is Not Supported!";
        }
        return redirect('/all-students')->with('message',$output);
    }


    public function importStudent(Request $request)
    {
        $output = 'File Format is Not Supported!';
        $allowed_ext = array('csv');
        $student_file = $request->file('student_file');
        $extension = $student_file->getClientOriginalExtension();
        $fileName = 'csv-students-'.time().'.'.$extension;
        
        if (in_array($extension, $allowed_ext)) {
            $student_file->move('public/students/',$fileName);
            $csvData = file_get_contents('public/students/'.$fileName);
            $rows = array_map('str_getcsv', explode("\n", $csvData));
            // dd($rows);
            foreach($rows as $row) {
                $data = new Students();
                $data->reg_no = $row[0];
                $data->name = $row[1];
                $data->birthday = $row[2];
                $data->gender = $row[3];
                $data->religion = $row[4];
                $data->blood_group = $row[5];
                $data->address1 = $row[6];
                $data->address2 = $row[7];
                $data->phone = $row[8];
                $data->email = $row[9];
                $data->password = Hash::make('123456');
                $data->father_name = $row[10];
                $data->mother_name = $row[11];
                $data->session_id = $row[12];
                $data->class_id = $row[13];
                $data->section_id = $row[14];
                $data->parent_id = $row[15];
                $data->roll = $row[16];
                $data->save();
            }
            $output = 'Student Import Was Successful!';
        }else{
            $output = "File Format is Not Supported!";
        }
        return redirect('/all-students')->with('message',$output);
    }

}
