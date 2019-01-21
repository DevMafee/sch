@extends('master')

@section('title')
	All New Registrations
@endsection

@section('mainContent')
@if(Session::has('message'))
  <div class="notification"><div class="alert alert-success alert-dismissible" style="background-color: #0CC508;" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>{{ Session::get('message') }}</div></div>
@endif
<ol class="simec_content">
    <span class="quick_link_left"><h5><b>All New Registrations and Settings</b></h5></span>

    <a onclick="return printtag('DivIdToPrintClassesReport');" class="quick_link_right" title="Print This Document"><i class="fa fa-print btn btn-warning"></i></a>
    <a href="" class="quick_link_right" title="Search Here"><i class="fa fa-search btn btn-info"></i></a>
    <a onclick="return location.reload();" class="quick_link_right" title="Reload List"><i class="fas fa-sync-alt btn btn-primary"></i></a>
    <a class="quick_link_right" title="Add New" data-toggle="modal" data-target="#AddNewregistrationModal"><i class="fa fa-plus-square btn btn-success"></i></a>
</ol>
<div class="grid-form">
	<div class="grid-form1" id="DivIdToPrintClassesReport">
		<table id="table-max-height" class="max-height">
			<thead>
          <tr>
            <th>SN#</th>
            <th> Student Name </th>
            <th> Registration No. </th>
            <th> Session </th>
            <th> Class </th>
            <th> Phone </th>
            <th> Email </th>
            <th class="hideOnPrint">Action</th>
          </tr>
        </thead>
        <tbody>
          <?php $i = 0; ?>
          @foreach($registrations as $registration)
            <tr>
              <td>{{ ++$i }}</td>
              <td>{{ $registration->student_name }}</td>
              <td>{{ $registration->reg_no }}</td>
              <td>{{ $registration->stusent_session }}</td>
              <td>{{ $registration->student_class }}</td>
              <td>{{ $registration->student_phone }}</td>
              <td>{{ $registration->email }}</td>
              <td class="hideOnPrint">
                <!-- <a href="#" data-toggle="modal" data-target="#EditRegistrationsModal{{ $registration->id}}"><i class="fa fa-edit btn btn-warning"></i></a> -->
                <a data-toggle="modal" data-target="#DeleteModal{{ $registration->id}}"><i class="fa fa-trash btn btn-danger"></i></a>
              </td>
            </tr>
            <!-- <div class="modal fade" id="EditRegistrationsModal{{ $registration->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
              <div class="modal-dialog" style="min-width: 65%;" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="EditSectionsModalLabel">Edit Classes</h4>
                  </div>
                  {!! Form::open(['url' => '/registration/update', 'method' => 'post', 'role' => 'form']) !!}
                    @csrf
                    <div class="modal-body">
                        <div class="row pd-all-10">
                          <div class="col-md-12 col-sm-12 col-xs-12 bg-info">
                              <h5><strong>Academic Information:</strong></h5>
                          </div>
                          <input name="reg_id" id="reg_id" value="{{ $registration->id }}" type="hidden">
                          <div class="col-md-3 col-sm-3 col-xs-12">
                              <div class="item form-group">
                                  <label for="reg_no">Registration  No <span class="required">*</span></label>
                                  <input class="form-control col-md-7 col-xs-12" name="reg_no" id="reg_no" value="{{ $registration->reg_no }}" required type="text" readonly>
                                  <div class="help-block"></div>
                              </div>
                          </div>
                          <div class="col-md-3 col-sm-3 col-xs-12">
                              <div class="item form-group">
                                  <label for="sessions_id">Academic Year <span class="required">*</span></label>
                                  <select  class="form-control col-md-7 col-xs-12" name="sessions_id" id="sessions_id" required>
                                      <option value=""> --DDD-- </option>

                                    @foreach($sessions_data as $session)
                                      <option value="{{ $session->id }}">{{ $session->sessions_name }}</option>
                                    @endforeach

                                  </select>
                                  <div class="help-block"></div>
                              </div>
                          </div>
                          <div class="col-md-3 col-sm-3 col-xs-12">
                              <div class="item form-group">
                                  <label for="classes_id">Class <span class="required">*</span></label>
                                  <select  class="form-control col-md-7 col-xs-12" name="classes_id" id="classes_id" required>
                                      <option value=""> --SSSSS-- </option>

                                    @foreach($classes_data as $classes)
                                      <option value="{{ $classes->id }}">{{ $classes->classes_name }}</option>
                                    @endforeach

                                  </select>
                                  <div class="help-block"></div>
                              </div>
                          </div>
                          <div class="col-md-3 col-sm-3 col-xs-12">
                              <div class="item form-group">
                                  <label for="sections_id">Group/Section (Optional) </label>
                                  <select  class="form-control col-md-7 col-xs-12" name="sections_id" id="sections_id">
                                      <option value=""> --VVV-- </option>

                                    @foreach($sections_data as $section)
                                      <option value="{{ $section->id }}">{{ $section->sections_name }}</option>
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
                          <div class="col-md-4 col-sm-4 col-xs-12">
                              <div class="item form-group">
                                  <label for="student_name">Name <span class="required">*</span></label>
                                  <input  class="form-control col-md-7 col-xs-12" name="student_name" id="student_name" value="{{ $registration->student_name }}" required type="text" autocomplete="off">
                                  <div class="help-block"></div>
                              </div>
                          </div>
                          <div class="col-md-4 col-sm-4 col-xs-12">
                              <div class="item form-group">
                                  <label for="student_dob">Birth Date <span class="required">*</span></label>
                                  <input  class="form-control col-md-7 col-xs-12" name="student_dob" id="student_dob" value="{{ $registration->student_dob }}" required type="date" autocomplete="off">
                                  <div class="help-block"></div>
                              </div>
                          </div>
                          <div class="col-md-4 col-sm-4 col-xs-12">
                              <div class="item form-group">
                                  <label for="student_gender">Gender <span class="required">*</span></label>
                                  <select  class="form-control col-md-7 col-xs-12" name="student_gender" id="student_gender" required>
                                      <option value="{{ $registration->student_gender }}">{{ $registration->student_gender }}</option>
                                      <option value="male">Male</option>
                                      <option value="female">Female</option>
                                  </select>
                                  <div class="help-block"></div>
                              </div>
                          </div>
                      </div>
                      <div class="row pd-all-10">
                          <div class="col-md-12 col-sm-12 col-xs-12 bg-info">
                              <h5><strong>Contact Information:</strong></h5>
                          </div>
                          <div class="col-md-4 col-sm-4 col-xs-12">
                              <div class="item form-group">
                                  <label for="student_phone">Phone <span class="required">*</span></label>
                                  <input  class="form-control col-md-7 col-xs-12" name="student_phone" id="student_phone" value="{{ $registration->student_phone }}" required type="text">
                                  <div class="help-block"></div>
                              </div>
                          </div>
                          <div class="col-md-4 col-sm-4 col-xs-12">
                              <div class="item form-group">
                                  <label for="student_address1">Present Address <span class="required">*</span></label>
                                  <textarea  class="form-control col-md-7 col-xs-12 textarea-4column" name="student_address1" id="student_address1" required>{{ $registration->student_address1 }}</textarea>
                                  <div class="help-block"></div>
                              </div>
                          </div>
                          <div class="col-md-4 col-sm-4 col-xs-12">
                              <div class="item form-group">
                                <label for="student_address2">Permanent Address</label>
                                <textarea  class="form-control col-md-7 col-xs-12 textarea-4column" name="student_address2" id="student_address2">{{ $registration->student_address2 }}</textarea>
                                <div class="help-block"></div>
                              </div>
                          </div>
                      </div>
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                      <button type="submit" class="btn btn-primary">Update</button>
                    </div>
                  {!! Form::close() !!}
                </div>
              </div>
            </div> -->

            <!--delete-->

            <div class="modal fade" id="DeleteModal{{ $registration->id}}" tabindex="-1" role="dialog">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header bg-required">
                          <span class="heading1 default"> <i class="fas fa-question-circle"></i> Really want to Delete?</span>
                        </div>
                        <div class="modal-body center required">
                          <i class="fas fa-question required"></i><br/>
                            <span class="heading1 required">Are you sure?</span><br/>
                            <b>You will not be able to recover this Data!</b><br/>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-success" data-dismiss="modal">BACK</button>
                            <a href="{{ url( '/registration/delete/'.$registration->id ) }}" class="btn btn-danger">YES DELETE IT!</a>

                        </div>
                    </div>
                </div>
            </div>
          @endforeach
        </tbody>
		</table>
	</div>
