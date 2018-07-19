@extends('include.master')
@section('content')
@if(Session::has('message'))
<div class="alert alert-success alert-dismissible">
<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
<p class="alert alert-success">{{ Session::get('message') }}</p>
</div>
@endif
<div class="container-fluid white-bg">
  <div class="col-md-12"><h3>Offline Cs</h3></div>
  <div><a href="{{url('offlinecs-dashboard')}}" class="btn btn-primary pull-right">Show my Entries</a></div>
      <div class="col-md-12">
         <div class="overflow-scroll">
         	<div class="container">
         	<form  id="frmofflinecs" method="post" enctype="multipart/form-data" action="{{url('offlinecs')}}">            
              {{ csrf_field() }}
              <div class="row col-md-12" style="padding-left: 0px;">
                <input type="hidden" name="txtofflinecsid" id="txtofflinecsid">
                <div class="col-md-4">
                   <label>Why Offline:</label>
                  <select class="form-control" id="ddlwhyoffline" name="ddlwhyoffline" required>
                    <option value="">--select--</option>
                    @foreach($reason as $val)
                     <option value="{{$val->id}}">{{$val->Reason}}</option>
                    @endforeach                 
                 </select>  
                </div>
                <div class="col-md-4">
         		      <label>Product:</label>
                  <select class="form-control" onchange="pageview()" id="ddproduct" name="ddproduct">
                  @foreach($product as $val)
                 	<option value="{{$val->id}}">{{$val->product_name}}</option>
                  @endforeach                  
                 </select>  
                 </div>
              </div>           
              <br>
              <div class="row">
                 <div class="col-md-4">
                 	<label>Name of Customer:</label><input id="txtcstname" name="txtcstname" type="text" class="form-control txtonly" placeholder="Name of Customer" required>                    
                 </div>
                 <div class="col-md-4">
                 	<label>Address of Customer :</label><textarea id="txtadd" name="txtadd" class="form-control" placeholder="Address of Customer" required></textarea>            
                </div>
                <div class="col-md-4">
                	<label>City:</label>
                	<select onchange="getstate()" class="form-control" id="ddlcity" name="ddlcity" required>
                		<option value="">--select--</option>
                    @foreach($city as $val)
                    <option value="{{$val->city_id}}">{{$val->cityname}}</option>
                    @endforeach
                	</select>
                </div>              
              </div>
              <div class="row">
                  <div class="col-md-4">
                  <label>Map City:</label>
                  <select class="form-control" id="ddlmapcity" name="ddlmapcity" >
                    <option>--select--</option>                    
                  </select>
                </div>
                 <div class="col-md-4">
                 	<label>State</label>
                 	<select id="ddlstate" name="ddlstate" class="form-control" >
                 		<option>--select--</option>
                 	</select>                  
                 </div>
                 <div class="col-md-4">
                 	<label>Zone</label>
                 	<select id="ddlzone" name="ddlzone" class="form-control" >
                 		<option>--select--</option>
                 	</select>
                </div>
                <div class="col-md-4">
                	<label>Region:</label>
                	<select class="form-control" id="ddlregion" name="ddlregion" >
                		<option value="1">--select--</option>
                	</select>
                </div>
                <div class="col-md-4">
                  <label>Mobile no:</label>                   
                   <input id="txtmobno" name="txtmobno" class="form-control numericOnly" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" type = "number" maxlength = "10"  required>             
                </div>
                <div class="col-md-4">
                  <label>Telephone No:</label>
                  <input type="number" class="form-control numericOnly" name="txttelno" id="txttelno">              
                </div>             	
              	<div class="col-md-4">
              		<label>Email Id:</label>
              		<input type="Email" class="form-control" name="txtemail" id="txtemail" required>           		
              	</div>
               	<div class="col-md-4">
              		<label>Posp Name:</label>
              		<select onchange="getpospname();" class="form-control" id="ddlfbaname" name="ddlfbaname" required>
                    <option value="">--Select--</option>
                    @foreach($fba as $val)
              			<option value="{{$val->FBAID}}">{{$val->POSPName}} ({{$val->FBAID}})</option>
                    @endforeach
              		</select>           		
              	</div>
                <div class="col-md-4">
                  <label>Premium Amount:</label>
                <input type="number" class="form-control numericOnly" name="txtpremiumamt" id="txtpremiumamt" required>        
                </div>
              	<div class="col-md-4">
              		<label>ERP ID:</label>
              		<input type="text" class="form-control" name="txterpid" id="txterpid" readonly>           		
              	</div>

              	<div class="col-md-4">
              		<label>QT No:</label>
              		<input type="text" class="form-control" name="txtqtno" id="txtqtno">           		
              	</div>
                <div class="col-md-4">
                  <label>Date of Expiry:</label>
                  <input type="Date" class="form-control" name="txtexpdate" id="txtexpdate" required>            
                </div>
                <div class="col-md-4">
                  <label>Payment Mode:</label>
                  <select id="ddlpayment" name="ddlpayment" class="form-control" required>
                    <option value="">--select--</option>
                    <option value="Online">Online</option>
                    <option value="Offline">Offline</option>
                  </select>
                </div>
                <div class="col-md-4">
                  <label>UTR No / Cheque No:</label>
                  <input type="text" name="txtutrnomotor" class="form-control" id="txtutrnomotor" required>
                </div> 
                <div class="col-md-4">
                  <label>Bank:</label>
                  <input type="text" name="txtbankmotor" id="txtbankmotor" class="form-control" required>
                </div>  
              </div>            
            <br>
            <div class="Motor" id="Motor">
            <div class="row">
              	<div class="col-md-4">
              		<label>Vehicle No:</label>  
                  <input type="text" name="txtvehicalno" id="txtvehicalno" class="form-control Vehicleno" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" maxlength = "10">        		
              	</div>              	
              	<div class="col-md-4">
              		<label>Break In:</label>
              		<label class="checkbox-inline">YES  <input class="Breakinyes" type="radio" name="txtbreakin" id="txtbreakin" value="YES"></label>
              		<label class="checkbox-inline">No  <input class="Breakinno" type="radio" name="txtbreakin" id="txtbreakin" value="No"></label>              		           		
              	</div>              
              	<div class="col-md-4">
              		<label>Insurer:</label>
              		<select id="ddlInsurermotor" name="ddlInsurermotor" class="form-control" >
              			<option value="">--select---</option>
              			@foreach ($Genins as $val)
              			<option value="{{$val->GeneralInsuranceCompanyMasterId}}">{{$val->CompanyName}}</option>
              			@endforeach
              		</select>             		
              	</div> 
               </div>
              </div>           
             <div id="divhealth">           
             <div class="row">
             	<div class="col-md-4">
              		<label>Insurer:</label>
              		<select id="ddlInsurerhealth" name="ddlInsurerhealth" class="form-control" >
                    <option value="">--select---</option>
                    @foreach($health as $val)
              			<option value="{{$val->id}}">{{$val->companyname}}</option>
                    @endforeach
              		</select>              		
              	</div>         	
              	<div class="col-md-4">
              		<label>Preexisting:</label>
              		<label class="checkbox-inline">YES  <input class="Preexistingyes" type="radio" name="txtPreexisting" id="txtPreexisting" value="YES"></label>
              		<label class="checkbox-inline">No  <input class="Preexistingno" type="radio" name="txtPreexisting" id="txtPreexisting" value="No"></label>             		           		
              	</div>   
              	<div class="col-md-4">
              		<label>Medical Report:</label>
              		<label class="checkbox-inline">YES  <input type="radio" class="Medicalyes" name="txtmedicalrp" id="txtmedicalrp" value="YES"></label>
              		<label class="checkbox-inline">No  <input type="radio" class="Medicalno" name="txtmedicalrp" id="txtmedicalrp" value="No"></label>             		           		
              	</div> 
              	</div> 
              	<div class="row">  
              	<div class="col-md-4">
              		<label>Premium Year/s:</label>
              		<select id="dllpremium" name="dllpremium" class="form-control" >
              			<option value="">--select--</option>
              			<option value="1 year">1 year</option>
              			<option value="2 year">2 year</option>
              			<option value="3 year">3 year</option>
              		</select>
              	</div>             	
               </div>
               </div>          
             <div id="divlife">
             <div class="row">
             	<div class="col-md-4">
             		<label>Type of Policy:</label>
             		<select id="ddlnoofpolicy" name="ddlnoofpolicy" class="form-control" >
             			<option value="">--select--</option>
             			<option value="Term">Term</option>
             			<option value="Other">Other</option>
             		</select>
             	</div>             
             	<div class="col-md-4">
              		<label>Medical case:</label>
              		<label class="checkbox-inline">YES <input type="radio" class="Medicalcaseyes" name="txtmedicalcase" id="txtmedicalcase" value="YES"></label>
              		<label class="checkbox-inline">No  <input type="radio" class="Medicalcaseno" name="txtmedicalcase" id="txtmedicalcase" value="No"></label>              		           		
              	</div>             
              	<div class="col-md-4">
              		<label>Insurer:</label>
              		<select id="ddlInsurerlife" name="ddlInsurerlife" class="form-control" >
                    <option value="">--select---</option>
                    @foreach($lifeins as $val)
              			<option value="{{$val->LifeInsurerCompanyMasterId}}">{{$val->CompanyName}}</option>
                    @endforeach
              		</select>              		
              	</div>             	    	
              </div>
              </div>
              <div class="row">
              	<div class="col-md-4">
              		<label>Executive Name:</label>             
                  <select id="txtexecutivename" name="txtexecutivename" class="form-control" required>
                    <option value="">--select--</option >
                    @foreach($Executive as $val)
                    <option value="{{$val->UId}}">{{$val->EmployeeName}}</option>
                   @endforeach
                  </select>
              	</div>
              	<div class="col-md-4">
              		<label>Executive 1 Name:</label>              		
                  <select id="txtexecutivename1" name="txtexecutivename1" class="form-control" required>
                    <option value="">--select--</option>
                    @foreach($Executive1 as $val)
                    <option value="{{$val->UId}}">{{$val->EmployeeName}}</option>
                   @endforeach
                  </select>
              	</div>
              	<div class="col-md-4">
              		<label>Product Executive:</label>              		
                  <select id="txtexeProductname" name="txtexeProductname" class="form-control" required>
                    <option value="">--select--</option>
                    @foreach($productexe as $val)
                    <option value="{{$val->UId}}">{{$val->EmployeeName}}</option>
                   @endforeach
                  </select>
              	</div>
              	<div class="col-md-4">
              		<label>Product Manager:</label>              		
                  <select id="txtmgrProductname" name="txtmgrProductname" class="form-control" required>
                    <option value="">--select--</option>
                    @foreach($productmgr as $val)
                    <option value="{{$val->UId}}">{{$val->EmployeeName}}</option>
                   @endforeach
                  </select>
              	</div>              	
              </div>
              <br>                       
             <div class="row Motor" id="divMotor">              
             	<div class="col-md-4">
             		<label>RC Copy:</label>
             		<input type="file" name="filerc" id="filerc" class="form-control" accept=".png, .jpg, .jpeg .pdf">  
                <span><a id="spnrccopy" target="_blank"></a></span>                         		
             	</div>
             	<div class="col-md-4">
             		<label>Fitness:</label>
             		<input type="file" name="fileFitness" id="fileFitness" class="form-control" accept=".png, .jpg, .jpeg .pdf"> 
                <span><a id="spnfitness" target="_blank"></a></span>             		
             	</div>
             	<div class="col-md-4">
             		<label>PUC:</label>
             		<input type="file" name="filePUC" id="filePUC" class="form-control" accept=".png, .jpg, .jpeg .pdf">    
                 <span><a id="spnPUC" target="_blank"></a></span>         		
             	</div>
             	<div class="col-md-4">
             		<label>Break in Report:</label>
             		<input type="file" name="filebreakrp" id="filebreakrp" class="form-control" accept=".png, .jpg, .jpeg .pdf"> 
                 <span><a id="spnbreakrp" target="_blank"></a></span>           
             	</div>
              </div> 
               <div class="row"> 
             	<div class="col-md-4">
             		<label>Cheque / Online Payment Receipt Copy:</label>
             		<input type="file" name="fileCheque" id="fileCheque" class="form-control" accept=".png, .jpg, .jpeg .pdf"> 
                <span><a id="spnCheque" target="_blank"></a></span>           
             	</div>
             	<div class="col-md-4">
             		<label>Other:</label>
             		<input type="file" name="fileother" id="fileother" class="form-control" accept=".png, .jpg, .jpeg .pdf"> 
                <span ><a id="spnother" target="_blank"></a></span>
             	</div>  
              </div>                  
             <br>
             <div class="Proposal row" id="Health">                               
             	<div class="col-md-4">
             		<label>Proposal Form:</label>
             		<input type="file" name="fileProposalForm" id="fileProposalForm" class="form-control" accept=".png, .jpg, .jpeg .pdf">
                <span><a id="spnproposaform" target="_blank"></a></span>
             	</div>  
              <div class="col-md-4">
                <label>KYC:</label>
                <input type="file" name="fileKYC" id="fileKYC" class="form-control" accept=".png, .jpg, .jpeg .pdf">   
                <span><a id="spnKYC" target="_blank"></a></span>             
              </div>     	
             </div> 
             <br>                      
             </div>
             <br>
             <br>
             <div class="col-md-12" style="text-align: center;">
              <div id="btnsavediv">
                <button id="saveofflinecs" class="btn btn-primary" >Save</button>
                <input type="submit" name="save" class="btn btn-primary" value="Save & Send Email"> 
               </div>
               <div id="btnupdatediv">
                 <button id="btnupdate" class="btn btn-primary" >Update</button>
                 <input id="btnupdateandsendmail" type="submit" name="save" class="btn btn-primary" value="Update & Send Email">                 
               </div>             
             </div>            
            </form>            
        </div>
         </div>
      </div>
 </div>
 <script type="text/javascript">
