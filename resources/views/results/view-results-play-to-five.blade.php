@extends('master')

@section('title')
	View Results
@endsection

@section('mainContent')
@if(Session::has('message'))
  <div class="notification"><div class="alert alert-success alert-dismissible" style="background-color: #0CC508;" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>{{ Session::get('message') }}</div></div>
@endif
<ol class="simec_content">
    <span class="quick_link_left"><h5><b>View Results</b></h5></span>
</ol>
<div class="grid-form">
	<div class="grid-form1">
	  <div class="row pd-all-10">
      <div class="col-md-12 col-sm-12 col-xs-12 bg-info">
          <h5><strong>View Results :</strong></h5>
      </div>
      <div class="col-md-2 col-sm-2 col-xs-6">
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
      <div class="col-md-2 col-sm-2 col-xs-6">
          <div class="item form-group">
              <label for="section">Section </label>
              <select  class="form-control col-md-7 col-xs-12" name="section" id="section" required>
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
              <button id="loadAllStudentsResults" type="button" class="btn btn-primary">Load Result</button>
          </div>
      </div>
    </div>
    <div class="row pd-all-10">
      <div class="col-md-12 col-sm-12 col-xs-12 bg-info">
          <h5><strong>Result load for Students :</strong></h5>
      </div>
      <div class="col-md-12 col-sm-12 col-xs-12">
          <span id="resultsOfallStudents">
          	
          </span>
      </div>
  	</div>
	</div>
</div>
<div class="clearfix"></div>
<!-- // Main Content -->

<script>
  $('document').ready(function(){

    function findAndLoadResultsforStudents( class_result = '' , section_result = '' , subject_result = '' , exam_result = '' ){
      $.ajax({
          url     : "{{ route('results-load-of-students-play-to-five-all') }}",
          method  : "GET",
          data    : { class_result:class_result, section_result:section_result, subject_result:subject_result, exam_result:exam_result },
          dataType: "json",
          success : function(data){
            $("#resultsOfallStudents").html(data.allData);
            console.log(data.allData);
          }
      });
    }

    $("#loadAllStudentsResults").click(function(){
      var class_result = $("#class").val();
      var section_result = $("#section").val();
      var subject_result = $("#subject").val();
      var exam_result = $("#exam").val();
      findAndLoadResultsforStudents( class_result, section_result, subject_result, exam_result );
    })

  })
</script>
@endsection
