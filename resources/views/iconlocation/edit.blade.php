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
		<h6 class="card-header"> Edit Location</h6>
		<!-- <form> -->
			<form action="{{route('iconlocation.update', $iconlocation->id)}}" method = "post"  enctype="multipart/form-data" >
				{{csrf_field()}}
				@method('PUT')
			<div class="card-body">
                <label class="mt-3 mb-3"><b> City </b></label>
				<div class="form-group form-floating-label">
					<select  class="form-control has-error" name="city" id="selectFloatingLabel2" required>
					<option value="">Select City</option>
					 <option value="1" @if($iconlocation->city == 1) selected @endif>Bangalore</option>
                    <option value="0" @if($iconlocation->city == 0) selected @endif>Hyderabad</option>
					</select>
				</div>
                {{-- <label class="mt-3 mb-3"><b>Category type </b></label>
				<div class="form-group form-floating-label">
					<select  class="form-control has-error" name="category_id" id="selectFloatingLabel2" required>
                        @foreach($category as $cat)
                        <option  {{ $location->category_id === $cat->id? 'selected' : ''}}  value="{{$cat->id}}">{{$cat->title}}</option>
                @endforeach

					</select>
				</div> --}}

                <label class="mt-3 mb-3"><b>Title</b></label>
				<div class="form-group form-floating-label">
					<input id="inputFloatingLabel"  name ="title" type="text" value ="{{$iconlocation->title}}"  class="form-control input-border-bottom" placeholder ="Enter Your Title" required>
				</div>
                <label class="mt-3 mb-3"><b>Email</b></label>
				<div class="form-group form-floating-label">
					<input id="inputFloatingLabel"  name ="email" type="email"  value ="{{$iconlocation->email}}" class="form-control input-border-bottom" placeholder ="Enter Your Email" required>
                    {{-- <input id="inputFloatingLabel"  name ="title" type="text" class="form-control input-border-bottom" placeholder ="Enter Your Title" required> --}}
                </div>
                <label class="mt-3 mb-3"><b>FaceBook</b></label>
				<div class="form-group form-floating-label">
					<input id="inputFloatingLabel"  name ="facebook_id" type="text" value ="{{$iconlocation->facebook_id}}"  class="form-control input-border-bottom" placeholder ="Enter Your Facebook Url" required>
				</div>
                <label class="mt-3 mb-3"><b>Instagram</b></label>
				<div class="form-group form-floating-label">
					<input id="inputFloatingLabel"  name ="instagram_id" type="text" value ="{{$iconlocation->instagram_id}}" class="form-control input-border-bottom" placeholder ="Enter Your Instagram Id" required>
				</div>
                <label class="mt-3 mb-3"><b>YouTube</b></label>
				<div class="form-group form-floating-label">
					<input id="inputFloatingLabel"  name ="youtube_id" type="text"  value ="{{$iconlocation->youtube_id}}" class="form-control input-border-bottom" placeholder ="Enter Your YouTube Id" required>
				</div>
                <label class="mt-3 mb-3"><b>Twitter</b></label>
				<div class="form-group form-floating-label">
					<input id="inputFloatingLabel"  name ="twitter_id" type="text"  value ="{{$iconlocation->twitter_id}}"class="form-control input-border-bottom" placeholder ="Enter Your Twitter Id" required>
				</div>

				<label class="mt-3 mb-3"><b>Phone Number</b></label>
				<div class="form-group form-floating-label">
					<input id="inputFloatingLabel"  name ="phone_number" type="text"  value ="{{$iconlocation->phone_number}}"  class="form-control input-border-bottom" placeholder ="Enter Your Phone Number" required>
				</div>

                <label class="mt-3 mb-3"><b>WhatsApp Number</b></label>
				<div class="form-group form-floating-label">
					<input id="inputFloatingLabel"  name ="whatsapp" type="text" value ="{{$iconlocation->whatsapp}}"  class="form-control input-border-bottom" placeholder ="Enter Your WhatsApp" required>
				</div>

				<label class="mt-3 mb-3"><b>Address</b></label>
				<div class="form-group form-floating-label">
					<textarea id="inputFloatingLabel"  name ="address" type="text" class="form-control input-border-bottom" placeholder ="Enter Your Address" required>{{$iconlocation->address}} </textarea>
				</div>

                <label class="mt-3 mb-3"><b>Working Days</b></label>
				<div class="form-group form-floating-label">
					<input id="inputFloatingLabel"  name ="working_days" type="text" value ="{{$iconlocation->working_days}}"  class="form-control input-border-bottom" placeholder ="Enter Your Title" required>
				</div>
                <label class="mt-3 mb-3"><b>Working Hours</b></label>
				<div class="form-group form-floating-label">
					<input id="inputFloatingLabel"  name ="working_hours" type="text" value ="{{$iconlocation->working_hours}}"  class="form-control input-border-bottom" placeholder ="Enter Your Title" required>
				</div>

				<label class="mt-3 mb-3"><b>Location Image</b></label>
				<div class="form-group">
					<input type="file"  name="loc_image" >
                    <img src="{{ asset('storage/'.$iconlocation->loc_image) }}" width="100" alt="" title="" />

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
@endsection
