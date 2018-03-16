@extends('include.master')
@section('content')



       <div class="container-fluid white-bg">
       <div class="col-md-12"><h3 class="mrg-btm">Registration NO</h3></div>
       
     
 
 
       <div class="col-md-12">
       <div class="overflow-scroll">
       <div class="table-responsive" >
      <table class="datatable-responsive table table-striped table-bordered dt-responsive nowrap" id="example">
                    <thead>
                       <tr>
                       <th>FBA ID</th>
          
                        <th>registration no</th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach($query as $val)
                       <tr>
                      <td> <a href="#" onclick="vehicle_fn('{{$val->VehicleRequestID}}','MOI','{{$val->FBAID}}')">{{$val->FBAID}}</a></td>
                      <td>{{$val->registration_no}}</td>
                     
 
                      </tr>
                      @endforeach
                  </tbody>
           
            </table>
      </div>
      </div>
      </div>
      </div>





 <div class="modal fade" id="vehicle-fn-Modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Comment</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <form class="form-horizontal" method="post"  id="vehicle_from_id" > {{ csrf_field() }}
    
     <input type="hidden" name="Request_id" id="Request_id"  >
     <input type="hidden" name="R_Type" id="R_Type"  >
     <input type="hidden" name="Fba_id" id="Fba_id">
        
   <div class="form-group">
            <label for="inputEmail" class="control-label col-xs-2">Comment</label>
            <div class="col-xs-10">
            <textarea name="R_Comment" class="form-control"></textarea>
            </div>
  </div> 

 
      </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" id="vehicle_submit_id">Save changes</button>
      </div>
    </div>
  </div>
</div>

 
  <script type="text/javascript">
  	function vehicle_fn(Request_id,R_Type,Fba_id){
                $('#Request_id').val(Request_id);
                $('#R_Type').val(R_Type);
                $('#Fba_id').val(Fba_id);
  		        $('#vehicle-fn-Modal').modal('show');
  	}
  	 $("#vehicle_submit_id").click(function(event){  event.preventDefault(); 	 
            $.post("{{url('report-followup-history-save')}}",$('#vehicle_from_id').serialize())
             .done(function(data){ 
             	 if(data==0){
                   alert("success...");
                  $('#vehicle-fn-Modal').modal('hide');
             	 }else{
                       console.log(data);
             	 }
                
             }).fail(function(xhr, status, error) {
                 console.log(error);
            });
});

  </script>

@endsection


 