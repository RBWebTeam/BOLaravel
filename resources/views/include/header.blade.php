<div class="container-fluid hedr">
<div class="col-md-1 col-xs-1 no-mob-pad">
<div id="sidebarCollapse" class="menu-btn" onclick="myFunction(this)">
  <div class="bar1"></div>
  <div class="bar2"></div>
  <div class="bar3"></div>
  </div>
</div>
<div class="col-md-2 col-xs-4 no-mob-pad"><a href="http://localhost:8000/dashboard"><img src="images/logo1.png" class="img-responsive logo pull-left"/></a></div>
<div class="col-md-3">
<div class="search-dv pull-left">
<!-- <div class="input-group">
<input type="text" value="" class="search" placeholder="Search dashboard...">
<span class="input-group-btn"><button type="button" class="btn btn-primary">Go</button></span>
</div> -->
</div>
</div>
<div class="col-md-5 col-xs-5 no-mob-pad">
<div class="pull-right log-txt">

<?php $request=Session::get('loginame'); ?>
<?php $request1=Session::get('mobile'); ?>
<p><span class="hidden-xs">Welcome </span><b><?php echo $request ?></b></p>
<p><span class="hidden-xs">Last login - Date / Time :</span> <b><?php echo $request1 ?></b></p>

<!-- <?php $request=Session::get('FullName'); ?>
<?php $request1=Session::get('LastloginDate'); ?>
<div><span class="hidden-xs">Welcome </span><b><?php echo $request ?>User1</b></div>
<div><span class="hidden-xs">Last login - Date / Time :</span> <b><?php echo $request1 ?></div></p>
 -->


<!-- <p><span class="hidden-xs">Welcome </span><b>Mr. Goving Dharne</b></p>
<p><span class="hidden-xs">Last login - Date / Time :</span> <b>22-09-2017 / 12.45 pm</b> -->
</p>


</div>
</div>
<div class="col-md-1 col-xs-2 no-mob-pad"><a href="log-out" class="pull-right log-btn"><span class="logout-btn"><img src="images/icon/exit.png"></span></a></div>
<span class="search-btn hidden-md hidden-lg pull-right"><img src="images/icon/search.png"></span>
</div>