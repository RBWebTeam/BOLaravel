@extends('include.master')
@section('content')
@if(Session::has('message'))
<div class="alert alert-success alert-dismissible">
<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
<p class="alert alert-success">{{ Session::get('message') }}</p>
</div>
@endif







<style type="text/css">
  
 .flt-lft{float:left;margin:3px}
</style>

<div class="container-fluid white-bg">
       <div class="col-md-12"><h3 class="mrg-btm">Offline-Request</h3></div>

<div class="col-md-12">
       <div class="overflow-scroll">
       <div class="table-responsive" >
       
        <table id="offline_Quotes" class="table table-bordered table-striped tbl" >
                 <thead>
                  <tr>
                   <th>#</th>
                   <th>Name</th>
                    <th>Product Name</th>
                   <th>Quote Description</th>
                   <th>Doc Links</th>
                   <th>Current Status</th>
                   <th>Remarks</th>
                  
                   <th>Created Date</th>
                    <th>Converted Date</th>
              
              </tr>
                </thead>
                <tbody>

              
 

        @foreach($Quotes as $val) 
     <tr>
    <td><?php echo $val->quotes_request_id; ?></td>   
    <td><?php echo $val->FullName.'<br>'.$val->MobiNumb1;?></td>
    <td><?php echo $val->product_name; ?></td>
     <td><a data-toggle="modal" data-target="#Quotedescription" onclick="viewdiscription('{{$val->id}}')">View Requirement</a>

    </td>
<!--  <td>
    <textarea style="height: 70px;width:338px" readonly >
<?php echo $val->Quote_description ; ?> 
      
</textarea>  --> 

 <!--    </td>   -->
    <td align=center>   
  <!--   @if($val->Status=='')
    <a href="" style="" data-toggle="modal"   onclick="Gettype('{{$val->id}}')">Update Status</a>
    @else 
      <span class="glyphicon glyphicon-blank"></span> 
      @endif -->
<!--     <br>
    <a href="" style="" data-toggle="modal" data-target="#statusdetails" onclick="statusviewoffline('{{$val->id}}')">View Status History</a> -->
      <a href="" style="" data-toggle="modal"  data-target="#docviwer" onclick="offlinedocview('{{$val->id}}')">Uploaded Quote</a>
@if($val->Type==1)
 ({{$val->totaldocs}})
   @else
    <span class="glyphicon glyphicon-blank"></span> 
  @endif
  <br><a type="button" id="hidetype1" onclick="viewImage('{{$val->id}}')">View User Doc</a>
 ({{$val->userupload}})
   
    </td>
    <td align="center">
   <!--  <?php echo $val->Status; ?> -->
      @if($val->Status=='Lost' || $val->Status=='Converted' )
        <a href="" style="" data-toggle="modal" data-target="#statusdetails" onclick="statusviewoffline('{{$val->id}}')">{{$val->Status}}</a>
<!--     <a href="" style="" data-toggle="modal"   onclick="Gettype('{{$val->id}}')">Update</a>
 -->    @else 
   
     
    <br>
        <a href="" style="" data-toggle="modal"  onclick="Gettype('{{$val->id}}')">Update</a>
    
      @endif
          <td><a data-toggle="modal" data-target="#updateremark" onclick="Getremarkhiddenid('{{$val->id}}')">Remarks</a></td>
      </td>
         <td><?php echo $val->Created_date; ?></td>
        <td><?php echo $val->Converted_date; ?></td>  


</tr>


  <!-- <td><a href="" style="" data-toggle="modal"  data-target="#docviwer" onclick="offlinedocview('{{$val->id}}')">Upload Doc</a><span style="font-size:15; margin-left: 10px">{{$val->totaldocs}}</span></td> -->
<!--   <td><a href="" style="" data-toggle="modal"  data-target="#docviwer" onclick="offlinedocview('{{$val->id}}')">Upload Doc</a>


@if($val->Type==1)
  <span style="font-size:15; margin-left: 10px">({{$val->totaldocs}}) </span>
   @else
    <span class="glyphicon glyphicon-blank"></span> 
  @endif
 </td>
    <td><a type="button" id="hidetype1" onclick="viewImage('{{$val->id}}')">View Doc</a>
  <span style="font-size:15; margin-left: 10px">({{$val->userupload}}) </span>
    </td>
  </tr>-->
    @endforeach 

 </tbody>

      </table>


