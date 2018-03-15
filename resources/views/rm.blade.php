@extends('include.master')
@section('content')



       <div class="container-fluid white-bg">
       <div class="col-md-12"><h3 class="mrg-btm">Regional-Manager</h3></div>
       
     
 
 
       <div class="col-md-12">
       <div class="overflow-scroll">
       <div class="table-responsive" >
      <table class="datatable-responsive table table-striped table-bordered dt-responsive nowrap" id="example">
                                    <thead>
                                       <tr>
                                       <th>FBA ID</th>
                                      <th>Name</th>
                                         <th>MobiNumb1</th>
                                      </tr>
                                    </thead>
                                    <tbody>
                                    
                                     
                                      @foreach($fbamaster as $val)
                                       <tr>
                                      <td>{{$val->FBAID}}</td>
                                      <td>{{$val->FullName}}</td>
                                       <td>{{$val->MobiNumb1}}</td>
                                       </tr>
                                      @endforeach
                                     
                                   
                                  </tbody>
           
            </table>
      </div>
      </div>
      </div>
      </div>

 
   

@endsection




 