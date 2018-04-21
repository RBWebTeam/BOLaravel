@extends('include.master')
@section('content')
<div class="container-fluid white-bg">
       <div class="col-md-12"><h3 class="mrg-btm">CITY Wise Dropdown Sub City</h3></div>
        
        <form class="form-horizontal" action="{{url('insert_state')}}" method="post">
       {{csrf_field()}}

     <div class="col-md-4 col-xs-12">
      <select  class="selectpicker select-opt form-control" id="txtmapstate" name="txtmapstate"  required>
         <option value="">Select State</option>
         @foreach ($users as $user)
            <option value="{{ $user->state_id}}">{{ $user->state_name}}</option>
        @endforeach 
     </select>
   </div>
    <table class="table_id table-bordered" id="table_id" name="table_id" width="600">
        <thead>
          <tr>
            <th>City</th>
            <th>Sub City</th>
          </tr>
        </thead>
        <tbody id="table_tbody">
           <tr>
       
            </tr>
        </tbody>
  </table>


   </form>
   </div>

  <script type="text/javascript">
  $(document).ready(function(){
    $('#txtmapstate').change(function(){
     //alert("Run");
      $.ajax({  
         type: "GET",  
         url:'state_dropdown_id/'+$(this).val(),//"{{URL::to('Fsm-Details')}}",
         success: function(fsmmsgstate){
          console.log(fsmmsgstate);
           if(fsmmsgstate.length>0){

             $("#table_tbody tr").remove(); 
          var trHTML = '';
          $.each(fsmmsgstate, function (key,value){
             trHTML += 
                '<tr><td>' + value.cityname + 
                '</td>  <td>' + value.sub_city_name + 
                '</td></tr>';     
          });

               $('#table_id').append(trHTML);


               }
         else{

          $("#table_tbody tr").remove(); 
         
         }
        }  
      });
  });
});
</script>

@endsection
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>