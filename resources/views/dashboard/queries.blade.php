@extends('include.master')
 @section('content')
    <div id="content" style="padding:1px; overflow:scroll;">
       <div class="container-fluid white-bg">
       <div class="col-md-12"><h3 class="mrg-btm">Queries</h3></div>
       

<div class="btn-group"   >
  <a href="{{url('queries')}}?queries=1" class="btn btn-primary" style="margin-right:3px; padding:6px 10px;">POSP Transaction</a>
  <a href="{{url('queries')}}?queries=2"  class="btn btn-primary" style="margin-right:3px;padding:6px 10px;">Not POSP</a>
  <a href="{{url('queries')}}?queries=3" class="btn btn-primary" style="margin-right:3px;padding:6px 10px;">Policy Sold</a>
  <a href="{{url('queries')}}?queries=4" class="btn btn-primary" style="margin-right:3px;padding:6px 10px;">FBA Never Logged In</a>
  <a href="{{url('queries')}}?queries=5" class="btn btn-primary" style="margin-right:3px;padding:6px 10px;">Inactive POSP </a>
  <a href="{{url('queries')}}?queries=6" class="btn btn-primary" style="margin-right:3px;padding:6px 10px;">POSP Without POSP No</a>
  <a href="{{url('queries')}}?queries=7" class="btn btn-primary" style="margin-right:3px;padding:6px 10px;">POSP Without Payment</a>
  <a href="{{url('queries')}}?queries=8"  class="btn btn-primary" style="padding:6px 10px;">Transaction Today</a>
</div>

<br>
<br>

 <div id="export_id"></div>
<br>


   <div class="col-md-12">
       <div class="overflow-scroll">
       <div class="table-responsive" >
				<table id="example" class="datatable-responsive table table-striped table-bordered dt-responsive nowrap" >
                 <thead >
                 <tr class="thead_cl">

                 </tr>

                </thead>
                <tbody>
                @foreach($query as $val)
              <tr>

               <td> {{$val->FBAId}}</td>
               <td> {{$val->FBAName}}</td>
               <td> {{$val->Mobile}}</td>
               <td> {{$val->Email}}</td>
                @if($status==1)
               <td> {{$val->City}}</td>
               <td> {{$val->HEALTH}}</td>
               <td> {{$val->MOTOR}}</td>
               <td> {{$val->HOME_LOAN}}</td>
               <td> {{$val->PL}}</td>
               <td> {{$val->TWO_WHEELER}}</td>
               @elseif($status==2)
               <td> {{$val->City}}</td>
               <td> {{$val->HEALTH}}</td>
               <td> {{$val->MOTOR}}</td>
               <td> {{$val->HOME_LOAN}}</td>
               <td> {{$val->PL}}</td>
               <td> {{$val->TWO_WHEELER}}</td>
                
               @elseif($status==3)
                <td> {{$val->HEALTH}}</td>
                <td> {{$val->MOTOR}}</td>
                <td> {{$val->TWO_WHEELER}}</td>
               @elseif($status==4)
                <td> {{$val->CreaOn}}</td>
               @elseif($status==5)
                 <td> {{$val->created_date}}</td>
                  <td> {{$val->HEALTH}}</td>
               <td> {{$val->MOTOR}}</td>
               
               <td> {{$val->TWO_WHEELER}}</td>
               @elseif($status==6)
               <td> {{$val->Created_Date}}</td>
                <td>{{$val->PospName}}</td>
               @elseif($status==7)
                 <td> {{$val->Created_Date}}</td>
                <td> {{$val->POSPName}}</td>
               @elseif($status==8)
               <td> {{$val->HEALTH}}</td>
               <td> {{$val->MOTOR}}</td>
               <td> {{$val->HOME_LOAN}}</td>
               
               <td> {{$val->TWO_WHEELER}}</td>
               @else  
               <td> not found</td>
                 <?php  break; ?>
               @endif



              </tr>
              @endforeach

                 </tbody>
      </table>
			</div>
			</div>
			</div>
      </div>
      </div>

<script type="text/javascript">
  $(document).ready(function () {
    
    if ($.fn.dataTable.isDataTable('#tblqueries')) {
    table = $('#tblqueries').DataTable({
      paging:true;
      searching: true;

    });
}
else {

    table = $('#tblqueries').DataTable( {
        paging: false
    } );
}

});
      </script>
 @endsection