$( document ).ready(function() {
      $("#life").hide();
     	$(".health").hide();
      $(".life").hide();
      $("#Health").hide();
     	$("#divlife").hide();
     	$("#divhealth").hide();
     	$(".Motor").show();
      $('#txtvehicalno').attr('required', true);
      $('#txtbreakin').attr('required', true);
      $('#ddlInsurermotor').attr('required', true);
      

if (window.location.href.indexOf('?id=') > 0) {
        var id = window.location.href.split('?id=')[1];  
         $("#txtofflinecsid").val(id);
         $("#btnsavediv").hide();
         $("#btnupdatediv").show();

        //alert(id)
    $.ajax({  
         type: "GET",  
         url:'offlinecsedit/'+id,
         success: function(offlinecsdt)
         {
           var data=  JSON.parse(offlinecsdt);
           $("#ddlwhyoffline").val(data[0].reason);
           $("#ddproduct").val(data[0].Product);
           pageview();
           $("#txtcstname").val(data[0].CustomerName);
           $("#txtadd").val(data[0].CustomerAddress);
           $("#ddlcity").val(data[0].City);
           getstate();
           $("#txtmobno").val(data[0].MobileNo);
           $("#txttelno").val(data[0].TelephoneNo);
           $("#txtemail").val(data[0].EmailId);
           $("#ddlfbaname").val(data[0].FBAID);
           $("#txterpid").val(data[0].ERPID);
           //getpospname();
           $("#txtpremiumamt").val(data[0].PremiumAmount);
           $("#txtqtno").val(data[0].QTNo);
           $("#txtexpdate").val(data[0].DateofExpiry);
           $("#ddlpayment").val(data[0].PaymentMode);
           $("#txtutrnomotor").val(data[0].UTRNo);
           $("#txtbankmotor").val(data[0].Bank);
           $("#txtvehicalno").val(data[0].VehicleNo);
           if(data[0].BreakIn=='YES')
           {
            $(".Breakinyes").attr('checked', 'checked');
           }
           else{
            $(".Breakinno").attr('checked', 'checked');
           }
           $("#ddlInsurermotor").val(data[0].Insurermotor);
           $("#txtexecutivename").val(data[0].ExecutiveName);
           $("#txtexecutivename1").val(data[0].ExecutiveName1);
           $("#txtexeProductname").val(data[0].ProductExecutive);
           $("#txtmgrProductname").val(data[0].ProductManager);
           $("#ddlInsurerlife").val(data[0].Insurerlife);
           $("#ddlnoofpolicy").val(data[0].TypeofPolicy);
           if(data[0].RCCopy!=0){
           $("#spnrccopy").append(data[0].RCCopy);
           $('#spnrccopy').attr('href','{{url('/upload/offlinecs')}}/'+data[0].RCCopy);
           }
           if(data[0].Fitness!=0){
           $("#spnfitness").append(data[0].Fitness);
           $('#spnfitness').attr('href','{{url('/upload/offlinecs')}}/'+data[0].Fitness);
           }
           if(data[0].PUC!=0){
           $("#spnPUC").append(data[0].PUC);
           $('#spnPUC').attr('href','{{url('/upload/offlinecs')}}/'+data[0].PUC);
           }
           if(data[0].BreakinReport!=0){
           $("#spnbreakrp").append(data[0].BreakinReport);
           $('#spnbreakrp').attr('href','{{url('/upload/offlinecs')}}/'+data[0].BreakinReport);
           }
           if(data[0].ChequeCopy!=0){
           $("#spnCheque").append(data[0].ChequeCopy);
           $('#spnCheque').attr('href','{{url('/upload/offlinecs')}}/'+data[0].ChequeCopy);
           }
           if(data[0].Other!=0){
           $("#spnother").append(data[0].Other);
           $('#spnother').attr('href','{{url('/upload/offlinecs')}}/'+data[0].Other);
           }
           if(data[0].ProposalForm!=0){
           $("#spnproposaform").append(data[0].ProposalForm);           
           $('#spnproposaform').attr('href','{{url('/upload/offlinecs')}}/'+data[0].ProposalForm);
           }
           if(data[0].KYC!=0){
           $("#spnKYC").append(data[0].KYC);
           $('#spnKYC').attr('href','{{url('/upload/offlinecs')}}/'+data[0].KYC);
           }
           if (data[0].Insurerhealth!=0){
           $("#ddlInsurerhealth").val(data[0].Insurerhealth);
           } 
           if (data[0].Preexisting=='YES') {
             $(".Preexistingyes").attr('checked', 'checked');
            }
             if (data[0].Preexisting=='NO'){
              $(".Preexistingno").attr('checked', 'checked');
            }
            if (data[0].MedicalReport=='YES'){
              $(".Medicalyes").attr('checked', 'checked');
            }
             if (data[0].MedicalReport=='NO') {
               $(".Medicalno").attr('checked', 'checked');
            }
             if (data[0].Medicalcase=='NO') {
               $(".Medicalcaseno").attr('checked', 'checked');
            } 
            if (data[0].Medicalcase=='YES') {
               $(".Medicalcaseyes").attr('checked', 'checked');
            } 
            $("#dllpremium").val(data[0].PremiumYears); 

            }

        });   
      } 
      else{
        $("#btnupdatediv").hide();
      }
});
 	function pageview(){
     if($("#ddproduct").val()==1){
     	$(".Motor").show();
     	$("#life").hide();
     	$("#Health").hide();
     	$("#divlife").hide();
     	$("#divhealth").hide();
      $(".health").hide();
      $(".life").hide();
      $('#txtvehicalno').attr('required', true);
      $('#txtbreakin').attr('required', true);
      $('#ddlInsurermotor').attr('required', true);      
     }
     else if($("#ddproduct").val()==2){
      $(".Motor").show();
      $("#life").hide();
      $("#Health").hide();
      $("#divlife").hide();
      $("#divhealth").hide();
      $(".health").hide();
      $(".life").hide();
      $('#txtvehicalno').attr('required', true);
      $('#txtbreakin').attr('required', true);
      $('#ddlInsurermotor').attr('required', true);      
     }
     else if($("#ddproduct").val()==3){
      $(".Motor").show();
      $("#life").hide();
      $("#Health").hide();
      $("#divlife").hide();
      $("#divhealth").hide();
      $(".health").hide();
      $(".life").hide();
      $('#txtvehicalno').attr('required', true);
      $('#txtbreakin').attr('required', true);
      $('#ddlInsurermotor').attr('required', true);
      
     }
     else if($("#ddproduct").val()==4){
     	$("#life").hide();
     	$("#Health").show();
     	$("#divlife").hide();
     	$("#divhealth").show();
      $(".Proposal").show();
     	$(".Motor").hide();
      $(".health").show();
      $(".life").hide();
      $('#ddlInsurerhealth').attr('required', true);
      $('#dllpremium').attr('required', true);      
      $('#txtvehicalno').removeAttr("required"); 
      $('#txtbreakin').removeAttr("required");
      $('#ddlInsurermotor').removeAttr("required");
      $('#filerc').removeAttr("required");
      $('#fileFitness').removeAttr("required");
      $('#filePUC').removeAttr("required");
      $('#filebreakrp').removeAttr("required");
     }
     else if($("#ddproduct").val()==5){
      $("#life").hide();
      $("#Health").show();
      $("#divlife").hide();
      $("#divhealth").show();
      $(".Proposal").show();
      $(".Motor").hide();
      $(".health").show();
      $(".life").hide();
      $('#ddlInsurerhealth').attr('required', true);
      $('#dllpremium').attr('required', true);      
      $('#txtvehicalno').removeAttr("required"); 
      $('#txtbreakin').removeAttr("required");
      $('#ddlInsurermotor').removeAttr("required");
      $('#filerc').removeAttr("required");
      $('#fileFitness').removeAttr("required");
      $('#filePUC').removeAttr("required");
      $('#filebreakrp').removeAttr("required");
     }
     else if($("#ddproduct").val()==6){   	
      $("#life").show();
     	$("#Health").hide();
     	$("#divlife").show();
      $(".Proposal").show();
     	$("#divhealth").hide();
     	$(".Motor").hide();
      $(".health").hide();
      $(".life").show();
      $('#ddlnoofpolicy').attr('required', true);
      $('#ddlInsurerlife').attr('required', true);      
      $('#txtvehicalno').removeAttr("required"); 
      $('#txtbreakin').removeAttr("required");
      $('#ddlInsurermotor').removeAttr("required");
      $('#filerc').removeAttr("required");
      $('#fileFitness').removeAttr("required");
      $('#filePUC').removeAttr("required"); 
      $('#filebreakrp').removeAttr("required");
      $('#dllpremium').removeAttr("required");
      
     }
     else{
     	$("#life").hide();
     	$("#Health").hide();
     	$("#divlife").hide();
     	$("#divhealth").hide();
     	$(".Motor").show();
      $('#txtvehicalno').attr('required', true);
      $('#txtbreakin').attr('required', true);
      $('#ddlInsurermotor').attr('required', true);
      
     }
     }
