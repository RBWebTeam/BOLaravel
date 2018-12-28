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
                   <th>Request Id</th>
                   <th>FBA Name</th>
<th>FBA Phone No</th>
                   <th>Product Name</th>
                   <th>Quote Description</th>
                   <th>Status</th>
                   <th>Current Status</th>
                   <th>Upload Quote</th>
                    <th>User Doc</th>
              
                  
                 </tr>
                </thead>
                <tbody>

              

                  @foreach($Quotes as $val) 
     <tr>
    <td><?php echo $val->quotes_request_id; ?></td> 
    <td><?php echo $val->FullName; ?></td>
<td><?php echo $val->MobiNumb1; ?></td>
    <td><?php echo $val->product_name; ?></td>
    <td><textarea readonly><?php echo $val->Quote_description ; ?></textarea></td>
    <td><a href="" style="" data-toggle="modal"   onclick="Gettype('{{$val->id}}')">Update Status</a></td>
    <td><a href="" style="" data-toggle="modal" data-target="#statusdetails" onclick="statusviewoffline('{{$val->id}}')">View Status</a></td>
  <!-- <td><a href="" style="" data-toggle="modal"  data-target="#docviwer" onclick="offlinedocview('{{$val->id}}')">Upload Doc</a><span style="font-size:15; margin-left: 10px">{{$val->totaldocs}}</span></td> -->
  <td><a href="" style="" data-toggle="modal"  data-target="#docviwer" onclick="offlinedocview('{{$val->id}}')">Upload Doc</a>


@if($val->Type==1)
  <span style="font-size:15; margin-left: 10px">({{$val->totaldocs}}) </span>
   @else
    <span class="glyphicon glyphicon-blank"></span> 
    
  @endif
 </td>



    <td><a type="button" id="hidetype1" onclick="viewImage('{{$val->id}}')">View Doc</a>
  <span style="font-size:15; margin-left: 10px">({{$val->userupload}}) </span>
    </td>
  </tr>
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
             <form id="statustype" name="statustype" enctype="multipart/form-data" method="post">
             <input type="hidden" name="hiddenid" id="hiddenid" >

              {{csrf_field()}}
                  <label>Select Status:</label>
                  <select class="form-control" required id="ddltype" name="ddltype" onchange="getdate();">
                   <option id="statusConverted" value="1">Lost</option>
                   <option  value="2">Converted</option>
                
                   </select><br>
                  <textarea name="statuscomment" id="statuscomment" rows="4" cols="50" placeholder="Write a Comment"></textarea>

        </div>        
        <!-- Modal footer -->
        <div class="modal-footer">
        <input type="button" name="btn_submit" id="btn_submit" class="btn btn-primary" onclick="statussubmit()" data-dismiss="modal" value="Submit"> 
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
  <div class="modal-dialog">

 <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">View Document</h4>
      </div>
      <div style="width: 10 " class="modal-body">
       <input type="hidden" name="viewdochidden" id="viewdochidden"> 
  
      <div id="divdocvieweroffline" name="divdocvieweroffline">

      <table>
      <tr>




<td> <input id="docview1" class="btn btn-default flt-lft" style="margin:2px" type="button" onclick="docdisplay(this.id)"></td> 

<td><input id="docview2" class="btn btn-default flt-lft" style="margin:2px" type="button" onclick="docdisplay(this.id)"></td>

<td><input type="hidden" id="docview3" class="btn btn-default flt-lft" style="margin:2px" type="button" onclick="docdisplay(this.id)"></td>

<td> <input type="hidden"  id="docview4" class="btn btn-default flt-lft" style="margin:2px" type="button" onclick="docdisplay(this.id)"></td>
</tr>
</table>

      <div>
      
<!-- <iframe id="imagefile"></iframe> -->
<iframe id="imagefile" style="width: 550px;max-height: 500px"></iframe>

      </div>
     </div>
   
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>

<!-- DOCUMENT VIEW MODEL END -->

