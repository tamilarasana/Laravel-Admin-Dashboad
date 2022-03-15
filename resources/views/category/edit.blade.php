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
				<a href="{{route('category.index')}}">Category</a>
			</li>
			<li class="separator">
				<i class="flaticon-right-arrow"></i>
			</li>
		</ul>
	</div>
	<div class="card mb-4">
		<h6 class="card-header">Edit Category</h6>
		<!-- <form> -->
		<form action="{{ route('category.update', $category->id)}}" method = "post"  enctype="multipart/form-data" >
            @csrf
            @method('PUT')
			<div class="card-body">
				<label class="mt-3 mb-3"><b>Category Logo </b></label>
				<div class="form-group">
					<input type="file"  name="cat_logo">
				 <img src="{{ asset('storage/'.$category->cat_logo) }}" width="100" alt="" title="" />

				</div>
				<label class="mt-3 mb-3"><b>Category Image </b></label>
				<div class="form-group">
					<input type="file"  name="cat_image">
				 <img src="{{ asset('storage/'.$category->cat_image) }}" width="100" alt="" title="" />

				</div>
				<label class="mt-3 mb-3"><b>Title</b></label>
				<div class="form-group form-floating-label">
					<input id="inputFloatingLabel"  name ="title" value = "{{$category->title}}"type="text" class="form-control input-border-bottom" required>
					<label for="inputFloatingLabel" class="placeholder">Car Title</label>
				</div>
                <label class="mt-3 mb-3"><b> Status </b></label>
				<div class="form-group form-floating-label">
					<select  class="form-control has-error" name="status" id="selectFloatingLabel2" required>
					<option value="">Select Status</option>
					 <option value="1" @if($category->status == 1) selected @endif>Active</option>
                    <option value="0" @if($category->status == 0) selected @endif>Deactive</option>
					</select>
				</div>

			</div>
			<div class="card-action">
				<button class="btn btn-success">Submit</button>
				 <a href ="{{url('/models')}}" class="btn btn-danger">Cancel</a>
			</div>
		</form>
	</div>
</div>
@endsection
@section('scripts')
@endsection
