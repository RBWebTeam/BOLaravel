
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>BOOK A LAB APPOINTMENT </title>
<meta name="viewport" content="width=device-width, initial-scale=1">

<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>



<style>
.modal-header {background-color: #00476f !important;}
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
ul li {margin:2px; padding:1px !important;}
.table>tbody>tr>td {padding:6px;}
.logo-center {margin:0 auto;display:block;}
.pad {padding:10px; font-weight:normal; font-size:16px;}
.glyphicon { font-size:15px;margin:0 auto;display:table;margin-top:8px;}
.down-arrow {padding:10px 20px;}
.down-arrow:hover {colo:#999;text-decoration:none; opacity:0.7;}
.amunt1 {background:#999;}
.bg-gray li {list-style-type:none; padding-left:15px !important;float:left;width: 48%;}
.bg-gray li .glyphicon-ok {float: left;margin-top: 1px;left: -16px;vertical-align: middle;font-size:11px;height:19px;}
.list1 {margin:0px; padding:10px;}
.head1 {padding:10px;background:#eee;border:1px solid #ddd; font-size:15px;}
.input-1 {padding:10px;width:100%;border:none; border:1px solid #ddd;border-radius:3px; margin-bottom:15px;}
.button1 {border: 1px solid #f95f67; color:#f95f67; padding: 10px;background: #fff;width: 100%;margin: 0 auto; display: block; margin-bottom: 20px; margin-top: 20px;}
.button1:hover {text-decoration: none;color:#fff; background:#009ee3;border:1px solid #009ee3;}
label {font-size: 11px;color: #666;}
.btn-submit {
    background-color: #fff;
    border: 1px solid #ff5a60 !important;
    color: #ff5a60;
    border-radius: 0px;
    font-size: 15px;
    border: none;
    outline: none;
    text-transform: uppercase;
    width: 100%;
    outline: none;
}
.ripple-effect {
    position: relative;
    overflow: hidden;
    -webkit-transform: translate3d(0, 0, 0);
}
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


.height4 {height:210px; padding:10px; border:1px solid #dddddd;}
.divpartnerselect {padding:0px;}
.height4 h4 {margin-top:60px;}
.btndiv {margin:20px 0px;}
#tbltestlist tr {border-bottom: solid 1px #d7dadc !important;}
.bl-txt {color: #002d62; text-transform:uppercase;}
.divpartnerselect:hover {background:#f5f5f5;cursor: pointer;}


@media only screen and (max-width: 768px) {
    .container {
        padding:0px;
    }
	.col-md-8 {border:1px solid #eee;}
	.col-md-4 {border:1px solid #eee;border-right:0px; padding-left:0px;}
	.height4 {height:120px; padding:10px;}
	.height4 p {font-size:11px;}
	.height4 h4 {font-size:16px; margin-top:0px;}
	.divpartnerselect {padding:0px; float: left;}
  
	#btndiv {float:left;width:100%;bottom: 0px;padding: 5px;background: #ffffff;margin:10px 0px;}
	.modal-body {
    position: relative;
    padding: 15px;
    height: 450px !important;
    overflow: scroll !important;
}
}
</style>
<script>
$(document).ready(function(){
    $(".down-arrow").click(function(){
        $(".bg-gray").toggle();
    });

    getproviderlist();
});

function getproviderlist()
{
 $.ajax({ 
   url: "{{URL::to('providerlist')}}",
   method:"POST",
   data: $('#formprovidelist').serialize(),
   success: function(msg)  
    {
      var obj = JSON.parse(msg);

var arr = obj.d.service_provider_listdata;
var text = "";
for(var i = 0; i< arr.length;i++){

text+="<div class='col-md-12 divpartnerselect'   onclick=showDivw('"+arr[i].provider_id+"',this,'"+ arr[i].provider_name.replace(/ /g,'_')+"','"+arr[i].address.replace(/ /g,'_')+"','"+arr[i].visittype+"','"+arr[i].DCCode+"')>";

  if(arr[i].DCCode == "")
  {
    text += "<div class='col-md-4 col-xs-4 height4'><img src='images/Logos/blank.png' class='img-responsive' style=' margin:0 auto; display:block'/></div>";
  }
  else{
    text +="<div class='col-md-4 col-xs-4 height4'><img src='images/Logos/"+arr[i].DCCode+".png' style='margin:0 auto; display:block' class='img-responsive'/></div>";
  }
text +="<div class='col-md-8 col-xs-8 height4 height5'><h4>"+ arr[i].provider_name+"</h4><p>"+
  arr[i].address+"</p></div></div>";
}

$('#tblproviderlist').append(text);
 

    }
  });
}
function showDivw(id,row,name,address,visittype,dccode)
{
  $('.divpartnerselect').css("background-color","");
  $(row).css("background-color", "#f5f5f5");
  $('#txtprovider').val(id);
  $('#txtprovidername').val(name.replace(/_/g,' '));
  $('#txtprovideraddress').val(address.replace(/_/g,' '));
  $('#txtprovidervisitype').val(visittype);
  $('#txtproviderdccode').val(dccode);

  $('#btndiv').css('display','');
}
 $("#btnbook").click(function(){

    console.log($('#formprovidelist').serialize());
   $.ajax({ 
   url: "{{URL::to('Health-Assure-Partner')}}",
   method:"POST",
   data: $('#formprovidelist').serialize(),
  success: function(msg)  
   {
    console.log(msg);

    
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
<h5 class="text-center pad main-header header-middle" style="width:100%;">BOOK A LAB APPOINTMENT</h5>
 <div class="col-md-12">
 <br/>
  <br/>
   <br/>
 <img src="http://backoffice.magicfinmart.com/HealthPackages/HealthInsurance/images/health-assure-logo.jpg" class="logo-center" />
 <p class="text-center bl-txt">Health Check Up Plans selected by you</p>

 </div>
 
<form id="formprovidelist" method="POST">
 {{ csrf_field() }}
<div class="col-md-12">
  <table class="table table-bordered tbl2 box-shadow">
    <tbody>
      <tr>
        <td><p><b>Basic Profile</b></p><h5 class="text-danger-clr">{{$_GET["tcount"]}}Tests</h5> </td>
        <td colspan="2"><p class="text-center"><b>ACTUAL COST</b></p> <span class="amount amunt1">₹ <strike>{{$_GET["MRP"]}}</strike></span></td>
        <td colspan="2"><p class="text-center"><b>OFFER COST</b></p> <span class="amount">₹ {{$_GET["OfferPrice"]}}</span></td>
        <td><span class="down-arrow"><span class="glyphicon glyphicon-triangle-bottom"></span></span> </td>
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
<div class="col-md-12"><p class="text-center head1">Select your preferred lab from the list below</p></div>
<div class="col-md-12">
<div id="tblproviderlist" style="border: 1px #ccc; margin-bottom: 5px;">                     
<input type="hidden" name="txtPackName" id="txtPackName" value="{{$_GET["PackName"]}}">
<input type="hidden" name="txtfbaname" id="txtfbaname" value="{{$_GET["fbaname"]}}">

<input type="hidden" name="txtfbaid" id="txtfbaid" value="{{$_GET["fbaid"]}}">
<input type="hidden" name="txtPackcode" id="txtPackcode" value="{{$_GET["Packcode"]}}">
<input type="hidden" name="txttcount" id="txttcount" value="{{$_GET["tcount"]}}">
<input type="hidden" name="txtMRP" id="txtMRP" value="{{$_GET["MRP"]}}">
<input type="hidden" name="txtOfferPrice" id="txtOfferPrice" value="{{$_GET["OfferPrice"]}}">
<input type="hidden" name="txthomevisit" id="txthomevisit" value="{{$_GET["homevisit"]}}">
<input type="hidden" name="txtfasting" id="txtfasting" value="{{$_GET["fasting"]}}">
<input type="hidden" name="latitude" id="latitude" value="{{$_GET["latitude"]}}">
<input type="hidden" name="longitude" id="longitude" value="{{$_GET["longitude"]}}">


<input type="hidden" name="txtprovider" id="txtprovider">
<input type="hidden" name="txtprovidername" id="txtprovidername">
<input type="hidden" name="txtprovideraddress" id="txtprovideraddress">
<input type="hidden" name="txtprovidervisitype" id="txtprovidervisitype">
<input type="hidden" name="txtproviderdccode" id="txtproviderdccode">
<input type="hidden" name="txtID" id="txtID" value="{{$_GET["ID"]}}">
<div class="col-md-12"></div>

<div class="col-md-12"></div>
</div>
</div>

<div id="btndiv" class="text-center col-md-12">
 <input type="submit" name="btnbook" value="BOOK THIS TEST" onclick="" id="btnbook" class="button1">

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
                          <table id="tbltestlist" style="width:100%"></table>

                        </div>
                   </div>
               </div>
</div>

