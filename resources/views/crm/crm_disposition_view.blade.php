@extends('include.master')
@section('content')   
<div class="container-fluid white-bg">
       <div class="col-md-12"><h3 class="mrg-btm">CRM FBA</h3></div>
       <div class="col-md-12">
       <div class="overflow-scroll">
       <div class="table-responsive" >
       


       <form  method="post" action="{{url('crm-disposition')}}" id="CRM_Disposition_from">{{ csrf_field() }}
           <input type="hidden" name="fbamappin_id" id="fbamappin_id" value="{{$fbamappin_id}}">
            <input type="hidden" name="disposition_id" id="disposition_id"  >

            <div class="form-group row">
            <label for="inputPassword" class="col-sm-4 col-form-label">Disposition</label>
            <div class="col-sm-8">
              <select class="form-control  " data-style="btn-success" name="crm_id" id="disposition">
                <option selected value="">Select</option>
                @foreach($query as $val)
                <option value="{{ $val->id}}">{{$val->disposition."&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;".$val->sub_disposition}}</option>
                @endforeach
              </select>
            </div>
          </div> 

             
             <div id="id_none" style="display:none">

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
<!-- 
             <div class="form-group row">
                   <label for="inputPassword" class="col-sm-4 col-form-label">followup_externalteam</label>
               <div class="col-sm-8">
                <input type="text"  class="form-control" readonly id="followup_externalteam">

              </div>
            </div>

             <div class="form-group row">
                   <label for="inputPassword" class="col-sm-4 col-form-label">followup_internalteam</label>
               <div class="col-sm-8">
                  <input type="text"  class="form-control" readonly id="followup_internalteam">

              </div>
            </div> -->

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
                 <!--  <input type="text"  class="form-control"  > -->
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
          </div>
              

            
          </div>
            




         <center>
            <button class="btn btn-default" type="button"  id=CRM_Disposition_btn >sumbit</button>


         </center>
         </form>


  <table   class="table table-bordered table-striped  "  id="crm_disposition_tb">
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
   <tbody   >
     
     @foreach($history_db as $val)
     <tr>
         <td>{{$val->history_id}}</td>
         <td>{{$val->emp_category}}</td>
         <td>{{$val->calltype}}</td>
         <td>{{$val->connect_result}}</td>
         <td>{{$val->outcome}}</td>
         <td>{{$val->disposition}}</td>
         <td>{{$val->sub_disposition}}</td>
          <td>{{$val->followup_date}}</td>
          <td>{{$val->remark}}</td>
 

           <td>{{$val->action==="n"?"close":"open"}}</td>
          <td>{{$val->followup_required}}</td>
         
     </tr>

     @endforeach

   </tbody>
  </table>

  </div>
</div>
</div>
</div>


 

<script type="text/javascript">


 
 
  $(document).on('change','#disposition',function(){
          id=$(this).val();  
          fbamappin_id=$('#fbamappin_id').val();
        $.get("{{url('crm-disposition-id')}}",{id:id,fbamappin_id:fbamappin_id}).done(function(msg){ 
            $('#disposition_id').val(msg.res.id);
            $('#calltype').val(msg.res.calltype);
            $('#connect_result').val(msg.res.connect_result);
            $('#Outcome').val(msg.res.outcome);
            $('#emp_category').val(msg.res.emp_category);
          //  $('#followup_externalteam').val(res.followup_externalteam);
           // $('#followup_internalteam').val(msg.res.followup_internalteam);
 
             if(msg.find_profile!="undefined" && msg.find_profile!=null && msg.find_profile!=""){  
                   $('#followup_internalteam').val(msg.find_profile.UId);
                   $('#followup_internalteam_id').show();

             }else{
              $('#followup_internalteam_id').hide();
             }
              $('#id_none').show();
         }).fail(function(xml,Status,error){
               console.log(xml);
          });

  });
  $(document).on('click','#CRM_Disposition_btn',function(e){ e.preventDefault();
           data=$('#CRM_Disposition_from').serialize();
           $.post("{{url('crm-disposition')}}",data).done(function(respo){
               window.location="{{url('crm-disposition')}}/{{$fbamappin_id}}";
           }).fail(function(xml,Status,error){
               console.log(xml);
           });
         
});

$(document).ready(function () {
            $('#crm_disposition_tb').DataTable();
        });
 
</script>

 
@endsection








