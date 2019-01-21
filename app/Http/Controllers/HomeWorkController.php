<?php

namespace App\Http\Controllers;

use App\Classes;
use App\Sections;
use App\Subjects;
use App\HomeWork;
use App\EvaluateHomeWork;
use DB;
use Illuminate\Http\Request;

class HomeWorkController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $classes = Classes::all();
        $sections = Sections::all();
        $subjects = Subjects::all();
        return view('homework.home',['classes'=>$classes, 'sections'=>$sections, 'subjects'=>$subjects]);
    }

    public function createHomeWork(Request $request)
    {
        $homework = new HomeWork;
        $homework->class = $request->class;
        $homework->section = $request->section;
        $homework->subject = $request->subject;
        $homework->date = $request->date;
        $homework->title = $request->title;
        $homework->description = $request->description;
        $homework->save();
        return redirect('/home-works')->with('message','Home Work Saved Successfully!');
    }

    public function viewHomeworks()
    {
        $classes = Classes::all();
        $sections = Sections::all();
        $subjects = Subjects::all();
        return view('homework.view-home-works',['classes'=>$classes, 'sections'=>$sections, 'subjects'=>$subjects]);
    }

    public function viewLoadedHomeWork(Request $request)
    {
        if($request->ajax()){
            $class_home_work = $request->get('class_home_work');
            $classes = Classes::find($class_home_work);
            $section_home_work = $request->get('section_home_work');
            $sections = Sections::find($section_home_work);
            $subject_home_work = $request->get('subject_home_work');
            $subjects = Subjects::find($subject_home_work);
            $date_home_work = $request->get('date_home_work');

            $output = '<h3><span class="alert alert-success">Class : '.$classes->classes_name.' - Subject : '.$subjects->subject_name.'</span></h3>';
            $output .= '<table class="table table-hover table-border">
                            <thead>
                                <th>SN#</th>
                                <th>Date</th>
                                <th>Home Work Title</th>
                                <th>Description</th>
                                <th>Status</th>
                                <th>Action</th>
                            </thead>
                            <tbody>
                        ';
            $i = 0;
            if ($section_home_work != '' && $date_home_work != '') {
                $home_works = DB::table('home_works')
                            ->where('class','=',$class_home_work)
                            ->where('section','=',$section_home_work)
                            ->where('subject','=',$subject_home_work)
                            ->where('date','=',$date_home_work)
                            ->orderBy('id', 'asc')
                            ->get();
                $total_home_works = $home_works->count();
                if ($total_home_works > 0) {
                    foreach ($home_works as $home_work) {
                        $data = DB::table('evaluate_home_works')
                                ->where('home_work','=',$home_work->id)
                                ->get();

                        if ($data->count() == 0) {
                            $status = '<span class="label label-warning">Pending</span>';
                            $action = '<a href="./home-work-evaluate/'.$home_work->id.'" class="btn btn-primary">Evaluate Now</a>';
                        }else{
                            $status = '<span class="label label-success">Evaluated</span>';
                            $action = '<a href="./load_evaluated_students-list/'.$home_work->id.'" class="badge badge-success"><i class="glyphicon glyphicon-eye-open">View</i></a>';
                        }
                        $output .=' <tr>
                                        <td>'.++$i.'</td>
                                        <td>'.$home_work->date.'</td>
                                        <td>'.$home_work->title.'</td>
                                        <td>'.$home_work->description.'</td>
                                        <td>'.$status.'</td>
                                        <td>'.$action.'</td>
                                    </tr>';
                    }
                }else{
                    $output .=' <tr>
                                    <td colspan="6" class="alert alert-danger"><span class="center">No Home Work Found</span></td>
                                </tr>';
                }
            }else if ($section_home_work != '' && $date_home_work == '') {
                $home_works = DB::table('home_works')
                            ->where('class','=',$class_home_work)
                            ->where('section','=',$section_home_work)
                            ->where('subject','=',$subject_home_work)
                            ->orderBy('id', 'asc')
                            ->get();
                $total_home_works = $home_works->count();
                if ($total_home_works > 0) {
                    foreach ($home_works as $home_work) {
                        $data = DB::table('evaluate_home_works')
                                ->where('home_work','=',$home_work->id)
                                ->get();

                        if ($data->count() == 0) {
                            $status = '<span class="label label-warning">Pending</span>';
                            $action = '<a href="./home-work-evaluate/'.$home_work->id.'" class="btn btn-primary">Evaluate Now</a>';
                        }else{
                            $status = '<span class="label label-success">Evaluated</span>';
                            $action = '<a href="./load_evaluated_students-list/'.$home_work->id.'" class="badge badge-success"><i class="glyphicon glyphicon-eye-open">View</i></a>';
                        }
                        $output .=' <tr>
                                        <td>'.++$i.'</td>
                                        <td>'.$home_work->date.'</td>
                                        <td>'.$home_work->title.'</td>
                                        <td>'.$home_work->description.'</td>
                                        <td>'.$status.'</td>
                                        <td>'.$action.'</td>
                                    </tr>';
                    }
                }else{
                    $output .=' <tr>
                                    <td colspan="6" class="alert alert-danger"><span class="center">No Home Work Found</span></td>
                                </tr>';
                }
            }else if ($section_home_work == '' && $date_home_work != '') {
                $home_works = DB::table('home_works')
                            ->where('class','=',$class_home_work)
                            ->where('subject','=',$subject_home_work)
                            ->where('date','=',$date_home_work)
                            ->orderBy('id', 'asc')
                            ->get();
                $total_home_works = $home_works->count();
                if ($total_home_works > 0) {
                    foreach ($home_works as $home_work) {
                        $data = DB::table('evaluate_home_works')
                                ->where('home_work','=',$home_work->id)
                                ->get();

                        if ($data->count() == 0) {
                            $status = '<span class="label label-warning">Pending</span>';
                            $action = '<a href="./home-work-evaluate/'.$home_work->id.'" class="btn btn-primary">Evaluate Now</a>';
                        }else{
                            $status = '<span class="label label-success">Evaluated</span>';
                            $action = '<a href="./load_evaluated_students-list/'.$home_work->id.'" class="badge badge-success"><i class="glyphicon glyphicon-eye-open">View</i></a>';
                        }
                        $output .=' <tr>
                                        <td>'.++$i.'</td>
                                        <td>'.$home_work->date.'</td>
                                        <td>'.$home_work->title.'</td>
                                        <td>'.$home_work->description.'</td>
                                        <td>'.$status.'</td>
                                        <td>'.$action.'</td>
                                    </tr>';
                    }
                }else{
                    $output .=' <tr>
                                    <td colspan="6" class="alert alert-danger"><span class="center">No Home Work Found</span></td>
                                </tr>';
                }
            }else{
                $home_works = DB::table('home_works')
                            ->where('class','=',$class_home_work)
                            ->where('subject','=',$subject_home_work)
                            ->orderBy('id', 'asc')
                            ->get();
                $total_home_works = $home_works->count();
                if ($total_home_works > 0) {
                    foreach ($home_works as $home_work) {
                        $data = DB::table('evaluate_home_works')
                                ->where('home_work','=',$home_work->id)
                                ->get();

                        if ($data->count() == 0) {
                            $status = '<span class="label label-warning">Pending</span>';
                            $action = '<a href="./home-work-evaluate/'.$home_work->id.'" class="btn btn-primary">Evaluate Now</a>';
                        }else{
                            $status = '<span class="label label-success">Evaluated</span>';
                            $action = '<a href="./load_evaluated_students-list/'.$home_work->id.'" class="badge badge-success"><i class="glyphicon glyphicon-eye-open">View</i></a>';
                        }
                        $output .=' <tr>
                                        <td>'.++$i.'</td>
                                        <td>'.$home_work->date.'</td>
                                        <td>'.$home_work->title.'</td>
                                        <td>'.$home_work->description.'</td>
                                        <td>'.$status.'</td>
                                        <td>'.$action.'</td>
                                    </tr>';
                    }
                }else{
                    $output .=' <tr>
                                    <td colspan="6" class="alert alert-danger"><span class="center">No Home Work Found</span></td>
                                </tr>';
                }
            }
            $output .= '</tbody></table>';
            $data = array(
                    'allData'   =>  $output
                );
             
            return response()->json( $data );
        }
    }

    public function evaluateLoadedHomeWork($id)
    {
        $home_work_data = HomeWork::find($id);
        $home_work_evaluated = DB::table('evaluate_home_works')
                            ->where('home_work','=',$id)
                            ->get();
        $toal_hw = $home_work_evaluated->count();
        return view('homework.load-for-evaluate-home-works',['home_work_data'=>$home_work_data, 'toal_hw'=>$toal_hw]);
    }

    public function evaluateNow(Request $request)
    {
        $student_arr = $request->student;
        foreach( $student_arr as $student ) {
            $data = new EvaluateHomeWork;
            $data->home_work = $request->home_work;
            $data->student = $student;
            $data->status = $request->$student;
            $data->date = $request->date;
            $data->save();
        }
        return redirect('/view-home-works')->with('message','Home Work Evaluated Successfully!');
    }

    public function evaluateNowloadSTD(Request $request)
    {
        if($request->ajax()){
            $output = '<table class="table table-hover table-border">
                            <thead>
                                <th>Roll</th>
                                <th>Name</th>
                                <th>Status</th>
                            </thead>
                            <tbody>
                        ';
            $class_std = $request->get('class_std');
            $section_std = $request->get('section_std');

            if ( $class_std != '' && $section_std == '' ) {
                $students = DB::table('students')
                            ->where('class_id','=',$class_std)
                            ->orderBy('id', 'asc')
                            ->get();
                $total_student = $students->count();
                if ($total_student > 0) {
                    foreach ($students as $student) {
                        $output .=' <tr>
                                        <td>'.$student->roll.'</td>
                                        <td>'.$student->name.'</td>
                                        <td>
                                        <input type="hidden" name="student[]" value="'.$student->id.'">
                                            <label>
                                                <input type="radio" style="padding:10px;" name="'.$student->id.'" checked value="1"> Yes
                                            </label>
                                                &nbsp;
                                            <label>
                                                <input type="radio" style="padding:10px;" name="'.$student->id.'" value="2"> No
                                            </label>
                                        </td>
                                    </tr>';
                    }

                }else{
                    $output .= '
                        <tr><td colspan="6" style="text-align:center;"><h4>No Data Found!</h4></td></tr>
                    ';
                }
            }elseif ( $class_std != '' && $section_std != '' ) {
                $students = DB::table('students')
                            ->where('class_id','=',$class_std)
                            ->where('section_id','=',$section_std)
                            ->orderBy('id', 'asc')
                            ->get();
                $total_student = $students->count();
                if ($total_student > 0) {
                    foreach ($students as $student) {
                        $output .=' <tr>
                                        <td>'.$student->roll.'</td>
                                        <td>'.$student->name.'</td>
                                        <td>
                                        <input type="hidden" name="student[]" value="'.$student->id.'">
                                            <label>
                                                <input type="radio" style="padding:10px;" name="'.$student->id.'" value="1" checked> Yes
                                            </label>
                                                &nbsp;
                                            <label>
                                                <input type="radio" style="padding:10px;" name="'.$student->id.'" value="2"> No
                                            </label>
                                        </td>
                                    </tr>';
                    }

                }else{
                    $output .= '
                            <tr>
                                <td colspan="6" style="text-align:center;"><h4>No Data Found!</h4></td>
                            </tr>
                        ';
                }
            }else{
                $output .= '
                            <tr>
                                <td colspan="6" style="text-align:center;"><h4>No Data Found!</h4></td>
                            </tr>
                            ';
            }
            $output .= '
                            </tbody>
                        </table>
                        ';
            $data = array(
                    'allData'   =>  $output
                );

            return response()->json( $data );
        }
    }

        public function viewevaluatedHomeWorkReport($id)
    {
        $home_work_evaluated = DB::table('evaluate_home_works')
                            ->join('students','students.id','=','student')
                            ->where('home_work','=',$id)
                            ->get();
        return view('homework.evaluated-home-works',['home_work_evaluated'=>$home_work_evaluated]);
    }

}
