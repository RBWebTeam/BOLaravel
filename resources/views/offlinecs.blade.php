@extends('include.master')
@section('content')
<div class="container-fluid white-bg">
  <div class="col-md-12"><h3 class="mrg-btm">Offline Cs</h3></div>
      <div class="col-md-12">
         <div class="overflow-scroll">
         	<div class="container">
         	<form id="frmofflinecs" method="post" enctype="multipart/form-data">
            {{ csrf_field() }}
         		<label>Product:</label>
                 <select class="form-control" id="ddproduct" name="ddproduct" style="width: 30%">
                 	<option value="1">Motor</option>
                  <option value="1">Two Wheeler</option> 
                  <option value="1">Commercial Vehicle</option>                 	
                 	<option value="2">Health</option>
                  <option value="2">Top UP</option>                 	
                 	<option value="3">Life</option>
                 </select>             
              <br>
              <div class="row">
                 <div class="col-md-4">
                 	<label>Name of Customer:</label><input id="txtcstname" name="txtcstname" type="text" class="form-control" placeholder="Name of Customer">                    
                 </div>
                 <div class="col-md-4">
                 	<label>Address of Customer :</label><textarea id="txtadd" name="txtadd" class="form-control" placeholder="Address of Customer"></textarea>            
                </div>
                <div class="col-md-4">
                	<label>City:</label>
                	<select class="form-control" id="ddlcity" name="ddlcity">
                		<option>--select--</option>
                    @foreach($city as $val)
                    <option value="{{$val->city_id}}">{{$val->cityname}}</option>
                    @endforeach
                	</select>
                </div>
              </div>
              <div class="row">
                 <div class="col-md-4">
                 	<label>State</label>
                 	<select id="ddlstate" name="ddlstate" class="form-control">
                 		<option>--select--</option>
                 	</select>                  
                 </div>
                 <div class="col-md-4">
                 	<label>Zone</label>
                 	<select id="ddlzone" name="ddlzone" class="form-control">
                 		<option>--select--</option>
                 	</select>
                </div>
                <div class="col-md-4">
                	<label>Region:</label>
                	<select class="form-control" id="ddlregion" name="ddlregion">
                		<option>--select--</option>
                	</select>
                </div>
              </div>
              <div class="row">
              	<div class="col-md-4">
              		<label>Mobile no:</label>
              		<input type="number" class="form-control" name="txtmobno" id="txtmobno">           		
              	</div>
              	<div class="col-md-4">
              		<label>Telephone No:</label>
              		<input type="number" class="form-control" name="txttelno" id="txttelno">           		
              	</div>
              	<div class="col-md-4">
              		<label>Email Id:</label>
              		<input type="Email" class="form-control" name="txtemail" id="txtemail">           		
              	</div>
              </div>
              <div class="row">
              	<div class="col-md-4">
              		<label>FBA Name:</label>
              		<select class="form-control" id="ddlfbaname">
                    <option>--Select--</option>
                    @foreach($fba as $val)
              			<option value="{{$val->FBAID}}">{{$val->FullName}}-{{$val->FBAID}}</option>
                    @endforeach
              		</select>           		
              	</div>
                <div class="col-md-4">
                  <label>Posp Status:</label>
                  <label class="checkbox-inline">YES  <input type="radio" name="txtposp" id="txtposp"></label>
                  <label class="checkbox-inline">No  <input type="radio" name="txtposp" id="txtposp"></label>                               
                </div>
                <div class="col-md-4">
                  <label>Premium Amount:</label>
                  <input type="number " class="form-control" name="txtpremiumamt" id="txtpremiumamt">         
                </div>
              	<div class="col-md-4">
              		<label>ERP ID:</label>
              		<input type="text" class="form-control" name="txterpid" id="txterpid">           		
              	</div>

              	<div class="col-md-4">
              		<label>QT No:</label>
              		<input type="text" class="form-control" name="txtqtno" id="txtqtno">           		
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
              		<label>Date of Expiry:</label>
              		<input type="Date" class="form-control" name="txtexpdate" id="txtexpdate">        		
              	</div>
              	<div class="col-md-2">
              		<label>Break In:</label>
              		<label class="checkbox-inline">YES  <input type="radio" name="txtbreakin" id="txtbreakin"></label>
              		<label class="checkbox-inline">No  <input type="radio" name="txtbreakin" id="txtbreakin"></label>              		           		
              	</div>
              </div>
              <div class="row">
              	<div class="col-md-4">
              		<label>Insurer:</label>
              		<select id="ddlInsurer" class="form-control">
              			<option>--select---</option>
              			@foreach ($Genins as $val)
              			<option value="{{$val->GeneralInsuranceCompanyMasterId}}">{{$val->CompanyName}}</option>
              			@endforeach
              		</select>             		
              	</div>   
              	<div class="col-md-4">
              		<label>Payment Mode:</label>
              		<select id="ddlpayment" name="ddlpayment" class="form-control">
              			<option>--select--</option>
              			<option value="Online">Online</option>
              			<option value="Offline">Offline</option>
              		</select>
              	</div>
              	<div class="col-md-4">
              		<label>UTR No / Cheque No:</label>
              		<input type="text" name="txtutrno" class="form-control" id="txtutrno">
              	</div> 
              	<div class="col-md-4">
              		<label>Bank:</label>
              		<input type="text" name="txtbank" id="txtbank" class="form-control">
              	</div>      	
              </div>
              </div>           
             <div id="divhealth">           
             <div class="row">
             	<div class="col-md-4">
              		<label>Insurer:</label>
              		<select id="ddlInsurer" class="form-control">
                    <option>--select---</option>
                    @foreach($health as $val)
              			<option value="{{$val->id}}">{{$val->companyname}}</option>
                    @endforeach
              		</select>              		
              	</div> 
              	<div class="col-md-4">
              		<label>Payment Mode:</label>
              		<select id="ddlpayment" class="form-control">
              			<option>--select--</option>
              			<option value="Online">Online</option>
              			<option value="Offline">Offline</option>
              		</select>
              	</div>
              	<div class="col-md-4">
              		<label>UTR No / Cheque No:</label>
              		<input type="text" name="txtutrno" class="form-control" id="txtutrno">
              	</div>
              	<div class="col-md-4">
              		<label>Bank:</label>
              		<input type="text" name="txtbank" id="txtbank" class="form-control">
              	</div>
              	<div class="col-md-4">
              		<label>Preexisting:</label>
              		<label class="checkbox-inline">YES  <input type="radio" name="txtPreexisting" id="txtPreexisting"></label>
              		<label class="checkbox-inline">No  <input type="radio" name="txtPreexisting" id="txtPreexisting"></label>             		           		
              	</div>   
              	<div class="col-md-4">
              		<label>Medical Report:</label>
              		<label class="checkbox-inline">YES  <input type="radio" name="txtmedicalrp" id="txtmedicalrp"></label>
              		<label class="checkbox-inline">No  <input type="radio" name="txtmedicalrp" id="txtmedicalrp"></label>             		           		
              	</div> 
              	</div> 
              	<div class="row">  
              	<div class="col-md-4">
              		<label>Premium for 1 / 2 / 3 Year/s:</label>
              		<select id="dllpremium" name="dllpremium" class="form-control">
              			<option>--select--</option>
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
             		<select id="ddlnoofpolicy" name="ddlnoofpolicy" class="form-control">
             			<option>--select--</option>
             			<option value="Term">Term</option>
             			<option value="Other">Other</option>
             		</select>
             	</div>
             	<div class="col-md-4">
             		<label>Date of Expiry:</label>
             		<input type="Date" name="txtexpdate" id="txtexpdate" class="form-control">
             	</div>
             	<div class="col-md-4">
              		<label>Medical case:</label>
              		<label class="checkbox-inline">YES  <input type="radio" name="txtmedicalcase" id="txtmedicalcase"></label>
              		<label class="checkbox-inline">No  <input type="radio" name="txtmedicalcase" id="txtmedicalcase"></label>              		           		
              	</div> 
              </div>
              <div class="row">
              	<div class="col-md-4">
              		<label>Insurer:</label>
              		<select id="ddlInsurer" class="form-control">
                    <option>--select---</option>
                    @foreach($lifeins as $val)
              			<option value="{{$val->LifeInsurerCompanyMasterId}}">{{$val->CompanyName}}</option>
                    @endforeach
              		</select>              		
              	</div>   
              	<div class="col-md-4">
              		<label>Payment Mode:</label>
              		<select id="ddlpayment" class="form-control">
              			<option>--select--</option>
              			<option value="Online">Online</option>
              			<option value="Offline">Offline</option>
              		</select>
              	</div>
              	<div class="col-md-4">
              		<label>UTR No / Cheque No</label>
              		<input type="text" name="txtutrno" class="form-control" id="txtutrno">
              	</div>  
              	<div class="col-md-4">
              		<label>Bank:</label>
              		<input type="text" name="txtbank" id="txtbank" class="form-control">
              	</div>      	
              </div>
              </div>
              <div class="row">
              	<div class="col-md-4">
              		<label>Executive Name:</label>
              		<input type="text" name="txtexecutivename" id="txtexecutivename" class="form-control">
              	</div>
              	<div class="col-md-4">
              		<label>Executive 1 Name:</label>
              		<input type="text" name="txtexecutivename1" id="txtexecutivename1" class="form-control">
              	</div>
              	<div class="col-md-4">
              		<label>Product Executive:</label>
              		<input type="text" name="txtexeProductname" id="txtexeProductname" class="form-control">
              	</div>
              	<div class="col-md-4">
              		<label>Product Manager:</label>
              		<input type="text" name="txtmgrProductname" id="txtmgrProductname" class="form-control">
              	</div>              	
              </div>
              <br>
             <!--  <div class="row">
              	<div class="col-md-3">
              		<label>Accepted by</label>
              	</div>
              	<div class="col-md-3">
              		<label>Accepted Date</label>
              	</div>
              	<div class="col-md-3">
              		<label>Accepted Time</label>
              	</div>
              	<div class="col-md-3">
              		<label>Mobile No</label>
              	</div>              	
              </div>  -->
                 
             <div class="row Motor" id="divMotor">          
             	<div class="col-md-4">
             		<label>RC Copy:</label>
             		<input type="file" name="filerc" id="filerc" class="form-control">             		
             	</div>
             	<div class="col-md-4">
             		<label>Fitness:</label>
             		<input type="file" name="fileFitness" id="fileFitness" class="form-control">             		
             	</div>
             	<div class="col-md-4">
             		<label>PUC:</label>
             		<input type="file" name="filePUC" id="filePUC" class="form-control">             		
             	</div>
             	<div class="col-md-4">
             		<label>Break in Report:</label>
             		<input type="file" name="filebreakrp" id="filebreakrp" class="form-control">            
             	</div>
             	<div class="col-md-4">
             		<label>Cheque Copy:</label>
             		<input type="file" name="fileCheque" id="fileCheque" class="form-control">            
             	</div>
             	<div class="col-md-4">
             		<label>Other:</label>
             		<input type="file" name="fileother" id="fileother" class="form-control"> 
             	</div>
             </div> 
             <br>
             <div class="row" id="Health">            	              
             	<div class="col-md-4">
             		<label>Proposal Form:</label>
             		<input type="file" name="fileProposalForm" id="fileProposalForm" class="form-control">
             	</div>
             	<div class="col-md-4">
             		<label>KYC:</label>
             		<input type="file" name="fileKYC" id="fileKYC" class="form-control">             		
             	</div>
             	<div class="col-md-4">
             		<label>Cheque Copy:</label>
             		<input type="file" name="fileCheque" id="fileCheque" class="form-control">             	
             	</div>
             	<div class="col-md-4">
             		<label>Other:</label>
             		<input type="file" name="fileother" id="fileother" class="form-control">             	
             	</div>            	
             </div> 
             <br>
             <div class="row" id="life">     	
             	<div class="col-md-4">
             		<label>Proposal Form:</label>
             		<input type="file" name="fileProposalForm" id="fileProposalForm" class="form-control">
             	</div>
             	<div class="col-md-4">
             		<label>KYC Documents:</label>
             		<input type="file" name="fileKYC" id="fileKYC" class="form-control">             		
             	</div>
             	<div class="col-md-4">
             		<label>Cheque Copy:</label>
             		<input type="file" name="fileCheque" id="fileCheque" class="form-control">             		
             	</div>
             	<div class="col-md-4">
             		<label>Other:</label>
             		<input type="file" name="fileother" id="fileother" class="form-control">         		
             	</div>             	
             </div>           
             </div>
            </form>
            <dir class="col-md-12" style="text-align: center;">
            	<button id="btnsaveofflinecs" class="btn btn-primary" >SAVE</button>
            	<button class="btn btn-primary" >RESET</button>
            </dir>
        </div>
         </div>
      </div>
 </div>
 <script type="text/javascript">
