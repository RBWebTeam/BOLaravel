@extends('include.master')
@section('content')
@if(Session::has('message'))
<div class="alert alert-success alert-dismissible">
<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
<p class="alert alert-success">{{ Session::get('message') }}</p>
</div>
@endif

<style type="text/css">

h3.mrg-btm {
  font-style: italic;
}

</style>

<div class="container-fluid white-bg">
 <div class="col-md-12"><h3 class="mrg-btm">NCD Campaign</h3></div>
 <div class="col-md-12">
   <div class="overflow-scroll">
     <div class="table-responsive" >
      <table id="ncdcampaign-tbl" class="table table-bordered table-striped tbl" >
       <thead>
        <tr>
         <th>ID</th>
         <th>Customer Name</th>
         <th>Campaign Name</th>
         <th>Reference Number</th>
         <th>Staus</th>
         <th>Doc Link</th>
         <th>Created Date</th>
       </tr>
     </thead>
     <tbody>
       @foreach($campign as $val)
       <td><?php echo $val->id; ?></td> 
       <td><?php echo $val->customer_name; ?></td>
       <td><?php echo $val->camapignname; ?></td>
       <td><?php echo $val->reference_number; ?></td>
       <td>
        @if($val->status=='1') 
        <a data-toggle="modal" data-target="#ncdcurrstatus" onclick="viewcurrentstatus('{{$val->id}}')">Cancelled</a>
        @elseif ($val->status=='2')
        <a data-toggle="modal" data-target="#ncdcurrstatus" onclick="viewcurrentstatus('{{$val->id}}')">Alloted</a>
        @else         
        <a data-toggle="modal" data-target="#ncdstatusupdate" onclick="Gettype('{{$val->id}}')">Update Status</a>
        @endif
      </td>
      <td><a data-toggle="modal" data-target="#ncddocviwe" onclick="ncadocview('{{$val->id}}','{{$val->ncdfbacustomerdetailsid}}','{{$val->guid}}',)">Doc.Links</a></td>
      <td><?php echo $val->createddate; ?></td>
    </tr>
    @endforeach
  </tbody>
</table>
</div>
</div>
</div>
</div>
<!-- Update status model Start -->
<div class="modal" id="ncdstatusupdate">
  <div class="modal-dialog">
    <div class="modal-content">      
      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Update Status</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>        
      <!-- Modal body -->
      <div class="modal-body">
       <form id="updatestatus" name="updatestatus"  method="POST">
         <input type="hidden" name="hiddenid" id="hiddenid" > 

         {{csrf_field()}}
         <label>Select Status:</label>
         <select class="form-control" required id="ddltype" name="ddltype">
           <option id="statusConverted" value="1">Cancelled</option>
           <option  value="2">Alloted</option>

         </select><br>
         <textarea name="statuscomment" id="statuscomment" rows="4" cols="50" placeholder="Write a Comment" required=""></textarea>

       </div>        
       <!-- Modal footer -->
       <div class="modal-footer">
        <input type="button" name="btn_submit" id="btn_submit" class="btn btn-primary" onclick="statusupdate()" value="Submit">      </form>

      <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
    </div>

  </div>
</div>
</div>

</div>

<!-- Update status model end -->

<!-- Current status model start -->


<div class="modal" id="ncdcurrstatus">
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
          <div id="divncdstatus"> </div>
        </div>   
      </div>      
      <!-- Modal footer -->
      <div class="modal-footer">
        <!-- <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button> -->
      </div>
    </div>
  </div>
