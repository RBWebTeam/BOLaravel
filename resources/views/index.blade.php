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
			 <h2 class="text-center">SIGN IN</h2>
			 <br>
			<form action="{{url('admin-login')}}" method="post" >
				{{ csrf_field() }}
			   <div class="form-group">
			  <input type="text" name="email" value="vivekkhandekar758@gmail.com" class="form-control input-cs" placeholder="email"  />
			  @if ($errors->has('email'))<label class="control-label" for="inputError"> {{ $errors->first('email') }}</label>  @endif
			  </div>
			  <div class="form-group">
			  <input type="password" name="password" class="form-control input-cs" placeholder="Password"  />
			   @if ($errors->has('password')) <label class="control-label" for="inputError">{{ $errors->first('password') }} </label> @endif
			  </div>
			  <div class="form-group has-error">
                                @if (Session::has('msg')) <label class="control-label" for="inputError">{{ Session::get('msg') }} </label>@endif
               </div>

			  <input type="Submit" class="btn btn-default submit-btn" value="Submit"/>
			   <button type="button" class="btn btn-default submit-btn"  data-target="#pwdModal" data-toggle="modal" value=""/>Forget Password</button>
 			 <!--  <a href="forgot-password.php" class="forgot-pass pull-right">Forgot Password</a> -->
			</form>
			</div>
			@if(Session::has('msg'))
             <div class="alert alert-success alert-dismissible">
             <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
             <p class="alert alert-success">{{ Session::get('msg') }}</p>
            </div>
           @endif
			</div>
		</div>
		<div class="col-md-4"></div>
	</div>




<!--modal-->
<div id="pwdModal" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog">
  <div class="modal-content">
      <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
          <h1 class="text-center">What's My Password?</h1>
      </div>
      <div class="modal-body">
          <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <div class="text-center">
                          
                          <p>If you have forgotten your password you can reset it here.</p>

                          <form method="post" action="{{url('forgot-password')}}">
                          {{ csrf_field() }}
                            <div class="panel-body">
                                <fieldset>
                                    <div class="form-group">
                                        <input class="form-control input-lg" placeholder="E-mail Address"  value="" name="email" type="email">
                                    </div>
                                    <input type="submit" class="btn btn-primary"  value="Send My Password">
                                </fieldset>
                            </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
      </div>
      <div class="modal-footer">
          <div class="col-md-12">
          <button class="btn" data-dismiss="modal" aria-hidden="true">Cancel</button>
		  </div>	
      </div>
  </div>
  </div>
</div>



















	
</body>
</html>
