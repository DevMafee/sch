<?php

namespace App\Http\Controllers;

use App\TeacherAttendance;
use App\Teacher;
use DB;
use Illuminate\Http\Request;

class TeacherAttendanceController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $teachers = Teacher::all();
        return view('attendance.teacher-attendance',['teachers'=>$teachers]);
    }

    public function viewAttendance()
    {
        return view('attendance.view-teacher-attendance');
    }

    public function loadTeacher(Request $request)
    {
        if($request->ajax()){
            $output = '<table class="table table-hover table-border">
                            <thead>
                                <th style="10%;">SN#</th>
                                <th style="50%;">Name</th>
                                <th style="40%;">Status</th>
                            </thead>
                            <tbody>
                        ';
            $teachers = $request->get('teachers');
            if ( $teachers != '' ) {
                $teachers = DB::table('teachers')
                            ->orderBy('id', 'asc')
                            ->get();
                $total_teachers = $teachers->count();
                if ($total_teachers > 0) {
                    $i = 0;
                    foreach ($teachers as $teacher) {
                        $output .=' <tr>
                                        <td style="10%;">'.++$i.'</td>
                                        <td style="50%;">'.$teacher->name.'</td>
                                        <td style="40%;">
                                        <input type="hidden" name="teacher[]" value="'.$teacher->id.'">
                                            <label>
                                                <input type="radio" style="padding:10px;" name="'.$teacher->id.'" checked value="1"> Present
                                            </label>
                                                &nbsp;
                                            <label>
                                                <input type="radio" style="padding:10px;" name="'.$teacher->id.'" value="2"> Absent
                                            </label>
                                        </td>
                                    </tr>';
                    }

                }else{
                    $output .= '
                        <tr><td colspan="6" style="text-align:center;"><h4>No Data Found!</h4></td></tr>
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
             
            echo json_encode($data);
        }
    }

    public function create(Request $request)
    {
        $teacher_arr = $request->teacher;
        foreach( $teacher_arr as $teacher ) {

            $attendance = new TeacherAttendance;
            $attendance->teacher = $teacher;
            $attendance->status = $request->$teacher;
            $attendance->date = $request->date;
            $attendance->save();
        }
        return redirect('/teacher-attendance')->with('message','Attendance Added Successfully!');
    }

    public function viewLoadedAttendance(Request $request){
        if($request->ajax()){

            $date_teacher = $request->get('date_teacher');

            $output ='<span class="badge badge-primary">Teacher\'s Attendance of Date : '.$date_teacher.'</span>';
            $output .= '<table class="table table-hover table-border">
                            <thead>
                                <th>SN#</th>
                                <th>Name</th>
                                <th>Status</th>
                            </thead>
                            <tbody>
                        ';

            if ( $date_teacher != '' ) {
                $attendances = DB::table('teacher_attendances')
                            ->where('date','=',$date_teacher)
                            ->orderBy('id', 'asc')
                            ->get();
                $total_attendance = $attendances->count();
                if ($total_attendance > 0) {
                    $i = 0;
                    foreach ($attendances as $attendance) {
                        if ($attendance->status == 1) {
                            $status = '<span class="label label-success">Present</span>';
                        }else if($attendance->status == 2){
                            $status = '<span class="label label-warning">Absent</span>';
                        }else{
                            $status = '<span> - </span>';
                        }
                        $teacher = Teacher::find($attendance->teacher);
                        $output .=' <tr>
                                        <td>'.++$i.'</td>
                                        <td>'.$teacher->name.'</td>
                                        <td>'.$status.'</td>
                                    </tr>';
                    }

                }else{
                    $output .= '
                        <tr><td colspan="3" style="text-align:center;"><h4>No Data Found!</h4></td></tr>
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

    public function viewLoadedAttendanceMonthly(Request $request)
    {
        if($request->ajax()){

            $month_teacher = $request->get('month_teacher');
            $month_teacher_text = $request->get('month_teacher_text');
            $year = date('Y');

            function get_weekdays($month_teacher,$year) {
                $lastday = date("t",mktime(0,0,0,$month_teacher,1,$year));
                $weekdays=0;
                for($d=1;$d<=$lastday;$d++) {
                    $wd = date("w",mktime(0,0,0,$month_teacher,$d,$year));
                    if($wd > 0 && $wd < 7) $weekdays++;
                    }
                return $weekdays;
            }

            function days_in_month($month_teacher, $year){

                return $month_teacher == 2 ? ($year % 4 ? 28 : ($year % 100 ? 29 : ($year % 400 ? 28 : 29))) : (($month_teacher - 1) % 7 % 2 ? 30 : 31); 
            }
            $total_days = days_in_month($month_teacher, $year);
            $working_days = get_weekdays($month_teacher,$year);
            $holydays = $total_days - $working_days;
            $output ='<span class="badge badge-primary">Teacher\'s Attendance of Month : '.$month_teacher_text.' - '.$year.'</span><span class="badge badge-warning">Total Working Days - '.$working_days.'</span>';
            $output .= '<div style="overflow-x:auto;"><table class="table table-hover table-striped table-border" style="max-width:1000px; overflow-y:scroll;">
                            <thead>
                                <th>SN#</th>
                                <th>Name</th>
                        ';
            for ($i=1; $i <= $total_days; $i++) { 
                $output .='<th>'.$i.'</th>';
            }
            $output .= '<th>Total</th></thead><tbody>';

            $teachers = Teacher::all();
            // $total_teacher = $teachers->count();
            $i = 0;
            foreach ($teachers as $teacher) {
                $k = 0;
                $l = 0;
                $output .=' <tr>
                                <td>'.++$i.'</td>
                                <td>'.$teacher->name.'</td>';
                for ($j=1; $j <= $total_days; $j++) { 

                    $date = $year.'-'.$month_teacher.'-'.$j;
                    $attendances = DB::table('teacher_attendances')
                                    ->where('teacher', '=', $teacher->id)
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
                $output .= '<td><span class="badge badge-success">P='.$k.'</span><br><span class="badge badge-danger">A='.$l.'</span><br><span class="badge badge-warning">H='.$holydays.'</span></td></tr>';
            }

            $output .= '
                            </tbody>
                        </table></div>
                        ';
            $data = array(
                    'allData'   =>  $output
                );
             
            return response()->json( $data );
        }
    }
}
