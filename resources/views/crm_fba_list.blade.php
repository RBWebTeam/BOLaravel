@extends('include.master')
@section('content')   

<div id="content" style="overflow:scroll; height: 5px;">
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
        <textarea type="text" rows="7" id="demo" name="demo" class="form-control demo" ></textarea>
       <!--  <input type="text" name="getdata" id="getdata" class="getdata"> -->
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
                   <tr>
            
       @foreach($crmlist as $val) 

       <td><?php echo $val->FBAID; ?></td> 
       <td><?php echo $val->FullName; ?></td>
       <td><?php echo $val->MobiNumb1; ?></td> 
       <td><?php echo $val->EmailID; ?></td>  
       <td><?php echo $val->City; ?></td> 
       <td><?php echo $val->PinCode; ?></td>
       <td>

   <button id="btnview" class="btn btn-default demo" data-toggle="modal" data-target="#btnview" onclick="Approve_Course('{{$val->FBAID}}');">View </button>
<!--    <td><button type="button" class="btn btn-info btn-sm" data-toggle="modal" onClick="Approve_Course('{{$val->FBAID}}');" value="" data-target="#btnview">Approve</button></td> -->

    </td>
      
     <td><a href="crmstatus/{{$val->FBAID}}" id="btnstatus" value="{{$val->FBAID}}" name="btnstatus" class="btn btn-default">Add Status</a><!-- </td> -->
       </td>
       </tr>
       </tr>

       @endforeach
      </tbody>
      </table>
			</div>
			</div>
			</div>
		  </div>
      </div>
@endsection


<!-- 
<script type="text/javascript"> function crmdata(myTitle, myBodyHtml) {

 $('#myModalTitle').html(myTitle);
   $('#myModalBody').html(myBodyHtml);

   $('#myModal').modal('show');
}
</script> -->




<script>
      // function Approve_Course(FBAID) {
      //   //alert(FBAID);

      //       $.ajax({
      //           url: "{{url('crmtest')}}",

      //           type: 'GET',
      //           data: {FBAID:FBAID},
      //           success: function(data)
      //           {
      //             console.log(data);
      //            $('#demo').text(data[0].fullname);
      //             //$('.demo').append(data[0].fullname).html();
      //             // $('textarea#demo').attr('value',data);
      //           }
      //       });
      // }

function Approve_Course(FBAID)
{


$.ajax({  
         type: "GET",  
       url: "{{url('crmtest')}}",//"{{URL::to('Fsm-Details')}}",
        success: function(data){

       

        var str = "<table class='table'><tr style='height:30px;margin:5px;'><td>Full name</td><td>Mobile</td><td>Remark</td><td>Called Date</td><td>Email</td><td>Disposition</td><td>Sub Disposition</td><td>City</td></tr>";
       // for (var i = 0; i < data.length; i++) {
       //   str = str + "<tr style='height:30px;margin:5px;'><td>"+data[i].fullname+"</td><td>"+data[i].mobile+"</td><td>"+data[i].pmobile+"</td><td>"+data[i].pemail+"</td><td>"+data[i].email+"</td><td>"+data[i].ppincode+"</td></tr>";
       //    }
              // console.log(msg[0].Result);
            str = str + "</table>";
           $('#divcrm').html(str);   
        }  
      });
}


  </script>









