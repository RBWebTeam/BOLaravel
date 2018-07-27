@extends('include.master')
@section('content')



       <div class="container-fluid white-bg">
       <div class="col-md-12"><h3 class="mrg-btm">Register-User List</h3></div>
       
     
 

<div class="col-md-12"><p > <a href="{{url('register-user')}}" class="btn btn-info mrg-btm">   Register-User </a></p></div>
 
       <div class="col-md-12">
       <div class="overflow-scroll">
       <div class="table-responsive" >

      <table class="datatable-responsive table table-striped table-bordered dt-responsive nowrap" id="users-list-table">
                                    <thead>
                                       <tr>
                                       <th>ID</th>
                                       <th>UserName</th>
                                      
                                       <th>Email</th>
                                        <th>Mobile</th>
                                         <th>Company Name</th>
                                          <th>Reporting Name</th>
                                          <th>state</th>
                                          <th>City </th>
                                          <th>User Type </th>
                                          <th>UID</th>
                                           <th>Password</th>
                                           <th>Edit</th>
                                      </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($query as $vl)
                                      <tr>
                                        <td>{{$vl->FBAUserId}}</td>
                                      <td>{{$vl->UserName}}</td>
                                       <td>{{$vl->email}}</td>
                                         <td>{{$vl->mobile}}</td>

                                           <td>
                                            @if($vl->companyid==1)
                                               RupeeBoss
                                            @elseif($vl->companyid==2) 
                                            Datacom 
                                            @elseif($vl->companyid==3) 
                                                PolicyBoss
                                            @elseif($vl->companyid==4) 
                                            LandMark   
                                            @else
                                            @endif
                                           </td>
                                             <td>
                                             @if($vl->reportingid==1)
                                               RupeeBoss
                                            @elseif($vl->reportingid==2) 
                                            Datacom 
                                            @elseif($vl->reportingid==3) 
                                                PolicyBoss
                                            @elseif($vl->reportingid==4) 
                                            LandMark   
                                            @else
                                            @endif
                                            </td>


                                               <td>{{$vl->state_name}}</td>
                                                 <td>{{$vl->CityName}}</td>
                                                 <td>{{$vl->username}}</td>
                                                 <td>{{$vl->uid}}</td>
                                                 <td>{{$vl->password}}</td>

                                                 <td><a href="{{url('register-update')}}/{{$vl->FBAUserId}}">Edit</a> </td>
                                       
                                      </tr>
                                    @endforeach
                                  </tbody>
           
            </table>
      </div>
      </div>
      </div>
      </div>

 
 <script type="text/javascript">
   
     $(document).ready(function() {
    $('#users-list-table').DataTable( {
     paging: true,
     "order": [[ 0, "desc" ]]
});

} );



 </script>



@endsection




 