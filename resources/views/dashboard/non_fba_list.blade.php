@extends('include.master')
@section('content')
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>

<style type="text/css">
  
  .hide {
  display:  none;
}
</style>




             <div class="container-fluid white-bg">
             <div class="col-md-12"><h3 class="mrg-btm">Non FBA List</h3>
           <hr>
           </div>

      <div class="col-md-2">
      <div class="form-group">

         <p>From Date</p>
         <div id="datepicker" class="input-group date" data-date-format="mm-dd-yyyy">
               <input class="form-control date-range-filter" type="text" placeholder="From Date" name="fdate" id="min"/>
              <span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
            </div>
            </div>
           </div>
       <div class="col-md-2">
       <div class="form-group">
       <p>To Date</p>
       <div id="datepicker1" class="input-group date" data-date-format="mm-dd-yyyy">
               <input class="form-control date-range-filter" type="text" placeholder="To Date"  name="todate"  id="max"/>
              <span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
              </div>
              </div>
            </div>
           
       <div class="col-md-4">

       <div class="form-group"> <input type="submit" name="btndate" id="btndate"  class="mrg-top common-btn pull-left" value="SHOW">  
     &nbsp;&nbsp;

<!--    <select  id="msds-select" class="pull-left mrg-top mrg-left">
   <option value="0">Posp Type</option>
  <option value="1">POSP Yes</option>
  <option value="2">POSP No</option>  fnamesearch

  </select> -->
   &nbsp;&nbsp;&nbsp;
  <form name="myform">
  <select id="msds-select" class="form-control" style="width:55%;margin:10px;margin-top:4px;display: -webkit-inline-box;"  name="one" onchange="selectIndex(this)">

   <option value="-1" selected="selected">Search By</option>
   <option value="0">All</option>
   <option value="1">POSP Yes</option>
   <option value="2">POSP No</option>
   <option value="FBAID">FBA ID</option>
   <option value="POSPNO">POSP Number</option>
   <option value="state">FBA STATE</option>
   <option value="zone">FBA ZONE</option>
   <option value="fbaname">FBA NAME</option>
   <option value="fbacity">FBA City</option>
   <option value="pospname">POSP Name</option>
   </select>

   <input type="text" id="txtfbasearch" name="txtfbasearch" placeholder="Search" onkeyup="searchdata()"  style="display: none; margin-left: 96px;"/>
 

  </form>
  </div> 
  </div>


  <!-- Date End -->

             <div class="col-md-12">
             <div class="overflow-scroll">
             <div id="divtable" class="table-responsive" >
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
                                       <th>State</th>
                                       <th>Zone</th>
                                       <th>Pincode</th>
                                       <th>POSP No(SSID)</th>
                                       <th>Loan ID</th> 
                                       <th>Posp Name</th> 
                                       <th>Posp Status</th> 
                                       <th>Bank Account</th>
                                       <th>Partner Info</th> 
                                       <th>Sales code</th>
                                       <th>FSM Details</th>  
                                       <th>Documents</th> 
                                       <th>Customer ID</th> 
                                       <th>Created Date1</th>
                                       </tr>
                                       </thead>
                                       </table>

  <div id="myDIV" >
  <a href="{{url('export')}}" class="qry-btn" id="pospbtn">Export</a>
  <!-- <a href="{{url('fba-list')}}" class="qry-btn" id="nonfb">FBA LIST</a> -->

</div>
</div>
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



<!--  <div class="fbadoc modal fade" role="dialog">   
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

 -->


        <div class="pageloader modal fade" role="dialog" id="pageloader">   
        <div class="modal-dialog" role="document">
        <div class="modal-content">
        <div class="modal-body">
        <form id="posp_from_id">
        </form>
             </div>
            </div>
          </div>
        </div>




<!-- sales update -->

