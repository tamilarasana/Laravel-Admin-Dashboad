
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
				<a href="#">Location and Icon</a>
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
				<h4 class="card-title">location and Icon</h4>
					<a href="{{ route('iconlocation.create') }}" class="btn btn-primary btn-round ml-auto" >
					<i class="fa fa-plus"></i>
					Add Location & Icon
				</a>
			</div>
		</div>
		<div class="card-body">
			<div class="table-responsive">
				<table id="add-row" class="display table table-striped table-hover" >
				<thead>
					<tr>
                        <th>City</th>
						<th>Image</th>
						<th>Title</th>
                        <th>Phone Number</th>
                        <th>WhatsApp</th>
                        <th>Email</th>
                        <th>Address</th>
                        <th>FaceBook</th>
                        <th>Working Days</th>
                        <th>Working Hours</th>
						<th style="width: 10%">Action</th>
					</tr>
				</thead>
				<tbody>
                    @foreach ($iconlocation  as $loc )
                    <tr>
                        @if($loc->city == 1)
                        <td>Bangalore</td>
                        @else
                        <td>Hyderabad</td>
                        @endif
                    {{-- <td>{{$loc->category->title}}</td> --}}
                    <td><img src="{{ asset('storage/'.$loc->loc_image) }}" width="100" alt="" title="" /></td>
                    <td>{{$loc->title}}</td>
                    <td>{{$loc->phone_number}}</td>
                    <td>{{$loc->whatsapp}}</td>
                    <td>{{$loc->email}}</td>
                    <td>{{$loc->address}}</td>
                    <td>{{$loc->facebook_id}}</td>
                    <td>{{$loc->working_days}}</td>
                    <td>{{$loc->working_hours}}</td>
                    <td>
                        <div class="form-button-action">

                            <a href="{{route('iconlocation.edit', $loc->id)}}"  class="btn-sm btn-info"><i class="far fa-edit"  data-toggle="tooltip" data-original-title="Edit The Data"></i></a>&nbsp;
                        <form action="{{ route('iconlocation.destroy', $loc->id) }}" method="post"enctype="multipart/form-data" >
                                 @csrf
                             <input name="_method" type="hidden" value="DELETE">
                             <button class="btn btn-danger btn-sm delete-confirm" data-name="{{ $loc->name }}" type="submit" data-toggle="tooltip" data-original-title="Delete Task"><i class="fa fa-trash"></i></button>
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
