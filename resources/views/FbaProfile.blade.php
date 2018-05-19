@extends('include.master')
@section('content')
<style type="text/css">
	.fbadiv,.divupdate,.isdivcompany,.divworklic,.divlicins,.divgenco,.divstandalone,.divotherfinpro,.divothloan,.divremark{
    border: 1px solid gray;
    padding: 10px;
    margin: 10px;
}
</style>
<div class="container-fluid white-bg">
<div class="col-md-12"><h3 class="mrg-btm">FBA Profile</h3></div>
   <div class="col-md-12">
      <div class="overflow-scroll">
      	<form id="fbaprofile" method="post">
          {{ csrf_field() }}
       <div class="fbadiv form-group">
        @foreach ($fbadetails as $val)
       	<table class="table">          
       	 <tr> 
          <input type="hidden" name="txtfbaid" id="txtfbaid" value="{{$val->FBAID}}">
          <td><label>FBA ID: </label>{{$val->FBAID}}</td>         
       	  <td><label>FBA Name:</label>{{$val->FullName}}</td>          
       	  <td><label>Date of Registration:</label>{{$val->JoinDate}}</td>          
       	  <td><label>City:</label>{{$val->City}}</td>          
       	  <td><label>State:</label>{{$val->State}}</td>          
       	  <td><label>RRM:</label></td>
       	  <td><label>Field Manger:</label></td>
       	</tr>
       	</table>
         @endforeach
       	<hr>
       </div>
       <div class="divupdate form-group">
       	<label>Update History</label>
        @foreach ($fbaupdate as $val)
        <table class="table">
       		<tr>
       			<td><label>Last Updated By:</label>{{$val->LogiName}}</td>
       			<td><label>Last Update Date:</label>{{$val->updateddate}}</td>
       			<td><label>Last Update Time:</label>{{$val->updateddate}}</td>
       			<td><label>Remarks:</label>{{$val->remark}}</td>
       		</tr>
       	</table>
       @endforeach
       	<hr>
       </div>
       <div class="isdivcompany form-group">
       <div>
       	<table>
       		<tr>
       		 <td width="30%;">
       	      <label>If a company</label>
       	     </td>
       	     <td width="20%;">
       	      <label>
       	      <input id="iscompany" type="radio" name="iscompany" value="1" checked>&nbsp;YES</label>
       	     </td>
       	     <td width="20%;">
       	      <label><input id="" type="radio" name="iscompany" value="0">&nbsp;NO</label>
       	     </td>     	     
       	    </tr>
       	</table>
       </div>
       <div  id="divcompany" style="display:none">
       	<table class="table">
       		<tr>
       			<td><label>Business Name:</label></td>
       			<td><input type="text" id="txtbusinesstype" name="txtbusinesstype" class="form-control" required></td>
       			<td><label>Office Address:</label></td>
       			<td><input type="text" id="txtofficeadd" name="txtofficeadd" class="form-control" required></td>
       			<td><label>Staff Strength:</label></td>
       			<td><input type="number" id="txtstaff" name="txtstaff" class="form-control" required></td>
       		</tr>
       	</table>
       	<hr>
        </div>
        </div>
        <div class="form-group divworklic">
        <div>
        	<label>Profile</label>
        	<hr>
        	<table>
        		<tr>
        			<td width="30%;"><label>Works with LIC</label></td>
        			<td width="20%;">
       	              <label><input type="radio" name="isWorksLIC" id="isWorksLIC" value="1" checked>&nbsp;YES</label>
       	            </td>
       	            <td width="20%;">
       	             <label><input type="radio" name="isWorksLIC" value="0">&nbsp;NO</label>
       	            </td>  
        		</tr>
        	</table>
        </div>
        <div  id="divprofile" style="display: none;">
        	<table class="table">
        		<tr>
        			<td><label>No of Policies Sold per month:</label></td>
        			<td><input type="number" id="txtnoofpolicy" name="txtnoofpolicy" class="form-control" required></td>
        			<td><label>Premium collected per month:</label></td>
        			<td><input type="number" id="txtpremium" name="txtpremium" class="form-control" required></td>
        			<td><label>Base of LIC Customers:</label></td>
        			<td><input type="number" id="txtliccustomer" name="txtliccustomer" class="form-control" required></td>
        		</tr>
        		<tr>
        			<td><label>Preferred LIC products:</label></td>
        			<td><input type="text" id="txtlicproduct" name="txtlicproduct" class="form-control" required></td>
        			<td><label>LIC Club Memberships:</label></td>
        			<td><input type="text" id="txtlicclub" name="txtlicclub" class="form-control" required></td>
        		</tr>
        	</table>
        </div>
        </div>
        <div class="form-group divlicins">
        	<table class="table">
        		<tr>
        			<td width="30%;"><label>Works with Private Life Insurers:</label></td>
        			 <td width="20%;">
       	              <label><input type="radio" id="isWorksLICins" name="isWorksLICins" value="1" checked>&nbsp;YES</label>
       	            </td>
       	             <td width="20%;">
       	             <label><input type="radio" name="isWorksLICins" value="0">&nbsp;NO</label>
       	             </td>
        		</tr>
            <div>
        		<tr id="divprivate">
        			<td><label>Private Life Co's:</label></td>
        			<td><select multiple class="form-control ddlprivetlifeco" id="sel2" name="ddlprivetlifeco">
        				 @foreach($lifeins as $val)
                         <option value="{{$val->LifeInsurerCompanyMasterId}}">{{$val->CompanyName}}</option>
                          @endforeach
                        </select>
        			</td>
        		</tr>
            </div>
        	</table>
            </div>
        <div class="form-group divgenco">
        <table class="table">
        	<tr>
        		<td style="width: 30%"><label>Works with General Ins Co's:</label></td>
        		<td style="width: 20%"> 
       	              <label><input id="isWorksGeneralins" type="radio" name="isWorksGeneralins" value="2" checked>&nbsp;YES</label>
       	        </td>
       	        <td style="width: 20%">
       	             <label><input type="radio" name="isWorksGeneralins" value="0">&nbsp;NO</label>
       	        </td>
       	    </tr>
       	    <tr id="divgenins">
        			<td><label>General Insurance Co's:</label></td>
        			<td><select id="ddlgenins" name="ddlgenins" multiple class="form-control ddlgenins" id="sel2">
        				@foreach($Genins as $val)
        				 <option value="{{$val->GeneralInsuranceCompanyMasterId}}">{{$val->CompanyName}}</option>
                          @endforeach
                        </select>
        			</td>
        	</tr>
        </table>
        </div>
        <div class="form-group divstandalone">
        <table class="table">
        	<tr>
        		<td style="width: 30%"><label>Works with Stand Alone Health Ins Co's:</label></td>
        		<td style="width: 20%">
       	              <label><input type="radio" id="isWorksStandAlone" name="isWorksStandAlone" value="3" checked>&nbsp;YES</label>
       	        </td>
       	        <td style="width: 20%">
       	             <label><input type="radio" name="isWorksStandAlone" value="0">&nbsp;NO</label>
       	        </td>
       	    </tr>
       	    <tr id="divhealth">
        			<td><label>Stand Alone Health Insurance Co's:</label></td>        			
        			<td><select name="ddlhealth" id="ddlhealth" multiple class="form-control ddlhealth">
        				  @foreach($healthins as $val)
        				  <option value="{{$val->HealthInsuranceCompanyMasterId}}">{{$val->CompanyName}}</option>
                          @endforeach
                        </select>
        			</td>
        		</tr>
        </table>
        </div>
        <div class="form-inline form-group divotherfinpro">
        	<table class="table">
        		<tr>
        			<label>Other Financial Products Distributed:</label>
                </tr>
                <tr>
        	       <label>LOAN</label>
        	        <td><label class="radio-inline"><input type="checkbox"  id="txthl" name="txthl" value="1">&nbsp;HL</label></td>
                    <td><label class="radio-inline"><input type="checkbox" id="txtpl" name="txtpl" value="1">&nbsp;PL</label></td>
                   <td><label class="radio-inline"><input type="checkbox" id="txtlap" name="txtlap" value="1">&nbsp;LAP</label></td>
                   <td><label class="radio-inline"><input type="checkbox" id="txtbl" name="txtbl" value="1">&nbsp;Business Loan</label></td>
                   <td><label class="radio-inline"><input id="txtloan" type="radio" name="txtloan" value="1">Others</label></td>
                     <td id="divloan" style="display: none;" ><input type="text" name="txtotherloan" placeholder="Please Specify" class="form-control" id="txtotherloan" required></td>
               </tr>
           </table>
        </div>
        <div class="form-inline form-group divothloan">
        	<table class="table">
                <tr style="width: 30%;">
        	        <label>Other</label>
        	    <td style="width: 20%;">
        	    	<label class="radio-inline"><input type="checkbox" id="txtMutualfund" name="txtMutualfund" value="1">&nbsp;Mutual Funds</label>
        	    </td>
                <td style="width: 20%;">
                	<label class="radio-inline"><input type="checkbox" id="txtPostal" name="txtPostal" value="1">&nbsp;Postal Savings</label>
                </td>
                <td style="width: 20%;">
                	<label class="radio-inline"><input type="checkbox" id="txtFixed" name="txtFixed" value="1">&nbsp;Co Fixed Deposits</label>
                </td>
                <td style="width: 20%;">
                	<label class="radio-inline"><input id="txtother" type="radio" name="txtother" value="1">Others</label>
                </td>
           
                <td id="divother" style="display: none;" ><input type="text" name="txtotherremark" placeholder="please specify" class="form-control" id="txtotherremark" required>
                </td>
             
               </tr>
           </table>
        </div>
        <div class="form-group divremark">
         <div>
               <label for="comment">Remark:</label>
               <textarea class="form-control" rows="4" id="txtremark" name="txtremark" style="width:50%" required></textarea>
         </div>      
         </div>
         <div style="text-align:center">
         	<button type="button" id="btnfbaprofile" name="btnfbaprofile" class="btn btn-primary">SAVE</button>
         </div>
         <input type="hidden" name="lifeinsucomp" id="lifeinsucomp">
          <input type="hidden" name="generatlinsucomp" id="generatlinsucomp">
           <input type="hidden" name="healthinuscomp" id="healthinuscomp">
     </form>
     </div>
    </div>
