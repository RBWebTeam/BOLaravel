@extends('include.master')
 @section('content')
<!-- Body Content Start -->
  <div id="content" style="overflow:scroll;">
  <div class="container-fluid white-bg">
  <div class="col-md-12"><h3 class="mrg-btm">SEND SMS</h3></div>
  <!-- Date Start --> 
  <form  id="sendsms" name="sendsms" action="POST"> 
    {{ csrf_field() }}
    
   <div id="message_toggle">
    @if($message = Session::get('msg'))
  <div class="alert alert-info alert-dismissible fade in" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
  <span aria-hidden="true">×</span>
  </button>
  <strong>{{$message}}</strong> 
  </div>
    @endif
  </div>
  <div class="col-md-12 col-xs-12">
  <div class="form-group col-md-3">
  <select id="smslist" name="smslist" class="selectpicker select-opt form-control" required>
  <option value="0">-- Select Recipient --</option>
  <option value="1">Registration Date</option>
   <option value="2">Payment Date</option>
  <option value="3">Quote Create Date</option>
  <option value="4">FBA BirthDate</option>
  </select>
  </div>
  </div>
  </div> 
  <div class="col-md-4 col-sm-4 col-xs-12">
  <h4 style="margin-left: 45%;">Zone</h4>
  <div class="form-group">
  <select multiple="multiple" class="form-control select-sty" name="zone" id="zone">    
  </select>
  </div>
  </div>
  <div class="col-md-4 col-sm-4 col-xs-12">
  <h4 style="margin-left: 45%;">State</h4>
  <div class="form-group">
  <select multiple="multiple" class="form-control select-sty" name="state[]" id="state" >    
  </select> 
  </div>
  </div>
 <div class="col-md-4 col-sm-4 col-xs-12">
   <h4 style="text-align: center;">City</h4>
 <div class="form-group">
<select  multiple="multiple" class="form-control select-sty" name="city[]" id="city">
</select>
</div>
</div> 
 <div class="col-md-4 col-sm-12 col-xs-12">
 <div class="form-group">
  <p>From Date</p>
  <div id="datepicker" class="input-group date" data-date-format="yyyy-mm-dd" >
  <input class="form-control" type="text" placeholder="From Date" name="fdate" id="fmin_date"  required/>
  <span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
  </div>
  <label class="control-label" for="inputError" id="required1"> </label>
  </div>
  </div>
  <div class="col-md-4 col-sm-12 col-xs-12">
  <div class="form-group">
  <p>To Date</p>
  <div id="datepicker1" class="input-group date" data-date-format="yyyy-mm-dd" h>
  <input class="form-control" type="text"  placeholder="To Date"  name="todate"  id="fmax_date"   required/>
  <span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
 </div>
  <label class="control-label" for="inputError" id="required2"> </label>  </div>
 </div>
 <br> 
<div class="col-md-4">
<div class="form-group"> 
  <a href="#" class="mrg-top common-btn" id="search_fba_date" name="search_fba_date">SHOW</a>   </div>
</div>
</form>
<form method="POST" id="send_message_id" action="{{url('send-sms-save')}}" >
{{ csrf_field() }}
<input type="hidden" name="txtlinkvalue" id="txtlinkvalue">
<div class="col-sm-6 col-xs-12 form-padding" id="StatesV" >
<div style="overflow-y:scroll;height:270px;">
<table class="table table-responsive table-hover" cellspacing="0" id="myTable">
<thead>
<tr class="headerstyle" align="center">
<th scope="col">
<input type="checkbox" id="checkAll" name="check" style="width: auto; float: left; display: inline-block; margin-right: 16px;">
<span>RECIPIENTS</span>   <input type="text" name="search" style="margin: 0px 10px 10px 233px " id="myInput"  class="search_id" placeholder="Search for names or Mobile Number" title="Type in a name">
</th>
</tr>
</thead >
<tbody id="sendsms_id">
</tbody>                  
</table>
</div> 
  <h3 class="pull-left"><b>COUNT:</b><span id="msg_check" ></span><span id="msg_count">0</span><h3>    
  </div>
  <div class="col-sm-6 col-xs-12 form-padding">  
  <select  name="SMSTemplate" class="form-control col-md-3"  id="SMSTemplate_select" onchange="SMSTemplate_fn(this.value)"  style="width: 40% ;margin-right: 20px;">
  <option value="10" >--Select--</option>
     @foreach($SMSTemplate as $sms)
  <option value="{{$sms->SMSTemplateId}}">{{$sms->Header}}</option>
    @endforeach
  </select>

  <select  name="smslink" class="form-control col-md-3"  id="smslink" onchange="" style="width: 40%">
  <option value="" >--Select--</option>     
  <option value="bo.mgfm.in/{fbaid}/smscampaign">bo.mgfm.in/{fbaid}/smscampaign</option>    
  </select>
  <a class="btn btn-primary pull-right" id="btnadd" onclick="insertlink('SMSTemplate',$('#smslink').val())">Add</a>