<div class="salesupdate modal fade" role="dialog" id="salesupdate_modal_fade">   
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header"  >
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
          <input type="text" class="recipient-name form-control" id="posp_remark" name="posp_remark"  maxlength="4" required="" />
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
<!-- <div class="updateLoan modal fade" role="dialog">   
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
  </div> -->
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
    <img id="imgdoc" style="height:100%; width:100%;">
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

    <div class="col-md-12"> <br>
    <form method="POST" id="modelpaylink">
        {{ csrf_field() }}

   <textarea type="text" style="resize:none" name="divpartnertable_payment" cols="num" rows="num" id="divpartnertable_payment" class="divpartnertable_payment form-control" readonly> </textarea> 
    <br>
    </div> 
       
    <div class="col-md-12"> 
    <button type="button" style="margin-left:20px;" class="btn btn-info" name="paysub" id="paysub" onclick="getpaylinknew()" >Genrate Payment link</button> &nbsp;&nbsp;
    <button type="button" name="smspayment" id="smspayment" class="btn btn-success" data-dismiss="modal" style="padding-left:5px; " onclick="pmesgsend()">Send SMS</button>
    </div>

    
      
      <!-- <form id="modelpaylink" name="modelpaylink"> -->
    <!--  <form method="POST" id="modelpaylink">
        {{ csrf_field() }} -->
     <div id="divlink" class="modal-body"> </div>
     <div class="modal-footer">
     <input type="hidden" name="fba" id="fba">
     <input type="hidden" name="txtmono" id="txtmono">
     <input type="hidden" name="txtlink" id="txtlink">
     <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
     </div>
     <div class="modal-body"></div>

        </form>
      </div>
    </div>
</div>

<!-- Customer id start -->
<!-- <div id="customerupdate" class="modal fade customerupdate" role="dialog">
  <div class="modal-dialog"> -->
   <!-- Modal content-->
   <!--  <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Update Customer id</h4>
      </div>
      <div class="modal-body">
    <div style="color: blue;" id="divCustomer_id" class="divCustomer_id">
       
    </div>
      </div>
    </div>
  </div>
</div> -->
<!-- Customer id end -->

<!-- password -->

    <div id="spassword" class="modal fade spassword" role="dialog">
    <div class="modal-dialog">
    <div class="modal-content">
    <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal">&times;</button>
    <h4 class="modal-title">Password</h4>
    </div>
    <div class="modal-body">
    <div style="color: blue;" id="show_password" class="show_password">
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
        "order": [[ 0, "desc" ]],
        "ajax": "load-non-fba-list",
        "columns": [

            { "data": "fbaid"},
            { "data": "FullName",
              "render": function ( data, type, row, meta ) {
              return (data)+' <a target="_blank" href="Fba-profile/'+row.fbaid+' "><span class="glyphicon glyphicon-user"  title="FBA Profile"></span></a>';
              }
          },

            { "data": "createdate" },            
            {"data":"MobiNumb1" ,

             "render": function ( data, type, row, meta ) {
              return '<span>'+data+'</span></a> <a href="#" data-toggle="modal" data-target="#sms_sent_id" onclick="SMS_FN(1,'+data+')"><span class="glyphicon glyphicon-envelope"></span></a>';
              }
            },
            // { "data": "createdate" },
            { "data": "EMaiID" },         
            { "data": "Link",

         "render": function ( data, type, row, meta ) {
         return row.PayStat == "S"?'':'<a id="btnviewhistory" data-toggle="modal" data-target="#paylink_payment" onclick="getpaymentlink('+row.fbaid+','+row.MobiNumb1+')">Payment link</a>';
              }

             }, 

               {"data":"pwd" ,
              "render": function ( data, type, row, meta ) {
              return '<a id="btnshowpassword" data-toggle="modal" data-target="#spassword" onclick="getpassword('+"'"+ data+"'"+')">*****</a>';
              }

       },   

            {"data":"City"},
            {"data":"statename"},
            {"data":"Zone"},  
            {"data":"Pincode"},
            {"data":"POSPNo"  ,
             "render": function ( data, type, row, meta ) {
              return data==""?('<a id="posp_'+row.fbaid+'" class="checkPosp" data-toggle="modal" data-target="#updatePosp" onclick="updateposp('+row.fbaid+')">update</a>'):data;
              }
            }, 

             {"data":"LoanID"  ,
             "render": function ( data, type, row, meta ) {
                // return data==""?('<a id="loan_'+row.fbaid+'" class="checkloan" data-toggle="modal" data-target="#updateLoan" onclick="LoanID_UPDATE('+row.fbaid+')">update</a>'):data;
                 return (data==""||data=="0")?('<a id="btnviewid" onclick="getloanid(this,'+row.fbaid+')">Update</a>'):data;
              }
         }, 


             {"data":"pospname"},
             {"data":"pospstatus"},  
             {"data":"bankaccount"}, 
             {"data":null ,
             "render": function ( data, type, row, meta ) {
                return '<a href="" data-toggle="modal" data-target="#partnerInfo" onclick="getpartnerinfo('+row.fbaid+')">partner info</a>';
              } 

            }, 


     // {"data":"salescode" ,
     //         "render": function ( data, type, row, meta ) {
     //      return '<a href="#"id="update_'+row.fbaid+'" onclick="sales_update_fn('+row.fbaid+','+data+')" >'+data+'</a>';
     //          }
   
     //       },



              {"data":"salescode" ,
             "render": function ( data, type, row, meta ) {
            return ("<a id=update_"+row.fbaid+" onclick=sales_update_fn("+row.fbaid+",'"+data+"')>"+data+"</a>");
              }
   
           },

             {"data":null  ,
             "render": function ( data, type, row, meta ) {
                return '<a href="#" style="" data-toggle="modal" data-target=".fsmdetails">Fsm details</a>';
              }
            },
            
             {"data":"fdid" ,
             "render": function ( data, type, row, meta ) {
            return data == 1?'<a href="" style="" data-toggle="modal"  data-target="#docviwer" onclick="docview('+row.fbaid+')" >uploaded</a>':'pending';
           }
        },

          {"data":"CustID" ,
              "render": function ( data, type, row, meta ) {
               return (data==""||data=="0")?('<a id="btnviewcid" onclick="getcustomerid(this,'+row.fbaid+')">Update</a>'):data;
             }  
         }, 


         { "data": "createdate1","visible":false }

        ],

    });//.column('0:visible').order('desc').draw();


});  

