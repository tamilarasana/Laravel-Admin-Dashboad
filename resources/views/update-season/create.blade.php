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

			<form action="{{route('update-season.store')}}" method = "post"  enctype="multipart/form-data" >
				{{csrf_field()}}
			<div class="card-body">
                <label class="mt-3 mb-3"><b>Season Name </b></label>
				<div class="form-group form-floating-label">
					<select  class="form-control has-error" name="season_id" id="selectFloatingLabel2" required>
						  <option value="">Choose Our Season</option>
                            @foreach($updateseason as $key => $data)
                            <option value="{{$data->id}}">{{$data->season_name}}</option>
                            @endforeach
					</select>
				</div>
                <label class="mt-3 mb-3"><b>Product Name</b></label>
				<div class="form-group form-floating-label">
					<select  class="form-control has-error" name="product_id" id="selectFloatingLabel2" required>
                        <option value="">Choose Our Product</option>
                            @foreach($product as $key => $data)
                            <option value="{{$data->id}}">{{$data->name}}</option>
                            @endforeach
					</select>
				</div>
                <label class="mt-3 mb-3"><b>Position</b></label>
				<div class="form-group form-floating-label">
					<input id="inputFloatingLabel"  name ="position" type="text" class="form-control input-border-bottom" placeholder="Season Position" required>
					{{-- <label for="inputFloatingLabel" class="placeholder">Season Position</label> --}}
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
@if(Session::has('error'))
		<script>
			toastr.success("{!! Session::get('error')!!}");
		</script>
	@endif
@endsection
