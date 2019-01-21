<?php

namespace App\Http\Controllers;

use App\Classes;
use App\Monthlyfee;
use App\Incomeexpansehead;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AccountsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function setMonthlyFee(){
        $monthlyfees = DB::table('monthlyfees')
                    ->join('classes', 'monthlyfees.class', '=', 'classes.classes_rank')
                    ->select('monthlyfees.*', 'classes.classes_name as fee_for_class')
                    ->orderBy('classes.classes_rank', 'asc')
                    ->get();
        $classes = Classes::all();
        return view('accounts.set-monthly-fee',['monthlyfees'=>$monthlyfees,'classes'=>$classes]);
    }
    public function setMonthlyFeeCreate(Request $request){
        $data = new Monthlyfee();
        $data->class = $request->class;
        $data->fee = $request->fee;
        $data->save();
        return redirect('/set-monthly-fee')->with('message','Fee Added Successfully!');
    }
    public function setMonthlyFeeUpdate(Request $request){
        $data = Monthlyfee::find($request->id);
        $data->class = $request->class;
        $data->fee = $request->fee;
        $data->save();
        return redirect('/set-monthly-fee')->with('message','Fee Updated Successfully!');
    }
    public function setMonthlyFeeDelete($id){
        $data = Monthlyfee::find($id);
        $data->delete();
        return redirect('/set-monthly-fee')->with('message','Monthly Fee Deleted Successfully!');
    }

    // Income Expanse Head
    public function incomeExpanseHead(){
        $incomeexpanses = Incomeexpansehead::all();
        return view('accounts.incomeexpanses',['incomeexpanses'=>$incomeexpanses]);
    }
    public function incomeExpanseHeadCreate(Request $request){
        $data = new Incomeexpansehead();
        $data->headtype = $request->headtype;
        $data->head_name = $request->head_name;
        $data->save();
        return redirect('/setup-income-expanse-head')->with('message','Head Added Successfully!');
    }
    public function incomeExpanseHeadUpdate(Request $request){
        $data = Incomeexpansehead::find($request->id);
        $data->headtype = $request->headtype;
        $data->head_name = $request->head_name;
        $data->save();
        return redirect('/setup-income-expanse-head')->with('message','Head Updated Successfully!');
    }
    public function incomeExpanseHeadDelete($id){
        $data = Incomeexpansehead::find($id);
        $data->delete();
        return redirect('/setup-income-expanse-head')->with('message','Head Deleted Successfully!');
    }

}
