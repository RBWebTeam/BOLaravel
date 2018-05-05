@extends('include.master')
@section('content')


<div class="container-fluid white-bg">
      <div class="panel-heading">
            <h3 class="panel-title">SMS DATA</h3>
          </div>
          

       <div class="table-responsive">
      <table class="datatable-responsive table table-striped table-bordered dt-responsive nowrap" id="example">
        <thead>
          <tr>
            <td>SMS ID</td>
            <td>SMS Head</td>
            <td>SMS Body</td>
            <td>Created Date</td>
            <td>Edit</td>
            <td>Delete</td>
          </tr>
        </thead>
        <tbody>
         @foreach($smsdata as $val)
          <tr>

            <td>{{$val->SMSTemplateId}}</td>
            <td>{{$val->Header}}</td>
            <td>{{$val->Template}}</td>
            <td>{{$val->CreatedDate}}</td>
           
          <td><a href="edit_view_templete/{{ $val->SMSTemplateId }}" id="edit_id" name="edit_id" class="btn btn-success">Edit</a></td>
<!--   -->
           <!--  <td><a href="#" style=""  class="btn btn-primary" data-toggle="modal" data-target=".updatesms" id="edit_id" name="edit_id">Edit</a></td> -->
           
            <td><a href="template_table_delete/{{ $val->SMSTemplateId }}" class="btn btn-danger" onclick="return confirm('Are you sure to delet this recored ?')">Delete</a></td>
          </tr>
          @endforeach
       </tbody>
</table>
</div>


<script type="text/javascript">
  $(document).ready(function(){
       $('#edit_id').onclick(function(){
        alert("Hello");
            // $.ajax({
            //     url: 'testUrl/{id}',
            //     type: 'GET',
            //     data: { id: 1 },
            //     success: function(response)
            //     {
            //         $('#something').html(response);
            //     }
            // });
       });
    });   
</script>


<script type="text/javascript">
  $(document).ready(function(){
    $('#edit_update').change(function(){
      $.ajax({  
         type: "GET",  
         url:'view_templete_table/'+$(this).val(),//"{{URL::to('Fsm-Details')}}",
         success: function(fsmmsg){
        alert(fsmmsg);
        var data = JSON.parse(fsmmsg);
        if(data.length>0){
          $('#Header').val(".smshead");
          $('#Template').val(".smsbody");
        }
        else{
          $('#Header').val(""); 
         $('#Template').val(""); 
        }
        
        }  
      });
  });
});
</script>



@endsection