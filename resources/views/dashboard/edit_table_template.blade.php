@extends('include.master')
@section('content')	


     <div class="container-fluid white-bg">

        <form id="demo_form" name="demo_form" method="POST" action="{{url('update_view_templete')}}"> 
                {{csrf_field()}} 
        <div class="form-group">
         <div class="col-md-4 col-xs-12">
    <input type="hidden" name="fbaid" id="fbaid" class="form-control" value="{{ $user->SMSTemplateId}}">
      
            <label class="control-label" for="message-text">SMS Head : </label>
            <input type="text" class="recipient-name form-control" id="smshead" name="smshead"  value="{{ $user->Header}}">
          </div>
      </div>
          <div class="form-group">
          	<div class="col-md-4 col-xs-12">
            <label class="control-label" for="message-text">SMS Body : </label>
            <textarea type="text" class="recipient-name form-control" id="smsbody" name="smsbody" value="">{{ $user->Template}}</textarea>
          </div>
      </div>
        <br><br><br><br><br>
      
      <div class="form-group">
      <div class="col-lg-5 col-lg-offset-6">
        <button type="reset" class="btn btn-default">Cancel</button>
        <button type="submit" class="btn btn-primary">Submit</button>
      </div>
    </div>
    </form>
  </div>
@endsection
