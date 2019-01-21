@extends('master')

@section('title')
	Take Attendance
@endsection

@section('mainContent')
@if(Session::has('message'))
  <div class="notification"><div class="alert alert-success alert-dismissible" style="background-color: #0CC508;" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>{{ Session::get('message') }}</div></div>
@endif
<ol class="simec_content">
    <span class="quick_link_left"><h5><b>Take Attendance</b></h5></span> 
    <a class="quick_link_right btn btn-success" title="View Attendance" href="{{ url('./view-attendance')}}"><i class="fa fa-eye"></i> View Attendance</a>   
</ol>
<div class="grid-form">
	<div class="grid-form1">
		{!! Form::open(['url' => '/take-attendance', 'method' => 'post', 'role' => 'form']) !!}
      @csrf
		  <div class="row pd-all-10">
          <div class="col-md-12 col-sm-12 col-xs-12 bg-info">
              <h5><strong>Take Attendance :</strong></h5>
              <input type="hidden" name="teacher" value="{{ Auth::user()->id }}">
          </div>
          <div class="col-md-3 col-sm-3 col-xs-12">
              <div class="item form-group">
                  <label for="class">Class <span class="required">*</span></label>
                  <select  class="form-control col-md-7 col-xs-12" name="class" id="class" required>
                      <option value="">--Select --</option>
                    @foreach($classes as $classe)
                      <option value="{{ $classe->id }}">{{ $classe->classes_name }}</option>
                    @endforeach

                  </select>
                  <div class="help-block"></div>
              </div>
          </div>
          <div class="col-md-3 col-sm-3 col-xs-12">
              <div class="item form-group">
                  <label for="section">Section <span class="required">*</span></label>
                  <select  class="form-control col-md-7 col-xs-12" name="section" id="section" required>
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
                  <label for="section">Date <span class="required">*</span></label>
                  <input type="date" name="date" class="form-control">
                  <div class="help-block"></div>
              </div>
          </div>
          <div class="col-md-3 col-sm-3 col-xs-12">
              <div class="item form-group">
                  <label for="section"> </label><br>
                  <button id="loadAllStudents" type="button" class="btn btn-primary">Load Students</button>
              </div>
          </div>
        </div>
        <div class="row pd-all-10">
          <div class="col-md-12 col-sm-12 col-xs-12 bg-info">
              <h5><strong>Load All Students :</strong></h5>
          </div>
          <div class="col-md-12 col-sm-12 col-xs-12">
              <span id="allStudentsforAttendance">
              	
              </span>
          </div>
      	</div>
	      <div class="row pd-all-10">
	        <div class="col-md-12 col-sm-12 col-xs-12 right">
	          <button type="submit" class="btn btn-primary">Save Attendance</button>
	        </div>
	      </div>
      {!! Form::close() !!}
	</div>
</div>
<div class="clearfix"></div>
<!-- // Main Content -->

<script>
  $('document').ready(function(){

    function findAndLoadStudent( class_std = '' , section_std = '' ){
      $.ajax({

        url     : "{{ route('std-load-attendance') }}",
        method  : "GET",
        data    : { class_std:class_std,section_std:section_std },
        dataType: "json",
        success : function(data){
          $("#allStudentsforAttendance").html(data.allData);
          console.log(data.allData);
        }

      });
    }

    $("#loadAllStudents").click(function(){

      var class_std = $("#class").val();
      var section_std = $("#section").val();
      findAndLoadStudent(class_std, section_std);

    })

  })
</script>
@endsection
