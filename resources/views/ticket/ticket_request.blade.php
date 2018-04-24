@extends('include.master')
@section('content')
<div class="container-fluid white-bg">
 <div class="col-md-12" id="Ticket-app"><h3 class="mrg-btm">Ticket Request</h3></div>


<div class="col-md-12"><p >  
       <div class="col-md-12">
       <div class="overflow-scroll">
       <div class="table-responsive" >
      <table class="datatable-responsive table table-striped table-bordered dt-responsive nowrap" id="example">
                                    <thead>
                                       <tr>
                                       <th>ID</th>
                                       <th>CateName</th>
                                       <th>QuerType</th>
                                       <th>Description</th>
                                       <th>DocPath</th>
                                       <th>Message</th>
                                       <th>Status</th>
                                       <th>StatusChangedBy</th>
                                       <th>Assign</th>
                                       <th>comment</th>
                                         
                                      </tr>
                                    </thead>
                                    <tbody>

                                     @foreach($query as $va)
                                     <tr>
                                     <td><a href="#" onclick="TicketRequest_fn('{{$va->TicketRequestId}}','{{$va->toemailid}}','{{$va->ccemailid}}')" >{{$va->TicketRequestId}}</a></td>
                                      <td>{{$va->CateName}}</td>
                                       <td>{{$va->QuerType}}</td>
                                        <td>{{$va->Description}}</td>
                                         <td >{{$va->DocPath}}</td>
                                          <td>{{$va->Message}}</td>
                                           <td>{{$va->Status}}</td>
                                            <td>{{$va->StatusChangedBy}}</td>
                                            <td>{{$va->user_fba_id!=null?$va->UserName:''}}</td>
                                             <td  > <a href="#" onclick="view_comment_fn('{{$va->TicketRequestId}}')">View</a></td>
                                     </tr>
                                     @endforeach
                                    
                                  </tbody>
           
            </table>
      </div>
      </div>
      </div>
      </div>




 <div class="modal fade" id="Ticket-Request-Id-Modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">User</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <form class="form-horizontal" method="post"  id="TicketRequest_Id_from" > {{ csrf_field() }}
    
        <input type="hidden" name="TicketRequestId" id="TicketRequest_Id" >
   <div class="form-group">
            <label for="inputEmail" class="control-label col-xs-2"> Select</label>
            <div class="col-xs-10">
           
             <select name="FBAUserId"  class="form-control"  id="FBAUserId">
               <option value="0">select</option>
               @foreach($users as $v)
                <option value="{{$v->FBAUserId}}">{{$v->UserName}}</option>
               @endforeach
             </select>
            </div>
  </div> 

<!--  <div class="form-group">
            <label for="inputEmail" class="control-label col-xs-2"> TO mail</label>
            <div class="col-xs-10">
         <input type="text" name="toemailid"  class="form-control"  id="toemailid">  
           </div>
 </div>

  <div class="form-group">
            <label for="inputEmail" class="control-label col-xs-2"> CC mail</label>
            <div class="col-xs-10">
                    <input type="text" name="ccemailid"  class="form-control"  id="ccemailid">  
           </div>
 </div> -->


<div class="form-group">
            <label for="example_emailSUI" class="control-label col-xs-2"> CC mail</label>
            <div class="col-xs-10">
                     <input type='text' id='example_emailSUI' name='example_emailSUI' class='form-control example_emailSUI'     >
           </div>
 </div>


         




 <a href="#" id="addScnt">Add</a>

 
<div class="form-group">

<div id="pp_scents"></div>
<div id="p_scents"></div>
</div>
        
      </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" id="TicketRequest_Id_save">Save changes</button>
      </div>
    </div>
  </div>
</div>



 <div class="modal fade" id="Ticket-comment-Id-Modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Comment</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
       <table class="datatable-responsive table table-striped table-bordered dt-responsive nowrap" id="example">
      <thead><tr><th>Comment</th></tr></thead>
      <tbody id="get_comment_id"></tbody>
      </table>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" id="TicketRequest_Id_save">Save changes</button>
      </div>
    </div>
  </div>
