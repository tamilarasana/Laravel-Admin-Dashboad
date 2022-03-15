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
				<a href="#">Enquiry Banner Image</a>
			</li>
			<li class="separator">
				<i class="flaticon-right-arrow"></i>
			</li>
			<!-- <li class="nav-item">
				<a href="#">Basic Form</a>
			</li> -->
		</ul>
	</div>
</div>
<div class="col-md-12">
	<div class="card">
		<div class="card-header">
			<div class="d-flex align-items-center">
				<h4 class="card-title">Enquiry Banner Image</h4>
					<a href="{{ route('enquirybannerimg.create') }}" class="btn btn-primary btn-round ml-auto" >
					<i class="fa fa-plus"></i>
					Add Image
				</a>
			</div>
		</div>
		<div class="card-body">
			<div class="table-responsive">
				<table id="add-row" class="display table table-striped table-hover" >
				<thead>
					<tr>
						<th>Enquiry Banner Image</th>

						<th style="width: 10%">Action</th>
					</tr>
				</thead>
				<tbody>
					@foreach($enquirybanner as $value)
					<tr>
						<td>
							<img src="{{ asset('storage/'.$value->banner_img) }}" width="100" alt="" title="" />
						</td>
					 	<td>
							<div class="form-button-action">
								<a href="{{route('enquirybannerimg.edit', $value->id)}}"  class="btn-sm btn-info"><i class="far fa-edit"  data-toggle="tooltip" data-original-title="Edit The Data"></i></a>&nbsp;
							<form action="{{ route('enquirybannerimg.destroy', $value->id) }}" method="post"enctype="multipart/form-data" >
									 @csrf
							     <input name="_method" type="hidden" value="DELETE">
 								<button class="btn btn-danger btn-sm delete-confirm" data-name="{{ $value->name }}" type="submit" data-toggle="tooltip" data-original-title="Delete Task"><i class="fa fa-trash"></i></button>
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
