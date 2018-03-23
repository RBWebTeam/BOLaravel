@extends('include.master')
 @section('content')


    <div id="content" style="overflow:scroll;">
       <div class="container-fluid white-bg">
       <div class="col-md-12"><h3 class="mrg-btm">Payment History</h3></div>
 

            
          <?php 

           $fromdate='';
           $todate='';
            if(isset($_GET['fdate']) && isset($_GET['todate'])){
                 $fromdate=$_GET['fdate'];
                 $todate=$_GET['todate'];
           }else{
                 
                 $fromdate= Date('d-m-Y', strtotime('-28 days'));
                 $todate=Date('d-m-Y');
           }


           ?>
  
 
        <form  method="get" action="{{url('payment-history')}}" >
       <div class="col-md-4">
      <div class="form-group">
      <p>From Date</p>
         <div id="datepicker" class="input-group date" data-date-format="dd-mm-yyyy">
               <input class="form-control date-range-filter" value="{{$fromdate}}" type="text" placeholder="From Date" name="fdate" id="min-date"  />
              <span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
              </div>
            </div>
           </div>
       <div class="col-md-4">
       <div class="form-group">
       <p>To Date</p>
       <div id="datepicker1" class="input-group date" data-date-format="dd-mm-yyyy">
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
				<table id="payment-history-tabel" class="table table-bordered table-striped tbl " >
                 <thead>
                  <tr>
                   <th>Customer Name</th>
                   <th>Customer ID</th>
                   <th>Mobile</th>
                   <th>Email</th>
                    <th>City</th>
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
                   
                   <td> {{$val->FullName}}</td>
                    <td>{{$val->DwtCustId}}</td>
                    <td>{{$val->MobiNumb1}}</td>
                   <td>{{$val->EmailID}}</td>
                     <td>{{$val->City}}</td>
                     <?php $dt = new DateTime($val->PaymDate);
                      $date = $dt->format('d-m-Y'); ?>
                   <td>{{$date}}</td>
                   <td>{{$val->Amount}}</td>
                    <td><!-- CreditDebit Card --> Net Banking </td>
                    <td>{{$val->PaymStat}}</td>
                     
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

      <script type="text/javascript">
        
     $(document).ready(function() {
    $('#payment-history-tabel').DataTable( {
     paging: true,
  info: false,
  responsive: false,
}).column('0:visible').order('desc').draw();

} );

      </script>
 @endsection