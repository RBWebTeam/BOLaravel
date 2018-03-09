@extends('include.master')
@section('content')



 
       <div class="container-fluid white-bg">
       <div class="col-md-12"><h3 class="mrg-btm">User Lead  Assignment  </h3></div>
       <div class="col-md-12">

        @if($message = Session::get('msg'))
    <div class="alert alert-info alert-dismissible fade in" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
        <strong>{{ $message }}</strong> 
      </div>
  @endif

       
        
 <form class="form-horizontal" method="post"   action="{{url('assign-task-save')}}" > {{ csrf_field() }}
      
       

 
        <div class="form-group">
            <label for="inputEmail" class="control-label col-xs-2">Users</label>
            <div class="col-xs-10">
            <select class="form-control" name="user_id" >
               <option value="0" >--SELECT--</option>
               
               @foreach($userlist as $lty)
                   <option value="{{$lty->FBAUserId}}" >{{$lty->UserName}}</option>
               @endforeach

        </select>
                    @if ($errors->has('user_id'))<label class="control-label" for="inputError"> {{ $errors->first('user_id') }}</label>@endif
            </div>
        </div>



  <div class="form-group">
            <label for="inputEmail" class="control-label col-xs-2">Assign Task</label>
            <div class="col-xs-10">
            <select class="form-control " name="lead_id[]"   multiple=""  >
               <option value="0" >--SELECT--</option>
               
               @foreach($assign_task as $val)
                   <option value="{{$val->id}}" > 
                       @if($val->name)
                          {{$val->name}}
                        @else
                          {{$val->mobile}}
                        @endif

                   </option>
               @endforeach

         </select>
                  @if ($errors->has('lead_id'))<label class="control-label" for="inputError"> {{ $errors->first('lead_id') }}</label>@endif
            </div>
 </div>

 <div class="form-group">
  <div class="col-xs-10">
  <label for="inputEmail" class="control-label col-xs-5"> </label>
  <input type="submit" name="submit" value="submit" class="btn btn-primary">
</div>
  
</div>      
      </form>


     
      </div>
      </div>


 

@endsection



 