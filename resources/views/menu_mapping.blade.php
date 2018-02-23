@extends('include.master')
@section('content')



       <div class="container-fluid white-bg">
       <div class="col-md-12"><h3 class="mrg-btm">Menu Mapping</h3></div>

        <form class="form-horizontal" method="post" action="{{url('menu-mapping-save')}}"    > {{ csrf_field() }}
        <div class="form-group">
            <label for="inputEmail" class="control-label col-xs-2"> Menu Group</label>
            <div class="col-xs-10">
            <select class="form-control" name="menu_group_mapping" id="menu_group_mapping">
               <option value="0" > SELECT --</option>
               
               @foreach($menu_group as $le)
                   <option value="{{$le->id}}" >{{$le->name}}</option>
               @endforeach
             </select>
               @if ($errors->has('menu_group_mapping'))<label class="control-label" for="inputError"> {{ $errors->first('menu_group_mapping') }}</label>  @endif
                  
            </div>
        </div>

 
         <div class="form-group"   id="Menu_Mapping">
            <label for="inputEmail" class="control-label col-xs-2"> Menu Mapping</label>
            <div class="col-xs-10" id="mapping_select_id">
               <select id="framework" name="mapping[]" multiple class="form-control framework" >

               </select>

                

                <!-- <select id="framework11" name="mapping[]" multiple class="form-control" >
               @foreach($menu as $le)
                   @if($le->parent_id!=0)
                   <option value="{{$le->id}}"  selected>{{$le->name}}</option>
                   @else
                    <option value="{{$le->id}}" >{{$le->name}}</option>
                    @endif

               @endforeach
                    </select>
             @if ($errors->has('mapping'))<label class="control-label" for="inputError"> {{ $errors->first('mapping') }}</label>  @endif
                    -->
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

 
            
 

@endsection




 