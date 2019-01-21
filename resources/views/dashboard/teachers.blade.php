@extends('master')

@section('title')
	Teachers
@endsection

@section('mainContent')
@if(Session::has('message'))
  <div class="notification"><div class="alert alert-success alert-dismissible" style="background-color: #0CC508;" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>{{ Session::get('message') }}</div></div>
@endif
<ol class="simec_content">
    <span class="quick_link_left"><h5><b>All Teachers and Settings</b></h5></span>

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
            <th style="width:6%;">SN#</th>
            <th style="width:14%;"> Teacher Name </th>
            <th style="width:10%;"> Photo </th>
            <th style="width:8%;"> Gender </th>
            <th style="width:8%;"> Religion </th>
            <th style="width:6%;"> Blood Group </th>
            <th style="width:15%;"> Address </th>
            <th style="width:10%;"> Phone </th>
            <th style="width:10%;"> Email </th>
            <th style="width:13%;" class="hideOnPrint">Action</th>
          </tr>
        </thead>
        <tbody>
          <?php $i = 0; ?>
          @foreach($teachers as $teacher)
            <tr>
              <td style="width:6%;">{{ ++$i }}</td>
              <td style="width:14%;">{{ $teacher->name }}</td>
              <td style="width:10%;"><img src="{{ asset('public/teachers/'.$teacher->photo) }}" style="height: 100px; width: 80px;"></td>
              <td style="width:8%;">{{ $teacher->sex }}</td>
              <td style="width:8%;">{{ $teacher->religion }}</td>
              <td style="width:6%;">{{ $teacher->blood_group }}</td>
              <td style="width:15%;">{{ $teacher->address }}</td>
              <td style="width:10%;">{{ $teacher->phone }}</td>
              <td style="width:10%;">{{ $teacher->email }}</td>
              <td style="width:13%;" class="hideOnPrint">
                <a href="#" data-toggle="modal" data-target="#EditTeachersInfoModal{{ $teacher->id}}"><i class="fa fa-edit" style="color: #ff9501;"></i></a>
                &nbsp;
                <a href="#" data-toggle="modal" data-target="#DeleteModal{{ $teacher->id}}"><i class="fa fa-trash" style="color: #e74c3c;"></i></a>
              </td>
            </tr>
            <!-- Modal -->
            <div class="modal fade" id="EditTeachersInfoModal{{ $teacher->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
              <div class="modal-dialog" style="min-width: 65%;" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="AddNewSectionsModalLabel">Add New Teacher</h4>
                  </div>
                  {!! Form::open(['url' => '/teachers/update', 'method' => 'post', 'enctype' => 'multipart/form-data', 'role' => 'form']) !!}
                    @csrf
                    <div class="modal-body">
                      <div class="row pd-all-10">
                        <div class="col-md-12 col-sm-12 col-xs-12 bg-info">
                            <h5><strong>Teacher Personal Info:</strong></h5>
                        </div>
                        <input name="id" id="id" value="{{ $teacher->id }}" required type="hidden">
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <div class="item form-group">
                            <label for="name">Teacher's Name <span class="required">*</span></label>
                            <input class="form-control col-md-7 col-xs-12" name="name" id="name" value="{{ $teacher->name}}" required type="text">
                            <div class="help-block"></div>
                          </div>
                        </div>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <div class="item form-group">
                                <label for="sex">Gender <span class="required">*</span></label>
                                <select  class="form-control col-md-7 col-xs-12" name="sex" id="sex" required>
                                  <option value="{{ $teacher->sex}}">{{ $teacher->sex}}</option>
                                  <option value="Male">Male</option>
                                  <option value="Female">Female</option>
                                </select>
                                <div class="help-block"></div>
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <div class="item form-group">
                                <label for="religion">Religion <span class="required">*</span></label>
                                <select  class="form-control col-md-7 col-xs-12" name="religion" id="religion" required>
                                  <option value="{{ $teacher->religion}}">{{ $teacher->religion}}</option>
                                  <option value="Islam">Islam</option>
                                  <option value="Hindu">Hindu</option>
                                  <option value="Khristan">Khristan</option>
                                </select>
                                <div class="help-block"></div>
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <div class="item form-group">
                                <label for="blood_group">Blood Group </label>
                                <select  class="form-control col-md-7 col-xs-12" name="blood_group" id="blood_group">
                                  <option value="{{ $teacher->blood_group}}">{{ $teacher->blood_group}}</option>
                                  <option value="A+">A+</option>
                                  <option value="A-">A-</option>
                                  <option value="B+">B+</option>
                                  <option value="B-">B-</option>
                                </select>
                                <div class="help-block"></div>
                            </div>
                        </div>
                      </div>
                      <div class="row pd-all-10">
                          <div class="col-md-12 col-sm-12 col-xs-12 bg-info">
                              <h5><strong>Contact Information:</strong></h5>
                          </div>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <div class="item form-group">
                                <label for="phone">Phone <span class="required">*</span></label>
                                <input  class="form-control col-md-7 col-xs-12" name="phone" id="phone" value="{{ $teacher->phone }}" type="text">
                                <div class="help-block"></div>
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <div class="item form-group">
                                <label for="address">Address </label>
                                <textarea  class="form-control col-md-7 col-xs-12 textarea-4column" name="address" id="address">{{ $teacher->address }}</textarea>
                                <div class="help-block"></div>
                            </div>
                        </div>
                      </div>
                      <div class="row pd-all-10">
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <div class="item form-group">
                                <label for="photo">Photo </label>
                                <input type="file" name="photo" id="photo" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <div class="item form-group">
                              <img src="{{ asset('public/teachers/'.$teacher->photo ) }}" style="width: 100px; height: 120px;">
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
            </div>
            <!--delete-->
            <div class="modal fade" id="DeleteModal{{ $teacher->id}}" tabindex="-1" role="dialog">
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
                            <a href="{{ url( '/teachers/delete/'.$teacher->id ) }}" class="btn btn-danger">YES DELETE IT!</a>

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
        <h4 class="modal-title" id="AddNewSectionsModalLabel">Add New Teacher</h4>
      </div>
      {!! Form::open(['url' => '/teachers/create', 'method' => 'post', 'enctype' => 'multipart/form-data', 'role' => 'form']) !!}
        @csrf
        <div class="modal-body">
          <div class="row pd-all-10">
            <div class="col-md-12 col-sm-12 col-xs-12 bg-info">
                <h5><strong>Teacher Personal Info:</strong></h5>
            </div>
            <div class="col-md-6 col-sm-6 col-xs-12">
              <div class="item form-group">
                <label for="name">Teacher's Name <span class="required">*</span></label>
                <input class="form-control col-md-7 col-xs-12" name="name" id="name" value="" required type="text" placeholder="Enter Teacher's Name">
                <div class="help-block"></div>
              </div>
            </div>
            <div class="col-md-6 col-sm-6 col-xs-12">
                <div class="item form-group">
                    <label for="sex">Gender <span class="required">*</span></label>
                    <select  class="form-control col-md-7 col-xs-12" name="sex" id="sex" required>
                      <option value="">--Select--</option>
                      <option value="Male">Male</option>
                      <option value="Female">Female</option>
                    </select>
                    <div class="help-block"></div>
                </div>
            </div>
            <div class="col-md-6 col-sm-6 col-xs-12">
                <div class="item form-group">
                    <label for="religion">Religion <span class="required">*</span></label>
                    <select  class="form-control col-md-7 col-xs-12" name="religion" id="religion" required>
                      <option value="">--Select--</option>
                      <option value="Islam">Islam</option>
                      <option value="Hindu">Hindu</option>
                      <option value="Khristan">Khristan</option>
                    </select>
                    <div class="help-block"></div>
                </div>
            </div>
            <div class="col-md-6 col-sm-6 col-xs-12">
                <div class="item form-group">
                    <label for="blood_group">Blood Group </label>
                    <select  class="form-control col-md-7 col-xs-12" name="blood_group" id="blood_group">
                      <option value="">--Select--</option>
                      <option value="A+">A+</option>
                      <option value="A-">A-</option>
                      <option value="B+">B+</option>
                      <option value="B-">B-</option>
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
                    <label for="phone">Phone <span class="required">*</span></label>
                    <input  class="form-control col-md-7 col-xs-12" name="phone" id="phone" value="" placeholder="Phone" type="text">
                    <div class="help-block"></div>
                </div>
            </div>
            <div class="col-md-4 col-sm-4 col-xs-12">
                <div class="item form-group">
                    <label for="address">Address </label>
                    <textarea  class="form-control col-md-7 col-xs-12 textarea-4column" name="address" id="address" placeholder="Present Address" ></textarea>
                    <div class="help-block"></div>
                </div>
            </div>
            <div class="col-md-4 col-sm-4 col-xs-12">
                <div class="item form-group">
                    <label for="photo">Photo </label>
                    <input type="file" name="photo" id="photo" class="form-control">
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
