	@extends('include.master')
    @section('content')

 <!-- Body Content Start -->
           
			 <div class="container-fluid white-bg">
			
			 
			 <!-- Filter End -->
			 <div class="col-md-12">
			 <div class="panel panel-primary">
			 <div class="panel-heading">
						<h3 class="panel-title">FSM Details</h3>
						<div class="pull-right">
							<span class="clickable filter" data-toggle="tooltip" data-container="body"><a href="Fsm-Register">
							<span class="glyphicon glyphicon-plus mrg-tp-forteen"></span></a></span>
						</div>
					</div>
					
					<div class="panel-body filter-bdy" style="display:none">
						<input type="text" class="form-control" id="dev-table-filter" data-action="filter" data-filters="#dev-table" placeholder="Search..." />
					</div>
			 </div>
			 </div>
			 <!-- Filter End -->
			 
			 <div class="col-md-12">
			 <div class="overflow-scroll">
			 <div class="table-responsive">
			<table class="datatable-responsive table table-striped table-bordered dt-responsive nowrap" id="example">
                 <thead>
                  <tr>
                   <th>Full Name</th>
                   <th>Date of Birth</th>
                   <th>Email ID</th>
                   <th>Password</th>
				           <th>Mobile No.</th>
				           <th>PAN Card</th>
                   <th>Leads</th>
                   <th>Registered Leads</th>
                   <th>Aadhar No.</th>
				           <th>Pin Code</th>
                   <th>City</th>
                   <th>State</th>
                   </tr>
                   </thead>
                
                <tbody>
                @foreach($query as $val)
                <tr>
                  <td><a href="Fsm-Register?smid=<?php echo $val->SMID;?>"><?php echo $val->Name; ?></a></td>
                  <td><?php echo $val->DOB; ?></td>
                  <td><?php echo $val->Email; ?></td>
                  <td><a href="" class="popover-Password" data-toggle="popover" title="Show Password" data-content="<?php echo $val->Password; ?>">*****</a></td>
				  <td><?php echo $val->MobileNo; ?></td>
				  <td><?php echo $val->PancardNo; ?></td>
                  <td><?php echo $val->AllLeads; ?></td>
                  <td>
                  	<?php if($val->RegisteredLeads > 0){?>
						<a href="#" data-toggle="modal" data-target="#myModal" onclick="getfsmfbalist(<?php echo $val->SMID; ?>)" ><?php echo $val->RegisteredLeads; ?></a>
						<?php } else { echo 0;}?>

                  </td>
                  <td><?php echo $val->AdharNo; ?></td>
                  <td><?php echo $val->Pincode; ?></td>
                  <td><?php echo $val->City; ?></td>
                  <td><?php echo $val->State; ?></td>
				  </tr>
				@endforeach
                </tbody>
		       
            </table>

            <form name="fsmremark" id="fsmremark">
            	<input type="hidden" id="fsmid" name="fsmid">
            </form>
			</div>
			</div>
			</div>
			</div>

<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">FBA List</h4>
      </div>
      <div class="modal-body">
        <div id="popupfbalist">
 
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>
		
			@endsection