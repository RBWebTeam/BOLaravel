@extends('include.master')
@section('content')



			 <div class="container-fluid white-bg">
			 <div class="col-md-12"><h3 class="mrg-btm">FBA List</h3></div>
			 
			 
			 <!-- Filter Strat -->
			 <!-- <div class="col-md-12">
			 <div class="panel panel-primary">
			 <div class="panel-heading">
						<h3 class="panel-title">Filter</h3>
						<div class="pull-right">
							<span class="clickable filter" data-toggle="tooltip" data-container="body">
							<span class="glyphicon glyphicon-plus glyphicon1"></span> &nbsp;&nbsp;
								<span class="glyphicon glyphicon-filter glyphicon1 fltr-tog"></span>
							</span>
						</div>
					</div>
					<div class="panel-body filter-bdy" style="display:none">
						<input type="text" class="form-control" id="dev-table-filter" data-action="filter" data-filters="#dev-table" placeholder="Search..." />
					</div>
			 </div>
			 </div> -->
			 <!-- Filter End -->
			 
			 <!-- Date Start -->
			 <div class="col-md-4">
			  <div class="form-group">
			   
                <p>From Date</p>
			   <div id="datepicker" class="input-group date" data-date-format="dd-mm-yyyy">
               <input class="form-control" type="text" placeholder="From Date" / value="01-01-2017">
              <span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
              </div>
            </div>
           </div>
		   <div class="col-md-4">
			 <div class="form-group">
			 <p>To Date</p>
			   <div id="datepicker1" class="input-group date" data-date-format="dd-mm-yyyy">
           <input class="form-control" type="text" placeholder="From Date" / value="<?php echo date('d-m-y');?>">
              <span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
              </div>
            </div>
           </div>
		   <div class="col-md-4">
		   <div class="form-group"> <button class="common-btn mrg-top">SHOW</button></div>
		   </div>
		   <!-- Date End -->
		
			 <div class="col-md-12">
			 <div class="overflow-scroll">
			 <div class="table-responsive" >

			<table class="datatable-responsive table table-striped table-bordered dt-responsive nowrap" id="example">
                                    <thead>
					                  <tr>
					                   <th>Full Name</th>
					                   <th>Created Date</th>
					                   <th>Mobile No</th>
					                   <th>Email ID</th>
									   <th>Payment Link</th>
									   <th>Password</th>
					                   <th>City</th>
									   <th>Pincode</th>
					                   <th>FSM Details</th>
					                   <th>POSP No</th>
									   <th>Loan ID</th>
					                   <th>Posp Name</th>
					                   <th>Partner Info</th>
					                   <th>Documents</th>
									   <th>Bank Account</th>
									   <th>SMS</th>
									   <th>sales code</th>
                                     </tr>
                                    </thead>
					                <tbody>
					              @foreach($query as $val)
					                 <tr>
					                  <td><?php echo $val->FullName; ?></td>
					                  <td><?php echo $val->createdate; ?></td>
					                  <td><?php echo $val->MobiNumb1; ?></td>
					                  <td><?php echo $val->EMaiID; ?></td>

					                  <td><a href="#" class="popover-Payment" data-toggle="popover" title="Payment link" data-content="<?php echo $val->Link; ?>">Payment link</a></td>
					                  <td><a href="#" class="popover-Password" data-toggle="popover" title="Show Password" data-content="<?php echo $val->Password; ?>">*****</a></td>
					                  <td><?php echo $val->city; ?></td>
					                  <td><?php echo $val->Pincode; ?></td>
					                  <td>Fsm Details</td>
					                  <td><?php echo $val->POSPNo; ?><a href="#" style="" class="check" data-toggle="modal" data-target="#updatePosp" onclick="POSP_UPDATE(<?php echo $val->fbaid; ?>)">update</a>
					                   <input id="txtPosp" value="<?php echo $val->POSPNo; ?>" type="hidden" name=""/></td>
					                  <td><?php echo $val->LoanID; ?><a href="#" style="" class="checkloan" data-toggle="modal" data-target="#updateLoan" onclick="LoanID_UPDATE(<?php echo $val->fbaid; ?>)">update</a>
					                   <input id="txtloan" value="<?php echo $val->LoanID; ?>" type="hidden" name=""/></td>
					                  <td><?php echo $val->pospname; ?></td>
					                  <td><a href="" data-toggle="modal" data-target="#partnerInfo">partner info</a></td>
					                  <td>Pending</td>
					                  <td><?php echo $val->bankaccount; ?></td>
					                   <td><a href="#" data-toggle="modal" data-target="#sms_sent_id" onclick="SMS_FN(<?php echo $val->fbaid;?>,<?php echo $val->MobiNumb1;?>)">sms</a></td>
					                  <td><a href="#">update</a></td>
					                  
					              </tr>
					              @endforeach
					              </tbody>
		       
            </table>
			</div>
			</div>
			</div>
			</div>
            </div>

