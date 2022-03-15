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
				<a href="#">Specification</a>
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
				<h4 class="card-title">Specification</h4>
					<a href="{{ route('specname.create') }}" class="btn btn-primary btn-round ml-auto" >
					<i class="fa fa-plus"></i>
					Add Specification
				</a>
			</div>
		</div>
		<div class="card-body">
			<div class="table-responsive">
				<table id="add-row" class="display table table-striped table-hover" >
				<thead>
					<tr>
						<th>Specification Name</th>
						<th>Status</th>
						<th style="width: 10%">Action</th>
					</tr>
				</thead>
				<tbody>
					@foreach($specnames as $specname)
					<tr>
						<td>{{$specname->specname}}</td>
							 @if($specname->status == 1)
                                      <td>Active</td>
                                    @else
                                      <td>Deactive</td>
                                    @endif
						<td>
							<div class="form-button-action">
								<a href="{{route('specname.edit', $specname->id)}}"  class="btn-sm btn-info"><i class="far fa-edit"  data-toggle="tooltip" data-original-title="Edit The Data"></i></a>&nbsp;
							<form action="{{ route('specname.destroy', [$specname->id]) }}" method="post"enctype="multipart/form-data" >
									 @csrf
							     <input name="_method" type="hidden" value="DELETE">
 								<button class="btn btn-danger btn-sm delete-confirm" data-name="{{ $specname->name }}" type="submit">Delete</button>
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
