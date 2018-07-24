@extends('include.master')
@section('content')   
<div class="container-fluid white-bg">
       <div class="col-md-12"><h3 class="mrg-btm">Assigned Followup</h3></div> 
       <div class="col-md-12">
       <div class="overflow-scroll">
       <div class="table-responsive" >
       


 


   <table id="classTable" class="table table-bordered">
          <thead>
          <tr>
            <th>ID</th>
            <th>followup Internal ID</th>
   
            <th>Fbamappin ID</th>
            <th>History_id</th>
            <th>followup_date</th>
            <th>Disposition</th>
             <th>Action</th>
          </tr>
          </thead>
          <tbody   >
     
     <?php //print_r($query);exit; ?>

     @foreach($query as $key=>$val)
        <tr> 
        <td>{{$val->user_id}}</td>
        <td>{{$val->assignment_id}}</td>
   
        <td>{{$val->fbamappin_id}}</td>
        <td>{{$val->history_id}}</td>
        <td>{{$val->followup_date}}</td>
        <td>{{$val->disposition}}</td>
         
        @if($val->followup_assign_id!=null || $val->followup_assign_id!=0)
              <td >  <a   href="#" id="close_action">close </a> </td>
           @else
 <td >  <a   href="{{url('crm-new')}}/{{$val->fbamappin_id}}?assign_id={{$val->assignment_id}}&?history_id={{$val->history_id}}">new </a> </td>
           @endif
        </tr>  
     @endforeach
     </tbody>
        </table>

  </div>
</div>
</div>
</div>


 
 

 
@endsection
 



