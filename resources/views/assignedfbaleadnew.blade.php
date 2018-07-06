@extends('include.master')
@section('content')
    <div class="container-fluid white-bg">
       <div class="col-md-12"><h3 class="mrg-btm">FBA Assignment for quicklead</h3></div>   
           <div class="col-md-12">
                <div class="overflow-scroll">
                   <div class="table-responsive" >
                       <table class="datatable-responsive table table-striped table-bordered dt-responsive nowrap" id="example">
                          <thead>
                               <tr>
                                <th>FBA ID</th> 
                                <th>FBA Name</th> 
                                <th>City</th>
                                <th>Email id</th>
                                <th>Mobile No</th> 
                                <th>Assigned To</th>                                  
                                <th>Assigned Date</th>
                                <th>History</th> 
                               </tr>
                          </thead>
                          <tbody>
                          	@foreach($query as $val)
                          	<tr>
                          		<td><a onclick="getstatus({{$val->fbaid}},this)" data-toggle="modal" data-target="#myModal">{{$val->fbaid}}</a></td>
                          		<td>{{$val->FullName}}</td>
                          		<td>{{$val->city}}</td>
                          		<td>{{$val->EmailID}}</td>
                          		<td>{{$val->MobiNumb1}}</td>
                          		<td>{{$val->UserName}}</td>
                          		<td>{{$val->createddate}}</td>
                          		<td><a data-toggle="modal" data-target="#historymodal" class="btn btn-primary" onclick="gethistory({{$val->fbaid}},this)">View History</a></td>
                          	</tr>
                          	@endforeach
                          </tbody>
                   </table>
              </div>
            </div>
        </div>
   </div>
   <!-- for lead status Modal -->
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Update Status</h4>
        </div>
        <div class="modal-body form-Group">
        <form id="frmstatus" method="post">
        	{{ csrf_field() }}
         <label class="control-label">Status:</label>
          <select name="ddlstatus" id="ddlstatus" class="form-control" style="width: 50%" required>
          	<option value="">--Select Status--</option>                 	
          	<option value="Interested">Interested</option>
          	<option value="Not Interested">Not Interested</option> 
            <option value="Follow-Up">Follow-Up</option>        
          </select>         
          <label class="control-label">Remark:</label>   
          <textarea id="txtremark" name="txtremark" class="form-control" style="width: 80%"></textarea> 
          <input type="hidden" name="txtfbaid" id="txtfbaid">         
        </form> 
          
        </div>
        <div class="modal-footer">
       <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
       <button type="button" id="btnsave" class="btn btn-primary">Save</button>
        </div>
      </div>      
    </div>
  </div>
  <!-- for history Modal -->
  <div class="modal fade" id="historymodal" role="dialog">
    <div class="modal-dialog">    
      <!-- Modal content-->
      <div class="modal-content" style="width: 830px;">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Quick Lead History</h4>
        </div>
        <div class="modal-body form-Group">
        <div id="divhistory">
        	
        </div>
        </div>
      <div class="modal-footer">
      <button type="button" class="btn btn-default" data-dismiss="modal">Close</button> </div>
      </div>      
    </div>
  </div>
   <script type="text/javascript">
   	function getstatus(fbaid){
   		$("#txtfbaid").val(fbaid);  		
     }
$("#btnsave").click(function(){ 
 if ($('#frmstatus').valid()){
   console.log($('#frmstatus').serialize());
   $.ajax({ 
   url: "{{URL::to('assigned-fba-lead-new')}}",
   method:"POST",
   data: $('#frmstatus').serialize(),  
   success: function(msg)  
   {
    //location.reload();
    alert("Record has been saved successfully");
    $("#frmstatus").trigger('reset');
    $('#myModal').modal('hide');
  }
 }); 
 } 
 });
function gethistory(fbaid){
$.ajax({  
         type: "GET",  
         url:'assigned-fba-lead-history/'+fbaid,
         success: function(fbahistory){
          //alert(fbahistory);

      var data = JSON.parse(fbahistory);
      var str = "<table class='datatable-responsive table table-striped table-bordered dt-responsive nowrap'><thead><tr style='height:30px;margin:5px;'><th>FBA ID</th><th>status</th><th>Remark</th><th>Created By</th><th>Created Date</th></tr></thead>";
       for (var i = 0; i < data.length; i++) 
       {

         str = str + "<tbody><tr style='height:30px;margin:5px;'><td>"+data[i].fbaid+"</td><td>"+data[i].status+"</td><td><textarea readonly class='txtarea'>"+data[i].remark+"</textarea></td><td>"+data[i].UserName+"</td><td>"+data[i].createddate+"</td></tr></tbody>";
       }
         str = str + "</table>";
           $('#divhistory').html(str);   
       }  
      });
  } 	
   	
   </script>
@endsection