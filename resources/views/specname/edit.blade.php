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

			<form action="{{ route('specname.update', $specname->id)}}" method = "post"  enctype="multipart/form-data" >
				{{csrf_field()}}
                @method('PUT')
			<div class="card-body">

				<label class="mt-3 mb-3"><b>Specification Name</b></label>
				<div class="form-group form-floating-label">
					<input id="inputFloatingLabel"  name ="specname" value="{{$specname->specname}}" type="text" class="form-control input-border-bottom" placeholder ="Enter Your Title" required>
				</div>

				<label class="mt-3 mb-3"><b>Status  </b></label>
				<div class="form-group form-floating-label">
					<select  class="form-control has-error" name="status" id="selectFloatingLabel2" required>
						<option value="1" @if($specname->status == 1) selected @endif>Active</option>
                        <option value="0" @if($specname->status == 0) selected @endif>Deactive</option>
					</select>
				</div>

			</div>
			<div class="card-action">
				<button class="btn btn-success">Submit</button>
				 <a href ="{{route('specname.index')}}" class="btn btn-danger">Cancel</a>
			</div>
		</form>
	</div>
</div>
@endsection
@section('scripts')
@endsection
