<link rel="apple-touch-icon" href="/bootstrap/img/apple-touch-icon.png">
<link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" type="text/css" rel="stylesheet">

@extends('include.master')
@section('content')   
<div class="container-fluid white-bg">
       <div class="col-md-12"><h3 class="mrg-btm">CRM FBA</h3></div>
       <div class="col-md-12">
       <div class="overflow-scroll">
       <div class="table-responsive" >
       


       <form style="display: none"  method="post" action="{{url('crm-disposition')}}" id="CRM_Disposition_from">{{ csrf_field() }}
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

            <div class="form-group row" >
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

            
          </div>
            




         <center>
            <button class="btn btn-default" type="button"  id=CRM_Disposition_btn >submit</button>


         </center>
         </form>

 

   <a href="{{url('crm-new')}}/{{$fbamappin_id}}"> New disposition add</a>

  <table   class="table table-responsive table-hover"  id="crm_disposition_tb">
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
     

     @foreach($history_db as $key=>$val)



     @if($val->ch_id==0)
       
      <tr class="clickable" data-toggle="collapse" id="row1" data-target=".{{$val->history_id}}">
        <td>{{$val->history_id}} <i class="glyphicon glyphicon-plus"></i></td>
         <td>{{$val->emp_category}}</td>
         <td>{{$val->calltype}}</td>
         <td>{{$val->connect_result}}</td>
         <td>{{$val->outcome}}</td>
         <td>{{$val->disposition}}</td>
         <td>{{$val->sub_disposition}}</td>
          <td>{{$val->followup_date}}</td>
          <td>{{$val->remark}}</td>
         <?php $class =($val->action=="n")? 'color: #00C851': ' color:#ff4444'; ?>

          
          
           @if($val->action=="n")
              <td >  <a style="{{$class }}" href="#" id="close_action">{{$val->action==="n"?"close":"open"}} </a> </td>
           @else
 <td >  <a style="{{$class }}" href="{{url('crm-followup')}}/{{$val->fbamappin_id}}/{{$val->crm_id}}/{{$val->history_id}}">{{$val->action==="n"?"close":"open"}} </a> </td>
           @endif


          <td>{{$val->followup_required}}</td>
         </tr>  
           
          
         <?php   calltr($history_db,$val->history_id);?>
          
          
          



     @endif

     @endforeach

     <?php 

   function calltr($history,$history_id){  
         
            
          foreach ($history as $key => $val) {
           if($val->ch_id==$history_id && $val->ch_id!=0 ){   

                echo "<tr class='collapse ".$history_id."'>";
                echo "<td>".$val->ch_id."</td>";
                echo "<td>".$val->emp_category."</td>";
                echo "<td>".$val->calltype."</td>";
                echo "<td>".$val->connect_result."</td>";
                echo "<td>".$val->outcome."</td>";
                echo "<td>".$val->disposition."</td>";
                echo "<td>".$val->sub_disposition."</td>";
                echo "<td>".$val->followup_date."</td>";
                echo "<td>".$val->remark."</td>";
                if($val->action=='n'){
                $action="close";
                }else{
                $action="open";
                }
                echo "<td >".$action."</td>";
                echo "<td>".$val->followup_required."</td>";
                echo "</tr>";
              
               
           }
          
           
         }

           
             
 

  }  


     ?>

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
             }



              $('#id_none').show();
             
         }).fail(function(xml,Status,error){
               console.log(xml);
          });



  });
  $(document).on('click','#CRM_Disposition_btn',function(e){ e.preventDefault();
           data=$('#CRM_Disposition_from').serialize();
           $.post("{{url('crm-disposition')}}",data).done(function(respo){ 
              // window.location="{{url('crm-disposition')}}/{{$fbamappin_id}}";
               location.reload();
           }).fail(function(xml,Status,error){
               console.log(xml);
           });
         
});

$(document).ready(function () {
            $('#crm_disposition_tb').DataTable();
        });



$(document).on('click','#close_action',function(e){ e.preventDefault();
 
          

    var txt;
    if (confirm("Your disposition id already add if You wont to create new followup..")) {
        
        window.location="{{url('crm-new')}}/{{$fbamappin_id}}";
    } else {
       
    }
    
 
            
});
 
</script>







 
@endsection








