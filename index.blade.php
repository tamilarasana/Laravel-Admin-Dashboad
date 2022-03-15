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
				<a href="{{ url('/banner') }}">
					<i class="flaticon-home"></i>
				</a>
			</li>
			<li class="separator">
				<i class="flaticon-right-arrow"></i>
			</li>
			<li class="nav-item">
				<a href="{{ url('/car') }}">Car</a>
			</li>
			<li class="separator">
				<i class="flaticon-right-arrow"></i>
			</li>
		</ul>
	</div>					
</div>
<div class="col-md-12">
	<div class="card">
		<div class="card-header">
			<div class="d-flex align-items-center">
				<h4 class="card-title">Banner</h4>
					<a href="{{ route('models.create') }}" class="btn btn-primary btn-round ml-auto" >
					<i class="fa fa-plus"></i>
					Add Banner
				</a>
			</div>
		</div>
		<div class="card-body">
			<div class="table-responsive">
				<table id="add-row" class="display table table-striped table-hover" >
				<thead>
					<tr>
						<th>Image</th>
						<th>Title</th>
						<th style="width: 10%">Action</th>
					</tr>
				</thead>
				<tbody>
					@foreach($model as $value)					
					<tr>
						<td><img src="{{ url($value->image) }}" width="100" alt="" title="" /></td>
					 	<td>{{ $value->title }}</td>
						<td>
							<div class="form-button-action">
								<a href="{{route('models.show',$value->id)}}"class="btn btn-link btn-primary btn-lg" data-toggle="tooltip" data-original-title="Edit The Data"><i class="fa fa-edit"></i></a>

								<!-- <button type="button" data-toggle="tooltip" title="" class="btn btn-link btn-primary btn-lg" data-original-title="Edit Task">
								<i class="fa fa-edit"></i>
								</button> -->
						
							<form action="{{ route('models.destroy', [$value->id]) }}" method="		post"enctype="multipart/form-data" >
									 @csrf
							     <input name="_method" type="hidden" value="DELETE">
 								 <button class="btn btn-danger btn-sm delete-confirm" data-name="{{ $value->name }}" data-toggle="tooltip" data-original-title="Edit The Data" type="submit">Delete</button>
							</form>
							</div>

						</td> 

					</tr>
					 @endforeach
				
				</tbody>
				</table>
			</div>
		</div>
	</div>
</div>

@endsection

@section('scripts')

@endsection