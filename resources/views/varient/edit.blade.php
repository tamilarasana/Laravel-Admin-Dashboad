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
				<a href="#">Varient</a>
			</li>
			<li class="separator">
				<i class="flaticon-right-arrow"></i>
			</li>
		</ul>
	</div>
	<div class="card mb-4">
		<h6 class="card-header">Create New Varient</h6>
		<!-- <form> -->

			<form action="{{ route('varients.update', $varient->id)}}" method = "post"  enctype="multipart/form-data" >
				{{csrf_field()}}
                @method('PUT')
			<div class="card-body">
				<label class="mt-3 mb-3"><b>Model type </b></label>
				<div class="form-group form-floating-label">
					<select  class="form-control has-error" name="carmodel_id" id="selectFloatingLabel2" required>
						 @foreach($models as $model)
           					 <option  {{ $varient->carmodel_id === $model->id? 'selected' : ''}}  value="{{$model->id}}">{{$model->title}}</option>
                     @endforeach

					</select>
				</div>

				<label class="mt-3 mb-3"><b>Title</b></label>
				<div class="form-group form-floating-label">
					<input id="inputFloatingLabel"  name ="var_title" value ="{{$varient->var_title}}" type="text" class="form-control input-border-bottom" placeholder ="Enter Your Title" required>
				</div>

				<label class="mt-3 mb-3"><b>Description</b></label>
				<div class="form-group form-floating-label">
					<textarea id="inputFloatingLabel"  name ="description" type="text" class="form-control input-border-bottom" placeholder ="Enter Your Description" required>{{$varient -> description}}</textarea>
				</div>

			</div>
			<div class="card-action">
				<button class="btn btn-success">Submit</button>
				 <a href ="{{route('varients.index')}}" class="btn btn-danger">Cancel</a>
			</div>
		</form>
	</div>
</div>
@endsection
@section('scripts')
@endsection
