
 @extends('include.master')
 @section('content') 
<form id="approve" name="approve"> 
<div id="content" style="overflow:scroll;">
 <div class="container-fluid white-bg">
 <div class="col-md-12"><h3 class="mrg-btm">Approve Notification</h3></div>
 <div class="col-md-12">
  <div class="overflow-scroll">
  <div class="table-responsive" >
  <table id="example" class="table table-bordered table-striped tbl" >
   <thead>
   <tr>
    <th>FBAID</th>
    <th>FirsName</th>
     <th>EmailID</th>
     <th>mobiNumb1</th>
      <th>City</th>
      <th>Message_Id</th>
      <th>NotificationTitle</th>
       <th>IsReceived</th>
       <th>receivedtime</th>
       <th>IsOpened</th>
       <th>opendtime</th>
       <th>isapproved</th>
        <th>DateTimeToSend</th>
       </tr>
      </thead>
      <tbody>
     @foreach($query as $val) 
     <tr>
        <td><?php echo $val->FBAID; ?></td> 
        <td><?php echo $val->FirsName; ?></td>
        <td><?php echo $val->EmailID; ?></td> 
        <td><?php echo $val->mobiNumb1; ?></td>
        <td><?php echo $val->City; ?></td>
        <td><?php echo $val->Message_Id; ?></td>
        <td><?php echo $val->NotificationTitle; ?></td>
        <td><?php echo $val->IsReceived; ?></td>
        <td><?php echo $val->receivedtime; ?></td>
        <td><?php echo $val->IsOpened; ?></td>
         <td><?php echo $val->opendtime; ?></td>
         <td><?php echo $val->isapproved; ?></td>
         <td><?php echo $val->DateTimeToSend; ?></td>
            
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


