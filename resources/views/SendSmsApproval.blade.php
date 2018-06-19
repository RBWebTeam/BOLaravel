@extends('include.master')
@section('content')
<div class="container-fluid white-bg">
<div class="col-md-12"><h3 class="mrg-btm">Send SMS Approval</h3></div>
   <div class="col-md-12">
      <div class="overflow-scroll">
         <div class="table-responsive" >
	     <table class="datatable-responsive table table-striped table-bordered dt-responsive nowrap" id="example">
		 <thead>
            <tr>
             
              <!--  <th>FBA Id</th> -->
               <th>FBA Count</th>
               <th>Parent groupid</th>
               <th>Message</th>
               <th>Message Time</th>
               <th>Create Date</th>
               <th>Created By</th>
               <th>Action</th>
            </tr>
         </thead>
         <tbody>

         
         	@foreach($query as $val)
         	<tr>
         	 <!--  <td>{{$val->fbaid}}</td> -->
              <td>{{$val->FBACount}}</td>
              <td>{{$val->parentgroupid}}</td>
              <td><label><textarea>{{$val->message}}</textarea></label></td>
         	  <td>{{$val->msgtime}}</td>
         	  <td>{{$val->create_date}}</td>
         	  <td><label>{{$val->LogiName}}</label></td>
         	  <td>
      <a id="approvesms" name="approvesms" class="btn btn-success" onclick="">Send</a>
   	<!-- <a id="" class="btn btn-danger" onclick="">Reject</a> -->
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

