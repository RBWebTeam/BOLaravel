   @extends('include.master')
   @section('content')
   <form  id="sendsms" name="sendsms" action="POST"> 
   {{ csrf_field() }}
    <div id="content" style="overflow:scroll;">
    <div class="container-fluid white-bg">
    <div class="col-md-12"><h3 class="mrg-btm">SEND SMS REGISTER</h3></div> 
    <div class="col-md-12">
    <div class="panel panel-primary">
    <div class="panel-heading">
    <h3 class="panel-title">FSM Details</h3>
    <div class="pull-right">
    <span class="clickable filter" data-toggle="tooltip" data-container="body"><a ">
    <span class="glyphicon glyphicon-plus mrg-tp-forteen"></span></a></span>
    </div>
    </div>
    <div class="panel-body filter-bdy" style="display:none">
    <input type="text" class="form-control" id="dev-table-filter" data-action="filter" data-filters="#dev-table" placeholder="Search..." />
    </div>
    </div>
    </div>
    <div id="message_toggle">
    @if($message = Session::get('msg'))
    <div class="alert alert-info alert-dismissible fade in" role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">×</span>
    </button>
    <strong>{{ $message }}</strong> 
   </div>
     @endif
     </div>
     <div class="col-md-12 col-xs-12">
     <div class="form-group col-md-3">
    <select id="smslist" name="smslist" style="margin-left:-5%;" class="selectpicker select-opt form-control" required="">
    <option value="0">-- Select Recipient --</option>
    <option value="1">Registration Date</option>
   <option value="2">Payment Date</option>
    <option value="3">Create Date</option>
    <option value="4">FBA BirthDate</option>
    </select>
    <label class="control-label" for="inputError" id="required1"> </label>
    </div>
    <div class="form-group col-md-3">
    <input type="text" placeholder="City.." name="city_name" id="search_city" class="form-control" style=" display: block;" >  
    </div>
    </div> 
   <div class="col-md-4">
   <div class="form-group">
   <p>From</p>
   <div id="datepicker" class="input-group date" data-date-format="yyyy-mm-dd">
  <input class="form-control" type="text" placeholder="From Date" name="fdate" id="fmin_date"   />
   <span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
   </div>
   </div>
    </div>
    <div class="col-md-4">
    <div class="form-group">
    <p>To</p>
    <div id="datepicker1" class="input-group date" data-date-format="yyyy-mm-dd">
    <input class="form-control" type="text"  placeholder="To Date"  name="todate"  id="fmax_date"    />
    <span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
    </div>
    </div>
    </div>
    <div class="col-md-4">
    <br>
    <div class="form-group">
    <a href="#" class="mrg-top common-btn" id="search_fba_date">SHOW</a></div>
    </div>
    </form>
    <form method="post" action="{{url('send-sms-save')}}" > {{ csrf_field() }}
    <div class="col-sm-6 col-xs-12 form-padding" id="StatesV" >
    <div style="overflow-y:scroll;height:270px;">
    <table class="table table-responsive table-hover" cellspacing="0" id="myTable">
    <thead>
    <tr class="headerstyle" align="center">
    <th scope="col">
    <input type="checkbox" id="checkAll" name="check" style="width: auto; float: left; display: inline-block; margin-right: 16px;">
    <span>RECIPIENTS</span>   <input type="text" name="search" style="margin: 0px 10px 10px 233px " id="myInput"  class="search_id" placeholder="Search for names " title="Type in a name">
    </th>
    </tr>
    </thead >
    <tbody id="sendsms_id"></tbody>
    </table>
    </div> 
    <h3 class="pull-left"><b>COUNT:</b><span id="msg_check" ></span><span id="msg_count">0</span><h3>    
     </div>
     <div class="col-sm-6 col-xs-12 form-padding">  
     <select  name="SMSTemplate" class="form-control"  id="SMSTemplate_select" onchange="SMSTemplate_fn(this.value)"  >
     <option value="0" >select</option>
      @foreach($SMSTemplate as $sms)
     <option value="{{$sms->SMSTemplateId}}">{{$sms->Header}}</option>
     @endforeach
    </select>
     <label class="control-label" for="inputError" id="required2"> </label>
      <br>
      <textarea style="padding:10px; height:200px;"  id="SMSTemplate"  name="sms_text" class="form-control"> </textarea>
      <label class="control-label" for="inputError" id="required3"> </label>
       <div class="center-obj pull-left">
       <button  class="common-btn" style="margin-bottom: 10%;" id="send_message_id">SEND</button>
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
       $.ajax({ 
       url: "{{URL::to('send-sms-filter')}}",
      method:"POST",
      data: $('#sendsms').serialize(),
      success: function(msg)  
      {
      console.log(msg);
      var data = JSON.parse(msg);
       $('#sendsms_id').empty();
       var arr=Array();
       $('#msg_count').text(data.length);
       if(data.length > 0){
      $.each(data,function(index,val){ 
      arr.push('<tr><td><input type="checkbox" name="fba[]" class="check_list" value="'+val.FBAID+'" >'+val.FullName  +':'+val.MobiNumb1+'</td> </tr>');  });  
      $('#sendsms_id').append(arr);
      }else{
      alert("No data found...");
      }
     //var data = JSON.parse(msg);
     //console.log(msg);
     //alert(data);
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
    $.get("{{url('send-sms-register')}}",search).done(function(data){   var arr=Array(); $('#sendsms_id').empty();$('#msg_count').empty();
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
    $.get("{{url('send-sms-register')}}",
    {'smstemplate_id':ID}).done(function(data){ 
    $('#SMSTemplate').val(data);
    }).fail(function(xhr, status, error) {
    console.log(error);
    });
    }
   $(document).on('click','#send_message_id',function(e){
   // e.preventdefault();
   if($('#smslist').val()==0 ||$('#smslist').val()==null ){ 
   $('#required1').text('This field is required');
   $('#required2').text('This field is required');
   $('#required3').text('This field is required');
   return false;
  }else{ $('#required1').text('');}
  if( $('#SMSTemplate_select').val()==0 || $('#SMSTemplate_select').val()==null  ){
  $('#required2').text('This field is required');
  //alert("Please select from drop down list.");
  return false;
  }else{
  $('#required2').text('');    
  } 
  if($('#SMSTemplate').val()==0 || $('#SMSTemplate').val()==null){
  $('#required3').text('This field is required');
  //alert("Please fill out this field message.");
  return false;
  }else{
  $('#required3').text('');
  }
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
 </script>
 @endsection
 