@extends('include.master')
 @section('content')
       <div class="container-fluid white-bg">
       <div class="col-md-12"><h3 class="mrg-btm">Queries</h3></div>
       

<div id="myDIV">
  <a href="{{url('queries')}}?queries=1" class="qry-btn" id="pospbtn">POSP Transaction</a>
  <a href="{{url('queries')}}?queries=2"  class="qry-btn">Not POSP</a>
  <a href="{{url('queries')}}?queries=3" class="qry-btn">Policy Sold</a>
  <a href="{{url('queries')}}?queries=4" class="qry-btn">FBA Never Logged In</a>
  <a href="{{url('queries')}}?queries=5" class="qry-btn">Inactive POSP </a>
  <a href="{{url('queries')}}?queries=6" class="qry-btn">POSP Without POSP No</a>
  <a href="{{url('queries')}}?queries=7" class="qry-btn">POSP Without Payment</a>
  <a href="{{url('queries')}}?queries=8"  class="qry-btn">Transaction Today</a>
  <a href="{{url('queries')}}?queries=9"  class="qry-btn">Not Posp but sold policy</a>
</div>

<br>
 <div id="export_id"></div>
<br>

 
   <div class="col-md-12">
       <div class="overflow-scroll">
       <div class="table-responsive" >
<div id="divinfo">
  <table style="float: right;">
  <tr>
  <td style="padding:0 15px 0 15px;">
  <p style="color: #3379b7"><strong>Q = Quote</strong></p>
  </td>
  <td style="padding:0 15px 0 15px;">
  <p style="color: #3379b7"><strong>MS = Mail send</strong></p>
  </td>
  <td style="padding:0 15px 0 15px;">
  <p style="color: #3379b7"><strong> PS = Payment successful</strong></p>
  </td>
  </tr>
  </table>
</div>
<br>
        <table id="example" class="datatable-responsive table table-striped table-bordered dt-responsive nowrap" >
                 <thead >
                 <tr class="thead_cl">

                 </tr>

                </thead>
                <tbody>
                @foreach($query as $val)
              <tr>

                @if($status==3 or $status==9 )
                <td> {{$val->created_date}}</td>
                <td> {{$val->FBAId}}</td>
               <td> {{$val->FBAName}}</td>
               <td> {{$val->Mobile}}</td>
               <td> {{$val->Email}}</td>
                @else
               <td> {{$val->FBAId}}</td>
               <td> {{$val->FBAName}}</td>
               <td> {{$val->Mobile}}</td>
               <td> {{$val->Email}}</td>
                @endif

                @if($status==1)
               <td> {{$val->City}}</td>
    
       <!--          @if($val->HEALTH[2]!=0)
                <td>    
                <a href="queries-health/{{$val->FBAId}}?{{explode(' ',$val->HEALTH)[0]}}" target="_blank" > {{explode(' ',$val->HEALTH)[0]}}</a>
                <a href="queries-health/{{$val->FBAId}}?{{explode(' ',$val->HEALTH)[1]}}" target="_blank" > {{explode(' ',$val->HEALTH)[1]}}</a>
                <a href="queries-health/{{$val->FBAId}}?{{explode(' ',$val->HEALTH)[2]}}" target="_blank" > {{explode(' ',$val->HEALTH)[2]}}</a>
                 </td>
                @else
                <td> {{$val->HEALTH}} </td>
                @endif -->


                @if($val->MOTOR[2]!=0)
                <td>  

                <a href="queries-motor/{{$val->FBAId}}?{{explode(' ',$val->MOTOR)[0]}}" target="_blank" > {{explode(' ',$val->MOTOR)[0]}}</a>
                <a href="queries-motor/{{$val->FBAId}}?{{explode(' ',$val->MOTOR)[1]}}" target="_blank" > {{explode(' ',$val->MOTOR)[1]}}</a>
                <a href="queries-motor/{{$val->FBAId}}?{{explode(' ',$val->MOTOR)[2]}}" target="_blank" > {{explode(' ',$val->MOTOR)[2]}}</a>
                @else
                <td> {{$val->MOTOR}} </td>
                @endif

               <td> {{$val->HOME_LOAN}}</td>
               <td> {{$val->PL}}</td>
              


                 @if($val->TWO_WHEELER[2]!=0)
                <td>  
                <a href="queries-two-wheeler/{{$val->FBAId}}?{{explode(' ',$val->TWO_WHEELER)[0]}}" target="_blank" > {{explode(' ',$val->TWO_WHEELER)[0]}}</a>
                <a href="queries-two-wheeler/{{$val->FBAId}}?{{explode(' ',$val->TWO_WHEELER)[1]}}" target="_blank" > {{explode(' ',$val->TWO_WHEELER)[1]}}</a>
                <a href="queries-two-wheeler/{{$val->FBAId}}?{{explode(' ',$val->TWO_WHEELER)[2]}}" target="_blank" > {{explode(' ',$val->TWO_WHEELER)[2]}}</a>
                @else
                <td> {{$val->TWO_WHEELER}} </td>
                @endif

               @elseif($status==2)
               <td> {{$val->City}}</td>
              <!--  <td> {{$val->HEALTH}}</td> -->
               <td> {{$val->MOTOR}}</td>
               <td> {{$val->HOME_LOAN}}</td>
               <td> {{$val->PL}}</td>
               <td> {{$val->TWO_WHEELER}}</td>
                
               @elseif($status==3 or $status==9)
               <td> {{$val->City}}</td>
               <td> {{$val->pcount}}</td>
               <td> {{$val->TName}}</td>
               @elseif($status==4)
               <td> {{$val->City}}</td>
                <td> {{$val->CreaOn}}</td>
               @elseif($status==5)
               <td> {{$val->City}}</td>
                 <td> {{$val->created_date}}</td>
                  <!-- <td> {{$val->HEALTH}}</td> -->
               <td> {{$val->MOTOR}}</td>
               
               <td> {{$val->TWO_WHEELER}}</td>
               @elseif($status==6)

               <td> {{$val->Created_Date}}</td>
                <td>{{$val->PospName}}</td>
               @elseif($status==7)
               <td> {{$val->City}}</td>
                 <td> {{$val->Created_Date}}</td>
                <td> {{$val->POSPName}}</td>
               @elseif($status==8)
               <td> {{$val->City}}</td>
               <!-- <td> {{$val->HEALTH}}</td> -->
               <td> {{$val->MOTOR}}</td>
               
               
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