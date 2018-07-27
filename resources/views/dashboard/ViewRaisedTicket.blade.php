@extends('include.master')
@section('content') 
<form id="approve" name="approve"> 
<div id="content" style="overflow:scroll;">
<div class="container-fluid white-bg">
<div class="col-md-12"><h3 class="mrg-btm">View Raised Ticket</h3></div>
<div class="col-md-12">
<div class="overflow-scroll">
<div class="table-responsive" >
<table id="example" class="table table-bordered table-striped tbl" >
<thead>
<tr>
<th>Ticket Request Id</th>
<th>Category Name</th>
<th>Sub Category Name</th>
<th>Classification Name</th>
<th>Message</th>
<th>Document</th>
<th>FBA Name</th>
<th>FBA Mobile No</th>
<th>Created Date</th>
<th>Ticket Status</th>
<th>Delete</th>
</tr>
</thead>
<tbody>
@foreach($query as $val) 
<tr>
<td><?php echo $val->TicketRequestId; ?></td> 
<td><?php echo $val->CateName; ?></td>
<td><?php echo $val->QuerType; ?></td>
<td><?php echo $val->Description ; ?></td>
<td><?php echo $val->Message;?></td>
<td><?php if($val->DocPath == ""){ ?>No Document Found</td>
<?php } else { ?>
<a href="{{url('upload/Raiserticket')}}/{{$val->DocPath}}" download class="btn btn-primary">View</a></td>
 <?php }?> 
<td><?php echo $val->FullName ; ?></td>
<td><?php echo $val->MobiNumb1;?></td>
<td><?php echo $val->CreatedDate ; ?></td>
<td><?php echo $val->StatusName;?></td>
<td><a class="btn btn-primary" onclick="deleteticket({{$val->TicketRequestId}},this)">Delete</a>
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
<script type="text/javascript">
function deleteticket($tktid,btndelete){
var del=confirm("Are you sure you want to delete this record?");
if (del==true){
var ticketid= $tktid;
$.ajax({ 
type: "GET",
url:'View-Raised-Ticket/'+ticketid,
success: function( msg ) {
console.log(msg);
alert("Ticket deleted successfully..!");
$(btndelete).closest('tr').remove();
}
});
}else{
alert("Ticket Not Deleted")
}
return del;
}
</script>
@endsection
    