@extends('include.master')
@section('content')   
<div class="container-fluid white-bg">
       <div class="col-md-12"><h3 class="mrg-btm">CRM FBA</h3></div>
       <div class="col-md-12">
       <div class="overflow-scroll">
       <div class="table-responsive" >
       <!-- Modal -->


<a href="{{url('my-followup')}}" class="btn btn-success">My-Followup</a>
<a  href="{{url('assign-followup')}}" class="btn btn-warning">Assign-Followup</a>


  <table id="example" class="table table-bordered table-striped tbl" >
   <thead>
                  <tr>
                   <th>ID</th>
                   <th>FBA ID</th>
                    
                                
                  </tr>
   </thead>
   <tbody>

     @foreach($query as $val)
      <tr>
          <td  ><a href="{{url('crm-disposition')}}/{{$val->id}}"   >{{$val->id}}</a></td> 
          <td  >{{$val->fba_id}} </td> 
           
  
       
     </tr>
      @endforeach
      
</tbody>

</table>

<div class="CRM_Disposition modal fade" role="dialog">   
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
        <h4 class="modal-title">CRM Disposition</h4>
        </div>
        <div class="modal-body">
        <form id="CRM_Disposition_from">{{ csrf_field() }}
           <input type="hidden" name="fbamappin_id" id="fbamappin_id">


           <div class="form-group row">
      
            <div class="col-sm-10">
              <select class="form-control  " data-style="btn-success" name="crm_id" id="disposition">
                 <option selected="">select</option>
              </select>
            </div>
          </div> 


 
            
         <!--  <div class="form-group row">
            <label for="inputPassword" class="col-sm-4 col-form-label">Type of Call:</label>
            <div class="col-sm-8">
              <select class="form-control  " data-style="btn-success" name="type_of_call">
                <option selected value="">Select</option>
                <option value="Onboarding Sales" >Onboarding Sales</option>
                <option value="Documents Related">Documents Related</option>
                <option value="Engagement Call">Engagement Call</option>
                <option value="Auto Call">Auto Call</option>
                <option value="Product Information">Product Information</option>
                <option value="Training Information">Training Information</option>
              </select>
            </div>
          </div> -->


      <!--     <div class="form-group row">
            <label for="inputPassword" class="col-sm-4 col-form-label">Connect Result:</label>
            <div class="col-sm-8">
             <select class="form-control  " data-style="btn-success" name="connect_result"  onchange="connectresult(this);" >
              <option selected value="">Select</option>
              <option value="1">Connected</option>
              <option value="2">Not Conneted</option>
              </select>
            </div>
          </div>
        
           <div class="form-group row">
            <label for="inputPassword" class="col-sm-4 col-form-label">Outcome</label>
            <div class="col-sm-8">
                <select class="form-control  " data-style="btn-success" name="outcome">
                <option selected value="">Select</option>
                <option value="Interested">Interested</option>
                <option value="Not Interested">Not Interested</option>
                <option value="Closed">Closed</option>
                <option value="NA">NA</option>
                <option value="Follow Up">Follow Up</option>
                <option value="Request">Request</option>
              </select>
            </div>
          </div>


           <div class="form-group row">
            <label for="inputPassword" class="col-sm-4 col-form-label">Disposition</label>
            <div class="col-sm-8">
              <select class="form-control  " data-style="btn-success" name="disposition">
                  <option selected value="">Select</option>
                  <option value="Personal Visit Required">Personal Visit Required</option>
                  <option value="ervice Issues - MFM">Service Issues - MFM</option>
                  <option value="Service Issues - DC">Service Issues - DC</option>
                  <option value="Not Interested AT ALL">Not Interested AT ALL</option>
                  <option value="Onboarding Fee Paid">Onboarding Fee Paid</option>
                  <option value="Co/Partner Employee">Co/Partner Employee</option>
                  <option value="Channel Partner">Channel Partner</option>
                  <option value="No Answer">No Answer</option>
                  <option value="Not Reachable">Not Reachable</option>
                  <option value="Number is incorrect">Number is incorrect</option>
                  <option value="Documents Complete">Documents Complete</option>
                  <option value="Documents Pending">Documents Pending </option>
                  <option value="Not Interested">Not Interested </option>
                  <option value="Training Required">Training Required</option>
                  <option value="Product Info Required - Motor">Product Info Required - Motor</option>
                  <option value="Product Info Required - Health">Product Info Required - Health</option>
                  <option value="Product Info Required - Life">Product Info Required - Life</option>
                  <option value="Product Info Required - Loans">Product Info Required - Loans</option>
                  <option value="Product Info Required - Finpeace">Product Info Required-Finpeace</option>
                  <option value="Product Info Required - Health Assure">Product Info Required - Health Assure</option>
                  <option value="Product Info Required - Other">Product Info Required - Other</option>
                  <option value="Not Reachable">Not Reachable</option>
                  <option value="Open">Open</option>
                  <option value="Product - Motor">Product - Motor</option>
                  <option value="Product - Health">Product - Health</option>
                  <option value="Product - Life">Product - Life</option>
                  <option value="Product - Finpeace">Product - Finpeace</option>
                  <option value="Product - Healthassure">Product - Healthassure</option>
                  <option value="Product - Loans/CC">Product - Loans/CC</option>
                  <option value="Others">Others</option>


              </select>
            </div>
          </div>


  
          <div class="form-group row">
            <label for="inputPassword" class="col-sm-4 col-form-label">Sub Disposition:</label>
            <div class="col-sm-8">
              <select class="form-control  " data-style="btn-success" name="sub_disposition">
               <option selected value="">Select</option>
               <option value="Follow up">Follow up </option>
               <option value="Do not call again">Do not call again</option>
               <option value="NA">NA</option>
               <option value="All Docs Received">All Docs Received</option>
               <option value="List of Docs Pending">List of Docs Pending</option>
               <option value="Refund onboarding Fee">Refund onboarding Fee</option>
               <option value="Information Given">Information Given</option>
               <option value="Information to be Given">Information to be Given</option>
               <option value="Others">Others</option>
              </select>
            </div>
          </div>


          <div class="form-group row">
            <label for="inputPassword" class="col-sm-4 col-form-label">Follow up Required:</label>
            <div class="col-sm-8">
              <select class="form-control  " data-style="btn-success" name="follow_up_required">
              <option selected value="" >Select</option>
              <option value="Y">Y</option>
              <option value="N">N</option>
              </select>
            </div>
          </div> -->  

        </form>
        <div class="modal-footer"> 
            <button class="btn btn-default" type="button" id="CRM_Disposition_btn" >Sumbit</button>
          <button class="btn btn-default" type="button" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>
