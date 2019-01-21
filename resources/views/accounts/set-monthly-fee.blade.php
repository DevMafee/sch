@extends('master')

@section('title')
	Set Monthly Fee
@endsection

@section('mainContent')
@if(Session::has('message'))
  <div class="notification"><div class="alert alert-success alert-dismissible" style="background-color: #0CC508;" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>{{ Session::get('message') }}</div></div>
@endif
<ol class="simec_content">
    <span class="quick_link_left"><h5><b>All Monthly Fee and Settings</b></h5></span>

    <a onclick="return printtag('DivIdToPrintClassesReport');" class="quick_link_right" title="Print This Document"><i class="fa fa-print btn btn-warning"></i></a>
    <a href="" class="quick_link_right" title="Search Here"><i class="fa fa-search btn btn-info"></i></a>
    <a onclick="return location.reload();" class="quick_link_right" title="Reload List"><i class="fas fa-sync-alt btn btn-primary"></i></a>
</ol>
<div class="inbox-mail">
  <div class="col-md-4 w3layouts simec_content">
    {!! Form::open(['url' => '/set-monthly-fee-create', 'method' => 'post', 'role' => 'form']) !!}
      @csrf
      <div class="grid-form">
          <div class="form-group">
            <label for="class">Select Class <span class="required">*</span></label>
            <select class="form-control" name="class" required>
              <option value="">--Select--</option>
            @foreach($classes as $classe)
              <option value="{{ $classe->classes_rank }}">{{ $classe->classes_name }}</option>
            @endforeach
            </select>
          </div>
          <div class="form-group">
            <label for="fee"> Fee Amount <span class="required">*</span></label>
            <input type="number" step="any" class="form-control" name="fee" id="fee" placeholder="Enter Fee Amount..." required>
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
          <th style="width:20%;">SN#</th>
          <th style="width:30%;"> Class </th>
          <th style="width:30%;"> Monthly Fee </th>
          <th style="width:20%;" class="hideOnPrint">Action</th>
        </tr>
      </thead>
      <tbody>
      <?php $i = 0; ?>
      @foreach($monthlyfees as $fee)
        <tr>
          <td style="width:20%;">{{ ++$i }}</td>
          <td style="width:30%;">{{ $fee->fee_for_class }}</td>
          <td style="width:30%;">{{ $fee->fee }}</td>
          <td style="width:20%;" class="hideOnPrint">
            <a href="#" data-toggle="modal" data-target="#EditSubjectModal{{ $fee->id}}"><i class="fa fa-edit btn btn-warning"></i></a>
            <a data-toggle="modal" data-target="#DeleteModal{{ $fee->id}}"><i class="fa fa-trash btn btn-danger"></i></a>
          </td>
        </tr>
        <!-- Edit -->
        <div class="modal fade" id="EditSubjectModal{{ $fee->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
          <div class="modal-dialog" style="min-width: 65%;" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="EditSectionsModalLabel">Edit Monthly Fee</h4>
              </div>
              {!! Form::open(['url' => '/set-monthly-fee-update', 'method' => 'post', 'role' => 'form']) !!}
                @csrf
                <div class="modal-body">
                  <div class="form-group">
		            <label for="class">Select Class <span class="required">*</span></label>
		            <select class="form-control" name="class" required>
		              <option value="{{ $fee->class }}">{{ $fee->fee_for_class }}</option>
		            @foreach($classes as $classe)
		              <option value="{{ $classe->id }}">{{ $classe->classes_name }}</option>
		            @endforeach
		            </select>
		          </div>
		          <div class="form-group">
		            <label for="fee"> Fee Amount <span class="required">*</span></label>
		            <input type="number" step="any" class="form-control" name="fee" id="fee" value="{{ $fee->fee }}" required>
		            <input type="hidden" name="id" id="id" value="{{ $fee->id }}" required>
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
            <div class="modal fade" id="DeleteModal{{ $fee->id }}" tabindex="-1" role="dialog">
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
                        {!! Form::open(['url' => 'set-monthly-fee-delete/'.$fee->id, 'method' => 'delete', 'role' => 'form']) !!}
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
