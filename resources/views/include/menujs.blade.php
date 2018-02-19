<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-multiselect/0.9.13/js/bootstrap-multiselect.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-multiselect/0.9.13/css/bootstrap-multiselect.css" />
<script type="text/javascript">
	

	$(document).ready(function(){

	 
 $("#menu_group_mapping").change(function(event){  event.preventDefault(); 	 
 	
 	$('#Menu_Mapping').show();


});

  $('#framework').multiselect({
  nonSelectedText: 'Select Framework',
  enableFiltering: true,
  enableCaseInsensitiveFiltering: true,
  buttonWidth:'400px'
 });


 
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