// from date to date start

$(document).ready(function() {
  // Bootstrap datepicker
  $('.input-daterange input').each(function() {
    $(this).datepicker('clearDates');
  });

  // Extend dataTables search

 // alert('test');
  $.fn.dataTable.ext.search.push(
    function(settings, data, dataIndex) {
    var min = $('#min').val();
    var max = $('#max').val();
   // console.log(max);
    var createdAt = data[21] || 21; // Our date column in the table
   
    if (
      (min == "" || max == "") ||
      (moment(createdAt).isSameOrAfter(min) && moment(createdAt).isSameOrBefore(max,'day'))
    ) 

    {

 return true;
    }
    return false;
    }
  );

 // Re-draw the table when the a date range filter changes
  $('#btndate').on("click", function(){
    var table = $('#fba-list-table').DataTable();
    table.draw();
  });

$('.date-range-filter').datepicker();
});
</script>
<!-- from date to date end -->  


<!-- Search Pospno and Fbaid start,STATE,CITY etc -->
<script>


/// code for search
function searchdata()
{
  var index = $('#msds-select').val();
  if(index=='fbacity')
  {
    colsearch(7);
  }
  else if(index == 'FBAID')
  {
    colsearch(0);
  }
  else if(index == 'POSPNO')
  {
    colsearch(11);
  }else if(index=='state'){colsearch(8);}
  else if(index == 'zone'){colsearch(9);}
  else if(index == 'fbaname'){colsearch(1);}
  else if(index == 'pospname'){colsearch(13);}
}

function colsearch(index)
{
  table1 = $('#fba-list-table').DataTable();
    if ($('#txtfbasearch').val()!= '') {
    table1.columns(index).search('^'+ $('#txtfbasearch').val() + '$', true, true).draw(); 
 }
    else
    table1.columns(index).search($('#txtfbasearch').val(), true, true).draw(); 
}

function selectIndex(dd) {
  if (dd.selectedIndex>=4){
     dd.form['txtfbasearch'].style.display='block';
  }else{
    dd.form['txtfbasearch'].style.display='none';
  }  
}


     


</script>


<script type="text/javascript">
    function getpaylinknew(){
    
  $.ajax({
  url: 'getpaylinknew/'+$('#fba').val(),
  type: "GET",                  
  success:function(data) {
  console.log(data);
  var json = JSON.parse(data);
  if(json.StatusNo==0){
  $('#divpartnertable_payment').html(json.MasterData.PaymentURL);
  $('#divpartnertable_payment').val(json.MasterData.PaymentURL);

      }

    }
});
     alert("Payment Link Genrate successfully..");
}

     function pmesgsend(){
     alert("SMS Send successfully..");
     $.ajax({ 
     url: "{{URL::to('pmesgsend')}}",
     method:"POST",
     data: $('#modelpaylink').serialize(),
     success: function(msg)  
      {
     console.log(msg);

      }
    });
  }

