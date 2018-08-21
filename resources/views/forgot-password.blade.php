<!doctype html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Finmart - Login</title>
<link type="text/css" rel="stylesheet" href="{{url('stylesheets/sidebar.css')}}">
	<link type="text/css" rel="stylesheet" href="{{url('stylesheets/bootstrap.min.css')}}"> 
	<link type="text/css" rel="stylesheet" href="{{url('stylesheets/style.css')}}">

	<link type="text/css" href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap-glyphicons.css" rel="stylesheet">
	<script type="text/javascript" src="{{url('javascripts/jquery.min.js')}}"></script>
	 <script type="text/javascript" src="{{url('javascripts/bootstrap.min.js')}}"></script>
	 <script type="text/javascript" src="{{url('javascripts/filter.js')}}"></script>
	 <link type="text/css" rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	 <script type="text/javascript" src="{{url('javascripts/bootstrap-datepicker.js')}}"></script>
	 <link href="{{url('stylesheets/datepicker.css')}}" rel="stylesheet" type="text/css" />
</head>

<body class="bg">
	
	<div class="continer">
	</br></br></br></br>
	 <div class="col-md-4"></div>
		<div class="col-md-4">
		<div class="login">
			<div class="logo-bg"><img src="images/logo.png" class="img-responsive img-center"/></div>
			<div class="login-bdy">
			 <h2 class="text-center">Forgot Password</h2>
			 <br>
			<form method="post" action="{{'forgot-login'}}" id="forogetp" name="forogetp" >
							{{ csrf_field() }}
			   <div class="form-group">
			  <input type="text" name="email" id="email" class="form-control input-cs" placeholder="email"  />
			
			  </div>
			
			  <input type="submit" id="sub_btn" class="btn btn-default submit-btn"/>
			
			 </form>
			</div>
			</div>
		</div>
		<div class="col-md-4"></div>
	</div>
	
</body>
</html>
