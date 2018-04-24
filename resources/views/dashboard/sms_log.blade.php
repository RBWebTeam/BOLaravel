@extends('include.master')
@section('content')

<div id="content" style="overflow:scroll;">
			 <div class="container-fluid white-bg">
			 <div class="col-md-12"><h3 class="mrg-btm">SMS LOG </h3></div>
			 <!-- Filter End -->
			 <!-- <div class="col-md-12">
			 <div class="panel panel-primary">
			 <div class="panel-heading">
						<h3 class="panel-title">Filter</h3>
						<div class="pull-right">
							<span class="clickable filter" data-toggle="tooltip" data-container="body">
							<span class="glyphicon glyphicon-plus mrg-tp-forteen"></span> &nbsp;&nbsp;
								<span class="glyphicon glyphicon-filter glyphicon1"></span>
							</span>
						</div>
					</div>
					<div class="panel-body filter-bdy" style="display:none">
						<input type="text" class="form-control" id="dev-table-filter" data-action="filter" data-filters="#dev-table" placeholder="Search..." />
					</div>
			 </div>
			 </div> -->
			 <!-- Filter End -->
			 <div class="col-md-12">
			 <div class="overflow-scroll">
			 <div class="table-responsive" >
				<table class="table table-bordered table-striped tbl" id="dev-table" >
                 <thead>
                  <tr>
                   <th>SMSID</th>
                   <th>FBAID</th>
                   <th>Mobile No</th>
                   <th>Message</th>
				   <th>Msg time</th>
				   <th>Issent</th>
                   <th>create_date</th>
                   
                 </tr>
                </thead>
                <tbody>
                
				 
        @foreach($query as $val)   

       <td><?php echo $val->smsid; ?></td> 
       <td><?php echo $val->fbaid; ?></td>
       <td><?php echo $val->mobileno; ?></td>
        <td><?php echo $val->message; ?></td> 
       <td><?php echo $val->msgtime; ?></td>
       <td><?php echo $val->issent; ?></td>
       <td><?php echo $val->create_date; ?></td>
      </tr>
       @endforeach
               
             </tbody>
            </table>
			</div>
			</div>
			<!-- Pagination Start -->
			<div>
			<!-- <h5 class="pull-left"><b>Records :</b> <span>1 to 10 </span>Of <span class="badge">186</span><h5> -->
			<ul class="pagination pull-right">
              <li><a href="#">1</a></li>
              <li><a href="#">2</a></li>
              <li><a href="#">3</a></li>
              <li><a href="#">4</a></li>
              <li><a href="#">5</a></li>
            </ul>
			</div>
			<!-- Pagination End -->
			</div>
			<!-- <div class="center-obj center-multi-obj">
         <button type="submit" id="buttonsub" class="common-btn">Submit</button>
         </div> -->
			</div>
            </div>
	@endsection
			
			
			
			