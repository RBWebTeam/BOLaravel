@extends('include.master')
@section('content')   

<div id="content" style="overflow:scroll;">
			 <div class="container-fluid white-bg">
			 <div class="col-md-12"><h3 class="mrg-btm">FBA Block List</h3></div>
			 <div class="col-md-12">
			 <div class="overflow-scroll">
			 <div class="table-responsive" >
           <!-- \\filter start -->

     <!-- <div class="col-md-12">
                 <div class="panel panel-primary">
                 <div class="panel-heading">
                      <h3 class="panel-title">Filter</h3>
                      <div class="pull-right">
                        <span class="clickable filter" data-toggle="tooltip" data-container="body">
                        <span class="glyphicon glyphicon-plus glyphicon1"></span> &nbsp;&nbsp;
                          <span class="glyphicon glyphicon-filter glyphicon1 fltr-tog"></span>
                        </span>
                      </div>
                    </div>
                    <div class="panel-body filter-bdy" style="display:none">
                      <input type="text" class="form-control" id="dev-table-filter" data-action="filter" data-filters="#dev-table" placeholder="Search..." />
                    </div>
                 </div>
                 </div>
 -->
          <!--  \\filter end
 -->

       <!-- //start date -->
       <!--  <div class="col-md-4">
                <div class="form-group">
                   
                          <p>From Date</p>
                   <div id="datepicker" class="input-group date" data-date-format="mm-dd-yyyy">
                         <input class="form-control" type="text" placeholder="From Date" />
                        <span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
                        </div>
                      </div>
                     </div>
                 <div class="col-md-4">
                 <div class="form-group">
                 <p>To Date</p>
                   <div id="datepicker1" class="input-group date" data-date-format="mm-dd-yyyy">
                         <input class="form-control" type="text" placeholder="From Date" />
                        <span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
                        </div>
                      </div>
                     </div>
                 <div class="col-md-4">
                 <div class="form-group"> <button class="common-btn mrg-top">SHOW</button></div>
                 </div>
 -->

       <!-- //end date -->
				<table id="example" class="table table-bordered table-striped tbl" >
                 <thead>
                  <tr>
                   <th>Full Name</th>
                   <th>Created Date</th>
                   <th>Mobile No</th>
                   <th>Email ID</th>
				           <th>City</th>
				           <th>Pincode</th>
                   <th>BLOCK</th>
                  </tr>
                 </thead>
                 <tbody>
                 <tr>
            
       @foreach($query as $val) 

       <td><?php echo $val->FullName; ?></td> 
       <td><?php echo $val->createdate; ?></td>
       <td><?php echo $val->MobiNumb1; ?></td> 
       <td><?php echo $val->EMaiID; ?></td>
       <td><?php echo $val->city; ?></td>
       <td><?php echo $val->Pincode; ?></td>
       <td>
      <button id="btnblock" class="btn btn-default block">Block </button>
      <button id="btnunblock" class="btn btn-danger unblock" style="display:none;">Unblock</button>
      <input type="hidden" name="txtfbaid" id="blocksame" value="<?php echo $val->fbaid; ?>"></td>
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








