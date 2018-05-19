@extends('include.master')
@section('content')

<div class="container">
         <table   class="datatable-responsive table table-striped table-bordered dt-responsive nowrap" >
         	<thead><tr>
         	<th>FBA ID</th>
         	<th>Full Name</th>
         	<th>  Phone Number</th>
         	<th>  Email ID</th>
         	<th>  state</th>
         	<th>  City</th>
         	</tr></thead>
         	<tbody><tr>
         	<td>{{$fba_details->FBAID}}</td>
         	<td>{{$fba_details->FullName}}</td>
         	<td>{{$fba_details->MobiNumb1}}</td>
         	<td>{{$fba_details->EmailID}}</td>
         	<td>{{$fba_details->state_name}}</td>
         	<td>{{$fba_details->City}}</td>
         	</tr></tbody>
         </table>

 
</div>



@foreach($health as $val)
<div class="container">
         <table   class="datatable-responsive table table-striped table-bordered dt-responsive nowrap" >
         	<thead><tr>
         <!-- 	<th> FBA ID</th> -->
         	<th> CRN</th>
         	<th>  Contact Name</th>
         	<th>  Sum Insured</th>
         	<th>  Quote Date</th>
         	<th>  Pincode</th>
         	</tr></thead>
         	<tbody>
              <tr>
             <!--  <td>{{$val->fba_id}}</td> -->
               <td>{{$val->crn}}</td>
               <td>{{$val->ContactName}}</td>
                <td>{{$val->SumInsured}}</td>
                 <td>{{$val->quotdate}}</td>
                   <td>{{$val->pincode}}</td>
         	  </tr>
              </tbody>
         </table>

 
</div>
@endforeach

@endsection