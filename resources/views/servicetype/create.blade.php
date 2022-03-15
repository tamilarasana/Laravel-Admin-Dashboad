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

			<form action="{{route('servicetype.store')}}" method = "post"  enctype="multipart/form-data" >
				{{csrf_field()}}
			<div class="card-body">
                <label class="mt-3 mb-3"><b>Service type </b></label>
				<div class="form-group form-floating-label">
					<select  class="form-control has-error" name="service_id" id="selectFloatingLabel2" required>
						  <option value="">Choose Our Service</option>
		                    @foreach($service as $key => $data)
		                        <option value="{{$data->id}}">{{$data->title}}</option>
		                    @endforeach
					</select>
				</div>

				<label class="mt-3 mb-3"><b>Title</b></label>
				<div class="form-group form-floating-label">
					<input id="inputFloatingLabel"  name ="title" type="text" class="form-control input-border-bottom" required>
					<label for="inputFloatingLabel" class="placeholder">Title</label>
				</div>
                <label class="mt-3 mb-3"><b>Warranty</b></label>
				<div class="form-group form-floating-label">
					<input id="inputFloatingLabel"  name ="warranty" type="text" class="form-control input-border-bottom" required>
					<label for="inputFloatingLabel" class="placeholder">Warranty</label>
				</div>

                <label class="mt-3 mb-3"><b>Service period</b></label>
				<div class="form-group form-floating-label">
					<input id="inputFloatingLabel"  name ="service_period" type="text" class="form-control input-border-bottom" required>
					<label for="inputFloatingLabel" class="placeholder">Service period</label>
				</div>

                <label class="mt-3 mb-3"><b>Duration</b></label>
				<div class="form-group form-floating-label">
					<input id="inputFloatingLabel"  name ="duration" type="text" class="form-control input-border-bottom" required>
					<label for="inputFloatingLabel" class="placeholder">Duration in Hours</label>
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
