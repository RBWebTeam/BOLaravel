<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>
<script type="text/javascript" src="http://maps.googleapis.com/maps/api/js?sensor=false"></script>

     <div class="container-fluid white-bg">
       <div class="col-md-12"><h3 class="mrg-btm">NCD FBA Details</h3></div>
<div class="col-md-12">
			 <div class="-scroll"> 
			 <div class="table-responsive" >
				<table id="ncdcampaign-tbl" class="table table-bordered table-striped tbl" >
                 <thead>
                  <tr style="background-color:#8cc9e2">
                  <!--  <th>ID</th> -->
                   <th>Customer Name</th>
                   <th>Campaign Name</th>
                   <th>Reference Number</th>
                   <th>Status</th>
                   <th>Created Date</th>
                 </tr>
                </thead>
                <tbody>

        @foreach($data as $val)   

       <td><?php echo $val->camapignname; ?></td> 
       <td><?php echo $val->customer_name; ?></td>
       <td><?php echo $val->reference_number; ?></td>
       <td><?php echo $val->status; ?></td>
       <td><?php echo $val->createddate; ?></td> 

      </tr>
       @endforeach

               


        
            

 			      </tbody>
               </table>
			</div>
		</div>
	</div>
      </div>

