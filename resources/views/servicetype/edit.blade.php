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
			<form action="{{route('servicetype.update', $serviceType->id)}}" method = "post"  enctype="multipart/form-data" >
				{{csrf_field()}}
                @method('PUT')
			<div class="card-body">
				<label class="mt-3 mb-3"><b>Service</b></label>
				<div class="form-group form-floating-label">
					<select  class="form-control has-error" name="service_id" id="selectFloatingLabel2" required>
                        @foreach($service as $model)
                            <option  {{ $serviceType->service_id === $model->id? 'selected' : ''}}  value="{{$model->id}}">{{$model->title}}</option>
                        @endforeach
                   </select>
				</div>
				<label class="mt-3 mb-3"><b>Title</b></label>
				<div class="form-group form-floating-label">
					<input id="inputFloatingLabel"  name ="title"  value = "{{$serviceType->title}}" type="text" class="form-control input-border-bottom" required>
					<label for="inputFloatingLabel" class="placeholder">Title</label>
				</div>
                <label class="mt-3 mb-3"><b>Warranty</b></label>
				<div class="form-group form-floating-label">
					<input id="inputFloatingLabel"  name ="warranty" type="text"  value ="{{$serviceType->warranty}}" class="form-control input-border-bottom" required>
					<label for="inputFloatingLabel" class="placeholder">Warranty</label>
				</div>

                <label class="mt-3 mb-3"><b>Service period</b></label>
				<div class="form-group form-floating-label">
					<input id="inputFloatingLabel"  name ="service_period" type="text" value ="{{$serviceType->service_period}}" class="form-control input-border-bottom" required>
					<label for="inputFloatingLabel" class="placeholder">Service period</label>
				</div>

                <label class="mt-3 mb-3"><b>Duration</b></label>
				<div class="form-group form-floating-label">
					<input id="inputFloatingLabel"  name ="duration" type="text"  value ="{{$serviceType->duration}}" class="form-control input-border-bottom" required>
					<label for="inputFloatingLabel" class="placeholder">Duration in Hours</label>
				</div>

				<label class="mt-3 mb-3"><b>Image </b></label>
				<div class="form-group">
					<input type="file"  name="image" >
					<img src="{{ asset('storage/'.$serviceType->image) }}" width="100" alt="" title="" />

				</div>
			</div>
			<div class="card-action">
				<button class="btn btn-success">Submit</button>
				 <a href ="{{route('servicetype.index')}}" class="btn btn-danger">Cancel</a>
			</div>
		</form>
	</div>
</div>
@endsection
@section('scripts')
@endsection
