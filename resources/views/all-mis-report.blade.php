@extends('include.master')
 @section('content')
<!--  <body onload="currentrecort();"> -->


 <div class="container-fluid white-bg">
     



      <div class="col-md-2">
      <div class="form-group">  

    <p>From Date</p>
         <div id="datepicker" class="input-group date" data-date-format="yyyy-mm-dd">
               <input class="form-control date-range-filter" type="text" placeholder="From Date" name="fdate" id="min"/>
          <span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
               </div>
              </div>
            </div>
           <div class="col-md-2">
        <div class="form-group">
        <p>To Date</p>
        <div id="datepicker1" class="input-group date" data-date-format="yyyy-mm-dd">
  <input class="form-control date-range-filter" type="text" placeholder="To Date"  name="ldate"  id="max"/>
          <span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
         </div>
      </div>
  </div>
  

      <div class="form-group"> <input type="submit" name="btndate" id="btndate"  class="mrg-top common-btn pull-left" value="SHOW">
         <div class="col-md-12"><h3 class="mrg-btm">System MIS</h3></div> 
    <div class="col-md-12"><h3 class="mrg-btm">Insurance</h3></div>
<div class="col-md-12">
			 <div class="overflow-scroll">
			 <div class="table-responsive" >
				<table class="table table-bordered table-striped tbl" style="margin-right: " >
                <thead>
                  <tr>
                  <th>Product</th> 
                  <th>Premium</th> 
                  <th>Policies</th>
                  <th>Active Posp</th> 
                  <th>Total GWP</th>   
                  <th>Total OD</th>
                  <th>Avg NOP </th> 
                  <th>Avg Ticket</th> 
                  <th>Avg Productivity per Posp</th>           
                  </tr>
                </thead>
                <tbody id="misreport">
                </tbody>
               <!--  <thead id="misreportf">
                  
              </thead> -->
     		 </table>



     </div>
      </div>
      </div>
      </div>

      <div class="col-md-12"><h3 class="mrg-btm">Loan</h3></div>
      <div class="col-md-12">
       <div class="overflow-scroll">
       <div class="table-responsive" >
    <table class="table table-bordered table-striped tbl" >   
                <thead>
                  <tr>
                  <th>Product</th> 
                  <th>Disbused Value</th> 
                  <th>No OF Loans</th>
                  <th>Active FBA</th> 
                  <th>Average Loan Per FBA</th>   
                  <th>Average Ticket Per Loan</th>
                  <th>Average Productivity Per FBA</th>         
                  </tr>
                </thead>
                <tbody id="salesloanreport">
           </tbody>
           <!--  <thead id="salesloanreporttotal">
                  
              </thead> -->
         </table>
       
        </div>
      </div>
      </div>

      <div class="col-md-12"><h3 class="mrg-btm">Credit Card</h3></div>
      <div class="col-md-12">
       <div class="overflow-scroll">
       <div class="table-responsive" >
    <table id="credircardreport" class="table table-bordered table-striped tbl" >   
                <thead>
                <tr>
                <th>Product </th>
               <!--  <th>Disbused Value </th>  -->
                <th>No of Cards</th> 
                <th>Active FBA</th> 
                <th>Average Card Per FBA</th>
                <!-- <th>Average Ticket Per Loan</th> 
                <th>Average Productivity Per FBA</th>  -->  
                         
                  </tr>
                </thead>
                <tbody>
           </tbody>
         </table>
       </div>
      </div>
      </div>
      <hr>


 <div class="col-md-12"><h3 class="mrg-btm">MIS Reported</h3></div>
      <div class="col-md-12">
       <div class="overflow-scroll">
       <div class="table-responsive" >
        <table class="table table-bordered table-striped tbl" style="margin-top: 1px" >      
                <thead>
                  <tr>
                  <th>Product</th> 
                  <th>Premium</th> 
                  <th>Policies</th>
                  <th>Active Posp</th> 
                <!--   <th>Avg NOP Per Posp</th> -->   
                  <!-- <th>Avg Ticket Size Per Policy</th> -->
                  <!-- <th>Avg Productivity Per Posp</th>  -->        
                  </tr>
                </thead>
                <tbody id="salesreport">
           </tbody>
       <!--    <thead id="salesreporttotal"></thead> -->
                  
             
         </table>

