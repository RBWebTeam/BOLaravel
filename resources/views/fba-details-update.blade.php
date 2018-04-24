@extends('include.master')
@section('content')
<div class="container-fluid white-bg">
<div class="col-md-12"><h3 class="mrg-btm"> FBA Update Details </h3></div>

<!-- <p class="col-md-12 pad mrg-btm"> <a href="#" class="menu_group_id_model btn btn-info"> Add   User Rights </a></p> -->
 
 


<div class="container">
   <form id="fba-update-from-id" method="post" >
<div class="input-group add-on">{{ csrf_field() }}
      <input type="text" class="form-control"   onkeypress="return Numeric(event)"  placeholder="Search FBA ID" name="fba_id" id="srch-term">
      <div class="input-group-btn">
        <button class="btn btn-default" type="submit" id="search_fba"><i class="glyphicon glyphicon-search"></i></button>
      </div>
    </div>

   </form>

   </div>



<div class="container">
   <form id="fba_details_update_from"  method="post">{{ csrf_field() }}
   <div id="fba_details_update"></div>
  
  <!-- <div class="form-group">
    <input class="form-control"   name="FBAID" value="'+res.query[0].FBAID+'" type="text"/ >
  </div>
  
  <div class="form-group">
    <button class="btn btn-primary " id="fba_details_update_ID"  type="submit">Submit</button>
  </div> -->
  
</form>         
</div>
 



      </div>

 
 
 <script type="text/javascript">
   
$(document).ready(function(){
 
 $('#search_fba').click(function(event){   event.preventDefault(); 
      var srchterm=$('#srch-term').val();
  
        
         $.post("{{url('fba-search-id')}}",$('#fba-update-from-id').serialize())
             .done(function(res){ 
               if(res.status==true && res.query.length>0){  
                 
                 $('#fba_details_update').empty().append('<div class="form-group"> <input class="form-control" name="FBAID" value="'+res.query[0].FBAID+'" required type="hidden"/ onkeypress="return Numeric(event)"> </div><div class="form-group"> <label class="control-label " >User Name</label> <input class="form-control" name="UserName" required value="'+res.query[0].UserName+'" type="text"/> </div><div class="form-group"> <label class="control-label " >first name</label> <input class="form-control" required name="FirsName" value="'+res.query[0].FirsName+'" type="text"/> </div><div class="form-group"> <label class="control-label " >Middle Name</label> <input class="form-control" required name="MiddName" value="'+res.query[0].MiddName+'" type="text"/> </div><div class="form-group"> <label class="control-label " >Last Name</label> <input class="form-control" name="LastName" value="'+res.query[0].LastName+'" type="text"/> </div><div class="form-group"> <label class="control-label " >Email ID</label> <input class="form-control" required name="EmailID" value="'+res.query[0].EmailID+'" type="email"/> </div><div class="form-group"> <label class="control-label " >Mobile Number </label> <input class="form-control" onkeypress="return Numeric(event)" name="MobiNumb1" value="'+res.query[0].MobiNumb1+'" maxlength="10"  minlength="10" type="text"/> </div><div class="form-group"> <button class="btn btn-primary " id="fba_details_update_ID" type="submit">Submit</button> </div>');
               }else{
                 $('#fba_details_update').empty();
                 alert("FBA ID not Match....");
               }
                
             }).fail(function(xhr, status, error) {
                 console.log(error);
            });

     
 });
});


  

$(document).on('click','#fba_details_update_ID',function(){ event.preventDefault(); 


          validator=$('#fba_details_update_from').validate();
     if(! $('#fba_details_update_from').valid()){
        
          $.each(validator.errorMap, function (index, value,arg) {
          $('#'+index).focus();
         return false;
       });
        }else{
          
        

  $.post("{{url('fba-search-update')}}",$('#fba_details_update_from').serialize())
             .done(function(res){ 
                if(res.status==true){
                 alert("Successfully Update");
                  $('#fba_details_update').empty();
              }else{
                console.log("error");
              }

               }).fail(function(xhr, status, error) {
                 console.log(error);
            });

             }

});


 </script>



@endsection




 