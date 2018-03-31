<script src="{{URL::to('javascripts/bootstrap-multiselect.js')}}"></script>
  <link rel="stylesheet" href="{{URL::to('stylesheets/bootstrap-multiselect.css')}}" />
<script type="text/javascript">
	



$(document).ready(function(){
   // $('.framework').append(arr);
  $('#framework').multiselect({
  nonSelectedText: 'Select Framework',
  enableFiltering: true,
  enableCaseInsensitiveFiltering: true,
  buttonWidth:'400px'
 });

 



 
 $("#add_menu_id").click(function(event){  event.preventDefault(); 	
   $('#menu-list-Modal').modal('show');
 });

 $(".menu_group_id_model").click(function(event){  event.preventDefault(); 	  

   $('#menu-group-id-Modal').modal('show');

 });

 $("#menu_group_id_").click(function(event){  event.preventDefault(); 	  

       if($('#menu__group').val()!=0  ){ 
            $.post("{{url('menu-group-save')}}",$('#menu_group_id_from').serialize())
             .done(function(data){ 
             	// console.log(data);
                 if(data==0){
                 window.location.href = "{{url('menu-group')}}";
                 }else{
                  
                 }
          }).fail(function(xhr, status, error) {
                 console.log(error);
            });

      }else{

      	 alert("Please fill up the form ");
      }

 });



  $("#menu_list_ID").click(function(event){  event.preventDefault(); 	 

 	       if($('#menu_name_id').val()!=0 && $('#menu_group_id').val()!=0  ){ 
            $.post("{{url('menu-add')}}",$('#menu_list_from').serialize())
             .done(function(data){ 
             	// console.log(data);
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

	


 
function radioButtonClicked(id){
     document.getElementById('parent_id').value =id;
}



// Menu Test

 
 
// $("ul.menu").find('> li').hover(
//     function() {
//         $(this).find('> ul').slideDown();
//     },
//     function() {
//         $(this).find('> ul').hide();
//     }


// );

// $("ul.sub-menu").find('> li').hover(
//     function() {
//         $(this).find('> ul').slideDown();
//     },
//     function() {
//         $(this).find('> ul').hide();
//     }
// );
 

 

 

   
 
</script> 