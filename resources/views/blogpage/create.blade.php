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
				<a href="{{route('blogpage.index')}}">Blog Page</a>
			</li>
			<li class="separator">
				<i class="flaticon-right-arrow"></i>
			</li>
		</ul>
	</div>
	<div class="card mb-4">
		<h6 class="card-header">Create New Blog Page </h6>
		<!-- <form> -->
			<form action="{{URL::to('blogpage')}}" method = "post"  enctype="multipart/form-data"  >
				{{csrf_field()}}
			<div class="card-body">
                <label class="mt-3 mb-3"><b>Title</b></label>
				<div class="form-group form-floating-label">
					<input id="inputFloatingLabel"  name ="title" type="text" class="form-control input-border-bottom" placeholder ="Enter Your Position" required>
				</div>

                <label class="mt-3 mb-3"><b> Blog Page Link</b></label>
				<div class="form-group form-floating-label">
					<input id="inputFloatingLabel"  name ="blogpage_link" type="url" class="form-control input-border-bottom" placeholder ="Enter Your Position" required>
				</div>

                <label class="mt-3 mb-3"><b>Position</b></label>
				<div class="form-group form-floating-label">
					<input id="inputFloatingLabel"  name ="position" type="text" class="form-control input-border-bottom" placeholder ="Enter Your Position" required>
				</div>

                <label class="mt-3 mb-3"><b> Row Position</b></label>
				<div class="form-group form-floating-label">
					<input id="inputFloatingLabel"  name ="row_position" type="text" class="form-control input-border-bottom" placeholder ="Enter Your Position" required>
				</div>

			</div>
			<div class="card-action">
				<button class="btn btn-success">Submit</button>
				 <a href ="{{url('/blogpage')}}" class="btn btn-danger">Cancel</a>
			</div>
		</form>
	</div>
</div>
@endsection
@section('scripts')
@if(Session::has('error'))
		<script>
			toastr.success("{!! Session::get('error')!!}");
		</script>
	@endif
@endsection

