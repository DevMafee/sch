@extends('master')

@section('title')
	Take Attendance
@endsection

@section('mainContent')
@if(Session::has('message'))
  <div class="notification"><div class="alert alert-success alert-dismissible" style="background-color: #0CC508;" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>{{ Session::get('message') }}</div></div>
@endif
<ol class="simec_content">
    <span class="quick_link_left"><h5><b>View Attendance</b></h5></span>
    <a class="quick_link_right btn btn-success" title="Take Attendance" href="{{ url('./take-attendance')}}"><i class="fa fa-plus-square"></i> Take Attendance</a> 
</ol>
<div class="grid-form">
	<div class="grid-form1">
	  <div class="row pd-all-10">
      <div class="col-md-12 col-sm-12 col-xs-12 bg-info">
          <h5><strong>View Attendance :</strong></h5>
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
              <label for="section">Date </label>
              <input type="date" name="date" id="date" class="form-control">
              <div class="help-block"></div>
          </div>
      </div>
      <div class="col-md-2 col-sm-2 col-xs-6">
          <div class="item form-group">
              <label for="section">Select Month </label>
              <select id="month" class="form-control">
                <option value=""> ---- Select Month ---- </option>
                <option value="1">January</option>
                <option value="2">February</option>
                <option value="3">March</option>
                <option value="4">April</option>
                <option value="5">May</option>
                <option value="6">June</option>
                <option value="7">July</option>
                <option value="8">August</option>
                <option value="9">September</option>
                <option value="10">October</option>
                <option value="11">November</option>
                <option value="12">December</option>
              </select>
              <div class="help-block"></div>
          </div>
      </div>
      <div class="col-md-2 col-sm-2 col-xs-6">
          <div class="item form-group">
              <label for="section"> </label><br>
              <button id="loadAttendanceOfAllStudents" type="button" class="btn btn-primary">Load Students</button>
          </div>
      </div>
    </div>
    <div class="row pd-all-10">
      <div class="col-md-12 col-sm-12 col-xs-12 bg-info">
          <h5><strong>Load All Students :</strong></h5>
      </div>
      <div class="col-md-12 col-sm-12 col-xs-12">
          <span id="AttendanceOfallStudents">
          	
          </span>
      </div>
  	</div>
	</div>
</div>
<div class="clearfix"></div>
<!-- // Main Content -->

<script>
  $('document').ready(function(){

    function findAndLoadStudent( class_std = '' , section_std = '' , date_std = '' , class_std_name = '' , section_std_name = '' ){
      $.ajax({

        url     : "{{ route('std-view-attendance') }}",
        method  : "GET",
        data    : { class_std:class_std, section_std:section_std, date_std:date_std },
        dataType: "json",
        success : function(data){
          $("#AttendanceOfallStudents").html(data.allData);
          $("#class").val("");
          $("#section").val("");
          $("#date").val("");
          $("#month").val("");
          // console.log(data.allData);
        }

      });
    }

    $("#loadAttendanceOfAllStudents").click(function(){

      var class_std = $("#class").val();
      var section_std = $("#section").val();
      var date_std = $("#date").val();
      findAndLoadStudent( class_std, section_std, date_std );

    })

    $("#month").change(function(){

      var class_std = $("#class").val();
      var section_std = $("#section").val();
      var month_std = $("#month").val();
      var mmmm = document.getElementById("month");
      var month_std_text= mmmm.options[mmmm.selectedIndex].text;
      if (class_std != '' && month_std != '') {
        $.ajax({
            url     : "{{ route('std-view-attendance-monthly') }}",
            method  : "GET",
            data    : { class_std:class_std, section_std:section_std, month_std:month_std, month_std_text:month_std_text },
            dataType: "json",
            success : function(data){
              $("#AttendanceOfallStudents").html(data.allData);
              $("#class").val("");
              $("#section").val("");
              $("#date").val("");
              $("#month").val("");
              // console.log(data.allData);
            }

        });
      }
    })

  })
</script>
@endsection
