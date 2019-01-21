@extends('master')

@section('title')
	Fee Collection
@endsection

@section('mainContent')
@if(Session::has('message'))
  <div class="notification"><div class="alert alert-success alert-dismissible" style="background-color: #0CC508;" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>{{ Session::get('message') }}</div></div>
@endif
<ol class="simec_content">
    <span class="quick_link_left"><h5><b>All Fee Collections and Settings</b></h5></span>

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
            <th>SN#</th>
            <th> Student Name </th>
            <th> Class </th>
            <th> Fee Type </th>
            <th> Month / Year </th>
            <th> Amount </th>
            <th> Status </th>
            <th class="hideOnPrint">Action</th>
          </tr>
        </thead>
        <tbody>
          <?php $i = 0; ?>
          @foreach($cashcollections as $cashcollection)
            <tr>
              <td>{{ ++$i }}</td>
              <td>{{ $cashcollection->std_name }}</td>
              <td>{{ $cashcollection->class_name }}</td>
              <td>{{ $cashcollection->fee_type_name }}</td>
              <td>{{ $cashcollection->month .'-'.$cashcollection->year }}</td>
              <td>{{ $cashcollection->amount }}</td>
              <td>{{ $cashcollection->status }}</td>
              <td class="hideOnPrint">
                <!-- <a href="#" data-toggle="modal" data-target="#EditRegistrationsModal{{ $registration->id}}"><i class="fa fa-edit btn btn-warning"></i></a> -->
                <a data-toggle="modal" data-target="#DeleteModal{{ $cashcollection->id}}"><i class="fa fa-trash btn btn-danger"></i></a>
              </td>
            </tr>

            <div class="modal fade" id="DeleteModal{{ $cashcollection->id}}" tabindex="-1" role="dialog">
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
                          {!! Form::open(['url' => 'fee-collection-delete/'.$cashcollection->id, 'method' => 'delete', 'role' => 'form']) !!}
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
        <h4 class="modal-title" id="AddNewSectionsModalLabel">Fee Collection from Student</h4>
      </div>
      {!! Form::open(['url' => '/fee-collection-create', 'method' => 'post', 'role' => 'form']) !!}
        @csrf
        <div class="modal-body">
            <div class="row pd-all-10">
              <div class="col-md-12 col-sm-12 col-xs-12 bg-info">
                  <h5><strong>Student Info:</strong></h5>
              </div>
              <div class="col-md-3 col-sm-3 col-xs-12">
                  <div class="item form-group">
                      <label for="student">Student ID <span class="required">*</span></label>
                      <input class="form-control col-md-7 col-xs-12" name="student" id="student" required type="text" placeholder="Enter Student ID Number ...">
                      <div class="help-block"></div>
                  </div>
              </div>
              <div class="col-md-3 col-sm-3 col-xs-12">
                  <div class="item form-group">
                      <label for="class">Class <span class="required">*</span></label>
                      <input class="form-control col-md-7 col-xs-12" name="class" id="class" required type="text" placeholder="Auto Load ..." value="" readonly>
                      <div class="help-block"></div>
                  </div>
              </div>
              <div class="col-md-4 col-sm-4 col-xs-12">
                  <div class="item form-group">
                      <label for="student_name">Name <span class="required">*</span></label>
                      <input  class="form-control col-md-7 col-xs-12" name="student_name" id="student_name" value="" placeholder="Auto Load....." required type="text" readonly>
                      <div class="help-block"></div>
                  </div>
              </div>
            </div>              
            <div class="row pd-all-10">
              <div class="col-md-12 col-sm-12 col-xs-12 bg-info">
                  <h5><strong>Payment Information:</strong></h5>
              </div>
              <div class="col-md-4 col-sm-4 col-xs-12">
                  <div class="item form-group">
                      <label for="student_phone">Total Due <span class="required">*</span></label>
                      <input  class="form-control col-md-7 col-xs-12" name="student_due" id="student_due" value="" placeholder="Total Due" required type="text" readonly>
                      <div class="help-block"></div>
                  </div>
              </div>
              <div class="col-md-4 col-sm-4 col-xs-12">
                  <div class="item form-group">
                      <label for="student_address1">Payment <span class="required">*</span></label>
                      <input  class="form-control col-md-7 col-xs-12" name="student_payment" id="student_payment" placeholder="Payment Amount.. " required type="number" step="any">
                      <div class="help-block"></div>
                  </div>
              </div>
              <div class="col-md-4 col-sm-4 col-xs-12">
                  <div class="item form-group">
                      <label for="student_address2">Due Amount</label>
                      <input  class="form-control col-md-7 col-xs-12" name="student_nxt_due" id="student_nxt_due" placeholder="Auto Calculate Amount.. " type="text" readonly>
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
<script>
  $('document').ready(function(){
    $("#student").keyup(function(){
      var std = $("#student").val();
      $.ajax({
        url     : "{{ route('fee-collection-student-fee-load') }}",
        method  : "POST",
        data    : {_token:"{{csrf_token()}}", std:std},
        success : function(data){
          if (data != '') {
            $("#class").val(data[0]['class_name']);
            $("#student_name").val(data[0]['name']);
            $("#student_due").val(500);
          }else{
            $("#class").val('');
            $("#student_name").val('');
            $("#student_due").val('');
          }
          
        }
      });
    })

    $("#student_payment").keyup(function(){
      var std_payment = $("#student_payment").val();
      var std_due = $("#student_due").val();
      var next_due = 0;
      if (std_payment > 0) {
        next_due = std_due - std_payment;
        $("#student_nxt_due").val(next_due);
      }else{
        $("#student_nxt_due").val('Bad_Format');
      }
    })
  })
</script>
@endsection

