@extends('master')

@section('title')
	All Students
@endsection

@section('mainContent')
@if(Session::has('message'))
  <div class="notification"><div class="alert alert-success alert-dismissible" style="background-color: #0CC508;" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>{{ Session::get('message') }}</div></div>
@endif
<ol class="simec_content">
    <span class="quick_link_left"><h5><b>Student Profile Details </b></h5></span>

    <a onclick="return printtag('DivIdToPrintClassesReport');" class="quick_link_right" title="Print This Document"><i class="fa fa-print btn btn-warning"></i></a>
</ol>
<div class="grid-form">
	<div class="grid-form1">
		<table id="table-max-height" class="max-height">
			<thead>
	          <tr>
	            <th colspan="2">Personal Profile of - {{ $student->name }}</th>
	            <th><a href="{{ url('./all-students') }}" class="btn btn-primary right"> << View All Students</a> &nbsp; <a href="{{ url('./students/edit/'. $student->id ) }}" class="btn btn-warning">Edit - {{ $student->name }}</a></th>
	          </tr>
	        </thead>
	        <tbody>
	        	<tr>
	        		<td>
	        			<div class="row pd-all-10">
					        <div id="DivIdToPrintClassesReport" class="card" style="width:200px;margin: 0 auto;">
					        	<img src="../../public/logos/id.png" style="width: 200px; position: absolute; height: 345px;">
					          <div class="card-body" style="height:340px; width:200px; background: url(); background-position: center; background-repeat: no-repeat; background-size: cover; position: relative; margin: 0 auto;">
					            <center><img src="../../public/logos/logo.png" style="padding-top: 20px;" height="70px" width="60px"></center>
					            <h4 style="text-align:center; color: black;"><b>সেনা পল্লী হাই স্কুল</b></h4>
					            <center><img src="../../public/students/{{ $student->photo }}" style="border: 2px solid #CCC;" width="70px" height="70px;"></center>
					            <div style="padding-left: 10px;font-size: 14px !important;">
					              Name&nbsp;&nbsp;&nbsp;&nbsp;: {{ $student->name }} <br>
					              Class&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: {{ $student->class->classes_name }}<br>
					              Section&nbsp;: {{ $student->section->sections_name }}&nbsp; & Roll&nbsp;&nbsp;: {{ $student->roll }} <br>
					              Session&nbsp;: {{ $student->session->sessions_name }} <br>
					              Blood Group : {{ $student->blood_group }} <br>
					            </div> 
					            <span style="padding-right: 15px;float: right;margin-top: 24px;font-size: 14px;">
					              <b style="display: block;">....................</b>
					             
					              <b style="display: block;">প্রধান শিক্ষক</b>
					            </span>

					          </div>
					        </div>
					    </div>
	        		</td>
	        		<td>
	        			<p>
	        				Registration Number : {{ $student->reg_no }}<br>
		        			Roll Number : {{ $student->roll }}<br>
		        			Session : {{ $student->session->sessions_name }}<br>
		        			Class : {{ $student->class->classes_name }}<br>
		        			Section : {{ $student->section->sections_name }}<br>
		        			<hr>
		        			Email - Address : {{ $student->email }}<br>
		        			Phone Number : {{ $student->phone }}<br>
		        		</p>
	        		</td>
	        		<td>
	        			<p>
	        				Parents Info - <br>
	        				Father's Name : {{ $student->father_name }} <br>
	        				Mother's name : {{ $student->mother_name }} <br>
	        				Present Address : {{ $student->address1 }} <br>
	        				Permanent Address : {{ $student->address2 }} <br>
	        			</p>
	        		</td>
	        	</tr>
	        </tbody>
	    </table>
	    <input type="hidden" id="studentClass" value="{{ $student->class->id }}">
	    @if( $student->class->classes_rank < 6 )
	    	<input type="hidden" id="studentID" value="{{ $student->id }}">
	    	<br>
	    	<button type="button" id="LoadSingleResultPlayToFive" class="btn btn-primary">Load Result</button>
	    @elseif( $student->class->classes_rank < 9 )
	    	<input type="hidden" id="studentID" value="{{ $student->id }}">
	    	<br>
	    	<button type="button" id="LoadSingleResultSixToEight" class="btn btn-primary">Load Result</button>
	    @elseif( $student->class->classes_rank < 11 )
	    	<input type="hidden" id="studentID" value="{{ $student->id }}">
	    	<br>
	    	<button type="button" id="LoadSingleResultNineToTen" class="btn btn-primary">Load Result</button>
	    @endif
	    
	</div>
</div>
<!-- <div class="clearfix"></div> -->
<div class="grid-form">
	<div class="grid-form1">
		<a onclick="return printtag('DivIdToPrintResult');" class="quick_link_right" title="Print This Document"><i class="fa fa-print btn btn-warning">Print Result</i></a>
		<div class="row pd-all-10" id="DivIdToPrintResult">
			<div class="col-xs-12" id="LoadSingleStudentResultData" style="overflow-x:auto;">

			</div>
		</div>
	</div>
</div>
<!-- // Main Content -->

<script>
  $('document').ready(function(){

    $("#LoadSingleResultPlayToFive").click(function(){
      var studentID = $("#studentID").val();
      var studentClass = $("#studentClass").val();
      $.ajax({
          url     : "{{ route('results-load-of-students-play-to-five') }}",
          method  : "GET",
          data    : { studentID:studentID, studentClass:studentClass },
          dataType: "json",
          success : function(data){
            $("#LoadSingleStudentResultData").html(data.allData);
            console.log(data.allData);
          }
      });
    })

    $("#LoadSingleResultSixToEight").click(function(){
      var studentID = $("#studentID").val();
      var studentClass = $("#studentClass").val();
      $.ajax({
          url     : "{{ route('results-load-of-students-six-to-eight') }}",
          method  : "GET",
          data    : { studentID:studentID, studentClass:studentClass },
          dataType: "json",
          success : function(data){
            $("#LoadSingleStudentResultData").html(data.allData);
            console.log(data.allData);
          }
      });
    })

    $("#LoadSingleResultNineToTen").click(function(){
      var studentID = $("#studentID").val();
      var studentClass = $("#studentClass").val();
      // findAndLoadResultsforSingleStudent( studentID );
      $.ajax({
          url     : "{{ route('results-load-of-students-nine-to-ten') }}",
          method  : "GET",
          data    : { studentID:studentID, studentClass:studentClass },
          dataType: "json",
          success : function(data){
            $("#LoadSingleStudentResultData").html(data.allData);
            console.log(data.allData);
          }
      });
    })

  })
</script>

@endsection
