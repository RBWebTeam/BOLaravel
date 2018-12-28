@extends('include.master')
 @section('content')

 <body onload="currentrecort();">
       <div class="container-fluid white-bg">
       <div class="col-md-12"><h3 class="mrg-btm">Registration Report</h3></div>

<!-- <form class="form-horizontal" id="rrregist"  method="post">
{{ csrf_field() }} -->

      <div class="col-md-2">
      <div class="form-group">

    <p>From Date</p>
         <div id="datepicker" class="input-group date" data-date-format="yyyy-mm-dd">
               <input class="form-control date-range-filter" type="text" placeholder="From Date" name="fdate" id="min"/>
          <span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
               </div>
              </div>
            </div>
           <div class="col-md-2">
        <div class="form-group">
        <p>To Date</p>
        <div id="datepicker1" class="input-group date" data-date-format="yyyy-mm-dd">
  <input class="form-control date-range-filter" type="text" placeholder="To Date"  name="ldate"  id="max"/>
          <span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
         </div>
      </div>
  </div>

      <div class="form-group"> <input type="submit" name="btndate" id="btndate"  class="mrg-top common-btn pull-left" value="SHOW">

<div class="col-md-12">
			 <div class="overflow-scroll">
			 <div class="table-responsive" >
				<table id="Regireport" class="table table-bordered table-striped tbl" >
                <thead>
                  <tr>
                  <th>Fba Creation</th> 
                  <th>Posp Creation</th> 
                  <th>Posp Certification</th>  
                  </tr>
                </thead>
                <tbody>
      </tbody>
      </table>
      <!-- </body> -->
			</div>
			</div>
			</div>


<!--        <div class="col-md-5">
       <div class="overflow-scroll">
       <div class="table-responsive">
       <h3 class="mrg-btm">Summary- 1</h3></div>
       <table id="notregireport" class="table table-bordered table-striped tbl" >
                <thead>
                  <tr>
                  <th>Fba Creation</th> 
                  <th>Non Posp Creation</th> 
                  <th>Non Posp Certification</th>  
                  </tr>
                </thead>
                <tbody>
      </tbody>
      </table>
       </div>
      </div>
 -->

      <div class="col-md-5">
       <div class="overflow-scroll">
       <div class="table-responsive">
       <h3 class="mrg-btm">FBA to Posp Creation </h3></div>
       <table id="fbatopospcreation" class="table table-bordered table-striped tbl" >
                <thead>
                  <tr>
                  <th>Range_Name</th> 
                  <th>Count</th> 
                 </tr>
                </thead>
                <tbody>
      </tbody>
      </table>
       </div>
      </div>


           <div class="col-md-5">
       <div class="overflow-scroll">
       <div class="table-responsive">
       <h3 class="mrg-btm"> Posp to Certification</h3></div>
       <table id="fbatoCertification" class="table table-bordered table-striped tbl" >
                <thead>
                  <tr>
                  <th>Range_Name</th> 
                  <th>Count</th> 
                 </tr>
                </thead>
                <tbody>
      </tbody>
      </table>
       </div>
      </div>





      </div>


  </div>


    <script type="text/javascript">
    $(document).ready(function(){

    $('#btndate').on("click", function(){
    //alert("test data");
     var fdate = $('#min').val();
     var ldate = $('#max').val();
     $.ajax({ 
     url: 'Regi-report/'+fdate+'/'+ldate,
     dataType : 'json',
     method:"GET",
     success: function(msg){
     $('#Regireport>tbody').empty()

         
  $('#Regireport').append("<tr><td><a target='_blank' href='Registartion-report-details/"+ fdate+"/"+ldate+"'>" + msg[0].fbacreation + "</a></td><td><a target='_blank' href='posp-certification/"+ fdate+"/"+ldate+"'>" + msg[0].pospcreation + "</a></td><td><a target='_blank' href='posp-certification-date/"+ fdate+"/"+ldate+"'>" + msg[0].pospcertification + "</a></td></tr>");
          //alert(msg[0].fbacreation);
          console.log(msg);  
 }
   });  
   });
    });  
  
</script>



<script type="text/javascript">
  
  function currentrecort(){
var today = new Date();
var yyyy = today.getFullYear();
var mm = today.getMonth()+1; //January is 0!
var dd = today.getDate();
if(dd<10) {
    dd = '0'+dd
} 

if(mm<10) {
    mm = '0'+mm
} 

today = yyyy + '-' + mm + '-' + dd;
//document.write(today);


// alert(today);

    var fdate = today;
    var ldate = today;
    //alert(fdate);
$.ajax({ 
     url: 'Regi-report/'+fdate+'/'+ldate,
     dataType : 'json',
     method:"GET",
     success: function(msg){
    $('#Regireport>tbody').empty()
   $('#Regireport').append("<tr><td><a target='_blank' href='Registartion-report-details/"+ fdate+"/"+ldate+"'>" + msg[0].fbacreation + "</a></td><td><a target='_blank' href='posp-certification/"+ fdate+"/"+ldate+"'>" + msg[0].pospcreation + "</a></td><td><a target='_blank' href='posp-certification-date/"+ fdate+"/"+ldate+"'>" + msg[0].pospcertification + "</a></td></tr>");
          console.log(msg);  
 }
   });  
    //alert('test');
  }
