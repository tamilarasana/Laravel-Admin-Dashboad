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
                <li class="separator">
                    <i class="flaticon-right-arrow"></i>
                </li>
                <li class="nav-item">
                    <a href="#">Service Season</a>
                </li>
                <li class="separator">
                    <i class="flaticon-right-arrow"></i>
                </li>
            </ul>
        </div>
	<div class="card mb-4">
		<h6 class="card-header">Edit Service Season </h6>
		<!-- <form> -->
			<form action="{{route('serviceseason.update',$serviceseason->id)}}" method = "post"  enctype="multipart/form-data" >
				{{csrf_field()}}
                @method('PUT')
                <div class="card-body">
                    <label class="mt-3 mb-3"><b>Season Title</b></label>
                    <div class="form-group form-floating-label">
                        <input id="inputFloatingLabel"  name ="season_title" value ="{{$serviceseason->season_title}}" type="text" class="form-control input-border-bottom" placeholder ="Enter Your Title" required>
                    </div>
                    <label class="mt-3 mb-3"><b>Description</b></label>
                    <div class="form-group form-floating-label">
                        <textarea id="inputFloatingLabel"  name ="description" type="text" class="form-control input-border-bottom" placeholder ="Enter Your Description" required>{{$serviceseason->description}}</textarea>
                    </div>
                    <label class="mt-3 mb-3"><b>Service type </b></label>
                    <div class="form-group form-floating-label">
                        <select  class="form-control has-error" name="service_id" id="selectFloatingLabel2" required>
                            @foreach($service as $services)
                            <option  {{ $serviceseason->service_id === $services->id? 'selected' : ''}}  value="{{$services->id}}">{{$services->title}}</option>
                        @endforeach
                        </select>
                    </div>
                    <label class="mt-3 mb-3"><b> Status </b></label>
				    <div class="form-group form-floating-label">
                        <select  class="form-control has-error" name="status" id="selectFloatingLabel2" required>
                        <option value="">Select Status</option>
                        <option value="1" @if($serviceseason->status == 1) selected @endif>Active</option>
                        <option value="0" @if($serviceseason->status == 0) selected @endif>Deactive</option>
                        </select>
				    </div>

			    </div>
			<div class="card-action">
				<button class="btn btn-success">Submit</button>
				 <a href ="{{url('/serviceseason')}}" class="btn btn-danger">Cancel</a>
			</div>
		</form>
	</div>
</div>
@endsection
@section('scripts')
@endsection
