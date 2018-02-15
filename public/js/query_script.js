 




 $(document).ready(function(){
 
var full_url = document.URL; // Get current url
var url_array = full_url.split('/') // Split the string into an array with / as separator
var last_segment = url_array[url_array.length-1];  // Get the last part of the array (-1)
last_segment.split("?")[1]
var urld=full_url.split('?')[0];
  
 
 
if(last_segment.split("=")[1]==1){
	$('tr.thead_cl').append('<th>FBAID</th><th>FBAName</th><th>Mobile</th><th>Email</th><th>City</th><th>HEALTH</th><th>MOTOR</th><th>HOME_LOAN</th><th>PL</th><th>TWO_WHEELER</th>');
    $( "#export_id" ).append( "<p><a href='"+urld+"?export=1'>Export</a></p>" );
   
}else if(last_segment.split("=")[1]==2){
	$('tr.thead_cl').append('<th>FBAID</th><th>FBAName</th><th>Mobile</th><th>Email</th><th>City</th><th>HEALTH</th><th>MOTOR</th><th>HOME_LOAN</th><th>PL</th><th>TWO_WHEELER</th>');
    $( "#export_id" ).append( "<p><a href='"+urld+"?export=2'>Export</a></p>" );
   
}else if(last_segment.split("=")[1]==3){
	$('tr.thead_cl').append('<th>FBAID</th><th>FBAName</th><th>Mobile</th><th>Email</th> <th>HEALTH</th><th>MOTOR</th>  <th>TWO_WHEELER</th>');
    $( "#export_id" ).append( "<p><a href='"+urld+"?export=3'>Export</a></p>" );
   
}else if(last_segment.split("=")[1]==4){
	$('tr.thead_cl').append('<th>FBAID</th><th>FBAName</th><th>Mobile</th><th>Email</th><th>Created_Date</th>');
    $( "#export_id" ).append( "<p><a href='"+urld+"?export=4'>Export</a></p>" );
   
}else if(last_segment.split("=")[1]==5){
	$('tr.thead_cl').append('<th>FBAID</th><th>FBAName</th><th>Mobile</th><th>Email</th> <th>HEALTH</th><th>MOTOR</th> <th>TWO_WHEELER</th>');
    $( "#export_id" ).append( "<p><a href='"+urld+"?export=5'>Export</a></p>" );
   
}else if(last_segment.split("=")[1]==6){
	$('tr.thead_cl').append('<th>FBAID</th><th>FBAName</th><th>Mobile</th><th>Email</th><th>Created_Date</th><th>PospName</th>');
    $( "#export_id" ).append( "<p><a href='"+urld+"?export=6'>Export</a></p>" );
   
}else if(last_segment.split("=")[1]==7){
	 $('tr.thead_cl').append('<th>FBAID</th><th>FBAName</th><th>Mobile</th><th>Email</th><th>Created_Date</th><th>PospName</th>');
     $( "#export_id" ).append( "<p><a href='"+urld+"?export=7'>Export</a></p>" );
   
}else if(last_segment.split("=")[1]==8){
	$('tr.thead_cl').append('<th>FBAID</th><th>FBAName</th><th>Mobile</th><th>Email</th> <th>HEALTH</th><th>MOTOR</th><th>HOME_LOAN</th> <th>TWO_WHEELER</th>');
    $( "#export_id" ).append( "<p><a href='"+urld+"?export=8'>Export</a></p>" );
   
}

});