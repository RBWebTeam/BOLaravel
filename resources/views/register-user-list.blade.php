@extends('include.master')
@section('content')



       <div class="container-fluid white-bg">
       <div class="col-md-12"><h3 class="mrg-btm">Register-User List</h3></div>
       
     
 

<p > <a href="{{url('register-user')}}" class="btn btn-success">   Register-User </a></p>
 
       <div class="col-md-12">
       <div class="overflow-scroll">
       <div class="table-responsive" >

      <table class="datatable-responsive table table-striped table-bordered dt-responsive nowrap" id="example1">
                                    <thead>
                                       <tr>
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
                                      </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($query as $vl)
                                      <tr>
                                      <td>{{$vl->UserName}}</td>
                                       <td>{{$vl->email}}</td>
                                         <td>{{$vl->mobile}}</td>
                                           <td>{{$vl->companyid}}</td>
                                             <td>{{$vl->reportingid}}</td>
                                               <td>{{$vl->state_name}}</td>
                                                 <td>{{$vl->CityName}}</td>
                                                 <td>{{$vl->username}}</td>
                                                 <td>{{$vl->uid}}</td>
                                                 <td>{{$vl->password}}</td>
                                       
                                      </tr>
                                    @endforeach
                                  </tbody>
           
            </table>
      </div>
      </div>
      </div>
      </div>

 
 



@endsection




 