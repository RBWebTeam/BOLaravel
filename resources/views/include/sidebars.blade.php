<?php  use App\Http\Controllers\InitialController; $cl=new InitialController(); ?>
<div class="scrolling">
<nav id="sidebar">
<ul class="nav nav-list" style="width: auto; ">                       
<?php echo $cl->user_right_group_menu();?>              
</ul>
     </nav>
     </div>
<script type="text/javascript" src="{{url('javascripts/jquery.min.js')}}"></script>
<script type='text/javascript'>
$(document).ready(function() {
$('.tree-toggle').click(function () {
$(this).parent().children('ul.tree').toggle(200);
});
$(function(){
$('.tree-toggle').parent().children('ul.tree').toggle(200);
})   
});
</script>