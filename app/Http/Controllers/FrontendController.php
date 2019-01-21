<?php

namespace App\Http\Controllers;

use App\Slider;
use App\Notices;
use DB;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function index()
    {
        $contacts = DB::table('contacts')
                  ->orderBy('id', 'desc')
                  ->limit(1)
                  ->get();
        $logos = DB::table('logos')
                  ->orderBy('id', 'desc')
                  ->limit(1)
                  ->get();
        $sliders = DB::table('sliders')
                  ->orderBy('id', 'desc')
                  ->limit(5)
                  ->get();
        $favicons = DB::table('favicons')
                  ->orderBy('id', 'desc')
                  ->limit(1)
                  ->get();
        $teachers = DB::table('teachers')
                  ->orderBy('id', 'desc')
                  ->get();
        return view('frontend.home',['contacts'=>$contacts, 'logos'=>$logos, 'sliders'=>$sliders, 'favicons'=>$favicons, 'teachers'=>$teachers]);
    }

    public function notice()
    {
        $contacts = DB::table('contacts')
                  ->orderBy('id', 'desc')
                  ->limit(1)
                  ->get();
        $logos = DB::table('logos')
                  ->orderBy('id', 'desc')
                  ->limit(1)
                  ->get();
        $favicons = DB::table('favicons')
                  ->orderBy('id', 'desc')
                  ->limit(1)
                  ->get();

        $notices = DB::table('notices')
                  ->orderBy('id', 'desc')
                  ->limit(10)
                  ->get();

        $notices_more = DB::table('notices')
                  ->orderBy('id', 'desc')
                  ->limit(10)
                  ->offset(10)
                  ->get();
        return view('frontend.notice',['contacts'=>$contacts, 'favicons'=>$favicons, 'notices'=>$notices, 'notices_more'=>$notices_more, 'logos'=>$logos]);
    }

    public function courses()
    {
        $contacts = DB::table('contacts')
                  ->orderBy('id', 'desc')
                  ->limit(1)
                  ->get();
        $logos = DB::table('logos')
                  ->orderBy('id', 'desc')
                  ->limit(1)
                  ->get();
        $favicons = DB::table('favicons')
                  ->orderBy('id', 'desc')
                  ->limit(1)
                  ->get();
        return view('frontend.courses',['contacts'=>$contacts, 'favicons'=>$favicons, 'logos'=>$logos]);
    }
    
    public function registration()
    {
        $contacts = DB::table('contacts')
                  ->orderBy('id', 'desc')
                  ->limit(1)
                  ->get();
        $logos = DB::table('logos')
                  ->orderBy('id', 'desc')
                  ->limit(1)
                  ->get();
        $favicons = DB::table('favicons')
                  ->orderBy('id', 'desc')
                  ->limit(1)
                  ->get();
        return view('frontend.registration',['contacts'=>$contacts, 'favicons'=>$favicons, 'logos'=>$logos]);
    }
    
    public function aboutus()
    {
        $contacts = DB::table('contacts')
                  ->orderBy('id', 'desc')
                  ->limit(1)
                  ->get();
        $logos = DB::table('logos')
                  ->orderBy('id', 'desc')
                  ->limit(1)
                  ->get();
        $favicons = DB::table('favicons')
                  ->orderBy('id', 'desc')
                  ->limit(1)
                  ->get();
        return view('frontend.aboutus',['contacts'=>$contacts, 'favicons'=>$favicons, 'logos'=>$logos]);
    }
    
    public function contactus()
    {
        $contacts = DB::table('contacts')
                  ->orderBy('id', 'desc')
                  ->limit(1)
                  ->get();
        $logos = DB::table('logos')
                  ->orderBy('id', 'desc')
                  ->limit(1)
                  ->get();
        $favicons = DB::table('favicons')
                  ->orderBy('id', 'desc')
                  ->limit(1)
                  ->get();
        return view('frontend.contactus',['contacts'=>$contacts, 'favicons'=>$favicons, 'logos'=>$logos]);
    }

    public function teachers()
    {
        $contacts = DB::table('contacts')
                  ->orderBy('id', 'desc')
                  ->limit(1)
                  ->get();
        $logos = DB::table('logos')
                  ->orderBy('id', 'desc')
                  ->limit(1)
                  ->get();
        $favicons = DB::table('favicons')
                  ->orderBy('id', 'desc')
                  ->get();
        $teachers = DB::table('teachers')
                  ->orderBy('id', 'desc')
                  ->paginate(8);
        return view('frontend.teachers',['contacts'=>$contacts, 'favicons'=>$favicons, 'teachers'=>$teachers, 'logos'=>$logos]);
    }

}
