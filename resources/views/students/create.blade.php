@extends('master')

@section('title')
	Add New Student
@endsection

@section('mainContent')
@if(Session::has('message'))
  <div class="notification"><div class="alert alert-success alert-dismissible" style="background-color: #0CC508;" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>{{ Session::get('message') }}</div></div>
@endif
<ol class="simec_content">
    <span class="quick_link_left"><h5><b>All Students and Settings</b></h5></span>

    <a onclick="return location.reload();" class="quick_link_right" title="Reload List"><i class="fas fa-sync-alt btn btn-primary"></i></a>
    <a class="quick_link_right" title="view" href="{{ url('./all-students') }}"><i class="fa fa-eye btn btn-success"></i></a>
    <a href="#" class="quick_link_right" title="Import Students" data-toggle="modal" data-target="#ImportStudents"><i class="fas fa-save btn btn-warning"> Import Students</i></a>
</ol>
<div class="grid-form">
	<div class="grid-form1">
    {!! Form::open(['url' => '/students/store', 'method' => 'post', 'enctype' => 'multipart/form-data', 'role' => 'form']) !!}
      @csrf
		  <div class="row pd-all-10">
          <div class="col-md-12 col-sm-12 col-xs-12 bg-info">
              <h5><strong>Academic Information:</strong></h5>
          </div>
          <div class="col-md-3 col-sm-3 col-xs-12">
              <div class="item form-group">
                  <label for="reg_no">Registration  No <span class="required">*</span></label>
                  <input class="form-control col-md-7 col-xs-12" name="reg_no" id="reg_no" placeholder="Registration Number" required type="text">
                  <div class="help-block"></div>
              </div>
          </div>
          <div class="col-md-3 col-sm-3 col-xs-12">
              <div class="item form-group">
                  <label for="session_id">Academic Year <span class="required">*</span></label>
                  <select  class="form-control col-md-7 col-xs-12" name="session_id" id="session_id" required>
                      <option value="">--Select--</option>
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
                      <option value="">--Select--</option>
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
                      <option value="">--Select--</option>
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
                  <input  class="form-control col-md-7 col-xs-12" name="name" id="name" value="" placeholder="Full Name" required type="text" autocomplete="off">
                  <div class="help-block"></div>
              </div>
          </div>
          <div class="col-md-3 col-sm-3 col-xs-12">
              <div class="item form-group">
                  <label for="birthday">Birth Date <span class="required">*</span></label>
                  <input  class="form-control col-md-7 col-xs-12" name="birthday" id="birthday" value="" placeholder="Birth Date" required type="date" autocomplete="off">
                  <div class="help-block"></div>
              </div>
          </div>
          <div class="col-md-3 col-sm-3 col-xs-12">
              <div class="item form-group">
                  <label for="gender">Gender <span class="required">*</span></label>
                  <select  class="form-control col-md-7 col-xs-12" name="gender" id="gender" required>
                      <option value="">--Select--</option>
                      <option value="male">Male</option>
                      <option value="female">Female</option>
                  </select>
                  <div class="help-block"></div>
              </div>
          </div>
          <div class="col-md-3 col-sm-3 col-xs-12">
              <div class="item form-group">
                  <label for="photo">Photo </label>
                  <input type="file" name="photo" class="form-control">
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
                  <input  class="form-control col-md-7 col-xs-12" name="phone" id="phone" value="" placeholder="Phone" required type="text">
                  <div class="help-block"></div>
              </div>
          </div>
          <div class="col-md-4 col-sm-4 col-xs-12">
              <div class="item form-group">
                  <label for="address1">Present Address <span class="required">*</span></label>
                  <textarea  class="form-control col-md-7 col-xs-12 textarea-4column" name="address1" id="address1" placeholder="Present Address" required></textarea>
                  <div class="help-block"></div>
              </div>
          </div>
          <div class="col-md-4 col-sm-4 col-xs-12">
              <div class="item form-group">
                  <label for="address2">Permanent Address</label>
                  <textarea  class="form-control col-md-7 col-xs-12 textarea-4column" name="address2" id="address2" placeholder="Permanent Address"></textarea>
                  <div class="help-block"></div>
              </div>
          </div>
      </div>              
      <div class="row pd-all-10">
          <div class="col-md-12 col-sm-12 col-xs-12 bg-info">
              <h5><strong>Login Information:</strong></h5>
          </div>
          <div class="col-md-6 col-sm-6 col-xs-12">
              <div class="item form-group">
                  <label for="email">Email <span class="required">*</span></label>
                  <input  class="form-control col-md-7 col-xs-12" name="email" id="email" value="" placeholder="Email" required type="email" autocomplete="off">
                  <div class="help-block"></div>
              </div>
          </div>
          <div class="col-md-6 col-sm-6 col-xs-12">
              <div class="item form-group">
                  <label for="password">Password <span class="required">*</span></label>
                  <input  class="form-control col-md-7 col-xs-12" name="password" id="password" value="" placeholder="Password" required type="text" autocomplete="off">
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

<!-- Import Students Modal -->
<div class="modal fade" id="ImportStudents" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" style="min-width: 65%;" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="AddNewSectionsModalLabel">Fee Collection from Student</h4>
      </div>
      {!! Form::open(['url' => '/import-student-and-load', 'method' => 'post', 'role' => 'form', 'enctype' => 'multipart/form-data']) !!}
        @csrf
        <div class="modal-body">
            <div class="row pd-all-10">
              <div class="col-md-12 col-sm-12 col-xs-12 bg-info">
                  <h5><strong>Select File (Only CSV file Allowed):</strong></h5>
              </div>
              <div class="col-md-6 col-sm-6 col-xs-12">
                  <div class="item form-group">
                      <input class="form-control" name="student_file" id="student_file" required type="file">
                      <div class="help-block"></div>
                  </div>
              </div>
              <div class="col-md-6 col-sm-6 col-xs-12">
                  <div class="item form-group">
                      <button type="submit" class="btn btn-success">Import Now</button>
                      <div class="help-block"></div>
                  </div>
              </div>
            </div>
        </div>
      {!! Form::close() !!}
    </div>
  </div>
</div>

<!-- // Main Content -->

@endsection
