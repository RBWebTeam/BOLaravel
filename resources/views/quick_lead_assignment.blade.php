@extends('include.master')
@section('content')


     <div class="container-fluid white-bg">
             <div class="col-md-12"><h3 class="mrg-btm">FBA Assignment For Quick Lead</h3>
           <hr>
           </div>
 <!--   <div class="col-md-12"><h3 class="mrg-btm">FBA Assignment for quicklead</h3> -->


    <form  id="leadquick" name="leadquick" action="{{url('fbaquickleadcity')}}" method="post"> 
    {{ csrf_field() }}
     <hr>
     
     <!-- <table class="table table-responsive table-hover" cellspacing="0" id="example"> -->

     <div class="col-md-4 col-sm-4 col-xs-12">
     <h4 style="margin-left: 45%;">State</h4>
     <div class="form-group">
     <select multiple="multiple" class="form-control select-sty" name="state[]" id="state" >    
     </select>
     </div>
     </div>

     <div class="col-md-4 col-sm-4 col-xs-12">
     <h4 style="margin-left: 45%;">City</h4>
     <div class="form-group">
     <select  multiple="multiple" class="form-control select-sty" name="city[]" id="city">
     </select>
     </div>
     </div>

      <div class="form-group"> <input type="Submit" name="qlead" id="qlead" class="mrg-top common-btn pull-left" value="SHOW"> 
      </div>
  </form>
  <br>
     
      <div class="col-md-12 hidden" id="tablediv">
      <div class="overflow-scroll">
      <div class="table-responsive" >
   
      <form method="post" id="fbdatail-table-from">
        {{ csrf_field() }}
      <input type="hidden" name="txtfid" id="txtfid">
      <div class="form-group">
      <label class="control-label">Users:</label>
      <select name="ddlstatus" id="ddlstatus" class="form-control" style="width:30%" required >
              <option value="">--Select --</option>
              @foreach($userfb as $val)           
              <option value="{{$val->fbauserid}}">{{$val->fbauserid}} {{$val->username}}</option>
              @endforeach
              </select>
      </div>
      <table class="datatable-responsive table table-striped table-bordered nowrap" id="example">
      <thead>
      <tr>
      <th><input name="select_all" value="1" id="example-select-all" class="countceckbox" type="checkbox" /></th>       
           <th>FBA ID</th> 
           <th>FBA Name</th> 
           <th>Email id</th>
           <th>Mobile No</th> 
           <th>City</th>                                  
           </tr>
           </thead>
           </table>
           <div class="col-md-12">
           <h3 class="pull-left"><b>COUNT :</b> <span id="checkboxcount">0</span> <span id="fbacount">0</span> <h3>
           </div>
           <br><br>
           <div class="col-md-12">
           <div style="text-align: center;">
           <a id="fbdatail" name="fbdatail" class="btn btn-success">Submit</a>
           </div>
           </div>
           <br><br>

            </form> 
         </div>
      </div>
    </div>
</div>

  <script type="text/javascript">

