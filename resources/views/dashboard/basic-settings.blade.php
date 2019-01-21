@extends('master')

@section('title')
	Basic Settings
@endsection

@section('mainContent')
@if(Session::has('message'))
  <div class="notification"><div class="alert alert-success alert-dismissible" style="background-color: #0CC508;" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>{{ Session::get('message') }}</div></div>
@endif
<ol class="simec_content">
    <span class="quick_link_left"><h5><b>Contacts, Logo, Favicon and Slider Settings</b></h5></span>

    <a onclick="return printtag('DivIdToPrintClassesReport');" class="quick_link_right" title="Print This Document"><i class="fa fa-print btn btn-warning"></i></a>
    <a href="" class="quick_link_right" title="Search Here"><i class="fa fa-search btn btn-info"></i></a>
    <a onclick="return location.reload();" class="quick_link_right" title="Reload List"><i class="fas fa-sync-alt btn btn-primary"></i></a>
    <a class="quick_link_right" title="Add New" data-toggle="modal" data-target="#AddNewSectionsModal"><i class="fa fa-plus-square btn btn-success"></i></a>
</ol>
<div class="grid-form">
	<div class="grid-form1" id="DivIdToPrintClassesReport">
		<div class="row pd-all-10">
			{!! Form::open(['url' => '/change-contact-number', 'method' => 'post', 'enctype'=>'multipart/form-data', 'role' => 'form']) !!}
		    @csrf
	          <div class="col-md-12 col-sm-12 col-xs-12 bg-setting mb-10">
	              <h5><strong>Add Contact Details:</strong></h5>
	          </div>
	          <div class="col-md-3 col-sm-3 col-xs-12">
	              <div class="item form-group">
	                  <label for="phone">Contact Number <span class="required">*</span></label>
	                  <input class="form-control col-md-7 col-xs-12" name="phone" id="phone" required type="text" placeholder="Phone Number ...">
	                  <div class="help-block required">Contact Number Should Start with +880 ---</div>
	              </div>
	          </div>
	          <div class="col-md-3 col-sm-3 col-xs-12">
	              <div class="item form-group">
	                  <label for="email">Contact Email <span class="required">*</span></label>
	                  <input class="form-control col-md-7 col-xs-12" name="email" id="email" required type="email" placeholder="Enter Email ...">
	                  <div class="help-block required"></div>
	              </div>
	          </div>
	          <div class="col-md-3 col-sm-3 col-xs-12">
	              <div class="item form-group">
	                  <label for="address">Address <span class="required">*</span></label>
	                  <textarea class="form-control col-md-7 col-xs-12" name="address" id="address" required type="text" placeholder="Enter Address ..."></textarea>
	                  <div class="help-block required"></div>
	              </div>
	          </div>
	          <div class="col-md-3 col-sm-3 col-xs-12">
	              <div class="item form-group"><br>
	                  <input class="btn btn-primary" type="submit" value="Set Contacts">
	              </div>
	          </div>
    		{!! Form::close() !!}
    		<table id="table-max-height" class="max-height">
				<thead>
		          <tr>
		            <th style="width:10%;">SN#</th>
		            <th style="width:25%;"> Number </th>
		            <th style="width:25%;"> Email </th>
		            <th style="width:25%;"> Address </th>
		            <th style="width:15%;">Action</th>
		          </tr>
		        </thead>
		        <tbody>
		          <?php $i = 0; ?>
		          @foreach($contacts as $contact)
		            <tr>
		              <td style="width:10%;">{{ ++$i }}</td>
		              <td style="width:25%;">{{ $contact->phone}}</td>
		              <td style="width:25%;">{{ $contact->email}}</td>
		              <td style="width:25%;">{{ $contact->address}}</td>
		              <td style="width:15%;">
		                <a data-toggle="modal" data-target="#DeleteContacts{{ $contact->id}}"><i class="fa fa-trash btn btn-danger"></i></a>
		              </td>
		              <!--delete-->
			            <div class="modal fade" id="DeleteContacts{{ $contact->id}}" tabindex="-1" role="dialog">
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
			                          {!! Form::open(['url' => '/contact-number/delete/'.$contact->id, 'method' => 'delete', 'role' => 'form']) !!}
			                            @csrf
			                            
			                              <button type="button" class="btn btn-success" data-dismiss="modal">BACK</button>
			                              <button type="submit" class="btn btn-danger">YES DELETE IT!</button>
			                          {!! Form::close() !!}
			                        </div>
			                    </div>
			                </div>
			            </div>
		            </tr>
		          @endforeach
		        </tbody>
		    </table>
        </div>
	</div>

	<div class="grid-form1" id="DivIdToPrintClassesReport">
		<div class="row pd-all-10">
			{!! Form::open(['url' => '/change-logo', 'method' => 'post', 'enctype'=>'multipart/form-data', 'role' => 'form']) !!}
		    @csrf
	          <div class="col-md-12 col-sm-12 col-xs-12 bg-setting mb-10">
	              <h5><strong>Change Logo:</strong></h5>
	          </div>
	          <div class="col-md-4 col-sm-4 col-xs-12">
	              <div class="item form-group">
	                  <label for="photo">Select Logo <span class="required">*</span></label>
	                  <input class="form-control col-md-7 col-xs-12" name="photo" id="photo" required type="file">
	                  <div class="help-block required">Logo size should be 153px/27px (MAX)</div>
	              </div>
	          </div>
	          <div class="col-md-4 col-sm-4 col-xs-12">
	              <div class="item form-group"><br>
	                  <input class="btn btn-primary" type="submit" value="Change Logo">
	              </div>
	          </div>
    		{!! Form::close() !!}
    		<table id="table-max-height" class="max-height">
				<thead>
		          <tr>
		            <th style="width:10%;">SN#</th>
		            <th style="width:60%;"> Photo </th>
		            <th style="width:30%;">Action</th>
		          </tr>
		        </thead>
		        <tbody>
		          <?php $i = 0; ?>
		          @foreach($logos as $logo)
		            <tr>
		              <td style="width:10%;">{{ ++$i }}</td>
		              <td style="width:60%;"><img src="{{ asset( 'public/logos/'.$logo->photo ) }}" style="width: 80px; height: 80px;"></td>
		              <td style="width:30%;">
		                <a data-toggle="modal" data-target="#DeleteLogo{{ $logo->id}}"><i class="fa fa-trash btn btn-danger"></i></a>
		              </td>
		              <!--delete-->
			            <div class="modal fade" id="DeleteLogo{{ $logo->id}}" tabindex="-1" role="dialog">
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
			                          {!! Form::open(['url' => '/logo/delete/'.$logo->id, 'method' => 'delete', 'role' => 'form']) !!}
			                            @csrf
			                            
			                              <button type="button" class="btn btn-success" data-dismiss="modal">BACK</button>
			                              <button type="submit" class="btn btn-danger">YES DELETE IT!</button>
			                          {!! Form::close() !!}
			                        </div>
			                    </div>
			                </div>
			            </div>
		            </tr>
		          @endforeach
		        </tbody>
		    </table>
        </div>
	</div>

	<!-- Favicon Change -->
	
	<div class="grid-form1" id="DivIdToPrintClassesReport">
		<div class="row pd-all-10">
		{!! Form::open(['url' => '/change-favicon', 'method' => 'post', 'enctype'=>'multipart/form-data', 'role' => 'form']) !!}
	    @csrf
          <div class="col-md-12 col-sm-12 col-xs-12 bg-setting mb-10">
              <h5><strong>Change Favicon:</strong></h5>
          </div>
          <div class="col-md-4 col-sm-4 col-xs-12">
              <div class="item form-group">
                  <label for="photo">Select Favicon <span class="required">*</span></label>
                  <input class="form-control col-md-7 col-xs-12" name="photo" id="photo" required type="file">
                  <div class="help-block required">Favicon size should be 100px/100px (MAX)</div>
              </div>
          </div>
          <div class="col-md-4 col-sm-4 col-xs-12">
              <div class="item form-group"><br>
                  <input class="btn btn-primary" type="submit" value="Change Favicon">
              </div>
          </div>
    	{!! Form::close() !!}
    		<table id="table-max-height" class="max-height">
				<thead>
		          <tr>
		            <th style="width:10%;">SN#</th>
		            <th style="width:60%;"> Photo </th>
		            <th style="width:30%;">Action</th>
		          </tr>
		        </thead>
		        <tbody>
		          <?php $i = 0; ?>
		          @foreach($favicons as $favicon)
		            <tr>
		              <td style="width:10%;">{{ ++$i }}</td>
		              <td style="width:60%;"><img src="{{ asset( 'public/favicons/'.$favicon->photo ) }}" style="width: 80px; height: 80px;"></td>
		              <td style="width:30%;">
		                <a data-toggle="modal" data-target="#DeleteFavicon{{ $favicon->id}}"><i class="fa fa-trash btn btn-danger"></i></a>
		              </td>
		              <!--delete-->
			            <div class="modal fade" id="DeleteFavicon{{ $favicon->id}}" tabindex="-1" role="dialog">
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
			                          {!! Form::open(['url' => '/favicon/delete/'.$favicon->id, 'method' => 'delete', 'role' => 'form']) !!}
			                            @csrf
			                            
			                              <button type="button" class="btn btn-success" data-dismiss="modal">BACK</button>
			                              <button type="submit" class="btn btn-danger">YES DELETE IT!</button>
			                          {!! Form::close() !!}
			                        </div>
			                    </div>
			                </div>
			            </div>
		            </tr>
		          @endforeach
		        </tbody>
		    </table>
    	</div>
	</div>

	<!-- Slider Change -->

	<div class="grid-form1" id="DivIdToPrintClassesReport">
	<div class="row pd-all-10">
		{!! Form::open(['url' => '/change-slider', 'method' => 'post', 'enctype'=>'multipart/form-data', 'role' => 'form']) !!}
    	@csrf
          <div class="col-md-12 col-sm-12 col-xs-12 bg-setting mb-10">
              <h5><strong>Add Slider:</strong></h5>
          </div>
          <div class="col-md-4 col-sm-4 col-xs-12">
              <div class="item form-group">
                  <label for="title">Slider Title <span class="required">*</span></label>
                  <input class="form-control col-md-7 col-xs-12" name="title" id="title" type="text" placeholder="Enter Slider title ..">
              </div>
          </div>
          <div class="col-md-4 col-sm-4 col-xs-12">
              <div class="item form-group">
                  <label for="photo">Select Photo <span class="required">*</span></label>
                  <input class="form-control col-md-7 col-xs-12" name="photo" id="photo" required type="file">
                  <div class="help-block required">Slider size should be 1200px/800px.</div>
              </div>
          </div>
          <div class="col-md-4 col-sm-4 col-xs-12">
              <div class="item form-group"><br>
                  <input class="btn btn-primary" type="submit" value="Add Slider">
              </div>
          </div>
    	{!! Form::close() !!}
	    	<table id="table-max-height" class="max-height">
				<thead>
		          <tr>
		            <th style="width:10%;">SN#</th>
		            <th style="width:45%;"> Title </th>
		            <th style="width:30%;"> Photo </th>
		            <th style="width:15%;">Action</th>
		          </tr>
		        </thead>
		        <tbody>
		          <?php $i = 0; ?>
		          @foreach($sliders as $slider)
		            <tr>
		              <td style="width:10%;">{{ ++$i }}</td>
		              <td style="width:45%;">{{ $slider->title }}</td>
		              <td style="width:30%;"><img src="{{ asset( 'public/sliders/'.$slider->photo ) }}" style="width: 120px; height: 80px;"></td>
		              <td style="width:15%;">
		                <a data-toggle="modal" data-target="#DeleteSlider{{ $slider->id}}"><i class="fa fa-trash btn btn-danger"></i></a>
		              </td>
		              <!--delete-->
			            <div class="modal fade" id="DeleteSlider{{ $slider->id}}" tabindex="-1" role="dialog">
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
			                          {!! Form::open(['url' => '/slider/delete/'.$slider->id, 'method' => 'delete', 'role' => 'form']) !!}
			                            @csrf
			                            
			                              <button type="button" class="btn btn-success" data-dismiss="modal">BACK</button>
			                              <button type="submit" class="btn btn-danger">YES DELETE IT!</button>
			                          {!! Form::close() !!}
			                        </div>
			                    </div>
			                </div>
			            </div>
		            </tr>
		          @endforeach
		        </tbody>
		    </table>
        </div>

	</div>
</div>
<div class="clearfix"></div>
<!-- // Main Content -->
@endsection
