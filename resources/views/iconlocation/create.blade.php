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
				<a href="#">Location</a>
			</li>
			<li class="separator">
				<i class="flaticon-right-arrow"></i>
			</li>
		</ul>
	</div>
	<div class="card mb-4">
		<h6 class="card-header">Create New Location</h6>
		<!-- <form> -->

			<form action="{{route('iconlocation.store')}}" method = "post"  enctype="multipart/form-data" >
				{{csrf_field()}}
			<div class="card-body">
                <label class="mt-3 mb-3"><b> City </b></label>
				<div class="form-group form-floating-label">
					<select  class="form-control has-error" name="city" id="selectFloatingLabel2" required>
						<option value="">Select City</option>
						<!-- <option value="">&nbsp;</option> -->
						<option value="1">Bangalore </option>
						<option value="2">Hyderabad</option>
					</select>
					<!-- <label for="selectFloatingLabel2" class="placeholder"><b>Select your type</b></label> -->
				</div>
                {{-- <label class="mt-3 mb-3"><b>Category Type </b></label>
				<div class="form-group form-floating-label">
					<select  class="form-control has-error" name="category_id" id="selectFloatingLabel2" required>
						  <option value="">Choose Our Category</option>
		                    @foreach($category as $key => $data)
		                        <option value="{{$data->id}}">{{$data->title}}</option>
		                    @endforeach
					</select>
				</div> --}}
				<label class="mt-3 mb-3"><b>Title</b></label>
				<div class="form-group form-floating-label">
					<input id="inputFloatingLabel"  name ="title" type="text" class="form-control input-border-bottom" placeholder ="Enter Your Title" required>
				</div>
                <label class="mt-3 mb-3"><b>Email</b></label>
				<div class="form-group form-floating-label">
					<input id="inputFloatingLabel"  name ="email" type="email" class="form-control input-border-bottom" placeholder ="Enter Your Email" required>
                    {{-- <input id="inputFloatingLabel"  name ="title" type="text" class="form-control input-border-bottom" placeholder ="Enter Your Title" required> --}}
                </div>
                <label class="mt-3 mb-3"><b>FaceBook</b></label>
				<div class="form-group form-floating-label">
					<input id="inputFloatingLabel"  name ="facebook_id" type="url" class="form-control input-border-bottom" placeholder ="Enter Your Facebook Url" required>
				</div>
                <label class="mt-3 mb-3"><b>Instagram</b></label>
				<div class="form-group form-floating-label">
					<input id="inputFloatingLabel"  name ="instagram_id" type="url" class="form-control input-border-bottom" placeholder ="Enter Your Instagram Id" required>
				</div>
                <label class="mt-3 mb-3"><b>YouTube</b></label>
				<div class="form-group form-floating-label">
					<input id="inputFloatingLabel"  name ="youtube_id" type="url" class="form-control input-border-bottom" placeholder ="Enter Your YouTube Id" required>
				</div>
                <label class="mt-3 mb-3"><b>Twitter</b></label>
				<div class="form-group form-floating-label">
					<input id="inputFloatingLabel"  name ="twitter_id" type="url" class="form-control input-border-bottom" placeholder ="Enter Your Twitter Id" required>
				</div>

				<label class="mt-3 mb-3"><b>Phone Number</b></label>
				<div class="form-group form-floating-label">
					<input id="inputFloatingLabel"  name ="phone_number" type="text" class="form-control input-border-bottom" placeholder ="Enter Your Phone Number" required>
				</div>

                <label class="mt-3 mb-3"><b>WhatsApp Number</b></label>
				<div class="form-group form-floating-label">
					<input id="inputFloatingLabel"  name ="whatsapp" type="text" class="form-control input-border-bottom" placeholder ="Enter Your WhatsApp" required>
				</div>

				<label class="mt-3 mb-3"><b>Address</b></label>
				<div class="form-group form-floating-label">
					<textarea id="inputFloatingLabel"  name ="address" type="text" class="form-control input-border-bottom" placeholder ="Enter Your Address" required></textarea>
				</div>

                <label class="mt-3 mb-3"><b>Working Days</b></label>
				<div class="form-group form-floating-label">
					<input id="inputFloatingLabel"  name ="working_days" type="text" class="form-control input-border-bottom" placeholder ="Enter Working Days Ex: Monday To Saturday" required>
				</div>

                <label class="mt-3 mb-3"><b>Working Hours</b></label>
				<div class="form-group form-floating-label">
					<input id="inputFloatingLabel"  name ="working_hours" type="text" class="form-control input-border-bottom" placeholder ="Enter Working Hours Ex: 9.00 Am To 6.00 Pm" required>
				</div>

				<label class="mt-3 mb-3"><b>Location Image</b></label>
				<div class="form-group">
					<input type="file"  name="loc_image" required id="image">
                    <img id="image_preview_container" src="{{asset('assets/img/image-preview.png')}}"
                        alt="preview image" style="max-height: 80px;">
					<!-- <small class="form-text text-muted">Example block-level help text here.</small> -->
				</div>
			</div>


			</div>
			<div class="card-action">
				<button class="btn btn-success">Submit</button>
				 <a href ="{{url('/iconlocation')}}" class="btn btn-danger">Cancel</a>
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
