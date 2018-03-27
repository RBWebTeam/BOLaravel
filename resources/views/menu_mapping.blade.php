@extends('include.master')
@section('content')




       <div id="message_toggle">
        @if($message = Session::get('msg'))
         <div class="alert alert-info alert-dismissible fade in" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
        <strong>{{ $message }}</strong> 
      </div>
       @endif
       </div>

       <div class="container-fluid white-bg">
       <div class="col-md-12"><h3 class="mrg-btm">Menu Mapping</h3></div>
        <form class="form-horizontal" method="post" action="{{url('menu-mapping-save')}}"    > {{ csrf_field() }}
        <div class="form-group">
            <label  for="inputEmail" class="control-label col-xs-2"> Menu Group</label>
   
 
           
            <div class="col-xs-6">
            <select class="form-control" name="menu_group_id" id="menu_group_id">
               @foreach($menu_group as $le)
               @if($menu_group_id==$le->id)
                   <option value="{{$le->id}}" selected="" >{{$le->name}}</option>
               @endif    
               @endforeach
             </select>

               @if ($errors->has('menu_group_id'))<label class="control-label" for="inputError"> {{ $errors->first('menu_group_id') }}</label>  @endif
                  
            </div>
        </div>





 
         <div class="form-group"   id="Menu_Mapping">
            <label for="inputEmail" class="control-label col-xs-2"> Menu Mapping</label>
            <div class="col-xs-6" id="mapping_select_id">

           <!--  <ul class='menu'>
        <?php  echo $recfn; ?>
             </ul> -->

             <ul class="nav nav-list" style="overflow: hidden; width: auto; height: 95%;">

              <?php  echo $recfn; ?> <span class="glyphicon glyphicon-plus"></span>
                

             </ul>
    
 
            </div>
        </div>
          
        

     <div class="col-md-12 col-xs-12">
       
        <div class="center-obj center-multi-obj">
       
         <button id="btnsubmit" onclick="Validate()" class="common-btn">Submit</button>

         </div>
        </div>

</form>
     
 
 
       <div class="col-md-12">
       <div class="overflow-scroll">
       <div class="table-responsive" >

      <table class="datatable-responsive table table-striped table-bordered dt-responsive nowrap" id="example">
                                    
           
            </table>
      </div>
      </div>
      </div>
      </div>

 
            
 <script type="text/javascript">$(document).ready(function(){
 
window.setTimeout(function() {
    $("#message_toggle").fadeTo(500, 0).slideUp(500, function(){
        $(this).remove(); 
    });
}, 4000);
 

 });

  


</script>

@endsection




 <!--  @foreach($menu_group as $le)
               @if($menu_group_id==$le->id)
               <input type="hidden" name="menu_group_id" id="menu_group_id" value="{{$le->id}}" >
             <input type="text" name="menu_group_id1" id="menu_group_id1" value="{{$le->name}}">
             @endif    
             @endforeach -->