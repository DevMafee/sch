@extends('master')

@section('title')
	Classes
@endsection

@section('mainContent')
@if(Session::has('message'))
  <div class="notification"><div class="alert alert-success alert-dismissible" style="background-color: #0CC508;" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>{{ Session::get('message') }}</div></div>
@endif
<ol class="simec_content">
    <span class="quick_link_left"><h5><b>Classes and Settings</b></h5></span>

    <a onclick="return printtag('DivIdToPrintClassesReport');" class="quick_link_right" title="Print This Document"><i class="fa fa-print btn btn-warning"></i></a>
    <a href="" class="quick_link_right" title="Search Here"><i class="fa fa-search btn btn-info"></i></a>
    <a onclick="return location.reload();" class="quick_link_right" title="Reload List"><i class="fas fa-sync-alt btn btn-primary"></i></a>
    <a class="quick_link_right" title="Add New" data-toggle="modal" data-target="#AddNewClassesModal"><i class="fa fa-plus-square btn btn-success"></i></a>
</ol>
<div class="grid-form">
	<div class="grid-form1" id="DivIdToPrintClassesReport">
		<table id="table-max-height" class="max-height">
			<thead>
          <tr>
            <th style="width:15%;">SN#</th>
            <th style="width:35%;"> Class Name </th>
            <th style="width:25%;"> Rank </th>
            <th style="width:25%;" class="hideOnPrint">Action</th>
          </tr>
        </thead>
        <tbody>
          <?php $i = 0; ?>
          @foreach($classes as $class)
            <tr>
              <td style="width:15%;">{{ ++$i }}</td>
              <td style="width:35%;">{{ $class->classes_name }}</td>
              <td style="width:25%;">{{ $class->classes_rank }}</td>
              <td style="width:25%;" class="hideOnPrint">
                <a href="#" data-toggle="modal" data-target="#EditClassesModal{{ $class->id}}"><i class="fa fa-edit btn btn-warning"></i></a>
                <a data-toggle="modal" data-target="#DeleteModal{{ $class->id}}"><i class="fa fa-trash btn btn-danger"></i></a>
              </td>
            </tr>
            <div class="modal fade" id="EditClassesModal{{ $class->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="EditClassesModalLabel">Edit Classes</h4>
                  </div>
                  {!! Form::open(['url' => '/classes/update', 'method' => 'post', 'role' => 'form']) !!}
                    @csrf
                    <div class="modal-body">
                        <div class="form-group">
                          <label for="classes_name">Enter Classes <span class="required">*</span></label>
                          <input type="hidden" name="id" value="{{ $class->id }}">
                          <input type="text" class="form-control" name="classes_name" value="{{ $class->classes_name }}" required>
                        </div>
                        <div class="form-group">
                          <label for="classes_rank">Enter Class Rank <span class="required">*</span></label>
                          <input type="number" class="form-control" name="classes_rank" id="classes_rank" value="{{ $class->classes_rank }}" required>
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
            <div class="modal fade" id="DeleteModal{{ $class->id}}" tabindex="-1" role="dialog">
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
                          {!! Form::open(['url' => '/classes/delete/'.$class->id, 'method' => 'delete', 'role' => 'form']) !!}
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
<div class="modal fade" id="AddNewClassesModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="AddNewClassesModalLabel">Add Classes</h4>
      </div>
      {!! Form::open(['url' => '/classes/create', 'method' => 'post', 'role' => 'form']) !!}
        @csrf
        <div class="modal-body">
            <div class="form-group">
              <label for="classes_name">Enter Class Name <span class="required">*</span></label>
              <input type="text" class="form-control" name="classes_name" id="classes_name" placeholder="Enter Class Name" required>
            </div>
            <div class="form-group">
              <label for="classes_rank">Enter Class Rank <span class="required">*</span></label>
              <input type="number" class="form-control" name="classes_rank" id="classes_rank" placeholder="Enter Class Rank" required>
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
