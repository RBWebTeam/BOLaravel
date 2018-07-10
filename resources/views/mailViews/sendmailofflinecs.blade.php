<!DOCTYPE html>
<html>
<head>
<style>
table, th, td {
    border: 1px solid black;
    border-collapse: collapse;
}
th, td {
    padding: 5px;
    text-align: left;
}
</style>
</head>
<table>
		@foreach($offlinecsdata as $val)   
		<tr>
	    <th>ID</th>
		<td>{{$val->ID}}</td>
	    </tr>
	    <tr>
	    <th>Produc name</th>	
		<td>{{$val->product_name}}</td>
		</tr>
		<tr>
		<th>Customer Name</th>
		<td>{{$val->CustomerName}}</td>	
		</tr>
		<tr>
		<th>Customer Address</th>	
		<td>{{$val->CustomerAddress}}</td>
		</tr>
		<tr>
		<th>City</th>
		<td>{{$val->cityname}}</td>
		</tr>
		<tr>
		<th>State</th>
		<td>{{$val->state_name}}</td>
		</tr>
		<tr>
		<th>Zone</th>
		<td>{{$val->Zone}}</td>
		</tr>
		<tr>
		<th>Region</th>	
		<td>{{$val->Region}}</td>
		</tr>
		<tr>
		<th>MobileNo</th>
		<td>{{$val->MobileNo}}</td>
		</tr>
		<tr>
		<th>Telephone No</th>
		<td>{{$val->TelephoneNo}}</td>
		</tr>
		<tr>
		<th>Email Id</th>	
		<td>{{$val->EmailId}}</td>
		</tr>
		<tr>
		<th>POSP Name</th>
		<td>{{$val->POSPName}}</td>	
		</tr>
		<tr>
		<th>Premium Amount</th>
		<td>{{$val->PremiumAmount}}</td>
		</tr>
		<tr>
		<th>ERPID</th>
		<td>{{$val->ERPID}}</td>
		</tr>
		<tr>
		<th>QTNo</th>
		<td>{{$val->QTNo}}</td>
		</tr>
		<tr>
		<th>Vehicle No</th>
		<td>{{$val->VehicleNo}}</td>
		</tr>
		<tr>
		<th>Date of Expiry</th>
		<td>{{$val->DateofExpiry}}</td>
		</tr>
		<tr>
		<th>Break In</th>
		<td>{{$val->BreakIn}}</td>
		</tr>
		<tr>
		<th>Insurer motor</th>
		<td>{{$val->motorInsurer}}</td>
		</tr>
		<tr>
		<th>Payment Mode</th>
		<td>{{$val->PaymentMode}}</td>
		</tr>
		<tr>
		<th>UTR No</th>
		<td>{{$val->UTRNo}}</td>
		</tr>
		<tr>
		<th>Bank</th>
		<td>{{$val->Bank}}</td>
		</tr>
		<tr>
		<th>Executive Name</th>
		<td>{{$val->ExecutiveName}}</td>
		</tr>
		<tr>
		<th>Executive Name 1</th>
        <td>{{$val->ExecutiveName1}}</td>
		</tr>
		<tr>
		<th>Product Executive</th>
		<td>{{$val->ProductExecutive}}</td>
		</tr>
		<tr>
		<th>Product Manager</th>
		<td>{{$val->ProductManager}}</td>
		</tr>
		<tr>
		<th>RC Copy</th>
		<td>{{$val->RCCopy}}</td>
		</tr>
		<tr>
		<th>Fitness</th>
		<td>{{$val->Fitness}}</td>
		</tr>
		<tr>
		<th>PUC</th>
		<td>{{$val->PUC}}</td>
		</tr>
		<tr>
		<th>Breakin Report</th>
		<td>{{$val->BreakinReport}}</td>
		</tr>
		<tr>
		<th>Cheque Copy</th>
		<td>{{$val->ChequeCopy}}</td>
		</tr>
		<tr>
		<th>Other</th>
		<td>{{$val->Other}}</td>
		</tr>
		<tr>
		<th>Created date</th>
		<td>{{$val->createddate}}</td>
		</tr>
       @endforeach
</table>
</html>