<!-- send sms -->
<div class="sms_sent_id id modal fade" role="dialog">   
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
        <h4 class="modal-title">SEND SMS</h4>
      </div>
      <div class="modal-body">
        <form id="message_sms_id">
          <div class="form-group">
            <label class="control-label" for="recipient-name">Mobile Nubmer:</label>
            <input class="form-control Mobile_ID" id="recipient-name" type="text" name="mobile_no" readonly=""/>
            <input id="fba_id" type="hidden" name="fbaid"/>
          </div>
          <div class="form-group">
            <label class="control-label" for="message-text">SMS :</label>
            <textarea class="form-controll sms_id" id="message-text" name="sms"></textarea>
          </div>
        </form>
        <div class="modal-footer">
          <button class="btn btn-default" type="button" data-dismiss="modal">Close</button>
          <button class="btn btn-primary message_sms_id" type="button">Send</button><b class="alert-success primary" id="strong_id"></b>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- update posp -->
<div class="updatePosp modal fade" role="dialog">   
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
        <h4 class="modal-title">UPDATE POSP</h4>
      </div>
      <div class="modal-body">
        <form id="posp_from_id">
          <div class="form-group">
            
          </div>
          <div class="form-group">
            <label class="control-label" for="message-text">POSP :</label>
            <input type="number" class="recipient-name form-control" id="posp_name_id" name="posp_name" required="yes" />
          </div>
        </form>
        <div class="modal-footer"> 
          <button class="btn btn-default" type="button" data-dismiss="modal">Close</button>
          <button id="btnpospupdate" class="btn btn-primary posp_from_id" type="button">Save changes</button><b class="alert-success primary" id="strong_lead"></b>
          <input id="fba_id_posp" type="hidden" name="fbaid"/>
          <input id="flage_id" type="hidden" name="flage_id"/>
        </div>
      </div>
    </div>
  </div>




</div>
<!-- update Loan -->
<div class="updateLoan modal fade" role="dialog">   
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
        <h4 class="modal-title">UPDATE LOAN</h4>
      </div>
      <div class="modal-body">
        <form id="posp_from_id">
          <div class="form-group">
            
          </div>
          <div class="form-group">
            <label class="control-label" for="message-text">Loan Id:</label>
            <input type="number" class="recipient-name form-control" id="loan_id" type="text" name="posp_name"/>
          </div>
        </form>
        <div class="modal-footer"> 
          <button class="btn btn-default" type="button" data-dismiss="modal">Close</button>
          <button id="btnloanupdate" class="btn btn-primary loan_from_id" type="button">Save changes</button>
          <input id="fba_id_loan" type="hidden" name="fba_id_loan"/>
          <input id="flage_idloan" type="hidden" name="flage_idloan"/>
          <b class="alert-success primary" id="strong_lead"></b>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- Partner Info Start -->
<div id="partnerInfo" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Partner Info</h4>
      </div>
      <div class="modal-body">
	  <div class="table-responsive">
        <table class="table table-bordered table-striped">
		    <tr>
			 <td>Partner ID</td>
			 <td>Name</td>
			 <td>Mobile No</td>
			 <td>Email</td>
			 <td>City</td>
			 <td>Pincode</td>
			</tr>
			<tr>
			 <td></td>
			 <td>Pavamaana Softech</td>
			 <td>9845724268</td>
			 <td>bgykumar@gmail.com</td>
			 <td>Bangalore</td>
			 <td>560021</td>
			</tr>
		</table>
		</div>
      </div>
    </div>
  </div>
</div>
<!-- Partner Info End -->


@endsection





 