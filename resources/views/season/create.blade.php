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
				<a href="#">Season</a>
			</li>
			<li class="separator">
				<i class="flaticon-right-arrow"></i>
			</li>
		</ul>
	</div>
	<div class="card mb-4">
		<h6 class="card-header">Create New Season</h6>
		<!-- <form> -->

			<form action="{{route('seasons.store')}}" method = "post"  enctype="multipart/form-data" >
				{{csrf_field()}}
			<div class="card-body">
				<label class="mt-3 mb-3"><b>Season Name</b></label>
				<div class="form-group form-floating-label">
					<input id="inputFloatingLabel"  name ="season_name" type="text" class="form-control input-border-bottom" required>
					<label for="inputFloatingLabel" class="placeholder">Season Name</label>
				</div>

                <label class="mt-3 mb-3"><b>Description</b></label>
				<div class="form-group form-floating-label">
					<textarea id="inputFloatingLabel"  name ="description" type="text" class="form-control input-border-bottom" placeholder ="Enter Your Description" required></textarea>
				</div>
                <label class="mt-3 mb-3"><b>Blog Position</b></label>
				<div class="form-group form-floating-label">
					<input id="inputFloatingLabel"  name ="b_position" type="text" class="form-control input-border-bottom" required>
					<label for="inputFloatingLabel" class="placeholder">Blog Position</label>
				</div>
                <label class="mt-3 mb-3"><b>Index Position</b></label>
				<div class="form-group form-floating-label">
					<input id="inputFloatingLabel"  name ="i_position" type="text" class="form-control input-border-bottom" required>
					<label for="inputFloatingLabel" class="placeholder">Index Position</label>
				</div>
			</div>
			<div class="card-action">
				<button class="btn btn-success">Submit</button>
				 <a href ="{{url('/seasons')}}" class="btn btn-danger">Cancel</a>
			</div>
		</form>
	</div>
</div>
@endsection
@section('scripts')
@endsection
