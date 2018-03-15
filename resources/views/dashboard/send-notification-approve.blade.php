
 @extends('include.master')
 @section('content') 

<form id="approve" name="approve"> 
<div id="content" style="overflow:scroll;">
 <div class="container-fluid white-bg">
 <div class="col-md-12"><h3 class="mrg-btm">Send Notification</h3></div>
 <div class="col-md-12">
  <div class="overflow-scroll">
  <div class="table-responsive" >
  <table id="example" class="table table-bordered table-striped tbl" >
   <thead>
   <tr>
    <th>MessageId</th>
    <th>NotificationTitle</th>
    <th>MessageType</th>
     <th>WebUrl</th>
     <th>WebTitle</th>
     <th>DateTimeToSend</th>
      <th>CreatedDate</th>
      <th>isapproved</th>
      </tr>
      </thead>
      <tbody>
     @foreach($query as $val) 
     <tr>
        <td><?php echo $val->MessageId; ?></td> 
        <td><?php echo $val->NotificationTitle; ?></td>
        <td><?php echo $val->MessageType; ?></td> 
        <td><?php echo $val->WebUrl; ?></td>
        <td><?php echo $val->WebTitle; ?></td>
        <td><?php echo $val->DateTimeToSend; ?></td>
        <td><?php echo $val->CreatedDate; ?></td>
          <td>
       <button id="btnblock" class="btn btn-default btnupdatenot" onclick="updatenotification(<?php echo $val->MessageId; ?>,1);return false;">Approve </button>
         <button id="btnunblock" class="btn btn-danger btnupdatenot" onclick="updatenotification(<?php echo $val->MessageId; ?>,0);return false;">DisApprove</button>
        </td> 
     </tr>
      @endforeach
      </tbody>
      </table>
    </div>
  </div>
  </div>
 </div>
 </form>
@endsection


