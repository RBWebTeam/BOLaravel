	@extends('include.master')
    @section('content')
    <head>
    	<script type="text/javascript" src="http://maps.googleapis.com/maps/api/js?sensor=false"></script>
           <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    </head>
    
<div class="container-fluid white-bg">
  <div class="col-md-12"><h3 class="mrg-btm">Find FBA Location</h3></div>
  <div class="col-md-12">
  	<form method="Post" id="frmlocationfba" name="frmlocationfba">
  		<div class="form-group col-md-6">
  			<label>Address:</label>  			
  			<textarea name="txtadd" id="txtadd" class="form-control"></textarea>			
       </div>        
   	</form>   	
  </div>
  <div class="form-group col-md-12">
    	<button class="btn btn-primary" onclick="GetLocation()">Find Location</button>
    </div>   
     <div class="col-md-12">
         <div class="overflow-scroll">
               <div class="table-responsive" >
                   <table class="datatable-responsive table table-striped table-bordered dt-responsive nowrap" id="example">
	                  <thead>
                        <tr>
                        	<th>FBAID</th>
                        	<th>LAT</th>
                        	<th>LONG</th>
                        	<th>Created Date</th>
                        </tr>
                      </thead>
                      <tbody>
                      	@foreach($query as $val)
                      	<tr>
                      		<td>{{$val->FBAID}}</td>
                      		<td>{{$val->Lat}}</td>
                      		<td>{{$val->Longd}}</td>
                      		<td>{{$val->Created_date}}</td>
                      	</tr>
                      	@endforeach
                      </tbody>
                    </table>

                </div>
            </div>
        </div>
    </div>
    <script type="text/javascript">

  function GetLocation() {
        
          var address =$("#txtadd").val();
          alert(address);

       $.ajax({ 
            type: "GET",
            url:"https://maps.googleapis.com/maps/api/geocode/xml?address=" + address + "&sensor=true_or_false&key=AIzaSyA3t6Az0YB8lyTGCguYHwrscSzGjohnAx4",
            success: function(response) 
            {
              console.log(response);
              alert($(response).find('GeocodeResponse').find('location').find('lat').text());
              alert($(response).find('GeocodeResponse').find('location').find('lng').text());
            }
        });
        }
    </script>
 @endsection