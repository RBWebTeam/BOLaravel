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
<p>Dear User,</p>
@foreach($maildata as $val)
<p>You have assigned Followup From <b>{{$val->EmployeeName}}</b>({{$val->MobileNo}}-{{$val->EmployeeCategory}}) on {{$val->followup_date}} for {{$val->disposition}}</p>
<table>	
	<tr>
		<th>FBAID</th>
		<td>{{$val->FBAID}}</td>
	</tr>
	<tr>
		<th>FBA Name</th>
		<td>{{$val->FullName}}</td>
	</tr>
	<tr>
		<th>FBA Phone No.</th>
		<td>{{$val->MobiNumb1}}</td>
	</tr>
	<tr>
		<th>FBA Email</th>
		<td>{{$val->EmailID}}</td>
	</tr>
	<tr>
		<th>Disposition</th>
		<td>{{$val->disposition}}</td>
	</tr>
	<tr>
		<th>Remark</th>
		<td>{{$val->remark}}</td>
	</tr>
		<tr>
		<th>Followup Date</th>
		<td>{{$val->followup_date}}</td>
	</tr>
	<tr>
		<th>Created Date</th>
		<td>{{$val->create_at}}</td>
	</tr>
	@endforeach
</table>
<div>
	<p>Thanks & Regards</p>
	<p>Team Magic Finmart</p>
	<img src="http://bo.magicfinmart.com/images/logo.png"/>
</div>
</html>	