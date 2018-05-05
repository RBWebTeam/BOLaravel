@extends('include.master')
	@section('content')
					  
 <!-- Body Content Start -->
			 <div class="container-fluid white-bg">
			 <div class="col-md-12">
			 <div class="panel panel-primary">
			 <div class="panel-heading">
						<h3 class="panel-title">LEAD DETAILS</h3>
						<div class="pull-right">
							<span class="clickable filter" data-toggle="tooltip" data-container="body"><a href="">
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
			 <div class="table-responsive" >
			<table class="datatable-responsive table table-striped table-bordered dt-responsive nowrap" id="example">
                 <thead>
                  <tr>
                   <th>Full Name</th>
                   <th>Created Date</th>
                   <th>Mobile No1</th>
                   <th>Mobile No2</th>
				   <th>Address1</th>
                   <th>Address2</th>
                   <th>Address3</th>
                   <th> Email Id</th>
                   <th>City</th>
				   <th>Pincode</th>
                   <th>State</th>
                   <th>Introducer Name</th>
                   <th>Lead Type</th>
                   <th>Lead Status</th>
                   </tr>
                </thead>
                <tbody>
				 @foreach($query as $val)
					                 <tr>
					                  <td><a href=""><?php echo $val->FullName; ?></a></td>
					                  <td><?php echo $val->createdate; ?></td>
					                  <td><?php echo $val->MobiNumb1; ?></td>
					                  <td><?php echo $val->MobiNumb2; ?></td>
					                  <td><?php echo $val->Address1; ?></td>
					                  <td><?php echo $val->Address2; ?></td>
					                  <td><?php echo $val->Address3; ?></td>
					                  <td> <?php echo $val->emailid;?></td>
					                  <td><?php echo $val->City; ?></td>
					                  <td><?php echo $val->Pincode; ?></td>
					                  <td><?php echo $val->state; ?></td>
					                  <td><?php echo $val->IntroName; ?></td>
					                  <td><?php echo $val->LeadType; ?></td>
					                  <td><?php echo $val->LeadCurrentState; ?></td>
                                    </tr>
					               @endforeach
					               
			          </tbody>
            </table>
			</div>
			</div>
			</div>
			<div class="col-md-12"><button class="common-btn center-obj">EXPORT TO EXCEL</button></div>
			</div>

          
        @endsection	
     




		 
	
