
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>
<script type="text/javascript" src="http://maps.googleapis.com/maps/api/js?sensor=false"></script>


       <div class="container-fluid white-bg">
       
      

<div class="col-md-12">
			 <div class="overflow-scroll">
			 <div class="table-responsive" >
       <div class="col-md-12"><h3 class="mrg-btm"></h3></div>

     
        @foreach($leaddata as $key=> $val)
        @if($key==0)
        <span style="font-size:22; margin-left: 10px; color:#FF8C00">Non Workable Leads ({{$val->NonWorkableCount}})</span>
        <p /><p /><p />
        <span style="font-size:22; margin-left: 10px; color:#228B22">Workable Leads</span>
                <table id="lead-details" class="table table-bordered table-striped tbl" >
                 <thead style="background-color: #a9d8ec">
                  <tr>
                   <th>Client Name</th>
                   <th>Mobile No</th>
                   <th>Category</th>
                    <th>Registration No</th>
                    <th>Expiry Date</th>
                 </tr>
                </thead>
                <tbody> 
                @if($val->ExpiryDate!=null)
        <td><?php echo $val->ClientName; ?></td> 
        <td><?php echo $val->MobileNo; ?></td>
        <td><?php echo $val->Category; ?></td>
        <td><?php echo $val->RegistrationNo; ?></td>
        <td><?php echo $val->ExpiryDate; ?></td> 

        @endif
        </tr>   
        @else
        @if($val->ExpiryDate!=null)
        <tr>
		    <td><?php echo $val->ClientName; ?></td> 
        <td><?php echo $val->MobileNo; ?></td>
        <td><?php echo $val->Category; ?></td>
        <td><?php echo $val->RegistrationNo; ?></td>
        <td><?php echo $val->ExpiryDate; ?></td>
        </tr>
       @endif
       @endif
      
       @endforeach

      </tbody>
      </table>
			</div>
			</div>
			</div>
      </div>

<!--       <script type="text/javascript">
        
$(document).ready(function() {
    $('#lead-details').DataTable( {
        
    } );
} );

      </script> -->

