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
				<a href="#">Car</a>
			</li>
			<li class="separator">
				<i class="flaticon-right-arrow"></i>
			</li>
		</ul>
	</div>
	<div class="card mb-4">
		<h6 class="card-header">Create New Car</h6>
		<!-- <form> -->
			<form action="{{route('car.store')}}" method = "post"  id="myform" enctype="multipart/form-data" >
				{{csrf_field()}}
			<div class="card-body">
                <label class="mt-3 mb-3"><b>Category </b></label>
				<div class="form-group form-floating-label">
					<select  class="form-control has-error productcategory" name="category_id" id="category_id"required>
						  <option value="">Choose Our Category</option>
		                    @foreach($category as $key => $data)
		                        <option value="{{$data->id}}">{{$data->title}}</option>
		                    @endforeach
					</select>
				</div>
				<label class="mt-3 mb-3"><b>Model type </b></label>
				<div class="form-group form-floating-label">
					<select  class="form-control has-error productmodel " name="car_model_id" id="model_id" required >
						  <option value="" >Choose Our Model</option>
					</select>
                    @error('car_model_id')
                         <div class="text-danger">
                            {{ $message }}
                        </div>
                    @enderror
				</div>
                <label class="mt-3 mb-3"><b>Varient type </b></label>
				<div class="form-group form-floating-label">
					<select  class="form-control has-error " name="varient_id" id="varient_id" required >
						  <option value="0" disabled="true" selected="true">Choose Our Varient</option>
					</select>
                    @error('varient_id')
                        <div class="text-danger">
                        {{ $message }}
                    </div>
                    @enderror
				</div>
				<label class="mt-3 mb-3"><b>Name</b></label>
				<div class="form-group form-floating-label">
					<input id="inputFloatingLabel"  name ="name" type="text" class="form-control input-border-bottom" placeholder ="Enter Your Title" >
				</div>
                <label class="mt-3 mb-3"><b>Transmission</b></label>
				<div class="form-group form-floating-label">
					<input id="inputFloatingLabel"  name ="transmission" type="text" class="form-control input-border-bottom" placeholder ="Enter Your Transmission" >
				</div>
                <label class="mt-3 mb-3"><b>Body</b></label>
				<div class="form-group form-floating-label">
					<input id="inputFloatingLabel"  name ="body" type="text" class="form-control input-border-bottom" placeholder ="Enter Your Body" >
				</div>
				<label class="mt-3 mb-3"><b>About Car</b></label>
				<div class="form-group form-floating-label">
					<input id="inputFloatingLabel"  name ="about_car" type="text" class="form-control input-border-bottom" placeholder = "About Car" >
				</div>

				<label class="mt-3 mb-3"><b>Price</b></label>
				<div class="form-group form-floating-label">
					<input id="inputFloatingLabel"  name ="price" type="text" class="form-control input-border-bottom" placeholder ="Enter Your Price" >
				</div>

				<label class="mt-3 mb-3"><b>Route</b></label>
				<div class="form-group form-floating-label">
					<input id="inputFloatingLabel"  name ="route" type="text" class="form-control input-border-bottom" placeholder ="Enter Your Route" >
				</div>

				<label class="mt-3 mb-3"><b>Description</b></label>
				<div class="form-group form-floating-label">
					<textarea id="inputFloatingLabel"  name ="description" type="text" class="form-control input-border-bottom" placeholder ="Enter Your Description" ></textarea>
				</div>

				<label class="mt-3 mb-3"><b>Color Name 1</b></label>
				<div class="form-group form-floating-label">
					<input id="inputFloatingLabel"  name ="color_name" type="text" class="form-control input-border-bottom" placeholder ="Enter Your Color Name One" >
				</div>

                <label class="mt-3 mb-3"><b>Color Name 2</b></label>
				<div class="form-group form-floating-label">
					<input id="inputFloatingLabel"  name ="color_name2" type="text" class="form-control input-border-bottom" placeholder ="Enter Your Color Name Two" >
				</div>

                <label class="mt-3 mb-3"><b>Color Code 1</b></label>
				<div class="form-group form-floating-label">
					<input id="inputFloatingLabel"  name ="colour_code" type="text" class="form-control input-border-bottom" placeholder ="Enter Your Color Code One" >
				</div>

                <label class="mt-3 mb-3"><b>Color Code 2</b></label>
				<div class="form-group form-floating-label">
					<input id="inputFloatingLabel"  name ="colour_code2" type="text" class="form-control input-border-bottom" placeholder ="Enter Your Color Code Two" >
				</div>

				<label class="mt-3 mb-3"><b>Images</b></label>
				<div class="form-group">
					<input type="file"  name="images[]"  multiple="multiple" >
				</div>


                    <table class="table  table-condensed"  id="user_table">
                        <thead >
                            <tr>
                            </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
                </table>
                <br>
                <center>
                 <td><button type="button" name="add" id="add" class="btn-sm btn-success">Add</button>
                  </td>
                </center>
            </div>
                <div class="card-action">
                    <button class="btn btn-success">Submit</button>
                    <a href ="{{route('car.index')}}" class="btn btn-danger">Cancel</a>
                </div>
		</form>
	</div>
