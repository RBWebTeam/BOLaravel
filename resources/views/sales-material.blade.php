@extends('include.master')
@section('content')
            


             <div class="container-fluid white-bg">
				<div class="col-md-12"><h3 class="mrg-btm">SALES MATERIAL</h3></div>
				<form name="sales_material" id="sales_material" method="POST">
				 {{ csrf_field() }}
				<div class="col-md-4 col-xs-12">
				<label>Product</label>
				<div class="form-group">
				<select class="form-control drop-arr select-sty" name="Product" id="Product">
             <option  value="0">SELECT</option>
					
					   <option value="1">Health Insurance</option>
					   <option value="2">Motor Insurance</option>
					   <option value="3">Health Assure</option>
					   <option value="4">Loans</option>
					   <option value="5">Fin-Peace</option>
					</select>
				</div>
				</div>

				<div class="col-md-4 col-xs-12">
				<label>Company</label>
				<div class="form-group">
				<select class="form-control drop-arr select-sty Company" name="Company" id="Company" >
					   <option  value="0">SELECT</option>
					   <option style="display: none;" value="1">Bharti</option>
					   <option style="display: none;" value="2">General</option>
					   <option style="display: none;" value="3">Liberty Videocon</option>
					   <option style="display: none;" value="4">Religare</option>
					   <option style="display: none;" value="5">Future Gen</option>
					   <option style="display: none;" value="6">IFFCO</option>
					   <option style="display: none;" value="7">New India</option>
					   <option style="display: none;" value="8">Reliance</option>
					   <option style="display: none;" value="9">Cigna TTK</option>
					   <option style="display: none;" value="10">ICICI</option>
					   <option style="display: none;" value="11">Star Health</option>
					</select>
				</div>
				</div>


				

				<div class="col-md-4">
	            <input type="hidden" name="UserId" id="UserId" value="<?php echo Session::get('emp_id');?>">
               
               <br>
				<a type="button" id="sales_submit" name="sales_submit" class="btn btn-primary">SUBMIT</a>
			   <div>
                </div>
                </div>



				<div id="docs" class="co-md-8"></div>
				</form>
					



            </div>
		<script type="text/javascript">
  $('#sales_submit').click(function(){

    if ($('#Product').val()!=0 && $('#Company').val()!=0)
    {

         
      


    $.ajax({ 
   url: "{{URL::to('sales-material-update')}}",
   method:"POST",
   data : $('#sales_material').serialize(),
   success: function(msg)  
   {
  
     var tablerows = new Array();
     URL="{{URL::to('')}}/";
     // alert(URL);
        $.each(msg, function( index, value ) {
            tablerows.push('<tr><td id="'+index+'"><span class="glyphicon glyphicon-remove"  style="cursor:pointer"<a class="close" onclick="img_delete('+ value.id +','+index+')" href="#">Close</a></span><img class="img-responsive" src="'+URL+value.image_path+ '" width="400" height=""/></td></tr>');
        }); 

       if(msg){
          $('#docs').empty().append('<table class="table table-striped table-bordered"><tr class="text-capitalize"><td style="font-family: monospace">Images</td></tr>'+tablerows+'</table>');
         }else{
            $('#docs').empty().append('No Result Found');
         }

   },

 });

  }else
  {
    alert('Please Select Dropdown List');
  }
  });


  

</script>

<script type="text/javascript">
 function img_delete(id,index){

 $('#'+index).hide();
  var id= id;
  var v_token = "{{csrf_token()}}";
   $.ajax({  
         type: "POST",  
         url: "{{URL::to('sales-material-delete')}}",
         dataType:'json',
         data : { 'id': id ,'_token': v_token},
         success: function(msg){
          console.log(msg);

          
            
      }   
     });

};
 
</script>

<script type="text/javascript">
  $('#Product').on('change', function() {
    var Product=$('#Product').find(":selected").val();
   // console.log(Product);
    if ( Product == '1')
      {
       $("#Company option[value='1']").show();
        $("#Company option[value='2']").show();
        $("#Company option[value='3']").show();
        $("#Company option[value='4']").show();
          
      }
      if (Product == '2') 
      {
        $("#Company option[value='1']").show();
        $("#Company option[value='2']").show();
        $("#Company option[value='3']").show();
        $("#Company option[value='5']").show();
        $("#Company option[value='6']").show();
        $("#Company option[value='7']").show();
        $("#Company option[value='8']").show();
      }
      if (Product=='3') 
      {
         $("#Company option[value='1']").show();
        $("#Company option[value='2']").show();
        $("#Company option[value='3']").show();
        $("#Company option[value='4']").show();
         $("#Company option[value='5']").show();
        $("#Company option[value='8']").show();
      }
      if (Product=='4') 
      {
         $("#Company option[value='1']").show();
        $("#Company option[value='2']").show();
        $("#Company option[value='4']").show();
        $("#Company option[value='5']").show();
         $("#Company option[value='8']").show();
        $("#Company option[value='9']").show();
        $("#Company option[value='10']").show();
        $("#Company option[value='11']").show();
      }
      if (Product=='5') 
      {
         $("#Company option[value='1']").show();
        $("#Company option[value='2']").show();
        $("#Company option[value='3']").show();
        $("#Company option[value='4']").show();
         $("#Company option[value='5']").show();
        $("#Company option[value='8']").show();
      }
     
        
      
        
      });
		</script>			    
@endsection	



	
            