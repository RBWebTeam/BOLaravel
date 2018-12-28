@extends('include.master')
@section('content')


<form id="addnewemp" name="addnewemp" method="POST" action="{{url('add-new-emp')}}" onsubmit="alertSuccess()">
    {{csrf_field()}}
<div id="content" style="overflow:scroll; height: 5px;">
             <div class="container-fluid white-bg">
             <div class="col-md-12"><h3 class="mrg-btm"> Add New Employee</h3></div>
             <div class="col-md-12">
             <div class="overflow-scroll">
             <div class="table-responsive" >
       
  </div>

  

    <table id="example" class="table table-bordered table-striped tbl" >
    <thead>

    <input type="hidden" name="sfbaid" id="sfbaid" value=""/>
        <div class="form-group col-md-6">
        <div class="col-md-5">
        <label>UID :</label>
        </div>
        <div class="col-md-7">
       <input type="text" class="text-primary form-control" name="euid" id="euid"  maxlength="7" required="">
       </div>
        </div>
      <div class="form-group col-md-6">
          <div class="col-md-5">
          <label>FBA ID:</label>
          </div>
          <div class="col-md-7">
      <input type="text" class="text-primary form-control" name="efbid" id="efbid" maxlength="6" required="">
      </div>
      </div>




  <div class="form-group col-md-6">
        <div class="col-md-5">
        <label>Role ID:</label>
        </div>
        <div class="col-md-7">
    <input type="text" class="text-primary form-control" name="eroleid" id="eroleid" readonly="">
        </div>
        </div>

    <div class="form-group col-md-6">
        <div class="col-md-5">
        <label>Employee Name :</label>
        </div>
        <div class="col-md-7">
        <input type="text" class="text-primary form-control" name="ename" id="ename" required="">
        </div>
        </div>

         </div>


		 <div class="form-group col-md-6">
        <div class="col-md-5">
        <label>Mobile No:</label>
        </div>
        <div class="col-md-7">
      <input type="text" class="text-primary form-control" name="emobile" id="emobile" maxlength="10" required="">
       </div>
        </div>

    <div class="form-group col-md-6">
        <div class="col-md-5">
        <label>Email:</label>
        </div>
        <div class="col-md-7">
        <input type="email" class="text-primary form-control" name="eemail" id="eemail" required="">
        </div>
        </div>

  <div class="form-group col-md-6">
        <div class="col-md-5">
        <label>Official Mobile:</label>
        </div>
        <div class="col-md-7">
        <input type="text" class="text-primary form-control" name="offclmob" id="offclmob" maxlength="10" required="">
        </div>
        </div>



  
<div class="form-group col-md-6">
        <div class="col-md-5">
        <label>Official Email:</label>
        </div>
        <div class="col-md-7">
        <input type="email" class="text-primary form-control" name="offclemail" id="offclemail" required="">
        </div>
        </div>




  <div class="form-group col-md-6">
        <div class="col-md-5">
        <label>Profile:</label>
        </div>
         <div class="col-md-7">
        <select  name="eprofile" id="eprofile" class="text-primary form-control" required="">
        <option value="">--Select Employee Profile--</option>
         @foreach($profileadd as $val)
         <option value="{{$val->Profile}}">{{$val->Profile}}</option>
          @endforeach
         
          </select>
          </div>
         </div>


   <div class="form-group col-md-6">
        <div class="col-md-5">
        <label>Select Employee Category:</label>
        </div>
         <div class="col-md-7">
        <select name="ecatgory" id="ecatgory" class="text-primary form-control" required="">
        <option value="">--Select Employee category--</option>
         @foreach($catgoryadd as $val)
         <option value="{{$val->EmployeeCategory}}">{{$val->EmployeeCategory}}</option>
          @endforeach
         
          </select>
          </div>
         </div>


   <div class="form-group col-md-6">
        <div class="col-md-5">
        <label>Designation:</label>
        </div>
         <div class="col-md-7">
        <select name="edesignation" id="edesignation" class="text-primary form-control" required="">
          <option value="">--Select Designation--</option>
           @foreach($digngtionadd as $val)
            <option value="{{$val->Designation}}">{{$val->Designation}}</option>
             @endforeach
          </select>
          </div>
         </div>

   <div class="form-group col-md-6">
        <div class="col-md-5">
        <label>Emp-Status:</label>
        </div>
         <div class="col-md-7">
        <select name="estatus" id="estatus" class="text-primary form-control" required="">
          <option value="">--Select-Emp-Status--</option>
           @foreach($statusadd as $val)
            <option value="{{$val->Employee_Status}}">{{$val->Employee_Status}}</option>
             @endforeach
          </select>
          </div>
         </div>

       <div class="form-group col-md-6">
        <div class="col-md-5">
        <label>Employee Type  :</label>
        </div>
        <div class="col-md-7">
        <input type="text" class="text-primary form-control" name="emptype" id="emptype" value="Employee" readonly="">
        </div>
        </div>