</div>
@endsection
@section('scripts')
<script>
    $(document).ready(function(){
        $(document).on('change','.productcategory', function(){
            var cat_id = $(this).val();
            if (cat_id) {
                $.ajax({
                    type:'get',
                    url:'{!!URL::to('findcategory')!!}',
                    data:{'id':cat_id},
                    success:function(data){
                        if(data){
                            $("#model_id").empty();
                            $("#model_id").append('<option value=" " >--Select State--</option>');
                            for(var i=0;i<data.length;i++){
                                $("#model_id").append('<option value="'+data[i].id+'">' +data[i].title+'</option>');
                            }
                        }else{
                            $("#model_id").empty();
                        }
                    },
                    error:function(){
                        console.log('error');
                    }
                });
                } else {

                    $("#model_id").empty();
                    $("#varient_id").empty();
                }
        });

        $(document).on('change','.productmodel', function(){
            var model_id = $(this).val();
            if (model_id) {
                $.ajax({
                    type:'get',
                    url:'{!!URL::to('findmodel')!!}',
                    data:{
                        'id':model_id
                        },
                    success:function(data){
                        if (data) {
                            $("#varient_id").empty();
                            $("#varient_id").append('<option value=" " >--Select Varient--</option>');
                                for(var i=0;i<data.length;i++){
                                    $("#varient_id").append('<option value="'+data[i].id+'">' +data[i].var_title+'</option>');
                                }
                        }else{
                            alert("d");
                            $("#varient_id").empty();
                        }
                    },
                    error:function(){
                        console.log('error');
                    }
                });
            } else {
                $("#varient_id").empty();
            }
        });
    });

</script>

<script>
    $(document).ready(function(){
            var count = 1;
            dynamic_field(count);
        function dynamic_field(number)
            {
                html = '<tr>';
                html += '<td> <label class="mt-3 mb-3"><b>Interior Images</b></label><div class="form-group"><input type="file" id = "+number+" name="data['+number+'][interior_images]" required /></div></td>';
                html += '<td> <label class="mt-3 mb-3"><b>Tittle</b></label><div class="form-group form-floating-label"> <input type="text" name="data['+number+'][title]"  class="form-control input-border-bottom" placeholder="Title" required /></div></td>';
                html += '<td><label class="mt-3 mb-3"><b>Description</b></label><div class="form-group form-floating-label"><input type="text" name="data['+number+'][int_description]" class="form-control input-border-bottom" placeholder="Descripation"required"/></div></td>';
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


     $(document).on('click', '#add', function(){
        count++;
        dynamic_field(count);
     });

     $(document).on('click', '.remove', function(){
        count--;
        $(this).closest("tr").remove();
     });

    });
    </script>


@endsection
