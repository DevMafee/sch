<?php

namespace App\Http\Controllers;

use App\AssignMarks;
use App\Classes;
use App\Sections;
use App\Subjects;
use App\Students;
use App\Examination;
use DB;
use Illuminate\Http\Request;

class AssignMarksController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $classes = DB::table('classes')->where('classes_rank', '>', 8)->get();
        $sections = Sections::all();
        $subjects = DB::table('subjects')->where('subject_class', '=', 10)->get();
        $exams = DB::table('examinations')->where('exam_class', '=', '10')->get();

        return view('results.assign-marks',['sections'=>$sections,'classes'=>$classes,'subjects'=>$subjects,'exams'=>$exams]);
    }

    public function createMarks(Request $request)
    {
        $student_arr = $request->student;

        $check_year = date('Y');
        $check_class = $request->class;
        $check_section = $request->section;
        $check_exam = $request->exam;
        $check_subject = $request->subject;
        $check_students = DB::table('assign_marks')
                            ->where('year','=',$check_year)
                            ->where('class','=',$check_class)
                            ->where('class','=',$check_section)
                            ->where('exam','=',$check_exam)
                            ->where('subject','=',$check_subject)
                            ->orderBy('id', 'asc')
                            ->get();
        $total_check = $check_students->count();
        if ( $total_check > 0 ) {
            return redirect('/assign-marks')->with('err_message','Marks Already Added!');
        }else{
            foreach( $student_arr as $student ) {
                $written = 'written'.$student;
                $mcq = 'mcq'.$student;
                $practical = 'practical'.$student;
                $total = 'total'.$student;
                $grade = 'grade'.$student;
                $gpa = 'gpa'.$student;

                $result = new AssignMarks;
                $result->year = date('Y');
                $result->class = $request->class;
                $result->section = $request->section;
                $result->student = $student;
                $result->exam = $request->exam;
                $result->subject = $request->subject;
                $result->written = $request->$written;
                $result->mcq = $request->$mcq;
                $result->practical = $request->$practical;
                $result->total_marks = $request->$total;
                $result->got_grade = $request->$grade;
                $result->got_gpa = $request->$gpa;
                $result->save();
            }
            return redirect('/assign-marks')->with('message','Marks Added Successfully!');
        }
    }

    public function loadStudents(Request $request)
    {
        if($request->ajax()){
            $output = '<table class="table table-hover table-border">
                            <thead>
                                <th style="width:10%">Roll</th>
                                <th style="width:20%">Name</th>
                                <th style="width:12%">Written</th>
                                <th style="width:12%">MCQ</th>
                                <th style="width:12%">Practical</th>
                                <th style="width:34%">Marks -- Grade -- GPA</th>
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
                                            <input type="number" step="any" style="max-width:100px;" class="form-control written-mark" name="written'.$student->id.'" value="">
                                        </td>
                                        <td>
                                            <input type="number" step="any" style="max-width:100px;" class="form-control mcq-mark" name="mcq'.$student->id.'" value="">
                                        </td>
                                        <td>
                                            <input type="number" step="any" style="max-width:100px;" class="form-control practical-mark" name="practical'.$student->id.'" value="">
                                        </td>
                                        <td>
                                            <input type="number" step="any" style="width:60px; position:relative; padding:5px;" class="total-mark" name="total'.$student->id.'" value="" readonly>
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
                                            <input type="number" step="any" style="max-width:100px;" class="form-control written-mark" name="written'.$student->id.'" value="">
                                        </td>
                                        <td>
                                            <input type="number" step="any" style="max-width:100px;" class="form-control mcq-mark" name="mcq'.$student->id.'" value="">
                                        </td>
                                        <td>
                                            <input type="number" step="any" style="max-width:100px;" class="form-control practical-mark" name="practical'.$student->id.'" value="">
                                        </td>
                                        <td>
                                            <input type="number" step="any" style="width:60px; position:relative; padding:5px;" class="total-mark" name="total'.$student->id.'" value="" readonly>
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
                            $("#allStudentsforAssignMarks").delegate(".written-mark","keyup",function(){
                                var written_mark = $(this);
                                calculate_marks(written_mark);
                            })
                            $("#allStudentsforAssignMarks").delegate(".mcq-mark","keyup",function(){
                                var mcq_mark = $(this);
                                calculate_marks(mcq_mark);
                            })
                            $("#allStudentsforAssignMarks").delegate(".practical-mark","keyup",function(){
                                var practical_mark = $(this);
                                calculate_marks(practical_mark);
                            })

                            function calculate_marks(practical_mark){
                                var tr = practical_mark.parent().parent();
                                var written = tr.find(".written-mark").val();
                                var mcq = tr.find(".mcq-mark").val();
                                var practical = tr.find(".practical-mark").val();
                                var total =0;
                                var total =((written*1)+(mcq*1)+(practical*1));
                                if( total >= 80){
                                    tr.find(".grade").val("A+");
                                    tr.find(".gpa").val(5);
                                }else if( total >= 70){
                                    tr.find(".grade").val("A");
                                    tr.find(".gpa").val(4);
                                }else if( total >= 60){
                                    tr.find(".grade").val("A-");
                                    tr.find(".gpa").val(3.5);
                                }else if( total >= 50){
                                    tr.find(".grade").val("B");
                                    tr.find(".gpa").val(3);
                                }else if( total >= 40){
                                    tr.find(".grade").val("C");
                                    tr.find(".gpa").val(2);
                                }else if( total >= 33){
                                    tr.find(".grade").val("D");
                                    tr.find(".gpa").val(1);
                                }else{
                                    tr.find(".grade").val("F");
                                    tr.find(".gpa").val(0);
                                }
                                if (isNaN(practical_mark.val())) {
                                    alert("Please Enter a Valid Mark!");
                                    practical_mark.val(0);
                                }else{
                                    tr.find(".total-mark").val(total);
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
        $classes = DB::table('classes')->where('classes_rank', '>', 8)->where('classes_rank', '<', 13)->get();
        $sections = Sections::all();
        $subjects = DB::table('subjects')->where('subject_class', '=', 10)->get();
        $exams = DB::table('examinations')->where('exam_class', '=', '10')->get();
        return view('results.view-results',['sections'=>$sections,'classes'=>$classes,'subjects'=>$subjects,'exams'=>$exams]);
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
                                    <th style="width:24%">Name</th>
                                    <th style="width:11%">Written</th>
                                    <th style="width:11%">MCQ</th>
                                    <th style="width:12%">Practical</th>
                                    <th style="width:12%">Total Marks</th>
                                    <th style="width:10%">Grade</th>
                                    <th style="width:10%">GPA</th>
                                </thead>
                                <tbody>
                            ';
            }else{
                $output = '<table class="table table-hover table-border">
                                <thead><th colspan="8" class="alert alert-primary">Class : '.$cls_name->classes_name.' - Section : '.$section->sections_name.' || Subject : '.$subject->subject_name.' And Exam : '.$exam->name.'</th></thead>
                                <thead>
                                    <th style="width:10%">Roll</th>
                                    <th style="width:24%">Name</th>
                                    <th style="width:11%">Written</th>
                                    <th style="width:11%">MCQ</th>
                                    <th style="width:12%">Practical</th>
                                    <th style="width:12%">Total Marks</th>
                                    <th style="width:10%">Grade</th>
                                    <th style="width:10%">GPA</th>
                                </thead>
                                <tbody>
                            ';
            }
            if ( $section_result == '' ) {
                $students = DB::table('assign_marks')
                            ->join('students', 'assign_marks.student', '=', 'students.id')
                            ->select('assign_marks.*', 'students.name as student_name', 'students.roll as student_roll')
                            ->where('class','=',$class_result)
                            ->where('exam','=',$exam_result)
                            ->where('subject','=',$subject_result)
                            ->orderBy('id', 'asc')
                            ->get();
                $total_student = $students->count();
                if ($total_student > 0) {
                    foreach ($students as $student) {
                        $practical = $student->practical ? $student->practical : '-';
                        $output .=' <tr>
                                        <td>'.$student->student_roll.'</td>
                                        <td>'.$student->student_name.'</td>
                                        <td>'.$student->written.'</td>
                                        <td>'.$student->mcq.'</td>
                                        <td>'.$practical.'</td>
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
                $students = DB::table('assign_marks')
                            ->join('students', 'assign_marks.student', '=', 'students.id')
                            ->select('assign_marks.*', 'students.name as student_name', 'students.roll as student_roll')
                            ->where('class','=',$class_result)
                            ->where('section','=',$section_result)
                            ->where('exam','=',$exam_result)
                            ->where('subject','=',$subject_result)
                            ->orderBy('id', 'asc')
                            ->get();
                $total_student = $students->count();
                if ($total_student > 0) {
                    foreach ($students as $student) {
                        $practical = $student->practical ? $student->practical : '-';
                        $output .=' <tr>
                                        <td>'.$student->student_roll.'</td>
                                        <td>'.$student->student_name.'</td>
                                        <td>'.$student->written.'</td>
                                        <td>'.$student->mcq.'</td>
                                        <td>'.$practical.'</td>
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

    public function edit(AssignMarks $assignMarks)
    {
        //
    }

    public function update(Request $request, AssignMarks $assignMarks)
    {
        //
    }

    public function destroy(AssignMarks $assignMarks)
    {
        //
    }
}