$(document).ready(function(){
  checkboxcount();

$('#qlead').on('click', function(e){
  e.preventDefault(); 
  getLoanData();
 // $('#example-gried').DataTable({

 //        "order": [[ 0, "desc" ]],
 //        "ajax": "fbaquickleadcity",
 //        "data": $('#leadquick').serialize(),
 //        "columns": [

 //            { "data": "fbaid"},
 //            { "data": "fbaid"},
 //            { "data": "fbaid"},
 //            { "data": "fbaid"},
 //            { "data": "fbaid"}

 //        ],

 //    });

    //.column('0:visible').order('desc').draw();

 /*$.ajax({ 
   url: "{{URL::to('fbaquickleadcity')}}",
   method:"POST",
   data: $('#leadquick').serialize(),
   success: function(msg)  
   {
            arr=Array();
            $('#append_id').empty();
           $.each(msg, function( index, value ) {
          arr.push('<tr><td><input value="" type="checkbox" class="chk" name="id"></td><td>'+value.FBAID+'</td><td>'+value.FullName+'</td><td>'+value.EmailID+'</td><td>'+value.MobiNumb1+'</td><td>'+value.City+'</td></tr>');



           });

           $('#append_id').append(arr);
   }

 });*/

 });


function getLoanData(){

  $.ajax({
  url: 'fbaquickleadcity',
  type: "POST",           
  data:  $('#leadquick').serializeArray(),
  success:function(data) {

    var json = JSON.parse(data);
    $("#fbacount").text(json.length);
   // alert(json.length);
   // console.log(json);
    if(json.length>0){

     $('#tablediv').removeClass('hidden');
    table = $('#example').DataTable({         
    "data":json,
    "order": [[ 1, "desc" ]],
    "destroy": true,
    "searching": true,
     
        "columns": [
           {"data":"FBAID" ,

             "render": function ( data, type, row, meta ) {
            return '<input type="checkbox" class="countceckbox" name="id[]" value="'+ $('<div/>').text(data).html() + '">';              }
            },
            { "data": "FBAID"},
            { "data": "FullName"},
            { "data": "EmailID"},
            { "data": "MobiNumb1"},
            { "data": "City"} ,
            
             
            ]
    
        });
  }
  else{
   $('#tablediv').addClass('hidden');
    alert('No data available');
  }
  },
  error: function(XMLHttpRequest, textStatus, errorThrown) {
    $('#tablediv').addClass('hidden');
     alert("Please select state and city");
  }

});     
}
})

   $.ajax({ 
   url: "{{URL::to('quickleadassignment')}}",
   method:"GET",
  success: function(datas)  
 {

  var data=$.parseJSON(datas);
  // console.log(data);
    if(data)
    { $.each(data, function( index, value ) {

      
    $('#state').append('<option value="'+value.state_id+'">'+value.state_name+'</option>');
 }); 
    }else{
    $('#state').empty().append('No Result Found');
  }
  },
  });


     $('#state').on('change', function() {
     $("#city").empty().append(''); 
     //alert('okae');
     var state=$('#state').find(":selected").val();
     var array = "";
     var i=0
     $('#state  option:selected').each(function() {
     array+= $(this).val()+",";

//     if ($("select option:selected").length > 3) {
//     }
// alert('You can select only 3 State at time');
   
});


   console.log(array);
    var v_token ="{{csrf_token()}}";
   $.ajax({  
    type: "POST",  
    url: "{{URL::to('quickleadcity')}}",
    data : {'_token': v_token,'state':array},
    success: function(msg){
    console.log(msg);
    if(msg)
    {  $.each(msg, function( index, value ) {
   $('#city').append('<option value="'+value.cityname+'">'+value.cityname+'</option>');   
    }); 
     }else{
      $('#city').empty().append('No Result Found');
      }
      }  
      });
      });

  </script>

<script type="text/javascript">

$(document).ready(function (){ 

  $('#example-select-all').on('click', function(){
    var table = $('#example').DataTable();
      // Check/uncheck all checkboxes in the table
     var rows = table.rows({ 'search': 'applied' }).nodes();
      $('input[type="checkbox"]', rows).prop('checked', this.checked);
   });


    $('#example tbody').on('change', 'input[type="checkbox"]', function(){
      // If checkbox is not checked
           if(!this.checked){
           var el = $('#example-select-all').get(0);
           if(el && el.checked && ('indeterminate' in el)){
          el.indeterminate = true;
         }
      }
   });

      $('#example').on( 'click', 'tr', function () {
      var table = $('#example').DataTable();
      var rows = table.rows({ 'search': 'applied' }).nodes();
      var counter = 0;
      for (var i = 0; i < rows.count(); i++) {
      if($('input[type="checkbox"]', rows[i])[0].checked){
        counter++;
        }
      }
       $("#checkboxcount").text(counter + "/");
 });
});



  $('#fbdatail').click(function(){

 if($('#ddlstatus').val()==""){
      alert('Please Select User');
      return false;
    }

  $('#txtfid').val("");
  var table = $('#example').DataTable();
  var rows = table.rows({ 'search': 'applied' }).nodes();
  var chkval="";
 for (var i = 0; i<rows.length; i++) {

  if($('input[type="checkbox"]', rows[i])[0].checked){

   chkval = chkval +","+$('input[type="checkbox"]', rows[i])[0].defaultValue;

  }
 }
$('#txtfid').val(chkval);
// alert(chkval);
if(chkval==""){
  alert('Please Select FBA');
  return false;
}
//alert($('#txtfid').val());

   if ($('#leadquick').valid()){
   $.ajax({ 
   url: "{{URL::to('fbaquickleadcitysave')}}",
   method:"POST",
   data: $('#fbdatail-table-from').serialize(),
   success: function(msg)  
   {
    //console.log(msg);
    alert('FBA Assigned Successfully');
    window.location.reload();
    //$('#leadquick').trigger("reset");
   
   }

});
 }
});


    function checkboxcount(){
    var $checkboxes = $('.countceckbox');
    // alert($checkboxes)    
    $checkboxes.change(function(){
    var countCheckedCheckboxes = $checkboxes.filter(':checked').length;
    $("#checkboxcount").rows().select(); 
    //text(countCheckedCheckboxes);

 });
}




</script>

@endsection