<br>
<br>
<textarea style="padding:10px; height:200px;"  id="SMSTemplate"  name="sms_text" class="form-control"> </textarea>
<label class="control-label" for="inputError" id="required3"> </label>
<div class="center-obj pull-left">
<button class="common-btn" id="send_message_id">SEND</button>
</div>
</div>
</form>
</div>
</div>
<script type="text/javascript">
$(document).ready(function(){   
$("#checkAll").click(function () {
$('input:checkbox').not(this).prop('checked', this.checked);
len=$(".check_list:checkbox:checked").length;
$('#msg_check').text(len+"/");   
 });
});

$(document).on("keyup",".search_id",function() { 
 var input, filter, table, tr, td, i;
  input = document.getElementById("myInput");
  filter = input.value.toUpperCase();
  table = document.getElementById("myTable");
  tr = table.getElementsByTagName("tr");
  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[0];
     
    if (td) {
      if (td.innerHTML.toUpperCase().indexOf(filter) > -1) {
        tr[i].style.display = "";
      } else {
     tr[i].style.display = "none";
     }
     }       
    }
    });
    function SENDSMS_FN(ID){
    FN_search(ID,0,0,0);

    }
   $(document).ready(function(){ 
   $("#search_fba_date").click(function () {

  if($('#fmin_date').val()==0 ||$('#fmin_date').val()==null ){ 
  $('#required1').text('This field is required');
  //$('#required2').text('This field is required');
  return false;
  }else{ $('#required1').text('');}
 if($('#fmax_date').val()==0 ||$('#fmax_date').val()==null ){ 
  $('#required2').text('This field is required');
  return false;
 }else{ $('#required2').text('');}


   console.log($('#sendsms').serialize());
   $.ajax({ 
   url: "{{URL::to('send-sms-detail')}}",
   method:"POST",
   data: $('#sendsms').serialize(),
   success: function(msg)  
   {
   var data = JSON.parse(msg);
   $('#sendsms_id').empty();
   var arr=Array();
   $('#msg_count').text(data.length);
   if(data.length > 0){
   $.each(data,function(index,val){ 
   if(val.FBAID!=null && val.FBAID!='0'){
   arr.push('<tr><td><input type="checkbox" name="fba[]" class="check_list" value="'+val.FBAID+'" >'+val.FullName  +':'+val.MobiNumb1+'</td> </tr>'); 
   }
   });
   $('#sendsms_id').append(arr);
   }else{
   alert("No data found...");
   }
   }
   });
   });
   }); 

  function FN_search(ID,city,fDate,tDate){
  var search=null;
  if(ID){
  search={'ID':ID};
  }
  if(city){
  search={'city':city};
  }
  if((fDate!=0) && (tDate!=0)){
  search={'fDate':fDate,'tDate':tDate};
  }
  if(search!=null){
  $.get("{{url('send-sms')}}",search).done(function(data){   var arr=Array();   $('#sendsms_id').empty();$('#msg_count').empty();
  console.log(data.sms_data);
  if(data.sms_data.length > 0){
  $('#msg_count').text(data.sms_data.length);
  $.each(data.sms_data,function(index,val){ 
  arr.push('<tr><td><input type="checkbox" name="fba[]" class="check_list" value="'+val.FBAID+'" >'+val.FullName  +':'+val.MobiNumb1+'</td> </tr>');  });
  $('#sendsms_id').append(arr);
  }else{
  alert("No data found...");
  }
  }).fail(function(xhr, status, error) {
  console.log(error);
  });
  }
  }
  function SMSTemplate_fn(ID){
  $('#SMSTemplate').empty();
  $.get("{{url('send-sms')}}",{'smstemplate_id':ID}).done(function(data){ $('#SMSTemplate').val(data);
  }).fail(function(xhr, status, error) {
 console.log(error);
  });
  }
  //$(document).on('change','#search_fba_dte',function(e){
 $('#smslist').on('change', function() {
  $("#fmin_date").empty().append('');
    //alert('okae');
  var smslist=$('#smslist').find(":selected").val();
  var array = "";
  var i=0;
   $('#smslist  option:selected').each(function() {
    array+= $(this).val()+",";
    });
   console.log(array);



 if( $('#SMSTemplate_select').val()==0 || $('#SMSTemplate_select').val()==null  ){
 $('#required2').text('This field is required');
 //alert("Please select from drop down list.");
return false;
}else{
$('#required2').text('');      
} 
if($('#SMSTemplate').val()==0 || $('#SMSTemplate').val()==null){
$('#required4').text('This field is required');
//alert("Please fill out this field message.");
return false;



 if( $('#SMSTemplate_select').val()==0 || $('#SMSTemplate_select').val()==null  ){
 $('#required2').text('This field is required');
 //alert("Please select from drop down list.");
return false;
}
}else{
$('#required4').text('');
}

//  if( $('#fmax_date').val()==0 || $('#fmax_date').val()==null  ){
//  $('#required3').text('This field is required');
//  //alert("Please select from drop down list.");
// return false;
// }

// var fields = $("input[name='fba']").serializeArray(); 
// if (fields.length>0) { 
// alert("Please select  Recipient");
// return false;
// } 

if($(".check_list:checkbox:checked").length > 0){
}else{
$('#required4').text('This field is required');
alert("Please select  Recipient");
return false;
}
});
$(document).on('click','.check_list',function(){
len=$(".check_list:checkbox:checked").length;
$('#msg_check').text(len+"/");
});
$(document).ready(function(){
 window.setTimeout(function() {
 $("#message_toggle").fadeTo(500, 0).slideUp(500, function(){
 $(this).remove(); 
 });
 }, 4000);
 });


