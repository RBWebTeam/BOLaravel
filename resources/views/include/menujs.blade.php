<script type="text/javascript">
	

	$(document).ready(function(){
 
 $("#add_menu_id").click(function(event){  event.preventDefault(); 	
   $('#menu-list-Modal').modal('show');
 });


  $("#menu_list_ID").click(function(event){  event.preventDefault(); 	 

 	       if($('#menu_name_id').val()!=0 && $('#menu_group_id').val()!=0  ){ 
            $.post("{{url('menu-add')}}",$('#menu_list_from').serialize())
             .done(function(data){ 
             	 console.log(data);
                 if(data==0){
                     
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


 }); 

	

</script>