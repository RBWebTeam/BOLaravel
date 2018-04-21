@extends('include.master')
@section('content')
<div class="container-fluid white-bg">
<div class="col-md-12"><h3 class="mrg-btm"> fba-details-update </h3></div>

<!-- <p class="col-md-12 pad mrg-btm"> <a href="#" class="menu_group_id_model btn btn-info"> Add   User Rights </a></p> -->
 
 


<div class="container">
   <form id="fba-update-from-id" method="post" >
<div class="input-group add-on">{{ csrf_field() }}
      <input type="text" class="form-control"  onkeypress="return Numeric(event)"  placeholder="Search FBA ID" name="fba_id" id="srch-term">
      <div class="input-group-btn">
        <button class="btn btn-default" type="submit" id="search_fba"><i class="glyphicon glyphicon-search"></i></button>
      </div>
    </div>

   </form>

   </div>



<div class="container">
   <form>

   <div id="fba_appand"></div>

  

<!--   <div class="form-group">
    <label class="control-label " for="name">Name</label>
    <input class="form-control" id="name" name="name" value="'++'" type="text"/>
  </div>
  
  <div class="form-group">  
    <label class="control-label requiredField" for="email">Email<span class="asteriskField">*</span></label>
    <input class="form-control" id="email"  value="'++'" name="email" type="text"/>
  </div>
  
  <div class="form-group">  
    <label class="control-label " for="subject">Subject</label>
    <input class="form-control"  value="'++'" id="subject" name="subject" type="text"/>
  </div>
  
  
  <div class="form-group">
    <button class="btn btn-primary " name="submit" type="submit">Submit</button>
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
               console.log(res.query);
               if(res.status==true){
                 
                 $('#fba_appand').append('<div class="form-group"> <label class="control-label " for="name">Name</label> <input class="form-control" id="name" name="name" value="'+res.query.FirsName+'" type="text"/> </div><div class="form-group"> <label class="control-label requiredField" for="email">Email<span class="asteriskField">*</span></label> <input class="form-control" id="email" value="'+1+'" name="email" type="text"/> </div><div class="form-group"> <label class="control-label " for="subject">Subject</label> <input class="form-control" value="'+1+'" id="subject" name="subject" type="text"/> </div><div class="form-group"> <button class="btn btn-primary " name="submit" type="submit">Submit</button> </div>');
               }
                
             }).fail(function(xhr, status, error) {
                 console.log(error);
            });

     
 });
});

 </script>



@endsection




 