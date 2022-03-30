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
   <div class="table-responsive">
    <form method="post"  id="dynamic_form">
        <span id="result"></span>
        <table class="table  table-condensed"  id="user_table">
          <thead >
              <tr>
                <th style="font-size: 15px; text-align: center;">Service Name</th>
              </tr>
            </thead>
            <tbody>
            </tbody>
        </table>
        <br>
        <center>
         <td><button type="button" name="add" id="add" class="btn-sm btn-success">Add</button>
            @csrf
            <input type="submit" name="save"  id="save" class="btn-sm btn-primary" value="Save" />
            <a href ="{{ route("servicetype.index") }}" class="btn-sm btn-danger float-end">Back</a>
          </td>
        </center>

      </form>
   </div>
  </div>
</div>
  @section('scripts')
  <input type="hidden" id="service_data" name="basket_data" value="{{ json_encode($service) }}">
<input type="hidden" id="service_id" value="{{ $service_id }}">

  @endsection


<script>
$(document).ready(function(){
    var verify_data =  JSON.parse($("#service_data").val());
        if(verify_data == ''){
            var count = 1;
            dynamic_field(count);
        } else {
            var count = verify_data.length;
            console.log(verify_data);
            $.each(verify_data,function(key, value){
                updatedynamic_field(key+1,value);
            });

        }


 function dynamic_field(number)
 {
  html = '<tr>';
    html+='<input type="hidden" name="data['+number+'][service_id]" value="'+<?php echo $service_id ?>+'">';
                html += '<td><input type="text" name="data['+number+'][service]" class="form-control "   placeholder="Service Name"required title="please enter value"/></td>';
        if(number > 1)
        {
            html += '<td><button type="button" name="remove" id="" class="btn btn-danger remove">Remove</button></td></tr>';
            $('tbody').append(html);
        }
        else
        {
            html += '<td></td></tr>';
            $('tbody').html(html);
        }
 }

        function updatedynamic_field(number, data = '')
        {
            // calTotalAndQuantity(data)
            html = '<tr>';
                html+='<input type="hidden" id="dataid" name="id" value="'+data.id+'">';
                html+='<input type="hidden" name="data['+number+'][service_id]" value="'+<?php echo $service_id ?>+'">';
                html += '<td><input type="text" name="data['+number+'][service]" class="form-control " value = " '+data.service+'"  placeholder="Token Id"required title="please enter value"/></td>';
                html += '<td><button type="button" id="" class="btn-sm btn-danger edit_delete_data" data-id="'+data.id+'" ><i class="fa fa-trash"></i></button></td>';

            if(number > 1)
            {
                 html += '<td></td></tr>';
                $('tbody').append(html);
            }
            else
            {
                html += '<td></td></tr>';
                $('tbody').html(html);
            }
        }

 $(document).on('click', '#add', function(){
  count++;
  dynamic_field(count);
 });

 $(document).on('click', '.remove', function(){
  count--;
  $(this).closest("tr").remove();
 });

                $('#dynamic_form').on('submit', function(event){
                    event.preventDefault();
                    var id=$("#service_id").val();
                    console.log(id);
                    $.ajax({
                        url:'{{ route("servicelist.store") }}',
                        method:'post',
                        data:$(this).serialize()+'&id='+id,
                        dataType:'json',
                        beforeSend:function(){
                            $('#save').attr('disabled','disabled');
                        },
                        success:function(data)
                        {
                            if(data.error)
                            {
                                var error_html = '';
                                for(var count = 0; count < data.error.length; count++)
                                {
                                    error_html += '<p>'+data.error[count]+'</p>';
                                }
                                $('#result').html('<div class="alert alert-danger">'+error_html+'</div>');
                            }
                            else
                            {
                                dynamic_field(1);
                                window.location.href = '{{ route("servicetype.index") }}';
                                $('#result').html('<div class="alert alert-success">'+data.success+'</div>');
                            }
                            $('#save').attr('disabled', false);
                        }
                    })
            });

            $("body").on("click",'.edit_delete_data',function(){
                    var id = $(this).attr("data-id");
                    console.log(id);
                    let url = '{{route('servicelist.delete')}}'
                    console.log(url);
                 if(confirm("Are You sure want to delete !")){
                    $.ajax({
                           url: url + '/' + id,
                           type: 'DELETE',
                            dataType: "JSON",
                            data:{
                                "id":id,
                                "_token": "{{ csrf_token() }}"},

                            success: function (data)
                            {
                                location.reload();
                                $('#result').html('<div class="alert alert-success">'+data.success+'</div>');

                            }
                    });
                }

            });

});
</script>
@endsection

