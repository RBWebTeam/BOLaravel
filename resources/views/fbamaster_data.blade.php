@extends('include.master')
@section('content')

<div class="container-fluid white-bg">
  <div class="form group">
           	 <div class="col-md-6 col-xs-12">
              <h4>  Search FBAID</h4>
            </div>
          </div>

    <input type="text" name="search_fba" id="search_fba" maxlength="6" onkeypress="return fnAllowNumeric(event)" required>
    <button type="submit" id="sub" name="sub" class="btn btn-primary">
    <span class="glyphicon glyphicon-search"></span> Search</button>
 
</br>
</br>
</br>


 <form id="demo_form" name="demo_form" class="form-horizontal" method="POST" action="{{url('update_fbamaster')}}"> 
           {{csrf_field()}} 

      <div class="form-group">
      <label for="name" class="col-lg-4 control-label">Fba id</label>
      <div class="col-lg-5">
        <input type="text" class="form-control" id="fba_id" name="fba_id"  value="" required>
      </div>
    </div>

 
  

    <div class="form-group">
      <label for="name" class="col-lg-4 control-label">First Name:</label>
      <div class="col-lg-5">
        <input type="text" class="form-control" id="f_name" name="f_name" value="" required>
      </div>
    </div>
    
    
    <div class="form-group">
      <label for="address1" class="col-lg-4 control-label"><b>Last Name:</b></label>
      <div class="col-lg-5">
        <input type="text" id="l_name" name="l_name" value="" class="form-control input-md">
      </div>
    </div>


     <div class="form-group">
      <label for="email" class="col-lg-4 control-label">Email:</label>
      <div class="col-lg-5">
        <input type="text" class="form-control" id="work_email" value="" name="work_email">
     </div>
    </div>


     

    <div class="form-group">
      <label for="mobile" class="col-lg-4 control-label">Mobile No:</label>
      <div class="col-lg-5">
        <input type="text" class="form-control" id="mobile" value=""   name="mobile">

      </div>
    </div>
  
      <div class="form-group">
      <div class="col-lg-5 col-lg-offset-6">
       <button type="submit" class="btn btn-primary">Edit</button>
        
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
                     //console.log(data);
                      $('#f_name').val(data[0].FirsName);
                      $('#l_name').val(data[0].LastName);
                      $('#work_email').val(data[0].emailID);
                      $('#mobile').val(data[0].MobiNumb1);
                       $('#fba_id').val(data[0].FBAID);
                     }                                
            });
        });
    });
          
  </script>


  <script type="text/javascript">
          function fnAllowNumeric(evt) {
            evt = (evt) ? evt : window.event;
            var charCode = (evt.which) ? evt.which : evt.keyCode;
            if (charCode > 31 && (charCode < 48 || charCode > 57)) {

              return false;
            }
            return true;
          }
 </script>




@endsection