</div>


<link type="text/css" rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/1.12.2/semantic.min.css" />
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/1.12.2/semantic.min.js"></script>
      <script type="text/javascript">



      	function TicketRequest_fn(ID,toemailid,ccemailid){  
          $('#pp_scents').empty();
          
   
       
           //   $('#example_emailSUI').val('["dp@gmail.com"]');
      
         $('#current_emailsSUI').text('["dp@gmail.com"]');
 
               


            // if( toemailid!=null && ccemailid!=null ){
                //  $('#pp_scents').append('<div class="form-group"><label for="inputEmail" class="control-label col-xs-2"> TO mail</label><div class="col-xs-10"><input type="text" name="toemailid"  class="form-control" value="'+toemailid+'"  id="toemailid"></div></div>');
                
                // $('#pp_scents').append('<div class="form-group"><label for="inputEmail" class="control-label col-xs-2"> CC mail</label><div class="col-xs-10"><input type="text" name="ccemailid[]"  value="'+ccemailid+'"  class="form-control"  id="ccemailid"></div></div>');



             // }else{
             //   $('#pp_scents').append('<div class="form-group"><label for="inputEmail" class="control-label col-xs-2"> TO mail</label><div class="col-xs-10"><input type="text" name="toemailid"  class="form-control" value="'+toemailid+'"  id="toemailid"></div></div>');
                
             // } 


          
              $('#TicketRequest_Id').val(ID);
              // $('#toemailid').val(toemailid);
              // $('#ccemailid').val(ccemailid);
      		    $('#Ticket-Request-Id-Modal').modal('show');}
   $(document).on('click','#TicketRequest_Id_save',function(e){  e.preventDefault();
         if($('#FBAUserId').val()!=0){
         $.post("{{url('ticket-request-save')}}",$('#TicketRequest_Id_from').serialize())
             .done(function(data){ 
             console.log(data);
                 if(data==0){
                     
                 window.location.href = "{{url('ticket-request')}}";
                 }else{
                  console.log("error");
                 }
          }).fail(function(xhr, status, error) {
                 console.log(error);
            });

        }else{
           alert("Select users");
        }

   })

 

 function view_comment_fn(ID){  
   $('#Ticket-comment-Id-Modal').modal('show');
   $.get("{{url('ticket-request')}}",{'TicketRequestId':ID})
             .done(function(data){
               arr=Array();
               $('#get_comment_id').empty();
              $.each(data, function(key, value) {
                   
                     arr.push('<tr><td>'+value.comment+'</td></tr>');
              }); 
              
              $('#get_comment_id').append(arr);
          }).fail(function(xhr, status, error) {
                 console.log(error);
            });

 }


 

 $(function() {
        var scntDiv = $('#p_scents');
        var i =  1;
        
        $('#addScnt').on('click', function() {   
           if( i<=3) {
                $('<p><label for="inputEmail" class="control-label col-xs-2"> CC mail</label> <input type="text" name="ccemailid[]"  class="form-control  " style="width: 495px;"  id="ccemailid">  <a href="#" id="remScnt" class="remScnt">Remove</a></p>').appendTo(scntDiv);
                i++;
              }
                return false;
        });
        
        $(document).on('click','.remScnt', function() {  
                if( i > 1 ) {
                        $(this).parents('p').remove();
                        i--;
                }
                return false;
        });
});




















