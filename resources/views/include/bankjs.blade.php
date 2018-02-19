<script type="text/javascript">

$(document).ready(function(){
    $('#lstStates').multiselect({ 
        buttonText: function(options, select) {
                return 'Select State';
        }
    
    });

    $('#city').multiselect({ 
        buttonText: function(options, select) {
                return 'Select city';
        }
    
    });

     $('#pincode').multiselect({ 
        buttonText: function(options, select) {
                return 'Select pincode';
        }
    
    });

     $('#sms').multiselect({
        buttonText: function(options, select) {
                return 'Select Recipient';
        }

     })
});

</script>