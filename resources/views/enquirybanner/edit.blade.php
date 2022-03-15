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
				<a href="#">Enquiry Banner Image</a>
			</li>
			<li class="separator">
				<i class="flaticon-right-arrow"></i>
			</li>
		</ul>
	</div>
	<div class="card mb-4">
		<h6 class="card-header">Edit Enquiry Image</h6>
		<!-- <form> -->
			<form action="{{route('enquirybannerimg.update',$enquirybanner->id)}}" method = "post"  enctype="multipart/form-data" >
                @csrf
                @method('PUT')
			<div class="card-body">
                <label class="mt-3 mb-3"><b>Banner Image </b></label>
				<div class="form-group">
					<input type="file"  name="banner_img" >
                    <img src="{{ asset('storage/'.$enquirybanner->banner_img) }}" width="100" alt="" title="" />
				</div>
			</div>
			<div class="card-action">
				<button class="btn btn-success">Submit</button>
				 <a href ="{{url('/enquirybannerimg')}}" class="btn btn-danger">Cancel</a>
			</div>
		</form>
	</div>
</div>
@endsection
@section('scripts')
@endsection
