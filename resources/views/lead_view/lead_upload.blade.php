@extends('include.master')
@section('content')



 
       <div class="container-fluid white-bg">
       <div class="col-md-12"><h3 class="mrg-btm">Import in Database</h3></div>
       
     

     @if($message = Session::get('success'))
    <div class="alert alert-info alert-dismissible fade in" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
        <strong>Success!</strong> {{ $message }}
      </div>
  @endif
   {!! Session::forget('success') !!}


           
    <a href="{{ URL::to('lead_up_load/back_ofice.xls') }}"><button class="btn btn-success">Download CSV</button></a>
  <form style="border: 4px solid #a1a1a1;margin-top: 15px;padding: 10px;" action="{{ URL::to('import-excel') }}" class="form-horizontal" method="post" enctype="multipart/form-data">
    {{ csrf_field() }}
    <input type="file" name="import_file" />
    <button class="btn btn-primary">Import File</button>
  </form>

  
       <div class="col-md-12">
       <div class="overflow-scroll">
       <div class="table-responsive" >

      <table class="datatable-responsive table table-striped table-bordered dt-responsive nowrap" id="example">
                                    <thead>
                  
                                       <tr >
                                       
                                       <th>ID</th>
                                     <!--   <th>ref_no</th> -->
                                       <th>Name</th>
                                       <th>Mobile</th>
                                       <th>Email</th>
                                       <th>DOB</th>
                                       <th>Profession</th>
                                       <th>Monthly_income</th>
                                     <!--   <th>product_id</th> -->
                                       <th>Pan No</th>
                                       <th>City Name</th>
                                       <th>Address</th>
                                       <th>Pin code</th>
                                      <!--  <th>source_id</th>
                                       <th>lead_source</th> -->
                                       <th>Lead Type</th>
                                       <th>Campaign  </th>
                                       <!-- <th>User ID</th> -->
                                    <!--    <th>IP Address</th> -->
                                       <th>Lead Status</th>
                                       <th>Lead Date</th>
                                       <th>Followup Date</th>
                                       <th>Remark</th>
                                     <!--   <th>is_deleted</th>
                                       <th>Flag</th> -->
                                       <th>Date</th>
                                      <!--  <th>Updated_on</th> -->
                                       <th>Video click</th>
                                       <th>Misscall  </th>
                                         <th>languages   </th>

                                          <th>view detials </th>
                                        
                                      </tr>

                                    </thead>
                                    <tbody>


                                      
                                      @foreach($query as $val)
                              
                                        <?php  $class =($val->conf_status==1)? 'background-color: #00C851': '';  ?>
                                       <tr  style="{{$class}};" >
                                       <td> <a href="#" onclick="get_fn_id('{{$val->id}}','{{$val->mobile}}','{{$val->name}}','{{$val->conf_status}}')" >{{$val->id}}</a> </td>
                                         
                                       <td>{{$val->name}}</td>
                                       <td><a href="#" onclick="leadd_update_client('{{$val->id}}','{{$val->mobile}}','{{$val->name}}','{{$val->email}}','{{$val->dob}}','{{$val->profession}}','{{$val->monthly_income}}','{{$val->pan}}','{{$val->cityname}}','{{$val->address}}','{{$val->pincode}}','{{$val->campaign_id}}')" >{{$val->mobile}}</a></td>  
                                       <td>  {{$val->email}} </td>
                                       <td>{{$val->dob}}</td>
                                       <td>{{$val->profession}}</td>
                                       <td>{{$val->monthly_income}}</td>
                                   
                                       <td>{{$val->pan}}</td>
                                       <td>{{$val->cityname}}</td>
                                       <td>{{$val->address}}</td>
                                       <td>{{$val->pincode}}</td>
                                   
                                       <td>{{$val->lead_type}}</td>
                                       <td>{{$val->campaign_id}}</td>
                                   
                                       
                                       <td   >{{$val->lead_status_id}}</td>
                                       <td>{{$val->lead_date}}</td>
                                       <td>{{$val->followup_date}}</td>
                                       
                                       <td >{{$val->remark}}</td>
                                       <td>{{$val->created_on}}</td>
                                   
                                      <?php  $video_click =($val->video_click==1)?'Yes': 'NO';  ?>
                                       <?php  $misscall =($val->misscall==1)?'Yes': 'NO';  ?>
                                        <td >{{$video_click}}</td>
                                        <td>{{$misscall}}</td>
                                        <td>{{$val->lang}}</td>

                                        
                                       <td> <a href="#" onclick="viewdetilas('{{$val->id}}');">view</a> </td>
                                     
                                        
                                      </tr>
                                      @endforeach

                                  </tbody>
           
            </table>
      </div>
      </div>
      </div>
      </div>


            
 