<div class="modal" id="statusdetails">
    <div class="modal-dialog">
      <div class="modal-content">      
        <!-- Modal Header -->
         <div class="modal-header">
            <h4 class="modal-title">Current Status</h4>
              <button type="button" class="close" data-dismiss="modal">&times;</button>
         </div>        
        <!-- Modal body -->
             <div class="modal-body">
              <div class="table-responsive" >
            <div id="divstatus"> </div>
          </div>   
          </div>      
        <!-- Modal footer -->
        <div class="modal-footer">
        <!-- <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button> -->
        </div>
       </div>
    </div>
  </div>
</div>


<!-- QUOTES STATUS VIEW MODEL STATRT -->

<div class="modal" id="Quotedescription">
    <div class="modal-dialog">
      <div class="modal-content">      
        <!-- Modal Header -->
         <div class="modal-header">
            <h4 class="modal-title">Quote Description</h4>
              <button type="button" class="close" data-dismiss="modal">&times;</button>
         </div>        
        <!-- Modal body -->
             <div class="modal-body">
  <!--            <span id="txtdiscription"></span>  -->
             <textarea id="txtdiscription" readonly class="form-control" style="height: 218px;"></textarea>              
          </div>      
        <!-- Modal footer -->
        <div class="modal-footer">
       <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button> 
        </div>
       </div>
    </div>
  </div>
  <!-- QUOTES STATUS VIEW MODEL END -->

  <!-- Update Remark model Start -->

 <div class="modal" id="updateremark">
    <div class="modal-dialog">
      <div class="modal-content">      
        <!-- Modal Header -->
         <div class="modal-header">
            <h4 class="modal-title" style="line-height: 0.4281;">Update Remark</h4>
              <button type="button" class="close" data-dismiss="modal">&times;</button>
         </div>        
        <!-- Modal body -->
             <div class="modal-body">
                <div class="table-responsive" >
          

          </div>
             <form id="remarkupdate" name="remarkupdate" enctype="multipart/form-data" method="post">
             <input type="hidden" name="hiddenidremark" id="hiddenidremark" >
              {{csrf_field()}}
                  <br>


      <textarea name="rmkupdte" id="rmkupdte" rows="4" cols="50" placeholder="Write a Remark" required=""></textarea>

         <div id="loadremark"> </div>
         </div>        
        <!-- Modal footer -->
        <div class="modal-footer">
      <input type="button" name="btn_submit" id="btn_submit" class="btn btn-primary" onclick="updatremark()"  value="Submit"> 
         </form>
          <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        </div>
        
      </div>
    </div>
  </div>
  
</div>

<!-- Update Remark model End -->



<!-- Update status model Start -->
 <div class="modal" id="myModal">
    <div class="modal-dialog">
      <div class="modal-content">      
        <!-- Modal Header -->
         <div class="modal-header">
            <h4 class="modal-title">Update Status</h4>
              <button type="button" class="close" data-dismiss="modal">&times;</button>
         </div>        
        <!-- Modal body -->
             <div class="modal-body">
             <form id="statustype" name="statustype"  method="POST">
             <input type="hidden" name="hiddenid" id="hiddenid" >

              {{csrf_field()}}
                  <label>Select Status:</label>
                  <select class="form-control" required id="ddltype" name="ddltype" onchange="getdate();">
                   <option id="statusConverted" value="1">Lost</option>
                   <option  value="2">Converted</option>
                
                   </select><br>
                  <textarea name="statuscomment" id="statuscomment" rows="4" cols="50" placeholder="Write a Comment" required=""></textarea>

        </div>        
        <!-- Modal footer -->
        <div class="modal-footer">
        <input type="button" name="btn_submit" id="btn_submit" class="btn btn-primary" onclick="statussubmit()" value="Submit">
         
         </form>

          <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        </div>
        
      </div>
    </div>
  </div>
  
</div>

<!-- Update status model end -->

<!-- DOCUMENT VIEW MODEL SHOW -->

