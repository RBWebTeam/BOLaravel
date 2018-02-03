@extends('include.master')
 @section('content')
<!-- Body Content Start -->
            <div id="content" style="overflow:scroll;">
			 <div class="container-fluid white-bg">
			 <div class="col-md-12"><h3 class="mrg-btm">SEND SMS</h3></div>
			 <!-- Date Start -->
			 
		   
				<div class="col-md-12 col-xs-12">
				<div class="form-group col-md-4">
				<select id="smslist" class="selectpicker select-opt form-control" required="" onchange="function">
			     <option>-- Select Recipient --</option>
		         <option value="1">FBA</option>
				 <option value="2">FSM</option>
				 <option value="3">FBA POSP</option>
				</select>
				</div>
				</div>

				<div class="col-sm-6 col-xs-12 form-padding" id="StatesV" style="overflow-y:scroll;height:270px;">
							
                                              <div>
	                                          <table class="table table-responsive table-hover" cellspacing="0">
		                                       <tbody>
											<tr class="headerstyle" align="center">
			                                    <th scope="col">
                                                <input type="checkbox" class="used" style="width: auto; float: left; display: inline-block; margin-right: 16px;">
                                                <span>RECIPIENTS</span>
												<div class="search-container">
                                                <form action="/action_page.php">
                                                <input type="text" placeholder="Search.." name="search">
                                                <button type="submit"><i class="fa fa-search"></i></button>
                                                 </form>
												 </div>
                                               </th>
		                                       </tr>
		                                 <!--    <tr align="left">		
			                               <td>
                                                <input type="hidden" value="4" class="used">
                                                <input  type="checkbox" class="used">
                                                <span>PRASANNAA DEVADIGGA : 9820030969</span>
                                            </td>
		                                   </tr> -->

		                                    @foreach($query as $val)  
		                                     <tr>
                                             <td><?php echo $val->FBAID; ?></td> 
                                             <td><?php echo $val->SMId; ?></td>
                                             </tr>
                                             @endforeach

                                      </tbody>
									  </table>
                                      </div>
									  </div>
			
				<div class="col-sm-6 col-xs-12 form-padding">
	                           <textarea style="padding:10px; height:200px;">Type SMS</textarea>
				               <div class="center-obj pull-left">
				                <button class="common-btn">SEND</button>
                                     </div>
									</div>
					
		
			
            </div>
            </div>
			<!-- Body Content Start -->
			 @endsection