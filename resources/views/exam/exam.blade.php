@extends('master')

@section('title')
	Examinations
@endsection

@section('mainContent')
@if(Session::has('message'))
  <div class="notification"><div class="alert alert-success alert-dismissible" style="background-color: #0CC508;" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>{{ Session::get('message') }}</div></div>
@endif
<ol class="simec_content">
    <span class="quick_link_left"><h5><b>All Exams and Settings</b></h5></span>

    <a onclick="return printtag('DivIdToPrintClassesReport');" class="quick_link_right" title="Print This Document"><i class="fa fa-print btn btn-warning"></i></a>
    <a href="" class="quick_link_right" title="Search Here"><i class="fa fa-search btn btn-info"></i></a>
    <a onclick="return location.reload();" class="quick_link_right" title="Reload List"><i class="fas fa-sync-alt btn btn-primary"></i></a>
</ol>
<div class="inbox-mail">
  <div class="col-md-4 w3layouts simec_content">
    {!! Form::open(['url' => '/exams/create', 'method' => 'post', 'role' => 'form']) !!}
      @csrf
      <div class="grid-form">
          <div class="form-group">
            <label for="name">Exam Name <span class="required">*</span></label>
            <input type="text" class="form-control" name="name" id="name" placeholder="Enter Exam Name" required>
          </div>
          <div class="form-group">
            <label for="exam_class">Exam For Upto Class <span class="required">*</span></label>
            <input type="text" class="form-control" name="exam_class" id="exam_class" placeholder="Enter Exam Class Upto" required>
          </div>
          <div class="form-group">
            <label for="exam_date">Exam Date <span class="required">*</span></label>
            <input type="date" class="form-control" name="exam_date" id="exam_date" placeholder="Enter Exam Date" required>
          </div>
          <div class="form-group">
            <label for="comment">Comment <span class="required">*</span></label>
            <textarea class="form-control" name="comment" placeholder="Comments Here"></textarea>
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
          <th style="width:25%;"> Exam Name </th>
          <th style="width:20%;"> Date </th>
          <th style="width:25%;"> Comments </th>
          <th style="width:20%;" class="hideOnPrint">Action</th>
        </tr>
      </thead>
      <tbody>
      <?php $i = 0; ?>
      @foreach($exams as $exam)
        <tr>
          <td style="width:10%;">{{ ++$i }}</td>
          <td style="width:25%;">{{ $exam->name }}</td>
          <td style="width:20%;">{{ $exam->exam_date }}</td>
          <td style="width:25%;">{{ $exam->comment }}</td>
          <td style="width:20%;" class="hideOnPrint">
            <a href="#" data-toggle="modal" data-target="#EditSubjectModal{{ $exam->id}}"><i class="fa fa-edit btn btn-warning"></i></a>
            <a data-toggle="modal" data-target="#DeleteModal{{ $exam->id}}"><i class="fa fa-trash btn btn-danger"></i></a>
          </td>
        </tr>
        <!-- Edit -->
        <div class="modal fade" id="EditSubjectModal{{ $exam->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
          <div class="modal-dialog" style="min-width: 65%;" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="EditSectionsModalLabel">Edit Classes</h4>
              </div>
              {!! Form::open(['url' => '/exams/update', 'method' => 'post', 'role' => 'form']) !!}
                @csrf
                <div class="modal-body">
                  <div class="form-group">
                    <label for="name">Examination Name <span class="required">*</span></label>
                    <input type="hidden" name="id" value="{{ $exam->id }}">
                    <input type="text" class="form-control" name="name" id="name" value="{{ $exam->name }}" required>
                  </div>
                  <div class="form-group">
                    <label for="exam_class">Examination Name <span class="required">*</span></label>
                    <input type="text" class="form-control" name="exam_class" id="exam_class" value="{{ $exam->exam_class }}" required>
                  </div>
                  <div class="form-group">
                    <label for="exam_date">Exam Date <span class="required">*</span></label>
                    <input type="date" class="form-control" name="exam_date" id="exam_date" value="{{ $exam->exam_date }}" required>
                  </div>
                  <div class="form-group">
                    <label for="comment"> Comment </label>
                    <textarea class="form-control" name="comment">{{ $exam->comment }}</textarea>
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
            <div class="modal fade" id="DeleteModal{{ $exam->id }}" tabindex="-1" role="dialog">
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
                            <a href="{{ url( '/exams/delete/'.$exam->id ) }}" class="btn btn-danger">YES DELETE IT!</a>

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
