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
				<a href="#">Service And Season</a>
			</li>
			<li class="separator">
				<i class="flaticon-right-arrow"></i>
			</li>
		</ul>
	</div>
	<div class="card mb-4">
		<h6 class="card-header">Create Attach Service and Season</h6>
		<!-- <form> -->
			<form action="{{route('attachseasonservice.store')}}" method = "post"  enctype="multipart/form-data" >
				{{csrf_field()}}
			<div class="card-body">
                <label class="mt-3 mb-3"><b>Service Name </b></label>
				<div class="form-group form-floating-label">
					<select  class="form-control has-error" name="service_id" id="selectFloatingLabel2" required>
						  <option value="">Choose Our Service</option>
                            @foreach($service as $key => $data)
                            <option value="{{$data->id}}">{{$data->title}}</option>
                            @endforeach
					</select>
				</div>
                <label class="mt-3 mb-3"><b>Season Name</b></label>
				<div class="form-group form-floating-label">
					<select  class="form-control has-error" name="serviceseason_id" id="selectFloatingLabel2" required>
                        <option value="">Choose Our Season</option>
                            @foreach($serviceseason as $key => $data)
                            <option value="{{$data->id}}">{{$data->season_title}}</option>
                            @endforeach
					</select>
				</div>
			</div>
			<div class="card-action">
				<button class="btn btn-success">Submit</button>
				 <a href ="{{url('/attachseasonservice')}}" class="btn btn-danger">Cancel</a>
			</div>
		</form>
	</div>
</div>
@endsection
@section('scripts')
@endsection
