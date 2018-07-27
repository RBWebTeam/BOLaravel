<html>
	Hello,
	
	<p>{!! $data !!}</p>
	@foreach($lastid as $val)
	<p><?php echo $val->FullName?$val->FullName:"Finmart" ?></p>
	<p>#{{$val->TicketRequestId}} Finmart issue</p>
	<p>{{$val->p_Message}}</p>
	@endforeach

    <img src="http://bo.mgfm.in/images/logo1.png">
	<p>Warm Regards,</p>
	<p>Magic Finmart Team</p>
</html>