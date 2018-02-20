
<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="javascript:void(0)">GLMS</a>
    </div>
    <ul class="nav navbar-nav">
     <!-- <li><a href="{{URL::to('index')}}">HOME</a></li>-->
    </ul>
    <form class="navbar-form navbar-right">
     <a href="{{URL::to('index')}}" style="color: #fff;">Switch To User</a>
     <span style="color: #fff"> | Welcome User</span>
    </form>
  </div>
</nav>
@include('layout.adminheader')

<style type="text/css">
  .nav {
    padding-left: 44px;
  }
</style>

<div class="col-md-9">
<center><h3><b>Add Course Topic</b></h3></center>
  <div class="well" style="width:900px; padding: 8px 0;float: left;">
    <div style="overflow-y: scroll; overflow-x: hidden; height: 350px;" id="maindiv">
      <ul class="nav nav-list navtree"></ul>
    </div>
  </div>
</div>



<div class="col-md-3">

</div>
<div class="col-md-1">
<label>Topic&nbsp;Name</label>
</div>
<form id="add_form" name="add_form" method="POST">
{{ csrf_field() }}
<div class="col-md-4">
    <input type="text" name="courseid" id="courseid">
    <input type="text" name="name" id="name" class="form-control">
</div>

<div class="col-md-3">
  <button type="button" class="btn btn-success" id="add" onclick="Validate();">ADD</button>
</div>
</form>
<script type="text/javascript">   
var TopicId=0;
    $(document).ready(function () {
    $.ajax({ 
   url: "{{URL::to('tree')}}",
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
        $('#'+data[i].parent_id).append('<li><input type="radio" onClick="radioButtonClicked('+data[i].id+')" name="topictype"><label class="tree-toggler nav-header">'+data[i].name+'</label><ul class="nav nav-list tree hide" id="'+data[i].id+'"></ul></li>');
    }
        else{
        $('#'+data[i].parent_id).append('<li id="'+data[i].id+'"><input type="radio" class="radioTopic" onClick="radioButtonClicked('+data[i].id+')" name="topictype" id="'+data[i].id+'"><span>'+data[i].name+'</span></li>');
    }
    
     }else{
        $('.navtree').append('<li><input type="radio" onClick="radioButtonClicked('+data[i].id+')" name="topictype"><label class="tree-toggler nav-header">'+data[i].name+'</label><ul class="nav nav-list tree hide" id="'+data[i].id+'"></ul></li><li class="divider"></li>');
     }
}
$('label.tree-toggler').click(function () {
        $(this).parent().children('ul.tree').toggle(300);
        $(this).parent().children('ul.tree').removeClass('hide');
    });
   },
 });

    $("#txtnoofqustion,#txtduration,#txtpassing,#txtnoofatempts").keypress(function (e) {
     //if the letter is not digit then display error and don't type anything
     if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) {
        //display error message
         $(this).closest('td').find('span').text("Digits Only").show().fadeOut("slow");
         return false;
    }
   });
});

function radioButtonClicked(id){
     document.getElementById('courseid').value =id;
}
</script>
<script type="text/javascript">
  $('#add').click(function(){
  $.ajax({  
         type: "POST",  
         url: "{{URL::to('add-tree')}}",
         data : $('#add_form').serialize(),
         success: function(data){
            if (data) {
             alert('Added course topic successfully');
              window.location.reload();
            }else{
               alert('Couldnt Add. Error In Adding');
            }
         }  
      });   
     
  });
</script>
<script src="http://code.jquery.com/jquery-1.11.2.min.js"></script>
<script type="text/javascript">

function Validate()
{
    var topictype =document.add_form.name
    if (topictype.value =="")
    {
        window.alert("Please provide Topic Name.");
    }
}
</script>