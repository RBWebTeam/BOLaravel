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

  				<div class="col-md-4 col-xs-12">			  	
				<div class="form-group">
				 State:<select id="ddlstate" name="ddlstate" class="selectpicker select-opt form-control">

		         </select>
				</div>
				</div>

				<div class="col-md-4 col-xs-12">			  	
				<div class="form-group">
				 City:<select id="ddlstate" name="ddlstate" class="selectpicker select-opt form-control">

		         </select>
				</div>
				</div>

			 </form>
			</div>
</div>
</div>





@endsection