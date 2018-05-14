@extends('include.master')
@section('content')
<div class="container-fluid white-bg">
<div class="col-md-12"><h3 class="mrg-btm">Send SMS Rights</h3></div>
   <div class="col-md-12">
      <div class="overflow-scroll">
         <div class="table-responsive" >
	<table class="datatable-responsive table table-striped table-bordered dt-responsive nowrap" id="example">
		 <thead>
                  <tr>
                  	<th>User Id </th>
                   <th>User Name</th>
                   <th>Login Name</th>
                   <th>Device Name</th>
                   <th>Employee ID</th>
				   <th>Mobile No.</th>
				   <th>Email ID</th>
				   <th>Action</th>
				  </tr>
         </thead>
            
                <tbody>
                      @foreach($query as $val)
                	<tr>
                	<td>{{$val->FBAUserId}}</td>
                	<td>{{$val->UserName}}</td>
                	<td>{{$val->LogiName}}</td>
                	<td>{{$val->DeviceName}}</td>
                	<td>{{$val->empid}}</td>
                	<td>{{$val->mobile}}</td>
                	<td>{{$val->email}}</td>
                	<td>
                	@if($val->isdirectsend == '1')
              <a id="btnissend" class="btn btn-success btnissend" onclick="isdirectsend({{$val->FBAUserId}},this)">Send Direct</a>
                		 &nbsp;  &nbsp;
                		 <a id="bntneedapproval" class="btn btn-danger bntneedapproval" 
                		 onclick="isneedapproval({{$val->FBAUserId}},this)">Need Approval</a>
                
                	@elseif($val->isdirectsend == '0')
                	
                		 <a id="btnissend" class="btn btn-danger btnissend" onclick="isdirectsend({{$val->FBAUserId}},this)">Send Direct</a>
                		 &nbsp;  &nbsp;
                		 <a id="bntneedapproval" class="btn btn-success bntneedapproval" onclick="isneedapproval({{$val->FBAUserId}},this)">Need Approval</a>
                	@else
                		 <a id="btnissend" class="btn btn-default btnissend" onclick="isdirectsend({{$val->FBAUserId}},this)">Send Direct</a
                				>&nbsp;  &nbsp;
                		 <a id="bntneedapproval" class="btn btn-default bntneedapproval" onclick="isneedapproval({{$val->FBAUserId}},this)">Need Approval</a>
                	
                	@endif
                	</td>
                	</tr>
                	@endforeach
                </tbody>
    </table>
</div>
</div>
</div>
</div>
<script type="text/javascript">
	function isdirectsend($userid,btn){

		if (confirm('confirm to take this action..!')) 
		{
            
            $.ajax({
                    url: 'send-sms-directsend/'+$userid,
                    type: "GET",
                    dataType: "json",
                    success:function(data)
                     {
                       $(btn).closest('td').find('a').addClass('btn-danger');
					      $(btn).closest('td').find('a').removeClass('btn-success');
					   $(btn).removeClass('btn-danger');
                       $(btn).addClass('btn-success');
                     }
                  });
            alert('Rights updated successfully..!');
                           } 
                          else {
                                alert('canceled..!');
                              }
		
		
	}
	function isneedapproval($userid,btn){
		if (confirm('confirm to take this action..!')) 
		{
		$.ajax({
                    url: 'send-sms-needaproval/'+$userid,
                    type: "GET",
                    dataType: "json",
                    success:function(data) 
                    {
                    
                       $(btn).closest('td').find('a').addClass('btn-danger');
                       $(btn).closest('td').find('a').removeClass('btn-success');
                       $(btn).removeClass('btn-danger');
                       $(btn).addClass('btn-success');

                    }
               });
		 alert('Rights updated successfully..!');
		 } 
           else {
                  alert('canceled..!');
                 }
	}
</script>
@endsection