</div>
<script type="text/javascript">
$(document).ready(function() {
   getfbaprofile();
   $("#divhealth").show();
   $("#divgenins").show();
   $("#divprivate").show();
   $("#divcompany").show();
   $("#divprofile").show();
   $('input[name=iscompany]').click(function (){
    if (this.id == "iscompany"){
        $("#divcompany").show();
    } else {
        $("#divcompany").hide();
    }
  });
    $('input[name=isWorksLIC]').click(function (){
    if (this.id == "isWorksLIC"){
        $("#divprofile").show();
    } else {
        $("#divprofile").hide();
    }
});
     $('input[name=txtother]').click(function (){
    if (this.id == "txtother"){
        $("#divother").show();
    } else {
        $("#divother").hide();
    }
});
   $('input[name=txtloan]').click(function (){
    if (this.id == "txtloan"){
        $("#divloan").show();
    } else {
        $("#divloan").hide();
    }
});
$('input[name=isWorksLICins]').click(function (){
    if (this.id == "isWorksLICins"){
        $("#divprivate").show();
    } else {  
        $("#divprivate").hide();
    }
});
$('input[name=isWorksGeneralins]').click(function (){
    if (this.id == "isWorksGeneralins"){
        $("#divgenins").show();
    } else {  
        $("#divgenins").hide();
    }
});
$('input[name=isWorksStandAlone]').click(function (){
    if (this.id == "isWorksStandAlone"){
        $("#divhealth").show();
    } else {  
        $("#divhealth").hide();
    }
});

   $('#btnfbaprofile').click(function (){
    
        var privetlifeco = [];
        $.each($(".ddlprivetlifeco option:selected"), function(){            
            privetlifeco.push($(this).val());
        });       
        $("#lifeinsucomp").val(privetlifeco.join(", "));

        var generatlinsucomp = [];
        $.each($(".ddlgenins option:selected"), function(){            
            generatlinsucomp.push($(this).val());
        });       
        $("#generatlinsucomp").val(generatlinsucomp.join(", "));

        var healthinuscomp = [];
        $.each($(".ddlhealth option:selected"), function(){            
            healthinuscomp.push($(this).val());
        });        
        $("#healthinuscomp").val(healthinuscomp.join(", "));

     if( $('#fbaprofile').valid())
    {
      console.log($('#fbaprofile').serialize());
          $.ajax({ 
             url: "{{URL::to('Fba-profile-insert')}}",
             method:"POST",
             data: $('#fbaprofile').serialize(),
             success: function(msg)  
               {
                 console.log(msg);
                 alert("Record has been saved successfully");
                 $("#fbaprofile").trigger('reset');                   
               }
             });  
    } 
});



});

