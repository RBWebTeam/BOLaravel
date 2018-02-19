@extends('include.master')
@section('content')


			 <div class="container-fluid white-bg">
			 <div class="col-md-12"><h3 class="mrg-btm">Bank offer</h3></div>
			 <form method="post" action="">

			    <div class="col-md-4 col-xs-12">
				<div class="form-group">
				<input type="text" name="message" id="message" class="form-control" placeholder="MessageTitle" />
                </div>
				</div>

			    <div class="col-md-4 col-xs-12">
				<div class="form-group">
				<select  multiple="multiple" id="lstStates"  name="lstStates" class="selectpicker select-opt form-control" required>
                <!--  <span>States</span> -->
			     @foreach($state as $val)
		         <option value="1">{{$val->state_name}}</option>                 
		         @endforeach
		         </select>
                 </div>
				 </div>

				<div class="col-md-4 col-xs-12">
				<div class="form-group">
				<select multiple="multiple" id="city" name="city" class="selectpicker select-opt form-control" required>
                <option value="0">Select City</option>
			    @foreach($query as $val) 
		         <option value="2">{{$val->cityname}}</option>
		        @endforeach
		        </select>
				</div>
				</div>

				<div class="col-md-4 col-xs-12">
				<div class="form-group">
				<select multiple="multiple" id="pincode" name="pincode" class="selectpicker select-opt form-control" required>
                <option selected="selected" value="0">Select Pin code</option>
			     @foreach($pincode as $val)
		         <option value="3">{{$val->pincode}}</option>
		         @endforeach
		         </select>
			 	 </div>
			 	 </div>
				
                 <div class="col-md-4 col-xs-12">
	             <div class="form-group">
		         <input type="file" class="form-control" placeholder='Choose a file...' required/>
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
				 <button id="subbutton" class="common-btn">Submit</button>
			     </div>
				 </div>

			 </form>
			 </div>
        


@endsection

