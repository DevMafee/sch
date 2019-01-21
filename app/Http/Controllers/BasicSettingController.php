<?php

namespace App\Http\Controllers;

use App\basicSetting;
use Illuminate\Http\Request;
use App\Slider;
use App\Favicons;
use App\Logos;
use App\Contacts;
use DB;
use Illuminate\Support\Facades\Storage;

class BasicSettingController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $contacts = DB::table('contacts')
                  ->orderBy('id', 'desc')
                  ->limit(5)
                  ->get();
        $sliders = DB::table('sliders')
                  ->orderBy('id', 'desc')
                  ->limit(5)
                  ->get();
        $favicons = DB::table('favicons')
                  ->orderBy('id', 'desc')
                  ->limit(5)
                  ->get();
        $logos = DB::table('logos')
                  ->orderBy('id', 'desc')
                  ->limit(5)
                  ->get();
        return view('dashboard.basic-settings',['contacts'=>$contacts, 'sliders'=>$sliders, 'favicons'=>$favicons, 'logos'=>$logos]);
    }

    public function addContactNumber(Request $request)
    {
        $data = new Contacts();
        $data->phone = $request->phone;
        $data->email = $request->email;
        $data->address = $request->address;
        $data->save();
        return redirect('/basic-setting')->with('message','Contact Added Successfully!');
    }

    public function deleteContactNumber( $id )
    {
        $data = Contacts::find($id);
        $data->delete();
        return redirect('/basic-setting')->with('message','Contact has been Deleted Successfully!');
    }

    public function addSlider(Request $request)
    {
        $photo = $request->file('photo');
        $extension = $photo->getClientOriginalExtension();
        $fileName = 'slider-'.time().'.'.$extension;
        $photo->move('public/sliders/',$fileName);

        $data = new Slider();
        $data->title = $request->title;
        $data->photo = $fileName;

        $data->save();
        return redirect('/basic-setting')->with('message','Slider Added Successfully!');
    }

    public function deleteSlider( $id )
    {
        $data = Slider::find($id);
        if (Storage::has('sliders/'.$data->photo)) {
            Storage::delete('sliders/'.$data->photo);
        }
        $data->delete();
        return redirect('/basic-setting')->with('message','Slider Deleted Successfully!');
    }

    public function addFavicon(Request $request)
    {
        $photo = $request->file('photo');
        $extension = $photo->getClientOriginalExtension();
        $fileName = 'favicon-'.time().'.'.$extension;
        $photo->move('public/favicons/',$fileName);

        $data = new Favicons();
        $data->photo = $fileName;

        $data->save();
        return redirect('/basic-setting')->with('message','Favicon Added Successfully!');
    }

    public function deleteFavicon( $id )
    {
        $data = Favicons::find($id);
        if (Storage::has('favicons/'.$data->photo)) {
            Storage::delete('favicons/'.$data->photo);
            $data->delete();
            $message = 'Favicon Deleted Successfully!';
        }else{
            $message = 'Can not Delete';
        }
        return redirect('/basic-setting')->with('message', $message);
    }


    public function addLogo(Request $request)
    {
        $photo = $request->file('photo');
        $extension = $photo->getClientOriginalExtension();
        $fileName = 'logo-'.time().'.'.$extension;
        $photo->move('public/logos/',$fileName);

        $data = new Logos();
        $data->photo = $fileName;

        $data->save();
        return redirect('/basic-setting')->with('message','Logo Added Successfully!');
    }

    public function deleteLogo( $id )
    {
        $data = Logos::find($id);
        if (Storage::has('logos/'.$data->photo)) {
            Storage::delete('logos/'.$data->photo);
            $data->delete();
            $message = 'Logo Deleted Successfully!';
        }else{
            $message = 'Can not Delete';
        }
        return redirect('/basic-setting')->with('message', $message);
    }

}
