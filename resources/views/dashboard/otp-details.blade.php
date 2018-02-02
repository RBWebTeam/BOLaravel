@extends('include.master')
 @section('content')
    <div id="content" style="overflow:scroll;">
       <div class="container-fluid white-bg">
       <div class="col-md-12"><h3 class="mrg-btm">OTP Details</h3></div>
<div class="col-md-12">
			 <div class="overflow-scroll">
			 <div class="table-responsive" >
				<table id="example" class="table table-bordered table-striped tbl" >
                 <thead>
                  <tr>
                   <th>Mobile No</th>
                   <th>OTP</th>
                   <th>Created Date</th>
                 </tr>
                </thead>
                <tbody>

        @foreach($query as $val)   

       <td><?php echo $val->ValidData; ?></td> 
       <td><?php echo $val->OTP; ?></td>
       <td><?php echo $val->CreaDate; ?></td>
       
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