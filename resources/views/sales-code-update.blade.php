@extends('include.master')
@section('content') 

<div class="container-fluid white-bg">
<div class="col-md-12"><h3 class="mrg-btm">sales code update</h3></div>
   <div class="col-md-12">
      <div class="overflow-scroll">

<form name="salesform" id="salesform" method="POST">
  {{ csrf_field() }}
  <div class="form-group col-md-6">
  <div class="col-md-3">
  <label>Sales Code:</label>
  </div>
  <div class="col-md-4">
  <input type="text" class="text-primary form-control" name="Scode" id="Scode" onkeyup="getfbaid()" required>
  </div>
  <label><span id="fbaid"></span></label>
  </div>

  <div class="form-group col-md-6">
  <div class="col-md-3">
  <label>Fba id:</label>
  </div>
  <div class="col-md-6">
  <input type="text" class="text-primary form-control" name="sfbaid" id="sfbaid" required>
  </div>
  </div> 
  <input type="hidden" name="txtfbaid" id="txtfbaid">
  <div class="col-md-4">
       <a name="btnsave" id="btnsave"  class="mrg-top common-btn pull-left"> Save</a>      
  </div>
</form>
</div> 
</div>
</div>
<script type="text/javascript">
  function getfbaid()
  {
    $("#fbaid").text('');
    var salsecode=$("#Scode").val();    
     $.ajax({  
         type: "GET",  
         url:'sales-code-update-get-fbaid/'+salsecode,
         success: function(fbadata)
         {  

           var data = JSON.parse(fbadata);   
            if(data.length>0)
            {          
             $("#fbaid").text(data[0].FBAID);
             $("#txtfbaid").val(data[0].FBAID);  

            }        

         }  
      });
  }

$("#btnsave").click(function(){
  alert ($("#txtfbaid").val());
  if ($('#salesform').valid()){
$.ajax({ 
   url: "{{URL::to('sales-code-update-insert')}}",
   method:"POST",
   data: $('#salesform').serialize(),  
   success: function(msg)  
   {
    location.reload();
    alert("Record has been saved successfully");
    $("#salesform").trigger('reset');
    
  }
 }); 
 }
});
</script>




@endsection
