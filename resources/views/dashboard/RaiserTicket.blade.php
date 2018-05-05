@extends('include.master')
@section('content')
@if(Session::has('message'))
<div class="alert alert-success alert-dismissible">
<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
<p class="alert alert-success">{{ Session::get('message') }}</p>
</div>
@endif
<div class="container-fluid white-bg">
<div class="col-md-12"><h3 class="mrg-btm">Raise a Ticket</h3></div>
<div class="col-md-6">
	<form method="post" id="fromraiserticket" enctype="multipart/form-data" >
		 {{ csrf_field() }}
 <div class="form-group">
           <label class="control-label" for="message-text">FBA ID: </label>
           <input type="text" class="form-control" id="txtfbaid" name="txtfbaid">
</div>		
 <div class="form-group">
           	<label class="control-label" for="message-text">Category:</label>
           	<select class="form-control" name="ddlCategory" id="ddlCategory" required>
           	 <option value="">--Select Category--</option>
           	 @foreach($cat as $val)
             <option value="{{$val->CateCode}}">{{$val->CateName}}</option>
             @endforeach
            </select>
</div>
<div class="form-group">
           	<label class="control-label" for="message-text">Sub Category:</label>
           	<select class="form-control" name="ddlsubcat" id="ddlsubcat" required>
           	 
            </select>
</div>
<div class="form-group">
           	<label class="control-label" for="message-text">Classification:</label>
           	<select class="form-control" name="ddlClassification" id="ddlClassification">
            </select>
</div>
<div class="form-group">
	    @if ($errors->has('txtraisermessage'))<label class="control-label" for="inputError"> {{ $errors->first('txtraisermessage') }}</label>  @endif
           <label class="control-label" for="message-text">Message: </label>
           <textarea class="form-control" required id="txtraisermessage" name="txtraisermessage"></textarea>
</div>
<div class="form-group">
           <label class="control-label" for="message-text">Image: </label>
           <input type="file" class="form-control" id="pathimgraiser" name="pathimgraiser">
</div>
<!-- <div class="form-group">
           <label class="control-label" for="message-text">To Email ID: </label>
           <input type="Email" class="form-control" id="txttoemailid" name="txttoemailid" required readonly>
</div>
<div class="form-group">
           <label class="control-label" for="message-text">CC Email ID: </label>
           <input type="Email"  class="form-control" id="txtccemailid" name="txtccemailid">
</div> -->
<div class="form-group">
<input id="btn_saveticket" type="submit" name="btn_saveticket" class="btn btn-primary">
<button id="btn_resetticket" class="btn btn-primary" type="button">Reset</button>     
</div>
</form>
</div>

<script type="text/javascript">
      $(document).ready(function () {
  //called when key is pressed in textbox
  $("#txtfbaid").keypress(function (e) {
    if(this.value.length>7){
      return false;
    }
     //if the letter is not digit then display error and don't type anything
     if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) {
        //display error message
       // $("#errmsg").html("Digits Only").show().fadeOut("slow");
               return false;
    }
   });
});


// $(document).ready(function() {
//     $("#txtfbaid").keydown(function (e) {
//         // Allow: backspace, delete, tab, escape, enter and .
//         if ($.inArray(e.keyCode, [46, 8, 9, 27, 13, 110, 190]) !== -1 ||
//              // Allow: Ctrl+A, Command+A
//             (e.keyCode === 65 && (e.ctrlKey === true || e.metaKey === true)) || 
//              // Allow: home, end, left, right, down, up
//             (e.keyCode >= 35 && e.keyCode <= 40)) {
//                  // let it happen, don't do anything
//                  return;
//         }
//         // Ensure that it is a number and stop the keypress
//         if ((e.shiftKey || (e.keyCode < 48 || e.keyCode > 57)) && (e.keyCode < 96 || e.keyCode > 105)) {
//             e.preventDefault();
//         }
//     });
// });

   $('#ddlsubcat').on('change', function() {
      gettoccmail();
        var QuerID = $(this).val();
         
            if(QuerID) {
                $.ajax({
                    url: 'RaiseaTicketgetcal/'+QuerID,
                    type: "GET",
                    dataType: "json",
                    success:function(data) {
                        $('#ddlClassification').empty();
                        $('#ddlClassification').append('<option value="0">--Select Classification--</option>');
                        
                        $.each(data, function(key,value) {
                      
                            $('#ddlClassification').append('<option value="'+ value.ID +'">'+ value.Description +'</option>');
                        });
                     }
                });
            }else{
                $('select[name="ddlClassification"]').empty();
            }
        });

   $('#ddlCategory').on('change', function() {
            var CateCode = $(this).val();
            if(CateCode) {
                $.ajax({
                    url: 'RaiseaTicket/'+CateCode,
                    type: "GET",
                    dataType: "json",
                    success:function(data) {
                        $('#ddlsubcat').empty();
                        $('#ddlsubcat').append('<option value="0">-- Select Sub Category--</option>');
                        $.each(data, function(key, value) {

                       
                         $('#ddlsubcat').append('<option value="'+ value.QuerID +'">'+ value.QuerType +'</option>');
                        });
                     }
                });
            }else{
                $('select[name="ddlsubcat"]').empty();
            }
        });

$('#btn_saveticket').click(function() {
    if( $('#fromraiserticket').valid())
    {
 
    data1=new FormData($("#pathimgraiser"));
    
  console.log($('#fromraiserticket').serialize());
   $.ajax({ 
   url: "{{URL::to('RaiseaTicket')}}",
   method:"POST",
   data: $('#fromraiserticket').serialize(),
   dataType:'json',
   async:false,
   type:'POST',
   processData: false,
   contentType: false,
  success: function(msg)  
   {
    console.log(msg);
    alert("Record has been saved successfully");
    $("#fromraiserticket").trigger('reset');
   
   }
});
}
});
$('#btn_resetticket').click(function() {
   $("#fromraiserticket").trigger('reset');
});

function gettoccmail(){

  var Querid = $('#ddlsubcat').val();

  if(Querid) {
  $.ajax({
                    url: 'RaiseaTicketgettoccmail/'+Querid,
                    type: "GET",
                    dataType: "json",
                    success:function(data) {
                      
                        $('#txttoemailid').val('');
                         $('#txtccemailid').val('');
                     
                        $.each(data, function(key, value) {
                          console.log(value);
                          $('#txttoemailid').val(value.toemailid);
                          $('#txtccemailid').val(value.ccemailid);
                      
                        });
                     }
                });
   }else{
      $('#txttoemailid').val('');
       $('#txtccemailid').val('');
   }
}


</script>
@endsection