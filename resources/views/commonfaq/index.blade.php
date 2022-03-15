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
				<a href="{{ url('/commonfaq') }}">
					<i class="flaticon-home"></i>
				</a>
			</li>
			<li class="separator">
				<i class="flaticon-right-arrow"></i>
			</li>
			<li class="nav-item">
				<a href="#">CommonFAQ</a>
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
				<h4 class="card-title">CommonFAQ</h4>
					<a href="{{ route('commonfaq.create') }}" class="btn btn-primary btn-round ml-auto" >
					<i class="fa fa-plus"></i>
					Add FAQ
				</a>
			</div>
		</div>
		<div class="card-body">
			<div class="table-responsive">
				<table id="add-row" class="display table table-striped table-hover" >
				<thead>
					<tr>
						<th>Title</th>
                        <th>Description</th>
						<th style="width: 10%">Action</th>
					</tr>
				</thead>
				<tbody>
					@foreach($commonfaq as $value)
					<tr>
					 	{{-- <td>{{ $value->title }}</td> --}}
                         <td>{{Str::limit($value->title , 15, $end='.....')}}</td>
                         <td>{{Str::limit($value->description , 25, $end='.....')}}</td>
                         {{-- <td>{{ $value->description }}</td> --}}
						<td>
							<div class="form-button-action">
                                <a href="{{route('commonfaq.edit', $value->id)}}"  class="btn-sm btn-info"><i class="far fa-edit"></i></a>&nbsp;
								{{-- <a href="{{route('service.edit', $value->id)}}"class="btn btn-link btn-primary btn-lg" data-toggle="tooltip" data-original-title="Edit The Data"><i class="fa fa-edit"></i></a> --}}
							<form action="{{ route('commonfaq.destroy', [$value->id]) }}" method="post"enctype="multipart/form-data" >
									 @csrf
							     <input name="_method" type="hidden" value="DELETE">
 								<button class="btn btn-danger btn-sm delete-confirm" data-name="{{ $value->name }}" type="submit"><i class="fa fa-trash"></i></button>
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
