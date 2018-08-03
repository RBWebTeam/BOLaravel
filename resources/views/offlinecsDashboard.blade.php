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
/*#tblcsdata tr:hover{
   background-color: #8cc9e2;
  }*/
   /*#txtarea textarea:hover{
  background-color: #8cc9e2;
  border-style: none;
 }*/
 textarea {
    -webkit-appearance: textarea;
    background-color: none;
    -webkit-rtl-ordering: logical;
    flex-direction: column;
    resize: auto;
    cursor: default;
    white-space: pre-wrap;
    word-wrap: break-word;
    border-width: none;
    border-style: none;
    border-color: none;
    border-image: none;
    padding: 2px;
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
      	<th>Product Name</th>
      	<th>Customer Name</th>
      	<th>City</th>
      	<th>POSP Name</th>
      	<th>Mobile No</th>
        <th>CSID</th>
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
          @if($val->CSID=='')
         <a id="btncsid" class="btn btn-primary" data-toggle="modal" data-target="#csidupdate" onclick="updatecsid({{$val->ID}},this)">Update CSID</a>
         @endif
         {{$val->CSID}}</td>
        <td> 
          @if($val->ERPID=='')
          <a id="btnedit" class="btn btn-primary" href="{{url('offlinecs')}}?id={{$val->ID}}"><span style="font-size: 15px;">Edit</span></a>
          @elseif($val->ismailsend!=1)
            <a id="btnedit" class="btn btn-primary" href="{{url('offlinecs')}}?id={{$val->ID}}"><span style="font-size: 15px;">Edit</span></a>
            <a id="btnedit" class="btn btn-primary" onclick="Sendemail({{$val->ID}},this)" ><span class="glyphicon glyphicon-envelope" style="font-size: 15px;"></span></a> 
            @else
            <a id="btnedit" class="btn btn-primary" onclick="Sendemail({{$val->ID}},this)" ><span class="glyphicon glyphicon-envelope" style="font-size: 15px;"></span></a> 
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
              alert("Mail has Been Send Successfully");              
              //window.location.href = '{{url('offlinecs-dashboard')}}';
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
               str = str + "<tr><th>ID</th><td>"+data[i].ID+"</td></tr><tr><th>Reason</th><td>"+data[i].Reason+"</td></tr><tr><th>Product Name</th><td>"+data[i].product_name+"</td></tr><tr><th>Customer Name</th><td>"+data[i].CustomerName+"</td></tr><tr id='txtarea'><th>Customer Address</th><td><textarea readonly>"+data[i].CustomerAddress+"</textarea></td></tr><tr><th>City</th><td>"+data[i].cityname+"</td></tr><tr><th>State</th><td>"+data[i].state_name+"</td></tr><tr><th>Zone</th><td>"+data[i].Zone+"</td></tr><tr><th>Region</th><td>"+data[i].Region+"</td></tr><tr><th>Mobile No</th><td>"+data[i].MobileNo+"</td></tr><tr><th>Telephone No</th><td>"+data[i].TelephoneNo+"</td></tr><tr><th>Email Id</th><td>"+data[i].EmailId+"</td></tr><tr><th>POSP Name</th><td>"+data[i].POSPName+"</td></tr><tr><th>Premium Amount</th><td>"+data[i].PremiumAmount+"</td></tr><tr><th>ERPID</th><td>"+data[i].ERPID+"</td></tr><tr><th>QTNo</th><td>"+data[i].QTNo+"</td></tr>"; 
                 str += data[i].otherproductname==null?"":"<tr><th>Other Product Name</th><td>"+data[i].otherproductname+"</td></tr>"; 
                  str += data[i].otherreason==null?"":"<tr id='txtarea'><th>Other Reason</th><td><textarea readonly>"+data[i].otherreason+"</textarea></td></tr>";
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
                  str += data[i].RCCopy==0?"":"<tr><th>RC Copy</th><td><a target='_blank' href='http://"+data[i].RCCopy+"'><textarea readonly>"+data[i].RCCopy+"</textarea></a></td></tr>";
                  str += data[i].Fitness==0?"":"<tr><th>Fitness</th><td><a target='_blank' href='http://"+data[i].Fitness+"'><textarea readonly>"+data[i].Fitness+"</textarea></a></td></tr>";
                  str += data[i].PUC==0?"":"<tr><th>PUC</th><td><a target='_blank' href='http://"+data[i].PUC+"'><textarea readonly>"+data[i].PUC+"</textarea></a></td></tr>";
                   str += data[i].BreakinReport==0?"":"<tr><th>Breakin Report</th><td><a target='_blank' href='http://"+data[i].BreakinReport+"'><textarea readonly>"+data[i].BreakinReport+"</textarea></a></td></tr>";
                  str += data[i].ChequeCopy==0?"":"<tr><th>Cheque Copy</th><td><a target='_blank' href='http://"+data[i].ChequeCopy+"'><textarea readonly>"+data[i].ChequeCopy+"</textarea></a></td></tr>";
                  str += data[i].Other==0?"":"<tr><th>Other</th><td><a target='_blank' href='http://"+data[i].Other+"'><textarea readonly>"+data[i].Other+"</textarea></a></td></tr>";
                  str += data[i].ProposalForm==0?"":"<tr><th>Proposal Form</th><td><a target='_blank' href='http://"+data[i].ProposalForm+"'><textarea readonly>"+data[i].ProposalForm+"</textarea></a></td></tr>";
                   str += data[i].KYC==0?"":"<tr><th>KYC</th><td><a target='_blank' href='http://"+data[i].KYC+"'><textarea readonly>"+data[i].KYC+"</textarea></a></td></tr>";
                   str += data[i].Document1==0?"":"<tr><th>Document 1</th><td><a target='_blank' href='http://"+data[i].Document1+"'><textarea readonly>"+data[i].Document1+"</textarea></a></td></tr>";

                   str += data[i].Document2==0?"":"<tr><th>Document 2</th><td><a target='_blank' href='http://"+data[i].Document2+"'><textarea readonly>"+data[i].Document2+"</textarea></a></td></tr>";

                   str += data[i].Document3==0?"":"<tr><th>Document 3</th><td><a target='_blank' href='http://"+data[i].Document3+"'><textarea readonly>"+data[i].Document3+"</textarea></a></td></tr>";

                   str += data[i].Document4==0?"":"<tr><th>Document 4</th><td><a target='_blank' href='http://"+data[i].Document4+"'><textarea readonly>"+data[i].Document4+"</textarea></a></td></tr>";

                   str += data[i].Document5==0?"":"<tr><th>Document 5</th><td><a target='_blank' href='http://"+data[i].Document5+"'><textarea readonly>"+data[i].Document5+"</textarea></a></td></tr>";


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
     window.location.reload();

   }
});
}
});


 
</script>
@endsection
 