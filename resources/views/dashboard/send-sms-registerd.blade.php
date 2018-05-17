@extends('include.master')
 @section('content')

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
    <strong>{{ $message }}</strong> 
    </div>
    @endif
    </div>
    <div class="col-md-12 col-xs-12">
    <div class="form-group col-md-3">
    <select  id="smslist" name="smslist" class="selectpicker select-opt form-control" required="">
    <!-- <option value="0">-- Select Recipient --</option>
    <option value="1">FBA</option>
    <option value="2">FSM</option>
    <option value="3">FBA POSP</option> -->
     <option value="0">-- Select Recipient --</option>
    <option value="1">Registration Date</option>
   <option value="2">Payment Date</option>
    <option value="3">Quote Create Date</option>
    <option value="4">FBA BirthDate</option>
    </select>
    <label class="control-label" for="inputError" id="required1"> </label>
    </div>
   <div class="col-md-6 col-xs-6">
   <div class="mrg-btmm">
   <select name="State"  id="txtmapstate" name="txtmapstate" class="selectpicker select-opt form-control" required="">
   <option selected disabled value="" >State</option>
   @foreach($state as $val)
   <option value="{{$val->state_id}}">{{$val->state_name}}</option>
   @endforeach
   </select>
   </div>
   </div>
   <div class="col-md-6 col-xs- 12" style="margin-top: 20px;">
   <div class="mrg-btmm">
   <select name="city" id="txtmapcity" name="txtmapcity" class="selectpicker select-opt form-control search_district_notification" required="">
   <option selected disabled value="">Select City</option>
   </select>
   </div>
   </div>
   
   <div id="divtblsalesmanagerlist" class="col-md-6 col-xs- 12" style="height: 150px; display: none; overflow-y: scroll;">
    <div class="mrg-btmm">
    <table id="tblsalesmanagerlist">
    </table>
    </div>
    </div>
    <div id="divtblmanagerlist" class="col-md-6 col-xs- 12" style="height: 150px; display: none; overflow-y: scroll;">
     <div class="mrg-btmm"> 
    <table id="tblmanagerlist">
    </table>
    </div>
    </div>
<!--     <div class="col-md-12 col-xs- 12" >
    <div class="mrg-btmm" style="height: 250px;  overflow-y: scroll;">
    <table id="myTable">
    <tr><input type="text"  class="search_id" id="myInput" placeholder="Search for names " ></tr>
    <thead id="tblfbalisthead"></thead>
    <tbody id="tblfbalist"></tbody>
    </table>
    </div>
    </div> -->
     <h3 class="col-md-12 col-xs- 12"><b>COUNT:</b><span id="msg_check" ></span><span id="msg_count">0</span></h3>    
    </div>
 
    
 </form>
  </div>
  </div>  
  </div>

<script type="text/javascript">
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
</script>
@endsection


