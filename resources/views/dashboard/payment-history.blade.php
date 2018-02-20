@extends('include.master')
 @section('content')
    <div id="content" style="overflow:scroll;">
       <div class="container-fluid white-bg">
       <div class="col-md-12"><h3 class="mrg-btm">OTP Details</h3></div>
       <!-- Date Start -->
        <form action="{{url('payment-history')}}" method="GET">
       <div class="col-md-4">
      <div class="form-group">
      <p>From Date</p>
         <div id="datepicker" class="input-group date" data-date-format="dd-mm-yyyy">
               <input class="form-control" type="text" placeholder="From Date" name="fdate" />
              <span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
              </div>
            </div>
           </div>
       <div class="col-md-4">
       <div class="form-group">
       <p>To Date</p>
       <div id="datepicker1" class="input-group date" data-date-format="mm-dd-yyyy">
               <input class="form-control" type="text" placeholder="To Date"  name="tdate" />
              <span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
              </div>
            </div>
           </div>
       <div class="col-md-4">
       <div class="form-group"> <input type="submit" name=""  class="mrg-top common-btn" value="SHOW">  </div>
       </div>
       </form>
       <!-- Date End -->
<div class="col-md-12">
			 <div class="overflow-scroll">
			 <div class="table-responsive" >
				<table id="example" class="table table-bordered table-striped tbl" >
                 <thead>
                  <tr>
                   <th>Customer Name</th>
                   <th>Customer ID</th>
                   <th>Mobile</th>
                   <th>Email</th>
                    <th>  Payment Date</th>
                     <th>Amount</th>
                      <th>Payment Type</th>
                       <th> Payment Status</th>
                 </tr>
                </thead>
                <tbody>
              

                 @if(isset($respon))
                 @foreach($respon as $val)
                 <tr>   
                   <?php   $customer_id =preg_split('/-/', $val->CustName); ?>
                   <td><?php  echo ($customer_id[0]);  ?></td>
                    <td><?php  echo ($customer_id[1]);  ?></td>
                    <td>{{$val->Mobile}}</td>
                   <td>{{$val->Email}}</td>
                   <td>{{$val->PaymDate }}</td>
                   <td>{{$val->Amount}}</td>
                    <td>{{$val->PaymType}}</td>
                    <td>{{$val->PaymStatus}}</td>
                     
                 </tr>
                 @endforeach
                 @endif
        
                
      </tbody>
      </table>
			</div>
			</div>
			</div>
      </div>
      </div>
 @endsection