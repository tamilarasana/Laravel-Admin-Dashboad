
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
				<a href="{{ url('/Monsoon') }}">
					<i class="flaticon-home"></i>
				</a>
			</li>
			<li class="separator">
				<i class="flaticon-right-arrow"></i>
			</li>
			<li class="nav-item">
				<a href="#">Monsoon</a>
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
			{{-- <div class="d-flex align-items-center">
				<h4 class="card-title">Monsoon</h4>
					<a href="{{ route('monsoon.create') }}" class="btn btn-primary btn-round ml-auto" >
					<i class="fa fa-plus"></i>
					Add FAQ
				</a>
			</div> --}}
            <div class="card-header"> Enquiry List
                <a href="#" data-toggle="modal" id ="dateshow"  data-target="#mmodalDate"class="btn-sm btn-success float-right">Export to Excel/CSV</a>
                {{-- <a href="#" data-toggle="modal" data-target="#modal-delete-confirmation"class="btn-sm btn-success float-right">Export to Excel/CSV</a> --}}
            </div>
		</div>
		<div class="card-body">
			<div class="table-responsive">
				<table id="add-row" class="display table table-striped table-hover" >
				<thead>
					<tr>
						<th>Name</th>
                        <th>Phone Number</th>
                        <th>Email</th>
                        <th>Location</th>
                        <th>Vehicle/Service</th>
                        <th>Purpose</th>
                        <th>Create Time</th>
					</tr>
				</thead>
                <tbody>
                 @foreach ($enquirys as $enquiry )
                 <tr>
                     <td>{{$enquiry->name}}</td>
                     <td>{{$enquiry->phone}}</td>
                     <td>{{$enquiry->email}}</td>
                     <td>{{$enquiry->location}}</td>
                     <td>{{$enquiry->vechile}}</td>
                     <td>{{$enquiry->purpose}}</td>
                     <td>{{$enquiry->created_at}}</td>
                 </tr>
                 @endforeach
                </tbody>
				</table>
                {{-- {{ $enquiry->links() }} --}}
            </div>
		</div>
	</div>
</div>
{{-- Date Model --}}
<div class="modal fade" id="modalDate" tabindex="-1" role="dialog" aria-labelledby="exampleModalLable" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Select Your Data?</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form  action ="{{route('export')}}" method="get" class="pull-left" >
            <div class="modal-body">
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <label>From</label>
                    <input type="date" class="form-control input-sm" id="form" name="from" required/>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <label>To</label>
                    <input type="date" class="form-control input-sm" id="to" name="to" required/>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                <button type="submit" id ="excel_download_id" class="btn btn-danger ml-2"><i class="fa fa-download"></i>Download</button>
            </div>
        </form>

        </div>
    </div>
</div>


@endsection

@section('scripts')
<script>
    $(document).ready( function () {
        $("#dateshow").click(function(){
          $("#modalDate").modal('show');
    });

    $("#excel_download_id").click(function(){
          $("#modalDate").modal('hide');
    });
    } );
    </script>

@endsection