$.ajax({ 
 url: "{{URL::to('send-sms-zone')}}",
 method:"GET",
 success: function(datas)  
 {
 var data=$.parseJSON(datas);
 // console.log(data);
 if(data)
 { $.each(data, function( index, value ) {
 $('#zone').append('<option value="'+value.zone+'">'+value.zone+'</option>');
 }); 
 }else{
  $('#zone').empty().append('No Result Found');
  }
  },
  });
 $.ajax({ 
 url: "{{URL::to('send-sms-zonechange')}}",
 method:"POST",
 success: function(datas)  
 {
 var data=$.parseJSON(datas);
 // console.log(data);
 if(data)
 { $.each(data, function( index, value ) {
 $('#zone').append('<option value="'+value.state_id+'">'+value.state_name+'</option>');
 }); 
 }else{
  $('#zone').empty().append('No Result Found');
  }
  },
  });
 $.ajax({ 
 url: "{{URL::to('send-sms-state')}}",
 method:"GET",
 success: function(datas)  
 {
 var data=$.parseJSON(datas);
 // console.log(data);
 if(data)
 { $.each(data, function( index, value ) {
 $('#state').append('<option value="'+value.state_id+'">'+value.state_name+'</option>');
 }); 
 }else{
  $('#state').empty().append('No Result Found');
  }
  },
  });


 $('#zone').on('change', function() {
  $("#state").empty().append('');
   // alert('okae');
  var state=$('#zone').find(":selected").val();
  // console.log(state);
  var array = "";
  var i=0;
   $('#zone  option:selected').each(function() {
      array+= $(this).val()+"";
    });
   console.log(array);
    var v_token ="{{csrf_token()}}";
   $.ajax({  
    type: "POST",  
    url: "{{URL::to('send-sms-zonechange')}}",
    data : {'_token': v_token,'zone':array},
    success: function(msg){
     console.log(msg);
    if(msg)
    { $.each(msg, function( index, value ) {
   $('#state').append('<option value="'+value.state_id+'">'+value.state_name+'</option>');   
    }); 
     }else{
    $('#state').empty().append('No Result Found');
    }
    }  
    });
    });
  $('#state').on('change', function() {
  $("#city").empty().append('');
   // alert('okae');
  var state=$('#state').find(":selected").val();
  var array = "";
  var i=0;
   $('#state  option:selected').each(function() {
    array+= $(this).val()+",";
    });
   console.log(array);
    var v_token ="{{csrf_token()}}";
   $.ajax({  
    type: "POST",  
    url: "{{URL::to('send-sms-city')}}",
    data : {'_token': v_token,'state':array},
    success: function(msg){
    console.log(msg);
    if(msg)
    {  $.each(msg, function( index, value ) {
   $('#city').append('<option value="'+value.cityname+'">'+value.cityname+'</option>');   
    }); 
     }else{
      $('#city').empty().append('No Result Found');
      }
      }  
      });
      });

  

function insertlink(areaId, text) {
  var txtarea = document.getElementById(areaId);
  if (!txtarea) {
    return;
  }

  var scrollPos = txtarea.scrollTop;
  var strPos = 0;
  var br = ((txtarea.selectionStart || txtarea.selectionStart == '0') ?
    "ff" : (document.selection ? "ie" : false));
  if (br == "ie") {
    txtarea.focus();
    var range = document.selection.createRange();
    range.moveStart('character', -txtarea.value.length);
    strPos = range.text.length;
  } else if (br == "ff") {
    strPos = txtarea.selectionStart;
  }

  var front = (txtarea.value).substring(0, strPos);
  var back = (txtarea.value).substring(strPos, txtarea.value.length);
  txtarea.value = front + text + back;
  strPos = strPos + text.length;
  if (br == "ie") {
    txtarea.focus();
    var ieRange = document.selection.createRange();
    ieRange.moveStart('character', -txtarea.value.length);
    ieRange.moveStart('character', strPos);
    ieRange.moveEnd('character', 0);
    ieRange.select();
  } else if (br == "ff") {
    txtarea.selectionStart = strPos;
    txtarea.selectionEnd = strPos;
    txtarea.focus();
  }

  txtarea.scrollTop = scrollPos;
}


$("#smslink").change(function(){
    if ($(this).val()!=''){      
      $("#txtlinkvalue").val('1');     
    }
    else{
      $("#txtlinkvalue").val('0');      
    }
  });

      </script>
@endsection
