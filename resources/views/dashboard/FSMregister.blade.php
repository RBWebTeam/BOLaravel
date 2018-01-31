 @extends('include.master')
    @section('content')


 <!-- Body Content Start -->
            <div id="content" style="overflow:scroll;">
			 <div class="container-fluid white-bg">
			 <div class="col-md-12"><h3 class="mrg-btm">Register Form</h3></div>
			 <div class="col-md-12">
			 <form>
			  <ul class="nav nav-tabs nav-justified">
                <li class="active"><a data-toggle="tab" href="#home">FSM Basic Info -  &nbsp;<span class="badge">Step 1</span></a></li>
                <li><a data-toggle="tab" href="#menu1">Pincode Mapping - &nbsp;<span class="badge">Step 2</a></span></li>
                <li><a data-toggle="tab" href="#menu2">Banking Info - &nbsp;<span class="badge">Step 3</span></a></li>
              </ul>
             <div class="tab-content">
              <div id="home" class="tab-pane fade in active">
              <h4 class="text-center">FSM Basic Info</h4>
			  <div class="col-md-4 col-xs-12">
				<div class="form-group">
				 <select id="txttitle" class="selectpicker select-opt form-control" required="Yes">
			     <option selected="selected" value="0">Title</option>
		         <option value="1">Mr</option>
		         <option value="2">Mrs</option>
				 <option value="2">Ms</option>
		         </select>
				</div>
				</div>
              <div class="col-md-4 col-xs-12">
				<div class="form-group">
				<input id="txtFname" type="text" class="form-control" placeholder="First Name" required="Yes">
				</div>
				</div>
				<div class="col-md-4 col-xs-12">
				<div class="form-group">
				<input id="txtLname" type="text" class="form-control" placeholder="Last Name" required="Yes">
				</div>
				</div>
				<div class="col-md-4 col-xs-12">
				<div class="form-group">
				<input id="txtCname" type="text" class="form-control" placeholder="Company Name">
				</div>
				</div>
				<div class="col-md-4 col-xs-12">
				<div class="form-group">
				<input id="txtemail" type="email" class="form-control" placeholder="email Id" required="Yes">
				</div>
				</div>
				<div class="col-md-4 col-xs-12">
				<div class="form-group">
				<input id="txtMobile" type="number" class="form-control" placeholder="Mobile No." required="Yes">
				</div>
				</div>
				
			    <div class="col-md-4">
			    <div class="form-group">
			    <div id="datepicker" class="input-group date" data-date-format="mm-dd-yyyy">
                 <input class="form-control" type="text" placeholder="From Date">
                <span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
               </div>
               </div>
              </div>
			  <div class="col-md-4 col-xs-12">
				<div class="form-group">
				<input id="txtpan" type="text" class="form-control" placeholder="Pan Card">
				</div>
				</div>
				<div class="col-md-4 col-xs-12">
				<div class="form-group">
				<input id="txtAadhar" type="number" class="form-control" placeholder="Aadhar No.">
				</div>
				</div>
				<div class="col-md-4 col-xs-12">
				<div class="form-group">
				<input id="txtPincode"  type="number" class="form-control" placeholder="Pincode" required="Yes">
				</div>
				</div>
				<div class="col-md-4 col-xs-12">
				<div class="form-group">
				<input id="txtCity" type="text" class="form-control" placeholder="City">
				</div>
				</div>
				<div class="col-md-4 col-xs-12">
				<div class="form-group">
				<select id="txtstate" class="selectpicker select-opt form-control" required="">
					<option selected="selected" value="0">State</option>
					 @foreach($query as $val)
			     <option value="{{$val->state_id}}">{{$val->state_name}}</option>
		          @endforeach
				</select>
				</div>
				</div>
				<div class="col-md-4 col-xs-12">
				<div class="form-group">
				<select id="txtmanager" class="selectpicker select-opt form-control" required="">
					<option>--SELECT MANAGER--</option>
			   @foreach($manager as $val)
		         <option value="{{$val->mgid}}">{{$val->fullname}}</option>
	             @endforeach
				</select>
				</div>
				</div>
				
				<div class="col-md-4 col-xs-12">
				<div class="form-group">
				<div class="form-control">is Lead Recipient &nbsp; &nbsp; <input type="radio" id="txtyes" name="rdo"/>&nbsp;Yes   <input type="radio" id="txtno" name="rdo"/>&nbsp;No</div>
				</div>
				</div>
				<div class="col-md-4 col-xs-12">
				<div class="form-group">
				<select id="txtfsmtype" class="selectpicker select-opt form-control" required="">
			     <option>--SELECT FSM TYPE--</option>
	             <option>Employee</option>
	             <option>Paid Employee</option>
	             <option>Unpaid Employee</option>
				</select>
				</div>
				</div>
				</div>
			  <div id="menu1" class="tab-pane fade">
              <h4 class="text-center">Pincode Mapping</h4>
              <div class="col-md-4 col-xs-12">
				<div class="form-group">
				<select name="State" id="txtmapstate" class="selectpicker select-opt form-control" required="">
			     <option>Select State</option>
		          @foreach($query as $val)
			     <option value="{{$val->state_id}}">{{$val->state_name}}</option>
		          @endforeach
				</select>
				</div>
				</div>
				<div class="col-md-4 col-xs-12">
				<div class="form-group">
				<select name="city" id="txtmapcity" class="selectpicker select-opt form-control" required="">
			     <option>Select City</option>
		         <!-- <option>Mumbai</option> -->
				</select>
				</div>
				</div>
                <div class="col-md-8 col-xs-12">
				<div class="input-group">
                <input type="number" id="txtmappincode" class="form-control" placeholder="Pincodes">
                <span class="input-group-addon btn btn-info" id="basic-addon2">Select Pincodes</span>
                </div>
				 </div>
				 <br>
				 <div class="col-md-12"><div class="well well-sm mrg-top text-center map-pin">Map Pincodes</div></div>
				 
				 <div class="col-md-12 form-padding" id="StatesV" style="overflow-y:scroll;height:270px;">
							
                                              <div>
	                                          <table id="tblpincode" class="table table-responsive table-hover" cellspacing="0">
		                                       <tbody>
											   <tr class="headerstyle" align="center">
			                                    <th scope="col">
                                                <input  type="checkbox" class="used" id="chkselectall">
                                                <span>Select All</span>
                                                </th>
		                                       </tr>
											
		                                  
										    </tbody>
									 </table>
                                     </div>
									</div>
									
						<!-- <div class="col-md-2">
						 <input type="submit" value=">" class="btn btn-primary btn-large map-btn block">
						 <input type="submit" value=">>" class="btn btn-primary btn-large map-btn block">
						 <input type="submit" value="<" class="btn btn-primary btn-large map-btn block">
						 <input type="submit" value="<<" class="btn btn-primary btn-large map-btn block">
						</div>
						
				<div class="col-sm-5 col-xs-12 form-padding" id="StatesV" style="overflow-y:scroll;height:270px;">
							
                                              <div>
	                                          <table class="table table-responsive table-hover" cellspacing="0">
		                                       <tbody>
											   <tr class="headerstyle" align="center">
			                                    <th scope="col">
                                                <input  type="checkbox" class="used">
                                                <span>Select All</span>
                                                </th>
		                                       </tr>
											
		                                    <tr align="left">
			                               <td>
                                                <input type="hidden" value="4" class="used">
                                                <input  type="checkbox" class="used">
                                                <span>456456</span>
                                            </td>
		                                   </tr>
										    </tbody>
									 </table>
                                     </div>
									</div> -->
              </div>
			  
			  
			  
              <div id="menu2" class="tab-pane fade">
              <h4 class="text-center">Banking Info</h4>
			  
			  <div class="col-md-4 col-xs-12">
				<div class="form-group">
				<input id="txtbankacno" type="text" class="form-control" placeholder="Bank Ac No.">
				</div>
				</div>
               <div class="col-md-4 col-xs-12">
				<div class="form-group">
				<select id="txtactype" class="selectpicker select-opt form-control" required="">
			     <option selected="selected" value="0">Account Type</option>
		         <option value="1">Saving Account</option>
		         <option value="2">Current Account</option>
		 
				</select>
				</div>
				</div>
              <div class="col-md-4 col-xs-12">
				<div class="form-group">
				<input id="txtifsc" type="text" class="form-control" placeholder="IFSC Code">
				</div>
				</div>
				<div class="col-md-4 col-xs-12">
				<div class="form-group">
				<input id="txtmicr" type="text" class="form-control" placeholder="MICR Code">
				</div>
				</div>
				<div class="col-md-4 col-xs-12">
				<div class="form-group">
				<input id="txtbankno" type="text" class="form-control" placeholder="Bank Name">
				</div>
				</div>
				<div class="col-md-4 col-xs-12">
				<div class="form-group">
				<input id="txtbankbrach" type="text" class="form-control" placeholder="Bank Branch">
				</div>
				</div>
				<div class="col-md-4 col-xs-12">
				<div class="form-group">
				<input id="txtbankcity" type="text" class="form-control" placeholder="Bank City">
				</div>
				</div>
              </div>
              
            </div>
			<div class="col-md-12 col-xs-12">
				<br>
				<div class="center-obj center-multi-obj">
				<button class="common-btn">Back</button>
				 <button id="btnsubmit" class="common-btn">Submit</button>
				 </div>
				</div>
			    </form>
            </div>
			
			
			</div>
			
            </div>
            </div>

@endsection
