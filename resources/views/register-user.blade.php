@extends('include.master')
@section('content')
            
@if(Session::has('message'))
<p class="alert alert-info">{{ Session::get('message') }}</p>
@endif

             <div class="container-fluid white-bg">
				<div class="col-md-12"><h3 class="mrg-btm">REGISTER USER</h3></div>
				<form method="post" action="{{url('register-user-save')}}">
				{{csrf_field()}} 
                <div class="col-md-4 col-xs-12">
				<div class="form-group">
				<input type="text" class="form-control" name="username" id="username" placeholder="Name"  />
				@if ($errors->has('username'))<label class="control-label" for="inputError"> {{ $errors->first('username') }}</label>  @endif
				</div>
				</div>
				
				<div class="col-md-4 col-xs-12">
				<div class="form-group">
				<input type="email" class="form-control" name="Emailid" id="Emailid"  placeholder="Email Id"/>
				@if ($errors->has('Emailid'))<label class="control-label" for="inputError"> {{ $errors->first('Emailid') }}</label>  @endif
				</div>
				</div>
				
				<div class="col-md-4 col-xs-12">
				<div class="form-group">
				<input type="password" class="form-control" name="password" id="password" placeholder="Password" />
				@if ($errors->has('password'))<label class="control-label" for="inputError"> {{ $errors->first('password') }}</label>  @endif
				</div>
				</div>
				
				<div class="col-md-4 col-xs-12">
				<div class="form-group">
				<input type="password" class="form-control" name="confirm_password" id="password2"   placeholder="Confirm Password" />
				</div>

				@if ($errors->has('confirm_password'))<label class="control-label" for="inputError"> {{ $errors->first('confirm_password') }}</label>  @endif
				</div>
				
			    <div class="col-md-4 col-xs-12">
				<div class="form-group">
				<select class="selectpicker select-opt form-control" name="employetype" id="employetype" required="">
				 <option value="1">Authorities </option>
								<option value="1">SUB CATEGORIES</option>
								<option value="2">HEALTH INSURANCE</option>
								<option value="3">MOTOR INSURANCE</option>
								<option value="4">TRAVEL INSURANCE</option>
								<option value="5">HOME LOAN</option>
								<option value="6">PERSONAL LOAN</option>
								<option value="7">LOAN AGAINST PROPERTY</option>
				</select>
				</div>
				</div>
				
				
				<div class="form-group">
                    <div class="col-xs-12 form-padding top-lead">
                    <div class="col-sm-6 col-xs-12 form-padding" id="AuthorityV" style="overflow-y:scroll;height:270px;">
							<div>
	<table class="table table-responsive table-hover reg-tabl" cellspacing="0">
		                             <tbody>
		                             <tr class="headerstyle" align="center">
			                         <th scope="col">
                                     <input type="checkbox" class="used" style="width: auto; float: left; display: inline-block; margin-right: 16px;">
                                     <span>AUTHORITIES</span>
                                     </th>
		                             </tr>
		                             @foreach($AUTHORITIES as $row)
		                             <tr align="left tr-css">
			                         <td>
                                     <input name="authorise" type="hidden" value="20" class="used">
                                     <input type="checkbox" class="used" name="author[]" value="{{ $row->Id }}">
                                     <span>{{ $row->Menu }}</span>
                                     </td>
		                             </tr>
		                              @endforeach
		                                 
                                      </tbody></table>
                                      </div>
                                      </div>

                        <div class="col-sm-6 col-xs-12 form-padding" id="StatesV" style="overflow-y:scroll;height:270px;">
							
                      <div>
	                  <table class="table table-responsive table-hover" cellspacing="0">
		              <tbody>
					  <tr class="headerstyle" align="center">
			          <th scope="col">
                      <input  type="checkbox" class="used">
                       <span>States</span>
                                      
		                                    @foreach($query as $row)
											  <tr align="left">
			                                  <td>
                                              <input type="hidden" value="18" class="used">
                                              <input name="txtstate[]" type="checkbox" class="used" value="{{$row->state_id}}">
                                              <span>{{ $row->state_name}}</span>
                                              </td>
		                                      </tr>
		                                      @endforeach
											
	                                 </tbody>
									 </table>
                                     </div>
                                
                                </div>
                        </div>
                    </div>
				
				<div class="col-md-12 col-xs-12">
				<br>
				 <input type="submit" class="btn btn-default submit-btn border">
				</div>
				</form>



            </div>
					    
@endsection		
            