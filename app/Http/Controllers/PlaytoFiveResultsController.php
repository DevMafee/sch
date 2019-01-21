<?php

namespace App\Http\Controllers;

use App\PlaytoFiveResults;
use App\Classes;
use App\Sections;
use App\Subjects;
use App\Students;
use App\Examination;
use DB;
use Illuminate\Http\Request;

class PlaytoFiveResultsController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $classes = DB::table('classes')->where('classes_rank', '<', 6)->get();
        $sections = Sections::all();
        $subjects = DB::table('subjects')->where('subject_class', '=', 5)->get();
        $exams = DB::table('examinations')->where('exam_class', '=', '5')->get();
        return view('results.assign-marks-play-to-five',['sections'=>$sections,'classes'=>$classes,'subjects'=>$subjects,'exams'=>$exams]);
    }

    public function create(Request $request)
    {
        $student_arr = $request->student;

        $check_year = date('Y');
        $check_class = $request->class;
        $check_section = $request->section;
        $check_exam = $request->exam;
        $check_subject = $request->subject;
        $check_students = DB::table('playto_five_results')
                            ->where('year','=',$check_year)
                            ->where('class','=',$check_class)
                            ->where('class','=',$check_section)
                            ->where('exam','=',$check_exam)
                            ->where('subject','=',$check_subject)
                            ->orderBy('id', 'asc')
                            ->get();
        $total_check = $check_students->count();
        if ( $total_check > 0 ) {
            return redirect('/assign-marks-play-to-five')->with('err_message','Marks Already Added!');
        }else{
            foreach( $student_arr as $student ) {
                $total = 'total_marks'.$student;
                $grade = 'grade'.$student;
                $gpa = 'gpa'.$student;
                $result = new PlaytoFiveResults;
                $result->year = date('Y');
                $result->class = $request->class;
                $result->section = $request->section;
                $result->student = $student;
                $result->exam = $request->exam;
                $result->subject = $request->subject;
                $result->total_marks = $request->$total;
                $result->got_grade = $request->$grade;
                $result->got_gpa = $request->$gpa;
                $result->save();
            }
            return redirect('/assign-marks-play-to-five')->with('message','Marks Added Successfully!');
        }
    }

    public function loadStudents(Request $request)
    {
        if($request->ajax()){
            $output = '<table class="table table-hover table-border">
                            <thead>
                                <th style="width:10%">Roll</th>
                                <th style="width:20%">Name</th>
                                <th style="width:12%">Marks Got</th>
                                <th style="width:34%"> Grade -- GPA</th>
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
                                            <input type="number" step="any" style="max-width:100px;" class="form-control total_marks" name="total_marks'.$student->id.'" value="">
                                        </td>
                                        <td>
                                            <input type="text" style="width:50px; position:relative; padding:5px;" class="grade" name="grade'.$student->id.'" value="" readonly>
                                            <input type="number" step="any" style="width:50px; position:relative; padding:5px;" class="gpa" name="gpa'.$student->id.'" value="" readonly>
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
                                            <input type="number" step="any" style="max-width:100px;" class="form-control total_marks" name="total_marks'.$student->id.'" value="">
                                        </td>
                                        <td>
                                            <input type="text" style="width:50px; position:relative; padding:5px;" class="grade" name="grade'.$student->id.'" value="" readonly>
                                            <input type="number" step="any" style="width:50px; position:relative; padding:5px;" class="gpa" name="gpa'.$student->id.'" value="" readonly>
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
            $output .= '<script>
                            $("#allStudentsforAssignMarks").delegate(".total_marks","keyup",function(){
                                var total_marks = $(this);
                                calculate_marks(total_marks);
                            })

                            function calculate_marks(total_marks){
                                var tr = total_marks.parent().parent();
                                var total_marks = tr.find(".total_marks").val();
                                if( total_marks >= 90){
                                    tr.find(".grade").val("A+");
                                    tr.find(".gpa").val(5);
                                }else if( total_marks >= 80){
                                    tr.find(".grade").val("A");
                                    tr.find(".gpa").val(4);
                                }else if( total_marks >= 70){
                                    tr.find(".grade").val("A-");
                                    tr.find(".gpa").val(3.5);
                                }else if( total_marks >= 60){
                                    tr.find(".grade").val("B");
                                    tr.find(".gpa").val(3);
                                }else if( total_marks >= 50){
                                    tr.find(".grade").val("C");
                                    tr.find(".gpa").val(2);
                                }else if( total_marks >= 40){
                                    tr.find(".grade").val("D");
                                    tr.find(".gpa").val(1);
                                }else{
                                    tr.find(".grade").val("F");
                                    tr.find(".gpa").val(0);
                                }
                            }

                        </script>';
            $data = array(
                    'allData'   =>  $output
                );
             
            return response()->json( $data );
        }
    }

    public function viewResults()
    {
        $classes = DB::table('classes')->where('classes_rank', '<', 6)->get();
        $sections = Sections::all();
        $subjects = DB::table('subjects')->where('subject_class', '=', 5)->get();
        $exams = DB::table('examinations')->where('exam_class', '=', '5')->get();
        return view('results.view-results-play-to-five',['sections'=>$sections,'classes'=>$classes,'subjects'=>$subjects,'exams'=>$exams]);
    }

    public function resultsLoadForStudents(Request $request)
    {
        if($request->ajax()){
            $class_result = $request->get('class_result');
            $cls_name = Classes::find($class_result);
            $section_result = $request->get('section_result');
            $section = Sections::find($section_result);
            $subject_result = $request->get('subject_result');
            $subject = Subjects::find($subject_result);
            $exam_result = $request->get('exam_result');
            $exam = Examination::find($exam_result);
            
            if ($section_result == '') {
                $output = '<table class="table table-hover table-border">
                                <thead><th colspan="8" class="alert alert-primary">Class : '.$cls_name->classes_name.' || Subject : '.$subject->subject_name.' And Exam : '.$exam->name.'</th></thead>
                                <thead>
                                    <th style="width:10%">Roll</th>
                                    <th style="width:30%">Name</th>
                                    <th style="width:20%">Total Marks</th>
                                    <th style="width:20%">Grade</th>
                                    <th style="width:20%">GPA</th>
                                </thead>
                                <tbody>
                            ';
            }else{
                $output = '<table class="table table-hover table-border">
                                <thead><th colspan="8" class="alert alert-primary">Class : '.$cls_name->classes_name.' - Section : '.$section->sections_name.' || Subject : '.$subject->subject_name.' And Exam : '.$exam->name.'</th></thead>
                                <thead>
                                    <th style="width:10%">Roll</th>
                                    <th style="width:30%">Name</th>
                                    <th style="width:20%">Total Marks</th>
                                    <th style="width:20%">Grade</th>
                                    <th style="width:20%">GPA</th>
                                </thead>
                                <tbody>
                            ';
            }
            if ( $section_result == '' ) {
                $students = DB::table('playto_five_results')
                            ->join('students', 'playto_five_results.student', '=', 'students.id')
                            ->select('playto_five_results.*', 'students.name as student_name', 'students.roll as student_roll')
                            ->where('class','=',$class_result)
                            ->where('exam','=',$exam_result)
                            ->where('subject','=',$subject_result)
                            ->orderBy('id', 'asc')
                            ->get();
                $total_student = $students->count();
                if ($total_student > 0) {
                    foreach ($students as $student) {
                        $output .=' <tr>
                                        <td>'.$student->student_roll.'</td>
                                        <td>'.$student->student_name.'</td>
                                        <td>'.$student->total_marks.'</td>
                                        <td>'.$student->got_grade.'</td>
                                        <td>'.$student->got_gpa.'</td>
                                    </tr>';
                    }

                }else{
                    $output .= '
                        <tr><td colspan="6" style="text-align:center;"><h4>No Data Found!</h4></td></tr>
                    ';
                }
            }else{
                $students = DB::table('playto_five_results')
                            ->join('students', 'playto_five_results.student', '=', 'students.id')
                            ->select('playto_five_results.*', 'students.name as student_name', 'students.roll as student_roll')
                            ->where('class','=',$class_result)
                            ->where('section','=',$section_result)
                            ->where('exam','=',$exam_result)
                            ->where('subject','=',$subject_result)
                            ->orderBy('id', 'asc')
                            ->get();
                $total_student = $students->count();
                if ($total_student > 0) {
                    foreach ($students as $student) {
                        $output .=' <tr>
                                        <td>'.$student->student_roll.'</td>
                                        <td>'.$student->student_name.'</td>
                                        <td>'.$student->total_marks.'</td>
                                        <td>'.$student->got_grade.'</td>
                                        <td>'.$student->got_gpa.'</td>
                                    </tr>';
                    }

                }else{
                    $output .= '
                        <tr><td colspan="6" style="text-align:center;"><h4>No Data Found!</h4></td></tr>
                    ';
                }
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
}
