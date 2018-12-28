
 @extends('include.master')
 @section('content') 

<form id="approve" name="approve"> 
<div id="content" style="overflow:scroll;">
<div class="container-fluid white-bg">
<div class="col-md-12"><h3 class="mrg-btm">Product:{{$ProductName}}</h3></div>
<div class="col-md-12">
<div class="overflow-scroll">
<div class="table-responsive" >
<table id="healthassure" class="table table-bordered table-striped tbl" >
<thead>
 <tr>
  <th>Mode </th>
  <th>Product Name</th>
  <th>Entry Date</th>
  <th>InsCompany</th>
  <th>Posp Name</th>
  <th>Premium</th>
  <th>GWP</th>
  <th>Total OD</th>
  <th>Payment Mode</th>
  <th>PolicyNo</th>
  <th>CSNo</th>
  <th>EntryNo</th>
  <th>CRNNo</th>
  <th>ERPID</th>
  <th>Manager</th>


   </tr>
   </thead>
    <tbody>
    @foreach($query as $val) 
    <tr>
     <td><?php echo $val->Online_Status; ?></td> 
    <td><?php echo $val->ProductName; ?></td>
    <td><?php echo $val->EntryDate; ?></td> 
    <td><?php echo $val->InsCompany; ?></td>
    <td><?php echo $val->DSAName; ?></td>    
     <td><?php echo $val->Premium; ?></td>
     <td><?php echo $val->GWP; ?></td>
     <td><?php echo $val->Total_OD; ?></td>
      <td><?php echo $val->PaymentStatus; ?></td>
      <td><?php echo $val->PolicyNo; ?></td>
      <td><?php echo $val->CSNo; ?></td>
      <td><?php echo $val->EntryNo; ?></td>
      <td><?php echo $val->CRNNo; ?></td>
      <td><?php echo $val->posp_id; ?></td>
     <td><?php echo $val->RRM; ?></td> 

     </tr>
      @endforeach
      </tbody>
      </table>
    </div>
  </div>
  </div>
 </div>
 </form>


       <script type="text/javascript">
        
$(document).ready(function() {
    $('#healthassure').DataTable( {
        
    } );
} );

      </script>
@endsection
