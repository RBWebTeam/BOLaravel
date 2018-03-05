<!-- @extends('include.master')  -->
 <!-- @extends('include.sendNoticationScript') -->
 @include('include.sendNoticationScript')
 @section('content')

      <div id="content" style="overflow:scroll;">
	  <div class="container-fluid white-bg">
	 <div class="col-md-12"><h3 class="mrg-btm">Send Notification</h3></div>
	 <form method="post" id="sendnotification"  name="sendnotification" >
      {{ csrf_field() }}
          
	<div class="col-md-6 col-xs-12">
    <div class="form-group">
	<select id="ddlflag" name="ddlflag" class="selectpicker select-opt form-control" onchange="loadfbasbyflag()" required>
	 <option selected="selected" value="0">-SELECT-</option>
	 <option value="1">STATE</option>
	 <option value="2">CITY</option>
    <option value="3">PINCODE</option>
	 <option value="6">FBA</option>
	</select>
	</div>
    </div>

	<div class="col-md-6 col-xs-12">
    <div class="form-group">
  <select name="State"  id="txtmapstate" class="selectpicker select-opt form-control" required="">
   <option selected="selected"  value="0">State</option>
	 @foreach($state as $val)
   <option value="{{$val->state_id}}">{{$val->state_name}}</option>
	 @endforeach
  </select>
   </div>
   </div>
	<div class="col-md-6 col-xs- 12">
	<div class="form-group">
	<select name="city" id="txtmapcity" name="txtmapcity" class="selectpicker select-opt form-control" required="">
	<option selected="selected">Select City</option>
	 </select>
     </div>
   </div>

		  <div class="col-md-6 col-xs-12">
		 <div class="form-group">
		<input id="txtPincode" name="Pincode" type="number" class="form-control" onfocusout="getfbabypincode(this)" placeholder="Pincode">@if ($errors->has('Pincode'))<label class="control-label" for="inputError"> {{ $errors->first('Pincode') }}</label>  @endif
		</div>
	    </div>
         <div id="divtblsalesmanagerlist" class="col-md-6 col-xs- 12" style="height: 150px; display: none; overflow-y: scroll;">
	      <div class="form-group">
          <table id="tblsalesmanagerlist">
		 </table>
	    </div>
        </div>
       <div id="divtblmanagerlist" class="col-md-6 col-xs- 12" style="height: 150px; display: none; overflow-y: scroll;">
	   <div class="form-group"> 
	  <table id="tblmanagerlist">
	  </table>
	   </div>
       </div>
      <div class="col-md-12 col-xs- 12" >
	  <div class="form-group" style="height: 250px;  overflow-y: scroll;">
	  <table id="tblfbalist">
	  </table>
	  </div>
      </div>
     <div class="col-md-6 col-xs- 12">
	 <div class="form-group">
	  <select id="LeadType" name="LeadType" class="selectpicker select-opt form-control" required >
	  <option selected="selected" value="0"  name="message" id="messageid">MessageType</option>
	  <option value="HL">HL</option>
      <option  value="WB">WB</option>
      </select>
	  </div>
	  </div>
      <div class="col-md-6 col-xs- 12" id="first_nm">
      <div class="form-group">
      <input  type="text" class="form-control" placeholder= "Web Url" name="weburl" id="weburl" maxlength="40" required>
      </div>
      </div>
      <div class="col-md-6 col-xs- 12" id="last_nm">
      <div class="form-group">
      <input  type="text" class="form-control" name="webtitle" placeholder="Web title" id="webtitle" maxlength="40" required>
     </div>
     </div>
    <div class="col-md-6 col-xs-12">
    <div class="form-group">
    <input type="text" name="notificationtitle" id="notificationtitle" 
    class="form-control" placeholder="Notification Title" required />
   </div>
   </div>        	
  

    <div class="col-md-4 col-xs-12">
    <div class="form-group lastReporteddob" >
    <input type="date" class="form-control" id="notificationdate" name="personal_dob" placeholder="Date" required/>
    </div>
	</div>

   	<div class="col-md-2 col-xs-12">
 	<input type="number" class="form-control"  id="notificationhours" name="notificationhours" placeholder="Hours" required/>
	</div>

	<div class="col-md-2 col-xs-12">
	<input type="number"  class="form-control" id="notificationminutes" name="notificationminutes" placeholder="Minutes" required />
	</div>

   <div class="col-md-12 col-xs-12">
	<div class="text-area padding" >
	<textarea  id="txtmessage" name="txtmessage" placeholder="Message..." required></textarea>
	</div>
	</div>

	<div class="col-md-12 col-xs-12">
     <br>
	<div class="center-obj center-multi-obj">			
    <a href="" class="common-btn">Back</a>
	<button class="common-btn"  type="submit" id="notificsubmitbtn" name="notificsubmitbtn">Submit</button>

	<button class="common-btn" id="modifybtn" name="modifybtns">Modify</button>
	</div>
	</div>

   
        
        

	 </form>
     </div>
      </div>	
	</div>
    
  @endsection



 <!-- <script type="text/javascript">
     var d = new Date();
     var year = d.getFullYear() ;
     d.setFullYear(year);
    $(".lastReporteddob").datepicker({ dateFormat: "yy-mm-dd",
     changeMonth: true,
     changeYear: true,
     maxDate: year,
     minDate: "-100Y",
     yearRange: '-100:' + year + '',
     defaultDate: d
     });
     </script> -->
    <script type="text/javascript">
    var fdata=Array();
    $.ajax({
    type: 'GET',
     url: "{{url('notification-save')}}",
    success: function (msg) {
     av=JSON.parse(msg);
     var arr=new Array(['title','img_url','body','notifyFlag']);
    var dat=JSON.stringify(av.result);
    $.each(av.result, function(key,val) {
    arr.push([String (val.title), val.img_url,(val.body),val.notifyFlag]);
     });
    console.log(arr);             
  </script>


