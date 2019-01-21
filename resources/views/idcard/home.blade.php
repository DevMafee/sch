@extends('master')

@section('title')
	ID Card View
@endsection

@section('mainContent')
@if(Session::has('message'))
  <div class="notification"><div class="alert alert-success alert-dismissible" style="background-color: #0CC508;" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>{{ Session::get('message') }}</div></div>
@endif
<ol class="simec_content">
    <span class="quick_link_left"><h5><b>ID Card View</b></h5></span>   
</ol>
<div class="grid-form">
	<div class="grid-form1">
		<div class="row pd-all-10">
      <div class="col-md-2 col-sm-2 col-xs-12"></div>
      <div class="col-md-4 col-sm-4 col-xs-12" style="height:505px;">
        <div class="card">
          <div class="card-body" style="height:505px; background-image: url('public/logos/id.png'); background-position: center; background-repeat: no-repeat; background-size: cover;">
            <center><img src="public/logos/logo.png" style="padding-top: 30px;"></center>
            <h4 style="text-align:center; color: black;"><b>সেনা পল্লী হাই স্কুল</b></h4>
            <center><img src="public/logos/demo.png" style="border: 2px solid #CCC;" width="100px" height="110px;"></center>
            <br>
            <div style="padding-left: 30px;">
              Name    : Mr. Demo Name <br>
              Class   : Six (VI)  Section : Boys (A)<br>
              Roll    : 102 <br>
              Session : 2019 <br>
            </div>
              <br>
              <br>
            <span style="padding-right: 15px; float: right;">
              <b>....................</b>
              <br>
              <b>প্রধান শিক্ষক</b>
            </span>

          </div>
        </div>
      </div>
      <div class="col-md-4 col-sm-4 col-xs-12" style="margin-top: -10px;">
        <div class="card">
          <div class="card-body" style="height:505px; background-image: url('public/logos/id_back.png'); background-position: center; background-repeat: no-repeat; background-size: cover;">
            <h4 style="text-align:center; color: black; padding-top: 40px;"><b>এই কার্ডটি পাওয়া গেলে অনুগ্রহ করে এই ঠিকানায় পৌঁছে দেওয়ার জন্য অনুরোধ করা হলো। </b></h4>
            <center><img src="public/logos/logo.png"></center>
            <br>
            <h2 style="text-align:center; color: black;"><b>সেনা পল্লী হাই স্কুল</b></h2>
            <h4 style="text-align:center; color: #ffffff; padding-top: 40px;"><b>ঢাকা ক্যান্টনমেন্ট বোর্ড, ঢাকা।</b><br><b>টেলিফোন : ৮৭১১৯৩৬</b></h4>
            <br>
            <p style="float: right; padding: 20px;">SIMEC System Ltd.</p>
          </div>
        </div>
      </div>
      <div class="col-md-2 col-sm-2 col-xs-12"></div>
    </div>
	</div>
</div>
<div class="clearfix"></div>
<!-- // Main Content -->
@endsection