</div>
<div class="clearfix"></div>
<!-- // Main Content -->
<!-- Modal -->
<div class="modal fade" id="AddNewregistrationModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" style="min-width: 65%;" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="AddNewSectionsModalLabel">Register New Student</h4>
      </div>
      {!! Form::open(['url' => '/registration/create', 'method' => 'post', 'role' => 'form']) !!}
        @csrf
        <div class="modal-body">
            <div class="row pd-all-10">
              <div class="col-md-12 col-sm-12 col-xs-12 bg-info">
                  <h5><strong>Academic Information:</strong></h5>
              </div>
              <div class="col-md-3 col-sm-3 col-xs-12">
                  <div class="item form-group">
                      <label for="reg_no">Registration  No <span class="required">*</span></label>
                      <input class="form-control col-md-7 col-xs-12" name="reg_no" id="reg_no" value="{{ 'REG-'.uniqid() }}" required type="text" readonly>
                      <div class="help-block"></div>
                  </div>
              </div>
              <div class="col-md-3 col-sm-3 col-xs-12">
                  <div class="item form-group">
                      <label for="sessions_id">Academic Year <span class="required">*</span></label>
                      <select  class="form-control col-md-7 col-xs-12" name="sessions_id" id="sessions_id" required>
                          <option value="">--Select--</option>

                        @foreach($sessions_data as $session)
                          <option value="{{ $session->id }}">{{ $session->sessions_name }}</option>
                        @endforeach

                      </select>
                      <div class="help-block"></div>
                  </div>
              </div>
              <div class="col-md-3 col-sm-3 col-xs-12">
                  <div class="item form-group">
                      <label for="classes_id">Class <span class="required">*</span></label>
                      <select  class="form-control col-md-7 col-xs-12" name="classes_id" id="classes_id" required>
                          <option value="">--Select--</option>

                        @foreach($classes_data as $classes)
                          <option value="{{ $classes->id }}">{{ $classes->classes_name }}</option>
                        @endforeach

                      </select>
                      <div class="help-block"></div>
                  </div>
              </div>
              <div class="col-md-3 col-sm-3 col-xs-12">
                  <div class="item form-group">
                      <label for="sections_id">Group/Section (Optional) </label>
                      <select  class="form-control col-md-7 col-xs-12" name="sections_id" id="sections_id">
                          <option value="">--Select--</option>

                        @foreach($sections_data as $section)
                          <option value="{{ $section->id }}">{{ $section->sections_name }}</option>
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
              <div class="col-md-4 col-sm-4 col-xs-12">
                  <div class="item form-group">
                      <label for="student_name">Name <span class="required">*</span></label>
                      <input  class="form-control col-md-7 col-xs-12" name="student_name" id="student_name" value="" placeholder="Full Name" required type="text" autocomplete="off">
                      <div class="help-block"></div>
                  </div>
              </div>
              <div class="col-md-4 col-sm-4 col-xs-12">
                  <div class="item form-group">
                      <label for="student_dob">Birth Date <span class="required">*</span></label>
                      <input  class="form-control col-md-7 col-xs-12" name="student_dob" id="student_dob" value="" placeholder="Birth Date" required type="date" autocomplete="off">
                      <div class="help-block"></div>
                  </div>
              </div>
              <div class="col-md-4 col-sm-4 col-xs-12">
                  <div class="item form-group">
                      <label for="student_gender">Gender <span class="required">*</span></label>
                      <select  class="form-control col-md-7 col-xs-12" name="student_gender" id="student_gender" required>
                          <option value="">--Select--</option>
                          <option value="male">Male</option>
                          <option value="female">Female</option>
                      </select>
                      <div class="help-block"></div>
                  </div>
              </div>
          </div>
          <div class="row pd-all-10">
              <div class="col-md-12 col-sm-12 col-xs-12 bg-info">
                  <h5><strong>Contact Information:</strong></h5>
              </div>
              <div class="col-md-4 col-sm-4 col-xs-12">
                  <div class="item form-group">
                      <label for="student_phone">Phone <span class="required">*</span></label>
                      <input  class="form-control col-md-7 col-xs-12" name="student_phone" id="student_phone" value="" placeholder="Phone" required type="text">
                      <div class="help-block"></div>
                  </div>
              </div>
              <div class="col-md-4 col-sm-4 col-xs-12">
                  <div class="item form-group">
                      <label for="student_address1">Present Address <span class="required">*</span></label>
                      <textarea  class="form-control col-md-7 col-xs-12 textarea-4column" name="student_address1" id="student_address1" placeholder="Present Address" required></textarea>
                      <div class="help-block"></div>
                  </div>
              </div>
              <div class="col-md-4 col-sm-4 col-xs-12">
                  <div class="item form-group">
                      <label for="student_address2">Permanent Address</label>
                      <textarea  class="form-control col-md-7 col-xs-12 textarea-4column" name="student_address2" id="student_address2" placeholder="Permanent Address"></textarea>
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
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Save</button>
        </div>
      {!! Form::close() !!}
    </div>
  </div>
</div>
@endsection
