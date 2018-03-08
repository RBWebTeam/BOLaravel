@extends('include.master')
@section('content')



             <div class="container-fluid white-bg">
             <div class="col-md-12"><h3 class="mrg-btm">FBA List<!-- <span><span style="float: right;" class="glyphicon glyphicon-filter" data-toggle="modal" data-target="#Filter" ></span>
         <span style="float: right;" class="glyphicon glyphicon-refresh" onclick="window.location.reload()"></span> </span> --></h3>

        <hr>
       </div>

			 
			 
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
			 
			 <form>

       <div class="col-md-4">
      <div class="form-group">
      <p>From Date</p>
         <div id="datepicker" class="input-group date" data-date-format="mm-dd-yyyy">
               <input class="form-control date-range-filter" type="text" placeholder="From Date" name="fdate" id="min-date"  />
              <span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
              </div>
            </div>
           </div>
       <div class="col-md-4">
       <div class="form-group">
       <p>To Date</p>
       <div id="datepicker1" class="input-group date" data-date-format="mm-dd-yyyy">
               <input class="form-control date-range-filter1 " type="text"  placeholder="To Date"  name="todate"  id="max-date"   />
              <span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
              </div>
            </div>
           </div>
       <div class="col-md-4">
       <div class="form-group"> <input type="submit" name=""  class="mrg-top common-btn" value="SHOW">  </div>
       </div>
       </form>
           <!-- Date End -->
        
             <div class="col-md-12">
             <div class="overflow-scroll">
             <div class="table-responsive" >


            <table class="datatable-responsive table table-striped table-bordered  nowrap" id="fba-list-table">
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
        <form id="message_sms_from" method="post">
          {{ csrf_field() }}
          <div class="form-group">
            <label class="control-label" for="recipient-name">Mobile Nubmer:</label>
            <input class="form-control Mobile_ID" id="recipient" type="text" name="mobile_no" readonly=""/>
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
 <!-- fsm details -->
 <div class="fsmdetails modal fade" role="dialog">   
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
        <h4 class="modal-title">FSM Details</h4>
      </div>
      <div class="modal-body">
        <form id="posp_from_id">
          <div class="form-group">
            
          </div>
          <div class="form-group">
            <label class="control-label" for="message-text">FSM Email Id : </label>
          </div>
           <div class="form-group">
            <label class="control-label" for="message-text">FSM Mobile No : </label>
            
          </div>
        </form>
        <div class="modal-footer"> 
          <button class="btn btn-default" type="button" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>
</div>

 <!-- fab document -->
 <div class="fbadoc modal fade" role="dialog">   
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
        <h4 class="modal-title">Upload FBA Documents</h4>
      </div>
      <div class="modal-body">
        <form id="fbadocupload" method="POST" enctype="multipart/form-data">
          <div class="form-group">
            
          </div>
          <div class="form-group">
            <label class="control-label" for="Document-Type">Document Type: </label>
            <select class="form-control" id="ddldoctype" name="ddldoctype">
              <option selected="selected" value="0">select Document Type</option>
              @foreach($doctype as $val)
             <option value="{{$val->id}}">{{$val->name}}</option>
              @endforeach
           </select>
          </div>
           <div class="form-group">
            <label class="control-label" for="Document">Document</label>
            <input type="file" id="document" name="document" class="form-control"> 
          </div>
        </form>
        <div class="modal-footer"> 
          <button class="btn btn-primary" id="btnupload" type="button">Upload</button>
          <input id="docfbaid" type="hidden" name="docfbaid"/>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- sales update -->

