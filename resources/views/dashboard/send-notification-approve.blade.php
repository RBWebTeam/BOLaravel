 @extends('include.master')
@section('content')
  <div class="content">
    <div class="box box-default">
        <div class="box-header with-border">
         <center><h3 class="box-title">Employee list</h3></center> 
          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
          </div>
        </div>

         <div class="box-body">
   <!-- <center><h3 style="color: #0099FF;">Employee list</h3></center><hr> -->
<div class="table-responsive">
  
   <table id="example" class="table table-bordered table-striped">
    
     <thead>
      <tr>  Broker_Name, city_Id,remark,Contact_No,Email_Id,PAN_No,FBA_Status
            <th>Broker_Name</th>
            <th>city_Id</th>
            <th>Contact_No</th>
            <th>Email_Id</th>
            <th>PAN_No</th>
            <th>FBA_Status</th>
            
    </tr>
  </thead>

        <tbody>
           @foreach($smsdata as $val)
        <tr>
              <td>{{ Broker_Name}}</td>
              <td>{{$val->city_Id}}</td>
              <td>{{$val->Contact_No}}</td>
              <td>{{$val->Company_Id}}</td>
              <td>{{$val->Email_Id}}</td>
              <td>{{$val->Email_Id}}</td>
              <td>{{$val->PAN_No}}</td>
              <td>{{$val->FBA_Status}}</td>
              
        </tr>

          @endforeach
        </tbody>
    </table>
  </div>
  </div>
</div>
</div>

<script>
$(document).ready(function() {
    $('#example').DataTable();
} );
</script>
         
@endsection