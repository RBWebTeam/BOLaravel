@extends('include.master')
@section('content')   

<div id="content" style="overflow:scroll; height: 5px;">
			 <div class="container-fluid white-bg">
			 <div class="col-md-12"><h3 class="mrg-btm">CRM FBA</h3></div>
			 <div class="col-md-12">
			 <div class="overflow-scroll">
			 <div class="table-responsive" >
       <!-- Modal -->
  <div class="modal fade" id="btnview" role="dialog">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">CRM Details</h4>
        </div>
        <div class="modal-body">
        <textarea type="text" rows="7" id="content class="form-control" ></textarea>
       </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>
</div>

	<table id="example" class="table table-bordered table-striped tbl" >
   <thead>
                  <tr>
                   <th>FBAID</th>
                   <th>Full Name</th>
                   <th>Mobile No</th>
                   <th>Email ID</th>
				           <th>City</th>
				           <th>Pincode</th>
                   <th>View</th>
                   <th>Status</th>
                  </tr>
                   </thead>
                   <tbody>
                   <tr>
            
       @foreach($crmlist as $val) 

       <td><?php echo $val->FBAID; ?></td> 
       <td><?php echo $val->FullName; ?></td>
       <td><?php echo $val->MobiNumb1; ?></td> 
       <td><?php echo $val->EmailID; ?></td>  
       <td><?php echo $val->City; ?></td> 
       <td><?php echo $val->PinCode; ?></td>
       <td>

   <button id="btnview" class="btn btn-default" data-toggle="modal" data-target="#btnview" onclick="crmdata()">View </button>
          </td>
      
       <td><a href="crmstatus/{{$val->FBAID}}" id="btnstatus" value="{{$val->FBAID}}" name="btnstatus" class="btn btn-default">Add Status</a><!-- </td> -->
      </td>
      </tr>
     </tr>

       @endforeach
      </tbody>
      </table>
			</div>
			</div>
			</div>
		  </div>
      </div>
@endsection



<script type="text/javascript"> function crmdata(myTitle, myBodyHtml) {

 $('#myModalTitle').html(myTitle);
   $('#myModalBody').html(myBodyHtml);

   $('#myModal').modal('show');
}
</script>






