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
    <a class="quick_link_right btn btn-success" title="Take Attendance" href="{{ url('./teacher-attendance')}}"><i class="fa fa-plus-square"></i> Take Attendance</a> 
</ol>
<div class="grid-form">
	<div class="grid-form1">
	  <div class="row pd-all-10">
      <div class="col-md-12 col-sm-12 col-xs-12 bg-info">
          <h5><strong>View Attendance :</strong></h5>
      </div>
      <div class="col-md-6 col-sm-6 col-xs-12">
          <div class="item form-group">
              <label for="section">Date </label>
              <input type="date" name="date" id="date" class="form-control">
              <div class="help-block"></div>
          </div>
      </div>
      <div class="col-md-6 col-sm-6 col-xs-12">
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
          </div>
      </div>
    </div>
    <div class="row pd-all-10">
      <div class="col-md-12 col-sm-12 col-xs-12 bg-info">
          <h5><strong>Load All Students :</strong></h5>
      </div>
      <div class="col-md-12 col-sm-12 col-xs-12">
          <span id="AttendanceOfallTeachers">
          	
          </span>
      </div>
  	</div>
	</div>
</div>
<div class="clearfix"></div>
<!-- // Main Content -->

<script>
  $('document').ready(function(){

    function findAndLoadTeacherReport( date_teacher = '' ){
      $.ajax({

        url     : "{{ route('teacher-view-attendance') }}",
        method  : "GET",
        data    : { date_teacher:date_teacher },
        dataType: "json",
        success : function(data){
          $("#AttendanceOfallTeachers").html(data.allData);
          $("#date").val("");
          $("#month").val("");
          // console.log(data.allData);
        }

      });
    }

    $("#date").change(function(){
      var date_teacher = $("#date").val();
      findAndLoadTeacherReport( date_teacher );
    })

    $("#month").change(function(){
      var month_teacher = $("#month").val();
      var mmmm = document.getElementById("month");
      var month_teacher_text= mmmm.options[mmmm.selectedIndex].text;
      $.ajax({
          url     : "{{ route('teacher-view-attendance-month') }}",
          method  : "GET",
          data    : { month_teacher:month_teacher, month_teacher_text:month_teacher_text },
          dataType: "json",
          success : function(data){
            $("#AttendanceOfallTeachers").html(data.allData);
            $("#date").val("");
            $("#month").val("");
            // console.log(data.allData);
          }

      });
    })

  })
</script>
@endsection
