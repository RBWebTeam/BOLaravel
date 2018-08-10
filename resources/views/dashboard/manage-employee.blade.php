@extends('include.master')
@section('content')


<form id="updateempdtl" name="updateempdtl" method="POST" action="{{url('update_detailsemp')}}" onsubmit="alertSuccess()" >
    {{csrf_field()}}
<div id="content" style="overflow:scroll; height: 5px;">
             <div class="container-fluid white-bg">
             <div class="col-md-12"><h3 class="mrg-btm">Manage Employee</h3></div>
             <div class="col-md-12">
             <div class="overflow-scroll">
             <div class="table-responsive" >
       
  </div>

    <table id="example" class="table table-bordered table-striped tbl" >
    <thead>

    <input type="hidden" name="sfbaid" id="sfbaid" value="{{$data[0]->employeeid}}">
        <div class="form-group col-md-6">
        <div class="col-md-5">
        <label>UID :</label>
        </div>
        <div class="col-md-7">
       <input type="text" class="text-primary form-control" name="euid" id="euid" value="{{$data[0]->UId}}">
       </div>
        </div>

		 <div class="form-group col-md-6">
          <div class="col-md-5">
          <label>FBA ID:</label>
          </div>
          <div class="col-md-7">
       <input type="text" class="text-primary form-control" name="efbid" id="efbid" value="{{$data[0]->fba_id}}">
          </div>
          </div>

	<div class="form-group col-md-6">
        <div class="col-md-5">
        <label>Role ID:</label>
        </div>
         <div class="col-md-7">
        <select name="eroleid" id="eroleid" class="text-primary form-control">
       
		@foreach($role as $val)
		 @if($val->role_id==$data[0]->role_id){
		  <option selected="selected" value="{{$val->role_id}}">{{$val->role_id}}</option> 
		  }
		  @else
         <option value="{{$val->role_id}}">{{$val->role_id}}</option>
           @endif
          @endforeach
         
          </select>
		</div>
         </div>

	<div class="form-group col-md-6">
        <div class="col-md-5">
        <label>Employee Name :</label>
        </div>
        <div class="col-md-7">
         <input type="text" class="text-primary form-control" name="ename" id="ename" value="{{$data[0]->EmployeeName}}">
        </div>
        </div>

         </div>


		 <div class="form-group col-md-6">
        <div class="col-md-5">
        <label>Mobile No:</label>
        </div>
        <div class="col-md-7">
     
        <input type="text" class="text-primary form-control" name="emobile" id="emobile" maxlength="10" value="{{$data[0]->MobileNo}}">
		 </div>
        </div>

       	<div class="form-group col-md-6">
        <div class="col-md-5">
        <label>Email:</label>
        </div>
        <div class="col-md-7">
        <input type="email" class="text-primary form-control" name="eemail" id="eemail" value="{{$data[0]->EmailId}}">
        </div>
        </div>


	<div class="form-group col-md-6">
        <div class="col-md-5">
        <label>Offical Mobile:</label>
        </div>
        <div class="col-md-7">
        <input type="text" class="text-primary form-control" name="offclmob" id="offclmob" maxlength="10" value="{{$data[0]->official_phone_no}}">
        </div>
        </div>


<div class="form-group col-md-6">
        <div class="col-md-5">
        <label>Offical Email:</label>
        </div>
        <div class="col-md-7">
        <input type="email" class="text-primary form-control" name="offclemail" id="offclemail" value="{{$data[0]->official_emailid}}">
        </div>
        </div>


	<div class="form-group col-md-6">
        <div class="col-md-5">
        <label>Profile:</label>
        </div>
         <div class="col-md-7">
        <select name="eprofile" id="eprofile"  class="text-primary form-control">
			@foreach($profilesave as $val)
			 @if($val->Profile==$data[0]->Profile){
		<option selected="selected" value="{{$val->Profile}}">{{$val->Profile}}</option>
		}
		@else
         <option value="{{$val->Profile}}">{{$val->Profile}}</option>
           @endif
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
         @foreach($catgory as $val)
		@if($val->EmployeeCategory==$data[0]->EmployeeCategory){
		<option selected="selected" value="{{$val->EmployeeCategory}}">{{$val->EmployeeCategory}}</option> 
	    }
		@else
         <option value="{{$val->EmployeeCategory}}">{{$val->EmployeeCategory}}</option>
        @endif
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
		@foreach($digngtion as $val)

		@if($val->Designation==$data[0]->Designation){
		<option selected="selected" value="{{$val->Designation}}">{{$val->Designation}}</option> 
	 }
		@else
            <option value="{{$val->Designation}}">{{$val->Designation}}</option>
            @endif
             @endforeach
          </select>
          </div>
         </div>

		<div class="form-group col-md-6">                
        <div class="col-md-5">
        <label>Emp-Status:</label>
        </div>
         <div class="col-md-7">
        <select name="estatus" id="estatus"  class="text-primary form-control">
		@foreach($status as $val)
		@if($val->EmployeeStatus==$data[0]->EmployeeStatus){
		<option selected="selected" value="{{$val->EmployeeStatus}}">{{$val->EmployeeStatus}}</option> 
		}
		@else
		<option value="{{$val->EmployeeStatus}}">{{$val->EmployeeStatus}}</option>
		   @endif
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
  





<!-- <script type="text/javascript">
	
$("#statussub").click(function(){ 
 if ($('#updateempdtl').valid()){
   //console.log($('#updateempdtl').serialize());
   $.ajax({ 
   url: "{{URL::to('update_detailsemp')}}",
   method:"POST",
   data: $('#updateempdtl').serialize(),  
   success: function(msg)  
   {
  alert("Record has been saved successfully");
  
    $("#updateempdtl").trigger('reset');
        window.location.reload();

     // location.reload();

    
  }
 }); 
 } 
 });

</script> -->





  <script type="text/javascript">
 
  $(document).ready(function(){
    //alert('test');
      $('#statussub').onclick(function () {
      alert('test');
   ($('#updateempdtl').valid()){
   $.ajax({ 
   url: "{{URL::to('update_detailsemp')}}",
   method:"POST",
   data: $('#updateempdtl').serialize(),
   success: function(msg)  
   {
   	//alert('Update Successfully');
   	//window.location.reload();
    
    
   }

});
 }

});

      });




  </script>

<script>
function alertSuccess() {
alert('Update Successfully');
}
</script>
     


@endsection