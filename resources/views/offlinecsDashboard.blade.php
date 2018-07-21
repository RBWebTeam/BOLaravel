@extends('include.master')
@section('content')
<style type="text/css">
  nocolor{
    white-space: nowrap;   
    border: 1px solid #8cc9e2 !important;
 }
</style>
<div class="container-fluid white-bg">
<div class="col-md-12"><h3 class="mrg-btm">OFFLINE CS</h3></div>

<div class="col-md-12">
 <div class="overflow-scroll">
 <div class="table-responsive" >
<table class="datatable-responsive table table-striped table-bordered dt-responsive nowrap" id="example">
	<thead>
      <tr>
      	<th>ID</th>
      	<th>Produc Name</th>
      	<th>Customer Name</th>
      	<th>City</th>
      	<th>POSP Name</th>
      	<th>Mobile No</th>
      	<th>Action</th>      	
      </tr>
    </thead>
    <tbody>
      @isset($data)
    	@foreach($data as $val)
    	<tr>
    		<td><a data-toggle="modal" data-target="#csdetails" onclick="showdetails({{$val->ID}},this)">{{$val->ID}}</a></td>
    		<td>{{$val->product_name}}</td>
        <td>{{$val->CustomerName}}</td>
    		<td>{{$val->cityname}}</td>
    		<td>{{$val->POSPName}}</td>
    		<td>{{$val->MobileNo}}</td>
        <td>  
         <a id="btncsidupdate" class="btn btn-primary" >Update CSID</a>        
          @if($val->ismailsend!=1)
          <a id="btnedit" class="btn btn-primary" href="{{url('offlinecs')}}?id={{$val->ID}}" >Edit</a>
          <a id="btnedit" class="btn btn-primary" onclick="Sendemail({{$val->ID}},this)"><span class="glyphicon glyphicon-envelope" style="font-size: 20px;"></span></a>
          @endif
          @if($val->ismailsend==1)
          <a id="btnedit" class="btn btn-primary" onclick="Sendemail({{$val->ID}},this)" ><span class="glyphicon glyphicon-envelope" style="font-size: 20px;"></span></a>
          @endif         
         </td>		
    	</tr>
    	@endforeach
      @endisset
    </tbody>
</table>
</div>
</div>
</div>
</div>

<!-- Modal show details-->
<div class="modal fade" id="csdetails" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">CS Details</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">  
      <div id="divcsdetais">
        
      </div>         
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>        
      </div>
    </div>
  </div>
</div>
<script type="text/javascript">
  function Sendemail($ID)
  {
     //alert($ID);    
   $.ajax({
             url: 'offlinecssendemail/'+$ID,
             type: "GET",             
             success:function(data) 
             {      
              alert("Mail Has Been Send Successfully");
              window.location.href = '{{url('offlinecs-dashboard')}}';
             }
         });
  }
  function showdetails($ID)
  {
     alert($ID);    
   $.ajax({
             url: 'offlinecs-details/'+$ID,
             type: "GET",             
             success:function(csdata) 
             {      
               var data = JSON.parse(csdata);

               var str = "<table class='table-bordered'>";
         for (var i = 0; i < data.length; i++) 
           {
               str = str + "<tr><th>ID</th><td>"+data[i].ID+"</td></tr><tr><th>Product Name</th><td>"+data[i].product_name+"</td></tr><tr><th>Customer Name</th><td>"+data[i].CustomerName+"</td></tr><tr><th>Customer Address</th><td>"+data[i].CustomerAddress+"</td></tr><tr><th>City</th><td>"+data[i].cityname+"</td></tr><tr><th>State</th><td>"+data[i].state_name+"</td></tr><tr><th>Zone</th><td>"+data[i].Zone+"</td></tr><tr><th>Region</th><td>"+data[i].Region+"</td></tr><tr><th>Mobile No</th><td>"+data[i].MobileNo+"</td></tr><tr><th>Telephone No</th><td>"+data[i].TelephoneNo+"</td></tr><tr><th>Email Id</th><td>"+data[i].EmailId+"</td></tr><tr><th>POSP Name</th><td>"+data[i].POSPName+"</td></tr><tr><th>Premium Amount</th><td>"+data[i].PremiumAmount+"</td></tr><tr><th>ERPID</th><td>"+data[i].ERPID+"</td></tr><tr><th>QTNo</th><td>"+data[i].QTNo+"</td></tr>";
                 str += data[i].VehicleNo==null?"":"<tr><th>Vehicle No</th><td>"+data[i].VehicleNo+"</td></tr>";
                 str += data[i].DateofExpiry==null?"":"<tr><th>Date of Expiry</th><td>"+data[i].DateofExpiry+"</td></tr>";
           }
             
            str = str + "</table>";
           $('#divcsdetais').html(str);
             }
         });
  }
</script>
@endsection
 