<div class="form-group col-md-6">
        <div class="col-md-5">
        <label>BO-Access :</label>
        </div>
        <div class="col-md-7">
        <input type="radio" name="boaccess" id="Read" value="Read" checked> Read
        <input type="radio" name="boaccess" id="Read/Write"  value="Read/Write"> Read/Write
        <input type="radio" name="boaccess" id="No Access"  value="No Access"> No Access
        </div>
        </div>



<!--     <div class="form-group col-md-6">
        <div class="col-md-5">
        <label>BO-Access  :</label>
        </div>
        <div class="col-md-7">
        <input type="text" class="text-primary form-control" name="boaccess" id="boaccess" required="">
        </div>
        </div> -->

<div class="form-group col-md-6">
        <div class="col-md-5">
        <label>POSP-Access :</label>
        </div>
        <div class="col-md-7">
        <input type="radio" name="pospaccess" id="Read" value="Read" checked> Read
        <input type="radio" name="pospaccess" id="Read/Write" value="Read/Write"> Read/Write
        <input type="radio" name="pospaccess" id="No Access"  value="No Access"> No Access
        </div>
        </div>


<!-- 
    <div class="form-group col-md-6">
        <div class="col-md-5">
        <label>POSP-Access  :</label>
        </div>
        <div class="col-md-7">
        <input type="text" class="text-primary form-control" name="pospaccess" id="pospaccess" required="">
        </div>
        </div>
 -->

<div class="form-group col-md-6">
        <div class="col-md-5">
        <label>Payout-System :</label>
        </div>
        <div class="col-md-7">
        <input type="radio" name="paysystem" id="Read" value="Read" checked> Read
        <input type="radio" name="paysystem" id="Read/Write" value="Read/Write"> Read/Write
        <input type="radio" name="paysystem" id="No Access" value="No Access"> No Access
        <br>
        </div>
        </div>


 <!-- <div class="form-group col-md-6">
        <div class="col-md-5">
        <label>Payout-System  :</label>
        </div>
        <div class="col-md-7">
        <input type="text" class="text-primary form-control" name="paysystem" id="paysystem" required="">
        </div>
        </div> -->

  <!--        <div class="form-group col-md-6">
        <div class="col-md-5">
        <label>Employee Tpye  :</label>
        </div>
        <div class="col-md-7">
        <input type="text" class="text-primary form-control" name="emptype" id="emptype" value="Employee" readonly="">
        </div>
        </div> -->




<div class="form-group col-md-6">
        <div class="col-md-5">
        <label>Location Access  :</label>
        </div>
        <div class="col-md-7">
        <input type="radio" name="emolocation" id="mapcity" value="Mapped_Area" checked> Mapped_City
        <input type="radio" name="emolocation" id="allindia"  value="All_India"> All India<br>
        </div>
        </div>

    <div class="form-group col-md-6">
          <div class="col-md-5">
          
          </div>
          <div class="col-md-7">
       <input type="hidden" class="text-primary form-control" name="ugropid" id="ugropid">
          </div>
          </div>

 <div class="form-group col-md-12">
        <div class="col-md-4">
        <input type="Submit" name="statussub" id="statussub" value="submit" class="btn btn-success">
        </div>
        </div>
                </thead>
         <tbody>
               
			
              </tbody>
            </table>
           </div>
          </div>
        </div>
      </div>
 </div>
  

  






  <script type="text/javascript">
 
  $(document).ready(function(){
    //alert('test');
      $('#statussub').on("click",function(){
        //alert('test');
  if ($('#addnewemp').valid()){
   $.ajax({ 
   url: "{{URL::to('add-new-emp')}}",
   method:"GET",
   data: $('#addnewemp').serialize(),
   success: function(msg){
                   
      
    
  }
  });
}
});
});    
</script>
<script type="text/javascript">
  
function getloneid(){

  var roleid = $("#eprofile").val();  
  //alert(roleid);
   $.ajax({
             url: 'get-role-id/'+roleid,
             type: "GET",             
             success:function(data) 
             {
              //alert(data);
               var role=  JSON.parse(data); 
               $("#eroleid").val(role[0].role_id);

             }
         });
}

$("#eprofile").change(function(){
  getloneid();
});


