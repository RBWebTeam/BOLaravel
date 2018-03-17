@extends('include.master')
 @section('content')
    <div id="content" style="padding:1px; overflow:scroll;">
       <div class="container-fluid white-bg">
       <div class="col-md-12"><h3 class="mrg-btm">Queries</h3></div>
       

<div id="myDIV">
  <a href="{{url('queries')}}?queries=1" class="qry-btn">POSP Transaction</a>
  <a href="{{url('queries')}}?queries=2"  class="qry-btn">Not POSP</a>
  <a href="{{url('queries')}}?queries=3" class="qry-btn">Policy Sold</a>
  <a href="{{url('queries')}}?queries=4" class="qry-btn">FBA Never Logged In</a>
  <a href="{{url('queries')}}?queries=5" class="qry-btn">Inactive POSP </a>
  <a href="{{url('queries')}}?queries=6" class="qry-btn">POSP Without POSP No</a>
  <a href="{{url('queries')}}?queries=7" class="qry-btn">POSP Without Payment</a>
  <a href="{{url('queries')}}?queries=8"  class="qry-btn" >Transaction Today</a>
</div>
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
               <td> {{$val->CreatedDate}}</td>
               <td> {{$val->HEALTH}}</td>
               <td> {{$val->MOTOR}}</td>
               <td> {{$val->HOME_LOAN}}</td>
               <td> {{$val->PL}}</td>
               <td> {{$val->TWO_WHEELER}}</td>
                
               @elseif($status==3)
               <td> {{$val->City}}</td>
               <td> {{$val->Createddate}}</td>
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



<script type="text/javascript" src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
<script type="text/javascript">
  
      </script>
	  
	<script>
// Add active class to the current button (highlight it)
var header = document.getElementById("myDIV");
var btns = header.getElementsByClassName("qry-btn");
for (var i = 0; i < btns.length; i++) {
  btns[i].addEventListener("click", function() {
    var current = document.getElementsByClassName("active");
    current[0].className = current[0].className.replace(" active", "");
    this.className += " active";
  });
}
</script>
 @endsection