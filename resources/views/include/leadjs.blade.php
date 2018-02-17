<script type="text/javascript">
	 function get_fn_id(id,mobile){
        $('#lead_id_mobile').val(mobile);
	 	$('#lead_id').val(id);
       $('#lead_up_load-Modal').modal('show');
 }
function interested_fn(id,mobile){
$('#lead_id_interested').val(id);
$('#lead_id_mobile').val(mobile);
$('#interested_id-Modal').modal('show');
}
 $(document).ready(function(){
 $("#lead_up_id").click(function(event){  event.preventDefault(); 	 

 	       if($('#lead_type_id').val()!=0 && $('#remark').val()!=0 && $('#lead_status_id').val()!=0 ){ 
            $.post("{{url('lead-update')}}",$('#lead_up_from').serialize())
             .done(function(data){ 
                 if(data.error==0){
                     if(data.status=='sms'){
                     	 alert("SMS Sent...");
                     }
                 	window.location.href = "{{url('lead-up-load')}}";
                 }else{
                  
                 }
          }).fail(function(xhr, status, error) {
                 console.log(error);
            });

      }else{

      	 alert("Select value...");
      }


});


 $("#interested_id").click(function(event){  event.preventDefault(); 	 alert($('#interested_form').serialize());

 	       if($('#message_id').val()!=0 && $('#link_id').val()!=0  && $('#lead_id_interested').val()!=0 ){ 
            $.post("{{url('lead-interested')}}",$('#interested_form').serialize())
             .done(function(msg){ 
                 if(msg==0){
                 	 alert("SMS Sent...");
                 	//window.location.href = "{{url('lead-up-load')}}";
                 }else{
                    console.log("error");
                 }
          }).fail(function(xhr, status, error) {
                 console.log(error);
            });

      }else{

      	 alert("please fill up the form...");
      }


});







});

 
</script>