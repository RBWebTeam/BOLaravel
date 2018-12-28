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
      <div class="panel-heading"><b>Upload Pincode Mapping</b></div>
        <div class="panel-body">            
        <div class="col-md-3 col-xs-12">
          <div class="form-group">
            <a href="{{ URL::to('crm_upload_exel/uploded-pincode-file.xls') }}"><button class="btn btn-success">Download XLS</button></a>
          </div>
        </div>
       <form id="upload_files" name="upload_files" enctype="multipart/form-data">
          {{ csrf_field() }}
          <div class="col-md-4 col-xs-12">
            <div class="form-control mrg-btmm border-none">
              <input type="file" name="pin_update_exl_file" id="pin_update_exl_file" required="">
          </div>
        </div>
        <a href="{{ URL::to('pincode-update-table') }}" class="btn btn-primary">Table Show</a>
          <div class="col-md-3 col-xs-12">
            <div class="form-group">
              <input type="button" class="btn btn-primary" name="uplodfiless" id="uplodfiless" value="UPDATE">
            </div>
          </div>     
       </form>
      </div>

      <div class="col-md-12 error_class" id="error_response">
        
      </div>
      <div class="col-md-12 success_class" id="success_response">
        
      </div>
    </div>
  </div>
</div>


<script type="text/javascript">
$(document).ready(function(){
   
   $("#uplodfiless").on('click',function(evt){
    $(".error_class").empty();
    $(".success_class").empty();
    evt.preventDefault();
    var formdata = new FormData($("#upload_files")[0]);
    $.ajax({
      type : 'POST',
      data : formdata,
      url : "{{ URL::to('pincode-update-excel') }}",
      contentType : false,
      processData : false,
      success : function(response){
        //console.log(response);
        var data = JSON.parse(response)
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
    });
</script>

@endsection
    
