@extends('include.master')
@section('content')   
<div class="container-fluid white-bg">
       <div class="col-md-12"><h3 class="mrg-btm">CRM Followup</h3></div>
       <div class="col-md-12">
       <div class="overflow-scroll">
       <div class="table-responsive" >
       


       <form  method="post" action="{{url('crm-disposition')}}" id="CRM_Disposition_from">{{ csrf_field() }}
           
          <!--   <input type="hidden" name="disposition_id" id="disposition_id"  > -->


          <div id="id_none" style="display:none">
            <div class="form-group row">
            <label for="inputPassword" class="col-sm-4 col-form-label">Disposition</label>
            <div class="col-sm-8">

             <input type="text" class="form-control"  name="crm_id" id="disposition_" readonly>
               
            </div>
          </div> 

             
            

             <div class="form-group row">
                   <label for="inputPassword" class="col-sm-4 col-form-label">calltype</label>
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
                   <label for="inputPassword" class="col-sm-4 col-form-label">connect_result</label>
               <div class="col-sm-8">
                 <input type="text"  class="form-control" readonly id="connect_result">

              </div>
            </div>

              <div class="form-group row">
                   <label for="inputPassword" class="col-sm-4 col-form-label">emp_category</label>
               <div class="col-sm-8">
                <input type="text"  class="form-control" readonly id="emp_category">

              </div>
            </div>
 

      <!--       <div class="form-group row">
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
               <div class="col-sm-8">
                  <label class="radio-inline"><input type="radio" value="y" checked="checked" name="action">Open</label>
                  <label class="radio-inline"><input type="radio" value="n" name="action">Close</label>

              </div>
            </div>

 

            <div class="form-group row" id="followup_internalteam_id" style="display: none">
            <label for="inputPassword" class="col-sm-4 col-form-label">task assignment</label>
            <div class="col-sm-8">
              <input type="text"  class="form-control"  readonly name="assignment_id"   id="followup_internalteam">
            </div>
          </div> -->
              

            
          </div>
            




       <!--   <center>
            <button class="btn btn-default" type="button"  id=CRM_Disposition_btn >sumbit</button>


         </center> -->
         </form>


  <table   class="table table-bordered table-striped  " id="crm_followup_tb" >
   <thead>
                  <tr>
                   <th>ID</th>
                   <th>Assigned by</th>
                    <th>Assigne </th>
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


 

<script type="text/javascript">


 
 
function followup_disposition(historyid){


 

        $.get("{{url('crm-followup-disposition')}}",{historyid:historyid}).done(function(msg){ 

            $('#disposition_id').val(msg.res.id);
            $('#disposition_').val(msg.res.disposition);
            $('#calltype').val(msg.res.calltype);
            $('#connect_result').val(msg.res.connect_result);
            $('#Outcome').val(msg.res.outcome);
            $('#emp_category').val(msg.res.emp_category);
          //  $('#followup_externalteam').val(res.followup_externalteam);
           // $('#followup_internalteam').val(msg.res.followup_internalteam);

                console.log(msg);
            
 $('#followup_internalteam_id').show();
 $('#id_none').show();
            


         }).fail(function(xml,Status,error){
               console.log(xml);
          });


  } 



$(document).ready(function () {
            $('#crm_followup_tb').DataTable();
        });
</script>

 
@endsection








