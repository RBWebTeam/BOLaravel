@extends('include.master')
@section('content')

  <div class="container-fluid white-bg">
    <div class="col-md-12"><h3 class="mrg-btm">Search Loan</h3></div>
       <div class="col-md-12">
       <div class="overflow-scroll">
       <div class="table-responsive" >
       	<div class="col-md-6">
       	<div class="form-group">
       	<form id="frmsearchloan" method="post">
                  {{csrf_field()}}
       	<label >Search:<input class="form-control" type="text" name="txtsearch" id="txtsearch" required placeholder="Employee Name,Employee Code"></label>
       	</form>  
       	<br>
       	<button class="btn btn-primary form-group" id="btnsearch">Search</button>	
       	</div>       	
       	</div>
       	 <div id="divsearch" class="col-md-12" style="display:none;">
      <table class="datatable-responsive table table-striped table-bordered dt-responsive nowrap" id="example">
      	<thead>
      		<tr>
      			<th>Lead Id</th>
      			<th>Customer Name</th>
      			<th>Product</th>
      			<th>Amount</th>
      			<th>Status</th>
      			<th>status Date</th>
      			<th>Bank Name</th>
      			<th>Employee Name</th>      			
      		</tr>
      	</thead>
      	<tbody>                 
              
      	</tbody>
      </table>
      </div>
      </div>
      </div>
      </div>
      </div>
<script type="text/javascript">
	$(document).ready(function() {
            
      });

$('#btnsearch').click(function (){

      if( $('#frmsearchloan').valid())
    {
        
      console.log($('#frmsearchloan').serialize());
          $.ajax({ 
             url: "{{URL::to('search-loan-apicall')}}",
             method:"POST",
             data: $('#frmsearchloan').serialize(),
             success: function(searchdata)  
               {
                  $('#divsearch').show();
                  $("#example tbody").empty();
                 var searchresult=JSON.parse(searchdata);
                 console.log(searchresult.result);
                 for (var i = 0 ; i < searchresult.result.length; i++) 
                 {
                  $("#example tbody").append('<tr><td>'+searchresult.result[i].leadId+'</td><td>'+searchresult.result[i].CustName+'</td><td>'+searchresult.result[i].Product+'</td><td>'+searchresult.result[i].Amount+'</td><td>'+searchresult.result[i].Status+'</td><td>'+searchresult.result[i].statusDate+'</td><td>'+searchresult.result[i].BankName+'</td><td>'+searchresult.result[i].EmployeeName+'</td></tr>');
                 } 
               }
             });  
    }
    }); 
</script>
@endsection