<div class="modal fade" id="lead_up_load-Modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Lead</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <form class="form-horizontal" method="post"  id="lead_up_from" > {{ csrf_field() }}
      <input type="hidden" name="lead_id" id="lead_id"  >
       <input type="hidden" name="mobile" id="lead_id_mobile" >

       

  <div class="form-group">
            <label for="inputEmail" class="control-label col-xs-2">ID</label>
            <div class="col-xs-10" > <input type="text" id="lead_id_lead"  class="form-control"  readonly=""> </div>
  </div> 
   
     <div class="form-group">
            <label for="inputEmail" class="control-label col-xs-2">name</label>
            <div class="col-xs-10" > <input type="text" id="lead_id_name"  class="form-control"  readonly=""> </div>
  </div> 
   

        
   <div class="form-group">
            <label for="inputEmail" class="control-label col-xs-2">Remark</label>
            <div class="col-xs-10">
            <textarea name="remark" id="remark"></textarea>
            </div>
  </div> 



        <div class="form-group">
            <label for="inputEmail" class="control-label col-xs-2">lead status   </label>
            <div class="col-xs-10">
            <select class="form-control" name="lead_status_id" id="lead_status_id">
               <option value="0" > SELECT --</option>
               
               @foreach($lead_status as $le)
                   <option value="{{$le->id}}" >{{$le->name}}</option>
               @endforeach

        </select>
                  <span id="valid_ag_rto_id" class="help-inline"></span>
            </div>
        </div>


 <div class="form-group" id="lead_status_followup" style="display: none">
            <label for="inputEmail" class="control-label col-xs-2">Follow Up Date</label>
            <div class="col-xs-10">
          <div id="datepicker" class="input-group date" data-date-format="yyyy-mm-dd">
               <input class="form-control" type="text" placeholder="From Date" name="lead_followup"  id="lead_followup"  />
              <span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
              </div>
            </div>
</div> 

        <div class="form-group">
            <label for="inputEmail" class="control-label col-xs-2">lead type   </label>
            <div class="col-xs-10">
            <select class="form-control" name="lead_type_id" id="lead_type_id">
               <option value="0" > SELECT --</option>
               
               @foreach($lead_type as $lty)
                   <option value="{{$lty->id}}" >{{$lty->name}}</option>
               @endforeach

        </select>
                  <span id="valid_ag_rto_id" class="help-inline"></span>
            </div>
        </div>


        
      </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" id="lead_up_id">Save changes</button>
      </div>
    </div>
  </div>
</div>


<div class="modal fade" id="Test-interested_id-Modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Interested person </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <form class="form-horizontal" method="post"  id="interested_form" > {{ csrf_field() }}
      <input type="hidden" name="lead_id" id="lead_id_interested" >
      <input type="hidden" name="mobile" id="lead_id_mobile" >
       <div class="form-group">
                <label for="inputEmail" class="control-label col-xs-2">Message</label>
                <div class="col-xs-10">
                <textarea name="message" id="message_id"  class="form-control"  ></textarea>
                </div>
      </div> 
       <div class="form-group">
                  <label for="inputEmail" class="control-label col-xs-2">Link</label>
                  <div class="col-xs-10">
                    <input type="text" name="link" id="link_id"  class="form-control" >
                  </div>
        </div> 
      </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" id="interested_id">Save changes</button>
      </div>
    </div>
  </div>
</div>








