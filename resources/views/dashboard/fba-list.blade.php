          @extends('include.master')
          @section('content')
                  

                    <!-- Body Content Start -->
                      <div id="content" style="overflow:scroll;">
                 <div class="container-fluid white-bg">
                 <div class="col-md-12"><h3 class="mrg-btm">FBA List</h3></div>
                 
                 
                 <!-- Filter Strat -->
                 <div class="col-md-12">
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
                 </div>
                 <!-- Filter End -->
                 
                 <!-- Date Start -->
                 <div class="col-md-4">
                <div class="form-group">
                   
                          <p>From Date</p>
                   <div id="datepicker" class="input-group date" data-date-format="mm-dd-yyyy">
                         <input class="form-control" type="text" placeholder="From Date" id="min" />
                        <span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
                        </div>
                      </div>
                     </div>
                 <div class="col-md-4">
                 <div class="form-group">
                 <p>To Date</p>
                   <div id="datepicker1" class="input-group date" data-date-format="mm-dd-yyyy">
                         <input class="form-control" type="text" placeholder="From Date" id="max" />
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
                  <table class="table table-bordered table-striped tbl" >
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
                            <td><a href="#" onclick="POSP_UPDATE" id="">update </a></td>
                            <td><a href="">update</a></td>
                            <td><?php echo $val->pospname; ?></td>
                            <td><?php echo $val->PartnerID; ?></td>
                            <td><?php echo $val->bankaccount; ?></td>
                            <td><a href="#" onclick="SMS_FN(#{<?php echo $val->fbaid; ?>},#{<?php echo $val->MobiNumb1; ?>})">sms </a></td>
                            <td><a href="">update</a></td>
                                    </tr>
                         @endforeach
                         
                       </tbody>
                      </table>
                </div>
                </div>
                
                <h5 class="pull-left"><b>Records :</b> <span>1 to 10 </span>Of <span class="badge">186</span><h5>
                <ul class="pagination pull-right">
                        <li><a href="#">1</a></li>
                        <li><a href="#">2</a></li>
                        <li><a href="#">3</a></li>
                        <li><a href="#">4</a></li>
                        <li><a href="#">5</a></li>
                      </ul>
                </div>
                
                      </div>
                      </div>


<!-- send sms -->
<div class="sms_sent_id modal fade" role="dialog">   
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
          <button class="btn btn-primary message_sms_id" type="button">Save changes</button><b class="alert-success primary" id="strong_id"></b>
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
            <input id="fba_id_posp" type="hidden" name="fbaid"/>
            <input id="flage_id" type="hidden" name="flage_id"/>
          </div>
          <div class="form-group">
            <label class="control-label" for="message-text">POSP :</label>
            <input class="recipient-name form-control" id="posp_name_id" type="text" name="posp_name" onkeypress="return Numeric(event)"/>
          </div>
        </form>
        <div class="modal-footer"> 
          <button class="btn btn-default" type="button" data-dismiss="modal">Close</button>
          <button class="btn btn-primary posp_from_id" type="button">Save changes</button><b class="alert-success primary" id="strong_lead"></b>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection 
<script type="text/javascript">
  $(document).ready(function() {
          $('#example').DataTable( {
          "lengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]]
          });
          });
          $('.popover-Payment').popover({
            trigger: 'focus'
          });

           $('.popover-Password').popover({
            trigger: 'focus'
          });


            
            
             function Sales_Code() {
              console.log('something');
             }
             
             function SMS_FN(id,mb){
                  $('.Mobile_ID').val(mb);
                  $('#fba_id').val(id);
                  $('.sms_sent_id').modal('show');
             }

             function POSP_UPDATE(id){
                            
                       $('#flage_id').val(1);
                       $('#fba_id_posp').val(id);
                       $('.updatePosp').modal('show');
                    
             }

             function LoanID_UPDATE(id){
                       $('#flage_id').val(2);
                       $('#fba_id_posp').val(id);
                       $('.updatePosp').modal('show');

             }
          
                                   // Sent sms popup
            $('.message_sms_id').click(function(event){  event.preventDefault();
                       var sms=$('.sms_id').val();
                                
                          if(sms){
                              $.post('/fba-list/sms', $('#message_sms_id').serialize())
                               .done(function(msg){ 
                                  //{ message: 'SMS Sent', status: 'success', statusId: 0 }
                                      if(msg.statusId==0){
                                         $('#strong_id').html('<strong>Success!</strong> SMS Sent successful..');
                                      }
                                   console.log(msg);
                               }).fail(function(xhr, status, error) {
                               console.log(error);
                               });
                          }else{
                              alert("abc..");
                          }
            });
                                           // POSP UPADTE MODEL
             $('.posp_from_id').click(function(event){  event.preventDefault();
                       var sms=$('#posp_name_id').val();
                                 
                          if(sms){
                              $.post('/fba-list/posp-update', $('#posp_from_id').serialize())
                               .done(function(msg){ 
                                              if(msg.status==0){
                                                                    
                                                                   $('#strong_lead').html('<strong>Success!</strong>  update..');
                                                                    if($('#flage_id').val()==1){
                                                                    fba_id_posp=$('#fba_id_posp').val();
                                                                    $('#'+fba_id_posp).empty();
                                                                    $('#'+fba_id_posp).append($('#posp_name_id').val());
                                                                    }if($('#flage_id').val()==2){
                                                                         //LoanID

                                                                    fba_id_posp=$('#fba_id_posp').val();
                                                                      alert(fba_id_posp);
                                                                     $('#LoanID'+fba_id_posp).empty();
                                                                     $('#LoanID'+fba_id_posp).append($('#posp_name_id').val());
                                                                    }
                                                   

                                                        setTimeout(function () {
                                                             $( '#posp_from_id' ).each(function(){
                                                                this.reset();
                                                            }); 
                                                                       
                                                                   
                                                            $('.updatePosp').modal('hide');
                                                            $('#strong_lead').empty();
                                                    },1000);
                                                
                                              }
                                   
                               }).fail(function(xhr, status, error) {
                               console.log(error);
                               });
                          }else{
                              alert("abc..");
                          }
            })

         
                
                                    // Extend dataTables search
                     
               
                $(document).ready(function(){
                  $.fn.dataTable.ext.search.push(
                  function (settings, data, dataIndex) {
                      var min = $('#min').datepicker("getDate");
                      var max = $('#max').datepicker("getDate");
                      var startDate = new Date(data[1]);
                      if (min == null && max == null) { return true; }
                      if (min == null && startDate <= max) { return true;}
                      if(max == null && startDate >= min) {return true;}
                      if (startDate <= max && startDate >= min) { return true; }
                      return false;
                  }
                  );

                
                      $("#min").datepicker({ onSelect: function () { table.draw(); }, changeMonth: true, changeYear: true });
                      $("#max").datepicker({ onSelect: function () { table.draw(); }, changeMonth: true, changeYear: true });
                      var table = $('#example').DataTable();

                      // Event listener to the two range filtering inputs to redraw on input
                      $('#min, #max').change(function () {
                          table.draw();
                      });
                  });
</script>