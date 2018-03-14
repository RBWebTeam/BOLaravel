<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
body {font-family: Arial, Helvetica, sans-serif;}

/* The Modal (background) */
.modal {
    display: none; /* Hidden by default */
    position: fixed; /* Stay in place */
    z-index: 1; /* Sit on top */
    padding-top: 100px; /* Location of the box */
    left: 0;
    top: 0;
    width: 100%; /* Full width */
    height: 100%; /* Full height */
    overflow: auto; /* Enable scroll if needed */
    background-color: rgb(0,0,0); /* Fallback color */
    background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
}

/* Modal Content */
.modal-content {
    background-color: #fefefe;
    margin: auto;
    padding: 20px;
    border: 1px solid #888;
    width: 80%;
}

/* The Close Button */
.close {
    color: #aaaaaa;
    float: right;
    font-size: 28px;
    font-weight: bold;
}

.close:hover,
.close:focus {
    color: #000;
    text-decoration: none;
    cursor: pointer;
}
</style>
</head>
<body>

<h2>Document Popup</h2>

<!-- Trigger/Open The Modal -->
<p id="doctype">Documents</p>

<!-- The Modal -->
<div id="myModal" class="modal">

  <!-- Modal content -->
  <div class="modal-content">
    <span class="close">&times;</span>


  <!-- 
             @foreach($doctype as $val)
              <button id="doctype" name="doctype">Doctype</button>
              <button id="myBtn">Adhar</button>
              <button id="myBtn">Payment</button>

           @endforeach -->
            <div class="form-group">
            <label class="control-label" for="Document-Type">Document Type: </label>
            <select class="form-control">
              <option selected="selected">select Document Type</option>
              @foreach($doctype as $val)
             <option value="{{$val->id}}">{{$val->name}}</option>
              @endforeach
            </select>
          </div>
          <div><img href="http://www.rupeeboss.com/images/logo.png">
         </img>
        </div>
      </div>





<script>
// Get the modal
var modal = document.getElementById('myModal');

// Get the button that opens the modal
var btn = document.getElementById("doctype");

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];

// When the user clicks the button, open the modal 
btn.onclick = function() {
    modal.style.display = "block";
}

// When the user clicks on <span> (x), close the modal
span.onclick = function() {
    modal.style.display = "none";
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
}


function uploaddoc(id){
                $('#docfbaid').val(id);
                $('.fbadoc').modal('show');
     }

$('#btnupload').click(function(event){
event.preventDefault();
var form = $('#fbadocupload')[0];

var data = new FormData(form);

/*for (var value of data.values()) {
   console.log(value); 
}
alert(JSON.stringify(data));*/

  if($("#ddldoctype").val()!==0  && $("#document").val()!=="") {
  /* console.log($('#fbadocupload').serialize());*/
   $.ajax({ 

   url: "{{URL::to('fba-listdocument')}}",
   method:"POST",
   enctype: 'multipart/form-data',
   processData: false,  // Important!
   contentType: false,
   data: data,
   success: function(msg)  
   {
    console.log(msg);
    alert('document uploaded successfully..');
    $('.fbadoc').modal('hide');
    
   }
});
 }
 else{
  alert('All field are requried');
  $( "#ddldoctype" ).focus();
  $( "#document" ).focus();
 }
});

</script>
</body>
</html>
