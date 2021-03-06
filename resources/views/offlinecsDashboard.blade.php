@extends('include.master')
@section('content')
<style type="text/css">

  #tblcsdata th, td {
    background-color: transparent;
    padding: 10px;
    font-size: 13px;
    border: 1px solid #eee !important; 
    margin-left: 45px;
  }
  #tblcsdata tr:hover{
   background-color: #8cc9e2;
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
    		<td>
          <a data-toggle="modal" data-target="#csdetails" onclick="showdetails({{$val->ID}},this)">{{$val->ID}}</a>          
        </td>
    		<td>{{$val->product_name}}</td>
        <td>{{$val->CustomerName}}</td>
    		<td>{{$val->cityname}}</td>
    		<td>{{$val->POSPName}}</td>
    		<td>{{$val->MobileNo}}</td>
        <td>  
         <a class="btn btn-primary" data-toggle="modal" data-target="#csidupdate" onclick="updatecsid({{$val->ID}},this)">Update CSID</a>        
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
        <h3 class="modal-title" id="exampleModalLabel">CS Details</h3>
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
<!-- Modal CSID UPDATE -->
<div class="modal fade" id="csidupdate" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h3 class="modal-title" id="exampleModalLabel">CSID Update</h3>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">    
      <form method="post" id="frmcsid" name="frmcsid">  
      {{ csrf_field() }}      
            <label>CSID:</label>
            <input type="Email" class="form-control" name="txtcsid" id="txtcsid" required> 
            <input type="hidden" name="txtID" id="txtID">           
      </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" id="btncsidupdate">Update</button> 
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
     //alert($ID);    
     
   $.ajax({
             url: 'offlinecs-details/'+$ID,
             type: "GET",             
             success:function(csdata) 
             {      
               var data = JSON.parse(csdata);

               var str = "<table Id='tblcsdata' class='table-bordered'>";
         for (var i = 0; i < data.length; i++) 
           {
               str = str + "<tr><th>ID</th><td>"+data[i].ID+"</td></tr><tr><th>Product Name</th><td>"+data[i].product_name+"</td></tr><tr><th>Customer Name</th><td>"+data[i].CustomerName+"</td></tr><tr><th>Customer Address</th><td>"+data[i].CustomerAddress+"</td></tr><tr><th>City</th><td>"+data[i].cityname+"</td></tr><tr><th>State</th><td>"+data[i].state_name+"</td></tr><tr><th>Zone</th><td>"+data[i].Zone+"</td></tr><tr><th>Region</th><td>"+data[i].Region+"</td></tr><tr><th>Mobile No</th><td>"+data[i].MobileNo+"</td></tr><tr><th>Telephone No</th><td>"+data[i].TelephoneNo+"</td></tr><tr><th>Email Id</th><td>"+data[i].EmailId+"</td></tr><tr><th>POSP Name</th><td>"+data[i].POSPName+"</td></tr><tr><th>Premium Amount</th><td>"+data[i].PremiumAmount+"</td></tr><tr><th>ERPID</th><td>"+data[i].ERPID+"</td></tr><tr><th>QTNo</th><td>"+data[i].QTNo+"</td></tr>";
                  str += data[i].VehicleNo==null?"":"<tr><th>Vehicle No</th><td>"+data[i].VehicleNo+"</td></tr>";
                  str += data[i].DateofExpiry==null?"":"<tr><th>Date of Expiry</th><td>"+data[i].DateofExpiry+"</td></tr>";
                  str += data[i].BreakIn==null?"":"<tr><th>Break In</th><td>"+data[i].BreakIn+"</td></tr>";
                  str += data[i].motorInsurer==null?"":"<tr><th>Motor Insurer</th><td>"+data[i].motorInsurer+"</td></tr>";
                  str += data[i].PaymentMode==null?"":"<tr><th>Payment Mode</th><td>"+data[i].PaymentMode+"</td></tr>";
                  str += data[i].UTRNo==null?"":"<tr><th>UTR No</th><td>"+data[i].UTRNo+"</td></tr>";
                  str += data[i].Bank==null?"":"<tr><th>Bank</th><td>"+data[i].Bank+"</td></tr>";
                  str += data[i].ExecutiveName==null?"":"<tr><th>Executive Name</th><td>"+data[i].ExecutiveName+"</td></tr>";
                  str += data[i].ExecutiveName1==null?"":"<tr><th>Executive Name 1</th><td>"+data[i].ExecutiveName1+"</td></tr>";
                  str += data[i].ProductExecutive==null?"":"<tr><th>Product Executive</th><td>"+data[i].ProductExecutive+"</td></tr>";
                  str += data[i].ProductManager==null?"":"<tr><th>Product Manager</th><td>"+data[i].ProductManager+"</td></tr>";                
                  str += data[i].Preexisting==null?"":"<tr><th>Preexisting</th><td>"+data[i].Preexisting+"</td></tr>";
                  str += data[i].MedicalReport==null?"":"<tr><th>Medical Report</th><td>"+data[i].MedicalReport+"</td></tr>";
                  str += data[i].PremiumYears==null?"":"<tr><th>Premium Years</th><td>"+data[i].PremiumYears+"</td></tr>";
                  str += data[i].TypeofPolicy==null?"":"<tr><th>Type of Policy</th><td>"+data[i].TypeofPolicy+"</td></tr>";
                  str += data[i].Insurerhealth==null?"":"<tr><th>Insurer Health</th><td>"+data[i].Insurerhealth+"</td></tr>";
                  str += data[i].Insurerlife==null?"":"<tr><th>Insurer Life</th><td>"+data[i].Insurerlife+"</td></tr>";
                  str += data[i].CSID==null?"":"<tr><th>CSID</th><td>"+data[i].CSID+"</td></tr>";
                  str += data[i].createddate==null?"":"<tr><th>Created date</th><td>"+data[i].createddate+"</td></tr>";
                  str += data[i].RCCopy==0?"":"<tr><th>RC Copy</th><td><a target='_blank' href='{{url('/upload/offlinecs')}}/"+data[i].RCCopy+"'>"+data[i].RCCopy+"</a></td></tr>";
                  str += data[i].Fitness==0?"":"<tr><th>Fitness</th><td><a target='_blank' href='{{url('/upload/offlinecs')}}/"+data[i].Fitness+"'>"+data[i].Fitness+"</a></td></tr>";
                  str += data[i].PUC==0?"":"<tr><th>PUC</th><td><a target='_blank' href='{{url('/upload/offlinecs')}}/"+data[i].PUC+"'>"+data[i].PUC+"</a></td></tr>";
                   str += data[i].BreakinReport==0?"":"<tr><th>Breakin Report</th><td><a target='_blank' href='{{url('/upload/offlinecs')}}/"+data[i].BreakinReport+"'>"+data[i].BreakinReport+"</a></td></tr>";
                  str += data[i].ChequeCopy==0?"":"<tr><th>Cheque Copy</th><td><a target='_blank' href='{{url('/upload/offlinecs')}}/"+data[i].ChequeCopy+"'>"+data[i].ChequeCopy+"</a></td></tr>";
                  str += data[i].Other==0?"":"<tr><th>Other</th><td><a target='_blank' href='{{url('/upload/offlinecs')}}/"+data[i].Other+"'>"+data[i].Other+"</a></td></tr>";
                  str += data[i].ProposalForm==0?"":"<tr><th>Proposal Form</th><td><a target='_blank' href='{{url('/upload/offlinecs')}}/"+data[i].ProposalForm+"'>"+data[i].ProposalForm+"</a></td></tr>";
                   str += data[i].KYC==0?"":"<tr><th>KYC</th><td><a target='_blank' href='{{url('/upload/offlinecs')}}/"+data[i].KYC+"'>"+data[i].KYC+"</a></td></tr>";

           } 
             
            str = str + "</table>";
           $('#divcsdetais').html(str);
             }
         });
  }

  function updatecsid($ID)  
  {        
    $("#txtID").val($ID);
  }

$("#btncsidupdate" ).click(function(){
  if ($('#frmcsid').valid()){
   $.ajax({ 
   url: "{{URL::to('offlinecs-csidupdate')}}",
   method:"POST",
   data: $('#frmcsid').serialize(),
   success: function(msg)  
   {
    alert("CSID Updated Successfully");
    $("#frmcsid").trigger('reset');
    $('#csidupdate').modal('hide');
   }
});
}
});


 
</script>
@endsection
 