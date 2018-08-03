@extends('include.master')
 @section('content')
     <head>
      <script type="text/javascript" src="http://maps.googleapis.com/maps/api/js?sensor=false"></script>
       <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    </head>
    
<div class="container-fluid white-bg">
<div class="col-md-12"><h3 class="mrg-btm">Lead Details</h3></div>
<div class="col-md-12">
			 <div class="overflow-scroll">
			 <div class="table-responsive" >
				<table id="example" class="table table-bordered table-striped tbl"  >
                 <thead>
                  <tr>
                   <th>Lead_Id</th>
                   <th>Name</th>
                   <th>Mobile</th>
                   <th>Product_Name</th>
                   <th>Address</th>
                   <th>Assigned_To</th>
                   <th>Send</th> 
                   </tr>                
                </thead>
                <tbody>
          @isset($ldata)
           @foreach($ldata as $val) 
              <tr>               
                <td>{{ $val->lead_id}}</td> 
                <td>{{ $val->lead_name}}</td>
                <td>{{ $val->mobile_no}}</td> 
                <td>{{ $val->Product_Name}}</td> 
                <td>{{ $val->address}}</td> 
                <td>{{ $val->assigned_to}}</td>
                <td><a onclick="GetLocation('{{$val->address}}',this)" id="btnsend" class="qry-btn"  value="" name="btnsend" class="btn btn-default">Send</a></td>   
                </tr>
              @endforeach
          @endisset
          </tbody>
        </table>
			  </div>
		 </div>
	</div>
</div>    
<script type="text/javascript">
 function GetLocation(address) {            
          alert(address);        
          if (address!='') {
       $.ajax({ 
            type: "GET",
            url:"https://maps.googleapis.com/maps/api/geocode/xml?address=" + address + "&sensor=true_or_false&key=AIzaSyA3t6Az0YB8lyTGCguYHwrscSzGjohnAx4",
            success: function(response) 
            {
              console.log(response);
              //alert($(response).find('GeocodeResponse').find('location').find('lat').text());
             //alert($(response).find('GeocodeResponse').find('location').find('lng').text());
              var Lat=$(response).find('GeocodeResponse').find('location').find('lat').text();
              var long=$(response).find('GeocodeResponse').find('location').find('lng').text();
              alert(Lat);
              alert(long);
           $.ajax({
             url: 'get-fba-location/'+Lat+'/'+long,
             type: "GET",             
             success:function(data) 
               {   
                alert(data);
                  
               }
             });
          }

        });
        }
        else
        {
          alert("Address is Required");
        }
        }
</script>
 @endsection