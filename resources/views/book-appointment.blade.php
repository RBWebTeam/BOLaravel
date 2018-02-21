@extends('include.master')
@section('content')




            
 <div id="content" style="overflow:scroll;">
			 <div class="container-fluid white-bg">
			 <div class="col-md-12"><h3 class="mrg-btm">BOOK A LAB APPOINTMENT</h3></div>
			<form method="post" action="">
			
			<div class="col-md-12">
			<div class="table-responsive tbl">
			 <table class="table table-striped table-bordered text-center">
			 <tr>
			  <td>Basic Profile</td>
			  <td>ACTUAL COST</td>
			  <td>OFFER COST</td>
			  <td>&nbsp;</td>
			 </tr>
			 <tr>
			  <td><h3>40 Tests</h3></td>
			  <td><h4 class="bg-info pad">913.00</h4></td>
			  <td><h4 class="bg-danger pad">620.00</h4></td>
			   <td><img src="images/down-sign.png" class="down-sig"/></td>
			 </tr>
			 </table>
			 </div>
			</div>
			<div class="col-md-12"><h4 class="text-center pad" style="background:#eee;padding:8px;margin:10px;">Please enter your details</h4></div>
			
			<div class="col-md-4 col-xs-12">
				<div class="form-group">
				<div class="form-control"><b class="bg-blue">GENDER</b> &nbsp; &nbsp; <input type="radio" checked="" value="Male" name="Gender">&nbsp;Male   <input type="radio" name="Gender" value="Female">&nbsp;Female</div>
				</div>
				</div>
			<div class="col-md-4 col-xs-12">
				<div class="form-group">
				<input type="text" name="Mobile_No" id="Mobile_No" minlength="10" maxlength="10" class="form-control" placeholder="Mobile No.">
				</div>
				</div>
			<div class="col-md-4 col-xs-12">
				<div class="form-group">
				<input type="text" class="form-control" name="Email" id="Email" oninput="mail('Email')" placeholder="Email ID">
				<span id="email" style="display:none;color: red; font-size: 10px">Please Enter Valid Email Id.</span>
				</div>
				</div>
			<div class="col-md-4 col-xs-12">
				<div class="form-group">
				<input type="text" name="Age" id="Age" minlength="1" maxlength="2" class="form-control" placeholder="Age" onkeypress="return fnAllowNumeric(event)">
				</div>
				</div>
			<div class="col-md-4 col-xs-12">
				<div class="form-group">
				<input type="text" name="Addr1" id="Addr1" class="form-control" placeholder="Flat No., Building">
				</div>
				</div>
			<div class="col-md-4 col-xs-12">
				<div class="form-group">
				<input type="text" name="Addr2" id="Addr2" class="form-control" placeholder="Street Address">
				</div>
				</div>
			<div class="col-md-4 col-xs-12">
				<div class="form-group">
				<input type="text" name="Landmark" id="Landmark" class="form-control" placeholder="Landmark">
				</div>
				</div>
			<div class="col-md-4 col-xs-12">
				<div class="form-group">
				<input type="text" name="Pincode" id="Pincode" maxlength="6" onkeypress="return fnAllowNumeric(event)" class="form-control" placeholder="Pincode">
				</div>
				</div>
			
			    <div class="col-md-4 col-xs-12">
				<div class="form-group">
				<select class="form-control drop-arr select-sty" name="City" id="City">
					  <option disabled selected value="">City</option>
					</select>
				</div>
				</div>
				
				<div class="col-md-4">
			    <div class="form-group">
			    <div id="datepicker" class="input-group date" data-date-format="mm-dd-yyyy">
                 <input class="form-control" type="text" placeholder="Appt Date">
                <span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
                </div>
                </div>
                </div>
				
				<div class="col-md-4 col-xs-12">
				<div class="form-group">
				<select class="selectpicker select-opt form-control" required>
			     <option selected="selected" value="0">Appt Time Slot </option>
		         <option value="1"></option>
				</select>
				</div>
				</div>
				
             <div class="col-md-12">
			  <input type="checkbox" />&nbsp; I Agree to the <a href="#">Terms & Conditions</a>
			 </div>
				
				<div class="col-md-12 col-xs-12">
				<br>
				<div class="center-obj">
				 <button class="common-btn">NEXT: SELECT YOUR LAB</button>
				 </div>
				</div>
				
				
			
			 </form>
			
			
			
            </div>
            </div>
					    
@endsection	


<script type="text/javascript">
  function fnAllowNumeric(evt) {
            evt = (evt) ? evt : window.event;
            var charCode = (evt.which) ? evt.which : evt.keyCode;
            if (charCode > 31 && (charCode < 48 || charCode > 57)) {

              return false;
            }
            return true;
          }
</script>

<script type="text/javascript">
  function mail(obj,val){
    // //console.log(obj);
    if(obj=='Email' ){
                   var str =$('#Email').val();
                   var emailPattern = /^[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$/; 
                   var res = str.match(emailPattern);
                   if(res){
                     // //console.log('Pancard is valid one.!!');
                      $('#email').hide();

                  }else{
                    // //console.log('Oops.Please Enter Valid Pan Number.!!');
                    $('#email').show();

                    return false;
                  }
                  
  }
}
</script>

<!-- <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>
<script type="text/javascript">   

 $.ajax({ 
   url: "{{URL::to('backoffice-city-master')}}",
   method:"GET",
   success: function(msg)  
   {
  
   console.log(msg);
   if(msg)
      {      $.each(msg, function( index, value ) {
            $('#City').append('<option value="'+value.city_id+'">'+value.cityname+'</option>');

        }); 
    }else{
      $('#City').empty().append('No Result Found');
    }

   },

 });
</script> -->

            