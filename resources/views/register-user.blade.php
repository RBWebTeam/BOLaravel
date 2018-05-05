@extends('include.master')
@section('content')
@if(Session::has('message'))
<div class="alert alert-success alert-dismissible">

<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
<p class="alert alert-success">{{ Session::get('message') }}</p>
</div>
 @endif           



 <!-- <span style="color:red;">* Required field</span> -->
             <div class="container-fluid white-bg">
        <div class="col-md-12"><h3 class="mrg-btm">REGISTER USER</h3></div>


   
<form class="form-horizontal" id="userregi"  method="post" action="{{url('register-user-save')}}" >{{ csrf_field() }}
   
 <div class="form-group">
            <label for="inputEmail" class="control-label col-xs-2" >User Name <span style="color:red;">*</span></label>
          
            <div class="col-xs-6">
            <input type="text" name="UserName" id="UserName"  class="form-control" value="{{ old('UserName')}}" required="">
    @if ($errors->has('UserName'))<label class="control-label" for="inputError" > {{ $errors->first('UserName') }}</label>@endif
           </div>
</div>

  <div class="form-group">
            <label for="inputEmail" class="control-label col-xs-2">Email <span style="color:red;">*</span></label>
            <div class="col-xs-6">
            <input type="text" name="email" id="email"  class="form-control" value="{{ old('email')}}" required="" >
    @if ($errors->has('email'))<label class="control-label" for="inputError"> {{ $errors->first('email') }}</label>@endif
           </div>
</div>

<div class="form-group">
            <label for="inputEmail" class="control-label col-xs-2">Mobile <span style="color:red;">*</span></label>
            <div class="col-xs-6">
            <input type="text" name="mobile" id="mobile"  value="{{ old('mobile')}}"  class="form-control" maxlength="10"  onkeypress="return Numeric(event)" required="" >
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
            <label for="inputEmail" class="control-label col-xs-2">Company <span style="color:red;">*</span> </label>
            <div class="col-xs-6">
           <fieldset>

             <select name="company_id" id="company_id" class="form-control"  required=""  >
              <option value="">-Select-</option>
              <option value="1" @if (old('company_id') == "1") {{ 'selected' }} @endif>RupeeBoss</option>
              <option value="2" @if (old('company_id') == "2") {{ 'selected' }} @endif>Datacom</option>
              <option value="3" @if (old('company_id') == "3") {{ 'selected' }} @endif>PolicyBoss</option>
              <option value="4" @if (old('company_id') == "4") {{ 'selected' }} @endif>LandMark</option>
             </select>
              </fieldset>
    @if ($errors->has('company_id'))<label class="control-label" for="inputError"> {{ $errors->first('company_id ') }}</label>@endif
           </div>
</div>

<div class="form-group">
            <label for="inputEmail" class="control-label col-xs-2">ReportingID <span style="color:red;">*</span> </label>
            <div class="col-xs-6">
             <fieldset>
             <select name="reporting_id" id="reporting_id"  class="form-control" required="">
              <option value="">-Select-</option>
              <option value="1" @if (old('reporting_id') == "1") {{ 'selected' }} @endif>RupeeBoss</option>
              <option value="2" @if (old('reporting_id') == "2") {{ 'selected' }} @endif>Datacom</option>
              <option value="3" @if (old('reporting_id') == "3") {{ 'selected' }} @endif>PolicyBoss</option>
              <option value="4" @if (old('reporting_id') == "4") {{ 'selected' }} @endif>LandMark</option>
             </select>
               </fieldset>
    @if ($errors->has('reporting_id'))<label class="control-label" for="inputError" > {{ $errors->first('reporting_id ') }}</label>@endif
           </div>
</div>
 
<div class="form-group">
            <label for="inputEmail" class="control-label col-xs-2">State <span style="color:red;">*</span> </label>
            <div class="col-xs-6" >
 
 <select class="form-control  search_state search_state_error" name="state_id" placeholder="Search State" id="search_state"></select>
 <label class="control-label" for="inputError" id="error_state"> </label>
           </div>
</div>

<div class="form-group">
            <label for="inputEmail" class="control-label col-xs-2">City <span style="color:red;">*</span> </label>
            <div class="col-xs-6">
            <select class="form-control  search_district " name="city_id" placeholder="Search State" id="search_district" > </select>
              <label class="control-label" for="inputError" id="error_city"> </label>
           </div>
</div>


 

<div class="form-group">
            <label for="inputEmail" class="control-label col-xs-2">UserType <span style="color:red;">*</span> </label>
            <div class="col-xs-6">

         <fieldset>  
             <select name="menu_group" id="menu_group"  class="form-control" required="" >

              <option value="">Select</option>
               @foreach($menu_group as $val)
                <option value="{{$val->id}}" {{(old('menu_group') == $val->id?'selected':'')}}>{{$val->name}} </option>
               @endforeach

             	<option value="">Select</option>

             	 @foreach($menu_group as $val)
                <option value="{{$val->id}}">{{$val->name}} </option>
             	 @endforeach

             </select>
             </fieldset>
    @if ($errors->has('menu_group'))<label class="control-label" for="inputError"> {{ $errors->first('menu_group ') }}</label>@endif
           </div>
</div>

<div class="form-group">
            <label for="inputEmail" class="control-label col-xs-2">Password <span style="color:red;">*</span></label>
            <div class="col-xs-6">
            <input type="text" name="password" id="password"  class="form-control" value="{{ old('password')}}" required="">
    @if ($errors->has('password'))<label class="control-label" for="inputError"> {{ $errors->first('password') }}</label>@endif
           </div>
</div>


<div class="form-group">
            <label for="inputEmail" class="control-label col-xs-2">Confirm Password <span style="color:red;">*</span></label>
            <div class="col-xs-6">
            <input type="text" name="cpassword" id="cpassword"  class="form-control" value="{{ old('cpassword')}}"
            required="">
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
      }else{

       $('#error_state').text(' ');
      }
      if($('#search_district').val()==0){
          $('#error_city').text('The City field is required');
         return  false;
      }else{

            ('#error_city').text(' ');
      }
})
        </script>




            <script type="text/javascript">
            
            $( "#register_user_id" ).click(function() {
             $("#userregi").validate();
        });
            </script>


          
              
@endsection   
            