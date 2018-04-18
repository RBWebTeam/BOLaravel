@extends('include.master')
@section('content')

<div id="content" style="overflow:scroll;">
			 <div class="container-fluid white-bg">
			 <div class="col-md-12"><h3 class="mrg-btm">SMS Template</h3></div>
			 <!-- Date Start -->
			 
		       <div class="col-sm-8 col-md-offset-0 col-xs-12 form-padding mrg-btm" id="StatesV" >
					<!-- <form id="frmsmstemplate" method="Post" >
					 {{ csrf_field() }}
 -->
			<form class="form-horizontal" action="{{url('insert_template')}}" method="post">
                     {{csrf_field()}}
                    <div>
	               <!--  <table class="table table-responsive table-hover" cellspacing="0">
		            <tbody> -->
		            <div class="form-group">
                    <label for="inputEmail" class="control-label col-xs-1">Heading</label>
                    <div class="col-xs-6" >
                    <input type="text" name="hname" id="hname" class="form-control" >
                    </div>
			
                    </div>
				    </div>
				    <br>
				    </div>

                     <div class="col-sm-6 col-xs-12 form-padding">
                     <textarea name="txtmesg" id="txtmesg" style="padding:08px; height:80px;">Type SMS </textarea>
	             
	                 <center><button type="submit" class="btn btn-primary">SAVE</button></center>

	                   </form>

<!-- 
	                 <div class="form-group">
                 <center><button type="submit" id="sub" class="btn btn-primary">Save</button></center> 
      </div>	
				   -->   <!-- <div class="center-obj pull-left">
				     <button class="common-btn" id="btnsave">Save</button>
                     </div> -->
			
        	@endsection