function getpospname()
{
  var fbaid=$("#ddlfbaname").val();  
   $.ajax({
             url: 'get_ERPID_offlinecs/'+fbaid,
             type: "GET",             
             success:function(data) 
             {      
              var erpid=  JSON.parse(data);              
               $("#txterpid").val(erpid[0].ERPID);
               $("#txtexecutivename").val(erpid[0].fieldmanageruid);
               $("#txtexecutivename1").val(erpid[0].rrmuid);
             }
         });
}
$(".txtonly").keypress(function (e) {
    if (String.fromCharCode(e.keyCode).match(/[^ a-zA-Z]/g)) return false;
});

$(".Vehicleno").keypress(function (e) {
    if (String.fromCharCode(e.keyCode).match(/[^0-9a-zA-Z]/g)) return false;
});

$("#saveofflinecs" ).click(function() {
  $("#frmofflinecs").attr('action', '{{url('saveofflinecs')}}'); 
});
$("#btnupdate" ).click(function() {
  $("#frmofflinecs").attr('action', '{{url('offlinecsupdate')}}');
});
$("#btnupdateandsendmail" ).click(function() {
  $("#frmofflinecs").attr('action', '{{url('offlinecsupdateandsendmail')}}');
});

function getstate()
{
  var cityid=$("#ddlcity").val();
   $.ajax({
             url: 'get_state_offlinecs/'+cityid,
             type: "GET",             
             success:function(data) 
             {
              //alert(data);
              var state=  JSON.parse(data);
              $('#ddlstate').empty();  
              $('#ddlzone').empty();
              $('#ddlregion').empty();                       
              $('#ddlstate').append('<option value="'+ state[0].state_id +'">'+ state[0].state_name +'</option>');
              $('#ddlzone').append('<option value="'+ state[0].state_id +'">'+ state[0].zone +'</option>');
              $('#ddlregion').append('<option value="'+ state[0].state_id +'">'+ state[0].region +'</option>');           
             }
         });
}



</script>
@endsection