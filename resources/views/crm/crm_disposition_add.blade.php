@extends('include.master')
@section('content')
<link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
<script src="//code.jquery.com/jquery-1.10.2.js"></script>
<script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
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
       <div class="col-md-12 fbadetails"><h3 class="mrg-btm">CRM FBA</h3></div>
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
       <form  method="post" action="{{url('crm-disposition')}}" id="CRM_Disposition_from">{{ csrf_field() }}
           <input type="hidden" name="fbamappin_id" id="fbamappin_id" value="{{$fbamappin_id}}">
           <input type="hidden" name="disposition_id" id="disposition_id">
           <input type="hidden" name="assign_id" id="assign_id"  value="{{$assign_id}}" >
           <input type="hidden" name="historyid" id="historyid"  value="{{$historyid}}" >         

            <div class="form-group row">
            <label for="inputPassword" class="col-md-2 col-form-label">Disposition <b style="color: red; font-size: 15px;">*</b></label>
            <div class="col-md-6">
              <select class="form-control"data-style="btn-success" name="crm_id" id="disposition">
                <option selected value="">Select Disposition</option>
                @foreach($query as $val)
                <option value="{{ $val->id}}"  >{{$val->disposition."&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;".$val->sub_disposition}}</option>
                @endforeach
              </select>
            </div>
          </div>              
            <!--  <div id="id_none" style="display:none"> -->

             <div class="form-group row">
                   <label for="inputPassword" class="col-md-2 col-form-label">Call Type <b style="color: red; font-size: 15px;">*</b></label>
               <div class="col-md-6">
                 <input type="text" class="form-control"  id="calltype" readonly>

              </div>
            </div>


             <div class="form-group row">
                   <label for="inputPassword" class="col-md-2 col-form-label">Outcome <b style="color: red; font-size: 15px;">*</b></label>
               <div class="col-md-6">
                 <input type="text"  class="form-control" readonly id="Outcome">

              </div>
            </div>

              <div class="form-group row">
                   <label for="inputPassword" class="col-md-2 col-form-label">Connect Result <b style="color: red; font-size: 15px;">*</b></label>
               <div class="col-md-6">
                 <input type="text"  class="form-control" readonly id="connect_result">

              </div>
            </div>

              <div class="form-group row">
                   <label for="inputPassword" class="col-md-2 col-form-label">Emp Category <b style="color: red; font-size: 15px;">*</b></label>
               <div class="col-md-6">
                <input type="text"  class="form-control" readonly id="emp_category">

              </div>
            </div>
            <div class="form-group row" id="followup_date_id">
             <label for="inputPassword" class="col-md-2 col-form-label">Followup Date <b style="color: red; font-size: 15px;">*</b></label>
                <div class="col-md-6">             
                  <input type="datetime-local"  class="form-control"  name="followup_date" id="followup_date" required >
              </div>
            </div>

               
           <div class="form-group row">
                   <label for="inputPassword" class="col-md-2 col-form-label">Remark <b style="color: red; font-size: 15px;">*</b></label>
               <div class="col-md-6">                
                 <textarea required name="remark"  class="form-control"   id="remark"></textarea>
              </div>
            </div>


             <div class="form-group row">
                   <label for="inputPassword" class="col-md-2 col-form-label">Action <b style="color: red; font-size: 15px;">*</b></label>
               <div class="col-md-6">
                  <label class="radio-inline"><input type="radio" value="y" checked="checked" name="action">Open</label>
                  <label class="radio-inline"><input type="radio" value="n" name="action">Close</label>

              </div>
            </div>

 

            <div class="form-group row" id="followup_internalteam_id" style="display: none">
            <label for="inputPassword" class="col-md-2 col-form-label">Task Assignment Internal</label>
            <div class="col-md-1">
              <input type="text" class="form-control" readonly name="assignment_id" id="followup_internalteam">
            </div>
               <div class="col-md-3">
              <span id="txtusername" style="font-size: 20px;"></span>
            </div>
          </div>
              

          <div class="form-group row" id="followup_externalteam_id" style="display: none">
            <label for="inputPassword" class="col-md-2 col-form-label">Task Assignment External</label>
            <div class="col-md-6">
              <input type="text"  class="form-control"  readonly name="assign_external_id"   id="followup_externalteam">
            </div>
          </div>            
  <!-- </div> -->
           <div class="col-md-12 col-md-offset-3">
            <button class="btn btn-primary" type="button"  id=CRM_Disposition_btn >submit</button>
          </div>
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
              $('#followup_internalteam').val(msg.find_profile.UId);
              $('#txtusername').text(msg.find_profile.EmployeeName);                
              $('#followup_internalteam_id').show();
              }else{
                getcrmexception();                           
              }
              if(msg.find_profile1!="undefined" && msg.find_profile1!=null && msg.find_profile1!=""){  
              $('#followup_externalteam').val(msg.find_profile1.UId+'-'+msg.find_profile.EmployeeName); //msg.find_profile.Profile
              $('#followup_externalteam_id').show();
              }else{
              $('#followup_externalteam_id').hide();              
              } $('#id_none').show();
          }
             
         }).fail(function(xml,Status,error){
               console.log(xml);
          });


}
 
 
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

$(document).ready(function (){  
   $('#crm_disposition_tb').DataTable();
   $('input:radio[name=action]').change(function()
    {  
   if (this.value == 'y') 
   {
     $('#followup_date_id').show();
   }else if (this.value == 'n') 
   {
     $('#followup_date').val('');
     $('#followup_date_id').hide();
     $("#followup_date").prop('required',false);
   }
});
});
function getcrmexception()
{
 var disposition=$("#disposition").val();
 $.ajax({
             url: 'get_crm_exception/'+disposition,
             type: "GET",             
             success:function(data) 
             {
              //alert(data);
                        
             if (data!='') {            
               var obj = JSON.parse(data);
              $('#followup_internalteam').val(obj.UId);
              $('#txtusername').text(obj.EmployeeName);
              $('#followup_internalteam_id').show();
            }else{
              $('#followup_internalteam').val('');
              $('#followup_internalteam_id').hide();
              $('#txtusername').text('');
             }
            }
         });
}
 </script>

@endsection








