@extends('include.master')
@section('content')
@if(Session::has('message'))
<div class="alert alert-success alert-dismissible">
<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
<p class="alert alert-success">{{ Session::get('message') }}</p>
</div>
@endif
<div class="container-fluid white-bg">
<div class="col-md-12"><h3 class="mrg-btm">Raise A Ticket</h3></div>
<div class="col-md-6">
<form method="post" name="fromraiserticket" id="fromraiserticket" enctype="multipart/form-data" >
{{ csrf_field() }}
 <div class="form-group">
 <label class="control-label" for="message-text">FBAID: </label>
 <input type="number" class="form-control" id="txtfbaid" name="txtfbaid">
 </div>		
 <div class="form-group">
 <label class="control-label" for="message-text">Category:</label>
  <select class="form-control" name="ddlCategory" id="ddlCategory" required="yes">
  <option value="0" selected="selected">--Select Category--</option>
   @foreach($cat as $val)
  <option value="{{$val->CateCode}}">{{$val->CateName}}</option>
   @endforeach
 </select>
</div>
<div class="form-group">
<label class="control-label" for="message-text">Sub Category:</label>
<select class="form-control" name="ddlsubcat" id="ddlsubcat" required="yes">
  </select>
 </div>
 <div class="form-group">
 <label class="control-label" for="message-text">Classification:</label>
 <select class="form-control" name="ddlClassification"  id="ddlClassification">
 </select>
 </div>
  <div class="form-group">
	@if ($errors->has('txtraisermessage'))<label class="control-label" for="inputError"> {{ $errors->first('txtraisermessage') }}</label>  @endif
  <label class="control-label" for="message-text">Message: </label>
  <textarea class="form-control" required="yes" id="txtraisermessage" name="txtraisermessage"></textarea>
 </div>
<div class="form-group">
 <label class="control-label" for="message-text">Image: </label>
 <input type="file" class="form-control" id="pathimgraiser" name="pathimgraiser">
</div>
 <div class="form-group">
 <label class="control-label" for="message-text">To Email Id: </label>
 <input type="Email" class="form-control" id="txttoemailid" name="txttoemailid">
</div>
<div class="form-group">
<label class="control-label" for="message-text">CC Email ID: </label>
<input type="Email" name="" class="form-control" id="txtccemailid" name="txtccemailid">
</div>
<div class="form-group">
<input id="btn_saveticket" type="submit" name="btn_saveticket" class="btn btn-primary">
<button id="btn_resetticket" class="btn btn-primary" type="button">Reset</button>   
</div>
</form>
</div>
@endsection