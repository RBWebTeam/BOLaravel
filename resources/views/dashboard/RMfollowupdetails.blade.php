@extends('include.master')
@section('content')
<div class="container-fluid white-bg">
<div class="col-md-12"><h3 class="mrg-btm">RM Folloup Details</h3>
	<table class="datatable-responsive table table-striped table-bordered dt-responsive nowrap" data-sort-name="stargazers_count"
   data-sort-order="desc" id="example_1">
                          <thead>
					        <tr>                             
                             <th>FBA ID</th>
					         <th>Full Name</th>
                             <th>Created Date</th>
					         <th>Mobile No</th>
					         <th>Email ID</th>
					         <th>View History</th>
					         </tr>
                          </thead>
					      <tbody>
					      	@foreach($query as $val)
					       <tr>
					       	<td><a href="#" onclick="getfollowup(<?php echo $val->FBAID; ?>)" style="" data-toggle="modal" data-target='rmfolloup'><?php echo $val->FBAID; ?></a></td>
					       	<td><?php echo $val->FullName; ?></td>
					       	<td><?php echo $val->CreaOn; ?></td>
					       	<td><?php echo $val->MobiNumb1; ?></td>
					       	<td><?php echo $val->EmailID; ?></td>
					       	<td><a id="btnviewhistory" data-toggle="modal" data-target='.partnerInfo' class="btn btn-primary" onclick="viewhistory(<?php echo $val->FBAID; ?>)" type="button">View History</a></td>
					       </tr>
					       @endforeach
					      </tbody>
  </table>

</div>
</div>

<div class="rmfolloup modal fade" id="rmfolloup" role="dialog">   
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
        <h4 class="modal-title">RM Follow-Up</h4>
      </div>
       <div class="modal-body">
        <form name="rmfolloupdetails" id="rmfolloupdetails" action="Post">
         {{ csrf_field() }}
         <div class="form-group">
        <label class="control-label" for="message-text">Select Product:</label>
        <table id="" class="table table-responsive table-hover" cellspacing="0">
		   <tbody>
				<tr class="" align="center">
			     <th scope="col">
                    <input type="checkbox" class="chkproduct" id="chkproduct">
                  <span>Select All</span>
                 </th>
		        </tr>
		        @foreach($product as $val)
				<tr align="left">
					
					<td>
					   <input id="chkproductname" type="checkbox" name="txtproduct" class="chkproductname" value="{{$val->Product_Id}}"><span>{{$val->Product_Name}}</span>
					</td>
				</tr>
			 @endforeach
			 </tbody>
									 
	       </table>
           </div>
           <div class="form-group">
           	<label class="control-label" for="message-text">RM Status: </label>
           	<select class="form-control" name="txtrmstatus" id="txtrmstatus">
           	 <option selected="selected">-select-</option>
              @foreach($status as $val)
              <option value="{{$val->id}}">{{$val->status_name}}</option>
              @endforeach
            </select>
           </div>
           <div class="form-group">
           	<label class="control-label" for="message-text">RM Remark: </label>
           	<textarea class="form-control" id="txtrmremark" name="txtrmremark"></textarea>
           </div>
       
        <div class="modal-footer"> 
         <button class="btn btn-default" type="button" data-dismiss="modal">Close</button>
         <input type="hidden" id="fbaid" name="txtfbaid">
         <input type="hidden" name="txtproductid" id="txtproductid">
         <a id="btn_subbmit" class="btn btn-primary" type="button">Submit</a>
         
         </form>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- Partner Info Start -->
<div id="partnerInfo" class="modal fade partnerInfo" role="dialog">
  <div class="modal-dialog">
   <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">RM Follow-Up History</h4>
      </div>
      <div class="modal-body">
	  <div id="divpartnertable" class="table-responsive">
        <!-- <table class="table table-bordered table-striped">
		    <tr>
			 <td>Lead Id</td>
			 <td>Name</td>
			 <td>Mobile No</td>
			 <td>Email</td>
			 <td>City</td>
			 <td>Status</td>
			
			 </tr>
			 <tr>
			 <td></td>
			 <td>Pavamaana Softech</td>
			 <td>9845724268</td>
			 <td>bgykumar@gmail.com</td>
			 <td>Bangalore</td>
			 <td>Call Back</td>
			</tr>
		</table> -->
		</div>
      </div>
    </div>
  </div>
</div>
<!-- Partner Info End -->
@endsection

