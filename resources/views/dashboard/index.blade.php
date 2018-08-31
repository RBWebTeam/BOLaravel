@extends('include.master')
@section('content')
  <style>
table, th, td {
    border: 1px solid #D3D3D3 !important;
    border-collapse: collapse;
    background-color: white;
}
th,td {
    padding: 5px;
    text-align: left;
}
</style>          
<div class="container-fluid white-bg">
   <div class="col-md-12"><h3 class="mrg-btm">Your Information</h3></div>
     <div class="col-md-12">
       <div class="overflow-scroll">
           <div class="table-responsive" >
						<!-- <div class="brdr text-center white-bg">
						<img src="images/registration.png" class="img-responsive center-img img-circle-cs" />
						<h4>FSM Details</h4>
						<br/>
						<a href="{{'Fsm-Details'}}"><button class="common-btn center-obj">View More</button></a>
						</div>
						</div>
						<div class="col-md-3 col-xs-12">
						<div class="brdr text-center white-bg">
						<img src="images/leader-detail.png" class="img-responsive center-img img-circle-cs" />
						<h4>Lead Details</h4>
						<br/>
						<a href="{{'lead-up-load'}}"><button class="common-btn center-obj">View More</button></a>
						</div>
						</div>
						<div class="col-md-3 col-xs-12">
						<div class="brdr text-center white-bg">
						<img src="images/query.png" class="img-responsive center-img img-circle-cs" />
						<h4>User Query</h4>
						<br/>
						<a href="{{'queries'}}"><button class="common-btn center-obj">View More</button></a>
						</div>
						</div>
						<div class="col-md-3 col-xs-12">
						<div class="brdr text-center white-bg">
						<img src="images/register-fba-img.png" class="img-responsive center-img img-circle-cs" />
						<h4>FBA Registration</h4>
						<br/>
						<a href="{{'fba-list'}}"><button class="common-btn center-obj">View More</button></a>
						</div> -->

                        <table class="table-bordered col-md-6">
                        	 @foreach($basicinfo as $val)
                        	<tr>
                        		<th>FBAUserId</th>
                        		<td>{{$val->FBAUserId}}</td>
                        	</tr>
                        	<tr>
                        		<th>FBAID</th>
                        		<td>{{$val->FBAID}}</td>
                        	</tr>
                        	<tr>
                        		<th>Profile</th>
                        		<td><p style="color: #39FF14"><b>{{$val->profile}}</b></p></td>
                        	</tr>
                        	<tr>
                        		<th>User Type</th>
                        		<td>{{$val->usertype}}</td>
                        	</tr>
                        	<tr>
                        		<th>Name</th>
                        		<td>{{$val->FullName}}</td>
                        	</tr>
                        	<tr>
                        		<th>Mobile Number</th>
                        		<td>{{$val->MobiNumb1}}</td>
                        	</tr>
                        	<tr>
                        		<th>Email ID</th>
                        		<td>{{$val->EmailID}}</td>
                        	</tr>                        	
                        	<tr>
                        		<th>DOB</th>
                        		<td>{{$val->DOB}}</td>
                        	</tr>
                        	<tr>
                        		<th>Last Login Date</th>
                        		<td>{{$val->LastLogiDate}}</td>
                        	</tr>
                        	@endforeach
                        </table>
						
				        </div>
				</div>
		</div>
</div>

@endsection		
            