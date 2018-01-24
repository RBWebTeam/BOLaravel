	@extends('include.master')
    @section('content')

 <!-- Body Content Start -->
            <div id="content" style="overflow:scroll;">
			 <div class="container-fluid white-bg">
			 <div class="col-md-12"><h3 class="mrg-btm">FSM Details</h3></div>
			 
			 <!-- Filter End -->
			 <!-- <div class="col-md-12">
			 <div class="panel panel-primary">
			 <div class="panel-heading">
						<h3 class="panel-title">Filter</h3>
						<div class="pull-right">
							<span class="clickable filter" data-toggle="tooltip" data-container="body">
							<span class="glyphicon glyphicon-plus mrg-tp-forteen"></span> &nbsp;&nbsp;
								<span class="glyphicon glyphicon-filter glyphicon1"></span>
							</span>
						</div>
					</div>
					<div class="panel-body filter-bdy" style="display:none">
						<input type="text" class="form-control" id="dev-table-filter" data-action="filter" data-filters="#dev-table" placeholder="Search..." />
					</div>
			 </div>
			 </div> -->
			 <!-- Filter End -->
			 
			 <div class="col-md-12">
			 <div class="overflow-scroll">
			 <div class="table-responsive container" >
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
                   <th>	State</th>
                 </tr>
                </thead>
                @foreach($query as $val)
                <tbody>
                <tr>
                  <td><?php echo $val->Name; ?></td>
                  <td><?php echo $val->DOB; ?></td>
                  <td><?php echo $val->Email; ?></td>
                  <td><a href="#" class="Password" data-toggle="popover" title="Show Password" data-content="<?php echo $val->Password; ?>">*****</a></td>
				  <td><?php echo $val->MobileNo; ?></td>
				  <td><?php echo $val->PancardNo; ?></td>
                  <td>0</td>
                  <td>0</td>
                  <td><?php echo $val->AdharNo; ?></td>
                  <td><?php echo $val->Pincode; ?></td>
                  <td><?php echo $val->City; ?></td>
                  <td><?php echo $val->State; ?></td>
				  </tr>
                </tbody>
		       @endforeach
            </table>
			</div>
			</div>
			@endsection	
<script type="text/javascript">
	$(document).ready(function(){
    $('.Password').popover();   
});
</script>

<div class="updatePosp modal fade" role="dialog">   
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
        <h4 class="modal-title">UPDATE POSP</h4>
      </div>
      <div class="modal-body">
        <form id="posp_from_id">
          <div class="form-group">
            <input id="fba_id_posp" type="hidden" name="fbaid"/>
            <input id="flage_id" type="hidden" name="flage_id"/>
          </div>
          <div class="form-group">
            <label class="control-label" for="message-text">POSP :</label>
            <input class="recipient-name form-control" id="posp_name_id" type="text" name="posp_name" onkeypress="return Numeric(event)"/>
          </div>
        </form>
        <div class="modal-footer"> 
          <button class="btn btn-default" type="button" data-dismiss="modal">Close</button>
          <button class="btn btn-primary posp_from_id" type="button">Save changes</button><b class="alert-success primary" id="strong_lead"></b>
        </div>
      </div>
    </div>
  </div>
</div>