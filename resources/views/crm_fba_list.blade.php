@extends('include.master')
@section('content')   

<div id="content" style="overflow:scroll;">
			 <div class="container-fluid white-bg">
			 <div class="col-md-12"><h3 class="mrg-btm">Fba list</h3></div>
			 <div class="col-md-12">
			 <div class="overflow-scroll">
			 <div class="table-responsive" >

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
            
       @foreach($crmlist as $val) 

       <td><?php echo $val->FBAID; ?></td> 
       <td><?php echo $val->FullName; ?></td>
       <td><?php echo $val->MobiNumb1; ?></td> 
       <td><?php echo $val->EmailID; ?></td>  
       <td><?php echo $val->City; ?></td> 
       <td><?php echo $val->PinCode; ?></td>
       <td>

      <?php if($val->IsBlocked=="" || $val->IsBlocked=="0"){?>
      <button id="btnblock" class="btn btn-default block">Block </button>
      <button id="btnunblock" class="btn btn-danger unblock" style="display:none;">Unblock</button>
      <?php } else { ?>
      <button id="btnblock" class="btn btn-default block" style="display:none;">Block </button>
      <button id="btnunblock" class="btn btn-danger unblock" >Unblock</button>
      <?php } ?>
      
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








