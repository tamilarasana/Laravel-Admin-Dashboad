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
				<a href="{{ url('/attacheseasonservice') }}">
					<i class="flaticon-home"></i>
				</a>
			</li>
			<li class="separator">
				<i class="flaticon-right-arrow"></i>
			</li>
			<li class="nav-item">
				<a href="#"> Season And Service</a>
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
				<h4 class="card-title"> Season And Service</h4>
					<a href="{{ route('serviceseason.create') }}" class="btn btn-primary btn-round ml-auto" >
					<i class="fa fa-plus"></i>
					Add Season
				</a>
			</div>
		</div>
		<div class="card-body">
			<div class="table-responsive">
				<table id="add-row" class="display table table-striped table-hover" >
				<thead>
                    <tr>
                        <th>Season</th>
                        <th>Descripation</th>
                        <th>Service</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($serviceseason as $data)
                    <tr>
                        <td>{{$data->season_title}}</td>
                        <td>{{$data->description}}</td>
                        <td>{{$data->service->title}}</td>
                        @if($data->status == 1)
                        <td>Active</td>
                        @else
                        <td>Deactive</td>
                        @endif
                        <td>
                            <div class="form-button-action">
                                <a href="{{route('serviceseason.edit', $data->id)}}"  class="btn-sm btn-info"><i class="far fa-edit"></i></a>&nbsp;
                            <form action="{{ route('serviceseason.destroy', [$data->id]) }}" method="post"enctype="multipart/form-data" >
                                 @csrf
                                <input name="_method" type="hidden" value="DELETE">
                                <button class="btn btn-danger btn-sm delete-confirm" data-name="{{ $data->name }}" type="submit"><i class="fa fa-trash"></i></button>
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
