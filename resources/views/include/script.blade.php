<script type="text/javascript">

$(".numericOnly").keypress(function (e) {
    if (String.fromCharCode(e.keyCode).match(/[^0-9]/g)) return false;
});

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
                 $('#sidebarCollapse').on('click', function () {
                     $('#sidebar').toggleClass('active');
           
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
             //        function updatecustomerupdate(id){
             //          $('#fbaid').val(id);
             //          $('.customerupdate').modal('show');
                    
             // }
             

          
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
                        $('#txtmapcity').append('<option value="">Select City</option>');

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
                        rows = rows +"<span style='color:black'>"+data[i].pincode+"</span></td></tr>";
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
  if ($('#fsmregister').valid()){
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
  var value=$(this).closest('td').find('input[name="txtfbaid"]').val();
 
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
   url: "{{URL::to('send-fba-sms')}}",
   method:"POST",
   data: $('#message_sms_from').serialize(),
   success: function(msg)  
   {
    console.log(msg);
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
   url: "{{URL::to('

   -material-product')}}",
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
                  alert('Sales Code Updated Successfully');
                  $('#p_remark').val('');
                  $('#update_'+id).closest('a').html(sales_update);
                  
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
  });
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
  });


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
// $('.date-range-filter1').change(function() {

//  debugger;
//  var table = $('#fba-list-table').DataTable(); 

//   // Extend dataTables search
// $.fn.dataTable.ext.search.push(
//   function(settings, data, dataIndex) {
//     var min = $('#min-date').val();
//     var max = $('#max-date').val();

//     var createdAt = data[1] || 2; // Our date column in the table
//  if (
//       (min == "" || max == "") ||
//       (moment(createdAt).isSameOrAfter(min) && moment(createdAt).isSameOrBefore(max))
//     ) {
//       return true;
//     }
//     return false;
//   }
// );

//   table.draw();
// });

//$('#my-table_filter').hide();

 

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
  if( $('#rmfolloupdetails').valid())
    {
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
 }
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
         $("#wetitle").show();
        $("#first_nm").show();
      }
      else{
        $("#weburl").hide();
        $("#last_nm").hide();
         $("#wetitle").hide();
        $("#first_nm").hide();
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

       // alert(data);
      var text = "";
      for (var i = 0; i < data.length; i++) {

      
 


 
 
text = text +'<tr><td><input id="chkfba" name="fba_list[]"  type="checkbox" class="chkfba" value="'+data[i].id+'"/><input id="hdnchk" type="hidden" value="'+data[i].id+'" />'+data[i].fullname+'</td><td>'+data[i].mobile+'</td><td>'+data[i].City+'</td></tr>';
 

}

$('#tblfbalisthead').empty().append('<tr><th><input  name="fba_list[]" value="0" id="selectAll" onclick="checkall()" type="checkbox" /> FBA List</th><th>Mobile Number</th><th>City </th>    </tr> ');

        $('#tblfbalist').empty().append(text);
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
                $.each(data, function(key, val)
                {
                  city_array.push('<option value="'+val.datavalue+'">'+val.value+'</option>');
                });
              }
          });
        
    $('.search_district').empty();
    $('.search_district').append(city_array);
  
});

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