<hr style="height: 5px"> 
       
        </div>
      </div>
      </div>
      </div>
			</div>
			</div>
      </div>

 <script type="text/javascript">
    $(document).ready(function(){

    $('#btndate').on("click", function(){
      //alert("test");
     $('#misreport>tbody').empty();
     var startdate = $('#min').val();
     var enddate = $('#max').val();
     if(startdate =="" || enddate==""){
      alert("Please select Date Range...");
      return false;
     }else{

      $.ajax({ 
     url: 'mis-report/'+startdate+'/'+enddate,  
     dataType : 'json',
     method:"GET",
     success: function(msg){
    var ProductName=ProductName;
    $('#misreport').empty();
      if(msg!='' && msg!=null){     
        
     arr=Array();
   $.each(msg, function( index, val ){ 


 arr.push("<tr><td><a target='_blank'href='product-health/"+val.ProductName+"/"+startdate+"/"+enddate+"'>"+val.ProductName +"</a></td><td>"+ val.Premium +"</td><td>" + val.Policy + "</td><td>" + val.ActivePOSP +"</td><td>" + val.TotalGWP +"</td><td>" + val.Total_OD +"</td><td>" + val.AvgNOP +"</td><td>" + val.AvgTicket +"</td><td>" + val.AvgProduct +"</td></tr>");
    });

    $('#misreport').append(arr);  
   $('#misreport tr:last').css({'background-color':'#8cc9e2 ','font-size':'20px'});
   
 }else{
         $('#misreport>tbody').empty()
        $('#misreport').append("<tr><td colspan=9>Record not found</td></tr>")
      }
     
}
 });

     }
     
       

      });
    });  


</script>

<!-- sales Loan start -->


<script type="text/javascript">
    $(document).ready(function(){

    $('#btndate').on("click", function(){
   //a alert("test");
   $('#salesloanreport>tbody').empty();
     var startdate = $('#min').val();
     var enddate = $('#max').val();
     $.ajax({ 
     url: 'sales-loan-report/'+startdate+'/'+enddate,
     dataType : 'json',
     method:"GET",
     success: function(msg){
    $('#salesloanreporttotal').empty();
    $('#salesloanreport').empty();

      if(msg!='' && msg!=null){     
        
      arr=Array();
  $.each(msg, function( index, val ) {

 arr.push("<tr><td>" + val.Product +"</td><td>" + val.DisbusedValue +"</td><td>" + val.NoOFLoans + "</td><td>" + val.ActiveFBA +"</td><td>" + val.AverageLoanPerFBA +"</td><td>" + val.AverageTicketPerLoan +"</td><td>" + val.AverageProductivityPerFBA +"</td></tr>");
    });
    $('#salesloanreport').append(arr); 
     $('#salesloanreport tr:last').css({'background-color':'#8cc9e2 ','font-size':'20px'}); 
 }else{
         $('#salesloanreport>tbody').empty()
        $('#salesloanreport').append("<tr><td colspan=8 > Record not found</td></tr>");
      }
     
}
 });  

});
    });  

</script>
<!-- sales Loan End -->


<!-- Insurance START -->
<script type="text/javascript">
    $(document).ready(function(){

    $('#btndate').on("click", function(){

   //a alert("test");
   $('#salesreport>tbody').empty();
     var startdate = $('#min').val();
     var enddate = $('#max').val();
     $.ajax({ 
     url: 'sales-report/'+startdate+'/'+enddate,
     dataType : 'json',
     method:"GET",
     success: function(msg){
      $('#salesreporttotal').empty();
      $('#salesreport').empty();   

      if(msg!='' && msg!=null){     
        
      arr=Array();

 $.each(msg, function( index, val ) {

 arr.push("<tr><td>" + val.Product +"</td><td>" + val.Premium +"</td><td>" + val.NoOfPolicy + "</td><td>" + val.ActivePOSP +"</td></tr>");//<td>" + val.AvgNOP +"</td><td>" + val.AvgTicket +"</td><td>" + val.AvgProduct +"</td></tr>");
    });
    $('#salesreport').append(arr); 
 $('#salesreport tr:last').css({'background-color':'#8cc9e2 ','font-size':'20px'});
 }else{
        $('#salesreport>tbody').empty()
        $('#salesreport').append("<tr><td colspan=8>Record not found</td></tr>");
      }
     
}
 });  

});
    });  
</script>
<!--  Insurance END -->

<!-- Credit card report start -->
<script type="text/javascript">
    $(document).ready(function(){

    $('#btndate').on("click", function(){
   //a alert("test");
   $('#credircardreport>tbody').empty();
     var startdate = $('#min').val();
     var enddate = $('#max').val();
     $.ajax({ 
     url: 'cc-report/'+startdate+'/'+enddate,
     dataType : 'json',
     method:"GET",
     success: function(msg){

      if(msg!='' && msg!=null){     
        
      arr=Array();
    $.each(msg, function( index, val ) {
    arr.push("<tr><td>" + val.Product +"</td><td>" + val.NoOFLoans + "</td><td>" + val.ActiveFBA +"</td><td>" + val.AverageLoanPerFBA +"</td></tr>");
    });
    $('#credircardreport').append(arr);          
      }else{
         $('#credircardreport>tbody').empty()
        $('#credircardreport').append("<tr><td colspan=6 > Record not found</td></tr>");
      }
     
}
 });  

});
    });  


</script>








 @endsection