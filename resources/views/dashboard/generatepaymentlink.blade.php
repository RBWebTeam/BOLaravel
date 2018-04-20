@extends('include.master')
@section('content')


 <div id="content" style="overflow:scroll;">
			 <div class="container-fluid white-bg">
			 <div class="col-md-12"><h3 class="mrg-btm">Generate Payment Link</h3></div>
			 
			<div class="col-md-12">
			 <div class="overflow-scroll">
			 <div class="table-responsive" >
				<table class="table table-bordered table-striped tbl" id="example" >
                 <thead>
                  <tr>
                   <th>FBA Id</th>
                   <th>Name</th>
                    <th>Payment Link</th>
                  </tr>
                </thead>
                <tbody>
                
                @foreach($plink as $val)   
                <td><?php echo $val->FBAID; ?></td> 
                <td><?php echo $val->FullName; ?></td>
                <td>
             <button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#myModal" id="paysub"  onclick="getpaylink('{{ $val->FBAID }}','{{ $val->MobiNumb1}}')">Generate  Payment Link</button>
             </td>
                
             </tr>
                @endforeach
				</tbody>
           		</table>
				</div>
				</div>
			
			
			<!-- Pagination Start -->
		<!-- 	<div>
			<h5 class="pull-left"><b>Records :</b> <span>1 to 10 </span>Of <span class="badge">186</span><h5>
			<ul class="pagination pull-right">
              <li><a href="#">1</a></li>
              <li><a href="#">2</a></li>
              <li><a href="#">3</a></li>
              <li><a href="#">4</a></li>
              <li><a href="#">5</a></li>
            </ul>
			</div> -->
			<!-- Pagination End -->
			</div>
            </div>
            </div>
		   </div>

<!-- Modal -->
  <div class="modal fade" id="myModal" role="dialog">
  <form method="POST" id="modelpaylink">
  {{ csrf_field() }}
    <div class="modal-dialog">
    <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Generate Payment Link</h4>
       </div>
        <!-- <div id="divlink" class="modal-body"> -->
<textarea type="text" rows="6"  id="divlink" class="divlink form-control" class="field left" readonly>
  </textarea>  
  <!--       </div> -->
        <div class="modal-footer">
         <input type="hidden" name="txtlink" id="txtlink">
         <input type="hidden" name="txtmono" id="txtmono">
       
        <a type="button" class="btn btn-success" data-dismiss="modal" onclick="sendpaymentsms()">Send SMS</a>
         <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
    </form>
  </div>
 </div>


<script>
           function getpaylink(FBAID,MobiNumb){
          //alert(MobiNumb);
           // alert(data);
           $('#txtmono').val(MobiNumb);
           $('#divlink').html("");
           $('#txtlink').val("");
            $.ajax({
                 url: 'getpaylink/'+FBAID,
                 type: "GET",                  
                success:function(data) {

                var json = JSON.parse(data);

			if(json.StatusNo==0){
				$('#divlink').html(json.MasterData.PaymentURL);
				$('#txtlink').val(json.MasterData.PaymentURL);
			}
          }

        });
      }

      function sendpaymentsms(){
      	alert("SMS send successfully..");
      	$.ajax({ 
        url: "{{URL::to('generatepaymentlink')}}",
        method:"POST",
        data: $('#modelpaylink').serialize(),
        success: function(msg)  
         {
          console.log(msg);

         }
});
      }
</script>


  @endsection