@extends('include.master')
@section('content')
@if(Session::has('message'))
<div class="alert alert-success alert-dismissible">
<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
<p class="alert alert-success">{{ Session::get('message') }}</p>
</div>
@endif

<div class="container-fluid white-bg">
  <div class="col-md-12"><h3>Import Sales Data</h3></div>
  <br>
  <br>
      <div class="col-md-12">
         <div class="overflow-scroll">
         	<div class="container">
         	<form  id="frmofflinecs" method="post" enctype="multipart/form-data" action="{{URL::to('getfiledsata')}}">       
              {{ csrf_field() }}
              <div class="col-md-4">
              	<label>Sales Data file</label>
              	<input type="file" name="import_file" id="import_file" class="form-control" required accept=".xlsx,.xls">              	
              </div>
              <div class="col-md-4">
              	<input class="btn btn-primary" type="submit" name="submit" style="margin-top: 19px;">
              </div>
          </form>
      </div>
  </div>
</div>
</div>


@endsection