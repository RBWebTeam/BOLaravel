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
     // Menubar cross close
// function myFunction(x) {
//    x.classList.toggle("change");
// }
    //Menubar cross close end
 
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
  // start test

  // end test
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
                       $('#flage_idloan').val(2);
                       $('#fba_id_loan').val(id);
                       $('.updateLoan').modal('show');

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

//script for fsm register..

 $(document).ready(function(){

    $('#txtmapstate').on('change', function() {
            var state_id = $(this).val();
            if(state_id) {
                $.ajax({
                    url: 'Fsm-Register/'+state_id,
                    type: "GET",
                    dataType: "json",
                    success:function(data) {
                        $('#txtmapcity').empty();
                        $('#txtmapcity').append('<option value="0">select city</option>');
                        $.each(data, function(key, value) {

                            $('#txtmapcity').append('<option value="'+ key +'">'+ value +'</option>');
                        });
                     }
                });
            }else{
                $('select[name="city"]').empty();
            }
        });

$("#basic-addon2").click(function(e){
          e.preventDefault();
            var flag = 0;
            var value = "";

            if($(txtmappincode).val()!="")  {
              flag = 3;
              value = $('#txtmappincode').val();
            }
            else if($('#txtmapcity').val() != 0){
              flag = 2;
              value = $('#txtmapcity').val();
            }
            else if($('#txtmapstate').val() != 0)
            {
              flag = 1;
              value = $('#txtmapstate').val(); 
            }
            else
            {
              alert('select atleast one option');
            }

            $.ajax({
                    url: 'Fsm-Register/'+flag+'/'+value,
                    type: "GET",
                    dataType: "json",
                    success:function(data) {

                      
                      $('#tblpincode tr:not(:first)').remove();

                      var rows = "";
                      for(var i =0; i < data.length;i++)
                      {
                        rows = rows +"<tr align='left'><td>";
                        rows = rows +"<input id='pincode' type='checkbox' class='used chk' value =''>";
                        rows = rows +"<span>"+data[i].pincode+"</span></td></tr>";
                      }

                      $('#tblpincode > tbody:last-child').append(rows);
                    }
                });
          });
$('#chkselectall').click(function () {    
     $('.chk').prop('checked', this.checked);    
 });
});
// insert Fsm details
function insertfsm() {
  console.log($('#fsmregister').serialize());
   $.ajax({ 
   url: "{{URL::to('Fsm-Register')}}",
   method:"POST",
   data: $('#fsmregister').serialize(),

   success: function(msg)  
   {
    console.log(msg);
   }

});
 }

// fba  block unblock
 $('.block').click(function(){
  var flag=1;
  var value= $(this).closest('td').find('input[name="txtfbaid"]').val();

  $(this).toggle();
  $(this).closest('td').find('.unblock').toggle();

   $.ajax({
            type: "GET",
            url:'fba-blocklist/'+flag+'/'+value, 
                     
           success: function( msg ) {
                 console.log(msg);
            }
        });


});
 


$('.unblock').click(function(){
  $(this).toggle();
  $(this).closest('td').find('.block').toggle();

  var flag=0;
  var value=$(this).closest('td').find('input[name="txtfbaid"]').val('return');
 
  $.ajax({
            type: "GET",
            url:'fba-blocklist/'+flag+'/'+value, 
                     
           success: function( msg ) {
                 console.log(msg);
            }
        });
});
 


$('.posp_from_id').click(function(){
  var flag=$(this).closest('div').find('input[name="flage_id"]').val();
  var fbaid=$(this).closest('div').find('input[name="fbaid"]').val();
  var value=$("#posp_name_id").val();

  $.ajax({
            type: "GET",
            url:'fba-list/'+fbaid+'/'+value+'/'+flag, 
            success: function( msg ) {
            console.log(msg);
             alert("posp updated successfully..!");
            $('.updatePosp').modal('hide');
           }
        });

});



// function sendsmsrecipients(){
//   var smslist = document.getElementById("smslist");
//   console.log(smslist);
//   // alert("test");
//      $.ajax({ 
//    url: "{{URL::to('send-sms')}}",
//    method:"GET",
//    data:{smslist:smslist},
//    success: function(msg)  
//    {
// console.log(msg);
//    }

//  });
// }   


$('.loan_from_id').click(function(){
  var flag=$(this).closest('div').find('input[name="flage_idloan"]').val();
  var fbaid=$(this).closest('div').find('input[name="fba_id_loan"]').val();
  var value=$("#loan_id").val();
  
 $.ajax({
            type: "GET",
            url:'fba-list/'+fbaid+'/'+value+'/'+flag, 
            success: function( msg ) {
            console.log(msg);
             alert("loan id updated successfully..!");
             $('.updateLoan').modal('hide');
           }
        });
});
</script>



   