function getfbaprofile(){

 var fbaid=$("#txtfbaid").val();  
 $.ajax({ 
         type: "GET",  
         url:'../Fba-profile-fbaprofile/'+fbaid,
         success: function(fbaprofile){

           var data = JSON.parse(fbaprofile); 
           if (data.length>0){      


 $.ajax({ 
         type: "GET",  
         url:'../fba-profile-company-mapping/1',
         success: function(fbaprofilecompdata){
           //alert(fbaprofilecompdata);
           var compdata = JSON.parse(fbaprofilecompdata);  
           //alert(compdata);
           var type1 = [];
           if (compdata.length>0){

                for (var i = 0; i < compdata.length; i++) {
                  if(compdata[i].companytype==1){
                    type1.push(compdata[i].companyid);
                  }
                   if(compdata[i].companytype==2){
                    
                  }
                   if(compdata[i].companytype==3){
                    
                  }
            }
                $('#ddlhealth').val(type1);
               

            }
          }
          }); 


          
      if((data[0].iscompany==1)){         
          $("#iscompany").prop("checked", true);
        }else{
          $("#iscompany").prop("checked", false);
        }
        $('#txtbusinesstype').val(data[0].businessname);
        $('#txtofficeadd').val(data[0].officeaddress);
        $('#txtstaff').val(data[0].staffstrength);
        if((data[0].workwithlic==1)){
         $("#isWorksLIC").prop("checked", true);
        }else{
           $("#isWorksLIC").prop("checked", false);
        }
        $('#txtnoofpolicy').val(data[0].noofpolicysoldpermonth);
        $('#txtpremium').val(data[0].premiumcollectedpermonth);
        $('#txtliccustomer').val(data[0].baseofliccustomers);
        $('#txtlicproduct').val(data[0].preferredlicproduct);
        $('#txtlicclub').val(data[0].licclubmembership);
        if((data[0].ishl ==1)){         
          $("#txthl").prop("checked", true);
        }
        else{
          $("#txthl").prop("checked", false);
        }
        if((data[0].ispl ==1)){        
        $("#txtpl").prop("checked", true);
        }
        else{
           $("#txtpl").prop("checked", false);
        }
        if((data[0].islap ==1)){
          $("#txtlap").prop("checked", true);
        }
        else{
          $("#txtlap").prop("checked", true);
        }
        if((data[0].isbl ==1)){
          $("#txtbl").prop("checked", true);
        }else{
          $("#txtbl").prop("checked", false);
        }
        if((data[0].isotherloan ==1)){
          $("#txtloan").prop("checked", true);
        }else{
          $("#txtloan").prop("checked", false);
        }       
        $('#txtotherloan').val(data[0].isotherloan);

        if((data[0].ismutualfund ==1)){
          $("#txtMutualfund").prop("checked", true);
        }else{
          $("#txtMutualfund").prop("checked", false);
        }
        if((data[0].ispostalsaving==1)){
           $("#txtPostal").prop("checked", true);
        }else{
          $("#txtPostal").prop("checked", false);
        }
        if((data[0].iscofixeddeposit==1)){
          $("#txtFixed").prop("checked", true);
        }else{
          $("#txtFixed").prop("checked", false);
        }if((data[0].isother==1)){
          $("#txtother").prop("checked", true);
        }else{
           $("#txtother").prop("checked", false);
        }
        $('#txtotherremark').val(data[0].otherremark);
        $('#txtremark').val(data[0].remark);
       }
       }
      });  
}

</script>
@endsection