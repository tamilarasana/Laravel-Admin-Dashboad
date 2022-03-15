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

			<form action="{{route('location.update',$location->id)}}" method = "post"  enctype="multipart/form-data" >
                {{csrf_field()}}
				@method('PUT')
			<div class="card-body">
			    <label class="mt-3 mb-3"><b> City </b></label>
				<div class="form-group form-floating-label">
					<select  class="form-control has-error" name="city" id="selectFloatingLabel2" required>
					 <option value="bangalore" @if($location->city == "bangalore") selected @endif>Bangalore</option>
                    <option value="hyderabad" @if($location->city == "hyderabad") selected @endif>Hyderabad</option>
					</select>
				</div>
                <label class="mt-3 mb-3"><b>Category type </b></label>
				<div class="form-group form-floating-label">
					<select  class="form-control has-error" name="category_id" id="selectFloatingLabel2" required>
                        @foreach($category as $cat)
                        <option  {{ $location->category_id === $cat->id? 'selected' : ''}}  value="{{$cat->id}}">{{$cat->title}}</option>
             @endforeach

					</select>
				</div>
				<label class="mt-3 mb-3"><b>Location Name</b></label>
				<div class="form-group form-floating-label">
					<input id="inputFloatingLabel"  name ="location_name" type="text" value="{{$location->location_name}}" class="form-control input-border-bottom" placeholder ="Enter Your Title" required>
				</div>

				<label class="mt-3 mb-3"><b>Phone Number</b></label>
				<div class="form-group form-floating-label">
                    <input id="inputFloatingLabel"  name ="phone" type="text" value="{{$location->phone}}" class="form-control input-border-bottom" placeholder ="Enter Your Phone Number" required>
				</div>

                <label class="mt-3 mb-3"><b>Alternate Phone </b></label>
				<div class="form-group form-floating-label">
					<input id="inputFloatingLabel"  name ="alternate_phone" type="text"  value="{{$location->alternate_phone}}"class="form-control input-border-bottom" placeholder ="Alternate Phone Number" required>
				</div>

                <label class="mt-3 mb-3"><b>Type</b></label>
				<div class="form-group form-floating-label">
					<input id="inputFloatingLabel"  name ="type" type="text" value="{{$location->type}}" class="form-control input-border-bottom" placeholder ="Enter  Type Ex:Sales/Service" required>
				</div>

                <label class="mt-3 mb-3"><b>Rating</b></label>
				<div class="form-group form-floating-label">
					<input id="inputFloatingLabel"  name ="rating" type="text" value="{{$location->rating}}" class="form-control input-border-bottom" placeholder ="Enter Rating Ex:5" required>
				</div>

                <label class="mt-3 mb-3"><b>Email</b></label>
                <div class="form-group form-floating-label">
                    <input id="inputFloatingLabel"  name ="email" type="email" value="{{$location->email}}" class="form-control input-border-bottom" placeholder ="Enter Your Email" required>
                </div>

				<label class="mt-3 mb-3"><b>Address</b></label>
				<div class="form-group form-floating-label">
					<textarea id="inputFloatingLabel"  name ="address" type="text" class="form-control input-border-bottom" placeholder ="Enter Your Address" required>{{$location->address}}</textarea>
				</div>

                <label class="mt-3 mb-3"><b>Pincode </b></label>
				<div class="form-group form-floating-label">
					<input id="inputFloatingLabel"  name ="pincode" type="text" value="{{$location->pincode}}"class="form-control input-border-bottom" placeholder =" Enter Pincode" required>
				</div>

                <label class="mt-3 mb-3"><b>Web Site</b></label>
				<div class="form-group form-floating-label">
					<input id="inputFloatingLabel"  name ="website" type="text"  value="{{$location->website}}"class="form-control input-border-bottom" placeholder ="Enter Your Website" required>
				</div>

                <label class="mt-3 mb-3"><b>Map Link</b></label>
				<div class="form-group form-floating-label">
					<input id="inputFloatingLabel"  name ="map_link" type="text"  value="{{$location->map_link}}"class="form-control input-border-bottom" placeholder ="Link In URL" required>
				</div>

                <label class="mt-3 mb-3"><b>Reivew Form Link</b></label>
				<div class="form-group form-floating-label">
					<input id="inputFloatingLabel"  name ="review_form_link" type="text" value="{{$location->review_form_link}}" class="form-control input-border-bottom" placeholder ="Link In URL" required>
				</div>

                <label class="mt-3 mb-3"><b>Latitude</b></label>
				<div class="form-group form-floating-label">
					<input id="inputFloatingLabel"  name ="latitude" type="text" value="{{$location->latitude}}" class="form-control input-border-bottom" placeholder ="Enter Latitude" required>
				</div>

                <label class="mt-3 mb-3"><b>Longtitude</b></label>
				<div class="form-group form-floating-label">
					<input id="inputFloatingLabel"  name ="longtitude" type="text"  value="{{$location->longtitude}}"class="form-control input-border-bottom" placeholder ="Enter Longtitude" required>
				</div>


                <label class="mt-3 mb-3"><b>Open Time</b></label>
				<div class="form-group form-floating-label">
					<input id="inputFloatingLabel"  name ="open_time" type="text" value="{{$location->open_time}}" class="form-control input-border-bottom" placeholder ="Open Time Ex:9.00 Am To 6.00 Pm" required>
				</div>

                <label class="mt-3 mb-3"><b>Close Time</b></label>
				<div class="form-group form-floating-label">
					<input id="inputFloatingLabel"  name ="close_time" type="text" value="{{$location->close_time}}" class="form-control input-border-bottom" placeholder ="Close Time Ex: 9.00 Am To 6.00 Pm" required>
				</div>

		    	<label class="mt-3 mb-3"><b>Location Image</b></label>
				<div class="form-group">
					<input type="file"  name="image" >
                    <img src="{{ asset('storage/'.$location->image) }}" width="100" alt="" title="" />
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
@endsection
