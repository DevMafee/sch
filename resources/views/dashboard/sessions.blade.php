@extends('master')

@section('title')
	Sessions
@endsection

@section('mainContent')
@if(Session::has('message'))
  <div class="notification"><div class="alert alert-success alert-dismissible" style="background-color: #0CC508;" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>{{ Session::get('message') }}</div></div>
@endif
<ol class="simec_content">
    <span class="quick_link_left"><h5><b>Sessions and Settings</b></h5></span>

    <a onclick="return printtag('DivIdToPrintSessionsReport');" class="quick_link_right" title="Print This Document"><i class="fa fa-print btn btn-warning"></i></a>
    <a href="" class="quick_link_right" title="Search Here"><i class="fa fa-search btn btn-info"></i></a>
    <a onclick="return location.reload();" class="quick_link_right" title="Reload List"><i class="fas fa-sync-alt btn btn-primary"></i></a>
    <a class="quick_link_right" title="Add New" data-toggle="modal" data-target="#AddNewSessionsModal"><i class="fa fa-plus-square btn btn-success"></i></a>
</ol>
<div class="grid-form">
	<div class="grid-form1" id="DivIdToPrintSessionsReport">
		<table id="table-max-height" class="max-height">
			<thead>
          <tr>
            <th style="width:20%;">SN#</th>
            <th style="width:50%;"> Session </th>
            <th style="width:30%;" class="hideOnPrint">Action</th>
          </tr>
        </thead>
        <tbody>
          <?php $i = 0; ?>
          @foreach($sessions as $session)
            <tr>
              <td style="width:20%;">{{ ++$i }}</td>
              <td style="width:50%;">{{ $session->sessions_name }}</td>
              <td style="width:30%;" class="hideOnPrint">
                <a href="#" data-toggle="modal" data-target="#EditSessionModal{{ $session->id}}"><i class="fa fa-edit btn btn-warning"></i></a><a href="{{ url( '/sessions/delete/'.$session->id ) }}" onclick="return confirm('Are you Sure? Delete it?');"><i class="fa fa-trash btn btn-danger"></i></a>
              </td>
            </tr>
            <div class="modal fade" id="EditSessionModal{{ $session->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="EditSessionModalLabel">Edit Sessions</h4>
                  </div>
                  {!! Form::open(['url' => '/sessions/update', 'method' => 'post', 'role' => 'form']) !!}
                    @csrf
                    <div class="modal-body">
                        <div class="form-group">
                          <label for="sessions_name">Enter Sessions <span class="required">*</span></label>
                          <input type="hidden" name="id" value="{{ $session->id }}">
                          <input type="text" class="form-control" name="sessions_name" value="{{ $session->sessions_name }}" required>
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
          @endforeach
        </tbody>
		</table>
	</div>
</div>
<div class="clearfix"></div>
<!-- // Main Content -->
<!-- Modal -->
<div class="modal fade" id="AddNewSessionsModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="AddNewSessionsModalLabel">Add Sessions</h4>
      </div>
      {!! Form::open(['url' => '/sessions/create', 'method' => 'post', 'role' => 'form']) !!}
        @csrf
        <div class="modal-body">
            <div class="form-group">
              <label for="sessions_name">Enter Sessions <span class="required">*</span></label>
              <input type="text" class="form-control" name="sessions_name" id="sessions_name" placeholder="Enter Sessions" required>
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
