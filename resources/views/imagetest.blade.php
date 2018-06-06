@extends('include.master')
@section('content')


<form>
  	<div class="row">
  	<div class="col-sm-1">
  	</div>
    <div class="col-sm-1">
    <br>
    <label class="">Name :</label>
    </div>
    <div class="col-sm-5">
    <br>
    <input type="text" class="form-control txtOnly" id="l_name" name="l_name" placeholder="Enter name">
    </div>
    <div class="col-sm-2">
  	</div>
  	</div>

  	<div class="row">
  	<div class="col-sm-1">
  	</div>
    <div class="col-sm-1">
    <br>
    <label class="">Email id:</label>
    </div>
    <div class="col-sm-5">
    <br>
    <input type="text" class="form-control txtOnly" id="l_email" name="l_email" placeholder="Enter name">
    </div>
    <div class="col-sm-2">
  	</div>
  	</div>

  	<div class="row">
  	<div class="col-sm-1">
  	</div>
    <div class="col-sm-1">
    <br>
    <label class="">Phone no :</label>
    </div>
    <div class="col-sm-5">
    <br>
    <input type="text" class="form-control txtOnly" id="l_phone" name="l_phone" placeholder="Enter name">
    </div>
    <div class="col-sm-2">
  	</div>
  	</div>
  	<br>
      <div class="form-group col-md-5">
      <div class="form-group">
      <div class="col-md-5">
      <label>State :</label>
      </div>
      <div class="col-md-7">
      <select name="hddlstate" id="hddlstate" class="selectpicker select-opt form-control" >
     
      <option value="0">State</option>
         @foreach($state as $val)
		  <option value="{{$val->state_id}}">{{$val->state_name}}</option>                 
		  @endforeach
      </select>
      </div>
      </div>   
      </div> 
     <br>

   	 <div class="form-group col-md-5">
     <div class="form-group">
     <div class="col-md-2">
     <label>City :</label>
     </div>
     <div class="col-md-7">
      <select name="hddlcity" id="hddlcity" class="selectpicker select-opt form-control" >
     
     <option value="0">City</option>
     </select>
     </div>
     </div>   
     </div>
     <br>

 <input type="submit" name="fsubmit" id="fsubmit" class="btn btn-success">
  
  	</form>



  	<script type="text/javascript">
  		
  		$('#hddlstate').on('change', function() {
            var state_id = $(this).val();
            alert(state_id);
            if(state_id) {
                $.ajax({
                    url: 'viewimage/'+state_id,
                    type: "GET",
                    dataType: "json",
                    success:function(data) {
                        $('#hddlcity').empty();
                        $('#hddlcity').append('<option value="0">select city</option>');
                        $.each(data, function(key, value) {

                            $('#hddlcity').append('<option value ="'+ key +'">'+ value +'</option>');
                        });
                     }
                });
            }else{
                $('select[name="city"]').empty();
            }
        });

  	</script>

@endsection


