@extends('include.master')
 @section('content')

<!-- Body Content Start -->
            <div id="content" style="overflow:scroll;">
			 <div class="container-fluid white-bg">
			 <div class="col-md-12"><h3 class="mrg-btm">SEND SMS</h3></div>
			 <!-- Date Start -->
			 


			 <div class="col-md-12 col-xs-12">
				<div class="form-group col-md-3">
				<select id="smslist" class="selectpicker select-opt form-control" required="" onchange="SENDSMS_FN(this.value)">
			     <option value="0">-- Select Recipient --</option>
		         <option value="1">FBA</option>
				 <option value="2">FSM</option>
				 <option value="3">FBA POSP</option>
				</select>
				</div>

				<div class="form-group col-md-3">
			       <input type="text" placeholder="City.." name="city_name" id="search_city" class="form-control" >  
				</div>

			</div> 

			   

     <div class="col-md-4">
      <div class="form-group">
      <p>From Date</p>
         <div id="datepicker" class="input-group date" data-date-format="yyyy-mm-dd">
      <input class="form-control" type="text" placeholder="From Date" name="fdate" id="fmin_date"   />
              <span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
              </div>
            </div>
           </div>
       <div class="col-md-4">
       <div class="form-group">
       <p>To Date</p>
       <div id="datepicker1" class="input-group date" data-date-format="yyyy-mm-dd">
 <input class="form-control" type="text"  placeholder="To Date"  name="todate"  id="fmax_date"    />
              <span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
              </div>
            </div>
           </div>
       <div class="col-md-4">
       <div class="form-group"> <a href="#" class="mrg-top common-btn" id="search_fba_date">SHOW</a>   </div>
      </div>



	 <form method="post" action="{{url('send-sms-save')}}" > {{ csrf_field() }}


        


				<div class="col-sm-6 col-xs-12 form-padding" id="StatesV" style="overflow-y:scroll;height:270px;">

	                    <table class="table table-responsive table-hover" cellspacing="0" id="myTable">
		                <thead>
						<tr class="headerstyle" align="center">
			            <th scope="col">
                        <input type="checkbox" id="checkAll" name="check" style="width: auto; float: left; display: inline-block; margin-right: 16px;">
                        <span>RECIPIENTS</span>   <input type="text" name="search" style="margin: 0px 10px 10px 330px" id="myInput"  class="search_id" placeholder="Search for names.." title="Type in a name">
                        </th>
		                </tr>
		         

                         </thead >
                         <tbody id="sendsms_id"></tbody>
					    </table>
                        
			     </div>



			
	               <div class="col-sm-6 col-xs-12 form-padding">
                    <select  name="SMSTemplate"   onchange="SMSTemplate_fn(this.value)" >
                    <option value="0" >select</option>
                    @foreach($SMSTemplate as $sms)
                    <option value="{{$sms->SMSTemplateId}}">{{$sms->Header}}</option>
                    @endforeach
                    </select>

                      @if ($errors->has('SMSTemplate'))<label class="control-label" for="inputError"> {{ $errors->first('SMSTemplate') }}</label>  @endif



	               <textarea style="padding:10px; height:200px;"  id="SMSTemplate"  name="sms_text"> </textarea>
	               <div class="center-obj pull-left">
	               <button class="common-btn">SEND</button>

	                 @if ($errors->has('sms_text'))<label class="control-label" for="inputError"> {{ $errors->first('sms_text') }}</label>  @endif
	               </div>
				   </div>

</form>

					
		    </div>
            </div>
		
 
		<script type="text/javascript">
$(document).ready(function(){   
	 $("#checkAll").click(function () {
     $('input:checkbox').not(this).prop('checked', this.checked);
      
 });



});

 




$(document).on("keyup",".search_id",function() { 

   var input, filter, table, tr, td, i;
  input = document.getElementById("myInput");
  filter = input.value.toUpperCase();
  table = document.getElementById("myTable");
  tr = table.getElementsByTagName("tr");
  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[0];
     
    if (td) {
      if (td.innerHTML.toUpperCase().indexOf(filter) > -1) {
        tr[i].style.display = "";
      } else {
        tr[i].style.display = "none";
      }
    }       
  }
});

function SENDSMS_FN(ID){
	FN_search(ID,0,0,0);

}

$(document).ready(function(){   
 $("#search_fba_date").click(function () {

           ID= $('#smslist').val();
         city= $('#search_city').val();	
        fDate= $('#fmin_date').val();
        tDate=  $('#fmax_date').val();
  
        if(ID!=0){
       FN_search(ID,city,fDate,tDate);
   }

});
}); 

function FN_search(ID,city,fDate,tDate){
 var search=null;
         if(ID){
          search={'ID':ID};
         }
         if(city){
          search={'city':city};
         }

         
         if((fDate!=0) && (tDate!=0)){
           search={'fDate':fDate,'tDate':tDate};
         }

        

 if(search!=null){
 $.get("{{url('send-sms')}}",search).done(function(data){   var arr=Array();   $('#sendsms_id').empty();

 	           if(data.sms_data){
              $.each(data.sms_data,function(index,val){ 
                    arr.push('<tr><td><input type="checkbox" name="fba[]" value="'+val.FBAID+'" >'+val.FullName	+':'+val.MobiNumb1+'</td> </tr>');  });
                $('#sendsms_id').append(arr);
                 }
               }).fail(function(xhr, status, error) {
                  console.log(error);
                });
  }
}



 
function SMSTemplate_fn(ID){
 $('#SMSTemplate').empty();
  $.get("{{url('send-sms')}}",{'smstemplate_id':ID}).done(function(data){ 
               $('#SMSTemplate').val(data);
  	  }).fail(function(xhr, status, error) {
                  console.log(error);
     });

}



</script>
			 @endsection
 