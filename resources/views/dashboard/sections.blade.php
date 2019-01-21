@extends('master')

@section('title')
	Sections
@endsection

@section('mainContent')
@if(Session::has('message'))
  <div class="notification"><div class="alert alert-success alert-dismissible" style="background-color: #0CC508;" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>{{ Session::get('message') }}</div></div>
@endif
<ol class="simec_content">
    <span class="quick_link_left"><h5><b>Sections and Settings</b></h5></span>

    <a onclick="return printtag('DivIdToPrintClassesReport');" class="quick_link_right" title="Print This Document"><i class="fa fa-print btn btn-warning"></i></a>
    <a href="" class="quick_link_right" title="Search Here"><i class="fa fa-search btn btn-info"></i></a>
    <a onclick="return location.reload();" class="quick_link_right" title="Reload List"><i class="fas fa-sync-alt btn btn-primary"></i></a>
    <a class="quick_link_right" title="Add New" data-toggle="modal" data-target="#AddNewSectionsModal"><i class="fa fa-plus-square btn btn-success"></i></a>
</ol>
<div class="grid-form">
	<div class="grid-form1" id="DivIdToPrintClassesReport">
		<table id="table-max-height" class="max-height">
			<thead>
          <tr>
            <th style="width:15%;">SN#</th>
            <th style="width:35%;"> Section Name </th>
            <th style="width:25%;"> Rank </th>
            <th style="width:25%;" class="hideOnPrint">Action</th>
          </tr>
        </thead>
        <tbody>
          <?php $i = 0; ?>
          @foreach($sections as $section)
            <tr>
              <td style="width:15%;">{{ ++$i }}</td>
              <td style="width:35%;">{{ $section->sections_name }}</td>
              <td style="width:25%;">{{ $section->sections_rank }}</td>
              <td style="width:25%;" class="hideOnPrint">
                <a href="#" data-toggle="modal" data-target="#EditSectionsModal{{ $section->id}}"><i class="fa fa-edit btn btn-warning"></i></a>
                <a href="{{ url( '/sections/delete/'.$section->id ) }}" onclick="return confirm('Are you Sure? Delete it?');"><i class="fa fa-trash btn btn-danger"></i></a>
              </td>
            </tr>
            <div class="modal fade" id="EditSectionsModal{{ $section->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="EditSectionsModalLabel">Edit Classes</h4>
                  </div>
                  {!! Form::open(['url' => '/sections/update', 'method' => 'post', 'role' => 'form']) !!}
                    @csrf
                    <div class="modal-body">
                        <div class="form-group">
                          <label for="sections_name">Enter Classes <span class="required">*</span></label>
                          <input type="hidden" name="id" value="{{ $section->id }}">
                          <input type="text" class="form-control" name="sections_name" value="{{ $section->sections_name }}" required>
                        </div>
                        <div class="form-group">
                          <label for="sections_rank">Enter Section Rank <span class="required">*</span></label>
                          <input type="number" class="form-control" name="sections_rank" id="sections_rank" value="{{ $section->sections_rank }}" required>
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
<div class="modal fade" id="AddNewSectionsModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="AddNewSectionsModalLabel">Add Sections</h4>
      </div>
      {!! Form::open(['url' => '/sections/create', 'method' => 'post', 'role' => 'form']) !!}
        @csrf
        <div class="modal-body">
            <div class="form-group">
              <label for="sections_name">Enter Section Name <span class="required">*</span></label>
              <input type="text" class="form-control" name="sections_name" id="sections_name" placeholder="Enter Sections Name" required>
            </div>
            <div class="form-group">
              <label for="sections_rank">Enter Section Rank <span class="required">*</span></label>
              <input type="number" class="form-control" name="sections_rank" id="sections_rank" placeholder="1" required>
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
