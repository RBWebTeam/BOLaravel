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
                  <td><a href=""><?php echo $val->Name; ?></a></td>
                  <td><?php echo $val->DOB; ?></td>
                  <td><?php echo $val->Email; ?></td>
                  <td><a href="#" class="popover-Password" data-toggle="popover" title="Show Password" data-content="<?php echo $val->Password; ?>">*****</a></td>
				  <td><?php echo $val->MobileNo; ?></td>
				  <td><?php echo $val->PancardNo; ?></td>
                  <td>0</td>
                  <td>0</td>
                  <td><?php echo $val->AdharNo; ?></td>
                  <td><?php echo $val->Pincode; ?></td>
                  <td><?php echo $val->City; ?></td>
                  <td><?php echo $val->State; ?></td>
				  </tr>
				@endforeach
                </tbody>
		       
            </table>
			</div>
			</div>
			</div>
			</div>
		
			@endsection