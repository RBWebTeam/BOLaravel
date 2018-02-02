	@extends('include.master')
    @section('content')

<!-- Body Content Start -->
            <div id="content" style="overflow:scroll;">
			 <div class="container-fluid white-bg">
			 <div class="col-md-12"><h3 class="mrg-btm">GENERATE LEAD</h3></div>
			 <!-- Date Start -->
			 
		   <div class="col-md-12 col-xs-12">
				<div class="form-group">
				<h5 class="text-center"><span>LEAD SOURCE</span></h5>
				</div>
				</div>
				<div class="col-md-6 col-xs-12">
				<div class="form-group">
				<select name="txtleadsource" class="selectpicker select-opt form-control" required="">
			     <option value="Mobile">Mobile</option>
		         <option value="Facebook">Facebook</option>
				 <option value="Magic Gyan">Magic Gyan</option>
				 <option value="Other">Other</option>
				</select>
				</div>
				</div>
				
				<div class="col-md-6 col-xs-12">
				<div class="form-group">
				<div class="form-control"><input type="radio" name="rdo" />&nbsp;&nbsp;FSM <input type="radio" name="rdo" />&nbsp;&nbsp;FBA</div>
				</div>
				</div>
				
				<div class="col-md-4 col-xs-12">
				<div class="form-group">
				<input name="txtfirstname" type="text" class="form-control" placeholder="First Name">
				</div>
				</div>
				<div class="col-md-4 col-xs-12">
				<div class="form-group">
				<input name="txtlastname" type="text" class="form-control" placeholder="Last Name">
				</div>
				</div>
				<div class="col-md-4 col-xs-12">
				<div class="form-group">
				<input name="txtmobi1" type="text" class="form-control" placeholder="Mobile 1">
				</div>
				</div>
				<div class="col-md-4 col-xs-12">
				<div class="form-group">
				<input name="txtmobi2" type="text" class="form-control" placeholder="Mobile 2">
				</div>
				</div>
				<div class="col-md-4 col-xs-12">
				<div class="form-group">
				<input name="txtemail" type="email" class="form-control" placeholder="Email Id">
				</div>
				</div>
				<div class="col-md-4 col-xs-12">
				<div class="form-group">
				<input name="txtaddress1" type="text" class="form-control" placeholder="Address 1">
				</div>
				</div>
				<div class="col-md-4 col-xs-12">
				<div class="form-group">
				<input name="txtaddress2" type="text" class="form-control" placeholder="Address 2">
				</div>
				</div>
				<div class="col-md-4 col-xs-12">
				<div class="form-group">
				<input name="txtaddress3" type="text" class="form-control" placeholder="Address 3">
				</div>
				</div>
				<div class="col-md-4 col-xs-12">
				<div class="form-group">
				<input name="txtpincode" type="number" class="form-control" placeholder="Pincode">
				</div>
				</div>
				<div class="col-md-4 col-xs-12">
				<div class="form-group">
				<input name="txtcity" type="text" class="form-control" placeholder="City">
				</div>
				</div>
				<div class="col-md-4 col-xs-12">
				<div class="form-group">
				<select name="txtstate" class="selectpicker select-opt form-control" required="">
			     <option selected="selected" value="0">State</option>
				 @foreach($state as $val)
			     <option value="{{$val->state_id}}">{{$val->state_name}}</option>
		          @endforeach
				</select>
				</div>
				</div>
				<div class="col-md-4 col-xs-12">
				<div class="form-group">
				<div class="form-control">Is ARN&nbsp;&nbsp;&nbsp;<input type="radio" name="rdoARN" />&nbsp;&nbsp;Yes <input type="radio" name="rdoARN" />&nbsp;&nbsp;No</div>
				</div>
				</div>
				
				
				<div class="col-md-4 col-xs-12">
				<div class="form-group">
				<div class="form-control">Is Life Agent&nbsp;&nbsp;&nbsp;<input type="radio" name="rdolifeagent" />&nbsp;&nbsp;Yes <input type="radio" name="rdolifeagent" />&nbsp;&nbsp;No</div>
				</div>
				</div>
				<div class="col-md-4 col-xs-12">
				<div class="form-group">
				<div class="form-control">AgentType&nbsp;&nbsp;&nbsp;<input type="radio" name="rdoagenttype" />&nbsp;&nbsp;is OD <input type="radio" name="rdoagenttype" />&nbsp;&nbsp;Is CLIA</div>
				</div>
				</div>
				<div class="col-md-4 col-xs-12">
				<div class="form-group">
				<div class="form-control">Is General Agent&nbsp;&nbsp;&nbsp;<input type="radio" name="rdoisgagent" />&nbsp;&nbsp;Yes <input type="radio" name="rdoisgagent" />&nbsp;&nbsp;No</div>
				</div>
				</div>
				
				<div class="col-sm-4 col-xs-12 form-padding" id="StatesV" style="overflow-y:scroll;height:270px;">
							
                                              <div>
	                                          <table class="table table-responsive table-hover" cellspacing="0">
		                                       <tbody>
											
		                                    <tr align="left">
			                               <td>
                                                <input type="hidden" value="4" class="used">
                                                <input  type="checkbox" class="used">
                                                <span>Bajaj</span>
                                            </td>
		                                   </tr>
										    </tbody>
									 </table>
                                     </div>
									</div>
				<div class="col-md-4"></div>
				<div class="col-sm-4 col-xs-12 form-padding" id="StatesV" style="overflow-y:scroll;height:270px;">
							
                                              <div>
	                                          <table class="table table-responsive table-hover" cellspacing="0">
		                                       <tbody>
											
		                                    <tr align="left">
			                               <td>
                                                <input type="hidden" value="4" class="used">
                                                <input  type="checkbox" class="used">
                                                <span>Bajaj</span>
                                            </td>
		                                   </tr>
										    </tbody>
									 </table>
                                     </div>
									</div>
					
		
			    <div class="col-md-12 col-xs-12">
				<br>
				<div class="center-obj center-multi-obj">
				<a href="lead-details" class="common-btn">Back</a>
				 <button class="common-btn" id="btnsubmit">Submit</button>
				 </div>
				</div>
            </div>
            </div>
			<!-- Body Content End -->
@endsection