<div id="docviewModal" class="modal fade" role="dialog">
  <div class="modal-dialog modal-lg">

 <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">View Document</h4>
      </div>
      <div style="background: #fff;display: -webkit-box;" class="modal-body">
       <input type="hidden" name="viewdochidden" id="viewdochidden"> 
  
      <div id="divdocvieweroffline" name="divdocvieweroffline">

      <table>
      <tr>


<td><input id="docview1" class="btn btn-default flt-lft" style="margin:2px" type="button" onclick="docdisplay(this.id)"></td> <br>
<!--  <a href="/images/myw3schoolsimage.jpg" download>  
  <button>Download</button>
</a> -->

      
<td><input id="docview2" class="btn btn-default flt-lft" style="margin:2px" type="button" onclick="docdisplay(this.id)"></td>

<!-- <td><input id="docview3" class="btn btn-default flt-lft" style="margin:2px" type="button" onclick="docdisplay(this.id)"></td>

<td> <input id="docview4" class="btn btn-default flt-lft" style="margin:2px" type="button" onclick="docdisplay(this.id)"></td> -->

</tr>
</table>

      <div>
     <!--  <img id="imagefile"></img> -->
     
  <!--     <iframe id="imagefile" style="width: 1000px;max-height: 1200px"></iframe> -->


<div>
    <a  style="display: none;" id="downloaddoc" download>Download </a>
  <iframe id="imagefile" frameborder="0" allowfullscreen
    style="width: 870px;height:100%;float:left; margin-top: 15px"></iframe>


</div>


  </div>
     </div>
   
      </div>
     <!--  <div class="modal-footer"> -->

        <!-- <button type="button" class="btn btn-default" data-dismiss="modal">Close</button> -->

      <!-- </div> -->

    </div>

  </div>

</div>


<!-- DOCUMENT VIEW MODEL END -->

<!-- DOCUMENT VIEW MODEL Start -->
<div id="docviwer" class="modal fade" role="dialog"> 
  <div class="modal-dialog modal-lg">
   <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title" style="text-align:center;">Attachment</h4>
      </div><br>
       <div class="modal-body">

      <form  method="post" enctype="multipart/form-data" action="{{url('upload-doc')}}">
      {{ csrf_field() }}
      <input type="hidden" name="hidedenquote" id="hidedenquote">
  <table class="table table-striped ">
             <tr>
                <td style="text-align: right;line-height: 39px;">Quote1</td>
              <td><input type="file" class="btn btn-default" name="Quote1" id="Quote1" style="width:216px;margin-left: 2px" accept=".png, .jpg, .jpeg .pdf" ><a href='#'><span id="spandocview1"  onclick="viewdocone(this.getAttribute('data-val'))" style='color:;position: absolute;right: 75;margin-top: -31px;margin-left: 254px;'></span></a></td>
         </tr>  



        <tr>
            <td style="text-align: right;line-height: 39px;">Quote2</td>
              <td><input type="file" class="btn btn-default" name="Quote2" id="Quote2" style="width:216px;margin-left: 2px" accept=".png, .jpg, .jpeg .pdf" ><a href='#'><span id="spandocview2" onclick="viewdocone(this.getAttribute('data-val'))" style='color:;position: absolute;right: 75;margin-top: -31px;margin-left: 254px;'></span></a></td>
        </tr>

          <tr>
            <td style="text-align: right;line-height: 39px;">Quote3</td>
              <td><input type="file" class="btn btn-default" name="Quote3" id="Quote3" style="width:216px;margin-left: 2px" accept=".png, .jpg, .jpeg .pdf" ><a href='#'><span id="spandocview3" onclick="viewdocone(this.getAttribute('data-val'))" style='color:;position: absolute;right: 75;margin-top: -31px;margin-left: 254px;'></span></a>
              </td>
            </tr>          

               <tr>
                <td style="text-align: right;line-height: 39px;">Quote4</td>
                <td><input type="file" class="btn btn-default" name="Quote4" id="Quote4" style="width:216px;margin-left: 2px" accept=".png, .jpg, .jpeg .pdf" ><a href='#'><span id="spandocview4" onclick="viewdocone(this.getAttribute('data-val'))" style='color:;position: absolute;right: 75;margin-top: -31px;margin-left: 254px;'></span></a></td>
            </tr>

                </table>
      
        
     
      
      <input type="submit"  id="btn_submit_doc" class="btn btn-primary" value="submit"> 
      </form>
