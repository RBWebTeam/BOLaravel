 
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>
<script type="text/javascript" src="http://maps.googleapis.com/maps/api/js?sensor=false"></script>

<style>
  .month1 {height:100px; border:1px solid #f1efef;background:#f5f5f5; text-align:center;font-size:16px; padding:14px;}
  .month1:hover {background:#fff;}
  .title11 {text-transform:uppercase;background: #337bb7;padding: 10px;margin: 0px;color: #fff;}
  .box-shadow {box-shadow:1px 1px 3px 1px #ccc; padding-left:0px; padding-right:0px;}
  h3 {font-size:18px;}
  .count {font-size:13px; color:#888;}
  .efefef {background: #efefef;}
  .box-shadow a {text-align:center;}
  
  @media only screen and (max-width: 768px) {
  .efefef {background: #f5f5f5;}
  .box-shadow {float:left;}
  }
</style>

<div class="container-fluid white-bg">
            <div class="col-md-12"><h3 class="mrg-btm" style="margin-left: 90px;font-size: 27px;">Motor Lead Details</h3></div>

          <div class="col-md-12">
          <div class="overflow-scroll">
          <div class="table-responsive" >

    <!--    <table id="tbl-motor-lead-details"> --> 
     
    <!--   <tbody> -->
             <div class="container-fluid white-bg">
        
  <!--      <div class="col-md-8 col-md-offset-2 box-shadow"> -->
    <!--        <div class="col-md-6 col-md-offset-2 box-shadow" style="padding-left:0px; padding-right:0px;margin-left: 22.66666667%;margin-top: 50px">
       <h3 class="text-center title11">Calendar <img src="../images/calendar_white.png" style="width: 19px;margin-top: -5px;" /></h3> -->


<!-- <?php $i=1;?><tr>
                  @foreach($motorlead as $val)
                  <?php if($i==9) {echo "<tr>"; }?>  
                   <div class="col-md-2 month1 col-xs-6 col-sm-6">{{$val->Month_Name}}<br>
                  <span>
                  <a href="{{url('motor-lead-alldetails')}}/{{$val->FBAID}}/{{$val->month_no}}" onclick="getmonthcount()">({{$val->Count}})
                  </a>
               </span>
               </div>
              
                  <?php if($i==4) {echo "</tr>"; }?>   
                  <?php $i++;?>
                @endforeach  
             </tr>      -->              
<!-- </tbody> -->
<!-- </table> -->
                             </div>
                         </div>
                      </div>
                  


<!-- <div id="content" style="overflow:scroll;"> -->
<!--        <div class="container-fluid white-bg">
        
  <div class="col-md-8 col-md-offset-2 box-shadow"> -->
           <div class="col-md-6 col-md-offset-2 box-shadow" style="padding-left:0px; padding-right:0px;margin-left: 22.66666667%;margin-top: 50px">
       <h3 class="text-center title11">Calendar <img src="../images/calendar_white.png" style="width: 19px;margin-top: -5px;" /></h3>
 

<!--   @foreach($motorlead as $val)
      @if($val->Count!='0' && $val->url!='')
        <a href="#"><div class="col-md-2 month1 col-xs-6 col-sm-6">
       <span class="count"><a href="{{url('motor-lead-alldetails')}}/{{$val->FBAID}}/{{$val->month_no}}" onclick="getmonthcount()">{{$val->Month_Name}} <br>({{$val->Count}})
            </a></span>
       </div></a> 
       @else
         <a href="#"><div class="col-md-2 month1 col-xs-6 col-sm-6">
       <span class="count"><a href="#" onclick="getmonthcount()">{{$val->Month_Name}} <br>({{$val->Count}})
            </a></span>
       </div></a> 

       @endif
       @endforeach  -->


     @foreach($motorlead as $val)
      @if($val->Count!='0')
        <a href="#"><div class="col-md-2 month1 col-xs-6 col-sm-6 efefef">
       <span class="count"><a href="{{url('motor-lead-alldetails')}}/{{$val->FBAID}}/{{$val->month_no}}" onclick="getmonthcount()">{{$val->Month_Name}} <br>({{$val->Count}})
            </a></span>
       </div></a> 
       @else
         <a href="#"><div class="col-md-2 month1 col-xs-6 col-sm-6 efefef">
       <span class="count"><a href="#" onclick="getmonthcount()">{{$val->Month_Name}} <br>({{$val->Count}})
            </a></span>
       </div></a> 

       @endif
       @endforeach  

  </div> 
       </div>
          </div>

   

 <script type="text/javascript">
  $(document).ready(function() {
  // $('#tbl-motor-lead-details').DataTable( {
  //   });

});

      function getmonthcount(){
        $.ajax({ 
        url: 'motor-lead-alldetails/'+FBAID+'/'+month_no,  
        method:"GET",
        success: function(data){
       }
     });
  }

      </script>


<!-- <script type="text/javascript">
alert('test123');
  
function getmonthcount(){
$.ajax({  
  
         type: "GET",  
          url: 'motor-lead-alldetails/'+FBAID+'/'+month_no,
         success: function(data){
          //alert(data);

      var data = JSON.parse(data);
      var str = "<table class='table'><tr style='height:30px;margin:5px;'><td>Client Name</td><td>Mobile No</td><td>Category</td><td>Registration No</td><td>Expiry Date</td></tr>";
       for (var i = 0; i < data.length; i++)
       {

         str = str + "<tr style='height:30px;margin:5px;'><td>"+data[i].ClientName+"</td><td>"+data[i].MobileNo+"</td><td>"+data[i].Category+"</td><td>"+data[i].RegistrationNo+"</td><td>"+data[i].ExpiryDate+"</td></tr>";
       }
         str = str + "</table>";
           $('#divleadtable').html(str);   
       }  
      });
}


</script> -->


      <!-- Button trigger modal -->
<!-- <button type="button" class="" data-toggle="modal" data-target="#leaddataModal">
  Button
</button> -->
<!-- Modal -->
<!-- <div class="modal fade" id="leaddataModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Details</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <div class="table-responsive">
        <div id="divleadtable" name="divleadtable">

        </div>
        </div>
  
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div> -->




 <!--   <button id="mycalender" name="mycalender" onclick="getthreemonth()" class="btn btn-primary message_sms_id" type="button">Get Month</button> -->

<!-- <p id="test1"></p> 
<p id="test2"></p>
<p id="test3"></p>

<script type="text/javascript">

function getthreemonth(){
  alert('test');
     var previous = new Date();
    var current = new Date();
    var next = new Date();
    previous.setMonth(previous.getMonth(), -30);
    current.setMonth(current.getMonth(), 1);
    next.setMonth(next.getMonth(), +31);
    document.getElementById("test1").innerHTML = previous;
    document.getElementById("test2").innerHTML = current;
    document.getElementById("test3").innerHTML = next;
     alert(previous);  alert(current);  alert(next);
      
}
</script>

