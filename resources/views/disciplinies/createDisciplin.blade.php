@extends('master')

@section('title')
	Create Disciplinies
@endsection

@section('mainContent')
@if(Session::has('message'))
  <div class="notification"><div class="alert alert-success alert-dismissible" style="background-color: #0CC508;" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>{{ Session::get('message') }}</div></div>
@endif
<ol class="simec_content">
    <span class="quick_link_left"><h5><b>Create Discipline</b></h5></span>

    <a onclick="return printtag('DivIdToPrintClassesReport');" class="quick_link_right" title="Print This Document"><i class="fa fa-print btn btn-warning"></i></a>
    <a href="" class="quick_link_right" title="Search Here"><i class="fa fa-search btn btn-info"></i></a>
    <a onclick="return location.reload();" class="quick_link_right" title="Reload List"><i class="fas fa-sync-alt btn btn-primary"></i></a>
    <a class="quick_link_right" title="View All" href="{{ url('./disciplines') }}"><i class="fa fa-eye btn btn-success"></i></a>
</ol>
<div class="grid-form">
	<div class="grid-form1" id="DivIdToPrintClassesReport">
		{!! Form::open(['url' => '/disciplines/store', 'method' => 'post', 'role' => 'form']) !!}
        @csrf
        
            <div class="row pd-all-10">
              <div class="col-md-12 col-sm-12 col-xs-12 bg-info">
                  <h5><strong>Discipline Title: <span class="required">*</span></strong></h5>
              </div>
              <div class="col-md-12 col-sm-12 col-xs-12">
                	<input class="form-control col-md-7 col-xs-12" name="disciplines_title" id="disciplines_title" value="" placeholder="Discipline Title" required type="text">
                	<div class="help-block"></div>
              </div>
            </div>
          	<div class="row pd-all-10">
	            <div class="col-md-12 col-sm-12 col-xs-12 bg-info">
	                <h5><strong>Discipline Description: <span class="required">*</span></strong></h5>
	            </div>
	            <div class="col-md-12 col-sm-12 col-xs-12">
	                <textarea  class="form-control col-md-7 col-xs-12 textarea-4column" name="disciplines_description" id="disciplines_description" placeholder="Discipline Description" required></textarea>
                    <div class="help-block"></div> 
	            </div>
        	</div>
          	<div class="row pd-all-10">
	            <div class="col-md-12 col-sm-12 col-xs-12"><br>
	                <button type="submit" class="btn btn-success quick_link_right">Save</button>
	            </div>
        	</div>
    	{!! Form::close() !!}
	</div>
</div>
<div class="clearfix"></div>
<!-- // Main Content -->

@endsection
