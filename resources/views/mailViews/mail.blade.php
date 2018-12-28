

@foreach($user as $val)
<h3>Dear,</h3>
<h3>{{ $val->UserName }} </h3>
<p>Your Magicfinmart Password is:: {{$val->Password}}</p>

@endforeach

 <img src="http://bo.mgfm.in/images/logo1.png" style="">
	<p>Warm Regards,</p>
	<p>Magic Finmart Tech Support </p>