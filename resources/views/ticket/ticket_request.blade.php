    @extends('include.master')
    @section('content')
    <div class="container-fluid white-bg">
    <div class="col-md-12"><h3 class="mrg-btm">Ticket Request</h3></div>
    <div class="col-md-12"><p >  
    <div class="col-md-12">
    <div class="overflow-scroll">
    <div class="table-responsive" >
    <table class="datatable-responsive table table-striped table-bordered dt-responsive nowrap" id="example">
    <thead>
    <tr>
    <th>ID</th>
    <th>CateName</th>
    <th>QuerType</th>
    <th>Description</th>
    <th>DocPath</th>
    <th>Message</th>
    <th>Status</th>
    <th>StatusChangedBy</th>
    <th>Assign</th>
    <th>comment</th>                          
    </tr>
    </thead>
     <tbody>
     @foreach($query as $va)
     <tr>
    <td><a href="#" onclick="TicketRequest_fn('{{$va->TicketRequestId}}')" >{{$va->TicketRequestId}}</a></td>
     <td>{{$va->CateName}}</td>
     <td>{{$va->QuerType}}</td>
     <td>{{$va->Description}}</td>
     <td >{{$va->DocPath}}</td>
     <td>{{$va->Message}}</td>
     <td>{{$va->Status}}</td>
     <td>{{$va->StatusChangedBy}}</td>
     <td>{{$va->user_fba_id!=null?$va->UserName:''}}</td>
     <td> <a href="#" onclick="view_comment_fn('{{$va->TicketRequestId}}')">View</a></td>
     </tr>
     @endforeach
    </tbody>
     </table>
     </div>
    </div>
     </div>
     </div>
     <div class="modal fade" id="Ticket-Request-Id-Modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
     <div class="modal-dialog" role="document">
     <div class="modal-content">
     <div class="modal-header">
     <h5 class="modal-title" id="exampleModalLabel">User</h5>
     <button type="button" class="close" data-dismiss="modal" aria-label="Close">
     <span aria-hidden="true">&times;</span>
      </button>
      </div>
     <div class="modal-body">
      <form class="form-horizontal" method="post"  id="TicketRequest_Id_from" > {{ csrf_field() }}
      <input type="hidden" name="TicketRequestId" id="TicketRequest_Id" >
      <div class="form-group">
      <label for="inputEmail" class="control-label col-xs-2"> Select</label>
      <div class="col-xs-10">
      <select name="FBAUserId"  class="form-control"  id="FBAUserId">
      <option value="0">select</option>
      @foreach($users as $v)
      <option value="{{$v->FBAUserId}}">{{$v->UserName}}</option>
      @endforeach
      </select>
      </div>
      </div> 
       </form>
      </div>
      <div class="modal-footer">
      <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      <button type="button" class="btn btn-primary" id="TicketRequest_Id_save">Save changes</button>
      </div>
      </div>
     </div>
     </div>
      <div class="modal fade" id="Ticket-comment-Id-Modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
      <div class="modal-content">
      <div class="modal-header">
      <h5 class="modal-title" id="exampleModalLabel">Comment</h5>
      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
      <span aria-hidden="true">&times;</span>
       </button>
       </div>
       <div class="modal-body">
       <table class="datatable-responsive table table-striped table-bordered dt-responsive nowrap" id="example">
       <thead><tr><th>Comment</th></tr></thead>
       <tbody id="get_comment_id"></tbody>
       </table>
       </div>
       <div class="modal-footer">
       <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
       <button type="button" class="btn btn-primary" id="TicketRequest_Id_save">Save changes</button>
      </div>
     </div>
     </div>
     </div>
      <script type="text/javascript">
      function TicketRequest_fn(ID){
      $('#TicketRequest_Id').val(ID);
      $('#Ticket-Request-Id-Modal').modal('show');}
      $(document).on('click','#TicketRequest_Id_save',function(e){  e.preventDefault();
      if($('#FBAUserId').val()!=0){
      $.post("{{url('ticket-request-save')}}",$('#TicketRequest_Id_from').serialize())
      .done(function(data){ 
       console.log(data);
        if(data==0){
       window.location.href = "{{url('ticket-request')}}";
        }else{
        console.log("error");
        }}).fail(function(xhr, status, error) {
        console.log(error);
        });
        }else{
        alert("Select users");
        }
        })
        function view_comment_fn(ID){  
        $('#Ticket-comment-Id-Modal').modal('show');
        $.get("{{url('ticket-request')}}",{'TicketRequestId':ID})
         .done(function(data){
          arr=Array();
          $('#get_comment_id').empty();
          $.each(data, function(key, value) {
          arr.push('<tr><td>'+value.comment+'</td></tr>');
          }); 
          $('#get_comment_id').append(arr);
          }).fail(function(xhr, status, error) {
          console.log(error);
          });
          }
          </script> 
         @endsection




 