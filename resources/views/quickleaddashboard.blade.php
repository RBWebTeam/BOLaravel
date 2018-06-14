@extends('include.master')
@section('content')
<div class="container-fluid white-bg">
<div class="col-md-12"><h3 class="mrg-btm">Quick Lead</h3></div>
   <div class="col-md-12">
      <div class="overflow-scroll">
         <div class="table-responsive" >
	<table class="datatable-responsive table table-striped table-bordered dt-responsive nowrap" id="example">
		 <thead>
                  <tr>
                  	<th>Lead ID</th>
                  	<th>Lead Name</th>
                  	<th>Lead Email</th>
                  	<th>Lead Mobile</th>
                  	<th>Lead Status</th>
                  	<th>Product</th>                  	
                  	<th>FBA Name</th>
                  	<th>FBAID</th>
                  	<th>FBA Mobile Number</th>
                  	<th>FBA City</th>
                  	<th>User Name</th>
                  </tr>
         </thead>
         <tbody>
         	@foreach ($query as $val)
         	<tr>
         		<td>{{$val->Req_Id}}</td>
         		<td>{{$val->LeadName}}</td>
         		<td>{{$val->LeadEmail}}</td>
         		<td>{{$val->LeadMobile}}</td>
         		<td>{{$val->Lead_Status}}</td>
         		<td>{{$val->Product_Name}}</td>         		
         		<td>{{$val->Fullname}}</td>
         		<td>{{$val->FBAID}}</td>
         		<td>{{$val->MobiNumb1}}</td>
         		<td>{{$val->MobiNumb1}}</td>
         		<td>{{$val->UserName}}</td>
         	</tr>
         	@endforeach
         </tbody>
    </table>
       </div>
   </div>
 </div>
</div>
@endsection