<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-multiselect/0.9.13/js/bootstrap-multiselect.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-multiselect/0.9.13/css/bootstrap-multiselect.css" />
<script type="text/javascript">
	



$(document).ready(function(){
   // $('.framework').append(arr);
  $('#framework').multiselect({
  nonSelectedText: 'Select Framework',
  enableFiltering: true,
  enableCaseInsensitiveFiltering: true,
  buttonWidth:'400px'
 });

  
	$("#menu_group_mapping").change(function(event){  event.preventDefault(); 	
         if($(this).val()!=0){
         // $('#Menu_Mapping').show();
            $('.framework').empty();
                 $('#framework').empty();
                  
          $.get("{{url('menu-group-select')}}",{'ID':$(this).val()})
             .done(function(data){ 
            // var arr=Array('<select id="framework" name="mapping[]" multiple class="form-control mapping_select_id"> ');
                var arr=Array();

              $.each(data,function(index,val){  
                      if(val.parent_id!=0){
                        arr.push('<option value="'+val.id+'" selected >'+val.name+'</option>');
                      }else{
                        arr.push('<option value="'+val.id+'" >'+val.name+'</option>');
                      }
                    
               });
                   // arr.push('</select>');
 //   $('.framework').append(arr);
 //  $('#framework').multiselect({
 //  nonSelectedText: 'Select Framework',
 //  enableFiltering: true,
 //  enableCaseInsensitiveFiltering: true,
 //  buttonWidth:'400px'
 // });


          }).fail(function(xhr, status, error) {
                 console.log(error);
            });


         }





   
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
             	 console.log(data);
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

	


var TopicId=0;
    $(document).ready(function () {
    $.ajax({ 
   url: "{{URL::to('menu-list-select')}}",
   method:"GET",
   success: function(datas)  {
    var data=$.parseJSON(datas);
    console.log(data);

for (var i = 0; i < data.length ;i++) {
    var hasChild = false;
    if (data[i].parent_id!=0) {
    for (var j = i; j < data.length ;j++) { 
    if(data[i].id == data[j].parent_id) {
        hasChild = true;
        break;
    }
}
    if(hasChild){
        $('#'+data[i].parent_id).append('<li><input type="checkbox" onClick="radioButtonClicked('+data[i].id+')" name="topictype"><label class="tree-toggler nav-header">'+data[i].name+'</label><ul class="nav nav-list tree hide" id="'+data[i].id+'"></ul></li>');
    }
        else{
        $('#'+data[i].parent_id).append('<li id="'+data[i].id+'"><input type="checkbox" class="radioTopic" onClick="radioButtonClicked('+data[i].id+')" name="topictype" id="'+data[i].id+'"><span>'+data[i].name+'</span></li>');
    }
    
     }else{
        $('.navtree').append('<li><input type="checkbox" onClick="radioButtonClicked('+data[i].id+')" name="topictype"><label class="tree-toggler nav-header">'+data[i].name+'</label><ul class="nav nav-list tree hide" id="'+data[i].id+'"></ul></li><li class="divider"></li>');
     }
}
$('label.tree-toggler').click(function () {
        $(this).parent().children('ul.tree').toggle(300);
        $(this).parent().children('ul.tree').removeClass('hide');
    });
   },
 });

   //  $("#txtnoofqustion,#txtduration,#txtpassing,#txtnoofatempts").keypress(function (e) {
   //   if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) {
   //       $(this).closest('td').find('span').text("Digits Only").show().fadeOut("slow");
   //       return false;
   //  }
   // });


});

function radioButtonClicked(id){
     document.getElementById('parent_id').value =id;
}



// Menu Test

 
 
$("ul.menu").find('> li').hover(
    function() {
        $(this).find('> ul').slideDown();
    },
    function() {
        $(this).find('> ul').hide();
    }


);

$("ul.sub-menu").find('> li').hover(
    function() {
        $(this).find('> ul').slideDown();
    },
    function() {
        $(this).find('> ul').hide();
    }
);
 

 

 

   
 
</script> 