<!-- <img id="imagefileone"></img> -->
<!-- <iframe id="imagefileone" style="width: 550px;max-height: 500px"></iframe> -->

<div>
  <iframe id="imagefileone" frameborder="0" allowfullscreen
    style="width: 870px;height:100%;margin-top: 15px"></iframe>
</div>

     </div>
    </div>
  </div>
</div>
<!-- DOCUMENT MODEL END -->

      </div>
      </div>
      </div>
      </div>

<div id="divdate" class="modal fade" role="dialog">
  <div class="modal-dialog">
<div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Update Amount</h4>
      </div>
  <table>
 <tr>

 <form id="amtupdate" name="amtupdate" method="POST"  >
      <input type="hidden" name="hiddenidamt" id="hiddenidamt" >
        {{csrf_field()}}
      <div style="width: 80;height:20px;"  class="modal-body">


         <td><label>Date:</label></td>
        <td><input class="btn btn-default" type="date" name="convertdate" id="convertdate" required=""></td>

      <td><label>Amount:</label></td>
     <td><input class="form-control" type="text" name="Amount" id="Amount"  required=""></td>
  
      </div>
      </tr>
</table> <br>
      <div class="modal-footer">
       <input type="button" name="btn_submit_amt" id="btn_submit_amt" class="btn btn-primary" onclick="updateamt()" value="submit">
       </from> 

        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>

    </div>
  </div>
</div>
 



<div id="divloss" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">View Document</h4>
          </div>
        <div style="height: 100%;float: left"  class="modal-body">
        <p>Test doc</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>

    <script type="text/javascript">
    $(document).ready( function(){
    $('#offline_Quotes').DataTable({
     "ordering": false
     
    });    
});

  </script>


 <script type="text/javascript">
   var hiddenid='';

function offlinedocview(fbaid){
  //alert(fbaid);
  $("#hidedenquote").val(fbaid);

var id = $("#hidedenquote").val();
$.ajax({
   url: 'view-upload-doc-one/'+id,
 type: "GET",                  
  success:function(data){
var jsondata = JSON.parse(data);
//alert(jsondata);
$.each(jsondata, function( key, value ) {
// if (value.Type=='1') {
   //$("#docviewModal").modal('hide');

  if(value.Quote1 == "" || value.Quote1 == null){
    var p_Quote1 = 'Document Not Uploaded';
  }else{
    var p_Quote1 = value.Quote1;
  }

  if(value.Quote2 == "" || value.Quote2 == null){
    var p_Quote2 = 'Document Not Uploaded';
  }else{
    var p_Quote2 = value.Quote2;
  }

  if(value.Quote3 == "" || value.Quote3 == null){
    var p_Quote3 = 'Document Not Uploaded';
  }else{
    var p_Quote3 = value.Quote3;
  }

  if(value.Quote4 == "" || value.Quote4 == null){
    var p_Quote4 = 'Document Not Uploaded';
  }else{
    var p_Quote4 = value.Quote4;
  }


$("#spandocview1").text(p_Quote1);
$("#spandocview1").attr("data-val",p_Quote1);


$("#spandocview2").text(p_Quote2);
$("#spandocview2").attr("data-val",p_Quote2);


$("#spandocview3").text(p_Quote3);
$("#spandocview3").attr("data-val",p_Quote3);


$("#spandocview4").text(p_Quote4);
$("#spandocview4").attr("data-val",p_Quote4);



  // }else{

    
  // } 

  // document_path1                             
 }); 
  
   }

    });
}



 </script>

 <script>
function Gettype(fbaid){
  $("#statuscomment").val("");

    //alert(fbaid);
    hiddenid=fbaid;

    $('#myModal').modal('show');
   $('#hiddenid').val(fbaid);
  
 }
