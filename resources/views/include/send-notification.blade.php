   @extends('include.master')
					@section('content')
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

        @endsection	
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
