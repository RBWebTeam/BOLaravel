@extends('include.master')
@section('content')
<div class="container-fluid white-bg">
<div class="col-md-12"><h3 class="mrg-btm">OFFLINE CS</h3></div>
<div class="col-md-12">
 <div class="overflow-scroll">
 <div class="table-responsive" >
<table class="datatable-responsive table table-striped table-bordered dt-responsive nowrap" id="example">
	<thead>
      <tr>
      	<th>ID</th>
      	<th>Produc Name</th>
      	<th>Customer Name</th>
      	<th>City</th>
      	<th>POSP Name</th>
      	<th>Mobile No</th>
      	<th>Action</th>
      	
      </tr>
    </thead>
    <tbody>
      @isset($data)
    	@foreach($data as $val)
    	<tr>
    		<td>{{$val->ID}}</td>
    		<td>{{$val->product_name}}</td>
    		<td>{{$val->cityname}}</td>
    		<td>{{$val->POSPName}}</td>
    		<td>{{$val->MobileNo}}</td>
    		<td></td>
    		<td></td>    		
    	</tr>
    	@endforeach
      @endisset
    </tbody>
</table>
</div>
</div>
</div>
</div>
@endsection