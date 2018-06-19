
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
<script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>


<style>
.modal-dialog {margin-top:70px !important;}
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
.bg-gray li {list-style-type:none; padding-left:15px !important;float:left;width: 48%;font-size:11px;color: #747474;}
.bg-gray li .glyphicon-ok {float: left;height:19px;margin-top: 1px;left: -10px;vertical-align: middle;font-size:9px;color: #747474;}
.list1 {margin:0px; padding:2px;}
.head1 {padding:10px;background:#eee;border:1px solid #ddd; font-size:15px;margin-bottom:20px;}
.input-1 {padding:5px;width:100%;border:none; border-bottom:1px solid #999 !important; margin-bottom:20px;font-size: 18px;}

.button1 {border:2px solid #f95f67; padding:10px;background:#fff; margin-bottom:20px; width:100%;}
input:focus{border:0px;}
/* label {font-size: 11px;color: #666;} */
@media only screen and (max-width: 768px) {
    .col-md-12 {
        width:100%;
		float:left;
    }
}







 .register input[type="text"],.register input[type="email"],.register input[type="password"],.register input[type="tel"],.register select{
    font-size: 1em;
    color: #8c8c8c;
    padding: 0.5em 1em;
    border: 0;
    width:100%;
    border-bottom: 1px solid #dcdcdc;
    background: none;
    -webkit-appearance: none;
	outline: none;
}
input[type="checkbox"] {
    cursor: pointer;
}
.register textarea { 
	min-height: 150px;
    resize: none;
}
/*-- input-effect --*/
.styled-input.agile-styled-input-top {
    margin-top: 0;
} 
.styled-input input:focus ~ label, .styled-input input:valid ~ label,.styled-input textarea:focus ~ label ,.styled-input textarea:valid ~ label{
    font-size: .9em;
    color: #009ee3;
    top: -1.3em;
	
	text-transform:uppercase;
    -webkit-transition: all 0.125s;
	-moz-transition: all 0.125s; 
	-o-transition: all 0.125s;
	-ms-transition: all 0.125s;
    transition: all 0.125s;
}
/*.styled-input {
	width: 100%;
    position: relative;
    margin: 0 0 1.2em;
	text-transform:uppercase;
}*/
.styled-input:nth-child(1),.styled-input:nth-child(3){
	margin-left:0;
}
.textarea-grid{
	float:none !important;
	width:100% !important;
	margin-left:0 !important;
}
.styled-input label {
	color: #8c8c8c;
    padding: 0.5em 25px;
    position: absolute;
    top: 0;
    left: 0;
    -webkit-transition: all 0.3s;
    -moz-transition: all 0.3s;
    transition: all 0.3s;
    pointer-events: none;
    font-weight: 400;
    font-size: .9em;
    display: block;
    line-height: 1em;
}
.styled-input input ~ span,.styled-input textarea ~ span, .styled-input .date ~ span {
	display: block;
    width: 0;
    height: 2px;
    background: #333;
    position: absolute;
    bottom: 0;
    left: 0;
    -webkit-transition: all 0.125s;
    -moz-transition: all 0.125s;
    transition: all 0.125s;
}
.styled-input textarea ~ span { 
    bottom: 5px; 
}
.styled-input input:focus.styled-input textarea:focus { 
	outline: 0; 
} 
.styled-input input:focus ~ span,.styled-input textarea:focus ~ span {
	width: 100%;
	-webkit-transition: all 0.075s;
	-moz-transition: all 0.075s;  
	transition: all 0.075s; 
} 
/*-- //input-effect --*/
.register-form input[type="submit"] {
    outline: none;
    color: #FFFFFF;
    padding: .3em 1em;
    font-size: 1.4em;
    margin: 1em 0 0 0;
    -webkit-appearance: none;
    background: #009688;
    border: 2px solid #009688;
    cursor: pointer;
    -webkit-transition: 0.5s all;
    -moz-transition: 0.5s all;
    -o-transition: 0.5s all;
    -ms-transition: 0.5s all;
    transition: 0.5s all;
	font-family: 'Yanone Kaffeesatz', sans-serif;
}
.register-form input[type="submit"]:hover {
    background: #FFFFFF;
	color:#009688;
	border: 2px solid #009688;
}

input{outline:none;}
 
.btn-default.active {  
     background: #fff;
    color: #009ee3;
    border: 2px solid #009ee3;
    text-shadow: none;
    box-shadow: none;
}
.btn-default {background:#fff !important; outline:none;}
input, select {background:#fff;}

.text-danger-clr {
    color: #ff5c61;
}
.main-header {
    position: fixed;
    height: 48px;
	line-height:29px;
    z-index: 9999;
    background: #009ee3;
    left: 0;
    right: 0;
	margin-top:0px;
}
.header-middle {
    float: left;
    color: #fff;
    text-align: center;
    font-size: 18px;
}
</style>
<script>
$(document).ready(function(){
    $(".down-arrow").click(function(){
        $(".bg-gray").toggle("slow");
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

    $("#healthchekup").trigger('reset');

    window.location.href ="{{URL::to('Health-Assure-Partner')}}?PackName="+$('#txtpackname').val()+"&Packcode="+$('#txtpackcode').val()+"&OfferPrice="+$('#txtoffer').val()+"&MRP="+$('#txtmrp').val()+"&tcount="+$('#txttcount').val()+"&fasting="+$('#txtfasting').val()+"&homevisit="+$('#txthomevisit').val()+"&fbaid="+$('#txtfbaid').val()+"&fbaname="+$('#txtfbaname').val()+"&ID="+msg[0].ID;

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
<h5 class="text-center pad main-header header-middle" style="width:100%;">Health Check Up Plans selected by you</h5>
 <div class="col-md-12">
 <br>
 <br>
 <br>
 <img src="http://backoffice.magicfinmart.com/HealthPackages/HealthInsurance/images/health-assure-logo.jpg" class="logo-center" />
 </div>
 


<div class="col-md-12">
  <table class="table table-bordered tbl2 box-shadow">
	  <tbody>
	    
	      <td><p><b>{{$_GET["PackName"]}}</b></p><h5 class="text-danger-clr">{{$_GET["tcount"] }} Tests</h5> </td>
	      <td colspan="2"><p class="text-center">ACTUAL COST</p> <a href="#" class="amount amunt1"><strike>{{$_GET["MRP"]}}</strike></a></td>
	      <td colspan="2"><p class="text-center">OFFER COST</p> <a href="#" class="amount">{{$_GET["OfferPrice"]}}</a></td>
		  <td><a href="#" class="down-arrow"><span class="glyphicon glyphicon-triangle-bottom"></span></a> </td>
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
<div class="register-in">
<div class="register-form">
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
<input type="hidden" name="txtfbaname" id="txtfbaname" 
    value="{{$_GET["fbaname"]}}">
<input type="hidden" name="txttcount" id="txttcount" 
    value="{{$_GET["tcount"]}}">


 
</div>
<div class="clearfix"></div>
<div class="col-md-4 col-sx-6 styled-input">
 <input type="text" id="txtname" name="txtname" border="0" class="input-1" required />
 <label>Name</label>
</div>
<div class="col-md-4 col-sx-6 styled-input">

 <input type="number" id="txtmono" name="txtmono" class="input-1" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"
    type = "number" maxlength = "10" required />
 <label>Mobile No</label>
</div>

<div class="col-md-4 col-sx-12 styled-input">
 
 <input type="email" id="txtemail" name="txtemail" class="input-1" required/>
 <label>Email ID</label>
</div>

<div class="col-md-4 col-sx-12">
<label>Gender</label>
 <div class="form-group">
        <div data-toggle="buttons">
          <label class="btn btn-default btn-circle btn-md active"><input type="radio" name="btngender" id="btngender" checked="checked" value="M">Male</label>
          <label class="btn btn-default btn-circle btn-md"><input type="radio" name="btngender" id="btngender" value="F">Female</label>
        </div>
      </div>
	  <br>
  </div>
  
 <div class="col-md-4 col-sx-12 styled-input">

 <input type="number" id="txtage" name="txtage" class="input-1" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"
    type = "number" maxlength = "2" required/>
  <label>Age</label>
</div>

 <div class="col-md-4 col-sx-12 styled-input">

 <input type="text" id="txtflatno" name="txtflatno" class="input-1" required/>
  <label>Flat No, Building</label>
</div>

 <div class="col-md-4 col-sx-12 styled-input">

 <input type="text" id="txtstreetadd" name="txtstreetadd" class="input-1" required/>
  <label>Street Address</label>
</div>

 <div class="col-md-4 col-sx-12 styled-input">
 
 <input type="text" id="txtlandmark" name="txtlandmark" class="input-1" required/>
 <label>Landmark</label>
</div>

 <div class="col-md-4 col-sx-12 styled-input">
 
 <input type="number" id="txtpincode" name="txtpincode" class="input-1" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"
    type = "number" maxlength = "6" required/>
 <label>Pincode</label>
</div>

<div class="col-md-4 col-sx-12 styled-input">
 
 <input type="text" id="txtcity" name="txtcity" class="input-1" required/>
 <label>City</label>
</div>

<div class="col-md-4 col-sx-12 styled-input">
 
 <input type="date" id="txtdate" name="txtdate" class="input-1 date" required/>
 <label>Appt. Date</label>
</div>

<div class="col-md-4 col-sx-12 styled-input">
 
 <select  class="input-1" name="ddlappttime" id="ddlappttime" required>
    <option value="0" selected="selected">Appt. Time Slot</option>
    @foreach($appttime as $val)
	<option value="{{$val->appointment_time}}">{{$val->appointment_time}}</option>
    @endforeach

 </select>
 
 </div>
<div class="col-xs-12 pad-1" style="padding:0 0 12px 0;">

 
     
   <div class="col-md-12 col-xs-12 pad pad-1">
    <span cssstyle="display:block;width:auto;">&nbsp;<input id="chkAgree " type="checkbox" name="chkAgree" class="used" required></span> I Agree to the <a onclick="showtermcon()" style="color: #5b9bd5; cursor: pointer;" data-toggle="modal" data-target="myModal">Terms &amp; Conditions</a>
                                </div>
                            </div>
 <div class="col-md-12">
 <input type="button" id="btnsubmithealth" name="btnsubmithealth" class="button1 col-md-12" value="NEXT: SELECT YOUR LAB"/>
 </div>
 
 
 </form>
</div>
</div>
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
                <div class="modal-dialog modal-md">
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
							
							<button class="btn btn-primary" data-dismiss="modal" style="margin:0 auto;display:block;">OK</button>

                            <div class="clearfix"></div>
                        </div>

                    </div>
                </div>
            </div>
            <!-- modal popup close -->

