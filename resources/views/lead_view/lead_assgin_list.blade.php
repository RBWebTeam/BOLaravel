 @extends('include.master')
@section('content')
       <div class="container-fluid white-bg">
       <div class="col-md-12"><h3 class="mrg-btm">Lead-Assgin-List</h3></div>
       <div class="col-md-12">
       <div class="overflow-scroll">
       <div class="table-responsive" >
      <table class="datatable-responsive table table-striped table-bordered dt-responsive nowrap" id="lead-assign-table">
		        <thead>
		           <tr >
		           <th>Name</th>
		           <th>Mobile</th>
		           <th>User Name</th>
		          </tr>
		        </thead>                    
       </table>
      </div>
      </div>
      </div>
      </div>       
 <script type="text/javascript">
 	    $(document).ready(function() {
        $('#lead-assign-table').DataTable({
        "order": [[ 2, "desc" ]],
        "ajax": "lead-assgin-list-get",
        "columns": [
            { "data": "name"},
            { "data": "mobile"},            
            { "data": "UserName" },],
            });
       });
 </script>
@endsection

 