</div>
<!-- Current status model end -->
<div id="ncddocviwe" class="modal fade" role="dialog"> 
  <div class="modal-dialog modal-lg">
   <!-- Modal content-->
   <div class="modal-content">
    <div class="modal-header">
      <button type="button" class="close" data-dismiss="modal">&times;</button>
      <h4 class="modal-title" style="text-align:center;">Attachment</h4>
    </div><br>
    <div class="modal-body">

      <form  method="post" enctype="multipart/form-data" action="{{url('upload-nca-doc')}}">
        {{ csrf_field() }}

        <input type="hidden" name="fbaviewhiddenid" id="fbaviewhiddenid">

        <input type="hidden" name="fbacustomerhiddenid" id="fbacustomerhiddenid">
        <input type="hidden" name="hiddenguid" id="hiddenguid">
        <!-- <input type="text" name="mainhiddenid" id="mainhiddenid"> -->
        <table class="table table-striped ">
          <tr>
            <td style="text-align: right;line-height: 39px;">Quote1</td>
            <td><input type="file" class="btn btn-default" name="Doc1" id="Doc1" style="width:216px;margin-left: 2px" accept=".png, .jpg, .jpeg .pdf" ><a href='#'><span id="spandocview1"  onclick="viewdocument(this.getAttribute('data-val'),this.getAttribute('data-idval'),this.getAttribute('data-guidval'))" style='color:;position: absolute;right: 75;margin-top: -31px;margin-left: 254px;'></span></a></td>
          </tr>  



          <tr>
            <td style="text-align: right;line-height: 39px;">Quote2</td>
            <td><input type="file" class="btn btn-default" name="Doc2" id="Doc2" style="width:216px;margin-left: 2px" accept=".png, .jpg, .jpeg .pdf" ><a href='#'><span id="spandocview2" onclick="viewdocument(this.getAttribute('data-val'),this.getAttribute('data-idval'),this.getAttribute('data-guidval'))" style='color:;position: absolute;right: 75;margin-top: -31px;margin-left: 254px;'></span></a></td>
          </tr>

          <tr>
            <td style="text-align: right;line-height: 39px;">Quote3</td>
            <td><input type="file" class="btn btn-default" name="Doc3" id="Doc3" style="width:216px;margin-left: 2px" accept=".png, .jpg, .jpeg .pdf" ><a href='#'><span id="spandocview3" onclick="viewdocument(this.getAttribute('data-val'),this.getAttribute('data-idval'),this.getAttribute('data-guidval'))" style='color:;position: absolute;right: 75;margin-top: -31px;margin-left: 254px;'></span></a>
            </td>
          </tr>          

          <tr>
            <td style="text-align: right;line-height: 39px;">Quote4</td>
            <td><input type="file" class="btn btn-default" name="Doc4" id="Doc4" style="width:216px;margin-left: 2px" accept=".png, .jpg, .jpeg .pdf" ><a href='#'><span id="spandocview4" onclick="viewdocument(this.getAttribute('data-val'),this.getAttribute('data-idval'),this.getAttribute('data-guidval'))" style='color:;position: absolute;right: 75;margin-top: -31px;margin-left: 254px;'></span></a></td>
          </tr>

        </table>

        <input type="submit"  id="btn_submit_doc" class="btn btn-primary" value="submit"> 
      </form>

      <div>
        <iframe id="ncaimagefile" frameborder="0" allowfullscreen
        style="width: 870px;height:550px;margin-top: 15px"></iframe>
      </div>

    </div>
  </div>
</div>
</div>


