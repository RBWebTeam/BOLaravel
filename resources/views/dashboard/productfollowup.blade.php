@extends('include.master')
@section('content')   
<div class="container-fluid white-bg">
<div class="col-md-12"><h3 class="mrg-btm">Product Follow Up</h3>

<div class="">
	@foreach($product as $val)
    <button type="button" id="btnheath" onclick="getprodcutdtls({{$val->Product_Id}})" class="btn btn-primary">{{$val->Product_Name}}</button>
    @endforeach
    
</div>
<div>
	<br>
</div>
  <div id="divpartnertable" class="table-responsive">
 
   </div>
</div>
</div>

<div class="productfollowup modal fade" id="productfollowup" role="dialog">   
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
        <h4 class="modal-title">Product Follow-Up</h4>
      </div>
       <div class="modal-body">
        <form name="productfolloupdetails" id="productfolloupdetails" action="Post">
         {{ csrf_field() }}
         <div class="form-group">
           	<label class="control-label" for="message-text">Status: </label>
           	<select class="form-control" name="txtproductstatus" id="txtproductstatus">
           	 <option selected="selected">--Select Status--</option>
              @foreach($status as $val)
              <option value="{{$val->id}}" required="yes">{{$val->status_name}}</option>
              @endforeach
            </select>
           </div>
           <div class="form-group">
           <label class="control-label" for="message-text">Remark: </label>
           <textarea class="form-control" required="yes" id="txtproductrmremark" name="txtproductrmremark"></textarea>
           </div>
        <div class="modal-footer"> 
        <button class="btn btn-default" type="button" data-dismiss="modal">Close</button>
         <input type="hidden" id="txtproductfbaid" name="txtproductfbaid">
        </form>
         <a id="btn_productsubbmit" class="btn btn-primary" type="button">Submit</a>
        </div>
      </div>
    </div>
  </div>
@endsection