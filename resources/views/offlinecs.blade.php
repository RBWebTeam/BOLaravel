@extends('include.master')
@section('content')

<div class="container-fluid white-bg">
  <div class="col-md-12"><h3 class="mrg-btm">Offline Cs</h3></div>
      <div class="col-md-12">
         <div class="overflow-scroll">
         	<div class="container">
         	<form  id="frmofflinecs" method="post" enctype="multipart/form-data" action="{{url('offlinecs')}}">
              {{ csrf_field() }}
              <div class="row col-md-12" style="padding-left: 0px;">
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
                  <select class="form-control" id="ddproduct" name="ddproduct">
                  @foreach($product as $val)
                 	<option value="{{$val->id}}">{{$val->product_name}}</option>
                  @endforeach
                  <!-- <option value="1">Two Wheeler</option> 
                  <option value="1">Commercial Vehicle</option>                 	
                 	<option value="2">Health</option>
                  <option value="2">Top UP</option>                 	
                 	<option value="3">Life</option> -->
                 </select>  
                 </div>
              </div>           
              <br>
              <div class="row">
                 <div class="col-md-4">
                 	<label>Name of Customer:</label><input id="txtcstname" name="txtcstname" type="text" class="form-control" placeholder="Name of Customer" required>                    
                 </div>
                 <div class="col-md-4">
                 	<label>Address of Customer :</label><textarea id="txtadd" name="txtadd" class="form-control" placeholder="Address of Customer" required></textarea>            
                </div>
                <div class="col-md-4">
                	<label>City:</label>
                	<select class="form-control" id="ddlcity" name="ddlcity" required>
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
                   <input type="number" id="txtmobno" name="txtmobno" class="form-control" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" type = "number" maxlength = "10"  required>             
                </div>
                <div class="col-md-4">
                  <label>Telephone No:</label>
                  <input type="number" class="form-control" name="txttelno" id="txttelno">              
                </div>             	
              	<div class="col-md-4">
              		<label>Email Id:</label>
              		<input type="Email" class="form-control" name="txtemail" id="txtemail" required>           		
              	</div>
               	<div class="col-md-4">
              		<label>Posp Name:</label>
              		<select class="form-control" id="ddlfbaname" name="ddlfbaname" required>
                    <option value="0">--Select--</option>
                    @foreach($fba as $val)
              			<option value="{{$val->FBAID}}">{{$val->POSPName}} ({{$val->FBAID}})</option>
                    @endforeach
              		</select>           		
              	</div>
                <div class="col-md-4">
                  <label>Premium Amount:</label>
                <input type="number" class="form-control" name="txtpremiumamt" id="txtpremiumamt" required>        
                </div>
              	<div class="col-md-4">
              		<label>ERP ID:</label>
              		<input type="text" class="form-control" name="txterpid" id="txterpid" readonly>           		
              	</div>

              	<div class="col-md-4">
              		<label>QT No:</label>
              		<input type="text" class="form-control" name="txtqtno" id="txtqtno" required>           		
              	</div>
                <div class="col-md-4">
                  <label>Date of Expiry:</label>
                  <input type="Date" class="form-control" name="txtexpdate" id="txtexpdate" required>            
                </div>
                <div class="col-md-4">
                  <label>Payment Mode:</label>
                  <select id="ddlpayment" name="ddlpayment" class="form-control" required>
                    <option>--select--</option>
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
              		<input type="text" name="txtvehicalno" id="txtvehicalno" class="form-control">     		
              	</div>              	
              	<div class="col-md-4">
              		<label>Break In:</label>
              		<label class="checkbox-inline">YES  <input type="radio" name="txtbreakin" id="txtbreakin" value="1"></label>
              		<label class="checkbox-inline">No  <input type="radio" name="txtbreakin" id="txtbreakin" value="0"></label>              		           		
              	</div>              
              	<div class="col-md-4">
              		<label>Insurer:</label>
              		<select id="ddlInsurermotor" name="ddlInsurermotor" class="form-control" >
              			<option value="0">--select---</option>
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
                    <option value="0">--select---</option>
                    @foreach($health as $val)
              			<option value="{{$val->id}}">{{$val->companyname}}</option>
                    @endforeach
              		</select>              		
              	</div>         	
              	<div class="col-md-4">
              		<label>Preexisting:</label>
              		<label class="checkbox-inline">YES  <input type="radio" name="txtPreexisting" id="txtPreexisting" value="1" ></label>
              		<label class="checkbox-inline">No  <input type="radio" name="txtPreexisting" id="txtPreexisting" value="1"></label>             		           		
              	</div>   
              	<div class="col-md-4">
              		<label>Medical Report:</label>
              		<label class="checkbox-inline">YES  <input type="radio" name="txtmedicalrp" id="txtmedicalrp" value="1"></label>
              		<label class="checkbox-inline">No  <input type="radio" name="txtmedicalrp" id="txtmedicalrp" value="0"></label>             		           		
              	</div> 
              	</div> 
              	<div class="row">  
              	<div class="col-md-4">
              		<label>Premium Year/s:</label>
              		<select id="dllpremium" name="dllpremium" class="form-control" >
              			<option value="0">--select--</option>
              			<option value="1">1 year</option>
              			<option value="2">2 year</option>
              			<option value="3">3 year</option>
              		</select>
              	</div>             	
               </div>
               </div>          
             <div id="divlife">
             <div class="row">
             	<div class="col-md-4">
             		<label>Type of Policy:</label>
             		<select id="ddlnoofpolicy" name="ddlnoofpolicy" class="form-control" >
             			<option>--select--</option>
             			<option value="Term">Term</option>
             			<option value="Other">Other</option>
             		</select>
             	</div>             
             	<div class="col-md-4">
              		<label>Medical case:</label>
              		<label class="checkbox-inline">YES  <input type="radio" name="txtmedicalcase" id="txtmedicalcase" value="1"></label>
              		<label class="checkbox-inline">No  <input type="radio" name="txtmedicalcase" id="txtmedicalcase" value="0"></label>              		           		
              	</div>             
              	<div class="col-md-4">
              		<label>Insurer:</label>
              		<select id="ddlInsurerlife" name="ddlInsurerlife" class="form-control" >
                    <option value="0">--select---</option>
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
                  <select id="txtexecutivename" name="txtexecutivename" class="form-control" >
                    <option value="0">--select--</option >
                    @foreach($Executive as $val)
                    <option value="{{$val->UId}}">{{$val->EmployeeName}}</option>
                   @endforeach
                  </select>
              	</div>
              	<div class="col-md-4">
              		<label>Executive 1 Name:</label>              		
                  <select id="txtexecutivename1" name="txtexecutivename1" class="form-control">
                    <option>--select--</option>
                    @foreach($Executive1 as $val)
                    <option value="{{$val->UId}}">{{$val->EmployeeName}}</option>
                   @endforeach
                  </select>
              	</div>
              	<div class="col-md-4">
              		<label>Product Executive:</label>              		
                  <select id="txtexeProductname" name="txtexeProductname" class="form-control">
                    <option>--select--</option>
                    @foreach($productexe as $val)
                    <option value="{{$val->UId}}">{{$val->EmployeeName}}</option>
                   @endforeach
                  </select>
              	</div>
              	<div class="col-md-4">
              		<label>Product Manager:</label>              		
                  <select id="txtmgrProductname" name="txtmgrProductname" class="form-control">
                    <option>--select--</option>
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
             	</div>
             	<div class="col-md-4">
             		<label>Fitness:</label>
             		<input type="file" name="fileFitness" id="fileFitness" class="form-control" accept=".png, .jpg, .jpeg .pdf">             		
             	</div>
             	<div class="col-md-4">
             		<label>PUC:</label>
             		<input type="file" name="filePUC" id="filePUC" class="form-control" accept=".png, .jpg, .jpeg .pdf">             		
             	</div>
             	<div class="col-md-4">
             		<label>Break in Report:</label>
             		<input type="file" name="filebreakrp" id="filebreakrp" class="form-control" accept=".png, .jpg, .jpeg .pdf">            
             	</div>
              </div> 
               <div class="row"> 
             	<div class="col-md-4">
             		<label>Cheque Copy:</label>
             		<input type="file" name="fileCheque" id="fileCheque" class="form-control" accept=".png, .jpg, .jpeg .pdf">            
             	</div>
             	<div class="col-md-4">
             		<label>Other:</label>
             		<input type="file" name="fileother" id="fileother" class="form-control" accept=".png, .jpg, .jpeg .pdf"> 
             	</div>  
              </div>                  
             <br>
             <div class="Proposal row" id="Health">                               
             	<div class="col-md-4">
             		<label>Proposal Form:</label>
             		<input type="file" name="fileProposalForm" id="fileProposalForm" class="form-control" accept=".png, .jpg, .jpeg .pdf">
             	</div>  
              <div class="col-md-4">
                <label>KYC:</label>
                <input type="file" name="fileKYC" id="fileKYC" class="form-control" accept=".png, .jpg, .jpeg .pdf">                
              </div>     	
             </div> 
             <br>                      
             </div>
             <br>
             <br>
             <div class="col-md-12" style="text-align: center;">
               <input type="submit" name="save" class="btn btn-primary">
               <button class="btn btn-primary" >RESET</button>
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
});
 	$("#ddproduct").change(function(){
     if($("#ddproduct").val()==1){
     	$(".Motor").show();
     	$("#life").hide();
     	$("#Health").hide();
     	$("#divlife").hide();
     	$("#divhealth").hide();
      $(".health").hide();
      $(".life").hide();
     }
     else if($("#ddproduct").val()==2){
      $(".Motor").show();
      $("#life").hide();
      $("#Health").hide();
      $("#divlife").hide();
      $("#divhealth").hide();
      $(".health").hide();
      $(".life").hide();
     }
     else if($("#ddproduct").val()==3){
      $(".Motor").show();
      $("#life").hide();
      $("#Health").hide();
      $("#divlife").hide();
      $("#divhealth").hide();
      $(".health").hide();
      $(".life").hide();
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

     }
     else{
     	$("#life").hide();
     	$("#Health").hide();
     	$("#divlife").hide();
     	$("#divhealth").hide();
     	$(".Motor").show();
     }
     });

$("#ddlcity").change(function(){
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
});

$("#ddlfbaname").change(function(){
  var fbaid=$("#ddlfbaname").val();
  //alert(fbaid)
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
});
</script>
@endsection