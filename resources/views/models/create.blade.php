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
		<h6 class="card-header">Create New Models</h6>
		<!-- <form> -->
			<form action="{{route('models.store')}}" method = "post"  enctype="multipart/form-data" >
				{{csrf_field()}}
			<div class="card-body">
                <label class="mt-3 mb-3"><b>Category Type </b></label>
				<div class="form-group form-floating-label">
					<select  class="form-control has-error" name="category_id" id="selectFloatingLabel2" required>
						  <option value="">Choose Our Category</option>
		                    @foreach($category as $key => $data)
		                        <option value="{{$data->id}}">{{$data->title}}</option>
		                    @endforeach
					</select>
				</div>
				<label class="mt-3 mb-3"><b>Title</b></label>
				<div class="form-group form-floating-label">
					<input id="inputFloatingLabel"  name ="title" type="text" class="form-control input-border-bottom"  placeholder = "Car Title" required>
					<!--<label for="inputFloatingLabel" class="placeholder">Car Title</label>-->
				</div>
                <label class="mt-3 mb-3"><b>Starting Price</b></label>
				<div class="form-group form-floating-label">
					<input id="inputFloatingLabel"  name ="starting_price" type="text" class="form-control input-border-bottom" placeholder ="Enter Your Starting Price" >
				</div>
				<label class="mt-3 mb-3"><b>Seo Title</b></label>
				<div class="form-group form-floating-label">
					<input id="inputFloatingLabel"  name ="seo_title" type="text" class="form-control input-border-bottom"  placeholder = "Seo Title" required>
					<!--<label for="inputFloatingLabel" class="placeholder">Car Title</label>-->
				</div>
					<label class="mt-3 mb-3"><b>Seo Tag</b></label>
				<div class="form-group form-floating-label">
					<input id="inputFloatingLabel"  name ="seo_tag" type="text" class="form-control input-border-bottom"  placeholder = "Seo Tag" required>
					<!--<label for="inputFloatingLabel" class="placeholder">Car Title</label>-->
				</div>
				 <label class="mt-3 mb-3"><b>Seo Description</b></label>
				<div class="form-group form-floating-label">
					<textarea id="inputFloatingLabel"  name ="seo_desc" type="text" class="form-control input-border-bottom" placeholder ="Seo Description" required></textarea>
				</div>

                <label class="mt-3 mb-3"><b>Position</b></label>
				<div class="form-group form-floating-label">
					<input id="inputFloatingLabel"  name ="position" type="text" class="form-control input-border-bottom" placeholder=" Category Position" required>
					{{-- <label for="inputFloatingLabel" class="placeholder">Season Position</label> --}}
				</div>

                <label class="mt-3 mb-3"><b>Description</b></label>
				<div class="form-group form-floating-label">
					<textarea id="inputFloatingLabel"  name ="description" type="text" class="form-control input-border-bottom" placeholder ="Description" required></textarea>
				</div>

				<label class="mt-3 mb-3"><b>Image </b></label>
				<div class="form-group">
					<input type="file"  name="image" required id="image1">
                    <img id="image_preview_container" src="{{asset('assets/img/image-preview.png')}}"
                        alt="preview image" style="max-height: 80px;">
					<!-- <small class="form-text text-muted">Example block-level help text here.</small> -->
				</div>

				 <label class="mt-3 mb-3"><b>File </b></label>
				<div class="form-group">
					<input type="file"  name="file" id="file" class=" @error('file') is-invalid @enderror" >
					<div class="invalid-feedback">Please Select your File.</div>
                    <label style="font-size: smaller;color: red;">Format: pdf</label>
                    @if($errors->has('file'))
                    <span class="text-danger">
                        <li>Oops!  {{$errors->first('file')}}</li>
                    </span>
                @endif
				</div>

			</div>
			<div class="card-action">
				<button class="btn btn-success">Submit</button>
				 <a href ="{{route('models.index')}}" class="btn btn-danger">Cancel</a>
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
       $('#image1').change(function(){
            let reader = new FileReader();
            reader.onload = (e) => {
              $('#image_preview_container').attr('src', e.target.result);
            }
            reader.readAsDataURL(this.files[0]);
        });
    });

</script>
@endsection
