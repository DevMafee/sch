@extends('master')

@section('title')
	Set Grades
@endsection

@section('mainContent')
@if(Session::has('message'))
  <div class="notification"><div class="alert alert-success alert-dismissible" style="background-color: #0CC508;" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>{{ Session::get('message') }}</div></div>
@endif
<ol class="simec_content">
    <span class="quick_link_left"><h5><b>All Grades and Settings</b></h5></span>

    <a onclick="return printtag('DivIdToPrintClassesReport');" class="quick_link_right" title="Print This Document"><i class="fa fa-print btn btn-warning"></i></a>
    <a href="" class="quick_link_right" title="Search Here"><i class="fa fa-search btn btn-info"></i></a>
    <a onclick="return location.reload();" class="quick_link_right" title="Reload List"><i class="fas fa-sync-alt btn btn-primary"></i></a>
</ol>
<div class="inbox-mail">
  <div class="col-md-4 w3layouts simec_content">
    {!! Form::open(['url' => '/set-grades/create', 'method' => 'post', 'role' => 'form']) !!}
      @csrf
      <div class="grid-form">
          <div class="form-group">
            <label for="grade">Grade Name <span class="required">*</span></label>
            <input type="text" class="form-control" name="grade" id="grade" placeholder="Enter Grade..." required>
          </div>
          <div class="form-group">
            <label for="point_lowest">Grade Point Start <span class="required">*</span></label>
            <input type="number" step="any" class="form-control" name="point_lowest" id="point_lowest" placeholder="Enter Grade Point..." required>
          </div>
          <div class="form-group">
            <label for="point_highest">Grade Point Upto <span class="required">*</span></label>
            <input type="number" step="any" class="form-control" name="point_highest" id="point_highest" placeholder="Enter Grade Point..." required>
          </div>
          <div class="form-group">
            <label for="markrange_lowest"> Marks From <span class="required">*</span></label>
            <input type="number" class="form-control" name="markrange_lowest" id="markrange_lowest" placeholder="Enter Lowest Mark..." required>
          </div>
          <div class="form-group">
            <label for="markrange_highest"> Marks Upto <span class="required">*</span></label>
            <input type="number" class="form-control" name="markrange_highest" id="markrange_highest" placeholder="Enter Highest Mark..." required>
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
          <th style="width:15%;">SN#</th>
          <th style="width:20%;"> Grades </th>
          <th style="width:20%;"> Point Range </th>
          <th style="width:25%;"> Marks Range </th>
          <th style="width:20%;" class="hideOnPrint">Action</th>
        </tr>
      </thead>
      <tbody>
      <?php $i = 0; ?>
      @foreach($all_grades as $all_grade)
        <tr>
          <td style="width:15%;">{{ ++$i }}</td>
          <td style="width:20%;">{{ $all_grade->grade }}</td>
          <td style="width:20%;">{{ $all_grade->point_lowest }} - {{ $all_grade->point_highest }}</td>
          <td style="width:25%;">{{ $all_grade->markrange_lowest }} - {{ $all_grade->markrange_highest }}</td>
          <td style="width:20%;" class="hideOnPrint">
            <a href="#" data-toggle="modal" data-target="#EditGradeModal{{ $all_grade->id}}"><i class="fa fa-edit btn btn-warning"></i></a>
            <a data-toggle="modal" data-target="#DeleteModal{{ $all_grade->id}}"><i class="fa fa-trash btn btn-danger"></i></a>
          </td>
        </tr>
        <!-- Edit -->
        <div class="modal fade" id="EditGradeModal{{ $all_grade->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
          <div class="modal-dialog" style="min-width: 65%;" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="EditSectionsModalLabel">Edit Monthly Fee</h4>
              </div>
              {!! Form::open(['url' => '/set-grades/update', 'method' => 'post', 'role' => 'form']) !!}
                @csrf
                <div class="modal-body">
                  <div class="form-group">
                    <label for="grade">Grade Name <span class="required">*</span></label>
                    <input type="hidden" name="id" id="id" value="{{ $all_grade->id }}" required>
                    <input type="text" class="form-control" name="grade" id="grade" value="{{ $all_grade->grade }}" required>
                  </div>
                  <div class="form-group">
                    <label for="point_lowest">Grade Point Start <span class="required">*</span></label>
                    <input type="number" step="any" class="form-control" name="point_lowest" id="point_lowest" value="{{ $all_grade->point_lowest }}" required>
                  </div>
                  <div class="form-group">
                    <label for="point_highest">Grade Point Upto <span class="required">*</span></label>
                    <input type="number" step="any" class="form-control" name="point_highest" id="point_highest" value="{{ $all_grade->point_highest }}" required>
                  </div>
                  <div class="form-group">
                    <label for="markrange_lowest">Marks From <span class="required">*</span></label>
                    <input type="number" class="form-control" name="markrange_lowest" id="markrange_lowest" value="{{ $all_grade->markrange_lowest }}" required>
                  </div>
                  <div class="form-group">
                    <label for="markrange_highest"> Marks Upto <span class="required">*</span></label>
                    <input type="number" class="form-control" name="markrange_highest" id="markrange_highest" value="{{ $all_grade->markrange_highest }}" required>
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
            <div class="modal fade" id="DeleteModal{{ $all_grade->id }}" tabindex="-1" role="dialog">
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
                        {!! Form::open(['url' => 'set-grades/delete/'.$all_grade->id, 'method' => 'delete', 'role' => 'form']) !!}
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
