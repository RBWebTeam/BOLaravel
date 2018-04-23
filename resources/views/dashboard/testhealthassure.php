 <style type="text/css">
 .main-header{
 	position: relative;
    height: 48px;
    background: #009ee3;
    left: 0;
    right: 0;
 }
 .header-middle{
 	float: left;
    width: 80%;
    color: #fff;
    margin-top: 4px;
    padding: 8px 0 0 0;
    text-align: center;
    font-size: 18px;
    }
    .ink {
    display: block;
    position: absolute;
    pointer-events: none;
    border-radius: 50%;
    -webkit-transform: scale(0);
    -moz-transform: scale(0);
    -ms-transform: scale(0);
    -o-transform: scale(0);
    transform: scale(0);
    background: #53bcf1;
    opacity: 1;
}
 </style>
 <div class="container-fluid white-bg">
 <header class="main-header">
        <div class="header-middle text-center" style="width:100%;">BOOK A LAB APPOINTMENT</div>
    </header>

   @if(isset($respon))
   <div class='col-xs-12 quote-with-health-checkup pad top-register'>
   	<div class='col-xs-3 pad-1 quote-with-addon-health-checkup'>
   		 <p> {{$_GET["PackName"]}}</p>
   		<h5 style="color: red">{{$_GET["tcount"] }}Tests</h5>
    </div>
    <div class='col-xs-3 pad-1 quote-with-addon-health-checkup'>
    <div class='loan-premium-health-checkup'>
    <p>ACTUAL COST</p>
    <h6><i class='fa fa-rupee' aria-hidden='true'></i>{{$_GET["MRP"]}}</h6>
    </div>
    </div>
    <div class='col-xs-3 pad-1 quote-with-addon-buy-health-checkup'>
    <div class='buy-now-health-checkup'>
    	<p>OFFER COST</p>
    <h6 > <i class='fa fa-rupee' aria-hidden='true'></i> {{$_GET["OfferPrice"]}}</h6>
    </div>
    </div>
   <div class='col-xs-3 pad ripple-effect text-center loan-amt-health-checkup'>
   	<div class='dropdown'>
   	<i class='glyphicon glyphicon-triangle-bottom' aria-hidden='true'></i>
   	</div>
   	</div>
  <!--  @foreach($respon as $val)

   <table>
   	<tr>
   		<td>
   			{{$val->Name}}
   			<?php echo"<br/>";?>
   			<?php echo"<br/>";?>
   			<?php foreach ($val->ParamDetails as $key => $value) {
   				echo $value."<br/>";
   			} ?>
   	    </td>
   	</tr>
   </table>
 @endforeach -->
   @endif

   <div class="col-xs-12 text-center health-checkup-lab-partner">
                    <h4>Our Lab Partners</h4>
   </div>
   <table class="table table-bordered" style="border:1px solid">
                    <tbody><tr>
                        <td class="ripple-effect"><img src="http://backoffice.magicfinmart.com/images/metro-diagnostics.jpg" class="img-responsive"><span class="ink animate" style="height: 383px; width: 383px; top: -163.5px; left: 163px;"></span></td>
                        <td class="ripple-effect"><img src="http://backoffice.magicfinmart.com/images/srl-diagnostics.jpg" class="img-responsive"><span class="ink animate" style="height: 383px; width: 383px; top: -175.5px; left: 7px;"></span></td>
                        <td class="ripple-effect"><img src="http://backoffice.magicfinmart.com/images/sub-diagnostics.jpg" class="img-responsive"><span class="ink animate" style="height: 383px; width: 383px; top: -147.5px; left: -84px;"></span></td>
                    </tr>
                    <tr>
                        <td class="ripple-effect">
                            <img src="http://backoffice.magicfinmart.com/images/Healthspring.jpg" class="img-responsive">
                        <span class="ink animate" style="height: 383px; width: 383px; top: -140.5px; left: 90px;"></span></td>
                        <td class="ripple-effect"><img src="http://backoffice.magicfinmart.com/images/apollo.jpg" class="img-responsive"><span class="ink animate" style="height: 383px; width: 383px; top: -153.5px; left: 26px;"></span></td>
                        <td class="ripple-effect"><img src="http://backoffice.magicfinmart.com/images/thyr-diagnostics.jpg" class="img-responsive" style="display:none;"><span class="ink animate" style="height: 383px; width: 383px; top: -135.5px; left: -48px;"></span></td>
                    </tr>
                </tbody></table>

</div>