<!-- DOCUMENT VIEW MODEL Start -->
<div id="docviwer" class="modal fade" role="dialog"> 
  <div class="modal-dialog">
   <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title" style="text-align:center;">Attachment</h4>
      </div><br>
      <form  method="post" enctype="multipart/form-data" action="{{url('upload-doc')}}">
      {{ csrf_field() }}
      <input type="hidden" name="hidedenquote" id="hidedenquote">
  <table class="table table-striped ">
        <tr>
          <td style="text-align: right;line-height: 39px;">Quote1</td>
            <td><input type="file" class="btn btn-default" name="Quote1" id="Quote1" style="width:216px;margin-left: 2px" accept=".png, .jpg, .jpeg .pdf" ><a href='#'><span id="spandocview1" onclick="viewdocone(this)" style='color:;position: absolute;right: 75;margin-top: -31px;'></span></a></td>
         </tr>  

        <tr>
          <td style="text-align: right;line-height: 39px;">Quote2</td>
            <td><input type="file" class="btn btn-default" name="Quote2" id="Quote2" style="width:216px;margin-left: 2px" accept=".png, .jpg, .jpeg .pdf" ><a href='#'><span id="spandocview2" onclick="viewdocone(this)" style='color:;position: absolute;right: 75;margin-top: -31px;'></span></a></td>
         </tr>


        <tr>
          <td style="text-align: right;line-height: 39px;">Quote3</td>
            <td><input type="file" class="btn btn-default" name="Quote3" id="Quote3" style="width:216px;margin-left: 2px" accept=".png, .jpg, .jpeg .pdf" ><a href='#'><span id="spandocview3" onclick="viewdocone(this)" style='color:;position: absolute;right: 75;margin-top: -31px;'></span></a></td>
            </tr>

            <tr>
                <td style="text-align: right;line-height: 39px;">Quote4</td>
                <td><input type="file" class="btn btn-default" name="Quote4" id="Quote4" style="width:216px;margin-left: 2px" accept=".png, .jpg, .jpeg .pdf" ><a href='#'><span id="spandocview4" onclick="viewdocone(this)" style='color:;position: absolute;right: 75;margin-top: -31px;'></span></a></td>
            </tr>

                </table>
      <div class="modal-body">
      
      <input type="submit"  id="btn_submit_doc" class="btn btn-primary" value="submit"> 
      </form>
<!-- <iframe id="imagefileone"></iframe> -->
<iframe id="imagefileone" style="width: 550px;max-height: 500px"></iframe>

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
 <form id="amtupdate" name="amtupdate"  >
      <input type="hidden" name="hiddenidamt" id="hiddenidamt" >
        {{csrf_field()}}
      <div style="width: 80;height:20px;"  class="modal-body">


         <td><label>Date:</label></td>
        <td><input class="btn btn-default" type="date" name="convertdate" id="convertdate"></td>

      <td><label>Amount:</label></td>
     <td><input class="btn btn-default" type="text" name="Amount" id="Amount"></td>
  
      </div>
      </tr>
</table> <br>
      <div class="modal-footer">
       <input type="button" name="btn_submit_amt" id="btn_submit_amt" class="btn btn-primary" onclick="updateamt()" data-dismiss="modal" value="submit"> 
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
        <div style="width: 10 "  class="modal-body">
        <p>Test doc</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>



 @endsection

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
//if (value.Type=='1') {

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
$("#spandocview2").text(p_Quote2);
$("#spandocview3").text(p_Quote3);
$("#spandocview4").text(p_Quote4);




  //}else{

    
  //}                              
 }); 
  
   }

    });
}



 </script>

 <script>
function Gettype(fbaid){
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
     //alert('Test');
     $.ajax({ 
   url: "{{URL::to('update-status')}}",
   method:"GET",
   data: $('#statustype').serialize(),
   success: function(msg){
  // window.location.reload(true);
     // alert('successfully...')

  
 }
  });

};   

 
</script>

<script type="text/javascript">
 
