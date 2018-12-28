<!DOCTYPE html>
<html>
<head>
<style type="text/css">
  
div.c {
    font-size: 150%;
}
.modal-header {
    background: #a9d8ec !important;
    border-bottom: 1px solid #8bc7e0 !important;
}

@media (min-width: 576px) {
.modal-dialog {max-width: 500px;}
}
</style>

<div id="btnsendmail" class="modal fade" role="dialog">
  <div class="modal-dialog">
   <div class="modal-content modal-md">
      <div class="modal-body">
       <div class="c" id="chkmail"></div>
        </div>
      <div class="modal-body">
      <div style="color: blue;" id="btnsendmail" class="btnsendmail">
       <!-- <div class="modal-footer"> -->
          <button type="button" class="btn btn-default" data-dismiss="modal" style="margin-left: 392px">Close</button>
     <!--    </div> -->
      </div>
      </div>
    </div>
  </div>
</div>




<title>Finmart</title>

<meta name="viewport" content="width=device-width, initial-scale=1.0">

<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

<style>
body {background:#f6f6f6;margin-top:15px;}
.white-bg {margin-bottom:20px;background:#fff;border:1px solid #f1f1f1; padding:10px; text-align:center;}
.btn-common {margin-bottom:10px; width:150px; border-radius:0px;-webkit-transition-duration: 0.4s;transition-duration: 0.4s;}
.img-center {margin:0 auto; display:block;-webkit-transition-duration: 0.4s;transition-duration: 0.4s;}

.white-bg:hover .img-center {transform: scale(1.1);-webkit-transition-duration: 0.4s;transition-duration: 0.4s;} 

@media only screen and (max-width: 768px) {
.col-md-8 {padding:0px;}
.container {padding:0px;}
}
</style>
</head>
<form method="get" id="sendcomimailfrm">
  {{ csrf_field() }}

  <input type="hidden" name="fbaid" value="{{$fbaid}}">
<body>


<div class="container">
<div class="col-md-8 col-md-offset-2">

<div class="col-md-6 col-xs-12">
<div class="white-bg">
<img src="../images/icon1.png" class="img-responsive img-center"/>
<button class="btn btn-danger btn-common">Service Request <span></span></button>
</div>
</div>

<div class="col-md-6 col-xs-12">
<div class="white-bg">
<img src="../images/icon2.png" class="img-responsive img-center"/>
<a class="btn btn-danger btn-common" data-toggle="modal" data-target="#btnsendmail"  href="#" id="btnsendmail" name="btnsendmail" onclick="comimailssend()">Commission<span></span></a>
</div>
</div>

 <!--  <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#btnsendmail">Open Modal</button> -->

<div class="col-md-6 col-xs-12">
<div class="white-bg">
<img src="../images/icon3.png" class="img-responsive img-center"/>
<a href="#" class="btn btn-danger btn-common">Reports<span></span></a>
</div>
</div>
</div>
</div>
</body>
</html>
</form>



<script type="text/javascript">
	function comimailssend(){
     $.ajax({ 

        url: "{{URL::to('send_mail_commission')}}",     
        method:"get",
        //data:{"fbaid":"95"},
        data: $('#sendcomimailfrm').serialize(),
        success: function(msg)  
        {
          //console.log(msg);
          //alert(msg);
         var response = JSON.parse(msg);
          $("#chkmail").html(response.Message);
         }
});
      }


</script>


</script>