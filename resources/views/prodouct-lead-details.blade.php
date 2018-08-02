@extends('include.master')
 @section('content')
       <div class="container-fluid white-bg">
       <div class="col-md-12"><h3 class="mrg-btm">Lead Details</h3></div>
<div class="col-md-12">
			 <div class="overflow-scroll">
			 <div class="table-responsive" >
				<table id="example" class="table table-bordered table-striped tbl" >
                 <thead>
                  <tr>
                   <th>Lead_Id</th>
                   <th>Name</th>
                   <th>Mobile</th>
                   <th>Product_Name</th>
                   <th>Address</th>
                   <th>Assigned_To</th>
                   <th>Send</th>

                 
                </thead>
                <tbody>
      @isset($ldata)

                @foreach($ldata as $val)   

                <td><?php echo $val->lead_id; ?></td> 
                <td><?php echo $val->lead_name; ?></td>
                <td><?php echo $val->mobile_no; ?></td> 
                <td><?php echo $val->Product_Name; ?></td> 
                <td><?php echo $val->address; ?></td> 
                <td><?php echo $val->assigned_to; ?></td>

                 <td><a href="" id="btnsend" class="qry-btn"  value="" name="btnsend" class="btn btn-default">Send</a></td>
            
                </tr>
                @endforeach

 
@endisset
          </tbody>
      </table>
			</div>
			</div>
			</div>
      </div>

    
 @endsection