function getpaymentlink(fbaid,mobile){

 $('#txtmono').val(mobile);
 $('#fba').val(fbaid);
$.ajax({
                    url: 'getpaymentlink/'+fbaid,
                    type: "GET",
                    dataType: "json",
                    success:function(data) {
                    if(data.length>0){

                       // alert(data[0].Link);
                        var str = ""+data[0].Link+"";
                        // alert(str)
                          $('.divpartnertable_payment').html(str);
                          $('.paylink_payment').modal('show');
                          //$('#paylink').html(data[0].Link);
                       }     
                       else{
                        
                        var str = "No Payment Link Available...";
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
if( $('#productfolloupdetails').valid())
    {
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
}
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

    if (confirm("Are you sure to "+(value==1?"approve":"reject")+" this notification")) 
    {}
       $.ajax({
            type: "GET",
            url:'approvenotification/'+msgid+'/'+value, 
           success: function (msg) {
             if(value=="1"){
              alert("Notification Approved Successfully");
             $("#accept_"+msgid).css( "background",'#0fe10f');
            }
            else if(value=="0"){
            alert("Notification Rejected Successfully");
            document.getElementById("reject_"+msgid).disabled = true ;
           $("#reject_"+msgid).prop('disabled', true);
            $("#reject_"+msgid).css("background: rgb(15, 225, 15");
              }
             }
            });
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
                 $("#sendnotification").trigger('reset');

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




function docview(fbaid)
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
  if(data.data.length > 0){
      
       for (var i = 0; i < data.data.length; i++) {
        
      str = str + '<a><input  class="btn btn-default" style="margin:2px" type="button" onclick=showImage("'+data.url+data.data[i].FileName+'") value="'+data.data[i].DocType+'"/></a>';
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

    function showImage(src){

  $("#imgdoc").css("display","block");
  $("#imgdoc").attr("src" ,src);
}

</script> 
  

<!-- fbalist ImageView Script End Here-->

<!-- POSP YES OR NO Dropdown start -->

<script> 

$('#msds-select').change(function () {
    // var $loading = $('#loading').hide();    
 var table = $('#fba-list-table').DataTable(); 

 // $loading.show();
    $.fn.dataTable.ext.search.push(
    function( settings, data, dataIndex ) {
        var msdsSearch = $( "#msds-select option:selected" ).val();
        var msdsValue = data[11]|| 0;
       //console.log(data);
        var numbers = /^[0-9]+$/;
          if(msdsSearch=="2" && msdsValue=="update"){  
            return true;
          }
           if(msdsSearch=="1" && msdsValue!="update"){  
            return true;
          }
          if(msdsSearch=="0" && msdsValue){  
            return true;
          }
          if(msdsSearch=="FBAID" && msdsValue!="draw"){
           return true;
         }
          if(msdsSearch=="POSPNO" && msdsValue!="draw"){
           return true;
        }
            if(msdsSearch=="state" && msdsValue!="draw"){
           return true;
        }
           if(msdsSearch=="zone" && msdsValue!="draw"){
           return true;
        }
         if(msdsSearch=="fbaname" && msdsValue!="draw"){
           return true;
        }
           if(msdsSearch=="fbacity" && msdsValue!="draw"){
           return true;
        }
             if(msdsSearch=="pospname" && msdsValue!="draw"){
           return true;
        }
       
       
          return false;
    }); 
      
    table.draw();
     
});


// posp yes fba id posp no search bar Hide and Show
 
    $("select").on("change",function(){
if ($('select ').val() == '1') {
    $(".fbsearch").addClass("hide");
    $(".psearch").addClass("hide"); 
    $(".statesearch").addClass("hide");
    $(".zonesearch").addClass("hide"); 
    $(".fnamesearch").addClass("hide");
    $(".fcitysearch").addClass("hide");
    $(".ponamesearch").addClass("hide");       

  }

  else if ($('select ').val()== 'pospname'){    
  
     $(".ponamesearch").removeClass("hide");
    $(".fcitysearch").addClass("hide");
   $(".fnamesearch").addClass("hide");
   $(".zonesearch").addClass("hide");
   $(".statesearch").addClass("hide");  
   $(".fbsearch").addClass("hide");
   $(".psearch").addClass("hide"); 

}

else if ($('select ').val()== 'fbacity'){  
   
    $(".fcitysearch").removeClass("hide");
   $(".fnamesearch").addClass("hide");
   $(".zonesearch").addClass("hide");
   $(".statesearch").addClass("hide");  
   $(".fbsearch").addClass("hide");
   $(".psearch").addClass("hide"); 

}

 else if ($('select ').val()== 'fbaname'){
  
   $(".fnamesearch").removeClass("hide");
   $(".zonesearch").addClass("hide");
   $(".statesearch").addClass("hide");  
   $(".fbsearch").addClass("hide");
   $(".psearch").addClass("hide"); 

}


else if ($('select ').val()== 'zone'){
 $(".zonesearch").removeClass("hide");
 $(".statesearch").addClass("hide");  
   $(".fbsearch").addClass("hide");
    $(".psearch").addClass("hide"); 

}


else if ($('select ').val()== 'state'){
 $(".statesearch").removeClass("hide"); 
   $(".fbsearch").addClass("hide");
    $(".psearch").addClass("hide"); 
$(".zonesearch").addClass("hide");
}
  else{
    $(".fbsearch").removeClass("hide");
    if ($('select').val() == 'POSPNO')
{
      $(".psearch").removeClass("hide");
    }
    else{
      $(".psearch").addClass("hide");
    }
  }

});

  </script>
<!-- POSP YES OR NO Dropdown end -->


<script type="text/javascript">
function getcustomerid(text,fbaid){
  //alert(fbaid);
  // alert(data);
  $.ajax({
               url: 'getcustomerid/'+fbaid,
               type: "GET",                  
               success:function(data) {
                var json = JSON.parse(data);
                      console.log(json);
                      if(json.StatusNo==0){
   
                      $(text).closest('td').text(json.MasterData.CreateCustomerResult.CustID);
                       alert("Customer id updated successfully"); 

                    }
                    else{
                      alert("Customer id does not exists"); 

                    }
                    }
                }); 

}
 </script>
<!-- Get Loan ID Start -->
<script type="text/javascript">
    function getloanid(text,fbaid){
  //alert(fbaid);
 $.ajax({
             url: 'getloanid/'+fbaid,
             type: "GET",                  
             success:function(data) {
              if(data.loanid==0){
                  alert(data.message);
              }
              else{
                 $(text).closest('td').text(data.loanid);
                 alert(data.message);
              }
 //             var json = JSON.parse(data);
 //             console.log(json);
 //             if(json.StatusNo==0){
 // //alert(json.MasterData[0].LoanID);
 //              $(text).closest('td').text(json.MasterData[0].LoanID);
 //              alert("Loan id updated successfully"); 
 //              }
 //              else{
 //              alert("Loan id does not exit"); 

 //       }
          }
             }); 

}








</script>

<!-- Get Loan ID End -->



 <!-- End shubham raise a ticket -->
 <!-- Loader Script -->
<script>
     var $loading = $('#loading').hide();
     //Attach the event handler to any element
     $(document)
       .ajaxStart(function () {
          //ajax request went so show the loading image
           $loading.show();
       })
     .ajaxStop(function () {
         //got response so hide the loading image
          $loading.hide();
      });
           //         <div id="loading">
           //      <img src="loading.gif" />  
           // </div>


</script>
<script type="text/javascript">

  function getprodcutdtls(product_id){
$.ajax({  
         type: "GET",  
         url:'Product-followup/'+product_id,
         success: function(fsmmsg){

      var data = JSON.parse(fsmmsg);
      var str = "<table class='table' id='example'><thead><tr style='height:30px;margin:5px;'><th>Lead ID</th><th>Name</th><th>Mobile No</th><th>Email Id</th><th>Created Date</th><th>View History</th></tr></thead>";
       for (var i = 0; i < data.length; i++) 
       {

         str = str + "<tbody><tr style='height:30px;margin:5px;'><td><a href='#'  data-toggle='modal' onclick='getproductfollowup("+data[i].FBAID+")' data-target='productfollowup'>"+data[i].FBAID+"</a></td><td>"+data[i].FullName+"</td><td>"+data[i].MobiNumb1+"</td><td>"+data[i].EmailID+"</td><td>"+data[i].CreaOn+"</td><td><a class='btn btn-primary' id='bntviewproduthistory' data-toggle='modal' data-target='producthistory' onclick='showproducthistory("+data[i].FBAID+")'>View History</a></td></tr></tbody>";
       }
         str = str + "</table>";
           $('#divpartnertable').html(str);   
       }  
      });
}

function showproducthistory(Lead_id){

$('.producthistory').modal('show');
$.ajax({  
         type: "GET",  
         url:'view-history-Product-followup/'+Lead_id,
         success: function(fsmmsg){

      var data = JSON.parse(fsmmsg);

      var str = "<table class='table' id='example'><tr style='height:30px;margin:5px;'><th>Lead ID</th><th>Status</th><th>Remark</th></tr>";
       for (var i = 0; i < data.length; i++) 
       {

         str = str + "<tr style='height:30px;margin:5px;'><td>"+data[i].lead_id+"</td><td>"+data[i].status_name+"</td><td>"+data[i].remark+"</td></tr>";
       }
         str = str + "</table>";
           $('#divproducthistory').html(str);   
       }  
      });
}

</script>











