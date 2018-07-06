<!DOCTYPE html>
<html>
<head>

        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">

        <title>Finmart Home page</title>
        <link rel="icon" href="favicon.png" type="image/x-icon" />
        <link type="text/css" rel="stylesheet" href="{{url('stylesheets/sidebar.css')}}">
        <link type="text/css" rel="stylesheet" href="{{url('stylesheets/bootstrap.min.css')}}"> 
        <link type="text/css" rel="stylesheet" href="{{url('stylesheets/style.css')}}">
        <link href="{{url('stylesheets/datepicker.css')}}" rel="stylesheet" type="text/css" />
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <link type="text/css" rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">


<style>
.modal-header {background-color: #00476f !important;}
.modal-dialog {margin-top:70px !important;}
body {font-size:13px;}
p {color:#333;}
td p b {width:26%;white-space: initial;}
.blu-heading {padding:10px;border:1px solid #4d62b5;color:#4d62b5;font-size: 16px;}
.red-txt {color:#b60d2a;}
.tbl2 td {text-align:left;}
.tbl2 p {color:#000;font-size: 11px;}
.box-shadow {box-shadow: 1px 1px 3px 0px #ccc;}
.amount {background: #f95f67;padding: 5px 15px;margin: 4px;font-size: 16px;color: #fff; display:block; text-align:center}
.amount:hover {color:#fff;text-decoration:none;}
.center {display: block;margin:0 auto;}
.brd-left {border-right:1px solid #eee !important;}
.bg-gray {background:#f1f1f1;}
.glyphicon {    font-weight: normal;font-size: 10px; color:#666;margin-right:4px;}
ul li {margin:2px; padding:1px !important;}
.table>tbody>tr>td {padding:6px;}
.logo-center {margin:0 auto;display:block;}
.pad {padding:10px; font-weight:normal; font-size:16px;}
.glyphicon { font-size:15px;margin:0 auto;display:table;margin-top:8px;}
.down-arrow {padding:10px 20px;}
.down-arrow:hover {colo:#999;text-decoration:none; opacity:0.7;}
.amunt1 {background:#999;}
.table {margin-bottom:5px !important;}
.bg-gray li {list-style-type:none; padding-left:15px !important;float:left;width: 48%;font-size:12px;color: #747474;}
.bg-gray li .glyphicon-ok {float: left;left: -16px;vertical-align: middle;font-size:11px;font-weight:normal;height:10px;line-height: 0px;}
.bg-gray li .glyphicon-ok:active {text-decoration:none;}
.list1 {margin:0px; padding:2px;}
.head1 {padding:10px;background:#eee;border:1px solid #ddd; font-size:15px;}
.input-1 {padding:10px;width:100%;border:none; border:1px solid #ddd;border-radius:3px; margin-bottom:15px;}
.button1 {border:2px solid #f95f67; padding:10px;background:#fff; margin-bottom:20px; width:100%;}
label {font-size: 11px;color: #666;}
.table>tbody>tr>td span {color:#999;cursor:pointer;}
.main-header {position: fixed;height: 48px;z-index: 9999;background: #009ee3;left: 0;right: 0;margin-bottom:15px;}

.padd-top {padding-top:40px;}
img {margin:0 auto; display:block;}
.box-shadow {box-shadow:1px 3px 3px 0px #ccc;}

.main-header {
    position: fixed;
    height: 48px;
	line-height:50px;
    z-index: 9999;
    background: #009ee3;
    left: 0;
    right: 0;
}
.header-middle {
    float: left;
    width: 80%;
    color: #fff;
    text-align: center;
    font-size: 18px;
}

.bl-txt {color: #002d62;}
.text-danger-clr {color:#ff5c61;}

@media only screen and (max-width: 768px) {
.modal-body {
    position: relative;
    padding: 15px;
    height: 450px !important;
    overflow: scroll !important;
}
}
</style>




</head>
<body>

<form id="health-insurance" method="POST">
   {{ csrf_field() }}
<div class="text-center main-header header-middle" style="width:100%;">HEALTH CHECK-UP PLAN</div>  
    
<div class="padd-top">
 <div class="col-md-12">
 <br>
 <img src="images/health-assure-logo.jpg" class="logo-center" />
<h5 class="text-center">ADVISOR</h5>
<h4 class="text-center">LIVE FBA</h4>
<p class="text-center"><img src="images/phone-icon.png" style="display:-webkit-inline-box;"/> (+91-9292929292)</p>
<p class="text-center bl-txt">HEALTH CHECK-UP PLANS AVAILABLE FOR YOU</p>
 </div>
 <input type="hidden" value="{{$_GET["FBAID"]}}" id="txtfbaid" name="txtfbaid"/> 
 <input type="hidden" value="{{$_GET["FBAName"]}}" id="txtfbaname" name="txtfbaname"/>  
 <input type="hidden" value="{{$_GET["FBAMobile"]}}" id="txtfbamobile" name="txtfbamobile"/>   
 <input type="hidden" value="{{$_GET["PackCode"]}}" id="txtpackcode" name="txtpackcode"/>

<div id="divtbl">

</div>



<div class="col-md-12">
  <h5 class="text-center">OUR LAB PARTNERS</h5>
  
  <table class="table table-bordered" style="border:1px solid">
                    <tbody><tr>
                        <td><img src="images/metro-diagnostics.jpg" class="img-responsive"><span class="ink animate" style="height: 383px; width: 383px; top: -149.5px; left: 146px;"></span></td>
                        <td><img src="images/srl-diagnostics.jpg" class="img-responsive"><span class="ink animate" style="height: 383px; width: 383px; top: -150.5px; left: 61px;"></span></td>
                        <td><img src="images/sub-diagnostics.jpg" class="img-responsive"><span class="ink animate" style="height: 383px; width: 383px; top: -151.5px; left: -106px;"></span></td>
                    </tr>
                    <tr>
                        <td><img src="images/Healthspring.jpg" class="img-responsive">
                        <span  style="height: 383px; width: 383px; top: -143.5px; left: 74px;"></span></td>
                        <td><img src="images/apollo.jpg" class="img-responsive"><span class="ink animate" style="height: 383px; width: 383px; top: -136.5px; left: 134px;"></span></td> 
                        <td>&nbsp;</td>						
                    </tr>
                </tbody></table>
</div>


</div>
</form>

<div id="health_insurance" class="modal fade dignostic-modal testCheckup">
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


<script type="text/javascript">
$(document).ready(function(){
    gethealthpackage();
});

function gethealthpackage()
{

//alert('test succeed');
        var v_token = "{{csrf_token()}}";
        
     $.ajax({  
         type: "POST",  
         url: "{{URL::to('health-insurance-packages')}}",
         data : {'_token': v_token},
         success: function(msg){

        //var respon = JSON.parse(msg);

          //var tablerows = new Array();
          var strdivrows = "";
		  
          $.each(msg.d.lstPackageDetails, function( index, value ) {   
      
	strdivrows = strdivrows +'<div class="col-md-12"><table class="table  tbl2 box-shadow"><tbody>';
	    
	strdivrows = strdivrows +'<td width="26%"><p><b>'+value.PackName+'</b></p><h5 class="text-danger-clr">'+value.cnt+' Tests</h5></td>';
	strdivrows = strdivrows +'<td colspan="2"><p class="text-center"><b>ACTUAL COST</b></p> <a href="javascript:void(0)" class="amount amunt1">₹ <strike> '+value.MRP+'</strike></a></td>';
	strdivrows = strdivrows +'<td colspan="2"><p class="text-center"><b>OFFER COST</b></p> <a href="javascript:void(0)" onclick="offer_price(\'' + value.PackName + '\',' + value.PackCode + ',' + value.OfferPrice + ',' + value.MRP + ',' + value.cnt + ',\'' + value.Fasting + '\',\'' + value.VisitType + '\')" class="amount">₹ '+value.OfferPrice+'</a></td>';
    strdivrows = strdivrows +'<td style="border-left:1px solid #ccc;"><a onclick="img_delete(' + value.PackCode + ')" href="javascript:void(0)" class="down-arrow"><span class="glyphicon glyphicon-triangle-bottom"></span></a> </td>';
    strdivrows = strdivrows +'</tr><tr><td class="no-padding bg-gray bg-gray'+value.PackCode+'" colspan="6" style="display:none;"><ul id="Depreciation'+value.PackCode+'" class="list1">';

   strdivrows = strdivrows +'</ul></td></tr></tbody></table></div>';
	  
         }); 

$('#divtbl').empty().append(strdivrows);
               
      }   
     });

}

var x;
 function img_delete(PackCode){
	 
  var PackCode=PackCode;
   var v_token = "{{csrf_token()}}";
  
$(".bg-gray"+PackCode).toggle();

$('#Depreciation'+PackCode).empty();

  $.ajax({  
         type: "POST",  
         url: "{{URL::to('health-insurance-analysis')}}",
         data : {'PackCode': PackCode,'_token': v_token},
         success: function(msg){
			
			 
          x=msg.d.lstPackParameter;
          len=msg.d.lstPackParameter.length;
          arr=Array();
          Ar=[];

       for (var i =0; i<len; i++) {

          if(msg.d.lstPackParameter[i].ParamDetails.length > 0){  
           arr.push('<li><span class="glyphicon glyphicon-ok"></span>'+msg.d.lstPackParameter[i].Name+'&nbsp;<a href="javascript:void(0)"   onClick=ParamDetailsFN('+i+',"'+msg.d.lstPackParameter[i].Name.replace(/ /g,'_')+'") data-toggle="modal" data-target="#health_insurance">'+msg.d.lstPackParameter[i].ParamDetails.length+'-Tests</a></li>');
        }
        else
        {
          arr.push('<li><span class="glyphicon glyphicon-ok"></span>'+msg.d.lstPackParameter[i].Name+'&nbsp;</li>');
        }
       }
		
       $('#Depreciation'+PackCode).empty().append(arr);
               
      }   
     });


};
 

 function ParamDetailsFN(i,name){

$('#tbltestlist').empty();
$('#testHead').empty();
$('#testHead').append(name.replace(/_/g,' ')+" Test");

  var test_analysis = x[i].ParamDetails;

  var text = "";

   for (var j =0; j<test_analysis.length; j++) {
    text = text + "<tr style='height:40px;border-bottom:solid 1px black;'><td>"+test_analysis[j]+"</td></tr>";

}
  $("#tbltestlist").append(text);
 }
</script>  

<script type="text/javascript">
  function offer_price(PackName,PackCode,OfferPrice,MRP,cnt,Fasting,VisitType)
  {
      window.location.href ="{{URL::to('HealthAssure')}}?PackName="+PackName+"&Packcode="+PackCode+"&OfferPrice="+OfferPrice+"&MRP="+MRP+"&tcount="+cnt+"&fasting="+Fasting+"&homevisit="+VisitType+"&fbaid=1976&fbaname=LIVE%20FBA&mob=9292929292#";
  };
</script>    
  

<script>
$(document).ready(function(){
    $(".down-arrow span").click(function(){
        $("span").removeClass("glyphicon-triangle-bottom");
    });
});
</script>
</body>
</html>


	
            