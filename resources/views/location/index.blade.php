
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
				<a href="{{ url('/location') }}">
					<i class="flaticon-home"></i>
				</a>
			</li>
			<li class="separator">
				<i class="flaticon-right-arrow"></i>
			</li>
			<li class="nav-item">
				<a href="#">Location</a>
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
				<h4 class="card-title">location </h4>
					<a href="{{ route('location.create') }}" class="btn btn-primary btn-round ml-auto" >
					<i class="fa fa-plus"></i>
					Add Location
				</a>
			</div>
		</div>
		<div class="card-body">
			<div class="table-responsive">
				<table id="add-row" class="display table table-striped table-hover" >
				<thead>
					<tr>
					    <th>City</th>
                        <th>Category</th>
                        <th>Location Name</th>
						<th>Phone</th>
						{{-- <th>Alternate Phone</th> --}}
                        {{-- <th>Pincode</th> --}}
                        <th>Type</th>
                        <th>Address</th>
                        <th>Email</th>
                        {{-- <th>Rating</th> --}}
                        <th>Map Link</th>
                        {{-- <th>Review From Link</th> --}}
                        {{-- <th>Latitude</th> --}}
                        {{-- <th>longtitude</th> --}}
                        <th>Open Time</th>
                        <th>Close Time</th>
						<th style="width: 10%">Action</th>
					</tr>
				</thead>
                <tbody>
                    @foreach ($location as $value )
                    <tr>
                    @if($value->city == "bangalore")
                        <td>Bangalore</td>
                        @else
                        <td>Hyderabad</td>
                     @endif
                    <td>{{$value->category->title}}</td>
                    <td>{{Str::limit($value->location_name , 10, $end='.....')}}</td>
                    <td>{{$value->phone}}</td>
                    {{-- <td>{{$value->alternate_phone}}</td> --}}
                    {{-- <td>{{$value->pincode}}</td> --}}
                    <td>{{$value->type}}</td>
                    <td>{{Str::limit($value->address , 10, $end='.....')}}</td>
                    <td>{{$value->email}}</td>
                    {{-- <td>{{$value->rating}}</td> --}}
                    <td>{{Str::limit($value->map_link , 10, $end='.....')}}</td>
                    {{-- <td>{{$value->review_form_link}}</td> --}}
                    {{-- <td>{{$value->latitude}}</td> --}}
                    {{-- <td>{{$value->longtitude}}</td>     --}}
                    <td>{{$value->open_time}}</td>
                    <td>{{$value->close_time}}</td>
                    <td>
                        <div class="form-button-action">
                            <a href="{{route('location.edit',$value->id)}}"class="btn-sm btn-info" data-original-title="Edit Task" data-toggle="tooltip" ><i class="far fa-edit"></i></a>&nbsp;
                            <form action="{{ route('location.destroy', [$value->id]) }}" method="post"enctype="multipart/form-data" >
                                    @csrf
                                <input name="_method" type="hidden" value="DELETE">
                                <button class="btn btn-danger btn-sm delete-confirm" data-name="{{ $value->name }}" type="submit" data-toggle="tooltip" data-original-title="Delete Task"   ><i class="fa fa-trash"></i></button>
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
