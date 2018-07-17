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
        <td>{{$val->CustomerName}}</td>
    		<td>{{$val->cityname}}</td>
    		<td>{{$val->POSPName}}</td>
    		<td>{{$val->MobileNo}}</td>
        <td>          
          @if($val->ismailsend!=1)
          <a id="btnedit" class="btn btn-primary" href="{{url('offlinecs')}}?id={{$val->ID}}" >Edit</a>
          <a id="btnedit" class="btn btn-primary" onclick="Sendemail({{$val->ID}},this)">Send Mail</a>
          @endif
          @if($val->ismailsend==1)
          <a id="btnedit" class="btn btn-primary" onclick="Sendemail({{$val->ID}},this)" >Send Mail</a>
          @endif
         </td>		
    	</tr>
    	@endforeach
      @endisset
    </tbody>
</table>
</div>
</div>
</div>
</div>
<script type="text/javascript">
  function Sendemail($ID)
  {
     alert($ID);    
   $.ajax({
             url: 'offlinecssendemail/'+$ID,
             type: "GET",             
             success:function(data) 
             {      
              alert("test");
             }
         });
  }
</script>
@endsection