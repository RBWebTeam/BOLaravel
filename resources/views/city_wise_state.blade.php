@extends('include.master')
@section('content')

   <div class="col-md-12"><h3 class="mrg-btm">State_Wise City </h3>

	<form  id="statecityshow" name="statecityshow" action="{{url('citywisestate')}}" method="post"> 
    {{ csrf_field() }}
     <hr>
     </div>




  <div class="col-md-4 col-sm-4 col-xs-12">
     <h4 style="margin-left: 45%;">State</h4>
     <div class="form-group">
     <select multiple="multiple" class="form-control select-sty" name="state[]" id="state" >    
     </select>
     </div>
     </div>

     <div class="col-md-4 col-sm-4 col-xs-12">
     <h4 style="margin-left: 45%;">City</h4>
     <div class="form-group">
     <select  multiple="multiple" class="form-control select-sty" name="city[]" id="city">
     </select>
     </div>
     </div>

     <div class="form-group"> <input type="submit" name="qlead" id="qlead"  class="mrg-top common-btn pull-left" value="SHOW"> 
     </div>

<div class="col-md-12">
      <div class="overflow-scroll">
      <div class="table-responsive" >
    <table class="datatable-responsive table table-striped table-bordered nowrap" id="example">

           <thead>
           <tr>
           <th><input type="checkbox" name="chekfba" id="chekfba"></th>
           <th>FBA ID</th> 
           <th>FBA Name</th> 
           <th>Email id</th>
           <th>Mobile No</th> 
           <th>City</th>                                  
           </tr>
           </thead>
           <tbody>
@isset($fbascity) 
    @foreach($fbascity as $val)   
               <tr>
               <td><input value="<?php echo $val->FBAID; ?>" type="checkbox" name="chekfba" id="chekfba" class="select-checkall"></td>
                <td><?php echo $val->FBAID; ?></td> 
                <td><?php echo $val->FullName; ?></td>
                <td><?php echo $val->EmailID; ?></td> 
                <td><?php echo $val->MobiNumb1; ?></td>
                <td><?php echo $val->City; ?></td>
				<!--   <td>{{$val->FBAID}}</td> -->
              </tr>
                @endforeach
                @endisset

             </tbody>
			 </table>
          	 </form>
           	 <div>
           	 <button id="fbdatail" name="fbdatail" class="btn btn-success">Submit</button>
             </div>



     </div>
   </div>
 </div>






 <script type="text/javascript">
 $.ajax({ 
 url: "{{URL::to('quickleadassignment')}}",
 method:"GET",
 success: function(datas)  
 {
 var data=$.parseJSON(datas);
 // console.log(data);
 if(data)
 { $.each(data, function( index, value ) {
 $('#state').append('<option value="'+value.state_id+'">'+value.state_name+'</option>');
 }); 
 }else{
  $('#state').empty().append('No Result Found');
  }
  },
  });

  	$('#state').on('change', function() {
  $("#city").empty().append('');
   // alert('okae');
  var state=$('#state').find(":selected").val();
  var array = "";
  var i=0;
   $('#state  option:selected').each(function() {
    array+= $(this).val()+",";
    });
   console.log(array);
    var v_token ="{{csrf_token()}}";
   $.ajax({  
    type: "POST",  
    url: "{{URL::to('quickleadcity')}}",
    data : {'_token': v_token,'state':array},
    success: function(msg){
    console.log(msg);
    if(msg)
    {  $.each(msg, function( index, value ) {
   $('#city').append('<option value="'+value.cityname+'">'+value.cityname+'</option>');   
    }); 
     }else{
      $('#city').empty().append('No Result Found');
      }
      }  
      });
      });

  </script>


<script type="text/javascript">
$('.select-checkall').click(function(){
var all= $('.select-checkall:checked').map(function() {return this.value;}).get().join(',')
$('#txtfid').val(all);
		if(!$('.select-checkall').is(':checked'))
		{
			$('#chekfba').prop('checked', false);
		}
	});
	 $("#chekfba").click(function(){
	 	if($('#chekfba').is(':checked')){
            $('.select-checkall').prop('checked', true);                       
	 	}
	 	else{
	 		$('.select-checkall').prop('checked', false);
	 	}
     });

$('#fbdatail').click(function(){

	 if ($('#statecityshow').valid()){
   $.ajax({ 
   url: "{{URL::to('fbaquickleadcitysave')}}",
   method:"POST",
   data: $('#statecityshow').serialize(),
   success: function(msg)  
   {
   alert('record saved successfully');
   $('#statecityshow').trigger("reset");
   
   }

});
 }
});

</script>

@endsection