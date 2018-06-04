 @extends('include.master')
@section('content')
 <div id="content" style="overflow:scroll;">
  <div class="container-fluid white-bg">
 <div class="col-md-12"><h3 class="mrg-btm">Search FBAID</h3></div>




<form id="fba-update-from-id" method="post" >
<div class="input-group add-on">{{ csrf_field() }}
<div class="form-group">
<div class="col-md-4 col-xs-12">
<input type="text" class="form-control"   onkeypress="return Numeric(event)"  placeholder="Search FBA ID" name="fba_id" id="srch-term">

<div class="input-group-btn">
<button class="btn btn-default" type="submit" id="search_fba"><i class="glyphicon glyphicon-search"></i></button>
</div>
</div>
</div>
</div>

</form>

<form id="fba_details_update_from"  method="post">
{{ csrf_field() }}
<div id="fba_details_update"></div>      
</div>
<div class="hidden" id="FBA_info_div"> 
<div class="form-group">

<input class="form-control" name="FBAID" id="FBAID" required type="hidden"/ onkeypress="return Numeric(event)" > 
</div>

 <div class="col-md-4 col-xs-12">
  <div class="form-group">
    <label class="col-lg-4  control-label ">First Name</label>
  <input type="text"  id="FirsName" name="FirsName" class="form-control" placeholder="FirstName" required="">
  </div>
  </div>
        
  <div class="col-md-4 col-xs-12">
  <div class="form-group">

    <label class="col-lg-4  control-label ">User Name</label>
    <input type="text" id="UserName" name="UserName" class="form-control" placeholder="UserName" required="">
    </div>
    </div>
        
    <div class="col-md-4 col-xs-12">
    <div class="form-group">
      <label class="col-lg-4  control-label ">Middle Name</label>
    <input type="text" id="MiddName" name="MiddName" class="form-control" placeholder="Middle Name" required="">
    </div>
    </div>
        
    <div class="col-md-4 col-xs-12">
    <div class="form-group">
      <label class="col-lg-4  control-label ">Last Name</label>
    <input type="text" id="LastName" name="LastName" class="form-control" placeholder="LastName" required="">
    </div>
    </div>

    <div class="col-md-4 col-xs-12">
    <div class="form-group">
     <label class="col-lg-4  control-label ">EmailID</label>
    <input type="text" id="EmailID" name="EmailID" class="form-control" placeholder="EmailID" required="">
  </div>
  </div>
        
    <div class="col-md-4 col-xs-12">
    <div class="form-group">
     <label class="col-lg-4  control-label ">Mobile No</label>
    <input type="text" id="MobiNumb1" name="MobiNumb1" class="form-control" placeholder="Mobile Number" required="">
  </div>
   </div>
   
    
  <div class="col-md-4 col-xs-12">
   <div class="form-group">
  <div class="form-control">IsBlocked&nbsp;&nbsp;&nbsp;
 

    <input type="radio" name="IsBlocked" value="1">&nbsp;&nbsp;Yes <input type="radio" name="IsBlocked" value="0">&nbsp;&nbsp;No</div>
  </div>
  </div>
        
  <div class="col-md-4 col-xs-12">
  <div class="form-group">

  <div class="form-control">IsTestUser&nbsp;&nbsp;&nbsp;<input type="radio" name="IsTextUser" value="1">&nbsp;&nbsp;Yes <input type="radio" name="IsTextUser" value="0">&nbsp;&nbsp;No</div>
  </div>
  </div>   

  <div class="col-md-4 col-xs-12">
  <div class="form-group">

  <div class="form-control">FinmartDND&nbsp;&nbsp;&nbsp;<input type="radio" name="FinmartDND" value="1">&nbsp;&nbsp; Yes<input type="radio" name="FinmartDND" value="0">&nbsp;&nbsp; No</div>
    </div>
  </div>
   <div class="col-md-12 col-xs-12">
   <br>
    <div class="form-group"> <button class="btn btn-primary " id="fba_details_update_ID" type="submit">Submit</button> 
   </div>
   </div>
   </div>
  </form>
  </div>   
  </div>
  </div>
  </div>
 <script type="text/javascript">
$(document).ready(function(){
$('#search_fba').click(function(event){  
 event.preventDefault(); 
var srchterm=$('#srch-term').val();
$.post("{{url('fba-search-id')}}",
  $('#fba-update-from-id').serialize())
.done(function(res){ 
$("#FBA_info_div").removeClass("hidden");
if(res.status==true && res.query.length>0){  

$("#FBAID").val(res.query[0].FBAID);
$("#UserName").val(res.query[0].UserName);
// $("#zero").val(res.query[0].IsBlocked);
$("#FirsName").val(res.query[0].FirsName);
$("#MiddName").val(res.query[0].MiddName);
$("#LastName").val(res.query[0].LastName);
$("#MobiNumb1").val(res.query[0].MobiNumb1);
$("#EmailID").val(res.query[0].EmailID);
$("#IsBlocked").val(res.query[0].IsBlocked);
$("#IsTextUser").val(res.query[0].IsTextUser);
$("#FinmartDND").val(res.query[0].FinmartDND);
      

if (res.query[0].IsBlocked == '1')
   $('#FBA_info_div').find(':radio[name=IsBlocked][value="1"]').prop('checked', true);
  else
  $('#FBA_info_div').find(':radio[name=IsBlocked][value="0"]').prop('checked', true);


  if (res.query[0].FinmartDND == '1')
  $('#FBA_info_div').find(':radio[name=FinmartDND][value="1"]').prop('checked', true);
  else
  $('#FBA_info_div').find(':radio[name=FinmartDND][value="0"]').prop('checked', true);


if (res.query[0].IsTextUser == '1')
$('#FBA_info_div').find(':radio[name=IsTextUser][value="1"]').prop('checked', true);
else
$('#FBA_info_div').find(':radio[name=IsTextUser][value="0"]').prop('checked', true);


 if (res.query[0].POSPName == '')
  $('#FBA_info_div').find('#EmailID').prop('disabled', false);
  else
 $('#FBA_info_div').find('#EmailID').prop('disabled', true);

    
    // if(res.query[0].POSPName == '') { //3rd radiobutton
    //     $("#EmailID").prop("disabled", true);  
    // }
    // else {
    //     $("#EmailID").prop("disabled", false); 
    // }

















    }else{
   $('#fba_details_update').empty();
   alert("FBA ID not Match....");
   }
   }).fail(function(xhr, status, error) {
   console.log(error);
   });
   });
   });
  $(document).on('click','#fba_details_update_ID',function(){ event.preventDefault(); 
   validator=$('#fba_details_update_from').validate();
    if(! $('#fba_details_update_from').valid()){
   $.each(validator.errorMap, function (index, value,arg) {
   $('#'+index).focus();
   return false;
   });
   }else{
  $.post("{{url('fba-search-update')}}",
  $('#fba_details_update_from').serialize())
  .done(function(res){ 
  if(res.status==true){
  alert("Successfully Update");

  $('#fba_details_update').empty();
  }else{
  console.log("error");
  }
  }).fail(function(xhr, status, error) {
  console.log(error);
  });
  }
  });
  </script>

  <style type="text/css">


.input-group-btn:last-child>.btn, 
.input-group-btn:last-child>.btn-group {
    z-index: 2;
    margin-left: 420%;
    margin-top: -32px;
}
.input-group .form-control {
    color: #666;
    width: 400%;
}

  </style>
        @endsection