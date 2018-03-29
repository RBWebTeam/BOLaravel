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
});
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
      <tr>
        <td><p><b>Basic Profile</b></p><h5 class="text-danger">{{$_GET["tcount"]}}Tests</h5> </td>
        <td colspan="2"><p class="text-center">ACTUAL COST</p> <span class="amount amunt1"><strike>{{$_GET["MRP"]}}</strike></span></td>
        <td colspan="2"><p class="text-center">OFFER COST</p> <span class="amount">{{$_GET["OfferPrice"]}}</span></td>
        <td><span class="down-arrow"><span class="glyphicon glyphicon-chevron-down"></span></span> </td>
     </tr>
  </tbody>
</table>
</div>
<div class="col-md-12"><p class="text-center head1">Select your preferred lab from the list below</p></div>
<div class="col-md-12">
<table class="table table-bordered table-hover" style="border: 1px #ccc; margin-bottom: 5px;">
                    
                        <tbody>
               
                          <tr onclick="" id="" style="cursor: pointer; background: rgb(255, 255, 255);" class="selectedtr">
                            <td>
                                <img src="images\Logos\SRL.png" class="img-responsive"></td>
                            <td>
                                <h4>SRL Wellness Centre - Goregaon</h4>
                                <p>Prime Square Building, Plot no.1, Gaiwadi Industrial Estate, Near Kamat Club &amp; Patel Auto, S V Road, Goregaon (West)-0km</p>
                            </td>
                          </tr>
                
                       
                        </tbody>
</table>
</div>
</div>
</body>
</html>
@endsection