@extends('master')

@section('title')
	All Desciplinies
@endsection

@section('mainContent')
@if(Session::has('message'))
  <div class="notification"><div class="alert alert-success alert-dismissible" style="background-color: #0CC508;" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>{{ Session::get('message') }}</div></div>
@endif
<ol class="simec_content">
    <span class="quick_link_left"><h5><b>All Desciplinies and Settings</b></h5></span>

    <a onclick="return printtag('DivIdToPrintClassesReport');" class="quick_link_right" title="Print This Document"><i class="fa fa-print btn btn-warning"></i></a>
    <a href="" class="quick_link_right" title="Search Here"><i class="fa fa-search btn btn-info"></i></a>
    <a onclick="return location.reload();" class="quick_link_right" title="Reload List"><i class="fas fa-sync-alt btn btn-primary"></i></a>
    <a class="quick_link_right" title="Add New" href="{{ url('./disciplines/create') }}"><i class="fa fa-plus-square btn btn-success"></i></a>
</ol>
<div class="grid-form">
	<div class="grid-form1" id="DivIdToPrintClassesReport">
		<table id="table-max-height" class="max-height">
			<thead>
          <tr>
            <th style="width:15%;">SN#</th>
            <th style="width:25%;"> Title </th>
            <th style="width:45%;"> Description </th>
            <th style="width:15%;" class="hideOnPrint">Action</th>
          </tr>
        </thead>
        <tbody>
          <?php $i = 0; ?>
          @foreach($disciplinies as $disciplin)
            <tr>
              <td style="width:15%;">{{ ++$i }}</td>
              <td style="width:25%;">{{ $disciplin->disciplines_title }}</td>
              <td style="width:45%;">{{ $disciplin->disciplines_description }}</td>
              <td style="width:15%;" class="hideOnPrint">
                <a href="#" data-toggle="modal" data-target="#EditDisciplineModal{{ $disciplin->id}}"><i class="fa fa-edit btn btn-warning"></i></a>
                <a data-toggle="modal" data-target="#DeleteModal{{ $disciplin->id}}"><i class="fa fa-trash btn btn-danger"></i></a>
              </td>
            </tr>
        
      <!--Edit-->
      <div class="modal fade" id="EditDisciplineModal{{ $disciplin->id}}" tabindex="-1" role="dialog">
          <div class="modal-dialog" role="document">
              <div class="modal-content">
                  <div class="modal-header bg-success">
                    <span class="heading1 default"> <i class="fas fa-edit-circle"></i> Edit Discipline?</span>
                  </div>
                  <div class="modal-body">
                    {!! Form::open(['url' => '/disciplines/update', 'method' => 'post', 'role' => 'form']) !!}
                    @csrf
                    
                      <div class="row pd-all-10">
                        <div class="col-md-12 col-sm-12 col-xs-12 bg-info">
                            <h5><strong>Discipline Title: <span class="required">*</span></strong></h5>
                        </div>
                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <input name="id" id="id" value="{{ $disciplin->id}}" type="hidden">
                            <input class="form-control col-md-7 col-xs-12" name="disciplines_title" id="disciplines_title" value="{{ $disciplin->disciplines_title }}" placeholder="Discipline Title" required type="text">
                            <div class="help-block"></div>
                        </div>
                      </div>
                      <div class="row pd-all-10">
                        <div class="col-md-12 col-sm-12 col-xs-12 bg-info">
                            <h5><strong>Discipline Description: <span class="required">*</span></strong></h5>
                        </div>
                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <textarea  class="form-control col-md-7 col-xs-12 textarea-4column" name="disciplines_description" id="disciplines_description" required>{{ $disciplin->disciplines_description }}</textarea>
                              <div class="help-block"></div> 
                        </div>
                      </div>
                  </div>
                  <div class="modal-footer">
                      <button type="button" class="btn btn-warning" data-dismiss="modal">BACK</button>
                      <button type="submit" class="btn btn-success" >UPDATE</button>

                  </div>
                  {!! Form::close() !!}
              </div>
          </div>
      </div>
            <!--delete-->
            <div class="modal fade" id="DeleteModal{{ $disciplin->id}}" tabindex="-1" role="dialog">
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
                          {!! Form::open(['url' => '/disciplines/delete/'.$disciplin->id, 'method' => 'delete', 'role' => 'form']) !!}
                            @csrf
                            
                              <button type="button" class="btn btn-success" data-dismiss="modal">BACK</button>
                              <button type="submit" class="btn btn-danger">YES DELETE IT!</button>
                          {!! Form::close() !!}
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
      {!! Form::open(['url' => '/disciplinies/create', 'method' => 'post', 'role' => 'form']) !!}
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
                      </select>
                      <div class="help-block"></div>
                  </div>
              </div>
              <div class="col-md-3 col-sm-3 col-xs-12">
                  <div class="item form-group">
                      <label for="classes_id">Class <span class="required">*</span></label>
                      <select  class="form-control col-md-7 col-xs-12" name="classes_id" id="classes_id" required>
                          <option value="">--Select--</option>
                      </select>
                      <div class="help-block"></div>
                  </div>
              </div>
              <div class="col-md-3 col-sm-3 col-xs-12">
                  <div class="item form-group">
                      <label for="sections_id">Group/Section (Optional) </label>
                      <select  class="form-control col-md-7 col-xs-12" name="sections_id" id="sections_id">
                          <option value="">--Select--</option>

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
