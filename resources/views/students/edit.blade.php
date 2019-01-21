@extends('master')

@section('title')
	Edit Student
@endsection

@section('mainContent')
@if(Session::has('message'))
  <div class="notification"><div class="alert alert-success alert-dismissible" style="background-color: #0CC508;" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>{{ Session::get('message') }}</div></div>
@endif
<ol class="simec_content">
    <span class="quick_link_left"><h5><b>Edit Student and Settings</b></h5></span>

    <a onclick="return printtag('DivIdToPrintClassesReport');" class="quick_link_right" title="Print This Document"><i class="fa fa-print btn btn-warning"></i></a>
    <a href="" class="quick_link_right" title="Search Here"><i class="fa fa-search btn btn-info"></i></a>
    <a onclick="return location.reload();" class="quick_link_right" title="Reload List"><i class="fas fa-sync-alt btn btn-primary"></i></a>
    <a class="quick_link_right" title="view" href="{{ url('./all-students') }}"><i class="fa fa-eye btn btn-success"></i></a>
</ol>
<div class="grid-form">
	<div class="grid-form1">
    {!! Form::open(['url' => '/students/update', 'method' => 'post', 'enctype'=>'multipart/form-data', 'role' => 'form']) !!}
      @csrf
		  <div class="row pd-all-10">
          <div class="col-md-12 col-sm-12 col-xs-12 bg-info">
              <h5><strong>Academic Information:</strong></h5>
          </div>
          <div class="col-md-3 col-sm-3 col-xs-12">
              <div class="item form-group">
                  <label for="reg_no">Registration  No <span class="required">*</span></label>
                  <input class="form-control col-md-7 col-xs-12" name="reg_no" id="reg_no" value="{{ $student->reg_no }}" required type="text">
                  <input name="id" value="{{ $student->id }}" type="hidden">
                  <div class="help-block"></div>
              </div>
          </div>
          <div class="col-md-3 col-sm-3 col-xs-12">
              <div class="item form-group">
                  <label for="session_id">Academic Year <span class="required">*</span></label>
                  <select  class="form-control col-md-7 col-xs-12" name="session_id" id="session_id" required>
                      <option value="{{ $student->session_id }}">--Select--</option>
                  @foreach($sessions_all as $sessions)
                      <option value="{{ $sessions->id }}">{{ $sessions->sessions_name }}</option>
                  @endforeach
                  </select>
                  <div class="help-block"></div>
              </div>
          </div>
          <div class="col-md-3 col-sm-3 col-xs-12">
              <div class="item form-group">
                  <label for="class_id">Class <span class="required">*</span></label>
                  <select  class="form-control col-md-7 col-xs-12" name="class_id" id="class_id" required>
                      <option value="{{ $student->class_id }}">--Select--</option>
                    @foreach($classes_all as $classes)
                      <option value="{{ $classes->id }}">{{ $classes->classes_name }}</option>
                    @endforeach

                  </select>
                  <div class="help-block"></div>
              </div>
          </div>
          <div class="col-md-3 col-sm-3 col-xs-12">
              <div class="item form-group">
                  <label for="section_id">Group/Section (Optional) </label>
                  <select  class="form-control col-md-7 col-xs-12" name="section_id" id="section_id">
                      <option value="{{ $student->section_id }}">--Select--</option>
                    @foreach($sections_all as $sections)
                      <option value="{{ $sections->id }}">{{ $sections->sections_name }}</option>
                    @endforeach

                  </select>
                  <div class="help-block"></div>
              </div>
          </div>
        </div>
        <div class="row pd-all-10">
          <div class="col-md-12 col-sm-12 col-xs-12 bg-info">
              <h5><strong>Personal Basic Information:</strong></h5>
          </div>
          <div class="col-md-3 col-sm-3 col-xs-12">
              <div class="item form-group">
                  <label for="name">Name <span class="required">*</span></label>
                  <input  class="form-control col-md-7 col-xs-12" name="name" id="name" value="{{ $student->name }}" required type="text">
                  <div class="help-block"></div>
              </div>
          </div>
          <div class="col-md-3 col-sm-3 col-xs-12">
              <div class="item form-group">
                  <label for="birthday">Birth Date </label>
                  <input  class="form-control col-md-7 col-xs-12" name="birthday" id="birthday" value="{{ $student->birthday }}" required type="date">
                  <div class="help-block"></div>
              </div>
          </div>
          <div class="col-md-2 col-sm-2 col-xs-12">
              <div class="item form-group">
                  <label for="gender">Gender </label>
                  <select  class="form-control col-md-7 col-xs-12" name="gender" id="gender" required>
                      <option value="{{ $student->gender }}">{{ $student->gender }}</option>
                      <option value="male">Male</option>
                      <option value="female">Female</option>
                  </select>
                  <div class="help-block"></div>
              </div>
          </div>
          <div class="col-md-2 col-sm-2 col-xs-12">
              <div class="item form-group">
                  <label for="photo">Photo </label>
                  <input type="file" name="photo" class="form-control">
              </div>
          </div>
          <div class="col-md-2 col-sm-2 col-xs-12">
            <img src="{{ asset('public/students') }}/{{ $student->photo }}" style="height: 60px; width: 60px;">
          </div>
      </div>
      <div class="row pd-all-10">
          <div class="col-md-12 col-sm-12 col-xs-12 bg-info">
              <h5><strong>Gurdian Information:</strong></h5>
          </div>
          <div class="col-md-4 col-sm-4 col-xs-12">
              <div class="item form-group">
                  <label for="father_name">Father's Name </label>
                  <input  class="form-control col-md-7 col-xs-12" name="father_name" id="father_name" value="{{ $student->father_name }}" required type="text">
                  <div class="help-block"></div>
              </div>
          </div>
          <div class="col-md-4 col-sm-4 col-xs-12">
              <div class="item form-group">
                  <label for="mother_name">Mother's Name </label>
                  <input  class="form-control col-md-7 col-xs-12" name="mother_name" id="mother_name" value="{{ $student->mother_name }}" required type="text">
                  <div class="help-block"></div>
              </div>
          </div>
          <div class="col-md-4 col-sm-4 col-xs-12">
              <div class="item form-group">
                  <label for="religion">Religion </label>
                  <select class="form-control" name="religion" id="religion">
                    <option value="{{ $student->religion }}">{{ $student->religion }}</option>
                    <option value="Islam">Islam</option>
                    <option value="Hindu">Hindu</option>
                    <option value="Christian">Christian</option>
                    <option value="Duddist">Duddist</option>
                  </select>
              </div>
          </div>
      </div>
      <div class="row pd-all-10">
          <div class="col-md-12 col-sm-12 col-xs-12 bg-info">
              <h5><strong>Contact Information:</strong></h5>
          </div>
          <div class="col-md-4 col-sm-4 col-xs-12">
              <div class="item form-group">
                  <label for="phone">Phone <span class="required">*</span></label>
                  <input  class="form-control col-md-7 col-xs-12" name="phone" id="phone" value="{{ $student->phone }}" required type="text">
                  <div class="help-block"></div>
              </div>
          </div>
          <div class="col-md-4 col-sm-4 col-xs-12">
              <div class="item form-group">
                  <label for="address1">Present Address <span class="required">*</span></label>
                  <textarea  class="form-control col-md-7 col-xs-12 textarea-4column" name="address1" id="address1" required>{{ $student->address1 }}</textarea>
                  <div class="help-block"></div>
              </div>
          </div>
          <div class="col-md-4 col-sm-4 col-xs-12">
              <div class="item form-group">
                  <label for="address2">Permanent Address</label>
                  <textarea  class="form-control col-md-7 col-xs-12 textarea-4column" name="address2" id="address2">{{ $student->address2 }}</textarea>
                  <div class="help-block"></div>
              </div>
          </div>
      </div>
      <div class="row pd-all-10">
        <div class="col-md-12 col-sm-12 col-xs-12 right">
          <button type="submit" class="btn btn-primary">Save Student</button>
        </div>
      </div>
      {!! Form::close() !!}
	</div>
</div>

<!-- // Main Content -->

@endsection
