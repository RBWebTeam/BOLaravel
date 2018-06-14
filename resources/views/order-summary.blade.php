<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">

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
.bg-gray li .glyphicon-ok {float: left;margin-top: 1px;left: -16px;vertical-align: middle;font-size:13px;height:19px;}
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
.table {font-size:13px;}
#btndiv {float:left;width:100%;position:relative;z-index: 10000;bottom: 0px;padding:20px;background: #ffffff;}

@media only screen and (max-width: 768px) {
    .container {
        padding:0px;
    }
}
</style>
<script>
$(document).ready(function(){
    $(".down-arrow").click(function(){
        $(".bg-gray").toggle();
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
<!-- <header class="main-header"> -->
        <div class="header-middle text-center" style="width:100%;">HEALTH CHECK-UP PLAN</div>
<!-- </header> -->

 <div class="col-md-12" style="top:0px; padding-top:20px;position:fixed;z-index:1000; background:#fff; display:block; height:150px; width:100%;">
 <div>

 <img src="images/health-assure-logo.jpg" class="logo-center" />
<h5 class="text-center pad">Health Check Up Plans selected by you</h5>
</div>
 </div>
 
 <div class="container padd-top" style="margin-top:160px;">
 
<?php if(isset($_GET['product'])){?>
                <input type="hidden" name="product_id" id="product_ids" value="<?php echo $_GET['product'];?>">
                <?php }else{?>
                <input type="hidden" name="product_id" id="product_ids" value="12">
                <?php }?>

                <?php if(isset($_GET['brokerid'])){?>
                <input type="hidden" name="brokerid" id="brokerid" value="<?php echo isset($_GET['brokerid'])?$_GET['brokerid']:'';?>">
                <?php }else{?>
                <input type="hidden" name="brokerid" id="brokerid" value="0">
                <?php }?>

                <?php if(isset($_GET['app'])){?>
                <input type="hidden" name="app" id="appid" value="<?php echo isset($_GET['app'])?$_GET['app']:'';?>">
                <?php }else{?>
                <input type="hidden" name="app" id="appid" value="0">
                <?php }?>

                

                <?php if(isset($_GET['empcode'])){?>
                <input type="hidden" name="empcode" id="empcode" value="<?php echo isset($_GET['empcode'])?$_GET['empcode']:'';?>">
                <?php }else{?>
                <input type="hidden" name="empcode" id="empcode" value="0">
                <?php }?>


<div class="col-md-12">
  <table class="table table-bordered tbl2">
    <tbody>
      
        <td><p><b>Basic Profile</b></p><h5 class="text-danger">{{$_GET["tcount"]}} Tests</h5> </td>
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

<div class="col-md-12"><p class="text-center head1">Summary of your Booking</p></div>

<div class="col-md-12">
<div>
 <table class="table table-bordered tbl1">
 <tr>
    <td  colspan="2" class="text-center bg-primary1">Personal Particulars</td>
 </tr>
 @foreach($query as $val)
 <tr>
    <td class="bg-info">Name</td>
  <td>{{$val->FirstName}}</td>
 </tr>
 <tr>
    <td class="bg-info">Address</td>
  <td>{{$val->FlatDetails}} {{$val->StreeDetails}} {{$val->Landmark}}</td>
 </tr>
 <tr>
    <td class="bg-info">Mobile No.</td>
  <td>{{$val->Mobile}}</td>
 </tr>
 <tr>
    <td class="bg-info">Email ID</td>
  <td>{{$val->EmailID}}</td>
 </tr>

 <tr>
    <td  colspan="2" class="text-center bg-primary1">Health Check Up Details</td>
 </tr>

 <tr>
    <td class="bg-info">Health Plan</td>
  <td>{{$healthplan}}</td>
  </tr>

<tr>
    <td class="bg-info">Price</td>
  <td><h5 id="pmrp" class="health-amt-rupee"><strike style="color:red;">Rs.{{$mrp}}</strike> special price for you</h5>
    <h3 style="color:#0070c0;">Rs. {{$offerprice}}</h3>
  </td>
  
 </tr>
 <tr>
    <td class="bg-info">Lab selected</td>
  <td>{{$lab}}</td>
 </tr>
 <tr>
    <td class="bg-info">Lab Address</td>
  <td>{{$LabAddress}}</td>
 </tr>
 <tr> 
  <td class="bg-info">Blood / Urine Sample</td>
   
  <td><?php if($homevisit!="CV"){
    echo "Will visit lab to give the sample ";
  } ?></td>
 </tr> 

 <tr>
    <td class="bg-info">Appointment Date / Time</td>
  <td>{{$val->PickUpDate}} {{$val->PickUptime}}</td>
 </tr>
 <tr>
    <td class="bg-info">Fasting condition</td>
  <td><?php if($fasting=="Y") { 
    echo "10-12 hours fasting required";} else{ echo "-";}?></td>
 </tr>
  @endforeach
 </table>
<div>
</div>

</div>
</div>

<div id="btndiv" class="col-md-12 text-center">
<a type="button" class="button1 col-md-12" href="{{$url}}">CONFIRM & PAY</a>
</div>

</div>


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

</body>
</html>

