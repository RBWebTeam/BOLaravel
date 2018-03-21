@extends('include.master')
@section('content')
<div class="container-fluid white-bg">
<div class="col-md-12"><h3 class="mrg-btm">View Raised a Ticket</h3></div>
   <div class="col-md-12">
      <div class="overflow-scroll">
         <div class="table-responsive" >
	<table class="datatable-responsive table table-striped table-bordered dt-responsive nowrap" id="example">
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
				           <th>Action</th>
                  </tr>
                   </thead>
            
                <tbody>
                     @foreach($query as $val)
                	<tr>

                	<td>{{$val->TicketRequestId}}</td>
                	<td>{{$val->CateName}}</td>
                	<td>{{$val->QuerType}}</td>
                	<td>{{$val->Description}}</td>
                	<td>{{$val->Message}}</td>
                	<td>
                		<?php if($val->DocPath == ""){ ?>

                		 </td>
                		<?php } else { ?>
                		<a href="{{url('upload/Raiserticket')}}/{{$val->DocPath}}" download class="btn btn-primary">View</a></td>
                		<?php }?> 
                	<td>{{$val->FullName}}</td>
                	<td>{{$val->MobiNumb1}}</td>
                	<td>{{$val->CreatedDate}}</td>
                	<td><a class="btn btn-primary" href="{{url('View-Raised-Ticket')}}/{{$val->TicketRequestId}}"  >Delete</a>
                	</td>

                	</tr>
                	 @endforeach
                </tbody>
    </table>
</div>
</div>
</div>
</div>

@endsection