@extends('include.master')
@section('content')


       <div class="container-fluid white-bg">
       <div class="col-md-12"><h3 class="mrg-btm">RM City Mapping</h3></div>
       <form id= "rm_form" name="rm_form" method="Post"> 
{{csrf_field()}}

          
        <table id="" class="table table-responsive table-hover" cellspacing="0">
          <div class="col-md-4 col-xs-12">
        <div class="form-group">
        <select  class="selectpicker select-opt form-control" id="rmname" name="rmname" onchange="getcitystateid();" required>
         <option value="1">Select RM</option>
         
                  @foreach($query as $val) 
             <option value="{{$val->id}}">{{$val->name}}</option>
            @endforeach
            
        </select>
        </div>
        </div>

        <div class="col-md-4 col-xs-12">
        <div class="form-group">
        <select multiple="multiple" name="ddlstate[]" class="selectpicker select-opt form-control" id="ddlstate" required>
         <option value="1">Select state</option>
     @foreach($state as $val) 
    <option value="{{$val->state_id}}">{{$val->state_name}}</option>
     @endforeach
  </select>
 </div>
        </div>
        <div class="col-md-4 col-xs-12">
        <div class="form-group">
        <select multiple="multiple" name="ddlcity[]" class="selectpicker select-opt form-control" id="ddlcity" required>
         <option value="1">Select City</option>
         <option value=""></option>
         </select>
        </div>
        </div>
        <div class="col-md-12 col-xs-12">
         <br>
         <div class="center-obj center-multi-obj">
         <button type="submit" id="buttonsub" class="common-btn">Submit</button>
         </div>
         </div>

       </form>
       </div>
   
@endsection

<script type="text/javascript">

function getcitystateid()
  {
    // alert("test");
      var rmname= document.getElementById("rmname").value;
      console.log(rmname);
      // alert("test");
        $.ajax({
                url: "{{url('rm_city_master1')}}",
                type: 'POST',
                data: { rmname:rmname},
                success: function(data)
                {
                  console.log(data);  // alert("Test");
                }
        });
       
  }  


   </script>