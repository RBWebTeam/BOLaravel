<script type="text/javascript">

$(document).ready(function(){
    $('#lstStates').multiselect({ 
        buttonText: function(options, select) {
                return 'Select State';
        }
    
    });

    
     $('#sms').multiselect({
        buttonText: function(options, select) {
                return 'Select Recipient';
        }

     
});
     

</script>