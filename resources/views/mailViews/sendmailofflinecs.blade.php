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
<p>Dear Sir/Madam,</p>
@foreach($offlinecsdata as $val) 
<p>Please find enclosed details for CS  {{$val->product_name}} for {{$val->CustomerName}}. Details of the case are as under:</p>
<table>		  
	    <tr>
	     <th>ID</th>
		 <td>{{$val->ID}}</td>
	    </tr>
	    <tr>
	    <th>Product Name</th>	
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
		@if($val->VehicleNo!='')
		<tr>
		<th>Vehicle No</th>
		<td>{{$val->VehicleNo}}</td>
		</tr>
		@endif		
		<tr>
		<th>Date of Expiry</th>
		<td>{{$val->DateofExpiry}}</td>
		</tr>
		@if($val->BreakIn!='')
		<tr>
		<th>Break In</th>
		<td>{{$val->BreakIn}}</td>
		</tr>
		@endif	
		@if($val->motorInsurer!='')
		<tr>
		<th>Insurer motor</th>
		<td>{{$val->motorInsurer}}</td>
		</tr>
		@endif
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
		@if($val->RCCopy!='')
		<tr>
		<th>RC Copy</th>
		<td>{{$val->RCCopy}}</td>
		</tr>
		@endif
		@if($val->Fitness!='')
		<tr>
		<th>Fitness</th>
		<td>{{$val->Fitness}}</td>
		</tr>
		@endif
		@if($val->PUC!='')
		<tr>
		<th>PUC</th>
		<td>{{$val->PUC}}</td>
		</tr>
		@endif
		@if($val->BreakinReport!='')
		<tr>
		<th>Breakin Report</th>
		<td>{{$val->BreakinReport}}</td>
		</tr>
		@endif
		@if($val->ChequeCopy!='')
		<tr>
		<th>Cheque Copy</th>
		<td>{{$val->ChequeCopy}}</td>
		</tr>
		@endif
		@if($val->Other!='')
		<tr>
		   <th>Other</th>
		   <td>{{$val->Other}}</td>
		</tr>
		@endif
		@if($val->ProposalForm!='')
		<tr>
        	<th>Proposal Form</th>
        	<td>{{$val->ProposalForm}}</td>
        </tr>
        @endif
        @if($val->KYC!='')
		<tr>
			<th>KYC</th>
			<td>{{$val->KYC}}</td>
		</tr>
		@endif
        @if($val->Preexisting!='')
		<tr>
			<th>Preexisting</th>
			<td>{{$val->Preexisting}}</td>
		</tr>
		@endif
        @if($val->MedicalReport!='')
		<tr>
			<th>Medical Report</th>
			<td>{{$val->MedicalReport}}</td>
		</tr>
		@endif
        @if($val->PremiumYears!='')
		<tr>
			<th>Premium Years</th>
			<td>{{$val->PremiumYears}}</td>
		</tr>
		@endif
        @if($val->TypeofPolicy!='')
		<tr>
			<th>Type of Policy</th>
			<td>{{$val->TypeofPolicy}}</td>
		</tr>
		@endif
        @if($val->Insurerhealth!='')
		<tr>
			<th>Insurer Health</th>
			<td>{{$val->Insurerhealth}}</td>
		</tr>
		@endif
        @if($val->Insurerlife!='')
		<tr>
			<th>Insurer Life</th>
			<td>{{$val->Insurerlife}}</td>
		</tr>
		@endif
		<tr>
		<th>Created date</th>
		<td>{{$val->createddate}}</td>
		</tr>
       @endforeach
</table>
</html>
