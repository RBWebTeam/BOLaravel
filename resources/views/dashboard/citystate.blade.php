@extends('include.master')
@section('content')


<style type="text/css">
  
  .hide {
  display:  none;
}
</style>


             <div class="container-fluid white-bg">
             <div class="col-md-12"><h3 class="mrg-btm">FBA List</h3>
           <hr>
           </div>

      <div class="col-md-2">
      <div class="form-group">

         <p>From Date</p>
         <div id="datepicker" class="input-group date" data-date-format="mm-dd-yyyy">
               <input class="form-control date-range-filter" type="text" placeholder="From Date" name="fdate" id="min"/>
              <span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
            </div>
            </div>
           </div>
       <div class="col-md-2">
       <div class="form-group">
       <p>To Date</p>
       <div id="datepicker1" class="input-group date" data-date-format="mm-dd-yyyy">
               <input class="form-control date-range-filter" type="text" placeholder="To Date"  name="todate"  id="max"/>
              <span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
              </div>
              </div>
            </div>
           
       <div class="col-md-4">

       <div class="form-group"> <input type="submit" name="btndate" id="btndate"  class="mrg-top common-btn pull-left" value="SHOW">  
     &nbsp;&nbsp;

<!--    <select  id="msds-select" class="pull-left mrg-top mrg-left">
   <option value="0">Posp Type</option>
  <option value="1">POSP Yes</option>
  <option value="2">POSP No</option>

  </select> -->
   &nbsp;&nbsp;&nbsp;
  <form name="myform">
  <select id="msds-select" class="form-control" style="width:55%;margin:10px;margin-top:4px;display: -webkit-inline-box;"  name="one" onchange="if (this.selectedIndex==4){this.form['fbsearch'].style.display='block',this.form['psearch'].style.display='none'}else {this.form['psearch'].style.display='block',this.form['fbsearch'].style.display='none'};">
   <option id="msds-select"  value="0" selected="selected">Search By</option>
   <option value="0">All</option>
   <option value="1">POSP Yes</option>
   <option value="2">POSP No</option>
   <option value="FBAID">FBA ID</option>
   <option value="POSPNO">POSP Number</option>

   </select>
   <input type="Number" class="fbsearch hide" id="fbsearch" name="fbsearch" placeholder="Search FBA ID" style="display:none;margin-left: 96px;"/>
   <input type="Number" class="psearch hide" id="psearch" name="psearch" placeholder="Search POSP" style="display:none; margin-left: 96px;" />

  </form>
  </div> 
  </div>


  <!-- Date End -->

             <div class="col-md-12">
             <div class="overflow-scroll">
             <div class="table-responsive" >
             <table class="datatable-responsive table table-striped table-bordered nowrap" id="fba-list-table">
                                       <thead>
                                       <tr>
                                       <th>FBA ID</th> 
                                       <th>Full Name</th> 
                                       <th>Created Date</th>
                                       <th>Mobile No</th>                                   
                                       <th>Email ID</th>
                                       <th>Payment Link</th>
                                       <th>Password</th>
                                       <th>City</th>
                                       <th>State</th>
                                       <th>Zone</th>
                                       <th>Pincode</th>
                                       <th>POSP No</th>
                                       <th>Loan ID</th> 
                                       <th>Posp Name</th> 
                                       <th>Bank Account</th>
                                       <th>Partner Info</th> 
                                       <th>Sales code</th>
                                       <th>FSM Details</th>  
                                       <th>Documents</th> 
                                       <th>Customer ID</th>
                                       <th>Created Date1</th>
                                       </tr>
                                       </thead>
                                       </table>
                           </div>
                        </div>
                      </div>
                  
                    <div class="col-md-4 col-xs-12">
        <div class="form-group">
        <select name="State"  id="txtmapstate" class="selectpicker select-opt form-control">
        <option selected="selected" value="0">--Select State--</option>
        @foreach($state as $val)
        <option value="{{$val->state_id}}">{{$val->state_name}}</option>
        @endforeach
        </select>
        </div>
        </div>




         <div class="col-md-4 col-xs-12">
        <div class="form-group">
        <select name="city" id="txtmapcity" class="selectpicker select-opt form-control">
           <option>--Select City--</option>
             <!-- <option>Mumbai</option> -->
        </select>
        </div>
        </div>

    @endsection



   <script type="text/javascript">
      $(document).ready(function(){

    $('#txtmapstate').on('change', function() {
            var state_id = $(this).val();
            if(state_id) {
                $.ajax({
                    url: 'Fsm-Register/'+state_id,
                    type: "GET",
                    dataType: "json",
                    success:function(data) {
                        $('#txtmapcity').empty();
                        $('#txtmapcity').append('<option value="">Select City</option>');

                        $.each(data, function(key, value) {

                            $('#txtmapcity').append('<option value="'+ key +'">'+ value +'</option>');
                        });
                     }
                });
            }else{
                $('select[name="city"]').empty();
            }
        });

   </script>