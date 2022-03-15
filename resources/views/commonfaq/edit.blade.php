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
				<a href="#">CommonFAQ</a>
			</li>
			<li class="separator">
				<i class="flaticon-right-arrow"></i>
			</li>
		</ul>
	</div>
	<div class="card mb-4">
		<h6 class="card-header">Edit CommonFAQ</h6>
		<!-- <form> -->
			<form action="{{route('commonfaq.update', $commonfaq->id)}}" method = "post"  enctype="multipart/form-data" >
				{{csrf_field()}}
				@method('PUT')
			<div class="card-body">
				<label class="mt-3 mb-3"><b>Title</b></label>
				<div class="form-group form-floating-label">
					<input id="inputFloatingLabel"  name ="title" value ="{{$commonfaq->title}}" type="text" class="form-control input-border-bottom" placeholder ="Enter Your Title" required>
				</div>
                <label class="mt-3 mb-3"><b>Description</b></label>
				<div class="form-group form-floating-label">
					<textarea id="inputFloatingLabel"  name ="description" type="text" class="form-control input-border-bottom" placeholder ="Enter Your Description" required>{{$commonfaq->description}}</textarea>
				</div>
			</div>


			</div>
			<div class="card-action">
				<button class="btn btn-success">Submit</button>
				 <a href ="{{url('/commonfaq')}}" class="btn btn-danger">Cancel</a>
			</div>
		</form>
	</div>
</div>
@endsection
@section('scripts')
@endsection
