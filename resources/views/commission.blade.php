@extends('include.master')
 @section('content')
       <div class="container-fluid white-bg">
       <div class="col-md-12"><h3 class="mrg-btm">Commission</h3></div>
        <div class="col-md-12">
			 <div class="overflow-scroll">
			 <div class="table-responsive" >
				<table id="Commissiontbl" class="table table-bordered table-striped tbl" > 
           
        <div class="form-group col-md-6">
        <div class="col-md-5">
        </div>
         <div class="col-md-7">
        <select name="cproduct" id="cproduct" class="text-primary form-control" required>
          <option>--Select-Product--</option>
          @foreach($cmproduct as $val)
               <option value="{{$val->product}}">{{$val->product}}</option>
             @endforeach
        </select>
          </div>
         </div>
          </table> 



   <div class="col-md-4">
       <div class="overflow-scroll">
       <div class="table-responsive">
       <h3 class="mrg-btm">New Business </h3></div>
       <table id="fbatopospcreation" class="table table-bordered table-striped tbl" >
                <thead>
                  <tr>
                  <th>Online</th> 
                  <th>Offline</th> 
                 </tr>
                </thead>
                
                <tbody>
      </tbody>
      </table>
       </div>
      </div>

    
                 
    
  
			</div>
			</div>
			</div>
      </div>


 @endsection