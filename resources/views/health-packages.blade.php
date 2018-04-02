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
img {margin:0 auto; display:block;}
.box-shadow {box-shadow:1px 3px 3px 0px #ccc;}
ul li {    float: left;display: inherit;width:48%;}
.list1 .glyphicon {margin-top: 1px;float: left; margin-right: 10px;}
.list1 {float: left;width: 100%;background: #e2e2e2;}
</style>



<form id="health-insurance" method="POST">
   {{ csrf_field() }}
<div class="header-middle text-center" style="width:100%;">HEALTH CHECK-UP PLAN</div>  
    
<div class="container padd-top">
 <div class="col-md-12">
 <br>
 <img src="images/health-assure-logo.jpg" class="logo-center" />
<h5 class="text-center">ADVISOR</h5>
<h4 class="text-center">LIVE FBA</h4>
<p class="text-center"> (+91-9292929292)</p>
<p class="text-center">HEALTH CHECK-UP PLANS AVAILABLE FOR YOU</p>
 </div>
 


<!-- <div class="col-md-12">
  <table id="health" class="table table-bordered tbl2 box-shadow">
    <tbody>
      
        <td><p><b>Basic Profile</b></p><h5 class="text-danger">62 Tests</h5> </td>
        <td colspan="2"><p class="text-center">ACTUAL COST</p> <a href="javascript:void(0)" class="amount amunt1"><strike>13949</strike></a></td>
        <td colspan="2"><p class="text-center">OFFER COST</p> <a href="javascript:void(0)" class="amount">13949</a></td>
      <td><a href="javascript:void(0)" class="down-arrow"><span class="glyphicon glyphicon-chevron-down"></span></a> </td>
        </tr>
   <tr>
   <td class="no-padding bg-gray" colspan="6" style="display:none;">
   <ul class="list1" >
   <li><span class="glyphicon glyphicon-ok"></span> Zero Depreciation (1802.86) </li>
   <li><span class="glyphicon glyphicon-ok"></span> Key Lock</li>
  <li><span class="glyphicon glyphicon-ok"></span> NCB Protection  </li>
   <li><span class="glyphicon glyphicon-ok"></span> Zero Depreciation </li>
   </ul>
   </td>
  </tr>
  </tbody>
</table>

</div> -->

<div>
  <table id="docs" class="table table-bordered tbl2 box-shadow">
  </table>
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
                        <!-- <td><img src="images/thyr-diagnostics.jpg" class="img-responsive" style="display:none;"><span class="ink animate" style="height: 383px; width: 383px; top: -143.5px; left: -117px;"></span></td> -->
                    </tr>
                </tbody></table>
</div>


</div>
</form>
<script type="text/javascript">
$(document).ready(function(){
    gethealthpackage();
});

function gethealthpackage()
{
        var v_token = "{{csrf_token()}}";
        
     $.ajax({  
         type: "POST",  
         url: "{{URL::to('health-insurance-packages')}}",
         data : {'_token': v_token},
         success: function(msg){



        var respon = JSON.parse(msg);

          var tablerows = new Array();
          
          $.each(respon.d.lstPackageDetails, function( index, value ) {

          // console.log(msg.d.lstPackageDetails[0].OfferPrice);
          // console.log(msg.d.lstPackageDetails[0].PackName);
          // console.log(msg.d.lstPackageDetails[0].MRP);

          // console.log(msg.d.lstPackageDetails);
   
      
            tablerows.push('<tbody><td><p><b>' + value.PackName + '</b></p><h5 class="text-danger">' + value.cnt + '&nbsp;Tests</h5> </td><td colspan="2"><p class="text-center">ACTUAL COST</p> <a href="javascript:void(0)" class="amount amunt1"><strike>' + value.MRP + '</strike></a></td><td colspan="2"><p class="text-center">OFFER COST</p> <a href="javascript:void(0)" onclick="offer_price(\'' + value.PackName + '\',' + value.PackCode + ',' + value.OfferPrice + ',' + value.MRP + ',' + value.cnt + ',\'' + value.Fasting + '\',\'' + value.VisitType + '\')" class="amount">' + value.OfferPrice + '</a></td><td><a onclick="img_delete(' + value.PackCode + ')" href="javascript:void(0)" class="down-arrow"><span  class="glyphicon glyphicon-chevron-down"></span></a></td></tr><tr><td  class="no-padding bg-gray' + value.PackCode + '" colspan="6" style="display:none;"><ul class="list1" id="Depreciation' + value.PackCode + '" ></ul></td></tr></tbody>');
          }); 

            if(msg){
                            $('#docs').empty().append('<tbody><tr>'+tablerows+'</tr></tbody>');
                         }else{
                            $('#docs').empty().append('No Result Found');
                         }
               
      }   
     });

}
</script> 

<!-- <script>

    $(".down-arrow").click(function(id,index){
      alert('okae');
        $(".bg-gray").toggle();
    });
</script>  -->  
<script type="text/javascript">
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
         // ParamDetails=Array();
       for (var i =0; i<len; i++) {
          //console.log(msg.d.lstPackParameter[i]);
            
            // Arra=Array(123,123);
           arr.push('<li><span class="glyphicon glyphicon-ok"></span>'+msg.d.lstPackParameter[i].Name+'&nbsp;<a href="javascript:void(0)"   onClick=" ParamDetailsFN('+i+')" data-toggle="modal" data-target="#health_insurance">'+msg.d.lstPackParameter[i].ParamDetails.length+'-Tests</a></li>');

          

       }

 
       $('#Depreciation'+PackCode).append(arr);
               
      }   
     });


};
 

 function ParamDetailsFN(i){
arr=Array();
$('#test_analysis').empty();

  // console.log(x[i].ParamDetails);
  var test_analysis = x[i].ParamDetails;
  // alert(test_analyasis);
   for (var j =0; j<test_analysis.length; j++) {
    arr.push('<li>'+test_analysis[j]+'</li>');
}
  $("#test_analysis").append(arr);
 }
</script>  

<script type="text/javascript">
  function offer_price(PackName,PackCode,OfferPrice,MRP,cnt,Fasting,VisitType)
  {
     // var PackName=PackName;
     // alert(PackName);
      window.location.href ="{{URL::to('HealthAssure')}}?PackName="+PackName+"&Packcode="+PackCode+"&OfferPrice="+OfferPrice+"&MRP="+MRP+"&tcount="+cnt+"&fasting="+Fasting+"&homevisit="+VisitType+"&fbaid=1976&fbaname=LIVE%20FBA&mob=9292929292#";
  };
</script>    
			    
@endsection	

<div class="modal fade " tabindex="-1" role="dialog" id="health_insurance">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title"><b>TESTS:</b></h4>
        <div class="modal-body">
        <h5 style="color: black"><ul id="test_analysis"></ul><h5>
        
      </div>
      </div>
    </div>
  </div>
</div>


	
            