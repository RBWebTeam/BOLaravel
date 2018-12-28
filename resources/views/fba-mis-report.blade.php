@extends('include.master')
 @section('content')
<!--  <body onload="currentrecort();"> -->

 <div class="container-fluid white-bg">
       <div class="col-md-12"><h3 class="mrg-btm">MIS-Report-For-FBA</h3></div>



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

 <!--  <input type="text" name="fbid" id="fbid" value=""> -->

      <div class="form-group"> <input type="submit" name="btndate" id="btndate"  class="mrg-top common-btn pull-left" value="SHOW">
    <!--   <div class="col-md-12"><h3 class="mrg-btm">Insurance</h3></div> -->

       <div class="col-md-12">
			 <div class="overflow-scroll">
			 <div class="table-responsive" >
			<table id="fbamiseport" class="table table-bordered table-striped tbl" style="margin-top: 1px" >      
                <thead>
                  <tr>
                  <th>Product</th> 
                  <th>Premium</th> 
                  <th>Policies</th>
                  <th>Active Posp</th> 
                  <th>Avg NOP Per Posp</th>   
                  </tr>
                </thead>
                <tbody>
           </tbody>
     		 </table>

<hr style="height: 5px"> 
     	 
     		</div>
			</div>
			</div>
      </div>


<script type="text/javascript">
    $(document).ready(function(){

    $('#btndate').on("click", function(){
    alert("test");
   $('#fbamiseport>tbody').empty();
     var startdate = $('#min').val();
     var enddate = $('#max').val(); 
     //var FBAID = $('#fbid').val();  
    //var fbaid = fbaid;
     $.ajax({ 
     url:'all-fba-mis-report/'+startdate+'/'+enddate,
     dataType : 'json',
     method:"GET",
     success: function(msg){
         //var FBAID=FBAID;


      if(msg!='' && msg!=null){     
      	
    	arr=Array();
		$.each(msg, function( index, val ) {
		arr.push("<tr><td>"+val.ProductName+"</td><td>"+val.Premium+"</td><td>"+val.Policy+"</td><td>"+val.TotalGWP+"</td><td>"+val.Total_OD +"</td></tr>");
		});
		$('#fbamiseport').append(arr);          
      }else{
        $('#fbamiseport>tbody').empty()
        $('#fbamiseport').append("<tr><td colspan=6>Record not found</td></tr>");
      }
     
}
 });  

});
    });  


</script>

 @endsection