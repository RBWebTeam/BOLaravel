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
            <input type="text" name="UserName" id="UserName"  class="form-control" value="{{ old('UserName')}}">
    @if ($errors->has('UserName'))<label class="control-label" for="inputError"> {{ $errors->first('UserName') }}</label>@endif
           </div>
</div>

  <div class="form-group">
            <label for="inputEmail" class="control-label col-xs-2">Email</label>
            <div class="col-xs-6">
            <input type="text" name="email" id="email"  class="form-control" value="{{ old('email')}}" >
    @if ($errors->has('email'))<label class="control-label" for="inputError"> {{ $errors->first('email') }}</label>@endif
           </div>
</div>

<div class="form-group">
            <label for="inputEmail" class="control-label col-xs-2">Mobile</label>
            <div class="col-xs-6">
            <input type="text" name="mobile" id="mobile"  value="{{ old('mobile')}}"  class="form-control" maxlength="10"  onkeypress="return Numeric(event)" >
    @if ($errors->has('mobile'))<label class="control-label" for="inputError"> {{ $errors->first('mobile') }}</label>@endif
           </div>
</div>
  

 <div class="form-group">
            <label for="inputEmail" class="control-label col-xs-2">UID</label>
            <div class="col-xs-6">
            <input type="text" name="uid" id="uid" value="{{ old('uid')}}" class="form-control" >
    @if ($errors->has('uid'))<label class="control-label" for="inputError"> {{ $errors->first('uid') }}</label>@endif
           </div>
</div>
 

<div class="form-group">
            <label for="inputEmail" class="control-label col-xs-2">Company </label>
            <div class="col-xs-6">
          
             <select name="company_id" id="company_id"  class="form-control"  >
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
            <div class="col-xs-6" >
 
 <select class="form-control  search_state search_state_error" name="state_id"    placeholder="Search State" id="search_state"  ></select>
 <label class="control-label" for="inputError" id="error_state"> </label>
           </div>
</div>

<div class="form-group">
            <label for="inputEmail" class="control-label col-xs-2">City </label>
            <div class="col-xs-6">
            <select class="form-control  search_district " name="city_id"     placeholder="Search State" id="search_district"  > </select>
              <label class="control-label" for="inputError" id="error_city"> </label>
           </div>
</div>


 

<div class="form-group">
            <label for="inputEmail" class="control-label col-xs-2">UserType      </label>
            <div class="col-xs-6">
          
             <select name="menu_group" id="menu_group"  class="form-control"  >
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
            <input type="text" name="password" id="password"  class="form-control" value="{{ old('password')}}">
    @if ($errors->has('password'))<label class="control-label" for="inputError"> {{ $errors->first('password') }}</label>@endif
           </div>
</div>


<div class="form-group">
            <label for="inputEmail" class="control-label col-xs-2">Confirm Password</label>
            <div class="col-xs-6">
            <input type="text" name="cpassword" id="cpassword"  class="form-control" value="{{ old('cpassword')}}">
    @if ($errors->has('cpassword'))<label class="control-label" for="inputError"> {{ $errors->first('cpassword') }}</label>@endif
           </div>
</div>


<div class="form-group">
            <label for="inputEmail" class="control-label col-xs-2"></label>
            <div class="col-xs-6">
             <button type="submit" class="btn btn-default" id="register_user_id">Submit</button>
            </div>
</div>


</form>

            </div>



            <script type="text/javascript">
                
  
  $(document).on('click','#register_user_id',function(){



      if($('.search_state_error').val()==0){
          $('#error_state').text('The State field is required');
         return  false;
      }
      if($('#search_district').val()==0){
          $('#error_city').text('The City field is required');
         return  false;
      }


  })
            </script>
					    
@endsection		
            