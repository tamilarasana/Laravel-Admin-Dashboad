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
			</div>
		</div>
		<div class="card-body">
			<div class="table-responsive">
				   @if($page_type == "add")
                    <form action="{{route('specification.store')}}" method="post" enctype="multipart/form-data">
                       @else
                    <form action="{{ url('specification-update/'.$varient_id) }}" method="post" enctype="multipart/form-data">
                    @endif
                    @csrf

				<table id="add-row" class="display table table-striped table-hover" >
				<thead>
					<tr>
						<th>Specification Name</th>
						<th>Update List</th>
					</tr>
				</thead>
                <div class="form-group">
                    <label for="">Varients</label>
                    <select  class="form-control" name="selected_id" id="selected"  required>
                        <option value="">Choose Our Varients</option>
                        @foreach($vari as $key => $varients)
                            <option value= "{{$varients->id}}"@if($varient_id == $varients->id) selected  @endif >{{$varients->var_title}}</option>
                            @endforeach
                    </select>
                </div>
				<tbody>
							@foreach($specification_fields as $key => $item)
                                <tr>
                                    <input type="hidden" name="spec[{{$key}}][varient_id]" value="{{$varient_id}}">
                                    <input type="hidden" name="spec[{{$key}}][specname_id]"value="{{ $item['specid']}}">
                                    <input type="hidden" name="spec[{{$key}}][specname]"value="{{$item['specname']}}">
                                    <input type="hidden" name="spec[{{$key}}][status]"  value="1">
                                    <td>{{$item['specname']}}</td>
                                <td>
                                @if(array_key_exists('value',$item))
                                <input type="hidden" id="spec_{{$key}}_updatespeval_id_speval_id" name="spec[{{$key}}][updatespeval_id][speval_id]" value="{{$item['speval_id']}}">
                                <input type="text"  id="spec_{{$key}}_updatespeval_id_value"  name="spec[{{$key}}][updatespeval_id][value]"   value="{{$item['value']}}" placeholder ="Enter your Value" class="form-control"></td>
                                @else
                                <input type="text"  id="spec_{{$key}}_value" name="spec[{{$key}}][value]"  id="emptyvalue" value="" placeholder ="Enter your Value" class="form-control"></td>
                                @endif

                                </td>
                                </tr>
                            @endforeach

 				</tbody>
				</table>
				<div class="modal-footer">
                                <a href ="{{route('varients.index')}}" class="btn btn-secondary">Close</a>
                                <button type="submit" class="btn btn-danger sm-3 ">Submit</button>
                           </div>
			</div>
		</div>
	</div>
</div>

@endsection

@section('scripts')
<script>
    $(document).ready(function(){
        $('#selected').change(function() {
            $.ajax({
                type:'GET',
                url:"{{ route('varient.getSpecificationDetails') }}",
                data:{'varient_id':$(this).val()},
                success:function(data){
                    $.each(data, function(index,value){
                         $('#spec_'+index+'_value').val(value.value);
                         $('#spec_'+index+'_updatespeval_id_value').val(value.value);
                         $('#spec_'+index+'_updatespeval_id_speval_id').val(value.speval_id);
                    });
                }
            });
        });
     });
</script>

@endsection
