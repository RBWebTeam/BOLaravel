@extends('include.master')
@section('content')

 <div class="container-fluid white-bg">
       <div class="col-md-12"><h3 class="mrg-btm">Product-Authorized</h3></div>
       <div class="col-md-12">

        @if($message = Session::get('msg'))
    <div class="alert alert-info alert-dismissible fade in" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
        <strong>{{ $message }}</strong> 
      </div>
  @endif

       
 <form class="form-horizontal" method="post"   action="{{url('product-save')}}" > {{ csrf_field() }}
      
       
        <div class="form-group">
            <label for="inputEmail" class="control-label col-xs-2">Users</label>
            <div class="col-xs-6">
            <select class="form-control" name="user_name" onchange="get_user_selected(this.value); "  >
               <option value="0"  >--SELECT--</option>
               
               @foreach($userlist as $lty)
                   <option value="{{$lty->FBAUserId}}" >{{$lty->UserName}}</option>
               @endforeach

        </select>
                    @if ($errors->has('user_name'))<label class="control-label" for="inputError"> {{ $errors->first('user_name') }}</label>@endif
            </div>
        </div>



  <div class="form-group">
            <label for="inputEmail" class="control-label col-xs-2">Product Name</label>
            <div class="col-xs-6">
            <select class="form-control " name="product_name[]"   multiple="" id="product_name_id"   >
               
           </select>
                  @if ($errors->has('product_name'))<label class="control-label" for="inputError"> {{ $errors->first('product_name') }}</label>@endif
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

<script type="text/javascript">
 function get_user_selected(ID){
 $.get("{{url('product-authorized')}}",{'ID':ID}).done(function(data){ 
              var arr=Array('<option value="0">--Slect--</option>');
               $('#product_name_id').empty();
              $.each(data,function(index,val){ 
                   if(val.Product_Id==val.maping_id){
                       arr.push('<option value="'+val.Product_Id+'" selected >'+val.Product_Name+'</option>');
                   }else{
                      arr.push('<option value="'+val.Product_Id+'">'+val.Product_Name+'</option>');
                   }
                 });
               $('#product_name_id').append(arr);
               }).fail(function(xhr, status, error) {
                 console.log(error);
                });


 }

</script>
 

@endsection



 