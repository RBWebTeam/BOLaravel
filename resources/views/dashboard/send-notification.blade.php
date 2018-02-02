@extends('include.master')
        @include('include.script')
        @section('content')

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">

        <title>Finmart Home page</title>
        <!-- Our Custom CSS -->
       <link type="text/css" rel="stylesheet" href="css/sidebar.css">
		<link type="text/css" rel="stylesheet" href="css/bootstrap.min.css"> 
	<link type="text/css" rel="stylesheet" href="css/style.css">
	<link type="text/css" href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap-glyphicons.css" rel="stylesheet">
	<script type="text/javascript" src="js/jquery.min.js"></script>
  <script type="text/javascript" src="js/bootstrap.min.js"></script>
 <script type="text/javascript" src="css/filter.js"></script>
 <link type="text/css" rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
 <script type="text/javascript" src="js/bootstrap-datepicker.js"></script>
 <link href="css/datepicker.css" rel="stylesheet" type="text/css" />
<script>
$(document).ready(function(){
    $(".fltr-tog").click(function(){
        $(".filter-bdy").toggle();
    });
});
</script>
  <script>
function myFunction(x) {
   x.classList.toggle("change");
}
</script>

<script>
$(document).ready(function(){
    $(".search-btn").click(function(){
        $(".search-dv").toggle("slow");
    });
});
</script>

<script>
  $(function () {
  $("#datepicker").datepicker({ 
        autoclose: true, 
        todayHighlight: true
  }).datepicker('update', new Date());
});
</script>
<script>
  $(function () {
  $("#datepicker1").datepicker({ 
        autoclose: true, 
        todayHighlight: true
  }).datepicker('update', new Date());
});
</script>
  
</head>
	
	
<body>
<!-- Header Start--------------------------->
<div class="container-fluid hedr">
<div class="col-md-1 col-xs-1 no-mob-pad">
<div id="sidebarCollapse" class="menu-btn" onclick="myFunction(this)">
  <div class="bar1"></div>
  <div class="bar2"></div>
  <div class="bar3"></div>
  </div>
</div>

<div class="col-md-2 col-xs-4 no-mob-pad"><img src="images/logo1.png" class="img-responsive logo pull-left"/></div>

<div class="col-md-3">
<div class="search-dv pull-left">
<div class="input-group">
<input type="text" value="" class="search" placeholder="Search dashboard...">
<span class="input-group-btn"><button type="button" class="btn btn-primary">Go</button></span>
</div>
</div>
</div>

<div class="col-md-5 col-xs-5 no-mob-pad">
<div class="pull-right log-txt">
<p><span class="hidden-xs">Welcome </span><b>Mr. Yogaraj Patel</b></p>
<p><span class="hidden-xs">Last login - Date / Time :</span> <b>22-09-2017 / 12.45 pm</b></p>
</div>
</div>

<div class="col-md-1 col-xs-2 no-mob-pad"><a href="#" class="pull-right log-btn"><span class="logout-btn"><img src="images/icon/exit.png"></span></a></div>
<span class="search-btn hidden-md hidden-lg pull-right"><img src="images/icon/search.png"></span>
</div>
<!-- Header End--------------------------->

<!-- Wrapper Div End ---->
 <div class="wrapper">
 <!-- Sidebar Start -->
   
    <!-- Sidebar End -->
           
		   
		   
		   <!-- Body Content Start ---->
            <div id="content" style="overflow:scroll;">
			 <div class="container-fluid white-bg">
			 <div class="col-md-12"><h3 class="mrg-btm">Send Notification</h3></div>
			<form method="post" action="">
			    <div class="col-md-6 col-xs-12">
				<div class="form-group">
				<select class="selectpicker select-opt form-control" required>
			     <option selected="selected" value="0">-SELECT-</option>
		         <option value="1">STATE</option>
		         <option value="2">CITY</option>
		         <option value="3">PINCODE</option>
		         <option value="4">SALES MANAGER</option>
		         <option value="5">AREA MANAGER</option>
		         <option value="6">FBA</option>
				</select>
				</div>
				</div>
				
                <div class="col-md-6 col-xs-12">
				<div class="form-group">
				<input type="text" class="form-control" placeholder="Search Criteria"/>
				</div>
				</div>
				
				<div class="col-md-6 col-xs-12">
				<div class="form-group">
				<input type="text" class="form-control" placeholder="Notification Title" />
				</div>
				</div>
				
				<div class="col-md-6 col-xs-12">
	             <div class="form-group">
		         <div class="input-group input-file" name="Fichier1">
    		    <input type="text" class="form-control" placeholder='Choose a file...' required/>			
                <span class="input-group-btn">
        		<button class="btn btn-info btn-choose" type="button"> Browse</button>
    		    </span>
		        </div>
	            </div>
				</div>
				
				<div class="col-md-12 col-xs-12">
				<div class="text-area padding">
				<textarea required>Message...</textarea>
				</div>
				</div>
				
				<div class="col-md-12 col-xs-12">
				<br>
				<div class="center-obj center-multi-obj">
				<button class="common-btn">Back</button>
				 <button class="common-btn">Submit</button>
				 <button class="common-btn">Modify</button>
				 </div>
				</div>
				
				
			
			 </form>
			
			
			
            </div>
            </div>
			<!-- Body Content Start ---->
			
			
			
			
        </div>
     <!-- Wrapper Div End ---->

         <script type="text/javascript">
             $(document).ready(function () {
                 $('#sidebarCollapse').on('click', function () {
                     $('#sidebar').toggleClass('active');
                 });
             });
         </script>
		 
		 <script>
		    function bs_input_file() {
	$(".input-file").before(
		function() {
			if ( ! $(this).prev().hasClass('input-ghost') ) {
				var element = $("<input type='file' class='input-ghost' style='visibility:hidden; height:0'>");
				element.attr("name",$(this).attr("name"));
				element.change(function(){
					element.next(element).find('input').val((element.val()).split('\\').pop());
				});
				$(this).find("button.btn-choose").click(function(){
					element.click();
				});
				$(this).find("button.btn-reset").click(function(){
					element.val(null);
					$(this).parents(".input-file").find('input').val('');
				});
				$(this).find('input').css("cursor","pointer");
				$(this).find('input').mousedown(function() {
					$(this).parents('.input-file').prev().click();
					return false;
				});
				return element;
			}
		}
	);
}
$(function() {
	bs_input_file();
});
		 </script>
    </body>
</html>
@endsection