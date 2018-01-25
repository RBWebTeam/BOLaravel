		@extends('include.master')
					@section('content')
					        


	
<body>


    <!-- Sidebar End -->
           
		   
		   
		   <!-- Body Content Start ---->
            <div id="content" style="overflow:scroll"; >
			 <div class="container-fluid white-bg">
			 <div class="col-md-12"><h3 class="mrg-btm">LEAD DETAILS</h3></div>
			 <!-- Filter End -->
			 <div class="col-md-12">
			 <div class="panel panel-primary">
			 <div class="panel-heading">
						<h3 class="modal-title">Filter</h3>
						<div class="pull-right">
							<span class="clickable filter" data-toggle="tooltip" data-container="body">
							<span class="glyphicon glyphicon-plus mrg-tp-forteen"></span> &nbsp;&nbsp;
								<span class="glyphicon glyphicon-filter glyphicon1"></span>
							</span>
						</div>
					</div>
					<div class="panel-body filter-bdy" style="display:none">
						<input type="text" class="form-control" id="dev-table-filter" data-action="filter" data-filters="#dev-table" placeholder="Search..." />
					</div>
			 </div>
			 </div>



			 <!-- Filter End -->
			 <div class="col-md-12">
			 <div class="overflow-scroll">
			 <div class="table-responsive" >
				<table class="table table-bordered table-striped tbl" id="dev-table" >
                 <thead>
                  <tr>
                   <th>Full Name</th>
                   <th>Created Date</th>
                   <th>Mobile No1</th>
                   <th>Mobile No2</th>
				    
				   <th>Address1</th>
                   <th>Address2</th>
                   <th>Address3</th>
                   <th> Email Id</th>
                   <th>City</th>
				   
				   <th>Pincode</th>
                   <th>State</th>
                   <th>Introducer Name</th>
                   <th>Lead Type</th>
                 <th> Lead Status</th>

				   
                 </tr>
                </thead>
                <tbody>
					
					          @foreach($query as $val)
					                 <tr>
					                  <td><?php echo $val->FullName; ?></td>
					                  <td><?php echo $val->createdate; ?></td>
					                  <td><?php echo $val->MobiNumb1; ?></td>
					                  <td><?php echo $val->MobiNumb2; ?></td>
					                  <td><?php echo $val->Address1; ?></td>
					                  <td><?php echo $val->Address2; ?></td>
					                  <td><?php echo $val->Address3; ?></td>
					                    <td> <?php echo $val->emailid;?></td>
					                  <td><?php echo $val->City; ?></td>
					                
					                   <td><?php echo $val->Pincode; ?></td>
					                    <td><?php echo $val->state; ?></td>
					                  <td><?php echo $val->IntroName; ?></td>
					                  
					                 <td><?php echo $val->LeadType; ?></td>
					                 
					                   
                                 <td><?php echo $val->LeadCurrentState; ?></td>


                         <td>     
<!-- Button trigger modal -->
<a href="#myModal" <?php echo $val->LeadCurrentState; ?>  class="btn"></a> </td>   
					                  
                                    </tr>
					               @endforeach
					               
					             </tbody>
            </table>
			</div>
			</div>
			<!-- Pagination Start -->
			<div>
			<h5 class="pull-left"><b>Records :</b> <span>1 to 10 </span>Of <span class="badge">186</span><h5>
			<ul class="pagination pull-right">
              <li><a href="#">1</a></li>
              <li><a href="#">2</a></li>
              <li><a href="#">3</a></li>
              <li><a href="#">4</a></li>
              <li><a href="#">5</a></li>
            </ul>
			</div>
			<!-- Pagination End -->
			</div>
			<div class="col-md-12"><button class="common-btn center-obj">EXPORT TO EXCEL</button></div>
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
