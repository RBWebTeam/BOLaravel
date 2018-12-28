@extends('include.master')
 @section('content')
       <div class="container-fluid white-bg">
       <div class="col-md-12"><h3 class="mrg-btm">Posp Certification</h3></div>
<div class="col-md-12">                            
       <div class="overflow-scroll">                 
       <div class="table-responsive" >


  <form name="myform">


   <select id="msds-select" class="form-control" style="width:15%;margin: 10px;
    margin-left: 527px;margin-top: 0px;display: -webkit-inline-box;" name="one" onchange="selectIndex(this)">
      <option value="-1" selected="selected">Search By</option>
      <option value="0"></option>
      <option value="1">POSP Yes</option>
      <option value="2">POSP No</option>
      <option value="FBAID">FBA ID</option>
<!--       <option value="POSPNO">POSP Number</option>
 -->      <option value="state">FBA STATE</option>
      <option value="zone">FBA ZONE</option>
      <option value="fbaname">FBA NAME</option>
      <option value="fbacity">FBA City</option>
      <option value="pospname">POSP Name</option>
   </select>

<input type="text" class="form-control" id="txtfbasearch"  name="txtfbasearch" placeholder="Search" onkeyup="searchdata()" style="display:none; display:margin-top:2px; width:14%;margin-right: 350px;float:right;"/>
  </form>





 <table id="Certificationtbl" class="table table-bordered table-striped tbl" >
                                  <thead>
                                      <tr>
                                        <th>FBA ID</th> 
                                        <th>Full Name</th>
                                        <th>Created Date</th>
                                        <th>Posp Creation Date</th>
                                        <th>Posp Certification Date</th>
                                        <th>City</th>
                                        <th>Pincode</th>
                                        <th>State</th> 
                                        <th>Zone</th>     
                                        <th>Posp Name</th> 
                                        <th>App Source</th> 
                                     </tr>

                 
                </thead>
                <tbody>
                    @isset($rcreationdate)
                @foreach($rcreationdate as $val)     

              <td><?php echo $val->fbaid; ?></td> 
          <td><?php echo $val->FullName; ?></td>   
          <td><?php echo $val->createdate; ?></td>
          <td><?php echo $val->pospcreationdate; ?></td>
          <td><?php echo $val->pospcertificationdate; ?></td>  
          <td><?php echo $val->City; ?></td> 
          <td><?php echo $val->Pincode; ?></td> 
          <td><?php echo $val->statename; ?></td> 
          <td><?php echo $val->Zone; ?></td>   
          <td><?php echo $val->pospname; ?></td>
          <td><?php echo $val->AppSource; ?></td>   
     </tr>
       @endforeach
       @endisset

  

     </tbody>
     </table>
  </div>
  </div>
  </div>
      </div>


<script type="text/javascript">

$(document).ready(function(){
   $("#Certificationtbl").DataTable();

 //alert("test data");
    var fdate = $('#min').val();
    var ldate = $('#max').val();
$.ajax({ 
     url: 'posp-certification-date/'+fdate+'/'+ldate,
     dataType : 'json',
     method:"GET",
     success: function(msg){
         
  
 }
   });  
  
    });  
  
</script>

<script type="text/javascript">
  
 $(document).ready(function(){
    $(".fbsearch").on("keyup change",function(){ 
         table1 = $('#Certificationtbl').DataTable();
         //table1.columns(0).search( this.value).draw();
         if ($(this).val()!= '') {
        table1.columns(0).search('^'+$(this).val() + '$', true, true).draw(); 
      }
      else
        table1.columns(0).search($(this).val(), true, true).draw(); 
    });
});


</script>





<script type="text/javascript">
  function searchdata()
{
  var index = $('#msds-select').val();
  if(index=='fbacity')
  {
    colsearch(5);
  }
  else if(index == 'FBAID')
  {
    colsearch(0);
  }
  else if(index == 'POSPNO')
  {
    colsearch(11);
  }else if(index=='state'){colsearch(7);}
  else if(index == 'zone'){colsearch(8);}
  else if(index == 'fbaname'){colsearch(1);}
  else if(index == 'pospname'){colsearch(9);}
}
function colsearch(index)
{
  table1 = $('#Certificationtbl').DataTable();
    if ($('#txtfbasearch').val()!= '') {
    table1.columns(index).search('^'+ $('#txtfbasearch').val() + '$', true, true).draw(); 
 }
    else
    table1.columns(index).search($('#txtfbasearch').val(), true, true).draw(); 
}

function selectIndex(dd) {

  
  if (dd.selectedIndex>=4){
     dd.form['txtfbasearch'].style.display='block';
  }else{
    dd.form['txtfbasearch'].style.display='none';
  }  
var table = $('#Certificationtbl').DataTable(); 
  table.draw();
}



</script>

<script> 

$('#msds-select').change(function () {

if($('#txtfbasearch').val()==''){
      var table = $('#Certificationtbl').DataTable(); 
   $.fn.dataTable.ext.search.push(
    function( settings, data, dataIndex ) {
        var msdsSearch = $( "#msds-select option:selected" ).val();
        var msdsValue = data[11]|| 0;
       //console.log(data);
        var numbers = /^[0-9]+$/;
        return fncalc(msdsSearch,msdsValue);
}); 
      
    table.draw();
  }
  else{
    var table1 = $('#Certificationtbl').DataTable(); 
    $('#txtfbasearch').val('');
    table1.columns(0).search($('#txtfbasearch').val(), true, true).draw(); 
  }

});




  </script>



@endsection