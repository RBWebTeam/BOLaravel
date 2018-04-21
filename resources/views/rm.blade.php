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
                         <th>Motor Search</th>
                          <th>Motor Sale</th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach($fbamaster as $val)
                       <tr>
                      <td>{{$val->FBAID}}</td>
                      <td>{{$val->FullName}}</td>

                      <td> <a href="{{url('report-followup-history')}}?product_type=MOI&ms_type=Search&p_rm_id=0&p_fba_id={{$val->FBAID}}"  >{{$val->MotorSearch}}</a> </td>
                      <td> <a href="{{url('report-followup-history')}}?product_type=MOI&ms_type=Sale&p_rm_id=0&p_fba_id={{$val->FBAID}}"  >{{$val->MotorSale}}</a> </td>
                        </tr>
                      @endforeach
                  </tbody>
           
            </table>
      </div>
      </div>
      </div>
      </div>

 
  

@endsection


 