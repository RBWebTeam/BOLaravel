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
  $("#datepicker_date").datepicker({ 
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
                 $('#sidebarCollapse').click( function () {
                     $('#sidebar').slideToggle();
                 });
             });
       

  // $(document).ready(function() {
         
  //         $('#example').DataTable({
  //         "lengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]]
  //         });
  //         });
  
          // $('.popover-Payment').popover({
          //   trigger: 'focus'
          // });
          // test

          
//           $('body').popover({
//     selector: '[data-toggle="popover"]'
// });

// $('body').on('click',  function (e) {
//     $('[data-toggle="popover"]').each(function () {
//         if (!$(this).is(e.target) && $(this).has(e.target).length === 0 && $('.popover-Password').has(e.target).length === 0) {

//             $(this).popover('destroy');
//         }
//     });
// });


    function Sales_Code() {
              console.log('something');
             }
             
             function SMS_FN(id,mb){
                  $('.Mobile_ID').val(mb);
                  $('#fba_id').val(id);
                  $('.sms_sent_id').modal('show');
             }

             function POSP_UPDATE(id){
                      $('#fbaid').val(id);
                      $('.updatePosp').modal('show');
                    
             }
             

             function LoanID_UPDATE(id){
                       $('#fba_id').val(id);
                       $('.updateLoan').modal('show');

             }

           function sales_update_fn(id){

                $('#p_fbaid').empty();
                $('#p_fbaid').val(id);
                $('#salesupdate_modal_fade').modal('show');
           }


          
/* Extend dataTables search*/



// $(document).ready(function(){

//                   $.fn.dataTable.ext.search.push(
//                   function (settings, data, dataIndex) {
//                       var min = $('#min').datepicker("getDate");
//                       var max = $('#max').datepicker("getDate");
//                       var startDate = new Date(data[4]);
//                       if (min == null && max == null) { return true; }
//                       if (min == null && startDate <= max) { return true;}
//                       if(max == null && startDate >= min) {return true;}
//                       if (startDate <= max && startDate >= min) { return true; }
//                       return false;
//                   }
//                   );

                
//                       $("#min").datepicker({ onSelect: function () { table.draw(); }, changeMonth: true, changeYear: true });
//                       $("#max").datepicker({ onSelect: function () { table.draw(); }, changeMonth: true, changeYear: true });
//                       var table = $('#example').DataTable();

//                       // Event listener to the two range filtering inputs to redraw on input
//                       $('#min, #max').change(function () {  console.log("Sdfdsf");
//                           table.draw();
//                       });


                        

//                   });

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
  //console.log($('#fsmregister').serialize());
   $.ajax({ 
   url: "{{URL::to('Fsm-Register')}}",
   method:"POST",
   data: $('#fsmregister').serialize(),

   success: function(msg)  
   {
    //console.log(msg);
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
                // console.log(msg);
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
                // console.log(msg);
            }
        });
});
 

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
            //console.log(msg);
             alert("loan id updated successfully..!");
             $('.updateLoan').modal('hide');
            $('#loan_id').val('');
            
           }
        });
    }
else{
    alert('loan no field can not blank.')
    $( "#loan_id" ).focus();
  }
 });


//send sms from fba
$('.message_sms_id').click(function(){

  if($('#message-text').val()!="")  {
  //console.log($('#message_sms_from').serialize());
   $.ajax({ 
   url: "{{URL::to('fba-list')}}",
   method:"POST",
   data: $('#message_sms_from').serialize(),
   success: function(msg)  
   {
    //console.log(msg);
    alert('SMS send successfully..')
    $('.sms_sent_id').modal('hide');
    $('#message-text').val('');
   }
});
 }
 else{

  alert('sms field can not blank')
  $( "#message-text" ).focus();
 }
});
// upload docs
function uploaddoc(id){
                $('#docfbaid').val(id);
                $('.fbadoc').modal('show');
     }