function updateamt(){ 
  //alert(hiddenid);
 //alert('test2');
     $.ajax({ 
   url: "{{URL::to('update-amount-date')}}",
   method:"GET",
   data: $('#amtupdate').serialize(),
   success: function(msg){
  
 }
  });

};   
</script>

<script type="text/javascript">
    function viewImage(id)
    {
 //alert(id);
  $.ajax({
 url: 'view-upload-doc/'+id,
  type: "GET",                  
  success:function(data){
    console.log(data);
var jsondata = JSON.parse(data);
var i=0;
var quotename1 ="";
var quotename2 ="";
var quotepath1 ="";
var quotepath2 ="";
$.each(jsondata, function( key, value ) {
  i++;
if (value.Type=='2') {
  if(i==1){
    if(value.document_path == "" || value.document_path == null){
      quotename1 = '';
      quotepath1 = '';
  }
  else{     
    quotename1 = value.Document_name;
      quotepath1 = value.document_path;
  }
}
else{
   if(value.document_path == "" || value.document_path == null){
      quotename2 = '';
      quotepath2 = '';
  }
  else{     
    quotename2 = value.Document_name;
      quotepath2 = value.document_path;
  }

}





  // if(value.Quote1 == "" || value.Quote1 == null){
  //   var p_Quote1 = 'Not Uploaded';
  // }else{
  //   var p_Quote1 = value.Document_name;
  // }

  // if(value.Quote2 == "" || value.Quote2 == null){
  //   var p_Quote2 = 'Not Uploaded';
  // }else{
  //   var p_Quote2 = value.Quote2;
  // }

  // if(value.Quote3 == "" || value.Quote3 == null){
  //   var p_Quote3 = 'Not Uploaded';
  // }else{
  //   var p_Quote3 = value.Quote3;
  // }

  // if(value.Quote4 == "" || value.Quote4 == null){
  //   var p_Quote4 = 'Not Uploaded';
  // }else{
  //   var p_Quote4 = value.Quote4;
  // }



// $("#docview1").attr('data-val','{{url('/upload/offlinedocs')}}/'+p_Quote1);
// $("#docview2").attr('data-val','{{url('/upload/offlinedocs')}}/'+p_Quote2);
// $("#docview3").attr('data-val','{{url('/upload/offlinedocs')}}/'+p_Quote3);
// $("#docview4").attr('data-val','{{url('/upload/offlinedocs')}}/'+p_Quote4);


// $("#docview1").val(p_Quote1);
// $("#docview2").val(p_Quote2);
// $("#docview3").val(p_Quote3);
// $("#docview4").val(p_Quote4);






  }else{

  // $("#hidetype1").display:none;

    // alert('Document Not Uploded');
      $("#docviewModal").modal('hide');
    
   }                              
 }); 


if(quotename1!=''){
$("#docviewModal").modal('show');
$("#docview1").attr('data-val',quotepath1);  
$("#docview1").val(quotename1);
  if(quotename2!=''){
  $("#docview2").attr('data-val',quotepath2);   
  $("#docview2").val(quotename2);
  }
}

  
   }

    });

}

function docdisplay(this_id){
var path = $("http://api.magicfinmart.com/" + this_id).attr("data-val");
//alert(path);
// var altdata = $("#imagefile").attr('src',path);
$("#imagefile").attr('src',path);




}

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
     str = str + "<tr style='height:60px;margin:5px;'><td>Loss</td><td>"+data[i].Comment+"</td></tr>";
       }
         str = str + "</table>";
        }else{
          var str = "<table class='table' id='example'><tr style='height:30px;margin:5px;'><th>Status</th><th>Amount</th><th>Converted Date</th></tr>";
            for (var i = 0; i < data.length; i++){ 
     str = str + "<tr style='height:60px;margin:5px;'><td>converted</td><td>"+data[i].Amount+"</td><td>"+data[i].Converted_date+"</td></tr>";
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
    
$("#imagefileone").attr('src','{{url('/upload/offlinedocs')}}/' + this_data_val.innerText);
}

</script>

