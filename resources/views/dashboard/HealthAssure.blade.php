@extends('include.master')
 @section('content')
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>BOOK A LAB APPOINTMENT</title>
<meta name="viewport" content="width=device-width, initial-scale=1">

<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

<style>
body {font-size:13px;}
p {color:#333;}
.blu-heading {padding:10px;border:1px solid #4d62b5;color:#4d62b5;font-size: 16px;}
.red-txt {color:#b60d2a;}
.tbl2 td {text-align:left;}
.tbl2 p {color:#666;font-size: 11px;}
.box-shadow {box-shadow: 1px 1px 3px 0px #ccc;}
.amount {background: #f95f67;padding: 5px 15px;margin: 4px;font-size: 16px;color: #fff; display:block; text-align:center}
.center {display: block;margin:0 auto;}
.brd-left {border-right:1px solid #eee !important;}
.bg-gray {background:#f1f1f1;}
.glyphicon {    font-weight: normal;font-size: 10px; color:#666;margin-right:4px;}
ul li {margin:2px; padding:4px !important;}
.table>tbody>tr>td {padding:6px;}
.logo-center {margin:0 auto;display:block;}
.pad {padding:10px; font-weight:normal; font-size:16px;}
.glyphicon { font-size:15px;margin:0 auto;display:table;margin-top:8px;}
.down-arrow {padding:10px 20px;}
.down-arrow:hover {colo:#999;text-decoration:none; opacity:0.7;}
.amunt1 {background:#999;}
.bg-gray li {list-style-type:none; padding-left:15px !important;float:left;width: 48%;}
.bg-gray li .glyphicon-ok {float: left;margin-top: 1px;left: -16px;vertical-align: middle;font-size:13px;}
.list1 {margin:0px; padding:10px;}
.head1 {padding:10px;background:#eee;border:1px solid #ddd; font-size:15px;}
.input-1 {padding:10px;width:100%;border:none; border:1px solid #ddd;border-radius:3px; margin-bottom:15px;}
.button1 {border:2px solid #f95f67; padding:10px;background:#fff; margin-bottom:20px; width:100%;}
label {font-size: 11px;color: #666;}
</style>
<script>
$(document).ready(function(){
    $(".down-arrow").click(function(){
        $(".bg-gray").toggle();
    });
$('#btnsubmithealth').click(function() {
if($('#healthchekup').valid())
    {
  console.log($('#healthchekup').serialize());
   $.ajax({ 
   url: "{{URL::to('HealthAssureinsert')}}",
   method:"POST",
   data: $('#healthchekup').serialize(),

  success: function(msg)  
   {
    console.log(msg);
    $("#healthchekup").trigger('reset');
   }
});
} else{
  alert("Please fill all mandatory field");
}
});

    
});
function  showtermcon(){
        $('#myModal').modal('show');
    }

function showtestmodel(name,model)
{
	
	$('#testHead').empty();
	$('#testHead').append(name.replace(/_/g,' ').replace('Test','').replace('test','')+" Test");
	var arr = model.split(',')
	var text = "<body>";
	$('#tbltestlist').empty();
	for (var i = 0; i < arr.length-1; i++) {
		text = text + "<tr style='height:40px;border-bottom:solid 1px black;'><td>"+arr[i].replace(/_/g,' ')+"</td></tr>";
	}
text = text +"</body>";
	
	$('#tbltestlist').html(text);
	$('.testCheckup').modal('show');
}    

</script>

</head>

<body>
<div class="container">
 <div class="col-md-12">
 <br>
 <img src="http://backoffice.magicfinmart.com/HealthPackages/HealthInsurance/images/health-assure-logo.jpg" class="logo-center" />
<h5 class="text-center pad">Health Check Up Plans selected by you</h5>
 </div>
 


<div class="col-md-12">
  <table class="table table-bordered tbl2">
	  <tbody>
	    
	      <td><p><b>{{$_GET["PackName"]}}</b></p><h5 class="text-danger">{{$_GET["tcount"] }} Tests</h5> </td>
	      <td colspan="2"><p class="text-center">ACTUAL COST</p> <a href="#" class="amount amunt1"><strike>{{$_GET["MRP"]}}</strike></a></td>
	      <td colspan="2"><p class="text-center">OFFER COST</p> <a href="#" class="amount">{{$_GET["OfferPrice"]}}</a></td>
		  <td><a href="#" class="down-arrow"><span class="glyphicon glyphicon-chevron-down"></span></a> </td>
        </tr>
		
   <tr>
   <td class="no-padding bg-gray" colspan="6" style="display:none;">
   <ul class="list1">
   	@if(isset($respon))
   	@foreach($respon as $val)
   <li><span class="glyphicon glyphicon-ok"></span>{{$val->Name}} 
   	<?php if(sizeof($val->ParamDetails)) {

$str = "";
foreach ($val->ParamDetails as $key => $value) {
	$str = $str.str_replace(' ', '_', $value).",";
}

     echo "<a onclick=showtestmodel('".str_replace(' ', '_', $val->Name)."','".$str."') style='color: #5b9bd5; cursor: pointer;' 
     data-toggle='modal' data-target='testCheckup'>".
     sizeof($val->ParamDetails)." - Tests </a>";				
} 

   ?></li>
   @endforeach
   @endif
   </ul>
   </td>
  </tr>
  
  </tbody>
</table>

</div>

<div class="col-md-12"><p class="text-center head1">Please enter your details</p></div>
<form id="healthchekup" method="post">
     {{ csrf_field() }}

<div class="col-md-4">
<input type="hidden" name="txtpackname" id="txtpackname" 
    value="{{$_GET["PackName"]}}">
 <input type="hidden" name="txtmrp" id="txtmrp" 
    value="{{$_GET["MRP"]}}">
<input type="hidden" name="txtoffer" id="txtoffer" 
    value="{{$_GET["OfferPrice"]}}">
<input type="hidden" name="txtpackcode" id="txtpackcode" 
    value="{{$_GET["Packcode"]}}">
<input type="hidden" name="txtfbaid" id="txtfbaid" 
    value="{{$_GET["fbaid"]}}">
<input type="hidden" name="txtfasting" id="txtfasting" 
    value="{{$_GET["fasting"]}}">
<input type="hidden" name="txthomevisit" id="txthomevisit" 
    value="{{$_GET["homevisit"]}}">
 <label>Name</label>
 <input type="text" id="txtname" name="txtname" class="input-1" required />
</div>

<div class="col-md-4">
 <label>Mobile No</label>
 <input type="number" id="txtmono" name="txtmono" class="input-1" required />
</div>

<div class="col-md-4">
 <label>Email ID</label>
 <input type="email" id="txtemail" name="txtemail" class="input-1" required/>
</div>

<div class="col-md-4">
<label>Gender</label>
 <div class="form-group">
        <div data-toggle="buttons">
          <label class="btn btn-default btn-circle btn-md"><input type="radio" name="btngender" id="btngender" checked="checked" value="0">Male</label>
          <label class="btn btn-default btn-circle btn-md"><input type="radio" name="btngender" id="btngender" value="1">Female</label>
        </div>
      </div>
  </div>
  
 <div class="col-md-4">
 <label>Age</label>
 <input type="number" id="txtage" name="txtage" class="input-1" required/>
</div>

 <div class="col-md-4">
 <label>Flat No, Building</label>
 <input type="text" id="txtflatno" name="txtflatno" class="input-1" required/>
</div>

 <div class="col-md-4">
 <label>Street Address</label>
 <input type="text" id="txtstreetadd" name="txtstreetadd" class="input-1" required/>
</div>

 <div class="col-md-4">
 <label>Landmark</label>
 <input type="text" id="txtlandmark" name="txtlandmark" class="input-1" required/>
</div>

 <div class="col-md-4">
 <label>Pincode</label>
 <input type="number" id="txtpincode" name="txtpincode" class="input-1" required/>
</div>

<div class="col-md-4">
 <label>City</label>
 <input type="text" id="txtcity" name="txtcity" class="input-1" required/>
</div>

<div class="col-md-4">
 <label>Appt. Date</label>
 <input type="date" id="txtdate" name="txtdate" class="input-1" required/>
</div>

<div class="col-md-4">
 <label>Appt Time Slot</label>
 <select  class="input-1" name="ddlappttime" id="ddlappttime" required>
    <option value="0" selected="selected">APPT. TIME SLOT</option>
    @foreach($appttime as $val)
	<option value="{{$val->apptid}}">{{$val->appointment_time}}</option>
    @endforeach
	<!-- <option value="3">08.30 TO 09.00 AM</option>
	<option value="4">09.00 TO 09.30 AM</option>
	<option value="5">09.30 TO 10.00 AM</option>
	<option value="2">10.30 TO 11.00 PM</option>
	<option value="3">11.30 TO 12.00 PM</option> -->
 </select>
 </div>
<div class="col-xs-12 pad-1" style="padding:0 0 12px 0;">
 <div class="col-xs-12 pad-1">
 <span cssstyle="display:block;width:auto;"><input id="chkAgree " type="checkbox" name="chkAgree" class="used" required></span>
   </div>    
   <div class="col-xs-11 pad pad-1">
     I Agree to the <a onclick="showtermcon()" style="color: #5b9bd5; cursor: pointer;" data-toggle="modal" data-target="myModal">Terms &amp; Conditions</a>
                                </div>
                            </div>
 <div class="col-md-12">
 <input type="button" id="btnsubmithealth" name="btnsubmithealth" class="button1 col-md-12" value="NEXT: SELECT YOUR LAB"/>
 </div>
 </form>


 </div>
</body>

</html>

  <div id="testCheckup" class="modal fade dignostic-modal testCheckup">
                <div class="modal-dialog modal-sm">
                    <div class="modal-content">
                        <div class="modal-header" style='background: #5b9bd5; color: #fff;'>
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true" style='font-size: 22px; color: #fff; opacity: 0.9;'>&times;</button>
                            <h5 id="testHead" class="modal-title"></h5>
                        </div>
                        <div id="testCheckupBody" class="modal-body" style='background: #eaeff7;'>
                        	<table id="tbltestlist" style="width:100%">
                        	</table>

                        </div>
                    </div>
                </div>
            </div>


<!-- modal popup -->
            <div id="myModal" class="modal fade dignostic-modal">
                <div class="modal-dialog modal-sm">
                    <div class="modal-content">
                        <div class="modal-header" style='background: #5b9bd5; color: #fff;'>
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true" style='font-size: 22px; color: #fff; opacity: 0.9;'>&times;</button>
                            <h5 class="modal-title">TERMS & CONDITIONS</h5>
                        </div>
                        <div class="modal-body" style='background: #eaeff7;'>
                            <p>
                                HealthAssure Pvt. Ltd is the issuer of the HealthAssure Plan on behalf of the Corporate/
Customer
                            </p>
                            <p>This represents the details of Health Services available as a part of the HealthAssure Plan</p>
                            <p>
                                The Program Partners shall only honour bookings made via the employee booking engine
and walk-ins will not be permitted
                            </p>
                            <p>
                                To avail Health services as part this HealthAssure plan, post appointment scheduling,
customer would need to provide a valid photo ID Proof to our Program Partners
                            </p>
                            <p>
                                The usage of the services is optional and each service shall be valid only for a one time use
unless specified otherwise
                            </p>
                            <p>All benefits represented in the plan are valid for a twelve months from the date of purchase</p>
                            <p>
                                HealthAssure Pvt. Ltd. may not entertain any request for changing the benefits as offered
under this plan under any circumstances whatsoever.
                            </p>
                            <p>
                                This plan cannot be combined with any other scheme of the Program Partners and shall be
used exclusively for the Health Services Vouchers under the HealthAssure Plan.
                            </p>
                            <p>This plan is not encashable.</p>
                            <p>This plan shall be valid only at the selected Partners of our HealthAssure Plan</p>
                            <p>
                                By agreeing to this agreement, I authorize the medical centres/partners in HealthAssure
network to use and disclose the protected health information described below to
HealthAssure and this medical information may be used by the person I authorize to receive
this information for medical treatment, analysis, consultation, billing or claims payment, or
other related purposes.
                            </p>
                            <p>
                                HealthAssure Pvt. Ltd. reserves the right to alter any or all of the terms & conditions
stipulated for the services at any time and at its sole discretion without assigning any
reasons whatsoever
                            </p>
                            <p>
                                HealthAssure Pvt. Ltd. shall not be liable for any losses or liability due to such alteration of
services.
                            </p>
                            <p>
                                HealthAssure Pvt. Ltd. holds no warranty or makes no representation about the quality,
delivery or otherwise of the services offered by the Program Partners.
                            </p>
                            <p>
                                Any dispute, regulatory non-compliance or claim regarding the services shall be resolved
with the Program Partners directly without any reference or liability to HealthAssure Pvt.
Ltd.
                            </p>
                            <p>
                                This HealthAssure Plan offers optional Health Services and does not entail any civil/ criminal
liability on HealthAssure Pvt. Ltd
                            </p>
                            <p>
                                Any dispute arising of this offer will be subject to the exclusive jurisdiction of competent
courts in Mumbai
                            </p>
                            Diagnostic Test
                    <p>The services are provided by Diagnostic Lab partners of HealthAssure Pvt. Ltd.</p>
                            <p>
                                The services will be available from 8:00 AM to 04:00 PM on all days except national holidays
and Sundays
                            </p>
                            <p>
                                The booking will have to be done on the Employees’ service booking engine and will be
confirmed basis availability at the chosen Diagnostic Lab partner
                            </p>
                            <p>Fasting of 10-12 hours would be required, wherever applicable</p>
                            <p>
                                The diagnostic lab partners have a certified quality protocol in place. Factors such as
physiological disturbances, fever, dehydration, haemolysis, etc. can cause variation in
reported results
                            </p>
                            <p>
                                In case blood sample gets lysed, Our Diagnostic Lab partner will approach for a fresh sample
collection, the same day or another mutually decided date
                            </p>
                            <p>
                                As part of the operational procedure, copy of reports for Tests completed would be shared
with HealthAssure for the purpose of billing and pay-out to Diagnostic Lab partner
                            </p>
                            <p>
                                For further queries, please write to : support@healthassure.in or call us at 0124-4851155
Doctor Consultation
                            </p>
                            <p>The services will be provided by Partners of HealthAssure Pvt. Ltd</p>
                            <p>
                                The doctor consultation will have to be booked on the Employees’ booking engine and will
be confirmed basis availability at the chosen partner
                            </p>
                            <p>
                                The services under Doctor Consultation would cover Consulting Charges with Doctor only. All
other charges with regards to treatment, procedure, dressing, medicines etc. would not be
part and not covered under this service
                            </p>
                            <p>
                                HealthAssure will not be responsible for any cross references, treatments, procedures, tests
or any complications arising from these treatments, procedures, tests suggested by partner
                            </p>
                            <p>
                                As part of the operational procedure, proof of consultation completed would be shared with
HealthAssure for the purpose of billing and pay-out to partner
                            </p>
                            <p>
                                For further queries, please write to: support@healthassure.in or call us at 0124-4851155
Specialist Consultation
                            </p>
                            <p>The services will be provided by Partners of HealthAssure Pvt. Ltd</p>
                            <p>
                                The specialist consultation will have to be booked on the Employees’ booking engine and will
be confirmed basis availability at the chosen partner
                            </p>
                            <p>The services under specialist consultation would cover Consulting Charges with Doctor only.</p>
                            <p>
                                All other charges with regards to treatment, procedure, dressing, medicines etc. would not
be part and not covered under this service
                            </p>
                            <p>
                                HealthAssure will not be responsible for any cross references ,treatments, procedures, tests
or any complications arising from these treatments, procedures, tests suggested by partner
                            </p>
                            <p>
                                As part of the operational procedure, proof of consultation completed would be shared with
HealthAssure for the purpose of billing and pay-out to partner
                            </p>
                            <p>
                                For further queries, please write to: support@healthassure.in or call us at 0124-4851155
Tele-Doctor
                            </p>
                            <p>The services are provided M/s eVaidya Pvt. Ltd.</p>
                            <p>
                                The services will be available from 8:00 AM to 10:00 PM on all days except national holidays
and Sundays
                            </p>
                            <p>The booking will have to be done on the Employees’ service booking engine</p>
                            <p>For detailed T&C’s, please visit www.healthassure.in</p>
                            <p>
                                For further queries, please write to: support@healthassure.in or call us at 0124-4851155
Nutritionist Consultation
                            </p>
                            <p>The services are provided M/s Manna Healthcare Pvt. Ltd. (Obino)</p>
                            <p>
                                The services will be available from 10:00 AM to 6:00 PM on all days except national holidays
and Sundays
                            </p>
                            <p>The booking will have to be done on the Employees’ service booking engine</p>
                            <p>For detailed T&C’s, please visit www.healthassure.in</p>
                            <p>
                                For further queries, please write to : support@healthassure.in or call us at 0124-4851155
Emergency Assistance
                            </p>
                            <p>
                                AAMES arranges for services when a Participant is traveling 150 kilometers or more from
their primary legal residence or in another country that is not their country of residence and
has not been away from such residence for more than 90 days. A Participant meeting such
requirements is hereinafter referred to as an “Eligible Participant.”
                            </p>
                            <p>All services must be arranged by AAMES.</p>
                            <p>No claims for reimbursement are accepted.</p>
                            <p>For detailed T&C’s, please visit  <a style="color: #5b9bd5; cursor: pointer;" target="_blank" href="https://www.healthassure.in/">www.healthassure.in</a>  </p>
                            <p>For further queries, please write to : support@healthassure.in or call us at 022-61676622</p>
                            <br />

                            <div class="clearfix"></div>
                        </div>

                    </div>
                </div>
            </div>
            <!-- modal popup close -->

  @endsection