</script>

  <script type="text/javascript">
   $(function(){
   $('#euid').keyup(function(){    
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
   $('#emobile').keyup(function(){    
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
   $('#offclmob').keyup(function(){    
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
   $('#efbid').keyup(function(){    
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
   $('#ename').keyup(function(){    
   var yourInput = $(this).val();
   re = /[1-91-1]?[1-91-1`~!@#$%^&*()_|+\-=?;:'",.<>\{\}\[\]\\\/]/gi;
   var isSplChar = re.test(yourInput);
    if(isSplChar)
    {
    var no_spl_char = yourInput.replace(/[1-91-1]?[1-91-1`~!@#$%^&*()_|+\-=?;:'",.<>\{\}\[\]\\\/]/gi, '');
    $(this).val(no_spl_char);
    }
  });
 
});
</script>
<script type="text/javascript">
   $(function(){
   $('#boaccess').keyup(function(){    
   var yourInput = $(this).val();
   re = /[1-91-1]?[1-91-1 `~!@#$%^&*()_|+\-=?;:'",.<>\{\}\[\]\\\/]/gi;
   var isSplChar = re.test(yourInput);
    if(isSplChar)
    {
    var no_spl_char = yourInput.replace(/[1-91-1]?[1-91-1 `~!@#$%^&*()_|+\-=?;:'",.<>\{\}\[\]\\\/]/gi, '');
    $(this).val(no_spl_char);
    }
  });
 
});
</script>
<script type="text/javascript">
   $(function(){
   $('#pospaccess').keyup(function(){    
   var yourInput = $(this).val();
   re = /[1-91-1]?[1-91-1 `~!@#$%^&*()_|+\-=?;:'",.<>\{\}\[\]\\\/]/gi;
   var isSplChar = re.test(yourInput);
    if(isSplChar)
    {
    var no_spl_char = yourInput.replace(/[1-91-1]?[1-91-1 `~!@#$%^&*()_|+\-=?;:'",.<>\{\}\[\]\\\/]/gi, '');
    $(this).val(no_spl_char);
    }
  });
 
});
</script>


 <script type="text/javascript">
        $(document).ready(function(){
          });
            $("#efbid").on("change",function(){              
            if($("#efbid").val()!=''){
              $.ajax({
              url: "{{url('fba-data')}}",
              type: 'get',
              data:{'id':$("#efbid").val()},
              success: function(data){
            // console.log(data);
              (data.length<=0) 
                if (data.length>0) 
                {
                  
              $('#ename').val(data[0].FullName);
              $('#eemail').val(data[0].emailID); 
              $('#emobile').val(data[0].MobiNumb1);
              $('#efbid').val(data[0].FBAID);

              }else{            
                alert("FBA ID Does Not Exists");
               $('#ename').val('');
               $('#eemail').val(''); 
               $('#emobile').val('');
               $('#efbid').val('');
                    }
                }                                
            });
             }
        });

</script>






<!--  <script type="text/javascript">
        $(document).ready(function(){
          });
            $("#euid").on("change",function(){              
            if($("#euid").val()!=''){
            $.ajax({
           url: "{{url('uid-data')}}",
           type: 'get',
           data:{'id':$("#euid").val()},
            success: function(data){
            console.log(data);
              (data.length<=0) 
                if (data[0].UId!="0") 
                {
                   alert("UID Already Exists");
               $('#euid').val('');
          }
                }                                
            });
             }
        });

</script> -->



 <script type="text/javascript">
        $(document).ready(function(){


        });

      $("#euid").on("change",function(){  

        if($("#euid").val()!=''){

            $.ajax({
           url: "{{url('uid-data')}}",
           type: 'get',
           data:{'id':$("#euid").val()},
            success: function(data){
              
           if(data.api_db=="0" ){
              alert("UID Does Not Exists");
              $('#euid').val('');
              return false;
            }  else{
              if(data.existed_db == "1"){
                 $('#euid').val('');

              alert("UID Already Exists");

}
            }                                          
            }

         });
       }
        });

</script>





 <!-- <script type="text/javascript">
        $(document).ready(function(){
          });
            $("#euid").on("change",function(){              
            if($("#euid").val()!=''){
              $.ajax({
                url: "{{url('fba-data')}}",
              type: 'get',
              data:{'id':$("#euid").val()},
              success: function(data){
            // console.log(data);
              (data.length<=0) 
                if (data.length>0) 
                {
                  
              $('#euid').val(data[0].UID);
          

              }else{            
                alert("Not Exists");
             
               $('#euid').val('');
                    }
                }                                
            });
             }
        });

</script>

 -->




<script type="text/javascript">
  
function getusergrpeid(){

  var usgrpeid = $("#eprofile").val();  
  //alert(usgrpeid);
   $.ajax({
             url: 'get-ugroup-id/'+usgrpeid,
             type: "GET",             
             success:function(data) 
             {
              //alert(data);
               var role=  JSON.parse(data); 
               $("#ugropid").val(role[0].id);

             }
         });
}

$("#eprofile").change(function(){
  getusergrpeid();
});


</script>

</script>
<!-- Get Loan ID Start -->

























 <script>
function alertSuccess() {
alert('New Employee Added Successfully');
}
</script>
     
@endsection