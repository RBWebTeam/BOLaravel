@extends('include.master')
@section('content')
 


<form class="form-horizontal"  method="post" action="{{url('menu-list-add')}}" >{{ csrf_field() }}
  <div class="form-group">
       <input type="hidden" name="parent_id" id="parent_id">     
  </div>

 <div class="form-group">
            <label for="inputEmail" class="control-label col-xs-2">Parent Menu  </label>
            <div class="col-xs-6">
              
               <select class="control-label"  name="parent_id"> 
               <option value="0">--Parent Level--</option>
@foreach($menu as $val)

  <option value="{{$val->id}}" > {{$val->name}} </option>

@endforeach
 </select>
 
            </div>
</div>



 <div class="form-group">
            <label for="inputEmail" class="control-label col-xs-2">Menu Name</label>
            <div class="col-xs-6">
            <input type="text" name="menu_name" id="menu_name"  class="form-control" >

    @if ($errors->has('menu_name'))<label class="control-label" for="inputError"> {{ $errors->first('menu_name') }}</label>@endif
            </div>
</div>

   <div class="form-group">
            <label for="inputEmail" class="control-label col-xs-2">Level </label>
            <div class="col-xs-6">
            <input type="text" name="level_name"  onkeypress="return Numeric(event)"  class="form-control" >
            </div>
  </div>

   <div class="form-group">
            <label for="inputEmail" class="control-label col-xs-2">Sequence </label>
            <div class="col-xs-6">
            <input type="text" name="sequence"  onkeypress="return Numeric(event)"  class="form-control" >
            </div>
  </div>



     <div class="form-group">
            <label for="inputEmail" class="control-label col-xs-2">URL LINK</label>
            <div class="col-xs-6">
            <input type="text" name="url_link"    class="form-control" >
             @if ($errors->has('url_link'))<label class="control-label" for="inputError"> {{ $errors->first('url_link') }}</label>@endif
            </div>
  </div>




<div class="form-group">
            <label for="inputEmail" class="control-label col-xs-2"></label>
            <div class="col-xs-6">
             <button type="submit" class="btn btn-default">Submit</button>
            </div>
</div>


</form>

</div>

@endsection




 