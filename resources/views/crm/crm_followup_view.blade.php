@extends('include.master')
@section('content')   
<div class="container-fluid white-bg">
       <div class="col-md-12"><h3 class="mrg-btm">CRM Followup</h3></div>
       <div class="col-md-12">
       <div class="overflow-scroll">
       <div class="table-responsive" >
       


       <form  method="post" action="{{url('crm-followup-history')}}"  >{{ csrf_field() }}
           
            <input type="hidden" name="historyid" id="historyid"  >


          <div id="id_none" style="display:none">
            <div class="form-group row">
            <label for="inputPassword" class="col-sm-4 col-form-label">Disposition</label>
            <div class="col-sm-8">
                 
            <input type="text" class="form-control"  name="crm_name" id="disposition_" readonly>
             <input type="hidden" class="form-control"  name="crm_id" id="disposition_ID" readonly>
               
            </div>
          </div> 

             
            

             <div class="form-group row">
                   <label for="inputPassword" class="col-sm-4 col-form-label">Calltype</label>
               <div class="col-sm-8">
                 <input type="text" class="form-control"  id="calltype" readonly>

              </div>
            </div>


             <div class="form-group row">
                   <label for="inputPassword" class="col-sm-4 col-form-label">Outcome</label>
               <div class="col-sm-8">
                 <input type="text"  class="form-control" readonly id="Outcome">

              </div>
            </div>

              <div class="form-group row">
                   <label for="inputPassword" class="col-sm-4 col-form-label">Connect Result</label>
               <div class="col-sm-8">
                 <input type="text"  class="form-control" readonly id="connect_result">

              </div>
            </div>

              <div class="form-group row">
                   <label for="inputPassword" class="col-sm-4 col-form-label">Emp Category</label>
               <div class="col-sm-8">
                <input type="text"  class="form-control" readonly id="emp_category">

              </div>
            </div>
 

      <div class="form-group row">
             <label for="inputPassword" class="col-sm-4 col-form-label">Followup Date</label>
                <div class="col-sm-8">
                 <div id="datepicker" class="input-group date" data-date-format="mm-dd-yyyy">
              <input type="text"  class="form-control date-range-filter "  name="followup_date" id="followup_date" required="">
              <span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
              </div>
              </div>
            </div>

               
           <div class="form-group row">
                   <label for="inputPassword" class="col-sm-4 col-form-label">Remark</label>
               <div class="col-sm-8">
              
                 <textarea name="remark"  class="form-control"   id="remark"></textarea>

              </div>
            </div>


             <div class="form-group row">
                   <label for="inputPassword" class="col-sm-4 col-form-label">Action</label>
               <div class="col-sm-8" id="check_id">

                  <label class="radio-inline"><input type="radio" id="check2" value="y" 
                   name="action">Open</label>
                   <label class="radio-inline"><input type="radio" id="check1" value="n" name="action">Close</label>




              </div>
            </div>



             <div class="form-group row">
                   <label for="inputPassword" class="col-sm-4 col-form-label">View History</label>
               <div class="col-sm-8">
            
                  <label class="radio-inline"  > <a href="#" onclick="View_History()">View History</a></label>
                  
                   <input type="hidden"   name="fbamappin_id" id="fbamappin_id">
                  <input type="hidden"   name="disposition_id" id="disposition_id">
                  

              </div>
            </div>

 
<!-- 
            <div class="form-group row" id="followup_internalteam_id" style="display: none">
            <label for="inputPassword" class="col-sm-4 col-form-label">task assignment</label>
            <div class="col-sm-8">
              <input type="text"  class="form-control"  readonly name="assignment_id"   id="followup_internalteam">
            </div>
          </div>  -->
              

            
         
            




         <center>
            
           
           <input type="submit" name="submit"  class="btn btn-default" value="submit">

         </center>
         </form>

          </div>


  <table   class="table table-bordered table-striped  " id="crm_followup_tb" >
   <thead>
                  <tr>
                   <th>ID</th>
                   <th>Assigned by</th>
                    <th>Assigne </th>
                    <th>Remark</th>
                    <th>Action </th>
                     <th>followup_date </th>
                      
                     <th>create_at</th>
                     
                                
                  </tr>
   </thead>
   <tbody   >
     
     @foreach($query as $val)
     <tr>
         <td> <a href="#" onclick="followup_disposition('{{$val->history_id}} ')" >{{$val->history_id}} </a>     </td>
         <td>{{$val->user_id}} </td>
         <td>{{$val->assignment_id}} </td>
         <td>{{$val->remark}} </td>
         
         <td>{{$val->action==="n"?"close":"open"}}</td>
           <td>{{$val->followup_date}} </td>

         <td>{{$val->create_at}} </td>

         
         
     </tr>

     @endforeach

   </tbody>
  </table>

  </div>