$('#btnupload').click(function(event){
event.preventDefault();
var form = $('#fbadocupload')[0];

var data = new FormData(form);

/*for (var value of data.values()) {
   console.log(value); 
}
alert(JSON.stringify(data));*/

  if($("#ddldoctype").val()!==0  && $("#document").val()!=="") {
  /* console.log($('#fbadocupload').serialize());*/
   $.ajax({ 

   url: "{{URL::to('fba-listdocument')}}",
   method:"POST",
   enctype: 'multipart/form-data',
   processData: false,  // Important!
   contentType: false,
   data: data,
   success: function(msg)  
   {
    console.log(msg);
    alert('document uploaded successfully..');
    $('.fbadoc').modal('hide');
    
   }
});
 }
 else{
  alert('All field are requried');
  $( "#ddldoctype" ).focus();
  $( "#document" ).focus();
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
  
   if(data)
      {      $.each(data, function( index, value ) {
            $('#Product').append('<option value="'+value.Product_Id+'">'+value.Product_Name+'</option>');

        }); 
    }else{
      $('#Product').empty().append('No Result Found');
    }

   },

 });
</script>  -->

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

  $.ajax({
          url:"{{URL::to('sales-material-upload-submit')}}" ,  
          data:new FormData($("#sales_material_upload")[0]),
          dataType:'json',
          async:false,
          type:'POST',
          processData: false,
          contentType: false,
          success: function(msg){
            // console.log(msg.status);
             if (msg.status==0) 
              {
                alert('Uploaded Successfully');
                $("#sales_material_upload")[0].reset();
              } 
              else {
               alert('Could Not Upload');
              }
             
              
            
            }
        });
  });



  $('#reset').click(function(){
   $("#Product").val("");
   $("#image_file").val("");
   $("#Company").val("");
  });


  $('#sales_submit').click(function(){
    $.ajax({ 
   url: "{{URL::to('sales-material-update')}}",
   method:"POST",
   data : $('#sales_material').serialize(),
   success: function(msg)  
   {
  
     var tablerows = new Array();
        $.each(msg, function( index, value ) {
            tablerows.push('<tr><td><img class="img-responsive" src="/' + value.image_path + '" width="400" height=""/></td></tr>');
        }); 

       if(msg){
          $('#docs').empty().append('<table class="table table-striped table-bordered"><tr class="text-capitalize"><td style="font-family: monospace">Images</td></tr>'+tablerows+'</table>');
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
   // console.log(Product);
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





$(document).ready(function(){
 var  st_array=Array('<option value="0">Select</option>');

 $.ajax({
  url: "{{ url('search-state')}}",
  dataType: "json",
  data: { },
  success: function(data) {
    $.each(data, function( key, val ) {
      st_array.push('<option value="'+val.datavalue+'">'+val.value+'</option>');
    });
    $('.search_state').empty();
    $('.search_state').append(st_array);
     public_state=st_array;
 
    $('.riskstateid').empty();
    $('.riskstateid').append(st_array);  

  }
});

 //  update state
 var  st_array1=Array();
  $.ajax({
  url: "{{ url('search-state')}}",
  dataType: "json",
  data: { },
  success: function(data) {
    $.each(data, function( key, val ) {
      st_array1.push('<option value="'+val.datavalue+'">'+val.value+'</option>');
    });
    $('.search_state1').empty();
    $('.search_state1').append(st_array1);
     public_state=st_array1;
 
    $('.riskstateid').empty();
    $('.riskstateid').append(st_array1);  

  }
});


});



$(document).on('change', '#search_state', function() {   
 var fstate_id=$(this).val();  
 var  city_array=Array('<option value="0">Select</option>');  
 $.ajax({
  url: "{{url('search-city')}}",
  dataType: "json",
  data: {
    fstate_id : fstate_id,
  },
  success: function(data) { 
    $.each(data, function( key, val ) {
      city_array.push('<option value="'+val.datavalue+'">'+val.value+'</option>');
    });
    $('.search_district').empty();
    $('.search_district').append(city_array);

  }
});

});

 function pan_card(obj,val){  alert(obj);
    if(obj=='pan_no' ){
                   var str =$('#pan_no').val();
                   var pancardPattern = /^([a-zA-Z]{5})(\d{4})([a-zA-Z]{1})$/;
                   var res = str.match(pancardPattern);
                   if(res){
                     // console.log('Pancard is valid one.!!');
                      $('#pan_number').hide();

                  }else{
                    // console.log('Oops.Please Enter Valid Pan Number.!!');
                    $('#pan_number').show();

                    return false;
                  }
                  
  }
}


</script>

<script type="text/javascript">
  $('#sales_update').click(function(){
    var id = $('#p_fbaid').val();
    var sales_update=$('#p_remark').val();
    console.log(sales_update);
    $('#update_'+id).text(sales_update);
    if (!$('#update_remark').valid()) 
    {

    } 
    else 
    {
      $.ajax({  
         type: "POST",  
         url: "{{URL::to('sales-update')}}",
         data : $('#update_remark').serialize(),
         success: function(msg){
         if (msg.status==0) 
                {
                  alert('Updated Successfully');
                  $('#p_remark').val('');
                  $('#update_'+id).closest('td').html(sales_update);
                  $('.close').click();           
                } 
                else {
                  alert('Could not updated successfully');
                }
          }  
      });
    }
  })
</script>


<script type="text/javascript">
  $('#loan_update').click(function(){
    // alert('okae');
    var id = $('#fba_id').val();
    var loan_update=$('#remark').val();
    console.log(loan_update);
 
  //  $('.updateLoan').show();
   // $('.modal-backdrop').show();    

    if (!$('#update_loan').valid()) 
    {

    } 
    else 
    {
      $.ajax({  
         type: "POST",  
         url: "{{URL::to('loan-update')}}",
         data : $('#update_loan').serialize(),
         success: function(msg){
        
       if (msg.status==0) 
                {
                  alert('Updated Successfully');
                  $('#loan_'+id).closest('td').html(loan_update);       
                  $('#remark').val('');
                  $('.close').click();           
                 } 
                else {
                  alert('Could not updated successfully');
                }
      }  
      });
    }
  })
</script>



<script type="text/javascript">
  $('#posp_update').click(function(){
    // alert('okae');

// alert($(this).closest('tr').find('input[type=text]').val());

    var id = $('#fbaid').val();
    var posp_update=$('#posp_remark').val();
    console.log(posp_update);

    if (!$('#update_posp').valid()) 
    {

    } 
    else 
    {
      $.ajax({  
         type: "POST",  
         url: "{{URL::to('posp-update')}}",
         data : $('#update_posp').serialize(),
         success: function(msg){
              if (msg.status==0) 
                {
                  alert('Updated Successfully');

                  $('#posp_'+id).closest('td').html(posp_update);
                  $('#posp_remark').val('');
                  $('.close').click();           
                } 
                else {
                  alert('Could not updated successfully');
                }

        }  
      });
    }
  })


    $(document).ready(function() {
       var exampleInstance = $('#fsm-details-table').DataTable({
          paging: true,
          responsive: false,

        });

       exampleInstance.column( '0:visible' ).order('desc').draw();
 // Bootstrap datepicker
$('.input-group date input').each(function() {
  $(this).datepicker('clearDates');
});

// Set up your table
table1 = $('#example').DataTable({
  paging: true,
  info: false,
  responsive: false,
}).column('0:visible').order('desc').draw();




// Re-draw the table when the a date range filter changes
$('.date-range-filter1').change(function() {

  // Extend dataTables search
$.fn.dataTable.ext.search.push(
  function(settings, data, dataIndex) {
    var min = $('#min-date').val();
    var max = $('#max-date').val();
    var createdAt = data[1] || 0; // Our date column in the table
 if (
      (min == "" || max == "") ||
      (moment(createdAt).isSameOrAfter(min) && moment(createdAt).isSameOrBefore(max))
    ) {
      return true;
    }
    return false;
  }
);

  table1.draw();
});

$('#my-table_filter').hide();

 

});

</script>
<script type="text/javascript">
function getfsmfbalist(smid)
{

$('#fsmid').val(smid);



$.ajax({  
         type: "GET",  
         url:'Fsm-Details/'+smid,//"{{URL::to('Fsm-Details')}}",
         success: function(fsmmsg){
        
        var data = JSON.parse(fsmmsg);
       var str = "<table class='table'><tr style='height:30px;margin:5px;'><th>Name</th><th>Email</th><th>Mobile</th></tr>";
       for (var i = 0; i < data.length; i++) {

         str = str + "<tr style='height:30px;margin:5px;'><td>"+data[i].Name+"</td><td>"+data[i].Email+"</td><td>"+data[i].Mobile+"</td></tr>";
      
       }
              // console.log(msg[0].Result);
         str = str + "</table>";
           $('#popupfbalist').html(str);   
              
        }  
      });

}


function getpartnerinfo(fbaid)
{


$.ajax({  
         type: "GET",  
         url:'fba-list/'+fbaid,//"{{URL::to('Fsm-Details')}}",
         success: function(fsmmsg){

        var data = JSON.parse(fsmmsg);

        var str = "<table class='table'><tr style='height:30px;margin:5px;'><td>Partner ID</td><td>Name</td><td>Mobile No</td><td>Email</td><td>City</td><td>Pincode</td></tr>";
       for (var i = 0; i < data.length; i++) {
         str = str + "<tr style='height:30px;margin:5px;'><td>"+data[i].PartnerID+"</td><td>"+data[i].pname+"</td><td>"+data[i].pmobile+"</td><td>"+data[i].pemail+"</td><td>"+data[i].pcity+"</td><td>"+data[i].ppincode+"</td></tr>";
          }
              // console.log(msg[0].Result);
            str = str + "</table>";
           $('#divpartnertable').html(str);   
              
        }  
      });
}


$('#ddlstate').on('change', function() {
            var state_id = $(this).val();
            if(state_id) {
                $.ajax({
                    url: 'rm_city_master/'+state_id,
                    type: "GET",
                    dataType: "json",
                    success:function(data) {
                        $('#ddlcity').empty();
                        $('#ddlcity').append('<option value="0">select city</option>');
                        $.each(data, function(key, value) {

                            $('#ddlcity').append('<option value ="'+ key +'">'+ value +'</option>');
                        });
                     }
                });
            }else{
                $('select[name="city"]').empty();
            }
        });







function getfbaassignlist(ddl)
{  
  if($(ddl).val() > 0)
  getfbalist(1,$(ddl).val());
}

function showfbaassignlist()
{
  getfbalist(2,$('#txtpincode').val()); 
}

function getfbalist(flag,val)
{

$.ajax({  
         type: "GET",  
         url:'assign-rm-load/'+flag+'/'+val,//"{{URL::to('Fsm-Details')}}",
         success: function(msg){
         var data = JSON.parse(msg);

     $('#ddlfba').empty();   
       var str = "";
       for (var i = 0; i < data.length; i++)
        {

         str = str + "<option value='"+data[i].FBAId+"'>"+data[i].Name+"</option>";
        }
      // console.log(msg[0].Result);
           $('#ddlfba').append(str);   
              
        }  
      });
}

function fbarmassignlist(){

// alert('hhdhd');
// $('#ddlfba option:selected').each(function(){ 
//     //alert($(this).text()+' - '+$(this).val());

   //  var responsedata = '{"fbaid":'+$(this).val()+',"rm_id":'+$('#ddlrmlist').val()+'}';
     $.ajax({  
         type: "POST",  
         url: "assign-rm-update",
         data : $('#assignrm').serialize(),
         success: function(msg){                        
              if (msg.status==0) 
                {
                  alert('Updated Successfully');
                } 
                else {
                  alert('Could not updated successfully');
                }
          }  

      }); 

// });



 /*$.ajax({  
         type: "POST",  
         url: "{{URL::to('assign-rm-update')}}",
         data : $('#assignrm').serialize(),
         success: function(msg){
                        
alert(msg);
              if (msg.status==0) 
                {
                  alert('Updated Successfully');
                } 
                else {
                  alert('Could not updated successfully');
                }

              
              
        }  

      }); */
}

////////////////END////////////////////////


//shubham rm folloup 

$('#chkproduct').click(function () {    
     $('.chkproductname').prop('checked', this.checked);    
 });

function getfollowup(id){
 $('#fbaid').val(id);
 $('.rmfolloup').modal('show');
 }

$('#btn_subbmit').click(function() {
var productid = []
$('input:checkbox[name=txtproduct]:checked').each(function() {
productid.push($(this).val())
})

$('#txtproductid').val(productid);
console.log($('#rmfolloupdetails').serialize());
   $.ajax({ 
   url: "{{URL::to('Rmfollowup')}}",
   method:"POST",
   data: $('#rmfolloupdetails').serialize(),
  success: function(msg)  
   {
    console.log(msg);
    alert("Record Has Been Saved Successfully");
    $('.rmfolloup').modal('hide');
    $("#rmfolloupdetails").trigger('reset');
   }
});
});

function viewhistory(fbaid){
$.ajax({  
         type: "GET",  
         url:'Rmfollowup/'+fbaid,
         success: function(fsmmsg){

      var data = JSON.parse(fsmmsg);
      var str = "<table class='table'><tr style='height:30px;margin:5px;'><td>Lead ID</td><td>Name</td><td>User Type</td><td>Status</td><td>Remark</td></tr>";
       for (var i = 0; i < data.length; i++) 
       {

         str = str + "<tr style='height:30px;margin:5px;'><td>"+data[i].lead_id+"</td><td>"+data[i].FullName+"</td><td>"+data[i].user_type+"</td><td>"+data[i].status_name+"</td><td>"+data[i].remark+"</td></tr>";
       }
         str = str + "</table>";
           $('#divpartnertable').html(str);   
       }  
      });
}




</script>


<!-- send Notification Script By Avinash
 -->
   <script type="text/javascript">

    $('#ddlselect').on('change', function() {
   var flag=$('#ddlselect').val();
   var value=$('#txtval').val();
   $.ajax({
    url: 'send-notification/'+flag+'/'+value,
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

        // $("#first_nm").hide();
        // $("#last_nm").hide();

$('#LeadType').on('change',function(){
  var LeadType=$('#LeadType').find(":selected").val();

  if ( LeadType == 'WB')
      {
       
        $("#weburl").show();
        $("#last_nm").show();

      }
      else{
        $("#weburl").hide();
        $("#last_nm").hide();

      }
});


 $('#txtmapstate').on('change', function() {
            var state_id = $(this).val();
            if(state_id) {
                $.ajax({
                    url: 'send-notificationstate/'+state_id,
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

$('#txtmapcity').on('change', function() {
                  BindFbas(2,$('#txtmapcity').val());
        });

  
  $("#upload").on("click", function() {


    var file_data = $("#sortpicture").prop("files")[0];   
    var form_data = new FormData();
    form_data.append("file", file_data);

    $.ajax({
        url: "../../../notificationimages",
        dataType: 'script',
        cache: false,
        contentType: false,
        processData: false,
        data: form_data,                         
        type: 'post',
        success: function(){
            alert("works"); 
        }
    });
});




function BindFbas(flag,value)
{
     $('#tblfbalist').empty();
     $.ajax({
    url: 'send-notificationfba/'+flag+'/'+value,
        type: "GET",
       dataType:"json",
      success:function(data) {
      var text = "";
      for (var i = 0; i < data.length; i++) {
      if(i==0)
    {
    text = text +'<tr><th><input  name="fba_list[]" value="0" id="selectAll" onclick="checkall()" type="checkbox" /> FBA List</th></tr>';
  text = text +'<tr><td><input name="fba_list[]" id="chkfba" type="checkbox" class="chkfba" value="'+data[i].id+'"/><input id="hdnchk" name="hdnchk" type="hidden" value="'+data[i].id+'" />'+data[i].fullname+'</td></tr>';
}
else{
text = text +'<tr><td><input id="chkfba" name="fba_list[]"  type="checkbox" class="chkfba" value="'+data[i].id+'"/><input id="hdnchk" type="hidden" value="'+data[i].id+'" />'+data[i].fullname+'</td></tr>';
}

}
          $('#tblfbalist').append(text);

                     },
     error:function(error)
                     {
                      console.log(error);
                     }
                });
}


function checkall(){

$('#selectAll').click(function () {    
   $('.chkfba').prop('checked', this.checked);    
 });
 }
 function getfbabypincode(txt)
 {
    BindFbas(3,$(txt).val());
 }

function loadfbasbyflag()
{
  if($('#ddlflag').val() == 6){
  
    BindFbas(6,'999999');
    $('#tblmanagerlist').css("display","none");
    $('#tblsalesmanagerlist').css("display","none");
   }
  }


$(document).on('change', '#search_state', function() {   
    var fstate_id=$(this).val();  
    var  city_array=Array('<option value="0">Select</option>');  
    $.ajax({
            url: "{{url('search-city')}}",
            dataType: "json",
            data: {
                    fstate_id : fstate_id,
                  },
            success: function(data) { 
                $.each(data, function( key, val )
                {
                  city_array.push('<option value="'+val.datavalue+'">'+val.value+'</option>');
                });
              }
          });
        
    $('.search_district').empty();
    $('.search_district').append(city_array);
  
});
function getprodcutdtls(product_id){
$.ajax({  
         type: "GET",  
         url:'Product-followup/'+product_id,
         success: function(fsmmsg){

      var data = JSON.parse(fsmmsg);
      var str = "<table class='table' id='example'><thead><tr style='height:30px;margin:5px;'><th>Lead ID</th><th>Name</th><th>Mobile No</th><th>Email Id</th><th>Created Date</th><th>View History</th></tr></thead>";
       for (var i = 0; i < data.length; i++) 
       {

         str = str + "<tbody><tr style='height:30px;margin:5px;'><td><a href='#'  data-toggle='modal' onclick='getproductfollowup("+data[i].FBAID+")' data-target='productfollowup'>"+data[i].FBAID+"</a></td><td>"+data[i].FullName+"</td><td>"+data[i].MobiNumb1+"</td><td>"+data[i].EmailID+"</td><td>"+data[i].CreaOn+"</td><td><a class='btn btn-primary'>View History</a></td></tr></tbody>";
       }
         str = str + "</table>";
           $('#divpartnertable').html(str);   
       }  
      });
}

//vikas smstemplate
$('#btnsave').click(function() {
console.log($('#frmsmstemplate').serialize());
   $.ajax({ 
   url: "{{URL::to('sms_template')}}",
   method:"POST",
   data: $('#frmsmstemplate').serialize(),
  success: function(msg)  
   {
    console.log(msg);
    alert("Record has been saved successfully");
    $("#frmsmstemplate").trigger('reset');
    
   }
});
});


function getpaymentlink(fbaid){
  //alert(fbaid);
  // alert(data);
  //$('.paylink').modal('show');
  $.ajax({
                    url: 'getpaymentlink/'+fbaid,
                    type: "GET",
                    dataType: "json",
                    success:function(data) {

                      if(data.length>0){

                       // alert(data[0].Link);
                        var str = "<p>"+data[0].Link+"</p>";
                        // alert(str)
                        $('.divpartnertable_payment').html(str);
                         $('.paylink_payment').modal('show');
                          //$('#paylink').html(data[0].Link);
                       }     
                       else{
                        var str = "<p>No Payment Link Available</p>";
                        // alert(str)
                        $('.divpartnertable_payment').html(str);
                         $('.paylink_payment').modal('show');
                       } 
                       for (var i = 0; i < data.length; i++) 
              {
                str = str + "<p>"+data[i].Link+"</p>";
         // $('#paylink').html(str);
       }
                       
                     }
                });

}

// function getpaymentlink(fbaid){
//  $('.divpartnertable_payment').html('');
//   $.ajax({
//                     url: 'getpaymentlink/'+fbaid,
//                     type: "GET",
//                     dataType: "json",
//                     success:function(data) {

//                       if(data.length>0){

//                        // alert(data[0].Link);
//                         var str = "<p>"+data[0].Link+"</p>";
//                         // alert(str)
//                         $('.divpartnertable_payment').html(str);
//                          $('paylink_payment').modal('show');
//                           //$('#paylink').html(data[0].Link);
//                        }      
//                      }
//                 });

// }

 // show Password start
 function getpassword(password){
  // alert('Test');
 $('#show_password').html(password);
}

function n(n){
    return n.length < 8  ? "0" + n :  n;
}
// show password end



function getproductfollowup(fbaid){

  $('#txtproductfbaid').val(fbaid);
  $('.productfollowup').modal('show');
 }

$('#btn_productsubbmit').click(function() {

  console.log($('#productfolloupdetails').serialize());
   $.ajax({ 
   url: "{{URL::to('Product-followup')}}",
   method:"POST",
   data: $('#productfolloupdetails').serialize(),
  success: function(msg)  
   {
    console.log(msg);
    alert("Record has been saved successfully");
    $("#productfolloupdetails").trigger('reset');
      $('.productfollowup').modal('hide');

   }
});

 });

function viewProducthistory(fbaid){

$.ajax({  
         type: "GET",  
         url:'Rmfollowup/'+fbaid,
         success: function(fsmmsg){

      var data = JSON.parse(fsmmsg);
      var str = "<table class='table'><tr style='height:30px;margin:5px;'><td>Lead ID</td><td>Name</td><td>User Type</td><td>Status</td><td>Remark</td></tr>";
       for (var i = 0; i < data.length; i++) 
       {

         str = str + "<tr style='height:30px;margin:5px;'><td>"+data[i].lead_id+"</td><td>"+data[i].FullName+"</td><td>"+data[i].user_type+"</td><td>"+data[i].status_name+"</td><td>"+data[i].remark+"</td></tr>";
       }
         str = str + "</table>";
           $('#divpartnertable').html(str);   
       }  
      });
}


 function updatenotification(msgid,value){

//alert(value);
 if (confirm("Are you sure to "+(value==1?"approve":"reject")+" this notification")) {}
  $.ajax({
            type: "GET",
            url:'approvenotification/'+msgid+'/'+value, 
                     
           success: function( msg ) {
            if(value=="1"){
              alert("Notification Approved Successfully");
            }
            else if(value=="0"){
             alert("Notification rejected Successfully");
               }
                
            }

        });

 return false;

}




  $('#notificsubmitbtn').click(function(){
// alert('okae');
  if (!$('#sendnotification').valid()) {
     alert('Not Valid');

  } else {
$.ajax({

 url:"{{URL::to('send-notification-submit')}}" ,  
          data:new FormData($("#sendnotification")[0]),
          dataType:'json',
          async:false,
          type:'POST',
          processData: false,
          contentType: false,
          success: function(msg){

            console.log(msg.data);
            if (msg.data==true) 
              {
                alert('Inserted Successfully');
              } else {
                    alert('Oops!! Could not insert successfully');
              }
                 }
        });
  }
  
  });



  function mail(obj,val){
    // console.log(obj);
    if(obj=='weburl' ){
                   var str =$('#weburl').val();
                   var emailPattern = /^[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$/; 
                   var res = str.match(emailPattern);
                   if(res){
                     // console.log('Pancard is valid one.!!');
                      $('#email').show();

                  }else{
                    // console.log('Oops.Please Enter Valid Pan Number.!!');
                    $('#email').hide();

                    return false;
                  }
                  
  }
}


$(".nav-list > li").addClass(function(i){return "item" + (i + 1);});


function uploaddoc(fbaid)
{

$('#divdocviewer').html(""); 
$("#imgdoc").attr("src","");
$("#imgdoc").css("display","none");
$.ajax({  

         type: "GET",  
        
         url:'fbalist-document/'+fbaid,//"{{URL::to('Fsm-Details')}}",
         success: function(fsmmsg){
     
        var data = JSON.parse(fsmmsg);
        var str = "<table class='table'><tr style='height:30px;margin:18px;'>";
  if(data.length > 0){
        
       for (var i = 0; i < data.length; i++) {
        
   
      str = str + '<a><input  class="btn btn-default" style="margin:2px" type="button" onclick=showImage("'+data[i].FileName+'") value="'+data[i].DocType+'"/></a>';
    }

           str = str + "</tr></table>";

      }
      else
      {
        str = str + "<td>No documents uploaded.</td></tr></table>";
      }

           $('#divdocviewer').html(str);   
              
        }  
      });
}

function showImage(test)
{

  

  $("#imgdoc").css("display","block");

  $("#imgdoc").attr("src",test);

}



</script> 
  

<!-- fbalist ImageView Script End Here.
 -->






<script> 

$('#msds-select').change(function () { 
  debugger;
 var table = $('#fba-list-table').DataTable(); 
    $.fn.dataTable.ext.search.push(
    function( settings, data, dataIndex ) {
        var msdsSearch = $( "#msds-select option:selected" ).val();
        var msdsValue = data[10]|| 0;
        console.log(data);
        var numbers = /^[0-9]+$/;
          if(msdsSearch=="2" && msdsValue=="update"){  
            return true;
          }
            if(msdsSearch=="1" && msdsValue!="update"){  
            return true;
          }
          if(msdsSearch=="0"){  
            return true;
          }
        return false;
    });
    
     table.draw();
    
});

</script>
 