</script>
<!-- 
 <script type="text/javascript">
    $(document).ready(function(){

    $('#btndate').on("click", function(){
    //alert("test data");
     var fdate = $('#min').val();
     var ldate = $('#max').val();
     $.ajax({ 
     url: 'notregi-report/'+fdate+'/'+ldate,
     dataType : 'json',
     method:"GET",
     success: function(msg){
     $('#notregireport>tbody').empty()

     $('#notregireport').append("<tr><td>" + msg[0].fbacreation + "</td><td>" + msg[0].pospcreation + "</td><td>" + msg[0].pospcertification + "</td></tr>");


 }
   });  
   });
    });  
  
</script> -->



 <script type="text/javascript">
    $(document).ready(function(){

    $('#btndate').on("click", function(){
        $('#fbatopospcreation>tbody').empty();
    var fdate = $('#min').val();
     var ldate = $('#max').val();
     $.ajax({ 
      url: 'fba-creation/'+fdate+'/'+ldate,
     dataType : 'json',
     method:"GET",
     success: function(msg){

    if (msg.length>0){

        
      arr=Array();
    $.each(msg, function(index, val) {
    arr.push("<tr><td>" +val.Range_Name + "</td><td>" +val.Count + "</td></tr>");
    });
    $('#fbatopospcreation').append(arr);
      }else{
       $('#fbatopospcreation>tbody').empty()

     $('#fbatopospcreation').append("<tr><td colspan=2>Record not found</td></tr>");
      }
     
}
 });  

});
    });  


</script>



<!-- old script start -->
 <!-- <script type="text/javascript">
    $(document).ready(function(){

    $('#btndate').on("click", function(){
    //alert("test data");
     var fdate = $('#min').val();
     var ldate = $('#max').val();
     $.ajax({ 
     url: 'fba-creation/'+fdate+'/'+ldate,
     dataType : 'json',
     method:"GET",
     success: function(msg){

      if (msg.length>0){
          $('#fbatopospcreation>tbody').empty()

     $('#fbatopospcreation').append("<tr><td>" + msg[0].Range_Name + "</td><td>" + msg[0].Count + "</td></tr>");

       }else{
            $('#fbatopospcreation>tbody').empty()

     $('#fbatopospcreation').append("<tr><td colspan=2>Record not found</td></tr>");

      }
   
 }
   });  
   });
    });  
  
</script> -->
<!-- old script End -->


 <script type="text/javascript">
    $(document).ready(function(){

    $('#btndate').on("click", function(){
        $('#fbatoCertification>tbody').empty();
    var fdate = $('#min').val();
     var ldate = $('#max').val();
     $.ajax({ 
    url: 'fba-certification/'+fdate+'/'+ldate,
     dataType : 'json',
     method:"GET",
     success: function(msg){

    // if (msg.length>0){
           if(msg!='' && msg!=null){

        
      arr=Array();
    $.each(msg, function(index, val) {
    arr.push("<tr><td>" +val.Range_Name + "</td><td>" +val.Count + "</td></tr>");
    });
    $('#fbatoCertification').append(arr);
      }else{
       $('#fbatoCertification>tbody').empty()

     $('#fbatoCertification').append("<tr><td colspan=2>Record not found</td></tr>");
      }
     
}
 });  

});
    });  


</script>



<!-- 
 <script type="text/javascript">
    $(document).ready(function(){

    $('#btndate').on("click", function(){
    //alert("test data");
     var fdate = $('#min').val();
     var ldate = $('#max').val();
     $.ajax({ 
     url: 'fba-certification/'+fdate+'/'+ldate,
     dataType : 'json',
     method:"GET",
     success: function(msg){

      if (msg.length>0){
          $('#fbatoCertification>tbody').empty()

     $('#fbatoCertification').append("<tr><td>" + msg[0].Range_Name + "</td><td>" + msg[0].Count + "</td></tr>");



      }else{
              $('#fbatoCertification>tbody').empty()

     $('#fbatoCertification').append("<tr><td colspan=2>Record not found</td></tr>");

      }
   



 }
   });  
   });
    });  
  
</script> -->









@endsection