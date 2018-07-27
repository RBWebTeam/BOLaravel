@extends('include.master')
@section('content')
@if(Session::has('message'))
<div class="alert alert-success alert-dismissible">
<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
<p class="alert alert-success">{{ Session::get('message') }}</p>
</div>
@endif
<div class="container-fluid white-bg">
  <div class="form group">
           	 <div class="col-md-4 col-xs-12">
              <h3>Update FBA Details</h3>
           </div>
          </div>



<form id="demo_form" name="demo_form" class="form-horizontal" method="POST" action="{{url('update_fbamaster')}}"> 
 {{csrf_field()}} 


      <div class="form-group">
      <div class="col-lg-4">
      <input type="text" class="form-control numericOnly" id="search_fba" name="search_fba"  placeholder="Enter FBA ID"  required="yes">
      </div>
      <div class="col-lg-2">
      <button type="submit" id="sub" name="sub" class="btn btn-primary" >
      <span class="glyphicon glyphicon-search"></span> Search</button>
      </div>
      </div><br>

 
      <div class="form-group">
      <label for="name" class="col-lg-4 control-label">Fba Id:</label>
      <div class="col-lg-5">
      <input type="text" class="form-control" id="fba_id" name="fba_id" readonly="" required>
      </div>
      </div>

 
      <div class="form-group">
      <label for="name" class="col-lg-4 control-label">First Name:</label>
      <div class="col-lg-5">
      <input type="text" class="form-control" id="f_name" name="f_name" required>
      </div>
      </div>

      <div class="form-group">
      <label for="name" class="col-lg-4 control-label">Middle Name:</label>
      <div class="col-lg-5">
      <input type="text" class="form-control" id="midname" name="midname">
      </div>
      </div>
    
      <div class="form-group">
      <label for="address1" class="col-lg-4 control-label"><b>Last Name:</b></label>
      <div class="col-lg-5">
      <input type="text" id="l_name" name="l_name" class="form-control input-md" required >
      </div>
      </div>


      <div class="form-group">
      <label for="email" class="col-lg-4 control-label">Email:</label>
      <div class="col-lg-5">
      <input type="email"  class="form-control" id="work_email"  name="work_email" onblur="validateEmail(this);"  required>
      </div>
      </div>

      <div class="form-group">
      <label for="mobile" class="col-lg-4 control-label">Mobile No:</label>
      <div class="col-lg-5">
      <input type="text" class="form-control" id="mobile" name="mobile" maxlength="10" required>
      </div>
      </div>

      <div class="form-group">
      <label for="DOB" class="col-lg-4 control-label">DOB:</label>
      <div class="col-lg-5">
      <input type="date" class="form-control" id="dbirth" name="dbirth" required>
      </div>
      </div>
  
      <div class="form-group">
      <div class="col-lg-5 col-lg-offset-6">
<button type="submit" id="updtefba" onclick="userValid()" name="updtefba" class="btn btn-primary">Update</button>
   
      </div>
      </div>

</form>
</div>


  <script type="text/javascript">
        $(document).ready(function(){
         $("#sub").click(function(){
               if( $("#search_fba").val()==''){
                return  false;
             }

               $.ajax({
                url: "{{url('fbaid-view')}}",
                type: 'get',
                data:{'id':$("#search_fba").val()},

                success: function(data){
               console.log(data);
              //if (data.length<=0) 
                if (data.length<=0) 
                {
                  alert("no data found");
                  window.location.replace("fbamaster-edit"); 
                 }else{            
                      $('#f_name').val(data[0].FirsName);
                      $('#midname').val(data[0].MiddName); 
                      $('#l_name').val(data[0].LastName);
                      $('#work_email').val(data[0].emailID);
                      $('#mobile').val(data[0].MobiNumb1);
                      $('#fba_id').val(data[0].FBAID);
                      $('#dbirth').val(data[0].DOB);  
                    }
                }                                
            });
        });

    $("#search_fba").keydown(function(){
                     $('#f_name').val('');
                      $('#midname').val(''); 
                      $('#l_name').val('');
                      $('#work_email').val('');
                      $('#mobile').val('');
                      $('#fba_id').val('');
                      $('#dbirth').val('');

    });
    });
          
  </script>


<script type="text/javascript">
 function userValid(){
 
 var txtsearch = document.getElementById("search_fba").value;
  if (txtsearch == "") {
  alert("Please fill all mandatory details");
  }
}
</script>



<script type="text/javascript">
        function validateEmail(emailField){
        var reg = /^([A-Za-z0-9_\-\.])+\@([A-Za-z0-9_\-\.])+\.([A-Za-z]{2,4})$/;
        if (reg.test(emailField.value) == false) 
        {
         alert('Invalid Email Address');
         return false;
        }
          return true;
}

</script>


@endsection