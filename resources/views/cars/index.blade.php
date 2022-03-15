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
				<a href="#">Car</a>
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
				<h4 class="card-title">Car</h4>
					<a href="{{ route('car.create') }}" class="btn btn-primary btn-round ml-auto" >
					<i class="fa fa-plus"></i>
					Add New Car
				</a>
			</div>
		</div>
		<div class="card-body">
			<div class="table-responsive">
				<table id="add-row" class="display table table-striped table-hover" >
				<thead>
					<tr>
                        <th>Category</th>
						<th>Car Model</th>
                        <th>Varient</th>
						<th>Name</th>
                        <th>Transmission</th>
						<th>Body</th>
						{{-- <th>About Car</th> --}}
						<th>Price</th>
						<th>Route</th>
						<!-- <th>Description</th> -->
						<th>Color Name</th>
						<th>Images</th>
						<th style="width: 10%">Action</th>
					</tr>
				</thead>
					@foreach($cars as  $value)

					<tr>
                        <td>{{ $value->category->title }}</td>
						<td>{{ $value->carmodel->title }}</td>
                        <td>{{ $value->varient->var_title }}</td>
					 	<td>{{ $value->name }}</td>
                        <td>{{ $value->transmission }}</td>
					 	<td>{{ $value->body }}</td>
					 	{{-- <td>{{ $value->about_car }}</td> --}}
					 	<td>{{ $value->price }}</td>
					 	<td>{{ $value->route }}</td>
                         {{-- <td>{{Str::limit($value->description, 50, $end='.....')}}</td> --}}
					  	 {{-- <td>{{ $value->description }}</td> --}}
					 	<td>{{ $value->color_name }}</td>
				 		<td>
 					   @foreach ( $value->images as $image)
                            <img  src="{{ asset('storage/'.$image->images) }}" height="30" widht="30" alt="Image">
                            {{-- <img src="{{ asset('storage/'.$image->images) }}" width="50" /> --}}
                            @endforeach
				 		</td>
						<td>
							<div class="form-button-action">
								<a href="{{route('car.edit', $value->id)}}"  class="btn-sm btn-info"><i class="far fa-edit"  data-toggle="tooltip" data-original-title="Edit The Data"></i></a>&nbsp;
								<form action="{{ route('car.destroy', [$value->id]) }}" method="post"enctype="multipart/form-data" >
									 @csrf
									 @method('DELETE')
							     <input name="_method" type="hidden" value="DELETE">
 								 <button class="btn btn-danger btn-sm delete-confirm" data-name="{{ $value->name }}" data-toggle="tooltip" data-original-title="Delete The Data" type="submit"><i class="fa fa-trash"></i></button>
							</form>
							</div>
						</td>
					</tr>
					 @endforeach
				<tbody>

				</tbody>
				</table>
			</div>
		</div>
	</div>
</div>

@endsection

@section('scripts')

@endsection
