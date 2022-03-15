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
		<h6 class="card-header">Create New Category</h6>
		<!-- <form> -->

			<form action="{{route('category.store')}}" method = "post"  enctype="multipart/form-data" >
				{{csrf_field()}}
			<div class="card-body">
				<label class="mt-3 mb-3"><b>Category logo </b></label>
				<div class="form-group">
					<input type="file"  name="cat_logo" required id="image1">
                    <img id="image_preview_container" src="{{asset('assets/img/image-preview.png')}}"
                        alt="preview image" style="max-height: 80px;">
				</div>

				<label class="mt-3 mb-3"><b>Category Image </b></label>
				<div class="form-group">
					<input type="file"  name="cat_image" required id="image2">
                    <img id="image_preview" src="{{asset('assets/img/image-preview.png')}}"
                        alt="preview image" style="max-height: 100px;">
				</div>

				<label class="mt-3 mb-3"><b>Category Name</b></label>
				<div class="form-group form-floating-label">
					<input id="inputFloatingLabel"  name ="title" type="text" class="form-control input-border-bottom" required>
					<label for="inputFloatingLabel" class="placeholder">Category Name</label>
				</div>
                <label class="mt-3 mb-3"><b> Status </b></label>
				<div class="form-group form-floating-label">
					<select  class="form-control has-error" name="status" id="selectFloatingLabel2" required>
						<option value="">Select Status</option>
						<!-- <option value="">&nbsp;</option> -->
						<option value="1">Active </option>
						<option value="0">Deactive</option>
					</select>
					<!-- <label for="selectFloatingLabel2" class="placeholder"><b>Select your type</b></label> -->
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
       $('#image1').change(function(){
            let reader = new FileReader();
            reader.onload = (e) => {
              $('#image_preview_container').attr('src', e.target.result);
            }
            reader.readAsDataURL(this.files[0]);
        });
    });

</script>
<script>
    $(document).ready(function (e) {
       $('#image2').change(function(){
            let reader = new FileReader();
            reader.onload = (e) => {
              $('#image_preview').attr('src', e.target.result);
            }
            reader.readAsDataURL(this.files[0]);
        });
    });

</script>
@endsection
