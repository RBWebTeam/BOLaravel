@extends('include.master')
 @section('content') 
<form id="approve" name="approve"> 
<div id="content" style="overflow:scroll;">
<div class="container-fluid white-bg">
<div class="col-md-12"><h3 class="mrg-btm">Ticket Details </h3></div>
<div class="col-md-12">
<div class="overflow-scroll">
<div class="table-responsive" >
<table id="example" class="table table-bordered table-striped tbl" >
<thead>
   <tr>
   <th>TicketRequestId</th>
   <th>SubCategoryId</th>
   <th>ClassificationId</th>
   <th> catecode</th>
   <th>FBAUserId</th>
    </tr>
    </thead>
    <tbody>
     @foreach($ticketdetails as $val) 
     <tr>
    <td><?php echo $val->TicketRequestId; ?></td> 
    <td><?php echo $val->SubCategoryId; ?></td>
    <td><?php echo $val->ClassificationId; ?></td>
    <td><?php echo $val->catecode ; ?></td>
    <td><?php echo $val->FBAUserId;?></td>
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