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

                      <td> <a href="{{url('Regional-Manager-search')}}?product_type=Search&ms_type=MOI&p_rm_id=0&p_fba_id={{$val->FBAID}}"  >{{$val->MotorSearch}}</a> </td>
                      <td> <a href="{{url('Regional-Manager-search')}}?product_type=Sale&ms_type=MOI&p_rm_id=0&p_fba_id={{$val->FBAID}}""  >{{$val->MotorSale}}</a> </td>
                        </tr>
                      @endforeach
                  </tbody>
           
            </table>
      </div>
      </div>
      </div>
      </div>

 
  

@endsection




  <script type="text/javascript">
     function function_moter(fba_id,Motor_id,Motor_type){ alert("fgd");
            ms_type='';
            product_type='';
            if(Motor_type==1){
              ms_type='Search';
              product_type='MOI';
            }else{
              ms_type='Sale';
              product_type='MOI';
            }

        post_d={'product_type':product_type,
                'ms_type ':ms_type,
                'p_rm_id':0,
                'p_fba_id':fba_id,
                '_token':'{{csrf_token()}}'
                };

        $.post("{{url('Regional-Manager-search')}}",post_d).done(function(data){ 
              
         }).fail(function(xhr, status, error) {
                  console.log(error);
     });


     }

   </script>