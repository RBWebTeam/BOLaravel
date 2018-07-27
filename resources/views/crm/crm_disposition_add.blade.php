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
           <input type="hidden" name="assign_id" id="assign_id"  value="{{$assign_id}}" >
           <input type="hidden" name="historyid" id="historyid"  value="{{$historyid}}" >

           

            <div class="form-group row">
            <label for="inputPassword" class="col-sm-4 col-form-label">Disposition</label>
            <div class="col-sm-8">
              <select class="form-control  " data-style="btn-success" name="crm_id" id="disposition">
                <option selected value=""  >Select Disposition</option>
                @foreach($query as $val)
             
                 

                <option value="{{ $val->id}}"  >{{$val->disposition."&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;".$val->sub_disposition}}</option>
                @endforeach
              </select>
            </div>
          </div> 

             
            <!--  <div id="id_none" style="display:none"> -->

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

            <div class="form-group row" id="followup_date_id">
             <label for="inputPassword" class="col-sm-4 col-form-label">Followup Date</label>
                <div class="col-sm-8">
                 <div id="datepicker" class="input-group date" data-date-format="mm-dd-yyyy">
              <input type="text"  class="form-control date-range-filter "  name="followup_date" id="followup_date" required >
              <span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
              </div>
              </div>
            </div>

               
           <div class="form-group row">
                   <label for="inputPassword" class="col-sm-4 col-form-label">Remark</label>
               <div class="col-sm-8">
                 <!--  <input type="text"  class="form-control"  > -->
                 <textarea required name="remark"  class="form-control"   id="remark"></textarea>

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
            <label for="inputPassword" class="col-sm-4 col-form-label">task assignment internal </label>
            <div class="col-sm-8">
              <input type="text"  class="form-control"  readonly name="assignment_id"   id="followup_internalteam">
            </div>
          </div>
              

          <div class="form-group row" id="followup_externalteam_id" style="display: none">
            <label for="inputPassword" class="col-sm-4 col-form-label">task assignment external</label>
            <div class="col-sm-8">
              <input type="text"  class="form-control"  readonly name="assign_external_id"   id="followup_externalteam">
            </div>
          </div>

            
  <!--         </div> -->
            




         <center>
            <button class="btn btn-default" type="button"  id=CRM_Disposition_btn >submit</button>


         </center>
         </form>

 
 
 

  </div>
</div>
</div>
</div>


 

<script type="text/javascript">

function get_desposition_data(fbamappin_id,id){  

  $.get("{{url('crm-disposition-id')}}",{id:id,fbamappin_id:fbamappin_id}).done(function(msg){ 
            $('#disposition_id').val(msg.res.id);
            $('#calltype').val(msg.res.calltype);
            $('#connect_result').val(msg.res.connect_result);
            $('#Outcome').val(msg.res.outcome);
            $('#emp_category').val(msg.res.emp_category);
 
          if(msg.ischeck.fbamappin_id!=0){
          if (confirm("Your disposition id already add if You wont to go  followup than click ok..")) {
          window.location="{{url('crm-followup')}}/"+msg.ischeck.fbamappin_id+'/'+msg.ischeck.crm_id+'/'+msg.ischeck.history_id;
          }else{
             location.reload();
          }
          }else{
            
              if(msg.find_profile!="undefined" && msg.find_profile!=null && msg.find_profile!=""){  
              $('#followup_internalteam').val(msg.find_profile.UId); //msg.find_profile.Profile
              $('#followup_internalteam_id').show();
              }else{
              $('#followup_internalteam_id').hide();
              }
              if(msg.find_profile1!="undefined" && msg.find_profile1!=null && msg.find_profile1!=""){  
              $('#followup_externalteam').val(msg.find_profile1.UId); //msg.find_profile.Profile
              $('#followup_externalteam_id').show();
              }else{
              $('#followup_externalteam_id').hide();
              } $('#id_none').show();
          }
             
         }).fail(function(xml,Status,error){
               console.log(xml);
          });


}


// window.onload = function() {
//   get_desposition_data("{{$fbamappin_id}}",$('#disposition').val() );
// };
 
 
 
  $(document).on('change','#disposition',function(){
          id=$(this).val();  
          fbamappin_id=$('#fbamappin_id').val();
       get_desposition_data(fbamappin_id,id);

  });


  $(document).on('click','#CRM_Disposition_btn',function(e){ e.preventDefault();
           data=$('#CRM_Disposition_from').serialize();
           if($('#disposition').val()!='' && $('#remark').val()!='' ){
           $.post("{{url('crm-disposition')}}",data).done(function(respo){ 
                window.location="{{url('crm-disposition')}}/{{$fbamappin_id}}";
              // location.reload();
           }).fail(function(xml,Status,error){
               console.log(xml);
           });
         }else{
             alert("Please fill out this field ...");
         }
});

$(document).ready(function () {  
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








