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
                      <td> <a href="#" onclick="vehicle_fn()">{{$val->FBAID}}</a></td>
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
        <h5 class="modal-title" id="exampleModalLabel">Lead</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <form class="form-horizontal" method="post"  id="menu_list_from" > {{ csrf_field() }}
    
        
   <div class="form-group">
            <label for="inputEmail" class="control-label col-xs-2">Menu Name</label>
            <div class="col-xs-10">
            <input type="text" name="menu" id="menu_name_id"  class="form-control" >
            </div>
  </div> 


   <div class="form-group">
            <label for="inputEmail" class="control-label col-xs-2">Menu URL</label>
            <div class="col-xs-10">
            <input type="text" name="url_link" id="url_link"  class="form-control" >
            </div>
  </div> 
   

        
      </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" id="menu_list_ID">Save changes</button>
      </div>
    </div>
  </div>
</div>

 
  <script type="text/javascript">
  	function vehicle_fn(){

  		 $('#vehicle-fn-Modal').modal('show');
  	}

  </script>

@endsection


 