<script type="text/javascript">
 var hiddenid='';
 function ncadocview(id,ncdfbacustomerdetailsid,guid){
   $('#ncaimagefile').val("");
  $("#ncddocviwe").val(""); 
 $("#fbaviewhiddenid").val(id);
 var id = $("#fbaviewhiddenid").val();

 $("#fbacustomerhiddenid").val(id);
 var ncdfbacustomerdetailsid = $("#fbacustomerhiddenid").val();

 $("#hiddenguid").val(guid);
 var var_guid = $("#hiddenguid").val();



 $("#fbacustomerhiddenid").val(id);
 //alert(id);
 $.ajax({
   url: 'view-nca-doc/'+id,
   type: "GET",                  
   success:function(data){
    var jsondata = JSON.parse(data);
    console.log(jsondata);
    var i=0;
    $("#spandocview1").text("Document Not Uploaded");
    $("#spandocview2").text("Document Not Uploaded");
    $("#spandocview3").text("Document Not Uploaded");
    $("#spandocview4").text("Document Not Uploaded");
    $.each(jsondata, function( key, value ) {
      i++;
      if(i==1){
        if(value.Doc1 == "" || value.Doc1 == null){
          var p_Doc1 = 'Document Not Uploaded';
        }else{
          var p_Doc1 = value.Doc1;
        }
        $("#spandocview1").text(p_Doc1);
        $("#spandocview1").attr("data-val",p_Doc1);
        $("#spandocview1").attr("data-idval",id);
        $("#spandocview1").attr("data-guidval",var_guid);
      }
      else if(i==2)
      {
        if(value.Doc2 == "" || value.Doc2 == null){
          var p_Doc2 = '';
        }else{
          var p_Doc2 = value.Doc2;
        }
        $("#spandocview2").text(p_Doc2);
        $("#spandocview2").attr("data-val",p_Doc2);
        $("#spandocview2").attr("data-idval",id);
        $("#spandocview2").attr("data-guidval",var_guid);
      }
      else if(i==3){
        if(value.Doc3 == "" || value.Doc3 == null){
          var p_Doc3 = 'Document Not Uploaded';
        }else{
          var p_Doc3 = value.Doc3;
        }
        $("#spandocview3").text(p_Doc3);
        $("#spandocview3").attr("data-val",p_Doc3);
        $("#spandocview3").attr("data-idval",id);
        $("#spandocview3").attr("data-guidval",var_guid);
      }
      else if(i==4){
        if(value.Doc4 == "" || value.Doc4 == null){
          var p_Doc4 = 'Document Not Uploaded';
        }else{
          var p_Doc4 = value.Doc4;
        }
        $("#spandocview4").text(p_Doc4);
        $("#spandocview4").attr("data-val",p_Doc4);
        $("#spandocview4").attr("data-idval",id);
        $("#spandocview4").attr("data-guidval",var_guid);
      }                       
    }); 

  }

});
}
</script>

<script type="text/javascript">
  function viewdocument(this_data_val,this_data_idval,this_data_guidval){
    $("#ncaimagefile").attr('src','{{url('/upload/NCD_Doc')}}/' +this_data_guidval+ '/' + this_data_val);
  }

</script>
<script type="text/javascript">

  function statusupdate(){
    //alert(hiddenid);
    if(!$('#updatestatus').valid()){
      return false;
    }else{
     //alert('Test');
     $.ajax({ 
       url: "{{URL::to('ncd-update-status')}}",
       method:"GET",
       data: $('#updatestatus').serialize(),
       success: function(msg){
        console.log(msg);
        alert("Save Successfully");
        $('#ncdstatusupdate').modal('hide');
        location.reload();
      }
    });
   }

 };   

 
</script>

<script type="text/javascript">
  function stausupdate(id){
 //alert(id);
 $("#hiddenid").val(id);
 var id = $("#hiddenid").val()
};
</script>

<script type="text/javascript">
  function viewcurrentstatus(id){
    $("#hiddenid").val(id);
    $.ajax({ 
     url: 'ncdstatuscurrent/'+id,
     method:"get",
     data: $('#statusfrom').serialize(), 
     success: function(msg){             

      var data = JSON.parse(msg);
      if (data[0].status==1) {
        var str = "<table class='table' id='example'><tr style='height:30px;margin:5px;'><th>Status</th><th>Remark</th></tr>";
        for (var i = 0; i < data.length; i++){ 
         str = str + "<tr style='height:60px;margin:5px;'><td>Cancelled</td><td>"+data[i].remarks+"</td></tr>";
       }
       str = str + "</table>";
     }else{
      var str = "<table class='table' id='example'><tr style='height:30px;margin:5px;'><th>Status</th><th>Remark</th></tr>";
      for (var i = 0; i < data.length; i++){ 


        if (data[0].status==2) {
         str = str + "<tr style='height:60px;margin:5px;'><td>Alloted</td><td>"+data[i].remarks+"</td></tr>";
       }
       else
       {
        str = str + "<tr style='height:60px;margin:5px;'><td>"+data[i].status+"</td><td>"+data[i].remarks+"</td></tr>";
      }
    }
    str = str + "</table>";
  }

  $('#divncdstatus').html(str);  

} 


});
  };


</script>

<script type="text/javascript">

  function Gettype(id){
    hiddenid=id;  
    $('#hiddenid').val(id);  
  }
</script>
@endsection