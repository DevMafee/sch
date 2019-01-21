<?php

namespace App\Http\Controllers;

use App\Cashcollection;
use App\Classes;
use App\Feetype;
use App\Students;
use DB;
use App\Session;
use App\Sections;
// use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class CashcollectionController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $cashcollections = DB::table('cashcollections')
                    ->join('students', 'cashcollections.student', '=', 'students.id')
                    ->join('classes', 'cashcollections.class', '=', 'classes.classes_rank')
                    ->join('feetypes', 'cashcollections.feetype', '=', 'feetypes.id')
                    ->select('cashcollections.*', 'students.name as std_name', 'classes.classes_name as class_name', 'feetypes.type_name as fee_type_name')
                    ->orderBy('cashcollections.id', 'desc')
                    ->get();
        $classes = Classes::all();
        $feetypes = Feetype::all();
        $students = Students::all();
        return view('accounts.fee-collection',['cashcollections'=>$cashcollections, 'classes'=> $classes, 'feetypes'=> $feetypes, 'students'=> $students]);
    }

    public function create(Request $request)
    {
        $data = new Cashcollection();
        $data->type_name = $request->type_name;
        $data->save();
        return redirect('/fee-type')->with('message','Fee Type Added Successfully!');
    }

    public function update(Request $request)
    {
        $data = Cashcollection::find($request->id);
        $data->type_name = $request->type_name;
        $data->save();
        return redirect('/fee-type')->with('message','Fee Type Updated Successfully!');
    }

    public function delete($id)
    {
        $data = Cashcollection::find($id);
        $data->delete();
        return redirect('/fee-type')->with('message','Fee Type Deleted Successfully!');
    }

    public function stdFeeLoad(Request $request)
    {
        $students = DB::table('students')
                    ->join('classes', 'students.class_id', '=', 'classes.id')
                    ->select('students.*', 'classes.classes_name as class_name')
                    ->where('reg_no', $request->std)
                    ->get();

        return $students;
    }
    
    // public function stdFeePayment(Request $request)
    // {
    //     // $std = $request->std;
    //     $students = DB::table('students')
    //                 ->join('classes', 'students.class_id', '=', 'classes.id')
    //                 ->select('students.*', 'classes.classes_name as class_name')
    //                 ->where('reg_no', $request->std)
    //                 ->get();

    //     return $students;
    // }
}
