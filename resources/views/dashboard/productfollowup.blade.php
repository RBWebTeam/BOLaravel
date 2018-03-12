@extends('include.master')
@section('content')   
<div class="container-fluid white-bg">
<div class="col-md-12"><h3 class="mrg-btm">Product Follow Up</h3>

<div class="btn-group">
    <button type="button" id="btnheath" onclick="getprodcutdtls(1)" class="btn btn-primary">Health Insurance</button>
    <button type="button" id="btnmotor" onclick="getprodcutdtls(2)" class="btn btn-primary">Motor Insurance</button>
    <button type="button" id="btnheathassure" onclick="getprodcutdtls(3)" class="btn btn-primary">Health Assure</button>
    <button type="button" id="btnloans" onclick="getprodcutdtls(4)" class="btn btn-primary">Loans</button>
    <button type="button" id="btnfinpeace" onclick="getprodcutdtls(5)" class="btn btn-primary">Fin-Peace</button>
</div>
<div>
	<br>
</div>
  <div id="divpartnertable" class="table-responsive">
      <!--  <table id="example" class="table table-bordered table-striped">
		   <tr>
			 <td>Lead Id</td>
			 <td>Name</td>
			 <td>Mobile No</td>
			 <td>Email</td>
			 <td>City</td>
			 <td>Status</td>
			
			 </tr>
			 <tr>
			 <td></td>
			 <td>Pavamaana Softech</td>
			 <td>9845724268</td>
			 <td>bgykumar@gmail.com</td>
			 <td>Bangalore</td>
			 <td>Call Back</td>
			</tr>
		</table> -->
		</div>
</div>
</div>
@endsection