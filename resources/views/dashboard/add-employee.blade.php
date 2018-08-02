@extends('include.master')
@section('content')


<form id="addnewemp" name="addnewemp" method="POST" action="{{url('add-new-emp')}}">>
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
       <input type="text" class="text-primary form-control" name="euid" id="euid">
       </div>
        </div>
      <div class="form-group col-md-6">
          <div class="col-md-5">
          <label>FBA ID:</label>
          </div>
          <div class="col-md-7">
       <input type="text" class="text-primary form-control" name="efbid" id="efbid">
          </div>
          </div>

  <div class="form-group col-md-6">
        <div class="col-md-5">
        <label>Role ID:</label>
        </div>
         <div class="col-md-7">
        <select name="eroleid" id="eroleid" class="text-primary form-control">
        <option value="">--Role ID--</option>
         @foreach($roleadd as $val)
         <option value="{{$val->role_id}}">{{$val->role_id}}</option>
          @endforeach
         
          </select>
          </div>
         </div>





       <div class="form-group col-md-6">
        <div class="col-md-5">
        <label>Employee Name :</label>
        </div>
        <div class="col-md-7">
         <input type="text" class="text-primary form-control" name="ename" id="ename">
        </div>
        </div>

         </div>


		 <div class="form-group col-md-6">
        <div class="col-md-5">
        <label>Mobile No:</label>
        </div>
        <div class="col-md-7">
     
        <input type="number" class="text-primary form-control" name="emobile" id="emobile" maxlength="10">


        </div>
        </div>

        	 <div class="form-group col-md-6">
        <div class="col-md-5">
        <label>Email:</label>
        </div>
        <div class="col-md-7">
        <input type="email" class="text-primary form-control" name="eemail" id="eemail">
        </div>
        </div>

  <div class="form-group col-md-6">
        <div class="col-md-5">
        <label>Offical Mobile:</label>
        </div>
        <div class="col-md-7">
        <input type="text" class="text-primary form-control" name="offclmob" id="offclmob" maxlength="10">
        </div>
        </div>



  
<div class="form-group col-md-6">
        <div class="col-md-5">
        <label>Offical Email:</label>
        </div>
        <div class="col-md-7">
        <input type="email" class="text-primary form-control" name="offclemail" id="offclemail">
        </div>
        </div>




  <div class="form-group col-md-6">
        <div class="col-md-5">
        <label>Profile:</label>
        </div>
         <div class="col-md-7">
        <select name="eprofile" id="eprofile" class="text-primary form-control">
        <option value="">--Select Employee Profile--</option>
         @foreach($profileadd as $val)
         <option value="{{$val->Profile}}">{{$val->Profile}}</option>
          @endforeach
         
          </select>
          </div>
         </div>


        <div class="form-group col-md-6">
        <div class="col-md-5">
        <label>Employee category:</label>
        </div>
         <div class="col-md-7">
        <select name="ecatgory" id="ecatgory" class="text-primary form-control">
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
        <select name="edesignation" id="edesignation" class="text-primary form-control">
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
        <select name="estatus" id="estatus" class="text-primary form-control">
          <option value="">--Select-Emp-Status--</option>
           @foreach($statusadd as $val)
            <option value="{{$val->EmployeeStatus}}">{{$val->EmployeeStatus}}</option>
             @endforeach
          </select>
          </div>
         </div>







   <div class="form-group col-md-6">
        <div class="col-md-5">
        <label>Location Acess :</label>
        </div>
        <div class="col-md-7">
        <input type="radio" name="emolocation" id="mapcity" value="Mapped_Area" checked> Mapped_City
      <input type="radio" name="emolocation" id="allindia"  value="All_India"> All India<br>
        </div>
        </div>


          
        
    
        <div class="form-group col-md-12">
        <div class="col-md-4">
        <input type="submit" name="statussub" id="statussub" value="submit" class="btn btn-success">
        </div>
        </div>
                 </thead>
                    <tbody>
               
			<tbody>
                </tbody>
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
      $('#statussub').onclick(function () {
      alert('test');
  if ($('#addnewemp').valid()){
   $.ajax({ 
   url: "{{URL::to('add-new-emp')}}",
   method:"POST",
   data: $('#addnewemp').serialize(),
   success: function(msg)  
   {
   	
    
    
   }

});
 }

});

      });
  </script>
     















@endsection