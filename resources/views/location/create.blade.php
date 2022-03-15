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

			<form action="{{route('location.store')}}" method = "post"  enctype="multipart/form-data" >
				{{csrf_field()}}
			<div class="card-body">
			    <label class="mt-3 mb-3"><b> City </b></label>
				<div class="form-group form-floating-label">
					<select  class="form-control has-error" name="city" id="selectFloatingLabel2" required>
						<option value="">Select City</option>
						<!-- <option value="">&nbsp;</option> -->
						<option value="bangalore">Bangalore </option>
						<option value="hyderabad">Hyderabad</option>
					</select>
					<!-- <label for="selectFloatingLabel2" class="placeholder"><b>Select your type</b></label> -->
				</div>
                <label class="mt-3 mb-3"><b>Category  </b></label>
				<div class="form-group form-floating-label">
					<select  class="form-control has-error" name="category_id" id="selectFloatingLabel2" required>
						  <option value="">Choose Our Category</option>
		                    @foreach($category as $key => $data)
		                        <option value="{{$data->id}}">{{$data->title}}</option>
		                    @endforeach
					</select>
				</div>
				<label class="mt-3 mb-3"><b>Location Name</b></label>
				<div class="form-group form-floating-label">
					<input id="inputFloatingLabel"  name ="location_name" type="text" class="form-control input-border-bottom" placeholder ="Enter Your Title" required>
				</div>

				<label class="mt-3 mb-3"><b>Phone Number</b></label>
				<div class="form-group form-floating-label">
                    <input id="inputFloatingLabel"  name ="phone" type="text" class="form-control input-border-bottom" placeholder ="Enter Your Phone Number" required>
				</div>

                <label class="mt-3 mb-3"><b>Alternate Phone </b></label>
				<div class="form-group form-floating-label">
					<input id="inputFloatingLabel"  name ="alternate_phone" type="text" class="form-control input-border-bottom" placeholder ="Alternate Phone Number" required>
				</div>

                <label class="mt-3 mb-3"><b>Type</b></label>
				<div class="form-group form-floating-label">
					<input id="inputFloatingLabel"  name ="type" type="text" class="form-control input-border-bottom" placeholder ="Enter  Type Ex:Sales/Service" required>
				</div>

                <label class="mt-3 mb-3"><b>Rating</b></label>
				<div class="form-group form-floating-label">
					<input id="inputFloatingLabel"  name ="rating" type="text" class="form-control input-border-bottom" placeholder ="Enter Rating Ex:5" required>
				</div>

                <label class="mt-3 mb-3"><b>Email</b></label>
                <div class="form-group form-floating-label">
                    <input id="inputFloatingLabel"  name ="email" type="email" class="form-control input-border-bottom" placeholder ="Enter Your Email" required>
                </div>

				<label class="mt-3 mb-3"><b>Address</b></label>
				<div class="form-group form-floating-label">
					<textarea id="inputFloatingLabel"  name ="address" type="text" class="form-control input-border-bottom" placeholder ="Enter Your Address" required></textarea>
				</div>

                <label class="mt-3 mb-3"><b>Pincode </b></label>
				<div class="form-group form-floating-label">
					<input id="inputFloatingLabel"  name ="pincode" type="text" class="form-control input-border-bottom" placeholder =" Enter Pincode" required>
				</div>

                <label class="mt-3 mb-3"><b>Web Site</b></label>
				<div class="form-group form-floating-label">
					<input id="inputFloatingLabel"  name ="website" type="text" class="form-control input-border-bottom" placeholder ="Enter Your Website" required>
				</div>

                <label class="mt-3 mb-3"><b>Map Link</b></label>
				<div class="form-group form-floating-label">
					<input id="inputFloatingLabel"  name ="map_link" type="text" class="form-control input-border-bottom" placeholder ="Link In URL" required>
				</div>

                <label class="mt-3 mb-3"><b>Reivew Form Link</b></label>
				<div class="form-group form-floating-label">
					<input id="inputFloatingLabel"  name ="review_form_link" type="text" class="form-control input-border-bottom" placeholder ="Link In URL" required>
				</div>

                <label class="mt-3 mb-3"><b>Latitude</b></label>
				<div class="form-group form-floating-label">
					<input id="inputFloatingLabel"  name ="latitude" type="text" class="form-control input-border-bottom" placeholder ="Enter Latitude" required>
				</div>

                <label class="mt-3 mb-3"><b>Longtitude</b></label>
				<div class="form-group form-floating-label">
					<input id="inputFloatingLabel"  name ="longtitude" type="text" class="form-control input-border-bottom" placeholder ="Enter Longtitude" required>
				</div>


                <label class="mt-3 mb-3"><b>Open Time</b></label>
				<div class="form-group form-floating-label">
					<input id="inputFloatingLabel"  name ="open_time" type="text" class="form-control input-border-bottom" placeholder ="Open Time Ex:9.00 Am To 6.00 Pm" required>
				</div>

                <label class="mt-3 mb-3"><b>Close Time</b></label>
				<div class="form-group form-floating-label">
					<input id="inputFloatingLabel"  name ="close_time" type="text" class="form-control input-border-bottom" placeholder ="Close Time Ex: 9.00 Am To 6.00 Pm" required>
				</div>

				<label class="mt-3 mb-3"><b>Location Image</b></label>
				<div class="form-group">
					<input type="file"  name="image"  required id="image">
                    <img id="image_preview_container" src="{{asset('assets/img/image-preview.png')}}"
                        alt="preview image" style="max-height: 80px;">
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
