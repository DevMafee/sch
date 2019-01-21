<?php

namespace App\Http\Controllers;

use App\SixToEightResult;

use App\Classes;
use App\Sections;
use App\Subjects;
use App\Students;
use App\Examination;
use DB;
use Illuminate\Http\Request;

class SixToEightResultController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $classes = DB::table('classes')->where('classes_rank', '>', 5)->where('classes_rank', '<', 9)->get();
        $sections = Sections::all();
        $subjects = DB::table('subjects')->where('subject_class', '=', 8)->get();
        $exams = DB::table('examinations')->where('exam_class', '=', '8')->get();
        return view('results.assign-marks-six-to-eight',['sections'=>$sections,'classes'=>$classes,'subjects'=>$subjects,'exams'=>$exams]);
    }

    public function create(Request $request)
    {
        $student_arr = $request->student;

        $check_year = date('Y');
        $check_class = $request->class;
        $check_section = $request->section;
        $check_exam = $request->exam;
        $check_subject = $request->subject;
        $check_students = DB::table('six_to_eight_results')
                            ->where('year','=',$check_year)
                            ->where('class','=',$check_class)
                            ->where('class','=',$check_section)
                            ->where('exam','=',$check_exam)
                            ->where('subject','=',$check_subject)
                            ->orderBy('id', 'asc')
                            ->get();
        $total_check = $check_students->count();
        if ( $total_check > 0 ) {
            return redirect('/assign-marks-six-to-eight')->with('err_message','Marks Already Added!');
        }else{
            foreach( $student_arr as $student ) {
                $written = 'written'.$student;
                $mcq = 'mcq'.$student;
                $practical = 'practical'.$student;
                $monthly_avg = 'monthly_avg'.$student;
                $total_marks = 'total_marks'.$student;
                $got_grade = 'got_grade'.$student;
                $got_gpa = 'got_gpa'.$student;
                $result = new SixToEightResult;
                $result->year = date('Y');
                $result->class = $request->class;
                $result->section = $request->section;
                $result->student = $student;
                $result->exam = $request->exam;
                $result->subject = $request->subject;
                $result->written = $request->$written;
                $result->mcq = $request->$mcq;
                $result->practical = $request->$practical;
                $result->monthly_avg = $request->$monthly_avg;
                $result->total_marks = $request->$total_marks;
                $result->got_grade = $request->$got_grade;
                $result->got_gpa = $request->$got_gpa;
                $result->save();
            }
            return redirect('/assign-marks-six-to-eight')->with('message','Marks Added Successfully!');
        }
    }

    public function loadStudents(Request $request)
    {
        if($request->ajax()){
            $output = '<table class="table table-hover table-border">
                            <thead>
                                <th style="width:5%">Roll</th>
                                <th style="width:15%">Name</th>
                                <th style="width:12%">Written</th>
                                <th style="width:12%">MCQ</th>
                                <th style="width:12%">Practical</th>
                                <th style="width:12%">Marks(80%)</th>
                                <th style="width:12%">Monthly Avg(20%)</th>
                                <th style="width:20%">Total -- Grade -- GPA</th>
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
                                            <input type="number" step="any" style="max-width:100px;" class="form-control written" name="written'.$student->id.'" value="0" placeholder="Marks ....">
                                        </td>
                                        <td>
                                            <input type="number" step="any" style="max-width:100px;" class="form-control mcq" name="mcq'.$student->id.'" value="0" placeholder="Marks ....">
                                        </td>
                                        <td>
                                            <input type="number" step="any" style="max-width:100px;" class="form-control practical" name="practical'.$student->id.'" value="0" placeholder="Marks ....">
                                        </td>
                                        <td>
                                            <input type="text" style="width:50px; position:relative; padding:5px;" class="total80per" name="total80per'.$student->id.'" value="0" readonly>
                                        </td>
                                        <td>
                                            <input type="number" step="any" style="max-width:100px;" class="form-control monthly_avg" name="monthly_avg'.$student->id.'" value="0" placeholder="Marks ....">
                                        </td>
                                        <td>
                                            <input type="text" style="width:50px; position:relative; padding:5px;" class="total_marks" name="total_marks'.$student->id.'" value="0" readonly>
                                            <input type="text" style="width:50px; position:relative; padding:5px;" class="grade" name="got_grade'.$student->id.'" value="" readonly>
                                            <input type="number" step="any" style="width:50px; position:relative; padding:5px;" class="gpa" name="got_gpa'.$student->id.'" value="" readonly>
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
                                            <input type="number" step="any" style="max-width:100px;" class="form-control written" name="written'.$student->id.'" value="0" placeholder="Marks ....">
                                        </td>
                                        <td><input type="number" step="any" style="max-width:100px;" class="form-control mcq" name="mcq'.$student->id.'" value="0" placeholder="Marks ...."></td>
                                        <td>
                                            <input type="number" step="any" style="max-width:100px;" class="form-control practical" name="practical'.$student->id.'" value="0" placeholder="Marks ....">
                                        </td>
                                        <td>
                                            <input type="text" style="width:50px; position:relative; padding:5px;" class="total80per" name="total80per'.$student->id.'" value="0" readonly>
                                        </td>
                                        <td>
                                            <input type="number" step="any" style="max-width:100px;" class="form-control monthly_avg" name="monthly_avg'.$student->id.'" value="0" placeholder="Marks ....">
                                        </td>
                                        <td>
                                            <input type="text" style="width:50px; position:relative; padding:5px;" class="total_marks" name="total_marks'.$student->id.'" value="" readonly>
                                            <input type="text" style="width:50px; position:relative; padding:5px;" class="grade" name="got_grade'.$student->id.'" value="" readonly>
                                            <input type="number" step="any" style="width:50px; position:relative; padding:5px;" class="gpa" name="got_gpa'.$student->id.'" value="" readonly>
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
                            $("#allStudentsforAssignMarks").delegate(".monthly_avg","keyup",function(){
                                var marks_row = $(this);
                                calculate_marks(marks_row);
                            })

                            function calculate_marks(marks_row){
                                var tr = marks_row.parent().parent();
                                var written = tr.find(".written").val();
                                var mcq = tr.find(".mcq").val();
                                var practical = tr.find(".practical").val();
                                var total80per = Math.round((((written*1)+(mcq*1)+(practical*1))*80)/100);
                                var monthly_avg = tr.find(".monthly_avg").val();
                                var total_marks = ((total80per*1)+(monthly_avg*1));
                                tr.find(".total80per").val(total80per);
                                tr.find(".total_marks").val(total_marks);

                                console.log(total_marks);
                                if( total_marks >= 80){
                                    tr.find(".grade").val("A+");
                                    tr.find(".gpa").val(5);
                                }else if( total_marks >= 70){
                                    tr.find(".grade").val("A");
                                    tr.find(".gpa").val(4);
                                }else if( total_marks >= 60){
                                    tr.find(".grade").val("A-");
                                    tr.find(".gpa").val(3.5);
                                }else if( total_marks >= 50){
                                    tr.find(".grade").val("B");
                                    tr.find(".gpa").val(3);
                                }else if( total_marks >= 40){
                                    tr.find(".grade").val("C");
                                    tr.find(".gpa").val(2);
                                }else if( total_marks >= 33){
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
        $classes = DB::table('classes')->where('classes_rank', '>', 5)->where('classes_rank', '<', 9)->get();
        $sections = Sections::all();
        $subjects = DB::table('subjects')->where('subject_class', '=', 8)->get();
        $exams = DB::table('examinations')->where('exam_class', '=', '8')->get();
        return view('results.view-results-six-to-eight',['sections'=>$sections,'classes'=>$classes,'subjects'=>$subjects,'exams'=>$exams]);
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
                $students = DB::table('six_to_eight_results')
                            ->join('students', 'six_to_eight_results.student', '=', 'students.id')
                            ->select('six_to_eight_results.*', 'students.name as student_name', 'students.roll as student_roll')
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
                $students = DB::table('six_to_eight_results')
                            ->join('students', 'six_to_eight_results.student', '=', 'students.id')
                            ->select('six_to_eight_results.*', 'students.name as student_name', 'students.roll as student_roll')
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
