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
				<a href="#">Banner</a>
			</li>
			<li class="separator">
				<i class="flaticon-right-arrow"></i>
			</li>
		</ul>
	</div>
	<div class="card mb-4">
		<h6 class="card-header">Create New Banner</h6>
		<!-- <form> -->
			
			<form action="{{route('car.store')}}" method = "post"  enctype="multipart/form-data" >
				{{csrf_field()}}
			<div class="card-body">
				<label class="mt-3 mb-3"><b>Product</b></label>
				<div class="form-group form-floating-label">
					<input id="inputFloatingLabel"  name ="product_id" type="text" class="form-control input-border-bottom" required>
					<label for="inputFloatingLabel" class="placeholder">Product </label>
				</div>
				<label class="mt-3 mb-3"><b>Image</b></label>
				<div class="form-group">
					<input type="file"  name="images[]" required multiple="multiple">
				</div>
			</div>
			<div class="card-action">
				<button class="btn btn-success">Submit</button>
				 <a href ="{{url('/car')}}" class="btn btn-danger">Cancel</a>
			</div>
		</form>
	</div>
</div>
@endsection
@section('scripts')
@endsection