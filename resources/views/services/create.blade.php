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

			<form action="{{route('service.store')}}" method = "post"  enctype="multipart/form-data" >
				{{csrf_field()}}
			<div class="card-body">
				<label class="mt-3 mb-3"><b>Title</b></label>
				<div class="form-group form-floating-label">
					<input id="inputFloatingLabel"  name ="title" type="text" class="form-control input-border-bottom" required>
					<label for="inputFloatingLabel" class="placeholder">Title</label>
				</div>
                <label class="mt-3 mb-3"><b>Description</b></label>
				<div class="form-group form-floating-label">
					<textarea id="inputFloatingLabel"  name ="description" type="text" class="form-control input-border-bottom" placeholder ="Enter Your Description" required></textarea>
				</div>

				<label class="mt-3 mb-3"><b> Status </b></label>
				<div class="form-group form-floating-label">
					<select  class="form-control has-error" name="status" id="selectFloatingLabel2" required>
						<option value="">Select Status</option>
						<!-- <option value="">&nbsp;</option> -->
						<option value="1">Active </option>
						<option value="2">Deactive</option>
					</select>
					<!-- <label for="selectFloatingLabel2" class="placeholder"><b>Select your type</b></label> -->
				</div>
				<label class="mt-3 mb-3"><b>Image </b></label>
				<div class="form-group">
					<input type="file"  name="image" required id="image">
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