</script>

  <script type="text/javascript">
   $(function(){
   $('#posp_remark').keyup(function(){    
   var yourInput = $(this).val();
   re = /[A-Za-z]?[A-Za-z `~!@#$%^&*()_|+\-=?;:'",.<>\{\}\[\]\\\/]/gi;
   var isSplChar = re.test(yourInput);
    if(isSplChar)
    {
    var no_spl_char = yourInput.replace(/[A-Za-z]?[A-Za-z `~!@#$%^&*()_|+\-=?;:'",.<>\{\}\[\]\\\/]/gi, '');
    $(this).val(no_spl_char);
    }
  });
 
});
</script>


  <script type="text/javascript">
   $(function(){
   $('#p_remark').keyup(function(){    
   var yourInput = $(this).val();
   re = /[A-Za-z]?[A-Za-z `~!@#$%^&*()_|+\-=?;:'",.<>\{\}\[\]\\\/]/gi;
   var isSplChar = re.test(yourInput);
    if(isSplChar)
    {
    var no_spl_char = yourInput.replace(/[A-Za-z]?[A-Za-z `~!@#$%^&*()_|+\-=?;:'",.<>\{\}\[\]\\\/]/gi, '');
    $(this).val(no_spl_char);
    }
  });
 
});
</script>


<script type="text/javascript">
  

// Add active class to the current button (highlight it)
var header = document.getElementById("myDIV");
var btns = header.getElementsByClassName("qry-btn");
for (var i = 0; i < btns.length; i++) {
  btns[i].addEventListener("click", function() {
    var current = document.getElementsByClassName("active");
    current[0].className = current[0].className.replace(" active", "");
    this.className += " active";
  });
}

</script>




<!-- <script type="text/javascript">

    $(document).ready(function () {
    $("#btnExport").click(function() {
alert("test");
           var data_type = 'data:application/vnd.ms-excel';
       //var table_div = $('#divtable');
       var table_html = $('#fba-list-table').html().replace(/ /g, '%20');//table_div.outerHTML.replace(/ /g, '%20');
       var a = document.createElement('a');
       a.href = data_type + ', ' + table_html;
       a.download = 'EquityReport.xls';
       a.click();
  window.open('data:application/vnd.ms-excel,' + encodeURIComponent($('#fba-list-table').html()));
         
        })

        $.datepicker.regional[""].dateFormat = 'dd/mm/yy';
         $.datepicker.setDefaults($.datepicker.regional['']);

        var tab=  $('#fba-list-table').dataTable({
           
            "bProcessing": true,
            "bServerSide": true,
            "sAjaxSource": "Company/DataProvider",
            "bJQueryUI": true,
            "aoColumns":  [
                         { "sName": "FBAID"},
                         { "sName": "FirsName" },
                         { "sName": "MiddName" },
                         { "sName": "LastName" }
                    ]

                });

       tab.makeEditable({
            "aoColumns": [
                null,
                null,
                null,
                {
                indicator: 'Saving...',
                tooltip: 'Click to select town',
                loadtext: 'loading...',
                type: 'select',
                onblur: 'submit',
                loadurl: 'AjaxDataProvider1'
            
            }]
        });

    });

    </script>
 -->

<!--  <script type="text/javascript">
   function fnExcelReport()
{
    var tab_text="<table border='2px'><tr bgcolor='#87AFC6'>";
    var textRange; var j=0;

    tab = document.getElementById('fba-list-table'); // id of table

    for(j = 0 ; j < tab.rows.length ; j++) 
    {     
        tab_text=tab_text+tab.rows[j].innerHTML+"</tr>";
        //tab_text=tab_text+"</tr>";
    }

    tab_text=tab_text+"</table>";
    tab_text= tab_text.replace(/<A[^>]*>|<\/A>/g, "");//remove if u want links in your table
    tab_text= tab_text.replace(/<img[^>]*>/gi,""); // remove if u want images in your table
    tab_text= tab_text.replace(/<input[^>]*>|<\/input>/gi, ""); // reomves input params

    var ua = window.navigator.userAgent;
    var msie = ua.indexOf("MSIE "); 

    if (msie > 0 || !!navigator.userAgent.match(/Trident.*rv\:11\./))  // If Internet Explorer
    {
        txtArea1.document.open("txt/html","replace");
        txtArea1.document.write(tab_text);
        txtArea1.document.close();
        txtArea1.focus(); 
        sa=txtArea1.document.execCommand("SaveAs",true,"Say Thanks to Sumit.xls");
    }  
    else                 //other browser not tested on IE 11
        sa = window.open('data:application/vnd.ms-excel,' + encodeURIComponent(tab_text));

                 

    return (sa);
}

 </script> -->
 




 