function getdate(){  
  //alert($('#hiddenid').val());

 $('#hiddenidamt').val($('#hiddenid').val());    

  if ($("#ddltype").val()==2){
     $("#statustype").trigger('reset');
       $("#divdate").modal('show');
       $("#myModal").modal('hide');
       $("#divloss").modal('hide');

    }else if($("#ddltype").val()==3){
       $("#divloss").modal('show');
       $("#divdate").modal('hide');
       $("#myModal").modal('hide');
    }else{
       $("#myModal").modal('show');
       $("#divloss").modal('hide');
       $("#divdate").modal('hide');
    }
}
</script>

<!-- ///////////////////////////////// -->


<script type="text/javascript">
 
function statussubmit(){
  alert(hiddenid);
   if(!$('#statustype').valid()){
    return false;
}else{
     //alert('Test');
     $.ajax({ 
   url: "{{URL::to('update-status')}}",
   method:"GET",
   data: $('#statustype').serialize(),
   success: function(msg){
    console.log(msg);
     alert("save successfully");
     $('#myModal').modal('hide');
location.reload();
  // window.location.reload(true);
     // alert('successfully...')

  
 }
  });
   }

};   

 
</script>

<script type="text/javascript">
 
function updateamt(){ 
if($('#convertdate').val() == "" || $('#Amount').val() == ""){
//hiddenidremark=id;
alert('Please Enter Date and Amount');
return false;
}else{
  //alert(hiddenid);
     $.ajax({ 
   url: "{{URL::to('update-amount-date')}}",
   method:"GET",
   data: $('#amtupdate').serialize(),
   success: function(msg){
      alert("data save successfully");
      $('#divdate').modal('hide');
      location.reload();
  
 }
  });
   }

};   
</script>
<script type="text/javascript">
function Getremarkhiddenid(id){
   $("#rmkupdte").val("");
    //alert(fbaid);
      hiddenidremark=id;
    $('#hiddenidremark').val(id);

    getremarkoffline(id);

  
 }
 </script>

<!-- Update Remark start -->
<script type="text/javascript">
 function updatremark(id){
  // alert('test');
   $('#hiddenidremark').val(hiddenidremark);
 if(!$('#remarkupdate').valid()){
//hiddenidremark=id;
return false;
}else{
   $.ajax({ 
   url: "{{URL::to('update-remark')}}",
   method:"GET",
   data: $('#remarkupdate').serialize(),
   success: function(msg){
  alert("data save successfully");
  $('#updateremark').modal('hide');
 }
  });
}
    
 };   
</script>
<!-- Update Remark End -->




<script type="text/javascript">
    function viewImage(id)
    {

$("#statusdetails").trigger('reset');
$("#statusdetails").attr('');
$("#statusdetails").attr('');
$("#statusdetails").attr('');
$("#statusdetails").attr('');
//alert(id);
  $.ajax({
 url: 'view-upload-doc/'+id,
  type: "GET",                  
  success:function(data){
var jsondata = JSON.parse(data);
console.log(jsondata);

$.each(jsondata, function( key, value ) {
//if (value.Type=='2') {
  $("#docviewModal").modal('show');

  if(value.Quote1 == "" || value.Quote1 == null){
    var p_Quote1 = 'Not Uploaded';
  }else{
    var p_Quote1 = value.Quote1;
  }

  if(value.Quote2 == "" || value.Quote2 == null){
    var p_Quote2 = 'Not Uploaded';
  }else{
    var p_Quote2 = value.Quote2;
  }

  if(value.Quote3 == "" || value.Quote3 == null){
    var p_Quote3 = 'Not Uploaded';
  }else{
    var p_Quote3 = value.Quote3;
  }

  if(value.Quote4 == "" || value.Quote4 == null){
    var p_Quote4 = 'Not Uploaded';
  }else{
    var p_Quote4 = value.Quote4;
  }

$("#docview1").attr('data-val','{{url('/upload/offlinedocs')}}/'+p_Quote1);
$("#docview2").attr('data-val','{{url('/upload/offlinedocs')}}/'+p_Quote2);
$("#docview3").attr('data-val','{{url('/upload/offlinedocs')}}/'+p_Quote3);
$("#docview4").attr('data-val','{{url('/upload/offlinedocs')}}/'+p_Quote4);


$("#docview1").val(p_Quote1);
$("#docview2").val(p_Quote2);
$("#docview3").val(p_Quote3);
$("#docview4").val(p_Quote4);






  //}else{

  // $("#hidetype1").display:none;

    // alert('Document Not Uploded');
     //$("#docviewModal").modal('hide');
    
  //}                              
 }); 
  
   }

    });

}