</div>
</div>
</div>


 
 




 <div id="classModal_followup" class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="classInfo" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
          ×
        </button>
        <h4 class="modal-title" id="classModalLabel">   CRM History  </h4>
      </div>
      <div class="modal-body">
        <table id="classTable" class="table table-bordered">
          <thead>
          <tr>
              <th>ID</th>
              <th>Employee_Category</th>
              <th>Type of Call </th>
              <th>Connect Result</th>
              <th>Outcome</th>
              <th>Disposition</th>
              <th>Sub Disposition</th>
              <th>followup_date</th>
              <th>remark</th>
              <th>action</th>
              <th>Follow up Required</th>
            </tr>
          </thead>
             <tbody  id="appand_followup_hostory"></tbody>
        </table>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" data-dismiss="modal">
          Close
        </button>
      </div>
    </div>
  </div>
</div>




<script type="text/javascript">
function followup_disposition(historyid){
             $('#historyid').val(historyid);

        $.get("{{url('crm-followup-disposition')}}",{historyid:historyid}).done(function(msg){ 

 
          if(msg.res.action=="n"){
                $('#check1').attr('checked', true);
          }
          if(msg.res.action=="y"){
                $('#check2').attr('checked', true);
          }


            $('#disposition_id').val(msg.res.id);  
            $('#fbamappin_id').val(msg.res.fbamappin_id);
            $('#disposition_').val(msg.res.disposition);
            $('#disposition_ID').val(msg.res.id);
            $('#calltype').val(msg.res.calltype);
            $('#connect_result').val(msg.res.connect_result);
            $('#Outcome').val(msg.res.outcome);
            $('#emp_category').val(msg.res.emp_category);
          //  $('#followup_externalteam').val(res.followup_externalteam);
           // $('#followup_internalteam').val(msg.res.followup_internalteam);           
 $('#followup_internalteam_id').show();
 $('#id_none').show();       
}).fail(function(xml,Status,error){
               console.log(xml);
});
} 


 

   function View_History(){
             if($('#fbamappin_id').val()!='' && $('#disposition_id').val()!='' && $('#historyid').val()!=''){
            $.get("{{url('crm-followup-history')}}",{fbamappin_id:$('#fbamappin_id').val(),disposition_id:$('#disposition_id').val()}).done(function(msg){
                  var arr_ap=Array();
                   $('#appand_followup_hostory').empty();
               $.each(msg.result,function(index,val){
                              if(val.action=="n"){action="close";}else{action="open";}
                              
                      arr_ap.push('<tr><td>'+val.history_id+'</td><td>'+val.emp_category+'</td><td>'+val.calltype+'</td><td>'+val.connect_result+'</td><td>'+val.outcome+'</td><td>'+val.disposition+'</td><td>'+val.sub_disposition+'</td><td>'+val.followup_date+'</td><td>'+val.remark+'</td><td>'+action+'</td><td>'+val.followup_required+'</td></tr>');

                 console.log(val.fbamappin_id);
                 
               });

               $('#appand_followup_hostory').append(arr_ap);

               $('#classModal_followup').modal('show');
                  
            }).fail(function(xml,Status,error){
                   console.log(xml);
            })  ;
             

         }

   }



$(document).ready(function () {
            $('#crm_followup_tb').DataTable();
        });
</script>

 
@endsection
<style type="text/css">
  #classModal_followup {}

.modal-body {
  overflow-x: auto;
}

</style>








