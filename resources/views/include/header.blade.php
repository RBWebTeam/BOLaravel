<div class="container-fluid hedr">
<div class="col-md-1 col-xs-1 no-mob-pad">
<div id="sidebarCollapse" class="menu-btn"  >
  <div class="bar1"></div>
  <div class="bar2"></div>
  <div class="bar3"></div>
  </div>
</div>
<div class="col-md-2 col-xs-4 no-mob-pad"><a href="{{url('dashboard')}}"><img src="{{url('images/logo1.png')}}" class="img-responsive logo pull-left"/></a></div>
<div class="col-md-3">
<div class="search-dv pull-left">

</div>
</div>
<div class="col-md-5 col-xs-5 no-mob-pad">
<div class="pull-right log-txt">

 
<p><span class="hidden-xs">Welcome :</span><b>  @if($username= Session::get('username')) {{ucfirst($username)}}  @endif</b></p>
<p><span class="hidden-xs">Last login :</span> <b>@if($last_login= Session::get('last_login')) <?php $date = date_create($last_login); ?> {{date_format($date, 'd/m/y : g:i A')}}  @endif</b></p>


 


</div>
</div>
<div class="col-md-1 col-xs-2 no-mob-pad"><a href="log-out" class="pull-right log-btn"><span class="logout-btn"><img src="{{url('images/icon/exit.png')}}"></span></a></div>
<span class="search-btn hidden-md hidden-lg pull-right"><img src="{{url('images/icon/search.png')}}"></span>
</div>