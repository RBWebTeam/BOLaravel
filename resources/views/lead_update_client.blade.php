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
            <input type="text" name="name" id="name"  class="form-control" >
    @if ($errors->has('name'))<label class="control-label" for="inputError"> {{ $errors->first('name') }}</label>@endif
           </div>
</div>


  <div class="form-group">
            <label for="inputEmail" class="control-label col-xs-2">Mobile</label>
            <div class="col-xs-6">
            <input type="text" name="mobile" id="mobile"  class="form-control" >
    @if ($errors->has('mobile'))<label class="control-label" for="inputError"> {{ $errors->first('mobile') }}</label>@endif
           </div>
</div>

<div class="form-group">
            <label for="inputEmail" class="control-label col-xs-2">Email</label>
            <div class="col-xs-6">
            <input type="text" name="email" id="email"  class="form-control" maxlength="10"  onkeypress="return Numeric(event)" >
    @if ($errors->has('email'))<label class="control-label" for="inputError"> {{ $errors->first('email') }}</label>@endif
           </div>
</div>
  

 <div class="form-group">
            <label for="inputEmail" class="control-label col-xs-2">DOB</label>
            <div class="col-xs-6">
             <div id="min"  class="input-group date" data-date-format="dd-mm-yyyy">
                       <input class="form-control" type="text" name="dob" placeholder="From Date"  >
                      <span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
             </div>
    @if ($errors->has('dob'))<label class="control-label" for="inputError"> {{ $errors->first('dob') }}</label>@endif
           </div>
</div>
 
   <div class="form-group">
             
                  <label for="inputEmail" class="control-label col-xs-2">Profession</label>
                  <div class="col-xs-6">
                    <input type="text" name="profession" id="profession"  class="form-control" >
                  </div>

                  
  </div>

 
 <div class="form-group">
                  <label for="inputEmail" class="control-label col-xs-2">Monthly income</label>
                  <div class="col-xs-6">
                    <input type="text" name="monthly_income" id="monthly_income"  class="form-control" >
                  </div>
        </div>
 
<div class="form-group">
            <label for="inputEmail" class="control-label col-xs-2">State </label>
            <div class="col-xs-6">
 <select class="form-control  search_state " name="state_id"   placeholder="Search State" id="search_state" required></select>

           </div>
</div>

<div class="form-group">
            <label for="inputEmail" class="control-label col-xs-2">City </label>
            <div class="col-xs-6">
            <select class="form-control  search_district " name="city_id"   placeholder="Search State" id="search_district" required> </select>
           </div>
</div>

 <div class="form-group">
                  <label for="inputEmail" class="control-label col-xs-2">Pan No</label>
                  <div class="col-xs-6">
                    <input type="text" name="pan_no" id="pan_no"  class="form-control" oninput="pan_card('pan_no')" maxlength="10"  >
                    <span id="pan_number" style="display:none;color: red;">Oops.Please Enter Valid Pan Number.!!</span>
                  </div>
        </div> 


          <div class="form-group">
                  <label for="inputEmail" class="control-label col-xs-2">Address</label>
                  <div class="col-xs-6">
                    <input type="text" name="address" id="address"  class="form-control" >
                  </div>
        </div> 


          <div class="form-group">
                  <label for="inputEmail" class="control-label col-xs-2">Pin code</label>
                  <div class="col-xs-6">
                    <input type="text" name="pincode" id="pincode_id"  onkeypress="return Numeric(event)"  class="form-control" >
                  </div>
        </div> 

 

           <div class="form-group">
                  <label for="inputEmail" class="control-label col-xs-2">Campaign</label>
                  <div class="col-xs-6">
                    <input type="text" name="campaign" id="campaign"  class="form-control" >
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
            