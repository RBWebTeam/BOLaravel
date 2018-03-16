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
         <div id="datepicker" class="input-group date" data-date-format="yyyy-mm-dd">
               <input class="form-control date-range-filter" type="text" placeholder="From Date" name="fdate" id="min-date"  />
              <span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
            </div>
            </div>
           </div>
       <div class="col-md-4">
       <div class="form-group">
       <p>To Date</p>
       <div id="datepicker1" class="input-group date" data-date-format="yyyy-mm-dd">
               <input class="form-control date-range-filter1" type="text" placeholder="To Date"  name="todate"  id="max-date"/>
              <span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
              </div>
            </div>
           </div>
       <div class="col-md-4">
       <div class="form-group"> <input type="submit" name="" id="btndate"  class="mrg-top common-btn" value="SHOW">  </div>
       </div>
    
 
  <select  id="msds-select">
   <option value="0">ALL</option>
  <option value="1">POSP Yes</option>
  <option value="2">POSP No</option>
  </select>
  </form>
           <!-- Date End -->
             <div class="col-md-12">
             <div class="overflow-scroll">
             <div class="table-responsive" >
             <table class="datatable-responsive table table-striped table-bordered nowrap" id="fba-list-table">
                                       <thead>
                                       <tr>
                                       <th>FBA ID</th> 
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



 <div class="fbadoc modal fade" role="dialog">   
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
        </form>
      </div>
    </div>
  </div>
</div>

 <!-- fab document -->
 <!-- <div class="fbadoc modal fade" role="dialog">   
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
            <label class="control-label" for="Document-Type">Document Type: </label>
            <select class="form-control">
              <option selected="selected">select Document Type</option>
              @foreach($doctype as $val)
             <option value="{{$val->id}}">{{$val->name}}</option>
              @endforeach

            </select>
          </div>
           div class="form-group">
            <label class="control-label" for="Document">Document</label>
            <input type="file" name="document" class="form-control"> 
          </div>
        </form>
        <div class="modal-footer"> 
          <button class="btn btn-primary" id="btnupload" type="button">Upload</button>
          <input id="docfbaid" type="hidden" name="docfbaid"/>
        </div>
      </div>
    </div>
  </div>
</div> -->

<!-- sales update -->

<div class="salesupdate modal fade" role="dialog" id="salesupdate_modal_fade">   
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
        <h4 class="modal-title">Sales Code</h4>
      </div>
      <div class="modal-body">
        <form name="update_remark" id="update_remark">
         {{ csrf_field() }}
         <div class="form-group">
            <input type="hidden" name="p_fbaid" id="p_fbaid" value="">
            <label class="control-label" for="message-text">Enter Sales Code : </label>
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
            <label class="control-label" for="message-text">Enter POSP : </label>
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
        <div id="divpartnertable" name="divpartnertable">

        </div>
        </div>

      </div>
    </div>
  </div>
</div>
<!-- Partner Info End -->

<div id="docviwer" class="modal fade" role="dialog">
  <div class="modal-dialog">
   <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title" style="text-align:center;">Attachment</h4>
      </div>
      <div class="modal-body">

      <div class="table-responsive">
        <div id="divdocviewer" name="divdocviewer">
        </div>
        <div>
         <img id="imgdoc" style="cursor:pointer;margin:5px;padding:10px;">
         </div>
       </div>
     </div>
    </div>
  </div>
</div>


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
<!-- paymentlink -->
 

<div id="paylink_payment" class="modal fade paylink_payment" role="dialog">
  <div class="modal-dialog">
   <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Payment link</h4>
      </div>
      <div class="modal-body">
    <div style="color: blue;" id="divpartnertable_payment" class="divpartnertable_payment">
       
    </div>
      </div>
    </div>
  </div>
</div>
@endsection
<script type="text/javascript" src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
<script type="text/javascript">

  $(document).ready(function() {
     $('#fba-list-table').DataTable({

      "createdRow": function(row, data, dataIndex ) {
      if ( data.PayStat=="S" ) {
        $(row).css({backgroundColor: 'LightGreen'});
      }
    },
        "ajax": "get-fba-list",
        "columns": [
             { "data": "fbaid"},
            { "data": "FullName"},
            { "data": "createdate" },
            { "data": "MobiNumb1" },
            { "data": "EMaiID" },
            { "data": "Link",
              "render": function ( data, type, row, meta ) {
                return '<a id="btnviewhistory" data-toggle="modal" data-target="#paylink_payment" onclick="getpaymentlink('+row.fbaid+')">Payment link</a>';
              }
             }, 

            {"data":"pwd" ,
             "render": function ( data, type, row, meta ) {
                return '<a class="popover-Password" data-toggle="popover" title="Show Password" data-content="'+data+'">*****</a>';
              }
            },        
            {"data":"City"},
            {"data":"Pincode"},
            {"data":null  ,
             "render": function ( data, type, row, meta ) {
                return '<a href="#" style="" data-toggle="modal" data-target=".fsmdetails">Fsm details</a>';
              }
            },
            {"data":"POSPNo"  ,
             "render": function ( data, type, row, meta ) {
              return data==""?('<a id="posp_'+row.fbaid+'" class="checkPosp" data-toggle="modal" data-target="#updatePosp" onclick="POSP_UPDATE('+row.fbaid+')">update</a>'):data;
              }
            },  



            {"data":"LoanID"  ,
             "render": function ( data, type, row, meta ) {
                return data==""?('<a id="loan_'+row.fbaid+'" class="checkloan" data-toggle="modal" data-target="#updateLoan" onclick="LoanID_UPDATE('+row.fbaid+')">update</a>'):data;
              }
            },  
            {"data":"pospname"},  
            {"data":null  ,
             "render": function ( data, type, row, meta ) {
                return '<a href="" data-toggle="modal" data-target="#partnerInfo" onclick="getpartnerinfo('+row.fbaid+')">partner info</a>';
              }
            },  
            {"data":"fbaid" ,
             "render": function ( data, type, row, meta ) {

                return '<a href="" style="" data-toggle="modal"  data-target="#docviwer" onclick="uploaddoc('+data+')" >Pending</a>';

    

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
                return data==""?('<a  id="update_'+data+'" onclick="sales_update_fn('+data+')" >'+data+'</a>'):('<a  id="update_'+row.fbaid+'" onclick="sales_update_fn('+row.fbaid+')" >Update</a>');
              }
            },
            
        ],
    });
});  

 

function myFunction() {
  var input, filter, table, tr, td, i;
  input = document.getElementById("#myInput");
  filter = input.value.toUpperCase();
  table = document.getElementById("fba-list-table");
  tr = table.getElementsByTagName("tr");
  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[9];
    if (td) {
      if (td.innerHTML.toUpperCase().indexOf(filter) > -1) {
        tr[i].style.display = "";
      } else {
        tr[i].style.display = "none";
      }
    }       
  }
}

</script>
