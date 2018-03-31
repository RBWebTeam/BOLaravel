@extends('include.master')
@section('content')
<style>
body {font-size:13px;}
p {color:#333;}
.blu-heading {padding:10px;border:1px solid #4d62b5;color:#4d62b5;font-size: 16px;}
.red-txt {color:#b60d2a;}
.tbl2 td {text-align:left;}
.tbl2 p {color:#666;font-size: 11px;}
.box-shadow {box-shadow: 1px 1px 3px 0px #ccc;}
.amount {background: #f95f67;padding: 5px 15px;margin: 4px;font-size: 16px;color: #fff; display:block; text-align:center}
.amount:hover {color:#fff;text-decoration:none;}
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
.main-header {position: fixed;height: 48px;z-index: 9999;background: #009ee3;left: 0;right: 0;margin-bottom:15px;}
.header-middle {float: left;width: 80%;color: #fff;margin-top: 4px;padding: 8px 0 0 0;text-align: center;font-size: 18px;}
.padd-top {padding-top:40px;}
.input-group-addon {padding: 4px 12px}
.bg-primary1 {color: #3c84a9;background-color: #9bd8f7; text-transform:uppercase;}
.tbl1 tr td {color:#666;}
</style>
<script>
$(document).ready(function(){
    $(".down-arrow").click(function(){
        $(".bg-gray").toggle();
    });
});
</script>

<!-- <header class="main-header"> -->
        <div class="header-middle text-center" style="width:100%;">HEALTH CHECK-UP PLAN</div>
<!-- </header> -->
<div class="container padd-top">
 <div class="col-md-12">
 <br>
 <img src="images/health-assure-logo.jpg" class="logo-center" />
<h5 class="text-center pad">Health Check Up Plans selected by you</h5>
 </div>
 
<?php if(isset($_GET['product'])){?>
                <input type="text" name="product_id" id="product_ids" value="<?php echo $_GET['product'];?>">
                <?php }else{?>
                <input type="text" name="product_id" id="product_ids" value="12">
                <?php }?>

                <?php if(isset($_GET['brokerid'])){?>
                <input type="text" name="brokerid" id="brokerid" value="<?php echo isset($_GET['brokerid'])?$_GET['brokerid']:'';?>">
                <?php }else{?>
                <input type="text" name="brokerid" id="brokerid" value="0">
                <?php }?>

                <?php if(isset($_GET['app'])){?>
                <input type="text" name="app" id="appid" value="<?php echo isset($_GET['app'])?$_GET['app']:'';?>">
                <?php }else{?>
                <input type="text" name="app" id="appid" value="0">
                <?php }?>

                

                <?php if(isset($_GET['empcode'])){?>
                <input type="text" name="empcode" id="empcode" value="<?php echo isset($_GET['empcode'])?$_GET['empcode']:'';?>">
                <?php }else{?>
                <input type="text" name="empcode" id="empcode" value="0">
                <?php }?>

<div class="col-md-12">
  <table class="table table-bordered tbl2">
    <tbody>
      
        <td><p><b>Basic Profile</b></p><h5 class="text-danger">62 Tests</h5> </td>
        <td colspan="2"><p class="text-center">ACTUAL COST</p> <a href="#" class="amount amunt1"><strike>13949</strike></a></td>
        <td colspan="2"><p class="text-center">OFFER COST</p> <a href="#" class="amount">13949</a></td>
      <td><a href="#" class="down-arrow"><span class="glyphicon glyphicon-chevron-down"></span></a> </td>
        </tr>
    
   <tr>
   <td class="no-padding bg-gray" colspan="6" style="display:none;">
   <ul class="list1">
   <li><span class="glyphicon glyphicon-ok"></span> Zero Depreciation (1802.86) </li>
   <li><span class="glyphicon glyphicon-ok"></span> Key Lock</li>
  <li><span class="glyphicon glyphicon-ok"></span> NCB Protection  </li>
   <li><span class="glyphicon glyphicon-ok"></span> Zero Depreciation </li>
   </ul>
   </td>
  </tr>
  
  </tbody>
</table>

</div>

<div class="col-md-12"><p class="text-center head1">Summary of your Booking</p></div>

<div class="col-md-12">
<div class="table-responsive">
 <table class="table table-bordered tbl1">
 <tr>
    <td  colspan="2" class="text-center bg-primary1">Personal Particulars</td>
 </tr>
 <tr>
    <td class="bg-info">Name</td>
  <td>SAMEER NAIK</td>
 </tr>
 <tr>
    <td class="bg-info">Address</td>
  <td>G SEGT TREW MUMBAI</td>
 </tr>
 <tr>
    <td class="bg-info">Mobile No.</td>
  <td>9808090900</td>
 </tr>
 <tr>
    <td class="bg-info">Email ID</td>
  <td>samnaik@gmail.com</td>
 </tr>
 <tr>
    <td  colspan="2" class="text-center bg-primary1">Health Check Up Details</td>
 </tr>
 <tr>
    <td class="bg-info">Health Plan</td>
  <td>Basic Profile</td>
 </tr>
 <tr>
    <td class="bg-info">Price</td>
  <td>Rs. 913.00 special price for you</td>
 </tr>
 <tr>
    <td class="bg-info">Lab selected</td>
  <td>Lifecare Diagnostics and Research Pvt Ltd</td>
 </tr>
 <tr>
    <td class="bg-info">Lab Address</td>
  <td>1st Floor, Sunshine, Opp. Shastri Nagar, Lokhandwala Complex, Andheri (W), -3km</td>
 </tr>
 <tr>
    <td class="bg-info">Blood / Urine Sample</td>
  <td>Will visit lab to give the sample</td>
 </tr>
 <tr>
    <td class="bg-info">Appointment Date / Time</td>
  <td>30-03-2018 08.00 TO 08.30 AM</td>
 </tr>
 <tr>
    <td class="bg-info">Fasting condition</td>
  <td>--</td>
 </tr>
 </table>
<div>
</div>

</div>
</div>

<div class="col-md-12">
<input type="button" class="button1 col-md-12" value="CONFIRM & PAY">
</div>

</div>



@endsection 

