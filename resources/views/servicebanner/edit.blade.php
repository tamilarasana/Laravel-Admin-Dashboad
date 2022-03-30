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
				<a href="{{route('servicebanner.index')}}">Service Banner & FAQ</a>
			</li>
			<li class="separator">
				<i class="flaticon-right-arrow"></i>
			</li>
		</ul>
	</div>
	<div class="card mb-4">
		<h6 class="card-header">Service Banner & FAQ</h6>
		<!-- <form> -->

			<form action="{{ route('servicebanner.update', $servicebanner->id)}}" method = "post"  enctype="multipart/form-data" >
				{{csrf_field()}}
				@method('PUT')
			<div class="card-body">
                <label class="mt-3 mb-3"><b>YouTube</b></label>
				<div class="form-group form-floating-label">
					<input id="inputFloatingLabel"  name ="youtube_link" value="{{$servicebanner->youtube_link}}" type="url" class="form-control input-border-bottom" placeholder ="Enter Your YouTube Id" required>
				</div>

				<label class="mt-3 mb-3"><b>Service Banner Image </b></label>
				<div class="form-group">
					<input type="file"  name="service_banner" required id="image" multiple="multiple" >
                    <img src="{{ asset('storage/'.$servicebanner->service_banner) }}" width="100" alt="" title="" />
				</div>
			</div>
			<div class="card-action">
				<button class="btn btn-success">Submit</button>
				 <a href ="{{url('/servicebanner')}}" class="btn btn-danger">Cancel</a>
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
