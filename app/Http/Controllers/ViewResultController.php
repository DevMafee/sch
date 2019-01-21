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

class ViewResultController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function viewSingleResultPlayToFive(Request $request)
    {
        if($request->ajax()){
            $studentID = $request->get('studentID');
            $studentClass = $request->get('studentClass');
            $year = date('Y');
            
            $output = '<table class="table table-hover table-border" style="max-width:1000px; overflow-y:scroll;">
		                    <thead>
		                    	<tr>
		                            <th rowspan="2" style="border:1px solid #CCC;">Subjects</th>
		                            <th rowspan="2" class="hideOnPrint" style="border:1px solid #CCC;">Total</th>
		                            <th rowspan="2" class="hideOnPrint" style="border:1px solid #CCC;">Pass Mark</th>
		                            <th colspan="3" style="border:1px solid #CCC;text-align:center;">First Term</th>
		                            <th colspan="3" style="border:1px solid #CCC;text-align:center;">Second Term</th>
		                            <th colspan="3" style="border:1px solid #CCC;text-align:center;">Final Exam</th>
		                            <th rowspan="2" style="border:1px solid #CCC;">Total</th>
		                            <th rowspan="2" style="border:1px solid #CCC;">Average</th>
		                            <th rowspan="2" style="border:1px solid #CCC;">GPA</th>
		                        </tr>
		                        <tr>
		                        	<th style="border:1px solid #CCC;">Obtained</th>
		                        	<th style="border:1px solid #CCC;">Highest</th>
		                        	<th style="border:1px solid #CCC;">Grade</th>
		                        	
		                        	<th style="border:1px solid #CCC;">Obtained</th>
		                        	<th style="border:1px solid #CCC;">Highest</th>
		                        	<th style="border:1px solid #CCC;">Grade</th>
		                        	
		                        	<th style="border:1px solid #CCC;">Obtained</th>
		                        	<th style="border:1px solid #CCC;">Highest</th>
		                        	<th style="border:1px solid #CCC;">Grade</th>
		                        </tr>
		                    </thead>
		                    <tbody>';
            $subject_results = DB::table('subjects')
                            ->where('subject_class','=', '5')
                            ->orderBy('id', 'asc')
                            ->get();

            $total_subject_results = $subject_results->count();
            if ($total_subject_results > 0) {

                foreach ($subject_results as $subject_result) {
                	$first_term_total_mark = '-';
                	$first_term_total_mark_grade = '-';
                	$second_term_total_mark = '-';
                	$second_term_total_mark_grade = '-';
                	$final_mark_total_mark = '-';
                	$final_mark_total_mark_grade = '-';

                	$subject = $subject_result->id;

                    $exams = DB::table('examinations')->where('exam_class', '=', '5')->get();
                    $i = 1;
                    foreach ($exams as $exam) {
                        $examID[$i] = $exam->id;
                        $i++;
                    }
                	
                	$max_marks_first = DB::table('playto_five_results')
                						->where('subject', '=', $subject)
                                        ->where('year', '=', $year)
                						->where('class', '=', $studentClass)
                						->where('exam', '=', $examID[1])
                						->max('total_marks');
                	$max_marks_second = DB::table('playto_five_results')
                						->where('subject', '=', $subject)
                                        ->where('year', '=', $year)
                						->where('class', '=', $studentClass)
                						->where('exam', '=', $examID[2])
                						->max('total_marks');
                	$max_marks_final = DB::table('playto_five_results')
                						->where('subject', '=', $subject)
                                        ->where('year', '=', $year)
                						->where('class', '=', $studentClass)
                						->where('exam', '=', $examID[3])
                						->max('total_marks');
                	if ( is_null($max_marks_first) ) {
                		$max_marks_first = '-';
                	}
                	if ( is_null($max_marks_second) ) {
                		$max_marks_second = '-';
                	}
                	if ( is_null($max_marks_final) ) {
                		$max_marks_final = '-';
                	}
                	$first_term_marks = DB::select('SELECT * FROM playto_five_results WHERE subject='.$subject.' AND exam='.$examID[1].' AND student='.$studentID.' AND year='.$year);

                	foreach ($first_term_marks as $first_term_mark) {
                		$first_term_total_mark = $first_term_mark->total_marks;
                		$first_term_total_mark_grade = $first_term_mark->got_grade;
                	}
                	$second_term_marks = DB::select('SELECT * FROM playto_five_results WHERE subject='.$subject.' AND exam='.$examID[2].' AND student='.$studentID.' AND year='.$year);

                	foreach ($second_term_marks as $second_term_mark) {
                		$second_term_total_mark = $second_term_mark->total_marks;
                		$second_term_total_mark_grade = $second_term_mark->got_grade;
                	}
                	$final_marks = DB::select('SELECT * FROM playto_five_results WHERE subject='.$subject.' AND exam='.$examID[3].' AND student='.$studentID.' AND year='.$year);

                	foreach ($final_marks as $final_mark) {
                		$final_mark_total_mark = $final_mark->total_marks;
                		$final_mark_total_mark_grade = $final_mark->got_grade;
                	}
                	
                	if ($first_term_total_mark != 0 && $second_term_total_mark != 0 && $final_mark_total_mark != 0) {
                		$grand_total = ($first_term_total_mark * 1) + ($second_term_total_mark * 1) + ($final_mark_total_mark * 1);
                		$average_marks = round( $grand_total / 3 );
                	}else if ($first_term_total_mark != 0 && $second_term_total_mark != 0 && $final_mark_total_mark == 0) {
                		$grand_total = ($first_term_total_mark * 1) + ($second_term_total_mark * 1);
                		$average_marks = round( $grand_total / 2 );
                	}else if ($first_term_total_mark != 0 && $second_term_total_mark == 0 && $final_mark_total_mark == 0) {
                		$grand_total = ($first_term_total_mark * 1);
                		$average_marks = ( $grand_total / 1 );
                	}else {
                		$grand_total = 0;
                		$average_marks = 0;
                	}

		            if ($average_marks >= 90) {
		            	$got__gpa = 'A+';
		            }else if ($average_marks >= 80) {
		            	$got__gpa = 'A';
		            }else if ($average_marks >= 70) {
		            	$got__gpa = 'A-';
		            }else if ($average_marks >= 60) {
		            	$got__gpa = 'B';
		            }else if ($average_marks >= 50) {
		            	$got__gpa = 'C';
		            }else if ($average_marks >= 40) {
		            	$got__gpa = 'D';
		            }else{
		            	$got__gpa = 'F';
		            }

               
		            $output .=' <tr>
		                            <td>'.$subject_result->subject_name.'</td>
		                            <td class="hideOnPrint">'.$subject_result->subject_mark.'</td>
		                            <td class="hideOnPrint">'.$subject_result->subject_pass_mark.'</td>
		                            <td>'.$first_term_total_mark.'</td>
		                            <td>'.$max_marks_first.'</td>
		                            <td>'.$first_term_total_mark_grade.'</td>
		                            <td>'.$second_term_total_mark.'</td>
		                            <td>'.$max_marks_second.'</td>
		                            <td>'.$second_term_total_mark_grade.'</td>
		                            <td>'.$final_mark_total_mark.'</td>
		                            <td>'.$max_marks_final.'</td>
		                            <td>'.$final_mark_total_mark_grade.'</td>
		                            <td>'.$grand_total.'</td>
		                            <td>'.$average_marks.'</td>
		                            <td>'.$got__gpa.'</td>
		                        </tr>';
                }

            }else{
                $output .= '
                    			<tr><td colspan="15" style="text-align:center;"><h4>No Data Found!</h4></td></tr>
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


    public function viewSingleResultSixToEight(Request $request)
    {
        if($request->ajax()){
            $studentID = $request->get('studentID');
            $studentClass = $request->get('studentClass');
            $year = date('Y');
            
            $output = '<table class="table table-hover table-border" style="max-width:1000px; overflow-y:scroll;">
		                    <thead>
		                    	<tr>
		                            <th rowspan="2" style="border:1px solid #CCC;">Subjects</th>
		                            <th rowspan="2" class="hideOnPrint" style="border:1px solid #CCC;">Total</th>
		                            <th rowspan="2" class="hideOnPrint" style="border:1px solid #CCC;">Pass Mark</th>
		                            <th colspan="3" style="border:1px solid #CCC;text-align:center;">Half Yearly</th>
                                    <th colspan="3" style="border:1px solid #CCC;text-align:center;">Final Exam</th>
		                            <th colspan="3" style="border:1px solid #CCC;text-align:center;">Avg. of Two Examination</th>
		                        </tr>
		                        <tr>
		                        	<th style="border:1px solid #CCC;">Obtained</th>
		                        	<th style="border:1px solid #CCC;">Highest</th>
		                        	<th style="border:1px solid #CCC;">Grade</th>
		                        	
		                        	<th style="border:1px solid #CCC;">Obtained</th>
		                        	<th style="border:1px solid #CCC;">Highest</th>
		                        	<th style="border:1px solid #CCC;">Grade</th>

                                    <th style="border:1px solid #CCC;">Total</th>
                                    <th style="border:1px solid #CCC;">Average</th>
                                    <th style="border:1px solid #CCC;">GPA</th>
		                        </tr>
		                    </thead>
		                    <tbody>';
            $subject_results = DB::table('subjects')
                            ->where('subject_class','=', '8')
                            ->orderBy('id', 'asc')
                            ->get();

            $total_subject_results = $subject_results->count();
            if ($total_subject_results > 0) {

                foreach ($subject_results as $subject_result) {
                	$half_yearly_total_mark = '-';
                	$half_yearly_total_mark_grade = '-';
                	$final_exam_mark_total_mark = '-';
                	$final_exam_mark_total_mark_grade = '-';

                	$subject = $subject_result->id;

                	$exams = DB::table('examinations')->where('exam_class', '=', '8')->get();
                    $i = 1;
                    foreach ($exams as $exam) {
                        $examID[$i] = $exam->id;
                        $i++;
                    }

                	$max_marks_half_yearly = DB::table('six_to_eight_results')
                						->where('subject', '=', $subject)
                						->where('year', '=', $year)
                                        ->where('class', '=', $studentClass)
                						->where('exam', '=', $examID[1])
                						->max('total_marks');
                	$max_marks_final_exam = DB::table('six_to_eight_results')
                						->where('subject', '=', $subject)
                						->where('year', '=', $year)
                                        ->where('class', '=', $studentClass)
                						->where('exam', '=', $examID[2])
                						->max('total_marks');

                	if ( is_null($max_marks_half_yearly) ) {
                		$max_marks_half_yearly = '-';
                	}
                	if ( is_null($max_marks_final_exam) ) {
                		$max_marks_final_exam = '-';
                	}

                	$marks_half_yearly = DB::select('SELECT * FROM six_to_eight_results WHERE subject='.$subject.' AND exam='.$examID[1].' AND student='.$studentID.' AND year='.$year);

                	foreach ($marks_half_yearly as $mark_half_yearly) {
                		$half_yearly_total_mark = $mark_half_yearly->total_marks;
                		$half_yearly_total_mark_grade = $mark_half_yearly->got_grade;
                	}

                	$final_exam_marks = DB::select('SELECT * FROM six_to_eight_results WHERE subject='.$subject.' AND exam='.$examID[2].' AND student='.$studentID.' AND year='.$year);

                	foreach ($final_exam_marks as $final_exam_mark) {
                		$final_exam_mark_total_mark = $final_exam_mark->total_marks;
                		$final_exam_mark_total_mark_grade = $final_exam_mark->got_grade;
                	}
                	                	
                	if ($half_yearly_total_mark != 0 && $final_exam_mark_total_mark != 0 ) {
                		$grand_total = ($half_yearly_total_mark * 1) + ($final_exam_mark_total_mark * 1);
                		$average_marks = round( $grand_total / 2 );
                	}else if ($half_yearly_total_mark != 0 && $final_exam_mark_total_mark == 0 ) {
                		$grand_total = ($half_yearly_total_mark * 1);
                		$average_marks = round( $grand_total );
                	}else {
                		$grand_total = 0;
                		$average_marks = 0;
                	}

		            if ($average_marks >= 80) {
		            	$got__gpa = 'A+';
		            }else if ($average_marks >= 70) {
		            	$got__gpa = 'A';
		            }else if ($average_marks >= 60) {
		            	$got__gpa = 'A-';
		            }else if ($average_marks >= 50) {
		            	$got__gpa = 'B';
		            }else if ($average_marks >= 40) {
		            	$got__gpa = 'C';
		            }else if ($average_marks >= 33) {
		            	$got__gpa = 'D';
		            }else{
		            	$got__gpa = 'F';
		            }

               
		            $output .=' <tr>
		                            <td>'.$subject_result->subject_name.'</td>
		                            <td class="hideOnPrint">'.$subject_result->subject_mark.'</td>
		                            <td class="hideOnPrint">'.$subject_result->subject_pass_mark.'</td>
		                            <td>'.$half_yearly_total_mark.'</td>
		                            <td>'.$max_marks_half_yearly.'</td>
		                            <td>'.$half_yearly_total_mark_grade.'</td>
		                            <td>'.$final_exam_mark_total_mark.'</td>
		                            <td>'.$max_marks_final_exam.'</td>
		                            <td>'.$final_exam_mark_total_mark_grade.'</td>
		                            <td>'.$grand_total.'</td>
		                            <td>'.$average_marks.'</td>
		                            <td>'.$got__gpa.'</td>
		                        </tr>';
                }

            }else{
                $output .= '
                    			<tr><td colspan="15" style="text-align:center;"><h4>No Data Found!</h4></td></tr>
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


    public function viewSingleResultNineToTen(Request $request)
    {
        if($request->ajax()){
            $studentID = $request->get('studentID');
            $studentClass = $request->get('studentClass');
            $year = date('Y');
            
            $output = '<table class="table table-hover table-border" style="max-width:1000px; overflow-y:scroll;">
		                    <thead>
		                    	<tr>
		                            <th rowspan="2" style="border:1px solid #CCC;">Subjects</th>
		                            <th rowspan="2" style="border:1px solid #CCC;" class="hideOnPrint">Total</th>
		                            <th rowspan="2" style="border:1px solid #CCC;" class="hideOnPrint">Pass Mark</th>
		                            <th colspan="3" style="border:1px solid #CCC;text-align:center;">First Term</th>
		                            <th colspan="3" style="border:1px solid #CCC;text-align:center;">Second Term</th>
		                            <th colspan="3" style="border:1px solid #CCC;text-align:center;">Final Exam</th>
		                            <th rowspan="2" style="border:1px solid #CCC;">Total</th>
		                            <th rowspan="2" style="border:1px solid #CCC;">Average</th>
		                            <th rowspan="2" style="border:1px solid #CCC;">GPA</th>
		                        </tr>
		                        <tr>
		                        	<th style="border:1px solid #CCC;">Obtained</th>
		                        	<th style="border:1px solid #CCC;">Highest</th>
		                        	<th style="border:1px solid #CCC;">Grade</th>
		                        	
		                        	<th style="border:1px solid #CCC;">Obtained</th>
		                        	<th style="border:1px solid #CCC;">Highest</th>
		                        	<th style="border:1px solid #CCC;">Grade</th>
		                        	
		                        	<th style="border:1px solid #CCC;">Obtained</th>
		                        	<th style="border:1px solid #CCC;">Highest</th>
		                        	<th style="border:1px solid #CCC;">Grade</th>
		                        </tr>
		                    </thead>
		                    <tbody>';
            $subject_results = DB::table('subjects')
                            ->where('subject_class','=', '10')
                            ->orderBy('id', 'asc')
                            ->get();

            $total_subject_results = $subject_results->count();
            if ($total_subject_results > 0) {

                foreach ($subject_results as $subject_result) {
                	$first_term_total_mark = '-';
                	$first_term_total_mark_grade = '-';
                	$second_term_total_mark = '-';
                	$second_term_total_mark_grade = '-';
                	$final_mark_total_mark = '-';
                	$final_mark_total_mark_grade = '-';

                	$subject = $subject_result->id;
                	$exams = DB::table('examinations')->where('exam_class', '=', '10')->get();
                    $i = 1;
                    foreach ($exams as $exam) {
                        $examID[$i] = $exam->id;
                        $i++;
                    }

                	$max_marks_first = DB::table('assign_marks')
                						->where('subject', '=', $subject)
                						->where('year', '=', $year)
                                        ->where('class', '=', $studentClass)
                						->where('exam', '=', $examID[1])
                						->max('total_marks');
                	$max_marks_second = DB::table('assign_marks')
                						->where('subject', '=', $subject)
                						->where('year', '=', $year)
                                        ->where('class', '=', $studentClass)
                						->where('exam', '=', $examID[2])
                						->max('total_marks');
                	$max_marks_final = DB::table('assign_marks')
                						->where('subject', '=', $subject)
                						->where('year', '=', $year)
                                        ->where('class', '=', $studentClass)
                						->where('exam', '=', $examID[3])
                						->max('total_marks');
                	if ( is_null($max_marks_first) ) {
                		$max_marks_first = '-';
                	}
                	if ( is_null($max_marks_second) ) {
                		$max_marks_second = '-';
                	}
                	if ( is_null($max_marks_final) ) {
                		$max_marks_final = '-';
                	}
                	$first_term_marks = DB::select('SELECT * FROM assign_marks WHERE subject='.$subject.' AND exam='.$examID[1].' AND student='.$studentID.' AND year='.$year);

                	foreach ($first_term_marks as $first_term_mark) {
                		$first_term_total_mark = $first_term_mark->total_marks;
                		$first_term_total_mark_grade = $first_term_mark->got_grade;
                	}
                	$second_term_marks = DB::select('SELECT * FROM assign_marks WHERE subject='.$subject.' AND exam='.$examID[2].' AND student='.$studentID.' AND year='.$year);

                	foreach ($second_term_marks as $second_term_mark) {
                		$second_term_total_mark = $second_term_mark->total_marks;
                		$second_term_total_mark_grade = $second_term_mark->got_grade;
                	}
                	$final_marks = DB::select('SELECT * FROM assign_marks WHERE subject='.$subject.' AND exam='.$examID[3].' AND student='.$studentID.' AND year='.$year);

                	foreach ($final_marks as $final_mark) {
                		$final_mark_total_mark = $final_mark->total_marks;
                		$final_mark_total_mark_grade = $final_mark->got_grade;
                	}
                	
                	if ($first_term_total_mark != 0 && $second_term_total_mark != 0 && $final_mark_total_mark != 0) {
                		$grand_total = ($first_term_total_mark * 1) + ($second_term_total_mark * 1) + ($final_mark_total_mark * 1);
                		$average_marks = round( $grand_total / 3 );
                	}else if ($first_term_total_mark != 0 && $second_term_total_mark != 0 && $final_mark_total_mark == 0) {
                		$grand_total = ($first_term_total_mark * 1) + ($second_term_total_mark * 1);
                		$average_marks = round( $grand_total / 2 );
                	}else if ($first_term_total_mark != 0 && $second_term_total_mark == 0 && $final_mark_total_mark == 0) {
                		$grand_total = ($first_term_total_mark * 1);
                		$average_marks = ( $grand_total / 1 );
                	}else {
                		$grand_total = 0;
                		$average_marks = 0;
                	}

		            if ($average_marks >= 80) {
		            	$got__gpa = 'A+';
		            }else if ($average_marks >= 70) {
		            	$got__gpa = 'A';
		            }else if ($average_marks >= 60) {
		            	$got__gpa = 'A-';
		            }else if ($average_marks >= 50) {
		            	$got__gpa = 'B';
		            }else if ($average_marks >= 40) {
		            	$got__gpa = 'C';
		            }else if ($average_marks >= 33) {
		            	$got__gpa = 'D';
		            }else{
		            	$got__gpa = 'F';
		            }

               
		            $output .=' <tr>
		                            <td>'.$subject_result->subject_name.'</td>
		                            <td class="hideOnPrint">'.$subject_result->subject_mark.'</td>
		                            <td class="hideOnPrint">'.$subject_result->subject_pass_mark.'</td>
		                            <td>'.$first_term_total_mark.'</td>
		                            <td>'.$max_marks_first.'</td>
		                            <td>'.$first_term_total_mark_grade.'</td>
		                            <td>'.$second_term_total_mark.'</td>
		                            <td>'.$max_marks_second.'</td>
		                            <td>'.$second_term_total_mark_grade.'</td>
		                            <td>'.$final_mark_total_mark.'</td>
		                            <td>'.$max_marks_final.'</td>
		                            <td>'.$final_mark_total_mark_grade.'</td>
		                            <td>'.$grand_total.'</td>
		                            <td>'.$average_marks.'</td>
		                            <td>'.$got__gpa.'</td>
		                        </tr>';
                }

            }else{
                $output .= '
                    			<tr><td colspan="15" style="text-align:center;"><h4>No Data Found!</h4></td></tr>
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


}
