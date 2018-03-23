@extends('include.master')
 @section('content')

 <div class="container-fluid white-bg">
 <div class="col-md-12"><h3 class="mrg-btm">Send Notification</h3></div>
 <form class="form-horizontal"  id="sendnotification"  name="sendnotification"  enctype="multipart/form-data" method="POST">
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
    <div class="col-md-6 col-xs- 12"  >
    <div class="form-group" id="first_nm" >
    <input  type="text" class="form-control" oninput="mail('weburl')" placeholder= "Web Url" name="weburl" id="weburl" maxlength="40" required>
    <div id="email" style="display:none; color:red;font-size:10px">Kindly Enter Correct URL</div>
    </div>
    </div>
    <div class="col-md-6 col-xs- 12">
    <div class=" form-group"  id="last_nm">
    <input  type="text" class="form-control" name="webtitle" placeholder="Web title" id="webtitle" maxlength="40" required>
    </div>
    </div>
    <div class="col-md-6 col-xs-12">
    <div class="form-group">
    <input type="text" name="notificationtitle" id="notificationtitle" 
    class="form-control" placeholder="Notification Title" required />
   </div>
   </div>         
   <div class="col-md-3 col-xs-12">
   <div class="form-group  lastReporteddob" >
  <div id="datepicker" class="input-group date" data-date-format="yyyy-mm-dd">
  <input id="txtdate" name="txtdate" class="form-control" type="text" placeholder="From Date" required>
  <span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
 </div>
 </div>
 </div>
 <div class="col-md-2 col-xs-12">
  <input type="number" class="form-control"  id="notificationhours" name="notificationhours" placeholder="Hours"  maxlength="2" required/>
 </div>
 <div class="col-md-2 col-xs-12">
 <input type="number"  class="form-control" id="notificationminutes" name="notificationminutes" placeholder="Minutes"  maxlength="2" required />
  </div>
  <div class="col-md-4 col-xs-12">
  <div class="form-control border-none">
 <input type="file" name="notify_image" id="notify_image" required>
 </div>
 </div>
  <div class="col-md-12 col-xs-12">
 <div class="text-area padding" >
 <input  type="text" id="txtmessage" name="txtmessage" style="height: 8vw; width: 100%;" placeholder="Message..." required>
</div>
</div>

<div class="col-md-12 col-xs-12">
 <br>
 <div class="center-obj center-multi-obj">      
 <a  href="" class="common-btn">Reset</a>
 <a class="common-btn" id="notificsubmitbtn" name="notificsubmitbtn">Submit</a>
  </div>
  </div>
 </form>
  </div>
  </div>  
  </div>
    
  @endsection


