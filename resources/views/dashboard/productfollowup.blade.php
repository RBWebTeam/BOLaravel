@extends('include.master')
@section('content')   
<div class="container-fluid white-bg">
<div class="col-md-12"><h3 class="mrg-btm">Product Follow Up</h3>

<div class="btn-group">
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
@endsection