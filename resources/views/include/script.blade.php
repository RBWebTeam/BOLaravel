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
            // console.log(msg.status);
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
            tablerows.push('<tr><td style="font-family: monospace"><img class="img-responsive" src="/' + value.image_path + '" width="699" height="1176"/></td></tr>');
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
//    $('.modal-backdrop').show();    

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
                  $('#loan_'+id).text(loan_update);       
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
                  $('#posp_'+id).text(posp_update);
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
</script>
<script>
    $(document).ready(function() {
        $('#example').DataTable({
          paging: true,
          responsive: false,
        });
 // Bootstrap datepicker
$('.input-daterange input').each(function() {
  $(this).datepicker('clearDates');
});

// Set up your table
table1 = $('#example_1').DataTable({
  paging: true,
  info: false,
   responsive: false,
});




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
       for (var i = 0; i < data.length; i++) {

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


///shubham rm folloup 

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
       for (var i = 0; i < data.length; i++) {

         str = str + "<tr style='height:30px;margin:5px;'><td>"+data[i].lead_id+"</td><td>"+data[i].FullName+"</td><td>"+data[i].user_type+"</td><td>"+data[i].status_name+"</td><td>"+data[i].remark+"</td></tr>";
      
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

</script>
 



 


 