function docdisplay(this_id){
 // alert(this_id); exit();
var path = $("#"+this_id).attr("data-val");
//alert(path); exit();
// var altdata = $("#imagefile").attr('src',path);
$("#imagefile").attr('src',path);
//$("#downloaddoc").attr('href',path);
$("#downloaddoc").attr('href','#');
$("#downloaddoc").attr('onclick',"forceDownload('"+path+"','Download')");
$("#downloaddoc").show();
}

// var path = $("#" + this_id).attr("data-val");   
// $("#imagefile").attr('src',path);
// $("#downloaddoc").attr('href',path);
// $("#downloaddoc").show();


</script>

 
<script type="text/javascript">
function statusviewoffline(id){
//alert("Test");
        $.ajax({ 
         url: 'quotestatus/'+id,
        method:"get",
        data: $('#statusfrom').serialize(), 
        success: function(msg){             

        var data = JSON.parse(msg);
        if (data[0].Status==1) {
            var str = "<table class='table' id='example'><tr style='height:30px;margin:5px;'><th>Status</th><th>Comment</th></tr>";
            for (var i = 0; i < data.length; i++){ 
     str = str + "<tr style='height:60px;margin:5px;'><td>Lost</td><td>"+data[i].Comment+"</td></tr>";
       }
         str = str + "</table>";
        }else{
          var str = "<table class='table' id='example'><tr style='height:30px;margin:5px;'><th>Status</th><th>Amount</th><th>Converted Date</th></tr>";
            for (var i = 0; i < data.length; i++){ 
            

if (data[0].Status==2) {
     str = str + "<tr style='height:60px;margin:5px;'><td>Converted</td><td>"+data[i].Amount+"</td><td>"+data[i].Converted_date+"</td></tr>";
   }
   else
   {
    str = str + "<tr style='height:60px;margin:5px;'><td>"+data[i].Status+"</td><td>"+data[i].Amount+"</td><td>"+data[i].Converted_date+"</td></tr>";
   }
       }
         str = str + "</table>";
        }
       
           $('#divstatus').html(str);  

       } 

      
 });
};
    

</script>

<script type="text/javascript">
function viewdocone(this_data_val){
    
$("#imagefileone").attr('src','{{url('/upload/offlinedocs')}}/' + this_data_val);
}

</script>

<script type="text/javascript">
 
function viewdiscription(id){ 
  //alert(id);
  //alert(hiddenid);
 //alert('test2');

     $.ajax({ 
        url: 'getquotediscription/'+id,
        method:"GET",   
         success: function(msg){
        $("#txtdiscription").val('');
   
   var data= JSON.parse(msg);

    //alert(data[0].Quote_description);
    //alert(data.length);
    if (data.length>=0) {
      $("#txtdiscription").val(data[0].Quote_description);
     }else{

      $("#txtdiscription").val('No Data Found');
    }

  
 }
  });

};   
</script>



<script type="text/javascript">
  
function getremarkoffline(quote_request_id){ 
  //alert(quote_request_id);

$.ajax({  
         type: "GET",  
         url:'get-remark/'+quote_request_id,//"{{URL::to('Fsm-Details')}}",
         success: function(mmsg){
   //console.log(data);
        var data = JSON.parse(mmsg);

        var str = "<table class='table'><tr style='height:30px;margin:5px;'><td>Quote ID</td><td>Remarks</td><td>Created date</td><td>Created by</td></tr>";
       for (var i = 0; i < data.length; i++) {
    str = str + "<tr style='height:30px;margin:5px;'><td>"+data[i].quote_request_id+"</td><td><textarea readonly style='height: 65px; !important' class='textarea'>"+data[i].remark+"</textarea></td><td>"+data[i].Created_date+"</td><td>"+data[i].Created_by+"</td></tr>";
          }
              // console.log(msg[0].Result);
            str = str + "</table>";
           $('#loadremark').html(str);   
        }  
      });
}

</script>


 @endsection

