@extends('include.master')
@section('content')
<div class="container-fluid white-bg">
<div class="col-md-12"><h3 class="mrg-btm">Quick Lead Management</h3></div>
   <div class="col-md-12">
      <div class="overflow-scroll">
         <div class="table-responsive" >
	        <table class="datatable-responsive table table-striped table-bordered dt-responsive nowrap" id="example">
	        	<thead>
	        		<tr>
	        			<th>Lead ID</th>
	        			<th>Name</th>
	        			<th>Email ID</th>
	        			<th>Mobile NO</th>
	        			<th>Status</th>
	        			<th>Product</th>
	        			<th>Monthly Income</th>
	        			<th>Loan Ammount</th>
	        		</tr>
	        	</thead>
	        	<tbody>
	        		@foreach($query as $val)
	        		<tr>
	        			<td>{{$val->Req_Id}}</td>
	        			<td>{{$val->Name}}</td>
	        			<td>{{$val->Email}}</td>
	        			<td>{{$val->Mobile}}</td>
	        			@if ($val->Status =='')
	        			<td><a type="button" class="" data-toggle="modal" data-target="#myModal">Status</a></td>
	        			@else
	        			<td><a type="button" class="" data-toggle="modal" data-target="#myModal">{{$val->Status}}</a></td>
	        			@endif
	        			<td>{{$val->Product_Id}}</td>
	        			<td>{{$val->monthly_Income}}</td>
	        			<td>{{$val->Loan_Id}}</td>	        			
	        		</tr>
	        		@endforeach
	        	</tbody>
            </table>
        </div>
     </div>
   </div>
</div>

<!-- for lead status Modal -->
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Update Status</h4>
        </div>
        <div class="modal-body form-Group">
        <form id="frmstatus" method="post">
         <label class="control-label">Status:</label>
          <select id="ddlstatus" class="form-control">
          	<option value="">--Select Status--</option>
          	<option></option>
          </select>
          <label class="control-label">Remark:</label>   
          <textarea id="txtremark" name="txtremark" class="form-control"></textarea>  
        </form>       
        
        </div>
        <div class="modal-footer">
       <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
       <button type="button" class="btn btn-primary" data-dismiss="modal">Save</button>
        </div>
      </div>      
    </div>
  </div>

@endsection