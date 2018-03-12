@extends('include.master')
 @section('content')


    <div id="content" style="overflow:scroll;">
       <div class="container-fluid white-bg">
       <div class="col-md-12"><h3 class="mrg-btm">Payment History</h3></div>
       <!-- Date Start -->
<!-- <div class="container">
  <div class="col-md-4 pull-right">
    <div class="input-group input-daterange">

      <input type="text" id="min-date" class="form-control date-range-filter" data-date-format="mm/dd/yyyy" placeholder="From:">

      <div class="input-group-addon">to</div>

      <input type="text" id="max-date" class="form-control date-range-filter" data-date-format="mm/dd/yyyy" placeholder="To:">

    </div>
  </div>
</div>
 -->
            
          <?php 

           $fromdate='';
           $todate='';
            if(isset($_GET['fdate']) && isset($_GET['todate'])){
                 $fromdate=$_GET['fdate'];
                 $todate=$_GET['todate'];
           }else{
                 
                 $fromdate= Date('m-d-Y', strtotime('-28 days'));
                 $todate=Date('m-d-Y');
           }


           ?>
  
 
        <form  method="get" action="{{url('payment-history')}}" >
       <div class="col-md-4">
      <div class="form-group">
      <p>From Date</p>
         <div id="datepicker" class="input-group date" data-date-format="mm-dd-yyyy">
               <input class="form-control date-range-filter" value="{{$fromdate}}" type="text" placeholder="From Date" name="fdate" id="min-date"  />
              <span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
              </div>
            </div>
           </div>
       <div class="col-md-4">
       <div class="form-group">
       <p>To Date</p>
       <div id="datepicker1" class="input-group date" data-date-format="mm-dd-yyyy">
               <input class="form-control date-range-filter " value="{{$todate}}" type="text"  placeholder="To Date"  name="todate"  id="max-date"   />
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
				<table id="example" class="table table-bordered table-striped tbl " >
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
                     <?php $dt = new DateTime($val->PaymDate);
                      $date = $dt->format('m/d/Y'); ?>
                   <td>{{$date}}</td>
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