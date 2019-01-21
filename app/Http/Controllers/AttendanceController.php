<?php

namespace App\Http\Controllers;

use App\Attendance;
use App\Classes;
use App\Sections;
use App\Students;
use DB;
use Illuminate\Http\Request;

class AttendanceController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $classes = Classes::all();
        $sections = Sections::all();
        return view('attendance.home',['classes'=>$classes, 'sections'=>$sections]);
    }

    public function viewAttendance()
    {
        $classes = Classes::all();
        $sections = Sections::all();
        return view('attendance.view-attendance',['classes'=>$classes, 'sections'=>$sections]);
    }

    public function loadStudent(Request $request)
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
                                                <input type="radio" style="padding:10px;" name="'.$student->id.'" checked value="1"> Present
                                            </label>
                                                &nbsp;
                                            <label>
                                                <input type="radio" style="padding:10px;" name="'.$student->id.'" value="2"> Absent
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
                                                <input type="radio" style="padding:10px;" name="'.$student->id.'" value="1" checked> Present
                                            </label>
                                                &nbsp;
                                            <label>
                                                <input type="radio" style="padding:10px;" name="'.$student->id.'" value="2"> Absent
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

    public function create(Request $request)
    {
        $student_arr = $request->student;
        foreach( $student_arr as $student ) {

            $attendance = new Attendance;
            $attendance->teacher = $request->teacher;
            $attendance->class = $request->class;
            $attendance->section = $request->section;
            $attendance->student = $student;
            $attendance->status = $request->$student;
            $attendance->date = $request->date;
            $attendance->save();
        }
        return redirect('/take-attendance')->with('message','Attendance Added Successfully!');
    }

    public function viewLoadedAttendance(Request $request){
        if($request->ajax()){
            //dd( $request->all() );
            $class_std = $request->get('class_std');
            $class_name = Classes::find($class_std);
            $section_std = $request->get('section_std');
            $section_name = Sections::find($section_std);
            $date_std = $request->get('date_std');

            $output ='<span class="alert alert-primary">Class: '.$class_name->classes_name.' || Section : '.$section_name->sections_name.' And Date : '.$date_std.'</span>';
            $output .= '<table class="table table-hover table-border">
                            <thead>
                                <th>Roll</th>
                                <th>Name</th>
                                <th>Status</th>
                            </thead>
                            <tbody>
                        ';

            if ( $class_std != '' && $section_std == '' && $date_std != '' ) {
                $attendances = DB::table('attendances')
                            ->where('class','=',$class_std)
                            ->where('date','=',$date_std)
                            ->orderBy('id', 'asc')
                            ->get();
                $total_attendance = $attendances->count();
                if ($total_attendance > 0) {
                    foreach ($attendances as $attendance) {
                        if ($attendance->status == 1) {
                            $status = '<span class="label label-success">Present</span>';
                        }else if($attendance->status == 2){
                            $status = '<span class="label label-warning">Absent</span>';
                        }else{
                            $status = '<span class="label label-danger">Not Taken</span>';
                        }
                        $student = Students::find($attendance->student);
                        $output .=' <tr>
                                        <td>'.$student->roll.'</td>
                                        <td>'.$student->name.'</td>
                                        <td>'.$status.'</td>
                                    </tr>';
                    }

                }else{
                    $output .= '
                        <tr><td colspan="3" style="text-align:center;"><h4>No Data Found!</h4></td></tr>
                    ';
                }
            }elseif ( $class_std != '' && $section_std != '' && $date_std != '' ) {
                $attendances = DB::table('attendances')
                            ->where('class','=',$class_std)
                            ->where('section','=',$section_std)
                            ->where('date','=',$date_std)
                            ->orderBy('id', 'asc')
                            ->get();
                $total_attendance = $attendances->count();
                if ($total_attendance > 0) {
                    foreach ($attendances as $attendance) {
                        if ($attendance->status == 1) {
                            $status = '<span class="label label-success">Present</span>';
                        }else if($attendance->status == 2){
                            $status = '<span class="label label-warning">Absent</span>';
                        }else{
                            $status = '<span class="label label-danger">Not Taken</span>';
                        }
                        $student = Students::find($attendance->student);
                        $output .=' <tr>
                                        <td>'.$student->roll.'</td>
                                        <td>'.$student->name.'</td>
                                        <td>'.$status.'</td>
                                    </tr>';
                    }

                }else{
                    $output .= '
                            <tr>
                                <td colspan="3" style="text-align:center;"><h4>No Data Found!</h4></td>
                            </tr>
                        ';
                }
            }else{
                $output .= '
                            <tr>
                                <td colspan="3" style="text-align:center;"><h4>No Data Found!</h4></td>
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
    public function viewLoadedAttendanceMonthly(Request $request){

        if($request->ajax()){

            $class_std = $request->get('class_std');
            $section_std = $request->get('section_std');

            $class_name = Classes::find($class_std);
            if ($section_std != '') {
                $section_name = Sections::find($section_std);
                $section = ',Section : '.$section_name->sections_name;
            }else{
                $section = ' ';
            }

            $month_std = $request->get('month_std');
            $month_std_text = $request->get('month_std_text');
            $year = date('Y');

            function get_weekdays($month_std,$year) {
                $lastday = date("t",mktime(0,0,0,$month_std,1,$year));
                $weekdays=0;
                for($d=1;$d<=$lastday;$d++) {
                    $wd = date("w",mktime(0,0,0,$month_std,$d,$year));
                    if($wd > 0 && $wd < 7) $weekdays++;
                    }
                return $weekdays;
            }

            function days_in_month($month_std, $year){

                return $month_std == 2 ? ($year % 4 ? 28 : ($year % 100 ? 29 : ($year % 400 ? 28 : 29))) : (($month_std - 1) % 7 % 2 ? 30 : 31); 
            }
            $total_days = days_in_month($month_std, $year);
            $open_days = get_weekdays($month_std, $year);
            $holy_days = $total_days - $open_days;

            $output ='<span class="badge badge-primary">Class : '.$class_name->classes_name.$section.' || Student\'s Attendance of Month : '.$month_std_text.' - '.$year.'</span>';
            $output .= '<div style="overflow-x:auto;"><table class="table table-hover table-striped table-border" style="max-width:1000px; overflow-y:scroll;">
                            <thead>
                                <th>SN#</th>
                                <th>Name</th>
                        ';
            for ($i=1; $i <= $total_days; $i++) { 
                $output .='<th>'.$i.'</th>';
            }
            $output .= '<th>Total</th></thead><tbody>';

            if ($section_std != '') {
                $students = DB::table('students')
                        ->where('class_id','=',$class_std)
                        ->where('section_id','=',$section_std)
                        ->orderBy('id', 'asc')
                        ->get();
                $total_students = $students->count();
                $i = 0;
                foreach ($students as $student) {
                    $k = 0;
                    $l = 0;
                    $output .=' <tr>
                                    <td>'.++$i.'</td>
                                    <td>'.$student->name.'</td>';
                    for ($j=1; $j <= $total_days; $j++) { 

                        $date = $year.'-'.$month_std.'-'.$j;
                        $attendances = DB::table('attendances')
                                        ->where('student', '=', $student->id)
                                        ->where('date', '=', $date)
                                        ->get();
                        if ( $attendances->count() > 0 ) {
                            
                            foreach ($attendances as $attendance) {
                                if ($attendance->status == 1) {
                                    $k++;
                                    $status = '<span class="label label-success">P</span>';
                                }else if($attendance->status == 2){
                                    $l++;
                                    $status = '<span class="label label-warning">A</span>';
                                }else{
                                    $status = '<span> - </span>';
                                }
                            }
                            $output .= '<td>'.$status.'</td>';
                        }else{
                            $output .= '<td> - </td>';
                        }
                    }
                    $absent = $total_days - ($holy_days + $k);
                    $output .= '<td><span class="badge badge-success">P='.$k.'</span><br><span class="badge badge-danger">A='.$absent.'</span><br><span class="badge badge-warning">H='.$holy_days.'</span></td></tr>';
                }
            }else{
                $students = DB::table('students')
                        ->where('class_id','=',$class_std)
                        ->orderBy('id', 'asc')
                        ->get();
                $total_students = $students->count();
                $i = 0;
                foreach ($students as $student) {
                    $k = 0; 
                    $output .=' <tr>
                                    <td>'.++$i.'</td>
                                    <td>'.$student->name.'</td>';
                    for ($j=1; $j <= $total_days; $j++) { 

                        $date = $year.'-'.$month_std.'-'.$j;
                        $attendances = DB::table('attendances')
                                        ->where('student', '=', $student->id)
                                        ->where('date', '=', $date)
                                        ->get();
                        if ( $attendances->count() > 0 ) {
                            
                            foreach ($attendances as $attendance) {
                                if ($attendance->status == 1) {
                                    $k++;
                                    $status = '<span class="label label-success">P</span>';
                                }else if($attendance->status == 2){
                                    $status = '<span class="label label-warning">A</span>';
                                }else{
                                    $status = '<span> - </span>';
                                }
                            }
                            $output .= '<td>'.$status.'</td>';
                        }else{
                            $output .= '<td> - </td>';
                        }
                    }
                    $output .= '<td>'.$k.'</td></tr>';
                }
            }
            $output .= '<tr>Total Students : <span class="badge badge-warning"> '.$total_students.' </span></tr>
                            </tbody>
                        </table></div>
                        ';
            $data = array(
                    'allData'   =>  $output
                );
             
            return response()->json( $data );
        }
    }

    public function edit(Attendance $attendance)
    {
        //
    }

    public function update(Request $request, Attendance $attendance)
    {
        //
    }

    public function destroy(Attendance $attendance)
    {
        //
    }
}
