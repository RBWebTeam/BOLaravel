 @extends('include.master')
    @section('content')

@if(Session::has('message'))
<p class="alert alert-info">{{ Session::get('message') }}</p>
@endif

<div id="content" style="overflow:scroll;">
			 <div class="container-fluid white-bg">
			 <div class="col-md-12"><h3 class="mrg-btm">Assign RM to FBA</h3></div>
			 <div class="col-md-12">
			 <form id="assignrm" name="assignrm" method="post">
			{{ csrf_field() }}
  				<div class="col-md-6 col-xs-12">			  	
				<div class="form-group">
				 State:<select id="txtmapstate" name="txtmapstate" class="selectpicker select-opt form-control">
					<option selected="selected" value="0">Select State</option>
					@foreach($state as $val)
			     <option value="{{$val->state_id}}">{{$val->state_name}}</option>
		          @endforeach
		         </select>
				</div>
				</div>

				<div class="col-md-6 col-xs-12">			  	
				<div class="form-group">
				 City:<select id="txtmapcity" name="txtmapcity" class="selectpicker select-opt form-control" onchange="getfbaassignlist(this)">
					<option selected="selected" value="0">Select City</option>
		         </select>
				</div>
				</div>

				<!-- <div class="col-md-2 col-xs-12">			  	
				<div class="form-group">
				 Pincode:
				 <input id="txtpincode" name="txtpincode" type="pincode" class="form-control" placeholder="Pincode">
				</div>
				</div>

				<div class="col-md-2 col-xs-12">			  	
				<div class="form-group">
					<br/>
				 <input id="txtshowfba" name="txtshowfba" type="button" class="btn btn-primary" value="Show" onclick="showfbaassignlist()">
				</div>
				</div>
 -->

				<div class="col-md-6 col-xs-12">			  	
				<div class="form-group">
				FBA List:
				 <select id="ddlfba" name="ddlfba[]" class="selectpicker select-opt form-control" multiple>				

		         </select>
				</div>
				</div>

				<div class="col-md-6 col-xs-12">			  	
				<div class="form-group">
				 RM:<select id="ddlrmlist" name="ddlrmlist" class="selectpicker select-opt form-control">
					<option selected="selected" value="0">Select RM</option>
					@foreach($rmlist as $val)
			     <option value="{{$val->id}}">{{$val->name}}</option>
		          @endforeach
		         </select>
				</div>
				</div>

				<div class="col-md-6 col-xs-12">			  	
				<div class="form-group">
				<input id="txtsubmitfba" name="txtsubmitfba" type="button" class="btn btn-primary" value="Submit" onclick="fbarmassignlist()">
				</div>
				</div>




			 </form>
			</div>
</div>
</div>


@endsection