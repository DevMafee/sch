@extends('master')

@section('title')
	Evaluated Home Work Report
@endsection

@section('mainContent')
@if(Session::has('message'))
  <div class="notification"><div class="alert alert-success alert-dismissible" style="background-color: #0CC508;" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>{{ Session::get('message') }}</div></div>
@endif
<ol class="simec_content">
    <span class="quick_link_left"><h5><b>Evaluated Home Work Report</b></h5></span>
    <a class="quick_link_right btn btn-success" title="Set Home Works" href="{{ url('./view-home-works')}}"><i class="fa fa-plus-square"></i> View Home Work</a> 
</ol>
<div class="grid-form">
	<div class="grid-form1">
	  <div class="row pd-all-10">
      <div class="col-md-12 col-sm-12 col-xs-12 bg-info">
          <h5><strong>Home Works :</strong></h5>
      </div>
        <div class="col-md-12 col-sm-12 col-xs-12">
            <table>
              <thead>
                <th>SN#</th>
                <th>Name</th>
                <th>Status</th>
              </thead>
              <tbody>
                <?php $i = 0; ?>
                @foreach($home_work_evaluated as $home_work)
                <tr>
                    <td>{{ ++$i }}</td>
                    <td>{{ $home_work->name }}</td>
                    @if($home_work->status == 1)
                      <td><span class="label label-success"> Completed </span></td>
                    @elseif($home_work->status == 2)
                      <td><span class="label label-warning"> Failed to submit </span></td>
                    @endif
                </tr>
                @endforeach
              </tbody>
            </table>
        </div>
    </div>
	</div>
</div>
<div class="clearfix"></div>
<!-- // Main Content -->
@endsection
