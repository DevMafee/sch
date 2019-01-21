@extends('master')

@section('title')
	Dashboard
@endsection

@section('mainContent')
<div class="four-grids">
	<div class="col-md-3 four-grid">
		<div class="four-agileits">
			<div class="icon">
			<i class="fas fa-user-graduate fa-3x" style="color: #FFFFFF;" aria-hidden="true"></i>
			</div>
			<div class="four-text">
				<h3>Students</h3>
				<h4> {{ $students }}  </h4>
			</div>
		</div>
	</div>
	<div class="col-md-3 four-grid">
		<div class="four-agileinfo">
			<div class="icon">
				<i class="fas fa-user-tie fa-3x" style="color: #FFFFFF;" aria-hidden="true"></i>
			</div>
			<div class="four-text">
				<h3>Teachers</h3>
				<h4>{{ $teachers }}</h4>
			</div>
		</div>
	</div>
	<div class="col-md-3 four-grid">
		<div class="four-w3ls" style="background-color: #ff9501;">
			<div class="icon">
				<i class="fas fa-money-check-alt fa-3x" style="color: #FFFFFF;" aria-hidden="true"></i>
			</div>
			<div class="four-text">
				<h3>Earnings</h3>
				<h4>$ 12,430</h4>
			</div>
		</div>
	</div>
	<div class="col-md-3 four-grid">
		<div class="four-wthree">
			<div class="icon">
				<i class="fas fa-money-check-alt fa-3x" style="color: #FFFFFF;" aria-hidden="true"></i>
			</div>
			<div class="four-text">
				<h3>Expanse</h3>
				<h4>$ 14,430</h4>
			</div>
		</div>
	</div>
	<div class="clearfix"></div>
</div>

<div class="grid-form">
	<div class="grid-form1">
		<table id="table-max-height" class="max-height">
			
		</table>
	</div>
</div>
<div class="clearfix"></div>
<!-- // Main Content -->
@endsection
