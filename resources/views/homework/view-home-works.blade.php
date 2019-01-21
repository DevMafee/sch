@extends('master')

@section('title')
	View Home Work
@endsection

@section('mainContent')
@if(Session::has('message'))
  <div class="notification"><div class="alert alert-success alert-dismissible" style="background-color: #0CC508;" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>{{ Session::get('message') }}</div></div>
@endif
<ol class="simec_content">
    <span class="quick_link_left"><h5><b>View Home Work</b></h5></span>
    <a class="quick_link_right btn btn-success" title="Set Home Works" href="{{ url('./home-works')}}"><i class="fa fa-plus-square"></i> Set New Home Work</a> 
</ol>
<div class="grid-form">
	<div class="grid-form1">
	  <div class="row pd-all-10">
      <div class="col-md-12 col-sm-12 col-xs-12 bg-info">
          <h5><strong>View Home Works :</strong></h5>
      </div>
      <div class="col-md-2 col-sm-2 col-xs-6">
          <div class="item form-group">
              <label for="class">Class <span class="required">*</span></label>
              <select  class="form-control col-md-7 col-xs-12" name="class" id="class">
                  <option value="">--Select --</option>
                @foreach($classes as $classe)
                  <option value="{{ $classe->id }}">{{ $classe->classes_name }}</option>
                @endforeach

              </select>
              <div class="help-block"></div>
          </div>
      </div>
      <div class="col-md-2 col-sm-2 col-xs-6">
          <div class="item form-group">
              <label for="section">Section </label>
              <select  class="form-control col-md-7 col-xs-12" name="section" id="section">
                  <option value="">--Select--</option>
                @foreach($sections as $section)
                  <option value="{{ $section->id }}">{{ $section->sections_name }}</option>
                @endforeach

              </select>
              <div class="help-block"></div>
          </div>
      </div>
      <div class="col-md-3 col-sm-3 col-xs-12">
          <div class="item form-group">
              <label for="subject">Subject <span class="required">*</span></label>
              <select  class="form-control col-md-7 col-xs-12" name="subject" id="subject">
                  <option value="">--Select--</option>
                @foreach($subjects as $subject)
                  <option value="{{ $subject->id }}">{{ $subject->subject_name }}</option>
                @endforeach

              </select>
              <div class="help-block"></div>
          </div>
      </div>
      <div class="col-md-2 col-sm-2 col-xs-6">
          <div class="item form-group">
              <label for="section">Date </label>
              <input type="date" name="date" id="date" class="form-control">
              <div class="help-block"></div>
          </div>
      </div>
      <div class="col-md-2 col-sm-2 col-xs-6">
          <div class="item form-group">
              <label for="section"> </label><br>
              <button id="loadHomeWorkOfAllStudents" type="button" class="btn btn-primary">Load Home Work</button>
          </div>
      </div>
    </div>
    <div class="row pd-all-10">
      <div class="col-md-12 col-sm-12 col-xs-12 bg-info">
          <h5><strong>Load Home Work :</strong></h5>
      </div>
      <div class="col-md-12 col-sm-12 col-xs-12">
          <span id="homeWorksOfallStudents">
          	
          </span>
      </div>
  	</div>
	</div>
</div>
<div class="clearfix"></div>
<!-- // Main Content -->

<script>
  $('document').ready(function(){

    function findAndLoadHomeWorks( class_home_work = '' , section_home_work = '' , subject_home_work = '' , date_home_work = '' ){
      $.ajax({

        url     : "{{ route('view-home-work-daily') }}",
        method  : "GET",
        data    : { class_home_work:class_home_work, section_home_work:section_home_work, subject_home_work:subject_home_work, date_home_work:date_home_work },
        dataType: "json",
        success : function(data){
          $("#homeWorksOfallStudents").html(data.allData);
          $("#class").val("");
          $("#section").val("");
          $("#date").val("");
          $("#subject").val("");
          console.log(data.allData);
        }

      });
    }

    $("#loadHomeWorkOfAllStudents").click(function(){

      var class_home_work = $("#class").val();
      var section_home_work = $("#section").val();
      var subject_home_work = $("#subject").val();
      var date_home_work = $("#date").val();
      if (class_home_work != '' && subject_home_work != '') {

        findAndLoadHomeWorks( class_home_work, section_home_work, subject_home_work, date_home_work );
      }else{
        alert('Select all Required Fields!');
      }

    })

  })
</script>
@endsection
