@extends('include.master')
@section('content')   
<div class="container-fluid white-bg">
       <div class="col-md-12"><h3 class="mrg-btm">My Followup</h3></div> 
       <div class="col-md-12">
       <div class="overflow-scroll">
       <div class="table-responsive" >
       


 


   <table id="classTable" class="table table-bordered">
          <thead>
          <tr>
            <th>ID</th>
            <th>followup Internal ID</th>
            <th>followup - external ID</th>
            <th>Fbamappin ID</th>
            <th>History_id</th>
            <th>followup_date</th>
            <th>Disposition</th>
             <th>Action</th>
          </tr>
          </thead>
          <tbody   >
     

     @foreach($query as $key=>$val)
        <tr> 
        <td>{{$val->user_id}}</td>
        <td>{{$val->assignment_id}}</td>
        <td>{{$val->assign_external_id}}</td>
        <td>{{$val->fbamappin_id}}</td>
        <td>{{$val->history_id}}</td>
        <td>{{$val->followup_date}}</td>
        <td>{{$val->disposition}}</td>
         <?php $class =($val->action=="n")? 'color: #00C851': ' color:#ff4444'; ?>
        @if($val->action=="n")
              <td >  <a style="{{$class }}" href="#" id="close_action">{{$val->action==="n"?"close":"open"}} </a> </td>
           @else
 <td >  <a style="{{$class }}" href="{{url('crm-followup')}}/{{$val->fbamappin_id}}/{{$val->crm_id}}/{{$val->history_id}}">{{$val->action==="n"?"close":"open"}} </a> </td>
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
 



