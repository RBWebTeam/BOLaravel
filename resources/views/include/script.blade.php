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
            /*$('.message_sms_id').click(function(event){  event.preventDefault();
                       var sms=$('.sms_id').val();
                                
                          if(sms){
                              $.post('/fba-list', $('#message_sms_id').serialize())
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
<<<<<<< HEAD

 // Extend dataTables search
=======
*/
/* Extend dataTables search*/

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
 

//update posp from fba
$('.posp_from_id').click(function(){
  var flag=$(this).closest('div').find('input[name="flage_id"]').val();
  var fbaid=$(this).closest('div').find('input[name="fbaid"]').val();
<<<<<<< HEAD
  var value=$("#posp_name_id").val();

  $.ajax({

  if($('#posp_name_id').val()!="")  {
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


            $('#posp_name_id').val('');
           }
        });
   }
   else{
    alert('posp no field can not blank.')
  }

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

//update loan id from fba
$('.loan_from_id').click(function(){
  var flag=$(this).closest('div').find('input[name="flage_idloan"]').val();
  var fbaid=$(this).closest('div').find('input[name="fba_id_loan"]').val();
  
  if($('#loan_id').val()!="")  {
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
};

             $('#loan_id').val('');
           }
        });
  }
  else{
    alert('loan no field can not blank.')
  }
 
};

//send sms from fba
$('.message_sms_id').click(function(){
  var Mobile_no= $('#recipient-name').val();
  if($('#message-text').val()!="")  {
      var message_text=$('#message-text').val();
      $.ajax({
            type: "GET",
            url:'fba-list/'+Mobile_no+'/'+message_text, 
            success: function( msg ) {
            console.log(msg);
            alert('message send successfully..');
           $('.sms_sent_id').modal('hide');
            $('#message-text').val('');
          }
        });
    }
  else{
      alert('SMS Field can not be blank');
    }
  });
</script>

<!-- <script type="text/javascript">
   $.ajax({ 
   url: "{{URL::to('sales-material-product')}}",
   method:"GET",
   success: function(datas)  
   {
  
    var data=$.parseJSON(datas);
   console.log(data);
   if(data)
      {      $.each(data, function( index, value ) {
            $('#Product').append('<option value="'+value.Product_Id+'">'+value.Product_Name+'</option>');

        }); 
    }else{
      $('#Product').empty().append('No Result Found');
    }

   },

 });
</script> -->

<!-- <script type="text/javascript">
   $.ajax({ 
   url: "{{URL::to('sales-material-company')}}",
   method:"GET",
   success: function(datas)  
   {
  
    var data=$.parseJSON(datas);
   console.log(data);
   if(data)
      {      $.each(data, function( index, value ) {
            $('#Company').append('<option value="'+value.Company_Id+'">'+value.Company_Name+'</option>');

        }); 
    }else{
      $('#Company').empty().append('No Result Found');
    }

   },

 });
</script>
 -->

<script type="text/javascript">
  $('#submit').click(function(){
  alert('okae');
  $.ajax({
          url:"{{URL::to('sales-material-upload-submit')}}" ,  
          data:new FormData($("#sales_material_upload")[0]),
          dataType:'json',
          async:false,
          type:'POST',
          processData: false,
          contentType: false,
          success: function(msg){
             console.log(msg.status);
             if (msg.status==0) 
              {
                alert('Uploaded Successfully');
              } 
              else {
               alert('Could Not Upload');
              }
             
              
            
            }
        });
  });
</script>

<script type="text/javascript">
  $('#reset').click(function(){
   $("#Product").val("");
   $("#image_file").val("");
   $("#Company").val("");
  });
</script>

<script type="text/javascript">
  $('#sales_submit').click(function(){
    $.ajax({ 
   url: "{{URL::to('sales-material-update')}}",
   method:"POST",
   data : $('#sales_material').serialize(),
   success: function(msg)  
   {
  
     var tablerows = new Array();
                         $.each(msg, function( index, value ) {
            tablerows.push('<tr><td style="font-family: monospace"><img style="position:absolute;" src="/' + value.image_path + '"/></td></tr>');
        }); 

       if(msg){
                            $('#docs').empty().append('<table class="table table-striped table-bordered table-responsive"><tr class="text-capitalize"><td style="font-family: monospace">Image Path</td></tr>'+tablerows+'</table>');
                         }else{
                            $('#docs').empty().append('No Result Found');
                         }

   },

 });
  });

</script>

<script type="text/javascript">
  $('#Product').on('change', function() {
    var Product=$('#Product').find(":selected").val();
    console.log(Product);
    if ( Product == '1')
      {
       $("#Company option[value='1']").show();
        $("#Company option[value='2']").show();
        $("#Company option[value='3']").show();
        $("#Company option[value='4']").show();
          
      }
      if (Product == '2') 
      {
        $("#Company option[value='1']").show();
        $("#Company option[value='2']").show();
        $("#Company option[value='3']").show();
        $("#Company option[value='5']").show();
        $("#Company option[value='6']").show();
        $("#Company option[value='7']").show();
        $("#Company option[value='8']").show();
      }
      if (Product=='3') 
      {
         $("#Company option[value='1']").show();
        $("#Company option[value='2']").show();
        $("#Company option[value='3']").show();
        $("#Company option[value='4']").show();
         $("#Company option[value='5']").show();
        $("#Company option[value='8']").show();
      }
      if (Product=='4') 
      {
         $("#Company option[value='1']").show();
        $("#Company option[value='2']").show();
        $("#Company option[value='4']").show();
        $("#Company option[value='5']").show();
         $("#Company option[value='8']").show();
        $("#Company option[value='9']").show();
        $("#Company option[value='10']").show();
        $("#Company option[value='11']").show();
      }
      if (Product=='5') 
      {
         $("#Company option[value='1']").show();
        $("#Company option[value='2']").show();
        $("#Company option[value='3']").show();
        $("#Company option[value='4']").show();
         $("#Company option[value='5']").show();
        $("#Company option[value='8']").show();
      }
     
        
      
        
      });
</script>


   



