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
				<a href="#">Service</a>
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
				<h4 class="card-title">Sevices Type</h4>
					<a href="{{ route('servicetype.create') }}" class="btn btn-primary btn-round ml-auto" >
					<i class="fa fa-plus"></i>
					Add Service
				</a>
			</div>
		</div>
		<div class="card-body">
			<div class="table-responsive">
				<table id="add-row" class="display table table-striped table-hover" >
				<thead>
					<tr>
						<th>Service</th>
						<th>Title</th>
                        <th>Warranty</th>
						<th>Service period</th>
                        <th>Duration</th>
						<th>Image</th>
						<th style="width: 10%">Action</th>
					</tr>
				</thead>
				<tbody>
					@foreach($serviceType as $value)
					<tr>
						<td>{{ $value->service->title}}</td>
					 	<td>{{ $value->title }}</td>
                        <td>{{ $value->warranty }}</td>
					 	<td>{{ $value->service_period }}</td>
                        <td>{{ $value->duration }}</td>
						<td>
							@if($value->image)
							<img src="{{ asset('storage/'.$value->image) }}" width="100" alt="" title="" />
							@else
								No Image
							@endif
						</td>
						<td>
							<div class="form-button-action">
                                <a href="{{url('/servicelist-get/'. $value->id)}}" class="btn-sm btn-secondary" ><i class="fas fa-plus-circle"></i></a>&nbsp;
								<a href="{{route('servicetype.edit', $value->id)}}"  class="btn-sm btn-info"><i class="far fa-edit"></i></a>&nbsp;
								<form action="{{ route('servicetype.destroy', [$value->id]) }}" method="post"enctype="multipart/form-data" >
									 @csrf
									 @method('DELETE')
							     <input name="_method" type="hidden" value="DELETE">
 								 <button class="btn btn-danger btn-sm delete-confirm" data-name="{{ $value->name }}" data-toggle="tooltip" data-original-title="Edit The Data" type="submit"><i class="fa fa-trash"></i></button>
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
