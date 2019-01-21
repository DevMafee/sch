@extends('master')

@section('title')
	Evaluate Home Work
@endsection

@section('mainContent')
@if(Session::has('message'))
  <div class="notification"><div class="alert alert-success alert-dismissible" style="background-color: #0CC508;" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>{{ Session::get('message') }}</div></div>
@endif
<ol class="simec_content">
    <span class="quick_link_left"><h5><b>Evaluate Home Work</b></h5></span>
    <a class="quick_link_right btn btn-success" title="Set Home Works" href="{{ url('./home-works')}}"><i class="fa fa-plus-square"></i> Set New Home Work</a> 
</ol>
<div class="grid-form">
	<div class="grid-form1">
	  <div class="row pd-all-10">
      <div class="col-md-12 col-sm-12 col-xs-12 bg-info">
          <h5><strong>Home Works :</strong></h5>
      </div>
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="item form-group">
              <label for="class">Title : <b>{{ $home_work_data->title }}</b></label>
            </div>
        </div>
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="item form-group">
              <label for="section">Details : <b>{{ $home_work_data->date }}</b> </label>
            </div>
        </div>
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="item form-group">
              <label for="section">Details : <b>{!! $home_work_data->description !!}</b> </label>
            </div>
        </div>
        <div class="col-md-3 col-sm-3 col-xs-12">
            <div class="item form-group">
                <input type="hidden" id="class_std" value="{{ $home_work_data->class }}">
                <input type="hidden" id="section_std" value="{{ $home_work_data->section }}">
            </div>
        </div>
      <div class="col-md-6 col-sm-6 col-xs-6">
          <div class="item form-group">
            @if($toal_hw > 0)
              <button id="loadHomeWorkOfAllStudents2Evaluate" type="button" class="btn btn-primary" disabled>Load Students to Evaluate</button>
            @else
              <button id="loadHomeWorkOfAllStudents2Evaluate" type="button" class="btn btn-primary">Load Students to Evaluate</button>
            @endif
          </div>
      </div>
    </div>
    <div class="row pd-all-10">
      <div class="col-md-12 col-sm-12 col-xs-12 bg-info">
          <h5><strong>Load Home Work :</strong></h5>
      </div>
      {!! Form::open(['url' => '/home-work-evaluate-now', 'method' => 'post', 'role' => 'form']) !!}
      @csrf
      <div class="col-md-12 col-sm-12 col-xs-12">
        <input type="hidden" name="home_work" value="{{ $home_work_data->id }}">
          <span id="homeWorksOfallStudents">
          	
          </span>
      </div>
      <div class="row pd-all-10">
        <div class="col-md-6 col-sm-6 col-xs-12 right">
          @if($toal_hw > 0)
            <input type="date" name="date" class="form-control" disabled>
          @else
            <input type="date" name="date" class="form-control" required>
          @endif
        </div>
        <div class="col-md-6 col-sm-6 col-xs-12 right">
          @if($toal_hw > 0)
            <button type="submit" class="btn btn-primary" disabled>Evaluate Home Work</button>
          @else
            <button type="submit" class="btn btn-primary">Evaluate Home Work</button>
          @endif
        </div>
      </div>
      {!! Form::close() !!}
  	</div>
	</div>
</div>
<div class="clearfix"></div>
<!-- // Main Content -->

<script>
  $('document').ready(function(){

    function findAndLoadHomeWorks( class_std = '' , section_std = '' ){
      $.ajax({

        url     : "{{ route('home-work-evaluate-loadSTD') }}",
        method  : "GET",
        data    : { class_std:class_std, section_std:section_std },
        dataType: "json",
        success : function(data){
          $("#homeWorksOfallStudents").html(data.allData);
          $("#class_std").val("");
          $("#section_std").val("");
          // console.log(data.allData);
        }
      });
    }

    $("#loadHomeWorkOfAllStudents2Evaluate").click(function(){
      var class_std = $("#class_std").val();
      var section_std = $("#section_std").val();
      findAndLoadHomeWorks( class_std, section_std );
    })

  })
</script>
@endsection
