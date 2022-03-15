@extends('layouts.master')
@section('title')
Kalyani Motors
@endsection
@section('content')
<div class="page-inner">
	<div class="page-header">
		<h4 class="page-title">Kalyani Motors</h4>
		<ul class="breadcrumbs">
			<li class="nav-home">
				<a href="#">
					<i class="flaticon-home"></i>
				</a>
			</li>
			<li class="separator">
				<i class="flaticon-right-arrow"></i>
			</li>
			<li class="nav-item">
				<a href="#">Specification</a>
			</li>
			<li class="separator">
				<i class="flaticon-right-arrow"></i>
			</li>
		</ul>
	</div>
	<div class="card mb-4">
		<h6 class="card-header">Create New Specification</h6>
		<!-- <form> -->

			<form action="{{route('specname.store')}}" method = "post"  enctype="multipart/form-data" >
				{{csrf_field()}}
			<div class="card-body">
				
				<label class="mt-3 mb-3"><b>Specification Name</b></label>
				<div class="form-group form-floating-label">
					<input id="inputFloatingLabel"  name ="specname" type="text" class="form-control input-border-bottom" placeholder ="Enter Your Title" required>
				</div>

				<label class="mt-3 mb-3"><b>Status  </b></label>
				<div class="form-group form-floating-label">
					<select  class="form-control has-error" name="status" id="selectFloatingLabel2" required>
						<option value="">Select Your Type</option>
						<option value="1">Active</option>
						<option value="0">Deactive</option>
					</select>
				</div>
				
			</div>
			<div class="card-action">
				<button class="btn btn-success">Submit</button>
				 <a href ="{{url('/banner')}}" class="btn btn-danger">Cancel</a>
			</div>
		</form>
	</div>
</div>
@endsection
@section('scripts')
@endsection