(function( $ ){
 
  $.fn.multiple_emails = function(options) {
    
    // Default options
    var defaults = {
      checkDupEmail: true,
      theme: "Bootstrap",
      position: "top"
    };
    
    // Merge send options with defaults
    var settings = $.extend( {}, defaults, options );
    
    var deleteIconHTML = "";
    if (settings.theme.toLowerCase() == "Bootstrap".toLowerCase())
    {
      deleteIconHTML = '<a href="#" class="multiple_emails-close" title="Remove"><span class="glyphicon glyphicon-remove"></span></a>';
    }
    else if (settings.theme.toLowerCase() == "SemanticUI".toLowerCase() || settings.theme.toLowerCase() == "Semantic-UI".toLowerCase() || settings.theme.toLowerCase() == "Semantic UI".toLowerCase()) {
      deleteIconHTML = '<a href="#" class="multiple_emails-close" title="Remove"><i class="remove icon"></i></a>';
    }
    else if (settings.theme.toLowerCase() == "Basic".toLowerCase()) {
      //Default which you should use if you don't use Bootstrap, SemanticUI, or other CSS frameworks
      deleteIconHTML = '<a href="#" class="multiple_emails-close" title="Remove"><i class="basicdeleteicon">Remove</i></a>';
    }
    
    return this.each(function() {
      //$orig refers to the input HTML node
      var $orig = $(this);
      var $list = $('<ul class="multiple_emails-ul" />'); // create html elements - list of email addresses as unordered list

      if ($(this).val() != '' && IsJsonString($(this).val())) {
        $.each(jQuery.parseJSON($(this).val()), function( index, val ) {
          $list.append($('<li class="multiple_emails-email"><span class="email_name" data-email="' + val.toLowerCase() + '">' + val + '</span></li>')
            .prepend($(deleteIconHTML)
               .click(function(e) { $(this).parent().remove(); refresh_emails(); e.preventDefault(); })
            )
          );
        });
      }
      
      var $input = $('<input type="text" class="multiple_emails-input text-left" />').on('keyup', function(e) { // input
        $(this).removeClass('multiple_emails-error');
        var input_length = $(this).val().length;
        
        var keynum;
        if(window.event){ // IE         
          keynum = e.keyCode;
        }
        else if(e.which){ // Netscape/Firefox/Opera         
          keynum = e.which;
                }
        
        //if(event.which == 8 && input_length == 0) { $list.find('li').last().remove(); } //Removes last item on backspace with no input
        
        // Supported key press is tab, enter, space or comma, there is no support for semi-colon since the keyCode differs in various browsers
        if(keynum == 9 || keynum == 32 || keynum == 188) { 
          display_email($(this), settings.checkDupEmail);
        }
        else if (keynum == 13) {
          display_email($(this), settings.checkDupEmail);
          //Prevents enter key default
          //This is to prevent the form from submitting with  the submit button
          //when you press enter in the email textbox
          e.preventDefault();
        }

      }).on('blur', function(event){ 
        if ($(this).val() != '') { display_email($(this), settings.checkDupEmail); }
      });

      var $container = $('<div class="multiple_emails-container" />').click(function() { $input.focus(); } ); // container div
 
      // insert elements into DOM
      if (settings.position.toLowerCase() === "top")
        $container.append($list).append($input).insertAfter($(this));
      else
        $container.append($input).append($list).insertBefore($(this));

      /*
      t is the text input device.
      Value of the input could be a long line of copy-pasted emails, not just a single email.
      As such, the string is tokenized, with each token validated individually.
      
      If the dupEmailCheck variable is set to true, scans for duplicate emails, and invalidates input if found.
      Otherwise allows emails to have duplicated values if false.
      */
      function display_email(t, dupEmailCheck) {
        
        //Remove space, comma and semi-colon from beginning and end of string
        //Does not remove inside the string as the email will need to be tokenized using space, comma and semi-colon
        var arr = t.val().trim().replace(/^,|,$/g , '').replace(/^;|;$/g , '');
        //Remove the double quote
        arr = arr.replace(/"/g,"");
        //Split the string into an array, with the space, comma, and semi-colon as the separator
        arr = arr.split(/[\s,;]+/);
        
        var errorEmails = new Array(); //New array to contain the errors
        
        var pattern = new RegExp(/^((([a-z]|\d|[!#\$%&'\*\+\-\/=\?\^_`{\|}~]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])+(\.([a-z]|\d|[!#\$%&'\*\+\-\/=\?\^_`{\|}~]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])+)*)|((\x22)((((\x20|\x09)*(\x0d\x0a))?(\x20|\x09)+)?(([\x01-\x08\x0b\x0c\x0e-\x1f\x7f]|\x21|[\x23-\x5b]|[\x5d-\x7e]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(\\([\x01-\x09\x0b\x0c\x0d-\x7f]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]))))*(((\x20|\x09)*(\x0d\x0a))?(\x20|\x09)+)?(\x22)))@((([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])*([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])))\.)+(([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])*([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])))\.?$/i);
        
        for (var i = 0; i < arr.length; i++) {
          //Check if the email is already added, only if dupEmailCheck is set to true
          if ( dupEmailCheck === true && $orig.val().indexOf(arr[i]) != -1 ) {
                if (arr[i] && arr[i].length > 0) {
              new function () {
                var existingElement = $list.find('.email_name[data-email=' + arr[i].toLowerCase().replace('.', '\\.').replace('@', '\\@') + ']');
                existingElement.css('font-weight', 'bold');
                setTimeout(function() { existingElement.css('font-weight', ''); }, 1500);
              }(); // Use a IIFE function to create a new scope so existingElement won't be overriden
            }
          }
          else if (pattern.test(arr[i]) == true) {  
            $list.append($('<li class="multiple_emails-email"><span class="email_name" data-email="' + arr[i].toLowerCase() + '">' + arr[i] + '</span></li>')
                .prepend($(deleteIconHTML)
                   .click(function(e) { $(this).parent().remove(); refresh_emails(); e.preventDefault(); })
                )
            );
          }
          else
            errorEmails.push(arr[i]);
        }
        // If erroneous emails found, or if duplicate email found
        if(errorEmails.length > 0)
          t.val(errorEmails.join("; ")).addClass('multiple_emails-error');
        else
          t.val("");
        refresh_emails ();
      }
      
      function refresh_emails () {
        var emails = new Array();
        var container = $orig.siblings('.multiple_emails-container');
        container.find('.multiple_emails-email span.email_name').each(function() { emails.push($(this).html()); });
        $orig.val(JSON.stringify(emails)).trigger('change');
      }
      
      function IsJsonString(str) {
        try { JSON.parse(str); }
        catch (e) { return false; }
        return true;
      }
      
      return $(this).hide();
 
    });
    
  };
  
})(jQuery);


 
    
    //Plug-in function for the Semantic UI version of the multiple email
    $(function() {
      //To render the input device to multiple email input using SemanticUI icon
      $('#example_emailSUI').multiple_emails({theme: "SemanticUI"});
      
      //Shows the value of the input device, which is in JSON format
      $('#current_emailsSUI').text($('#example_emailSUI').val());
      $('#example_emailSUI').change( function(){  
        $('#current_emailsSUI').text($(this).val());
      });
    });

    


      </script>


 <style type="text/css">
   .multiple_emails-container { 
  border:1px #ccc solid; 
  border-radius: 4px; 
  box-shadow: inset 0 1px 1px rgba(0,0,0,.075); 
  padding:0; margin: 0; cursor:text; width:100%; 
}

.multiple_emails-container input { 
  clear:both; 
  width:100%; 
  border:0; 
  outline: none; 
  margin-bottom:3px; 
  padding-left: 5px; 
  box-sizing: border-box;
}

.multiple_emails-container input{
  border: 0 !important;
}

.multiple_emails-container input.multiple_emails-error {  
  box-shadow: inset 0 1px 1px rgba(0, 0, 0, 0.075), 0 0 6px red !important; 
  outline: thin auto red !important; 
}

.multiple_emails-container ul { 
  list-style-type:none; 
  padding-left: 0; 
}

.multiple_emails-email { 
  margin: 3px 5px 3px 5px; 
  padding: 3px 5px 3px 5px; 
  border:1px #BBD8FB solid; 
  border-radius: 3px; 
  background: #F3F7FD; 
}

.multiple_emails-close { 
  float:left; 
  margin:0 3px;
}

 </style>

@endsection




 