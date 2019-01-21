<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Teacher;
use App\Students;

class HomeController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $teachers = Teacher::all();
        $teachers = $teachers->count();
        $students = Students::all();
        $students = $students->count();
        return view('dashboard.home',['teachers'=>$teachers,'students'=>$students]);
    }
}
