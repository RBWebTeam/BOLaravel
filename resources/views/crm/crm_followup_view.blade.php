@extends('include.master')
@section('content')  
<style type="text/css">
  .fbadetails h2 {
   float: left;
   padding:5px; 
  }
  .fbadetails{
    margin-bottom: 20px;
    font-size: 20px;
  }
</style>   
<div class="container-fluid white-bg">
       <div class="col-md-12"><h3 class="mrg-btm">CRM Followup</h3></div>
        <div class="fbadetails col-md-12 col-md-offset-2">
         @foreach($fbadetails as $val)
        <tr>
         <th>FBAID:</th>
         <td>{{$val->FBAID}}</td> |
         <th>FBA NAME:</th>
         <td>{{$val->FullName}}</td> |
         <th>FBA MOBILE NO:</th>
         <td>{{$val->MobiNumb1}}</td>
        </tr>
         @endforeach
       </div> 
       <div class="col-md-12">
       <div class="overflow-scroll">
       <div class="col-md-12 col-md-offset-2">
       <form  method="post" action="{{url('crm-followup-history')}}">{{csrf_field()}}           
            <input type="hidden" name="history_id" id="history_id"  value="{{$history_id}}" >
          <div id="id_none" style="display:none">
            <div class="form-group row">
            <label for="inputPassword" class="col-md-2 col-form-label">Disposition</label>
            <div class="col-md-6">                 
            <input type="text" class="form-control"  name="crm_name" id="disposition_" readonly>
             <input type="hidden" class="form-control"  name="crm_id" id="disposition_ID" readonly>               
            </div>
          </div>
             <div class="form-group row">
                   <label for="inputPassword" class="col-md-2 col-form-label">Calltype</label>
               <div class="col-md-6">
                 <input type="text" class="form-control"  id="calltype" readonly>
              </div>
            </div>
             <div class="form-group row">
                   <label for="inputPassword" class="col-md-2 col-form-label">Outcome</label>
               <div class="col-md-6">
                 <input type="text"  class="form-control" readonly id="Outcome">
              </div>
            </div>
              <div class="form-group row">
                   <label for="inputPassword" class="col-md-2 col-form-label">Connect Result</label>
               <div class="col-md-6">
                 <input type="text"  class="form-control" readonly id="connect_result">
              </div>
            </div>
              <div class="form-group row">
                   <label for="inputPassword" class="col-md-2 col-form-label">Emp Category</label>
               <div class="col-md-6">
                <input type="text"  class="form-control" readonly id="emp_category">
              </div>
            </div>
            <div class="form-group row" id="followup_date_id">
             <label for="inputPassword" class="col-md-2 col-form-label">Followup Date <b style="color: red; font-size: 15px;">*</b></label>
                <div class="col-md-6">                
              <input type="datetime-local"  class="form-control date-range-filter " required name="followup_date" id="followup_date" >             
              </div>
              </div>
            </div>              
           <div class="form-group row">
                   <label for="inputPassword" class="col-md-2 col-form-label">Remark <b style="color: red; font-size: 15px;">*</b></label>
               <div class="col-md-6">              
                 <textarea name="remark"  required class="form-control"   id="remark"></textarea>
              </div>
            </div>
             <div class="form-group row">
                   <label for="inputPassword" class="col-md-2 col-form-label">Action</label>
               <div class="col-md-6" id="check_id">
                  <label class="radio-inline"><input type="radio" id="check2" value="y" 
                   name="action">Open</label>
                   <label class="radio-inline"><input type="radio" id="check1" value="n" name="action">Close</label>
              </div>
            </div>
              <input type="hidden"   name="fbamappin_id" id="fbamappin_id">
              <input type="hidden"   name="disposition_id" id="disposition_id">
         <center>          
           <input type="submit" name="submit"  class="btn btn-primary" value="submit">
         </center>
         </form>
          </div>
  
  </div>
</div>
<div class="table-responsive col-md-12">
  <table  class="table table-bordered table-striped" id="crm_followup_tb" >
     <thead>
            <tr>
                <th>ID</th>
                <th>Assigned by</th>
                <th>Assigne Internal</th>
                <th>Assigne external</th>
                <th>create at</th>
                <th>Remark</th>
                <th>Action</th>
                <th>followup date</th>                               
          </tr>
   </thead>
   <tbody>     
     @foreach($query as $val)
     <tr>
         <td>{{$val->history_id}}</td>
         <td>{{$val->user_id}} </td>
         <td>@if($val->assignment_id){{$val->assignment_id."-".$val->Profile}}@endif </td>
         <td>@if($val->assign_external_id){{$val->assign_external_id."-".$val->Profile}}@endif</td>
         <td>{{$val->create_at}} </td>
         <td>{{$val->remark}} </td>
        <?php $class =($val->action=="n")? 'color: #00C851': ' color:#ff4444'; ?>          
         <td  style="{{$class}}">{{$val->action==="n"?"close":"open"}}</td>
         <td>{{$val->followup_date}} </td>         
     </tr>
     @endforeach
   </tbody>
  </table>
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
        <h4 class="modal-title" id="classModalLabel">CRM History</h4>
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
 

        $.get("{{url('crm-followup-disposition')}}",{historyid:"{{$history_id}}"}).done(function(msg){ 

 
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
$('#crm_disposition_tb').DataTable();
$('input:radio[name=action]').change(function() {  
if (this.value == 'y') {
$('#followup_date_id').show();
}else if (this.value == 'n') {
$('#followup_date').val('');
$('#followup_date_id').hide();
$("#followup_date").prop('required',false);
}
});
});
</script>

 
@endsection
<style type="text/css">
  #classModal_followup {}

.modal-body {
  overflow-x: auto;
}

</style>