$( document ).ready(function() {
      $("#life").hide();
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
     }
     else if($("#ddproduct").val()==2){
     	$("#life").hide();
     	$("#Health").show();
     	$("#divlife").hide();
     	$("#divhealth").show();
     	$(".Motor").hide();
     }
     else if($("#ddproduct").val()==3){   	
        $("#life").show();
     	$("#Health").hide();
     	$("#divlife").show();
     	$("#divhealth").hide();
     	$(".Motor").hide();

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
              $('#ddlstate').append('<option value="'+ state[0].state_id +'">'+ state[0].state_name +'</option>');
              $('#ddlzone').append('<option value="'+ state[0].state_id +'">'+ state[0].zone +'</option>');
            
             }
         });
});
$('#btnsaveofflinecs').click(function() {

       data1=new FormData($("#filerc"));
       data1=new FormData($("#fileFitness"));
       data1=new FormData($("#filePUC"));
       data1=new FormData($("#filebreakrp"));
       data1=new FormData($("#fileCheque"));
       data1=new FormData($("#fileother"));
       data1=new FormData($("#fileProposalForm"));
       data1=new FormData($("#fileKYC"));      
       console.log($('#frmofflinecs').serialize());
       $.ajax({ 
       url: "{{URL::to('offlinecs')}}",
       method:"POST",
       data: $('#frmofflinecs').serialize(),
       dataType:'json',
       async:false,
       type:'POST',
       processData: false,
       contentType: false,
       success: function(msg)  
        {
        console.log(msg);
        alert("Record has been saved successfully");
        $("#frmofflinecs").trigger('reset');
        }
 });

 });
 </script>
@endsection