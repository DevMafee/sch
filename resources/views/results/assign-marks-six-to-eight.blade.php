@extends('master')

@section('title')
	Assign Marks
@endsection

@section('mainContent')

@if(Session::has('message'))
  <div class="notification"><div class="alert alert-success alert-dismissible" style="background-color: #0CC508;" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>{{ Session::get('message') }}</div></div>
@endif

@if(Session::has('err_message'))
  <div class="notification"><div class="alert alert-warning alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>{{ Session::get('err_message') }}</div></div>
@endif
<ol class="simec_content">
    <span class="quick_link_left"><h5><b>Assign Marks</b></h5></span>
    <a class="quick_link_right btn btn-success" title="Set Home Works" href="{{ url('./view-results-six-to-eight')}}"><i class="fa fa-plus-square"></i> View Results</a> 
</ol>
<div class="grid-form">
	<div class="grid-form1">
    {!! Form::open(['url' => '/assign-marks-six-to-eight/create', 'method' => 'post', 'role' => 'form']) !!}
    @csrf
	  <div class="row pd-all-10">
      <div class="col-md-12 col-sm-12 col-xs-12 bg-info">
          <h5><strong>Load Students :</strong></h5>
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
      <div class="col-md-2 col-sm-2 col-xs-6">
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
              <label for="exam">Examination <span class="required">*</span></label>
              <select  class="form-control col-md-7 col-xs-12" name="exam" id="exam">
                  <option value="">--Select--</option>
                @foreach($exams as $exam)
                  <option value="{{ $exam->id }}">{{ $exam->name }}</option>
                @endforeach

              </select>
              <div class="help-block"></div>
          </div>
      </div>
      <div class="col-md-2 col-sm-2 col-xs-6">
          <div class="item form-group">
              <label for="nothing"> </label><br>
              <button id="loadAllStudents" type="button" class="btn btn-primary">Load Students</button>
          </div>
      </div>
    </div>
    <div class="row pd-all-10">
      <div class="col-md-12 col-sm-12 col-xs-12 bg-info">
          <h5><strong>Assign Marks :</strong></h5>
      </div>
      <div class="col-md-12 col-sm-12 col-xs-12">
          <span id="allStudentsforAssignMarks">
          	
          </span>
      </div>
  	</div>
    <div class="row pd-all-10">
      <div class="col-md-12 col-sm-12 col-xs-12 right">
        <button type="submit" id="submitButton" class="btn btn-primary" disabled="true">Save Marks</button>
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

        url     : "{{ route('std-load-for-marking-six-to-eight') }}",
        method  : "GET",
        data    : { class_std:class_std,section_std:section_std },
        dataType: "json",
        success : function(data){
          $("#submitButton").attr('disabled',false);
          $("#allStudentsforAssignMarks").html(data.allData);
        }

      });
    }

    $("#loadAllStudents").click(function(){

      var class_std = $("#class").val();
      var section_std = $("#section").val();
      if ( class_std != '' ) {
        findAndLoadStudent(class_std, section_std);
      }else{
        alert('Select All Required Field!');
      }

    })

  })
</script>
@endsection