<div class="modal fade" id="lead-update-client-Modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Lead Upadte</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <form class="form-horizontal" method="post"  id="lead_update_client_form" > {{ csrf_field() }}
      <input type="hidden" name="lead_id" id="clientId" >
       <div class="form-group">
                <label for="inputEmail" class="control-label col-xs-2">Name</label>
                <div class="col-xs-10">
                  <input type="text" name="name" id="clientName"  class="form-control" required   >
                  <label class="control-label" for="inputError" id="Errorname"></label>
                </div>
      </div> 
       <div class="form-group">
                  <label for="inputEmail" class="control-label col-xs-2">Mobile</label>
                  <div class="col-xs-10">
          <input type="text" name="mobile" id="clientMobile"  maxlength="10" onkeypress="return Numeric(event)"  class="form-control" >

           <label class="control-label" for="inputError" id="Errormobile"></label>
                  </div>
        </div> 

          <div class="form-group">
                  <label for="inputEmail" class="control-label col-xs-2">Email</label>
                  <div class="col-xs-10">
                    <input type="text" name="email" id="clientEmail"  class="form-control" >
                    <label class="control-label" for="inputError" id="Erroremail"></label>
                  </div>
         </div> 


         <div class="form-group">
                  <label for="inputEmail" class="control-label col-xs-2">DOB</label>
                  <div class="col-xs-10">
                   
                      <div id="datepicker_date"  class="input-group date" data-date-format="dd-mm-yyyy">
                       <input class="form-control" type="text" name="dob" placeholder="From Date" id="datepicker_date"  >
                      <span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>

                     
                      </div>
                        <label class="control-label" for="inputError" id="Errordob"></label>

                  </div>
        </div> 



      <!--    <div class="form-group">
                  <label for="inputEmail" class="control-label col-xs-2">Profession</label>
                  <div class="col-xs-10">
                    <input type="text" name="profession" id="clientProfession"  class="form-control" >
                    <label class="control-label" for="inputError" id="Errorprofession"></label>
                  </div>
        </div>  -->


        <!-- <div class="form-group">
                  <label for="inputEmail" class="control-label col-xs-2">Monthly income</label>
                  <div class="col-xs-10">
                    <input type="text" name="monthly_income" id="clientMonthly_income"  class="form-control" >
                     <label class="control-label" for="inputError" id="Error"></label>
                  </div>
        </div>  -->



        <div class="form-group">
                  <label for="inputEmail" class="control-label col-xs-2">Pan No</label>
                  <div class="col-xs-10">
                    <input type="text" name="pan_no" id="pan_no"  class="form-control clientPan" oninput="pan_card('pan_no')" maxlength="10"  >
                    <span id="pan_number" style="display:none;color: red;">Oops.Please Enter Valid Pan Number.!!</span>
                  </div>
        </div> 


        <!-- <div class="form-group">
                  <label for="inputEmail" class="control-label col-xs-2">City Name</label>
                  <div class="col-xs-10">
                    <input type="text" name="cityname" id="clientCityname"  class="form-control" >
                  </div>
        </div> --> 


          <div class="form-group">
                  <label for="inputEmail" class="control-label col-xs-2">Address</label>
                  <div class="col-xs-10">
                    <input type="text" name="address" id="clientAddress"  class="form-control" >
                  </div>
        </div> 


          <div class="form-group">
                  <label for="inputEmail" class="control-label col-xs-2">Pin code</label>
                  <div class="col-xs-10">
                    <input type="text" name="pincode" id="clientPincode"  onkeypress="return Numeric(event)"  class="form-control" >
                  </div>
        </div> 

 

           <!-- <div class="form-group">
                  <label for="inputEmail" class="control-label col-xs-2">Campaign</label>
                  <div class="col-xs-10">
                    <input type="text" name="campaign" id="clientCampaign_id"  class="form-control" >
                  </div>
          </div>  -->


          



      </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" id="lead_update_client_id">Save changes</button>
      </div>
    </div>
  </div>
</div>

 
 
   <!--    followup_history -->
 <div class="modal fade" id="followup-history-Modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">View-history </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
       
        <table class="datatable-responsive table table-striped table-bordered dt-responsive nowrap" id="example">

          <thead><tr><th>ID</th><th>Lead Type</th><th>Lead Status</th> <th>Remark</th></tr></thead>
          <tbody id="followup_history_id"></tbody> 
        </table>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        
      </div>
    </div>
  </div>
</div>
                                      


@endsection


<script type="text/javascript">
    function viewdetilas(argument) {
              $('#followup_history_id').empty();
              $('#followup-history-Modal').modal('show');
              $.get("{{url('followup-history')}}",{'ID':argument}).done(function(data){ 
                var arr=Array();
              $.each(data,function(index,val){      
                    arr.push('<tr><td>'+index+'</td><td>'+val.lead_type+'</td><td>'+val.lead_status_id+'</td><td>'+val.remark+'</td></tr>');
               });
              $('#followup_history_id').append(arr);
               }).fail(function(xhr, status, error) {
                 console.log(error);
                });

       
    }


 
</script>

<style type="text/css">
  
  .radio-green [type="radio"]:checked+label:after {
    border-color: #00C851;
    background-color: #00C851;
}l
/*Gap*/

.radio-green-gap [type="radio"].with-gap:checked+label:before {
    border-color: #00C851;
}

.radio-green-gap [type="radio"]:checked+label:after {
    border-color: #00C851;
    background-color: #00C851;
}
 
</style>
 