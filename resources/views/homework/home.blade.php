@extends('master')

@section('title')
	Set Home Work
@endsection

@section('mainContent')
@if(Session::has('message'))
  <div class="notification"><div class="alert alert-success alert-dismissible" style="background-color: #0CC508;" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>{{ Session::get('message') }}</div></div>
@endif
<ol class="simec_content">
    <span class="quick_link_left"><h5><b>Set Home Work</b></h5></span>
    <a class="quick_link_right btn btn-success" title="View Home Works" href="{{ url('./view-home-works')}}"><i class="fa fa-eye"></i> View Home Work</a>   
</ol>
<div class="grid-form">
	<div class="grid-form1">
		{!! Form::open(['url' => '/home-works', 'method' => 'post', 'role' => 'form']) !!}
      @csrf
		  <div class="row pd-all-10">
          <div class="col-md-12 col-sm-12 col-xs-12 bg-info">
              <h5><strong>Set Home Work :</strong></h5>
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
                  <label for="subject">Subject <span class="required">*</span></label>
                  <select  class="form-control col-md-7 col-xs-12" name="subject" id="subject" required>
                      <option value="">--Select--</option>
                    @foreach($subjects as $subject)
                      <option value="{{ $subject->id }}">{{ $subject->subject_name }}</option>
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
        </div>
        <div class="row pd-all-10">
          <div class="col-md-12 col-sm-12 col-xs-12 bg-info">
              <h5><strong>Home Work Details :</strong></h5>
          </div>
          <div class="col-md-12 col-sm-12 col-xs-12">
              <div class="item form-group">
                  <label for="title">Home Work Title <span class="required">*</span></label>
                  <input type="text" name="title" class="form-control" placeholder="Home Work Title ...">
                  <div class="help-block"></div>
              </div>
          </div>
          <div class="col-md-12 col-sm-12 col-xs-12">
              <div class="item form-group">
                  <label for="description">Home Work Description <span class="required">*</span></label>
                  <textarea name="description" id="description" class="form-control"></textarea>
                  <div class="help-block"></div>
              </div>
          </div>
      	</div>
	      <div class="row pd-all-10">
	        <div class="col-md-12 col-sm-12 col-xs-12 right">
	          <button type="submit" class="btn btn-primary">Set Home Work</button>
	        </div>
	      </div>
      {!! Form::close() !!}
	</div>
</div>
<div class="clearfix"></div>
<!-- // Main Content -->

<script>
  CKEDITOR.replace( 'description' );
</script>
@endsection
