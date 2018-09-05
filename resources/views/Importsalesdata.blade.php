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
            <div class="col-md-4">
              <label>Select file Type <b style="color: red; font-size: 15px;">*</b></label>
              <select class="form-control" id="ddlproducttype">
                <option value="0">--select--</option>
                <option value="1">Health-Data</option>
                <option value="2">Motor-Data</option>
              </select>
            </div>
         	<form  id="frmhealth" method="post" enctype="multipart/form-data" action="{{URL::to('gethealthdata')}}" style="display: none;">       
              {{ csrf_field() }}
              <div class="col-md-4">
              	<label>Sales Data file <b style="color: red; font-size: 15px;">*</b></label>
              	<input type="file" name="import_file_health" id="import_file_health" class="form-control" required accept=".xlsx,.xls">                       	
              </div>
              <div class="col-md-4">
              	<input class="btn btn-primary" type="submit" name="submit" style="margin-top: 19px;">
              </div>
          </form>
          <form  id="frmmotor" method="post" enctype="multipart/form-data" action="{{URL::to('getmotordata')}}" style="display: none;">       
              {{ csrf_field() }}
              <div class="col-md-4">
                <label>Sales Data file <b style="color: red; font-size: 15px;">*</b></label>              
                <input type="file" name="import_file_Motor" id="import_file_Motor" class="form-control" required accept=".xlsx,.xls">               
              </div>
              <div class="col-md-4">
                <input class="btn btn-primary" type="submit" name="submit" style="margin-top: 19px;">
              </div>
          </form>
      </div>
  </div>
</div>
</div>
<script type="text/javascript">
  $("#ddlproducttype").change(function() {
  if($("#ddlproducttype").val()==1)
  {
    $("#frmmotor").hide();
    $("#frmhealth").show();
  }else if($("#ddlproducttype").val()==2){
    $("#frmhealth").hide();
    $("#frmmotor").show();
  }else{
    $("#frmhealth").hide();
    $("#frmmotor").hide();
  }
});
</script>

@endsection