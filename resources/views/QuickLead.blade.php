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
	        			@if ($val->Lead_Status =='')
	        			<td><a onclick="getleadid({{$val->Req_Id}},this)" type="button" class="" data-toggle="modal" data-target="#myModal">--</a></td>
	        			@else
	        			<td><a onclick="getleadid({{$val->Req_Id}},this)" type="button" class="" data-toggle="modal" data-target="#myModal">{{$val->Lead_Status}}</a></td>
	        			@endif
	        			<td>{{$val->Product_Name}}</td>
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
        	{{ csrf_field() }}
         <label class="control-label">Status:</label>
          <select name="ddlstatus" id="ddlstatus" class="form-control" style="width: 50%" required>
          	<option value="">--Select Status--</option>
          	@foreach($status as $val)          	
          	<option value="{{$val->Lead_Status_Id}}">{{$val->Lead_Status}}</option>
          	@endforeach
          </select>
          <label class="control-label">Remark:</label>   
          <textarea id="txtremark" name="txtremark" class="form-control" style="width: 80%"></textarea> 
          <input type="hidden" name="txtleadid" id="txtleadid">          
        </form>       
        
        </div>
        <div class="modal-footer">
       <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
       <button type="button" id="btnsave" class="btn btn-primary">Save</button>
        </div>
      </div>      
    </div>
  </div>
  <script type="text/javascript">
  function getleadid(leadid){  		
        $("#txtleadid").val(leadid);
  }  	
$("#btnsave").click(function(){ 
 if ($('#frmstatus').valid()){
   console.log($('#frmstatus').serialize());
   $.ajax({ 
   url: "{{URL::to('quick-lead')}}",
   method:"POST",
   data: $('#frmstatus').serialize(),  
   success: function(msg)  
   {
    location.reload();
    alert("Record has been saved successfully");
    $("#frmstatus").trigger('reset');
    $('#myModal').modal('hide');
  }
 }); 
 } 
 });
  </script>
@endsection