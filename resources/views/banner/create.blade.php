@extends('layouts.master')
@section('title')
Kalyani Motors
@endsection
@section('content')
{{-- @if ($message = Session::get('error'))
<div class="alert alert-success">
    <p>{{ $message }}</p>
</div>
@endif --}}
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
				<a href="{{route('banner.index')}}">Banner</a>
			</li>
			<li class="separator">
				<i class="flaticon-right-arrow"></i>
			</li>
		</ul>
	</div>
	<div class="card mb-4">
		<h6 class="card-header">Create New Banner</h6>
		<!-- <form> -->

			<form action="{{URL::to('banner')}}" method = "post"  enctype="multipart/form-data"  >
				{{csrf_field()}}
			<div class="card-body">
				<label class="mt-3 mb-3"><b>Position</b></label>
				<div class="form-group form-floating-label">
					<input id="inputFloatingLabel"  name ="position" type="text" class="form-control input-border-bottom" required>
					<label for="inputFloatingLabel" class="placeholder">Banner Position</label>
				</div>

				<label class="mt-3 mb-3"><b>Banner type </b></label>
				<div class="form-group form-floating-label">
					<select  class="form-control has-error" name="type" id="selectFloatingLabel2" required>
						<option value="">Select Your Type</option>
						<!-- <option value="">&nbsp;</option> -->
						<option value="1">Desktop View </option>
						<option value="2">Mobile View</option>
					</select>
					<!-- <label for="selectFloatingLabel2" class="placeholder"><b>Select your type</b></label> -->
				</div>
				<label class="mt-3 mb-3"><b>Banner type </b></label>
				<div class="form-group">
					<input type="file"  name="banner_img" required id="image">
                    <img id="image_preview_container" src="{{asset('assets/img/image-preview.png')}}"
                        alt="preview image" style="max-height: 80px;">
					<!-- <small class="form-text text-muted">Example block-level help text here.</small> -->
				</div>
			</div>
			<div class="card-action">
				<button class="btn btn-success">Submit</button>
				 <a href ="{{url('/banner')}}" class="btn btn-danger">Cancel</a>
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

<script>
     $(document).ready(function (e) {
        $('#image').change(function(){
             let reader = new FileReader();
             reader.onload = (e) => {
               $('#image_preview_container').attr('src', e.target.result);
             }
             reader.readAsDataURL(this.files[0]);
         });
     });

 </script>
@endsection
