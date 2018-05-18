@extends('include.master')
@section('content')   
<div class="container-fluid white-bg">
			 <div class="col-md-12"><h3 class="mrg-btm">CRM FBA</h3></div>
			 <div class="col-md-12">
			 <div class="overflow-scroll">
			 <div class="table-responsive" >
       <!-- Modal -->
  <div class="modal fade" id="btnview" role="dialog">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">CRM Details</h4>
        </div>
        <div class="modal-body">
        <div id="divcrm" name="divcrm">
       
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>
</div>

	<table id="example" class="table table-bordered table-striped tbl" >
   <thead>
                  <tr>
                   <th>FBAID</th>
                   <th>Full Name</th>
                   <th>Mobile No</th>
                   <th>Email ID</th>
				           <th>City</th>
				           <th>Pincode</th>
                   <th>View</th>
                   <th>Status</th>
                  </tr>
   </thead>
   <tbody>
     @foreach($crmlist as $val) 
      <tr>
       <td><?php echo $val->FBAID; ?></td> 
       <td><?php echo $val->FullName; ?></td>
       <td><?php echo $val->MobiNumb1; ?></td> 
       <td><?php echo $val->EmailID; ?></td>  
       <td><?php echo $val->City; ?></td> 
       <td><?php echo $val->PinCode; ?></td>
       <td><button id="btnview" class="btn btn-default demo" data-toggle="modal" data-target="#btnview" onclick="Approve_Course('{{$val->FBAID}}');">View</button></td>
       <td><a href="crmstatus/{{$val->FBAID}}" id="btnstatus" value="{{$val->FBAID}}" name="btnstatus" class="btn btn-default">Add Status</a></td>
       </tr>
       @endforeach
      </tbody>
      </table>
			</div>
			</div>
			</div>
		  </div>
   

<script type="text/javascript">

function Approve_Course(FBAID)
{

$.ajax({  
         type: "GET",  
         url: 'crmfbalist/'+FBAID,
         success: function(data){

         var str = "<table class='table' id='example'><thead><tr style='height:30px;margin:5px;'><th>Full name</th><th>Mobile</th><th>Remark</th><th>Called Date</th><th>Email</th><th>Sub Disposition</th><th>Disposition</th></tr></thead>";
        
       for (var i = 0; i < data.length; i++) {
            str = str + "<tbody><tr style='height:30px;margin:5px;'><td>"+data[i].fullname+"</td><td>"+data[i].mobile+"</td><td>"+data[i].remark+"</td><td>"+data[i].calleddate+"</td><td>"+data[i].email+"</td><td>"+data[i].subdisposition+"</td><td>"+data[i].disposition+"</td></tr></tbody>";
          }
           str = str + "</table>";
           $('#divcrm').html(str);   
        }  
      });
}
</script>
@endsection








