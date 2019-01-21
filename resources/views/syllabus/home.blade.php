@extends('master')

@section('title')
	All Subjects
@endsection

@section('mainContent')
@if(Session::has('message'))
  <div class="notification"><div class="alert alert-success alert-dismissible" style="background-color: #0CC508;" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>{{ Session::get('message') }}</div></div>
@endif
<ol class="simec_content">
    <span class="quick_link_left"><h5><b>All Subjects and Syllabus Settings</b></h5></span>

    <a onclick="return printtag('DivIdToPrintClassesReport');" class="quick_link_right" title="Print This Document"><i class="fa fa-print btn btn-warning"></i></a>
    <a href="" class="quick_link_right" title="Search Here"><i class="fa fa-search btn btn-info"></i></a>
    <a onclick="return location.reload();" class="quick_link_right" title="Reload List"><i class="fas fa-sync-alt btn btn-primary"></i></a>
</ol>
<div class="inbox-mail">
  <div class="col-md-4 w3layouts simec_content">
    {!! Form::open(['url' => '/syllabus/create', 'method' => 'post', 'role' => 'form']) !!}
      @csrf
      <div class="grid-form">
          <div class="form-group">
            <label for="subject">Select Subject <span class="required">*</span></label>
            <select class="form-control" name="subject" required>
              <option value="">Select Subject</option>
            @foreach($subjects as $subject)
              <option value="{{ $subject->id }}">{{ $subject->subject_name }}</option>
            @endforeach
            </select>
          </div>
          <div class="form-group">
            <label for="details">Details <span class="required">*</span></label>
            <textarea class="form-control" name="details" id="details" placeholder="Enter Syllabus Details" required></textarea>
          </div>
          <div class="form-group">
            <button type="submit" class="btn btn-primary">Save</button>
          </div>
      </div>
    {!! Form::close() !!}
  </div>

  <div class="col-md-8 tab-content tab-content-in w3" id="DivIdToPrintClassesReport">
    <table id="table-max-height" class="max-height">
      <thead>
        <tr>
          <th style="width:10%;">SN#</th>
          <th style="width:20%;"> Subject </th>
          <th style="width:30%;"> Details </th>
          <th style="width:20%;" class="hideOnPrint">Action</th>
        </tr>
      </thead>
      <tbody>
      <?php $i = 0; ?>
      @foreach($syllabus as $syllabi)
        <tr>
          <td style="width:10%;">{{ ++$i }}</td>
          <td style="width:20%;">{{ $syllabi->subject_name }}</td>
          <td style="width:30%;">{{ $syllabi->details }}</td>
          <td style="width:30%;" class="hideOnPrint">
            <a href="#" data-toggle="modal" data-target="#EditSubjectModal{{ $syllabi->id}}"><i class="fa fa-edit btn btn-warning"></i></a>
            <a data-toggle="modal" data-target="#DeleteModal{{ $syllabi->id}}"><i class="fa fa-trash btn btn-danger"></i></a>
          </td>
        </tr>
        <!-- Edit -->
        <div class="modal fade" id="EditSubjectModal{{ $syllabi->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
          <div class="modal-dialog" style="min-width: 65%;" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="EditSectionsModalLabel">Edit Classes</h4>
              </div>
              {!! Form::open(['url' => '/syllabus/update', 'method' => 'post', 'role' => 'form']) !!}
                @csrf
                <div class="modal-body">
                  <div class="grid-form">
                    <div class="form-group">
                      <input type="hidden" name="id" value="{{ $syllabi->id}}">
                      <label for="subject">Select Subject<span class="required">*</span></label>
                      <select class="form-control" name="subject" required>
                        <option value="{{ $syllabi->subject }}">{{ $syllabi->subject_name }}</option>
                      @foreach($subjects as $subject)
                        <option value="{{ $subject->id }}">{{ $subject->subject_name }}</option>
                      @endforeach
                      </select>
                    </div>
                    <div class="form-group">
                      <label for="details">Details <span class="required">*</span></label>
                      <textarea class="form-control" name="details" id="details" required>{{ $syllabi->details }}</textarea>
                    </div>
                    <div class="form-group">
                      <button type="submit" class="btn btn-primary">Save</button>
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
          <!-- Delete -->
          <!--delete-->
            <div class="modal fade" id="DeleteModal{{ $syllabi->id }}" tabindex="-1" role="dialog">
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
                          {!! Form::open(['url' => '/syllabus/delete/'.$syllabi->id, 'method' => 'delete', 'role' => 'form']) !!}
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
  <div class="clearfix"> </div>
</div>

@endsection
  