@extends('include.master')
@section('content')
<meta name="csrf-token" content="{{ csrf_token() }}">
  <div class="container-fluid white-bg">
    <div class="col-md-12"><h3 class="mrg-btm">Search Loan</h3></div>
       <div class="col-md-12">
       <div class="overflow-scroll">
       <div class="table-responsive" >
       	<div class="">
       	<div class="form-group">
       	<form id="frmsearchloan" >
        {{csrf_field()}}
       	<label >Search:<input class="form-control" type="text" name="txtsearch" id="txtsearch" required placeholder="Employee Name,Employee Code,Employee phone No." style="width: 50%;"></label>
       	</form>  
       	<br>
       	<button class="btn btn-primary form-group" id="btnsearch">Search</button>	
       	</div>       	
       	</div>
       	 <div id="divsearch" class="col-md-12" style="display:none;">
         <table class="datatable-responsive table table-striped table-bordered nowrap" id="search-loan">
      	<thead>
      		<tr>
      			<th>Lead Id</th>
      			<th>Customer Name</th>
      			<th>Product</th>
      			<th>Amount</th>
      			<th>Status</th>
      			<th>Status Date</th>
      			<th>Bank Name</th>
      			<th>Employee Name</th>      			
      		</tr>
      	</thead>      	
      </table>
      </div>
      </div>
      </div>
      </div>
      </div>
<script type="text/javascript">

 $('#btnsearch').click(function (){  
    if($('#frmsearchloan').valid()){   
    getLoanData();
   /* $('#search-loan').DataTable({ 
        
    "ajax": {
    "url": 'search-loan-apicall',
    "type": 'POST',    
    "data": $('#frmsearchloan').serializeArray()
     },
     
        "columns": [
            { "data": "leadId"},
            { "data": "CustName"},
            { "data": "Product"},
            { "data": "Amount"},
            { "data": "Status"},
            { "data": "statusDate"},
            { "data": "BankName"},
            { "data": "EmployeeName"}           
            ]
    
        });*/
      }
    });

function getLoanData(){
  $.ajax({
  url: 'search-loan-apicall',
  type: "POST",           
  data:  $('#frmsearchloan').serializeArray(),
  success:function(data) {
    var json = JSON.parse(data);
    console.log(json);
    if(json.data.length>0){
     $('#divsearch').show();
    table = $('#search-loan').DataTable({         
    "data":json.data,
    "deferRender": true,
    "destroy": true,
    "searching": true,
     
        "columns": [
            { "data": "leadId"},
            { "data": "CustName"},
            { "data": "Product"},
            { "data": "Amount"},
            { "data": "Status"},
            { "data": "statusDate"},
            { "data": "BankName"},
            { "data": "EmployeeName"}           
            ]
    
        });
  }
  else{
    $('#divsearch').hide();
    alert('No data available');
  }
  }
});     
}
</script>
@endsection