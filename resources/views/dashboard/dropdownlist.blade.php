@extends('include.master')
@section('content')
<div class="container-fluid white-bg">
<div class="col-md-12"><h3 class="mrg-btm"></h3></div>
<form class="form-horizontal" action="{{url('insert_state')}}" method="post">
{{csrf_field()}}
<div class="col-md-4 col-xs-12">
<select  class="selectpicker select-opt form-control" id="txtmobile" name="txtmobile"  required>
<option value="">Select Mobile</option>
 @foreach ($users as $user)
<option value="{{ $user->FBAID}}">{{ $user->MobiNumb1}}</option>
  @endforeach 
</select>
 </div>
</form>
</div>
<script type="text/javascript">
  $(document).ready(function(){
  $('#txtmobile').change(function(){
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


