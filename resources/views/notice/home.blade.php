@extends('master')

@section('title')
	All Notices
@endsection

@section('mainContent')
@if(Session::has('message'))
  <div class="notification"><div class="alert alert-success alert-dismissible" style="background-color: #0CC508;" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>{{ Session::get('message') }}</div></div>
@endif
<ol class="simec_content">
    <span class="quick_link_left"><h5><b>All Notices and Settings</b></h5></span>

    <a onclick="return printtag('DivIdToPrintClassesReport');" class="quick_link_right" title="Print This Document"><i class="fa fa-print btn btn-warning"></i></a>
    <a href="" class="quick_link_right" title="Search Here"><i class="fa fa-search btn btn-info"></i></a>
    <a onclick="return location.reload();" class="quick_link_right" title="Reload List"><i class="fas fa-sync-alt btn btn-primary"></i></a>
    <a class="quick_link_right" title="Add New" data-toggle="modal" data-target="#AddNewNoticeModal"><i class="fa fa-plus-square btn btn-success"></i></a>
</ol>
<div class="grid-form">
	<div class="grid-form1" id="DivIdToPrintClassesReport">
		<table id="table-max-height" class="max-height">
			<thead>
          <tr>
            <th style="width:10%;">SN#</th>
            <th style="width:20%;"> Notice Title </th>
            <th style="width:30%;"> Notice Description </th>
            <th style="width:20%;"> File </th>
            <th style="width:20%;" class="hideOnPrint">Action</th>
          </tr>
        </thead>
        <tbody>
          <?php $i = 0; ?>
          @foreach($notices as $notice)
            <tr>
              <td style="width:10%;">{{ ++$i }}</td>
              <td style="width:20%;">{{ $notice->notice_title }}</td>
              <td style="width:30%;">{{ $notice->notice_description }}</td>
              <td style="width:20%;"><img src="public/notices/{{ $notice->notice_file }}" style="height: 80px; width: 100px;"></td>
              <td style="width:30%;" class="hideOnPrint">
                <a href="#" data-toggle="modal" data-target="#EditNoticeModal{{ $notice->id}}"><i class="fa fa-edit btn btn-warning"></i></a><a href="#" data-toggle="modal" data-target="#DeleteModal{{ $notice->id}}"><i class="fa fa-trash btn btn-danger"></i></a>
              </td>
            </tr>
            <!-- Edit -->
            <div class="modal fade" id="EditNoticeModal{{ $notice->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
              <div class="modal-dialog" role="document" style="width: 800px;">
                <div class="modal-content">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="EditNoticeModalLabel">Edit Classes</h4>
                  </div>
                  {!! Form::open(['url' => '/notices/update', 'method' => 'post', 'enctype'=>'multipart/form-data', 'role' => 'form']) !!}
                    @csrf
                    <div class="modal-body">
                      <div class="form-group">
                        <label for="id">Notice Title <span class="required">*</span></label>
                        <input type="hidden" class="form-control" name="id" id="id" value="{{ $notice->id}}">
                        <input type="text" class="form-control" name="notice_title" id="notice_title" value="{{ $notice->notice_title}}" required>
                      </div>
                      <div class="form-group">
                        <label for="notice_description">Notice Description <span class="required">*</span></label>
                        <textarea type="text" class="form-control" name="notice_description" id="notice_description_main" required>{{ $notice->notice_description}}</textarea>
                      </div>
                      <div class="form-group">
                        <label for="notice_file">Notice Title </label>
                        <input type="file" class="form-control" name="notice_file" id="notice_file" >
                        <img src="public/notices/{{ $notice->notice_file }}" style="height: 80px; width: 100px;">
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
            <!--delete-->
            <div class="modal fade" id="DeleteModal{{ $notice->id}}" tabindex="-1" role="dialog">
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
                            <a href="{{ url( '/notices/delete/'.$notice->id ) }}" class="btn btn-danger">YES DELETE IT!</a>

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
<div class="modal fade" id="AddNewNoticeModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document" style="width: 800px;">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="AddNewClassesModalLabel">Add New Notice</h4>
      </div>
      {!! Form::open(['url' => '/notices/create', 'method' => 'post', 'enctype'=>'multipart/form-data', 'role' => 'form']) !!}
        @csrf
        <div class="modal-body">
            <div class="form-group">
              <label for="notice_title">Notice Title <span class="required">*</span></label>
              <input type="text" class="form-control" name="notice_title" id="notice_title" placeholder="Enter Class Name" required>
            </div>
            <div class="form-group">
              <label for="notice_description">Notice Description <span class="required">*</span></label>
              <textarea type="text" class="form-control" name="notice_description" id="notice_description_update" placeholder="Enter Class Name" required></textarea>
            </div>
            <div class="form-group">
              <label for="notice_file">Notice Title </label>
              <input type="file" class="form-control" name="notice_file" id="notice_file" >
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

<script>
  CKEDITOR.replace( 'notice_description_main' );
  CKEDITOR.replace( 'notice_description_update' );
</script>
@endsection
  