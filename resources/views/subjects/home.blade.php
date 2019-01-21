@extends('master')

@section('title')
	All Subjects
@endsection

@section('mainContent')
@if(Session::has('message'))
  <div class="notification"><div class="alert alert-success alert-dismissible" style="background-color: #0CC508;" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>{{ Session::get('message') }}</div></div>
@endif
<ol class="simec_content">
    <span class="quick_link_left"><h5><b>All Subjects and Settings</b></h5></span>

    <a onclick="return printtag('DivIdToPrintClassesReport');" class="quick_link_right" title="Print This Document"><i class="fa fa-print btn btn-warning"></i></a>
    <a href="" class="quick_link_right" title="Search Here"><i class="fa fa-search btn btn-info"></i></a>
    <a onclick="return location.reload();" class="quick_link_right" title="Reload List"><i class="fas fa-sync-alt btn btn-primary"></i></a>
</ol>
<div class="inbox-mail">
  <div class="col-md-4 w3layouts simec_content">
    {!! Form::open(['url' => '/subjects/create', 'method' => 'post', 'role' => 'form']) !!}
      @csrf
      <div class="grid-form">
          <div class="form-group">
            <label for="subject_name">Subject Name <span class="required">*</span></label>
            <input type="text" class="form-control" name="subject_name" id="subject_name" placeholder="Enter Subject Name" required>
          </div>
          <div class="form-group">
            <label for="subject_code">Subject Code <span class="required">*</span></label>
            <input type="text" class="form-control" name="subject_code" id="subject_code" placeholder="Enter Subject Code" required>
          </div>
          <div class="form-group">
            <label for="notice_file">Subject Type <span class="required">*</span></label>
            <select class="form-control" name="subject_type">
              <option value="Theory">Theory</option>
              <option value="MCQ">MCQ</option>
              <option value="Practical">Practical</option>
            </select>
          </div>
          <div class="form-group">
            <label for="subject_class">Class <span class="required">*</span></label>
            <input type="text" class="form-control" name="subject_class" id="subject_class" placeholder="Enter Subject Class" required>
          </div>
          <div class="form-group">
            <label for="subject_mark">Total Marks <span class="required">*</span></label>
            <input type="number" class="form-control" name="subject_mark" id="subject_mark" placeholder="Enter Subject Class" required>
          </div>
          <div class="form-group">
            <label for="subject_pass_mark">Pass Mark <span class="required">*</span></label>
            <input type="number" class="form-control" name="subject_pass_mark" id="subject_pass_mark" placeholder="Enter Subject Class" required>
          </div>
          <div class="form-group">
            <button type="submit" class="btn btn-primary">Save</button>
          </div>
      </div>
    {!! Form::close() !!}
  </div>

  <div class="col-md-8 tab-content tab-content-in w3">
    <table id="table-max-height" class="max-height">
      <thead>
        <tr>
          <th style="width:10%;">SN#</th>
          <th style="width:20%;"> Subject </th>
          <th style="width:10%;"> Code </th>
          <th style="width:10%;"> Mark </th>
          <th style="width:15%;"> Pass Mark </th>
          <th style="width:15%;"> Type </th>
          <th style="width:20%;" class="hideOnPrint">Action</th>
        </tr>
      </thead>
      <tbody>
      <?php $i = 0; ?>
      @foreach($subjects as $subject)
        <tr>
          <td style="width:10%;">{{ ++$i }}</td>
          <td style="width:20%;">{{ $subject->subject_name }}</td>
          <td style="width:10%;">{{ $subject->subject_code }}</td>
          <td style="width:10%;">{{ $subject->subject_mark }}</td>
          <td style="width:15%;">{{ $subject->subject_pass_mark }}</td>
          <td style="width:15%;">{{ $subject->subject_type }}</td>
          <td style="width:20%;" class="hideOnPrint">
            <a href="#" data-toggle="modal" data-target="#EditSubjectModal{{ $subject->id}}"><i class="fa fa-edit btn btn-warning"></i></a>
            <a href="{{ url( '/subjects/delete/'.$subject->id ) }}" onclick="return confirm('Are you Sure? Delete it?');"><i class="fa fa-trash btn btn-danger"></i></a>
          </td>
        </tr>
        <!-- Edit -->
        <div class="modal fade" id="EditSubjectModal{{ $subject->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
          <div class="modal-dialog" style="min-width: 65%;" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="EditSectionsModalLabel">Edit Classes</h4>
              </div>
              {!! Form::open(['url' => '/subjects/update', 'method' => 'post', 'role' => 'form']) !!}
                @csrf
                <div class="modal-body">
                  <div class="form-group">
                    <label for="subject_name">Subject Name <span class="required">*</span></label>
                    <input type="hidden" name="id" value="{{ $subject->id }}">
                    <input type="text" class="form-control" name="subject_name" id="subject_name" value="{{ $subject->subject_name }}" required>
                  </div>
                  <div class="form-group">
                    <label for="subject_code">Subject Code <span class="required">*</span></label>
                    <input type="text" class="form-control" name="subject_code" id="subject_code" value="{{ $subject->subject_code }}" required>
                  </div>
                  <div class="form-group">
                    <label for="notice_file">Subject Type <span class="required">*</span></label>
                    <select class="form-control" name="subject_type">
                      <option value="{{ $subject->subject_type}}">{{ $subject->subject_type }}</option>
                      <option value="Theory">Theory</option>
                      <option value="MCQ">MCQ</option>
                      <option value="Practical">Practical</option>
                    </select>
                  </div>
                  <div class="form-group">
                    <label for="subject_class">Class <span class="required">*</span></label>
                    <input type="text" class="form-control" name="subject_class" id="subject_class" value="{{ $subject->subject_class }}" required>
                  </div>
                  <div class="form-group">
                    <label for="subject_mark">Total Marks <span class="required">*</span></label>
                    <input type="number" class="form-control" name="subject_mark" id="subject_mark" value="{{ $subject->subject_mark }}" required>
                  </div>
                  <div class="form-group">
                    <label for="subject_pass_mark">Pass Mark <span class="required">*</span></label>
                    <input type="number" class="form-control" name="subject_pass_mark" id="subject_pass_mark" value="{{ $subject->subject_pass_mark }}" required>
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
  <div class="clearfix"> </div>
</div>

@endsection
  