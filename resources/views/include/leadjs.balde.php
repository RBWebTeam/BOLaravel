<script type="text/javascript">
	 function get_fn_id(id){
       $('#lead_up_load-Modal').modal('show');
 }

 $(document).ready(function(){


 $("#lead_up_id").click(function(event){  event.preventDefault(); 	 
            $.post("{{url('lead-update')}}",$('#lead_up_from').serialize())
             .done(function(msg){ 
                 if(msg==0){
                 
                 }else{
                  
                 }
          }).fail(function(xhr, status, error) {
                 console.log(error);
            });


});
});
</script>