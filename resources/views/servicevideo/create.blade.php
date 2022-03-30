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
				<a href="{{route('servicebanner.index')}}">Service Video</a>
			</li>
			<li class="separator">
				<i class="flaticon-right-arrow"></i>
			</li>
		</ul>
	</div>
	<div class="card mb-4">
		<h6 class="card-header">Create New Service Video </h6>
		<!-- <form> -->

			<form action="{{URL::to('servicevideo')}}" method = "post"  enctype="multipart/form-data"  >
				{{csrf_field()}}
			<div class="card-body">
                <label class="mt-3 mb-3"><b> Service Video</b></label>
				<div class="form-group">
                    <label class="mt-3 mb-3"><b>YouTube</b></label>
                    <div class="form-group form-floating-label">
                        <input id="inputFloatingLabel"  name ="youtube_link" type="text" class="form-control input-border-bottom" placeholder ="Enter Your YouTube Id" required>
                    </div>
				</div>

                <label class="mt-3 mb-3"><b>Position</b></label>
				<div class="form-group form-floating-label">
					<input id="inputFloatingLabel"  name ="position" type="text" class="form-control input-border-bottom" placeholder ="Enter Your Position" required>
				</div>

                <label class="mt-3 mb-3"><b> Status </b></label>
				<div class="form-group form-floating-label">
					<select  class="form-control has-error" name="status" id="selectFloatingLabel2" required>
						<option value="">Select Status</option>
						<option value="1">Active </option>
						<option value="0">Deactive</option>
					</select>
				</div>

			</div>
			<div class="card-action">
				<button class="btn btn-success">Submit</button>
				 <a href ="{{url('/servicevideo')}}" class="btn btn-danger">Cancel</a>
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

