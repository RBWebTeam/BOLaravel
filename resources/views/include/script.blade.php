<script type="text/javascript">
function Numeric(event) {     // for numeric value function
      if ((event.keyCode < 48 || event.keyCode > 57) && event.keyCode != 8) {
          event.keyCode = 0;
          return false;
      }
    }
$(document).ready(function(){
    $(".fltr-tog").click(function(){
        $(".filter-bdy").toggle();
    });
});
 
function myFunction(x) {
   x.classList.toggle("change");
}
 
$(document).ready(function(){
    $(".search-btn").click(function(){
        $(".search-dv").toggle("slow");
    });
});
 
  $(function () {
  $("#datepicker").datepicker({ 
        autoclose: true, 
        todayHighlight: true
  }).datepicker("getDate");
});
 
  $(function () {
  $("#datepicker1").datepicker({ 
        autoclose: true, 
        todayHighlight: true
  }).datepicker("getDate");
});
 
             $(document).ready(function () {
                 $('#sidebarCollapse').on('click', function () {
                     $('#sidebar').toggleClass('active');
                 });
             });

  $(document).ready(function() {
          $('#example').DataTable({
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
                 /* function (settings, data, dataIndex) {
                      var min = $('#min').datepicker("getDate");
                      var max = $('#max').datepicker("getDate");
                      var startDate = new Date(data[1]);
                      if (min == null && max == null) { return true; }
                      if (min == null && startDate <= max) { return true;}
                      if(max == null && startDate >= min) {return true;}
                      if (startDate <= max && startDate >= min) { return true; }
                      return false;
                  }*/
                  );

                
                      /*$("#min").datepicker({ onSelect: function () { table.draw(); }, changeMonth: true, changeYear: true });
                      $("#max").datepicker({ onSelect: function () { table.draw(); }, changeMonth: true, changeYear: true });*/
                      var table = $('#example').DataTable();

                      // Event listener to the two range filtering inputs to redraw on input
                      $('#min, #max').change(function () {
                          table.draw();
                      });
                  });


 </script>