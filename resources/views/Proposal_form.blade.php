@extends('include.master')
@section('content')

<head>
<meta charset="utf-8">
<title>Untitled Document</title>
	
	<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	
	<style>
		.table>tbody>tr>td {border-top:none; text-align:right; font-size:12px;color:#666;}
		.table {border: 15px solid #f6f6f6 !important;border-bottom: 15px solid #f8f8f8 !important;margin:20px 0px;border:1px solid #f1f1f1;padding:20px;transition:all 0.3s linear;-moz-transition:all 0.3s linear;-webkit-transition:all 0.3s linear;}
		/*.table:hover {box-shadow: 1px 9px 25px 0px #999;transition:all 0.3s linear;-moz-transition:all 0.3s linear;-webkit-transition:all 0.3s linear;}*/
		input {border: 1px solid #ddd;padding: 4px;background: #fff;width: 100%;}
		textarea {overflow: auto;width: 100%;background: #fff;border: 1px solid #ddd;}
		.table>tbody>tr>td {padding-bottom:5px;}
		input:hover {
            border: 1px solid #c4c2c2;
			border-radius:5px;
		}

	</style>
</head>

<body>
<div class="container-fluid white-bg">
<div class="col-md-12"><h3 class="mrg-btm">Proposal Form</h3></div>
<div class="col-md-12">
 <div class="overflow-scroll">	
<div class="container">
<div class="col-md-12 table-responsive">

<table class="table table-striped">
  <tbody>
  	<form name="frmproposalform" method="Post">
    <tr>
      <td> Client name</td>
      <td colspan="2"><input type="text" name="txtclientname" id="txtclientname" class="form-control" required></td>
		<td></td>
      <td>Expiry Date</td>
		<td><input type="date" name="txtexpdate" id="txtexpdate" class="form-control" required></td>
    </tr>
    <tr>
      <td>Address</td>
      <td colspan="3">
        <textarea name="txtaddress" id="txtaddress" class="form-control"></textarea></td>
      <td colspan="2">&nbsp;</td>
    </tr>
    <tr>
      <td>Hypothication</td>
      <td colspan="2"><input type="text" name="txthypothaction" id="textfield34" class="form-control"></td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td>Nominee Name</td>
		<td><input type="text" name="txtnomineename" id="txtnomineename" class="form-control"></td>
      <td>Nominee Relation</td>
		<td><input type="text" name="txtnomineerelation" id="txtnomineerelation" class="form-control"></td>
      <td>Age</td>
		<td><input type="number" name="txtnomineeage" id="txtnomineeage" class="form-control"></td>
    </tr>
    <tr>
      <td>Insp. Ref. No.</td>
		<td><input type="text" name="txtinsprefno" id="txtinsprefno" class="form-control"></td>
      <td>Isp. Dt. &amp; Time</td>
		<td><input type="text" name="txtispdt" id="txtispdt" class="form-control"></td>
      <td>Agency Name</td>
		<td><input type="text" name="txtagencyname" id="txtagencyname" class="form-control"></td>
    </tr>
    <tr>
      <td>Vehicle</td>
      <td><input type="text" name="txtvehicleno" id="txtvehicleno" class="form-control"></td>
      <td>Regi. No</td>
      <td><input type="text" name="txtregino" id="txtregino" class="form-control"></td>
      <td>IDV</td>
      <td><input type="text" name="txtidv" id="txtidv" class="form-control"></td>
    </tr>
    <tr>
      <td>YOM</td>
      <td><input type="text" name="txtyom" id="txtyom" class="form-control"></td>
      <td>Eng. No.</td>
      <td><input type="text" name="txtengno" id="txtengno" class="form-control"></td>
      <td>NON Ele. Acce.</td>
      <td><input type="text" name="txtnoneleacce" id="txtnoneleacce" class="form-control"></td>
    </tr>
    <tr>
      <td>C.C</td>
      <td><input type="text" name="txtcc" id="txtcc" class="form-control"></td>
      <td>Chas No.</td>
      <td><input type="text" name="txtchasno" id="txtchasno" class="form-control"></td>
      <td>Ele. Acce.</td>
      <td><input type="text" name="txteleacce" id="txteleacce" class="form-control"></td>
    </tr>
    <tr>
      <td>Seatings</td>
      <td><input type="text" name="txtseatings" id="txtseatings" class="form-control"></td>
      <td>Fuel Type</td>
      <td><input type="text" name="txtfueltype" id="txtfueltype" class="form-control"></td>
      <td>Gas Kit</td>
      <td><input type="text" name="txtgaskit" id="txtgaskit" class="form-control"></td>
    </tr>
    <tr>
      <td>Basic Premium</td>
      <td><input type="text" name="txtbasicpremium" id="txtbasicpremium" class="form-control"></td>
      <td>Third Party</td>
      <td><input type="text" name="txtthirdparty" id="txtthirdparty" class="form-control"></td>
      <td>Loading(%)</td>
      <td><input type="text" name="txtloadingper" id="txtloadingper" class="form-control"></td>
    </tr>
    <tr>
      <td>Ele. Acce.</td>
      <td><input type="text" name="txteleacce1" id="txteleacce1" class="form-control"></td>
      <td>TP of LPG / CNG Kit</td>
      <td><input type="text" name="txttpoflpgcng" id="txttpoflpgcng" class="form-control"></td>
      <td>Loading Amount</td>
      <td><input type="text" name="txtloadingamt" id="txtloadingamt" class="form-control"></td>
    </tr>
    <tr>
      <td>Non Ele. Acce.</td> 
      <td><input type="text" name="txtnoneleacce1" id="txtnoneleacce1" class="form-control"></td>
      <td>Unnamed Passenger</td>
      <td><input type="text" name="txtunnamedpass" id="txtunnamedpass" class="form-control"></td>
      <td>Add on Premium</td>
      <td><input type="text" name="txtaddonpremium" id="txtaddonpremium" class="form-control"></td>
    </tr>
    <tr>
      <td>LPG/CNG Kit</td>
      <td><input type="text" name="txtlpgcngkit" id="txtlpgcngkit" class="form-control"></td>
      <td>X Pass</td>
      <td><input type="text" name="txtxpass" id="txtxpass" class="form-control"></td>
      <td>&nbsp;</td>
      <td><!-- <input type="text" name="textfield28" id="textfield28"> --></td>
    </tr>
    <tr>
      <td>Anti Theft</td>
      <td><input type="text" name="txtantitheft" id="txtantitheft" class="form-control"></td>
      <td>Owner Driver</td>
      <td><input type="text" name="txtownerdriver" id="txtownerdriver" class="form-control"></td>
      <td>&nbsp;</td>
      <td><!-- <input type="text" name="textfield29" id="textfield29"> --></td>
    </tr>
    <tr>
      <td>Wiaa Membership</td>
      <td><input type="text" name="txtwiaamembership" id="txtwiaamembership" class="form-control"></td>
      <td>Legal Liability to Driver</td>
      <td><input type="text" name="txtlegalliability" id="txtlegalliability" class="form-control"></td>
      <td>&nbsp;</td>
      <td><!-- <input type="text" name="textfield30" id="textfield30"> --></td>
    </tr>
    <tr>
      <td>Vehicle for Handicapped</td>
      <td><input type="text" name="txtvehiclehandicap" id="txtvehiclehandicap" class="form-control"></td>
      <td>Llegal Liability to Emp.</td>
      <td><input type="text" name="txtlegalliabilityemp" id="txtlegalliabilityemp" class="form-control"></td>
      <td>Package Premium</td>
      <td><input type="text" name="txtpackagepremium" id="txtpackagepremium" class="form-control"></td>
    </tr>
    <tr>
      <td>No Claim Bonus</td>
      <td><input type="text" name="txtnoclaimbonus" id="txtnoclaimbonus" class="form-control"></td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td><strong>Total OD </strong></td>
      <td><input type="text" name="txttotalod" id="txttotalod" class="form-control"></td>
      <td><strong>Total Liability</strong></td>
      <td><input type="text" name="txttotalliability" id="txttotalliability" class="form-control"></td>
      <td><strong>Net Premium</strong></td>
      <td><input type="text" name="txtnetpremium" id="txtnetpremium" class="form-control"></td>
    </tr>  
   
  </tbody> 
</table>
<div class="col-md-12" style="text-align: center;">  	   
  	   <input class="btn btn-primary" type="Submit" name="Submit" style="width: 100px;">
</div>
</form>  
</div>
</div>
</body>
</div>
</div>
</div>
@endsection