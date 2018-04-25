@extends('include.master')
@section('content')   


<form id="formregistration" name="formregistration" action="{{url('crmstatus')}}" method="POST">
    {{csrf_field()}}
<div id="content" style="overflow:scroll; height: 5px;">
             <div class="container-fluid white-bg">
             <div class="col-md-12"><h3 class="mrg-btm">CRM Status</h3></div>
             <div class="col-md-12">
             <div class="overflow-scroll">
             <div class="table-responsive" >
       
  </div>

    <table id="example" class="table table-bordered table-striped tbl" >
    <thead>

    <input type="hidden" name="sfbaid" id="sfbaid" value="{{$data[0]->fbaid}}"/>
        <div class="form-group col-md-6">
        <div class="col-md-5">
        <label>Full Name :</label>
        </div>
        <div class="col-md-7">
        {{$data[0]->fullname}}
        </div>
        </div>


        <div class="form-group col-md-6">
        <div class="col-md-5">
        <label>Mobile :</label>
        </div>
        <div class="col-md-7">
        {{$data[0]->mobile}}
        </div>
        </div>


        <div class="form-group col-md-6">
        <div class="col-md-5">
        <label>Email:</label>
        </div>
        <div class="col-md-7">
         {{$data[0]->email}}
        </div>
        </div>


        <div class="form-group col-md-6">
        <div class="col-md-5">
        <label>Address:</label>
        </div>
        <div class="col-md-7">
         {{$data[0]->address}}
        </div>
        </div>


          <div class="form-group col-md-6">
          <div class="col-md-5">
          <label>Pincode:</label>
          </div>
          <div class="col-md-7">
           {{$data[0]->pincode}}
          </div>
          </div>

           <div class="form-group col-md-6">
          <div class="col-md-5">
          <label>City:</label>
          </div>
          <div class="col-md-7">
           {{$data[0]->city}}
          </div>
          </div>


           <div class="form-group col-md-6">
           <div class="col-md-5">
           <label>Followup date:</label>
           </div>
           <div class="col-md-7">
           <input type="date" class="text-primary form-control" name="fodate" id="fodate">
           </div>
           </div>


           <div class="form-group col-md-6">
           <div class="col-md-5">
           <label>called date:</label>
           </div>
           <div class="col-md-7">
           <input type="date" class="text-primary form-control" name="codate" id="codate">
           </div>
           </div> 

   

           <div class="form-group col-md-6">
           <div class="form-group">
           <div class="col-md-5">
           <label>Disposition :</label>
           </div>
           <div class="col-md-7">
      <select name="hddlcity" id="hddlcity" class="selectpicker select-opt form-control" required="">
          <option value="0">Disposition</option>
           @foreach($crmstatus as $val)
          <option value="{{$val->id}}">{{$val->disposition}}</option>
          @endforeach
          </select>
          </div>
          </div>   
          </div>

         <div class="form-group col-md-6">
         <div class="form-group">
         <div class="col-md-5">
         <label>Subdisposition :</label>
         </div>
         <div class="col-md-7">
     <select name="subdispo" id="subdispo" class="selectpicker select-opt form-control" required="">
         <option value="0">Subdisposition</option>
         @foreach($crmstatus as $val)
         <option value="{{$val->id}}">{{$val->disposition}}</option>
         @endforeach
         </select>
         </div>
         </div>
         </div>

         <div class="form-group col-md-6">
         <div class="col-md-5">
         <label>Remark:</label>
         </div>
         <div class="col-md-7">
         <textarea type="text" class="text-primary form-control" name="srmrk" id="srmrk"></textarea>
         <!-- {{$data[0]->remark}} -->
         </div>
         </div> 
        
    
        <div class="form-group col-md-12">
        <div class="col-md-4">
        <input type="submit" name="statussub" id="statussub" value="submit" class="btn btn-success">
        </div>
        </div>
                 </thead>
                    <tbody>
                   <tr>
                  <tbody>
                </tbody>
              </tbody>
            </table>
           </div>
          </div>
        </div>
      </div>
 </div>
@endsection


   <!-- <script type="text/javascript">
     
  $(document).ready(function(){
    alert('test');
      $('#statussub').onclick(function () {
      alert('test');
  if ($('#formregistration').valid()){
   $.ajax({ 
   url: "{{URL::to('insertcrm')}}",
   method:"POST",
   data: $('#formregistration').serialize(),
   success: function(msg)  
   {
    
   }

});
 }

});

      });


  
    </script>

 -->





