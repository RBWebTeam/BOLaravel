@extends('include.master')
@section('content')

  <script>
      function Approve_Course(assigncity_id){
        //console.log(assigncity_id);
        var select="";
           $('#id_req').val(assigncity_id);
           $('#show_cities tbody').empty();
            $.ajax({
                url: "{{url('rm_city_view_edit')}}",
                type: 'POST',
                data: $('#rm_view').serialize(),
                success: function(data)
                {
                  //console.log(data);
                  for(var i=0; i<data.length; i++){
     
     
                 $('#show_cities tbody').append("<tr><td>"+ data[i].state_name+
                  "</td><td>"+data[i].cityname+"</td></tr>");

               }
                  
                }
            });
      }
  </script>  


  <div class="container-fluid white-bg">
      <div class="panel-heading">
            <h3 class="panel-title">RM DATA</h3>
          </div>
          

       <div class="table-responsive">
      <table class="datatable-responsive table table-striped table-bordered dt-responsive nowrap" id="example">


        <thead>
          <tr>
            <td>ID</td>
            <td>Name</td>
            <td>Email</td>
            <td>Mobile</td>
            <td>Assign View</td>

          </tr>
        </thead>
      
        <tbody>

        @foreach($getrmdata as $val)
          <tr>
            <td>{{$val->id}}</td>
            <td>{{$val->name}}</td>
            <td>{{$val->email}}</td>
            <td>{{$val->mobile}}</td>
            
            <td><button type="button" class="btn btn-info btn-sm" data-toggle="modal" onClick="Approve_Course('{{$val->assigncity_id }}');" value=" " data-target="#myModal">View</button></td>
          </tr>

             @endforeach

           </tbody>
           </table>
         </div>
  </div>
       <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">City List</h4>
        </div>
        
        <div class="modal-body">
          <div class="table-responsive">

       <form id="rm_view" name="rm_view">
             {{ csrf_field() }}
             <div style="width:850px;height:200px;overflow:scroll;">
       

            <input type="hidden" id="id_req"  name="id_req" class="form-control req_id" style="">
            
             <table class="datatable-responsive table table-striped table-bordered dt-responsive nowrap" id="show_cities">


        <thead>
          
          <tr bgcolor="#87CEFA">
            <td>State</td>
            <td>City</td>
          </tr>

      </thead>

    <tbody>
          
    </tbody>
       
      </table>
       </div>
       </form>
    </div>


        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>
</div>

@endsection