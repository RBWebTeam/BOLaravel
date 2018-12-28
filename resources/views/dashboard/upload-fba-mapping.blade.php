@extends('include.master')
@section('content')

<style>
.error_class{
  color:red;
}
.success_class{
  color:green;
}
</style>

<div class="container-fluid white-bg">
       <div class="col-md-12">
       <div class="panel panel-primary">
       <div class="panel-heading">
            <h3 class="panel-title">Upload Fba Mapping</h3>
            <div class="pull-right">
              <span class="clickable filter" data-toggle="tooltip" data-container="body"><a href="">
              <span class="glyphicon glyphicon-plus mrg-tp-forteen"></span></a></span>
            </div>
          </div>

<div class="container-fluid white-bg">      
      <div class="col-md-12">
        <div class="col-md-4 col-xs-12">
          <div class="form-group">
            <a href="{{ URL::to('crm_upload_exel/uplodedfbafile.xls') }}"><button class="btn btn-success">Download CSV.</button></a>
          </div>
        </div>
      <form id="uploadfba_files" name="uploadfba_files" enctype="multipart/form-data">
          {{ csrf_field() }}
          <div class="col-md-3 col-xs-12">
            <div class="form-control mrg-btmm border-none">
              <input type="file"  multiple="multiple" name="fba_update_exl_file" id="fba_update_exl_file" required="">
          </div>
        </div>
        <!-- <a href="#" class="btn btn-primary">Table Show</a> -->
          <div class="col-md-3 col-xs-12">
            <div class="form-group">
              <input type="button" class="btn btn-primary" name="fbauplodfiless" id="fbauplodfiless" value="UPDATE">
            </div>
        </div>     
    </form>
  </div>

  <div class="col-md-12 error_class" id="error_response">

  </div>
  <div class="col-md-12 success_class" id="success_response">

  </div>
</div>

<script type="text/javascript">
  $("#fbauplodfiless").on('click',function(evt){
    $(".error_class").empty();
    $(".success_class").empty();
    evt.preventDefault();
    var formdata = new FormData($("#uploadfba_files")[0]);
    $.ajax({
      type : 'POST',
      data : formdata,
      url : "{{ URL::to('pincode-fba-excel') }}",
      contentType : false,
      processData : false,
      success : function(response){
        console.log(response);
        var data = JSON.parse(response);
        if(data.status == "success"){
          $("#success_response").html(data.messege);
        }
        if(data.status == "error"){
          var error_text = "";
          $.each(data.messege , function(key ,value){
            error_text += value +"<br>";
          });
          $("#error_response").html(error_text);
        }
      }
    });
  });
</script>
@endsection
    
