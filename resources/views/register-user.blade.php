@extends('include.master')
@section('content')
            
@if(Session::has('message'))
<p class="alert alert-info">{{ Session::get('message') }}</p>
@endif

             <div class="container-fluid white-bg">
				<div class="col-md-12"><h3 class="mrg-btm">REGISTER USER</h3></div>


<form class="form-horizontal"  method="post" action="{{url('register-user-save')}}" >{{ csrf_field() }}
   
 <div class="form-group">
            <label for="inputEmail" class="control-label col-xs-2">Name</label>
            <div class="col-xs-6">
            <input type="text" name="UserName" id="UserName"  class="form-control" >
    @if ($errors->has('UserName'))<label class="control-label" for="inputError"> {{ $errors->first('UserName') }}</label>@endif
           </div>
</div>

  <div class="form-group">
            <label for="inputEmail" class="control-label col-xs-2">Email</label>
            <div class="col-xs-6">
            <input type="text" name="email" id="email"  class="form-control" >
    @if ($errors->has('email'))<label class="control-label" for="inputError"> {{ $errors->first('email') }}</label>@endif
           </div>
</div>

<div class="form-group">
            <label for="inputEmail" class="control-label col-xs-2">Mobile</label>
            <div class="col-xs-6">
            <input type="text" name="mobile" id="mobile"  class="form-control" maxlength="10"  onkeypress="return Numeric(event)" >
    @if ($errors->has('mobile'))<label class="control-label" for="inputError"> {{ $errors->first('mobile') }}</label>@endif
           </div>
</div>
  

 <div class="form-group">
            <label for="inputEmail" class="control-label col-xs-2">UID</label>
            <div class="col-xs-6">
            <input type="text" name="uid" id="uid"  class="form-control" >
    @if ($errors->has('uid'))<label class="control-label" for="inputError"> {{ $errors->first('uid') }}</label>@endif
           </div>
</div>
  
<!-- <div class="form-group">
            <label for="inputEmail" class="control-label col-xs-2">EmpID</label>
            <div class="col-xs-6">
            <input type="text" name="EmpID" id="EmpID"  class="form-control" >
    @if ($errors->has('EmpID'))<label class="control-label" for="inputError"> {{ $errors->first('EmpID') }}</label>@endif
           </div>
</div> -->
  

<div class="form-group">
            <label for="inputEmail" class="control-label col-xs-2">Company </label>
            <div class="col-xs-6">
          
             <select name="company_id" id="company_id"  class="form-control">
             	<option value="0">-Select-</option>
             	<option value="1">RupeeBoss</option>
             	<option value="2">Datacom</option>
             	<option value="3">PolicyBoss</option>
             	<option value="4">LandMark</option>
             </select>
    @if ($errors->has('company_id'))<label class="control-label" for="inputError"> {{ $errors->first('company_id ') }}</label>@endif
           </div>
</div>

<div class="form-group">
            <label for="inputEmail" class="control-label col-xs-2">ReportingID </label>
            <div class="col-xs-6">
          
             <select name="reporting_id" id="reporting_id"  class="form-control">
             	<option value="0">-Select-</option>
             	<option value="1">RupeeBoss</option>
             	<option value="2">Datacom</option>
             	<option value="3">PolicyBoss</option>
             	<option value="4">LandMark</option>
             </select>
    @if ($errors->has('reporting_id'))<label class="control-label" for="inputError"> {{ $errors->first('reporting_id ') }}</label>@endif
           </div>
</div>
 
<div class="form-group">
            <label for="inputEmail" class="control-label col-xs-2">State </label>
            <div class="col-xs-6">
          
         <!--     <select name="state_id" id="state_id"  class="form-control">
             	<option value="0">-Select-</option>
             	 @foreach($state as $val)
                <option value="{{$val->state_id}}">{{$val->state_name}}</option>
             	 @endforeach
             </select> -->
 <select class="form-control  search_state " name="state_id"   placeholder="Search State" id="search_state" required></select>
             
    <!-- @if ($errors->has('state_id'))<label class="control-label" for="inputError"> {{ $errors->first('state_id ') }}</label>@endif -->
           </div>
</div>

<div class="form-group">
            <label for="inputEmail" class="control-label col-xs-2">City </label>
            <div class="col-xs-6">
            <select class="form-control  search_district " name="city_id"   placeholder="Search State" id="search_district" required> </select>


             <!-- <select name="city_id" id="city_id"  class="form-control">
             	<option value="0">-Select-</option>
             	 @foreach($city as $val)
                <option value="{{$val->DCCityID}}">{{$val->CityName}}</option>
             	 @endforeach
             </select> -->
   <!--  @if ($errors->has('city_id'))<label class="control-label" for="inputError"> {{ $errors->first('city_id ') }}</label>@endif -->
           </div>
</div>


<div class="form-group">
            <label for="inputEmail" class="control-label col-xs-2">UserType     </label>
            <div class="col-xs-6">
          
             <select name="user_type" id="user_type"  class="form-control">
             	<option value="0">-Select-</option>
             	 @foreach($user_type as $val)
                <option value="{{$val->id}}">{{$val->name}}</option>
             	 @endforeach
             </select>
    @if ($errors->has('user_type'))<label class="control-label" for="inputError"> {{ $errors->first('user_type ') }}</label>@endif
           </div>
</div>



<div class="form-group">
            <label for="inputEmail" class="control-label col-xs-2">UserGroup      </label>
            <div class="col-xs-6">
          
             <select name="menu_group" id="menu_group"  class="form-control">
             	<option value="0">-Select-</option>
             	 @foreach($menu_group as $val)
                <option value="{{$val->id}}">{{$val->name}}</option>
             	 @endforeach
             </select>
    @if ($errors->has('menu_group'))<label class="control-label" for="inputError"> {{ $errors->first('menu_group ') }}</label>@endif
           </div>
</div>

<div class="form-group">
            <label for="inputEmail" class="control-label col-xs-2">Password</label>
            <div class="col-xs-6">
            <input type="text" name="password" id="password"  class="form-control" >
    @if ($errors->has('password'))<label class="control-label" for="inputError"> {{ $errors->first('password') }}</label>@endif
           </div>
</div>


<div class="form-group">
            <label for="inputEmail" class="control-label col-xs-2">Confirm Password</label>
            <div class="col-xs-6">
            <input type="text" name="cpassword" id="cpassword"  class="form-control" >
    @if ($errors->has('cpassword'))<label class="control-label" for="inputError"> {{ $errors->first('cpassword') }}</label>@endif
           </div>
</div>


<div class="form-group">
            <label for="inputEmail" class="control-label col-xs-2"></label>
            <div class="col-xs-6">
             <button type="submit" class="btn btn-default">Submit</button>
            </div>
</div>


</form>

            </div>
					    
@endsection		
            