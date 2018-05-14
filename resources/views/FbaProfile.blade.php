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
      	<form id="fbaprofile" method="post" validate>
       <div class="fbadiv form-group">
       	<table class="table">
       	 <tr>
       	  <td><label>FBA ID:</label></td>
       	  <td><label>FBA Name:</label></td>
       	  <td><label>Date of Registration:</label></td>
       	  <td><label>City:</label></td>
       	  <td><label>State:</label></td>
       	  <td><label>RRM:</label></td>
       	  <td><label>Field Manger:</label></td>
       	 </tr>
       	</table>
       	<hr>
       </div>
       <div class="divupdate form-group">
       	<label>Update History</label>
       	<table class="table">
       		<tr>
       			<td><label>Last Updated By:</label></td>
       			<td><label>Last Update Date:</label></td>
       			<td><label>Last Update Time:</label></td>
       			<td><label>Remarks:</label></td>
       		</tr>
       	</table>
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
       			<td><input type="text" name="txtbusinesstype" class="form-control" required></td>
       			<td><label>Office Address:</label></td>
       			<td><input type="text" name="txtofficeadd" class="form-control" required></td>
       			<td><label>Staff Strength:</label></td>
       			<td><input type="number" name="txtstaff" class="form-control" required></td>
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
        			<td><input type="number" name="txtnoofpolicy" class="form-control" required></td>
        			<td><label>Premium collected per month:</label></td>
        			<td><input type="number" name="txtpremium" class="form-control" required></td>
        			<td><label>Base of LIC Customers:</label></td>
        			<td><input type="number" name="txtliccustomer" class="form-control" required></td>
        		</tr>
        		<tr>
        			<td><label>Preferred LIC products:</label></td>
        			<td><input type="text" name="txtlicproduct" class="form-control" required></td>
        			<td><label>LIC Club Memberships:</label></td>
        			<td><input type="text" name="txtlicclub" class="form-control" required></td>
        		</tr>
        	</table>
        </div>
        </div>
        <div class="form-group divlicins">
        	<table class="table">
        		<tr>
        			<td width="30%;"><label>Works with Private Life Insurers:</label></td>
        			 <td width="20%;">
       	              <label><input type="radio" name="isWorksLICins" value="1">&nbsp;YES</label>
       	            </td>
       	             <td width="20%;">
       	             <label><input type="radio" name="isWorksLICins" value="0">&nbsp;NO</label>
       	             </td>
        		</tr>
        		<tr>
        			<td><label>Private Life Co's:</label></td>
        			<td><select multiple class="form-control" id="sel2" name="ddlprivetlifeco" required>
        				 @foreach($lifeins as $val)
                         <option value="{{$val->LifeInsurerCompanyMasterId}}">{{$val->CompanyName}}</option>
                          @endforeach
                        </select>
        			</td>
        		</tr>
        	</table>
            </div>
        <div class="form-group divgenco">
        <table class="table">
        	<tr>
        		<td style="width: 30%"><label>Works with General Ins Co's:</label></td>
        		<td style="width: 20%"> 
       	              <label><input type="radio" name="isWorksGeneralins" value="1">&nbsp;YES</label>
       	        </td>
       	        <td style="width: 20%">
       	             <label><input type="radio" name="isWorksGeneralins" value="0">&nbsp;NO</label>
       	        </td>
       	    </tr>
       	    <tr>
        			<td><label>General Insurance Co's:</label></td>
        			<td><select id="ddlgenins" name="ddlgenins" multiple class="form-control" id="sel2" required>
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
       	              <label><input type="radio" name="isWorksStandAlone" value="1">&nbsp;YES</label>
       	        </td>
       	        <td style="width: 20%">
       	             <label><input type="radio" name="isWorksStandAlone" value="0">&nbsp;NO</label>
       	        </td>
       	    </tr>
       	        <tr>
        			<td><label>Stand Alone Health Insurance Co's:</label></td>        			
        			<td><select name="ddlhealth" id="ddlhealth" multiple class="form-control" id="sel2" required>
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
        	        <td><label class="radio-inline"><input type="checkbox" name="txthl" value="1">&nbsp;HL</label></td>
                    <td><label class="radio-inline"><input type="checkbox" name="txtpl" value="1">&nbsp;PL</label></td>
                   <td><label class="radio-inline"><input type="checkbox" name="txtlap" value="1">&nbsp;LAP</label></td>
                   <td><label class="radio-inline"><input type="checkbox" name="txtbl" value="1">&nbsp;Business Loan</label></td>
                   <td><label class="radio-inline"><input id="txtloan" type="radio" name="txtloan" value="1">Others</label></td>
                     <td id="divloan" style="display: none;" ><input type="text" name="" placeholder="Please Specify" class="form-control" id="txtotherloan" required></td>
               </tr>
           </table>
        </div>
        <div class="form-inline form-group divothloan">
        	<table class="table">
                <tr style="width: 30%;">
        	        <label>Other</label>
        	    <td style="width: 20%;">
        	    	<label class="radio-inline"><input type="checkbox" name="txtMutualfund" value="1">&nbsp;Mutual Funds</label>
        	    </td>
                <td style="width: 20%;">
                	<label class="radio-inline"><input type="checkbox" name="txtPostal" value="1">&nbsp;Postal Savings</label>
                </td>
                <td style="width: 20%;">
                	<label class="radio-inline"><input type="checkbox" name="txtFixed" value="1">&nbsp;Co Fixed Deposits</label>
                </td>
                <td style="width: 20%;">
                	<label class="radio-inline"><input id="txtother" type="radio" name="txtother" value="1">Others</label>
                </td>
           
                <td id="divother" style="display: none;" ><input type="text" name="txtotherip" placeholder="please specify" class="form-control" id="txtotherip" required>
                </td>
             
               </tr>
           </table>
        </div>
        <div class="form-group divremark">
         <div>
               <label for="comment">Remark:</label>
               <textarea class="form-control" rows="4" id="txtremark" style="width:50%" required></textarea>
         </div>      
         </div>
         <div style="text-align:center">
         	<button type="button" id="btnfbaprofile" name="btnfbaprofile" class="btn btn-primary">SAVE</button>
         </div>







     </form>
     </div>
    </div>
</div>
<script type="text/javascript">
$(document).ready(function() {
  
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
   $('#btnfbaprofile').click(function (){
    if($('#fbaprofile').valid()){
      console.log($('#fbaprofile').serialize());
          $.ajax({ 
             url: "{{URL::to('Fba-profile')}}",
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
 

</script>
@endsection