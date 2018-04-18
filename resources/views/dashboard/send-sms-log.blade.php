
 @extends('include.master')
 @section('content') 
<form id="approve" name="approve"> 
<div id="content" style="overflow:scroll;">
 <div class="container-fluid white-bg">
 <div class="col-md-12"><h3 class="mrg-btm">Sms Log</h3></div>
 <div class="col-md-12">
  <div class="overflow-scroll">
  <div class="table-responsive" >
  <table id="example" class="table table-bordered table-striped tbl" >
   <thead>
   <tr>
    <th>FBAID</th>
    <th>FirsName</th>
     <th>mobiNumb1</th>
      <th> group_id</th>
      <th>message</th>
       <th>msgtime</th> 
      <th>msgid</th> 
      <th>issent</th>
       </tr>
      </thead>
      <tbody>
     @foreach($query1 as $val) 
     <tr>
        <td><?php echo $val->FBAID; ?></td> 
         <td><?php echo $val->FirsName; ?></td>
         <td><?php echo $val->mobiNumb1; ?></td>
          <td><?php echo $val->group_id; ?></td>
          <td><?php echo $val->message; ?></td>
          <td><?php echo $val->msgtime; ?></td>
          <td><?php echo $val->msgid; ?></td>
          <td><?php echo $val->issent; ?></td>
        
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


