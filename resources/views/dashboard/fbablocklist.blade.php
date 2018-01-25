          @extends('include.master')
          @section('content')
    
<link type="text/css" href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap-glyphicons.css" rel="stylesheet">
<div id="content" style="overflow:scroll;">
			 <div class="container-fluid white-bg">
			 <div class="col-md-12"><h3 class="mrg-btm">FBA Block List</h3></div>
			 <div class="col-md-12">
			 <div class="overflow-scroll">
			 <div class="table-responsive" >
				<table class="table table-bordered table-striped tbl" >
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
                  <!-- <td>OMARAM CHOUDHARY</td>
                  <td>17 Jan 2018</td>
                  <td>9784120418</td>
                  <td>onarwal418@gmail.com</td>
				  <td>JODHPUR</td>
				  <td>342001</td> -->

     @foreach($query as $val)   

       <!-- <td><?php echo $val->fbaid;?></td> -->
       <td><?php echo $val->FullName; ?></td> 
       <td><?php echo $val->createdate; ?></td>
       <td><?php echo $val->MobiNumb1; ?></td> 
       <td><?php echo $val->EMaiID; ?></td>
       <td><?php echo $val->city; ?></td>
       <td><?php echo $val->Pincode; ?></td>
      <td><button class="btn btn-default block">Block </button><button class="btn btn-danger unblock" style="display:none;">Unblock</button></td>
                
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




