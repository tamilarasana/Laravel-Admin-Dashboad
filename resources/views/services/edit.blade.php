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

			<form action="{{route('service.update', $service->id)}}" method = "post"  enctype="multipart/form-data" >
				{{csrf_field()}}
				@method('PUT')
			<div class="card-body">

				<div class="form-group form-floating-label">
					<input id="inputFloatingLabel"  name ="title"  value ="{{$service->title}} "type="text" class="form-control input-border-bottom" required>
					<label for="inputFloatingLabel" class="placeholder">Title</label>
				</div>

                <label class="mt-3 mb-3"><b>Description</b></label>
				<div class="form-group form-floating-label">
					<textarea id="inputFloatingLabel"  name ="description" type="text" class="form-control input-border-bottom" placeholder ="Enter Your Description" required>{{$service -> description}}</textarea>
				</div>

                <label class="mt-3 mb-3"><b> Status </b></label>
				<div class="form-group form-floating-label">
					<select  class="form-control has-error" name="status" id="selectFloatingLabel2" required>
					<option value="">Select Status</option>
					 <option value="1" @if($service->status == 1) selected @endif>Active</option>
                    <option value="0" @if($service->status == 0) selected @endif>Deactive</option>
					</select>
				</div>

				<label class="mt-3 mb-3"><b>Image </b></label>
				<div class="form-group">
					<input type="file"  name="image">
				<img src="{{ asset('storage/'.$service->image) }}" width="100" alt="" title="" />
				</div>
			</div>
			<div class="card-action">
				<button class="btn btn-success">Submit</button>
				 <a href ="{{route('service.index')}}" class="btn btn-danger">Cancel</a>
			</div>
		</form>
	</div>
</div>
@endsection
@section('scripts')
@endsection
