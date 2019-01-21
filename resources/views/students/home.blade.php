@extends('master')

@section('title')
	All Students
@endsection

@section('mainContent')
@if(Session::has('message'))
  <div class="notification"><div class="alert alert-success alert-dismissible" style="background-color: #0CC508;" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>{{ Session::get('message') }}</div></div>
@endif
<ol class="simec_content">
    <span class="quick_link_left"><h5><b>All Students and Settings</b></h5></span>

    <a onclick="return printtag('DivIdToPrintClassesReport');" class="quick_link_right" title="Print This Document"><i class="fa fa-print btn btn-warning"></i></a>
    <a href="" class="quick_link_right" title="Search Here"><i class="fa fa-search btn btn-info"></i></a>
    <a onclick="return location.reload();" class="quick_link_right" title="Reload List"><i class="fas fa-sync-alt btn btn-primary"></i></a>
    <a class="quick_link_right" title="Add New" href="{{ url('./students/create') }}"><i class="fa fa-plus-square btn btn-success"></i></a>
    <input type="text" id="findStudent" class="w3-search-box quick_link_right" style="width: 300px; background-color: lightgray; padding: 3px; margin-right: 20px;" placeholder="Search Student .....">
</ol>
<div class="grid-form">
	<div class="grid-form1" id="DivIdToPrintClassesReport">
		<table id="table-max-height" class="max-height">
			<thead>
          <tr>
            <th>SN#</th>
            <th> Student Name </th>
            <th> Registration No. </th>
            <th> Photo </th>
            <th> Phone </th>
            <th class="hideOnPrint">Action</th>
          </tr>
      </thead>
      <tbody id="loadSearchData">
          <?php
            $i = 0;
            if (isset($_GET['page']) && $_GET['page'] != 1) {
              $i = ($_GET['page'] - 1) * 10;
            }
          ?>
          @foreach($students as $student)
            <tr>
              <td>{{ ++$i }}</td>
              <td>{{ $student->name }}</td>
              <td>{{ $student->reg_no }}</td>
              <td><img src="public/students/{{ $student->photo }}" style="height: 80px; width: 80px;"></td>
              <td>{{ $student->phone }}</td>
              <td class="hideOnPrint">
                <a href="{{ url('./students/edit/'. $student->id ) }}" ><i class="fa fa-edit btn btn-warning"></i></a>
                <a href="{{ url('./students/view/'. $student->id ) }}" ><i class="fa fa-eye btn btn-info"></i></a>
                <a data-toggle="modal" data-target="#DeleteModal{{ $student->id}}"><i class="fa fa-trash btn btn-danger"></i></a>
              </td>
            </tr>

            <!--delete-->

            <div class="modal fade" id="DeleteModal{{ $student->id}}" tabindex="-1" role="dialog">
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
                          {!! Form::open(['url' => 'students/delete/'.$student->id, 'method' => 'delete', 'role' => 'form']) !!}
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
    <table>
      <tbody id="hideOnSearch" class="">
          <tr colspan="6">{{ $students->links() }}</tr>
      </tbody>
		</table>
	</div>
</div>
<div class="clearfix"></div>
<!-- // Main Content -->

<script>
  $('document').ready(function(){

    function findAndLoadStudent( query = '' ){
      $.ajax({

        url     : "{{ route('search-student-and-load') }}",
        method  : "GET",
        data    : { query:query },
        dataType: "json",
        success : function(data){
          $("#loadSearchData").html(data.allData);
          $(".pagination").addClass('hide');
        }

      });
    }

    $("#findStudent").keyup(function(){

      var query = $("#findStudent").val();
      findAndLoadStudent(query);

    })

  })
</script>
@endsection
