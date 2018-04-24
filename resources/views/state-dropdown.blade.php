
@extends('include.master')
@section('content')


<div class="container-fluid white-bg">
       
        
        <form class="form-horizontal" action="{{url('insert_state')}}" method="post">
       {{csrf_field()}}
        @if (Session::has('message'))
          <div class="alert alert-success" role="alert">
              <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            {{ Session::get('message') }}  
          </div>
         @endif
    <div class="col-md-12"><h3 class="mrg-btm">STATE Wise Dropdown Mapping</h3></div>      
  <table id="" class="table table-responsive table-hover" cellspacing="0">
     <div class="col-md-4 col-xs-12">
      <select  class="selectpicker select-opt form-control" id="txtmapstate" name="txtmapstate"  required>
         <option disabled selected value="">Select State</option>
         @foreach ($users as $user)
        <option value="{{ $user->state_id}}">{{ $user->state_name}}</option>
      @endforeach 
     </select>
   </div>

     <div class="col-md-4 col-xs-12">
      <select class="selectpicker select-opt form-control" id="txtmapcity" name="txtmapcity"  required>
          <option value="">Select City</option>

        </select>
   </div>
   <br>
   <br>
   <br>
   <br>
   <br>
   <br>
   <div class="col-md-4 col-xs-12"  id="section1">
              
                  <input type="hidden" name="city_id" id="city_id" class="form-control" placeholder="">

                  <input type="text" name="s_name" id="s_name" class="select-opt form-control" placeholder="Enter Sub City Name" required>



   </div>
   <br>  
   <br>   
   <br>   
   <br>
   <div class="form-group">
                 <center><button type="submit" id="sub" class="btn btn-primary">Save</button></center> 
      </div>
     </table>
   </form>
   </div>

  <script type="text/javascript">
  $(document).ready(function(){
    $('#txtmapcity').change(function(){
      $.ajax({  
         type: "GET",  
         url:'state_dropdown/'+$(this).val(),
         success: function(fsmmsg){
        //alert(fsmmsg);
        var data = JSON.parse(fsmmsg);
        if(data.length>0){
          $('#city_id').val(data[0].city_id);
        //  $('#s_name').val(data[1].cityname);
        }
        else{
          $('#city_id').val(""); 
         $('#s_name').val(""); 
        }
        
        }  
      });
  });
});
</script>


<script type="text/javascript">
  $(document).ready(function(){
    $('#txtmapcity').change(function(){
      $.ajax({  
         type: "GET",  
         url:'state_sub_dropdown/'+$(this).val(),
         success: function(ResponceData){
         //alert(ResponceData);
        var data_demo = JSON.parse(ResponceData);
         if(data_demo.length>0){
          //$('#city_id').val(data[0].city_id);
           $('#s_name').val(data_demo[0].sub_city_name);
         }
         else{
          //$('#city_id').val(""); 
          $('#s_name').val(""); 
         }
        
        }  
      });
  });
});
</script>

<script type="text/javascript">
     window.setTimeout(function() {
    $(".alert").fadeTo(500, 0).slideUp(500, function(){
        $(this).remove(); 
    });
}, 1000);
</script>



@endsection