</div>

      </tbody>
      </table>
      </div>
      </div>
      </div>
      </div>


      
<div class="crm_view_history modal fade" role="dialog">   
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
        <h4 class="modal-title">CRM History</h4>
        </div>
       <!--  <div class="modal-body"> -->
         
               
  <table   class="table table-bordered table-striped  " >
   <thead>
                  <tr>
                   <th>ID</th>
                   <th>Employee_Category</th>
                    <th>Type of Call </th>
                     <th>Connect Result</th>
                     <th>Outcome</th>
                     <th>Disposition</th>
                     <th>Sub Disposition</th>
                     <th>Follow up Required</th>
                                
                  </tr>
   </thead>
   <tbody  id="appand_hostory">

      
     
      
</tbody>

</table>
       
        <div class="modal-footer"> 
          <!--   <button class="btn btn-default" type="button" id="CRM_Disposition_btn" >Sumbit</button> -->
          <button class="btn btn-default" type="button" data-dismiss="modal">Close</button>
        </div>
    <!--   </div> -->
    </div>
  </div>
</div>
   
   <script type="text/javascript">      
     var data=0;
//       function CRM_Disposition(id){
//             $('#fbamappin_id').val(id);
//              $('#disposition').empty();
//             $.get('crm-disposition',{id:id}).done(function(res){
//                         arra=[];
//                        $.each(res,function(inex,val){
//                        arra.push('<option value="'+val.id+'">'+val.disposition+'&nbsp;&nbsp;&nbsp;--'+val.sub_disposition+'</option>');
//                          });

             


//                        $('#disposition').append(arra);
//             }).fail(function(xml,Status,error){
//                console.log(xml);
//             });
              

//             $('.CRM_Disposition').modal('show');
//       }

 

// $(document).on('click','#CRM_Disposition_btn',function(e){ e.preventDefault();
           
//            data=$('#CRM_Disposition_from').serialize();
//            $.post("{{url('crm-disposition')}}",data).done(function(respo){

//               window.location="{{url('user-role')}}";

//            }).fail(function(xml,Status,error){
               
//                console.log(xml);
//            });
         
// });



function view_history(id){  

         
$('#appand_hostory').empty();
          $.get('crm-view-history',{crm_id:id}).done(function(res){
                  
                   console.log(res);

                       arr=[];
                       $.each(res,function(inex,val){
                       
                         arr.push('<tr><td>'+val.id+'</td><td>'+1+'</td><td>'+val.calltype+'</td><td>'+val.connect_result+'</td><td>'+val.outcome+'</td><td>'+val.disposition+'</td><td>'+val.sub_disposition+'</td><td>'+val.followup_required+'</td></tr>');
                             
            
                         });
                 
               $('#appand_hostory').append(arr);
               $('.crm_view_history').modal('show');
                       
         }).fail(function(xml,Status,error){
               
               console.log(xml);
           });
}

   </script>

 
@endsection








