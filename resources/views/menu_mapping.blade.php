@extends('include.master')
@section('content')




       <div class="container-fluid white-bg">
       <div class="col-md-12"><h3 class="mrg-btm">Menu Mapping</h3></div>
        <form class="form-horizontal" method="post" action="{{url('menu-mapping-save')}}"    > {{ csrf_field() }}
        <div class="form-group">
            <label for="inputEmail" class="control-label col-xs-2"> Menu Group</label>
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

            <ul class='menu'>
        <?php  echo $recfn; ?>
             </ul>

               <!--  <select id="framework" name="menu_id[]" multiple class="form-control" >
               @foreach($menu as $key=>$le)
                     <?php if(isset($m_p[$key]->menu_id)){echo $m_p[$key]->menu_id; } ?>
                   @if(isset($m_p[$key]->menu_id)==$le->id)
                   <option value="{{$le->id}}"  selected>{{$le->name}}</option>
                   @else
                    <option value="{{$le->id}}" >{{$le->name}}</option>
                    @endif

               @endforeach
                    </select>
             @if ($errors->has('menu_id'))<label class="control-label" for="inputError"> {{ $errors->first('menu_id') }}</label>  @endif
                    -->
            </div>
        </div>
          
        


<!-- <div class="container-fluid white-bg">
<div class="col-md-9">
  <div class="well" style="width:900px; padding: 8px 0;float: left;">
    <div style="overflow-y: scroll; overflow-x: hidden; height: 350px;" id="maindiv">
      <ul class="nav nav-list navtree"></ul>
    </div>
  </div>
</div>
 -->


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

 
            
 

@endsection




 