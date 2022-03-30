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
				<a href="{{route('models.index')}}">Car Model</a>
			</li>
			<li class="separator">
				<i class="flaticon-right-arrow"></i>
			</li>
		</ul>
	</div>
	<div class="card mb-4">
		<h6 class="card-header">Edit Model</h6>
		<!-- <form> -->

			<form action="{{ route('models.update', $model->id)}}" method = "post"  enctype="multipart/form-data" >
				{{csrf_field()}}
				@method('PUT')
			<div class="card-body">
                <label class="mt-3 mb-3"><b>Category type </b></label>
				<div class="form-group form-floating-label">
					<select  class="form-control has-error" name="category_id" id="selectFloatingLabel2" required>
                      @foreach($category as $cat)
                         <option  {{ $model->category_id === $cat->id? 'selected' : ''}}  value="{{$cat->id}}">{{$cat->title}}</option>
                      @endforeach
					</select>
				</div>
				<label class="mt-3 mb-3"><b>Title</b></label>
				<div class="form-group form-floating-label">
					<input id="inputFloatingLabel"  name ="title" value = "{{$model->title}}"type="text" class="form-control input-border-bottom" placeholder = "Car Title" required>
				</div>
                <label class="mt-3 mb-3"><b>Starting Price</b></label>
				<div class="form-group form-floating-label">
					<input id="inputFloatingLabel"  name ="starting_price" type="text"  value = "{{$model->starting_price}}" class="form-control input-border-bottom" placeholder ="Enter Your Starting Price" >
				</div>
				<label class="mt-3 mb-3"><b>Seo Title</b></label>
				<div class="form-group form-floating-label">
					<input id="inputFloatingLabel"  name ="seo_title" value = "{{$model->seo_title}}"type="text" class="form-control input-border-bottom" placeholder = "Seo Title" required>
				</div>
					<label class="mt-3 mb-3"><b>Seo Tag</b></label>
				<div class="form-group form-floating-label">
					<input id="inputFloatingLabel"  name ="seo_tag" value = "{{$model->seo_tag}}" type="text"  class="form-control input-border-bottom"  placeholder = "Car Title" required>
				</div>

                <label class="mt-3 mb-3"><b>Seo Description</b></label>
				<div class="form-group form-floating-label">
					<textarea id="inputFloatingLabel"  name ="seo_desc" type="text" class="form-control input-border-bottom" placeholder ="Enter Your Description" required>{{$model -> seo_desc}}</textarea>
				</div>

                <label class="mt-3 mb-3"><b>Position</b></label>
				<div class="form-group form-floating-label">
					<input id="inputFloatingLabel"  name ="position" type="text"  value = "{{$model->position}}"  class="form-control input-border-bottom" placeholder="Category Position" required>
					{{-- <label for="inputFloatingLabel" class="placeholder">Season Position</label> --}}
				</div>

                <label class="mt-3 mb-3"><b>Description</b></label>
				<div class="form-group form-floating-label">
					<textarea id="inputFloatingLabel"  name ="description" type="text" class="form-control input-border-bottom" placeholder ="Description" required>{{$model -> description}}</textarea>
				</div>
				<label class="mt-3 mb-3"><b>Banner type </b></label>
				<div class="form-group">
					<input type="file"  name="image">
				 <img src="{{ asset('storage/'.$model->image) }}" width="100" alt="" title="" />

				</div>

				<label class="mt-3 mb-3"><b>File </b></label>
				<div class="form-group">
					<input type="file"  name="file" id="file" class="@error('file') is-invalid @enderror" >
					 <iframe src="{{ asset($model->file) }}" frameborder="1"
                        allowfullscreen="true"  width="100" height="100"></iframe>
                        <label style="font-size: smaller;color: red;">Format: pdf, Max: 2MB</label>
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
@endsection
