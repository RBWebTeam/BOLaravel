@extends('include.master')
 @section('content')


       <div class="container-fluid white-bg">
       <div class="col-md-12"><h3 class="mrg-btm">Employee Details</h3></div>
        <a href="{{url('add-employee')}}" class="qry-btn" id="pospbtn">Add New Employee</a> <br>
<div class="col-md-12">
			 <div class="overflow-scroll">
			 <div class="table-responsive" >
				<table id="example" class="table table-bordered table-striped tbl" >
                 <thead>
                  <tr>
                   <th>UID</th>
                   <th>Employee Name</th>
                   <th>Mobile No</th>
                   <th>Email</th>
                   <th>Profile </th>
                   <th>Designation </th>
                   <th>Category </th>
                   <th>Official Email </th>
                   <th>Official Phone </th>
                    <th>Emp-Status </th>
                  <th>Update</th>
                 </tr>
                </thead>
                <tbody>

                @isset($query)
         @foreach($query as $val)   
        <td><?php echo $val->UId; ?></td> 
       <td><?php echo $val->EmployeeName; ?></td> 
       <td><?php echo $val->MobileNo; ?></td>
       <td><?php echo $val->EmailId; ?></td>
       <td><?php echo $val->Profile; ?></td>
       <td><?php echo $val->Designation; ?></td>
       <td><?php echo $val->EmployeeCategory; ?></td>
       <td><?php echo $val->official_emailid; ?></td>
       <td><?php echo $val->official_phone_no;?></td>
        <td><?php echo $val->EmployeeStatus;?></td> 
    <td><a href="manage-employee/{{$val->UId}}" id="btnupdte" class="qry-btn"  value="{{$val->UId}}" name="btnupdte" class="btn btn-default">Update</a></td>

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