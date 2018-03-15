@extends('include.master')
@section('content')
            


             <div class="container-fluid white-bg">
				<div class="col-md-12"><h3 class="mrg-btm">SALES MATERIAL</h3></div>
				<form name="sales_material" id="sales_material" method="POST">
				 {{ csrf_field() }}
				<div class="col-md-4 col-xs-12">
				<label>Product</label>
				<div class="form-group">
				<select class="form-control drop-arr select-sty" name="Product" id="Product">
					  <option disabled selected value="">Product</option>
					   <option value="1">Health Insurance</option>
					   <option value="2">Motor Insurance</option>
					   <option value="3">Health Assure</option>
					   <option value="4">Loans</option>
					   <option value="5">Fin-Peace</option>
					</select>
				</div>
				</div>

				<div class="col-md-4 col-xs-12">
				<label>Company</label>
				<div class="form-group">
				<select class="form-control drop-arr select-sty Company" name="Company" id="Company">
					   <option disabled selected value="">Company</option>
					   <option style="display: none;" value="1">Bharti</option>
					   <option style="display: none;" value="2">General</option>
					   <option style="display: none;" value="3">Liberty Videocon</option>
					   <option style="display: none;" value="4">Religare</option>
					   <option style="display: none;" value="5">Future Gen</option>
					   <option style="display: none;" value="6">IFFCO</option>
					   <option style="display: none;" value="7">New India</option>
					   <option style="display: none;" value="8">Reliance</option>
					   <option style="display: none;" value="9">Cigna TTK</option>
					   <option style="display: none;" value="10">ICICI</option>
					   <option style="display: none;" value="11">Star Health</option>
					</select>
				</div>
				</div>


				

				<div class="col-md-4">
	            <input type="hidden" name="UserId" id="UserId" value="<?php echo Session::get('emp_id');?>">
               
               <br>
				<a type="button" id="sales_submit" name="sales_submit" class="btn btn-primary">SUBMIT</a>
			   <div>
                </div>
                </div>



				<div id="docs" class="col-md-12"></div>
				</form>
					



            </div>
					    
@endsection	



	
            