<div class="salesupdate modal fade" role="dialog" id="salesupdate_modal_fade">   
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
        <h4 class="modal-title">Partner Detail</h4>
      </div>
      <div class="modal-body">
        <form name="update_remark" id="update_remark">
         {{ csrf_field() }}
         <div class="form-group">
            <input type="hidden" name="p_fbaid" id="p_fbaid" value="">
            <label class="control-label" for="message-text">Enter Remark : </label>
            <input type="text" class="recipient-name form-control" id="p_remark" name="p_remark" required="" />
          </div>
        </form>
        <div class="modal-footer"> 
          <button class="btn btn-default" type="button" data-dismiss="modal">Close</button>
          <a id="sales_update" class="btn btn-primary" type="button">Update</a><b class="alert-success primary" id=""></b>
          
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
        <form name="update_posp" id="update_posp">
         {{ csrf_field() }}
         <div class="form-group">
            <input type="hidden" name="fbaid" id="fbaid" value=" ">
            <label class="control-label" for="message-text">Enter Remark : </label>
            <input type="text" class="recipient-name form-control" id="posp_remark" name="posp_remark" required="" />
          </div>
        </form>
        <div class="modal-footer"> 
          <button class="btn btn-default" type="button" data-dismiss="modal">Close</button>
          <a id="posp_update" class="btn btn-primary" type="button">Update</a><b class="alert-success primary" id=""></b>
          
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
        <form name="update_loan" id="update_loan">
         {{ csrf_field() }}
         <div class="form-group">
            <input type="hidden" name="fba_id" id="fba_id" value=" ">
            <label class="control-label" for="remark">Enter Remark : </label>
            <input type="text" class="recipient-name form-control" id="remark" name="remark" required="" />
          </div>
        </form>
        <div class="modal-footer"> 
          <button class="btn btn-default" type="button" data-dismiss="modal">Close</button>
          <a id="loan_update" class="btn btn-primary" type="button">Update</a><b class="alert-success primary" id=""></b>          
        </div>
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
<!--Filter -->
<div class="Filter modal fade" id="Filter" role="dialog">   
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
        <h4 class="modal-title">Filter</h4>
      </div>
      <div class="modal-body">
        <form id="posp_from_id">
          <div class="form-group">
          </div>
          <div class="form-group">
            <select class="recipient-name form-control" > 
              <option>FBA</option>
              <option>POSP</option>
              <option>FBA</option>
            </select>
            <input type="text" class="recipient-name form-control" id="" name="" required="yes" />
        </div>
        </form>
        <div class="modal-footer"> 
          <button class="btn btn-default" type="button" data-dismiss="modal">Close</button>
          <button id="" class="btn btn-primary" type="button">search</button>
        </div>
      </div>
    </div>
  </div>
</div>
<script type="text/javascript">




</script>


@endsection
<script type="text/javascript" src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
<script type="text/javascript">
    $(document).ready(function() {
    $('#fba-list-table').DataTable( {
        "ajax": "get-fba-list",
        "columns": [
           
            { "data": "FullName"},
            { "data": "createdate" },
            { "data": "MobiNumb1" },
            { "data": "EMaiID" },
            { "data": "Link",
             "render": function ( data, type, row, meta ) {
                return '<a href="#" class="popover-Payment" data-toggle="popover" title="Payment link" data-content="'+data+'">Payment link</a>';
              }
             }, 
            {"data":"pwd" ,
             "render": function ( data, type, row, meta ) {
                return '<a href="#" class="popover-Password" data-toggle="popover" title="Show Password" data-content="'+data+'">*****</a>';
              }
            },        
            {"data":"City"},
            {"data":"Pincode"},
            {"data":"fbaid"  ,
             "render": function ( data, type, row, meta ) {
                return '<a href="#" style="" data-toggle="modal" data-target=".fsmdetails">Fsm details</a>';
              }
            },
            {"data":"POSPNo"  ,
             "render": function ( data, type, row, meta ) {
                return data?('<a id="posp_'+data+'" class="checkPosp" data-toggle="modal" data-target="#updatePosp" onclick="POSP_UPDATE('+data+')">update</a>'):data;
              }
            },  



            {"data":"LoanID"  ,
             "render": function ( data, type, row, meta ) {
                return data?('<a id="loan_'+data+'" class="checkloan" data-toggle="modal" data-target="#updateLoan" onclick="LoanID_UPDATE('+data+')">update</a>'):data;
              }
            },  
            {"data":"pospname"},  
            {"data":"fbaid"  ,
             "render": function ( data, type, row, meta ) {
                return '<a href="" data-toggle="modal" data-target="#partnerInfo">partner info</a>';
              }
            },  
            {"data":"fbaid" ,
             "render": function ( data, type, row, meta ) {
                return '<a href="#" style="" data-toggle="modal" data-target="fbadoc" onclick="uploaddoc('+data+')" >Pending</a>';
              }
            }, 
            {"data":"bankaccount"} ,
            {"data":"MobiNumb1" ,
             "render": function ( data, type, row, meta ) {
                return '<a href="#" data-toggle="modal" data-target="#sms_sent_id" onclick="SMS_FN(1,'+data+')"><span class="glyphicon glyphicon-envelope"></span></a>';
              }
            },
            {"data":"salescode" ,
             "render": function ( data, type, row, meta ) {
                return data?('<a  id="update_'+data+'" onclick="sales_update_fn('+data+')" >'+data+'</a>'):('<a  id="update_'+data+'" onclick="sales_update_fn('+data+')" >Update</a>');
              }
            },
            
        ],

    } );
} );
</script>
