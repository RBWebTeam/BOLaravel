
  @extends('include.master')
  @section('content') 
  <div class="container-fluid white-bg">
   <div class="col-md-12"><h3 class="mrg-btm">View Raised Ticket</h3></div>
   <div class="col-md-12">
   <div class="overflow-scroll">
   <div class="table-responsive" >
   <table class="datatable-responsive table table-striped table-bordered dt-responsive nowrap" id="example">
   <thead>
   <tr>
    <th>FBAID</th>
    <th>TicketRequestId</th>
    <th>Status</th>
    <th>CateName</th>
    <th>Classification</th>
    <th>Message</th>
    </tr>
    </thead>
    <tbody>
     @foreach($query as $val) 
  <tr>
  <td><?php echo $val->FBAID; ?></td> 
  <td><?php echo $val->TicketRequestId; ?></td> 
  <td><?php echo $val->Status; ?></td> 
  <td><?php echo $val->CateName; ?></td>
  <td><?php echo $val->Classification; ?></td>
  <td><?php echo $val->Message; ?></td> 
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


