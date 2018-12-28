@extends('include.master')
@section('content')
 <div class="container-fluid white-bg">
       <div class="col-md-12"><h3 class="mrg-btm">Today's Birthday</h3></div>
<div class="col-md-12">
			 <div class="overflow-scroll">
			 <div class="table-responsive" >
				<table id="Birthday-mail" class="table table-bordered table-striped tbl" >
                 <thead>
                  <tr>
                   <th>FBA ID</th>
                   <th>Name</th>
                   <th>DOB</th>
                   <th>Email ID</th>
                  
                 </tr>
                </thead>
                <tbody>
   @isset($todays_bday_result)
        @foreach($todays_bday_result as $val)   
	   <td><?php echo $val->FBAID; ?></td> 
       <td><?php echo $val->FullName; ?></td>
       <td><?php echo $val->DOB; ?></td>
       <td><?php echo $val->EmailID; ?></td>
       </tr>
       @endforeach
           @endisset
                 
                    </tbody>
                 </table>
	           </div>
	        </div>
	     </div>
      </div>


@endsection