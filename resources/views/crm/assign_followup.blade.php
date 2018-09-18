@extends('include.master')
@section('content')   
<div class="container-fluid white-bg">
       <div class="col-md-12"><h3 class="mrg-btm">Assigned Follow up</h3></div> 
       <div class="col-md-12">
       <div class="overflow-scroll">
       <div class="table-responsive" >
   <table id="classTable" class="table table-bordered">
          <thead>
               <tr>
                 <th>Follow up Id</th>
                 <th>FBAID</th>
                 <th>FBA Name</th>   
                 <th>FBA Mobile No</th>
                <!--  <th>History_id</th> -->
                 <th>Followup Date</th>
                 <th>Remark</th>
                 <th>Disposition</th>
                 <th>Created Date</th>
                 <th>Action</th>
               </tr>
          </thead>
          <tbody   >
     
     <!-- <?php //print_r($query);exit; ?> -->

     @foreach($query as $key=>$val)
        <tr> 
        <td>{{$val->history_id}}</td>
        <td>{{$val->FBAID}}</td>
        <td>{{$val->FullName}}</td>   
        <td>{{$val->MobiNumb1}}</td>
       <!--  <td>{{$val->history_id}}</td> -->
        <td>{{$val->followup_date}}</td>
        <td><textarea readonly style="width: 100%;height: 30px;border: none; cursor: default;">{{$val->remark}}</textarea></td>
        <td>{{$val->disposition}}</td> 
        <td>{{$val->create_at}}</td>        
        @if($val->followup_assign_id!=null || $val->followup_assign_id!=0)
        <td><a href="#" id="close_action">close</a></td>
           @else
        <td><a href="{{url('crm-new')}}/{{$val->fbamappin_id}}?assign_id={{$val->assignment_id}}&?history_id={{$val->history_id}}">new</a></td>
           @endif
        </tr>  
     @endforeach
     </tbody>
</table>
</div>
</div>
</div>
</div>
<script type="text/javascript">
   $( document ).ready(function() {
        $("#classTable").DataTable();
    });
</script>  
@endsection
 



