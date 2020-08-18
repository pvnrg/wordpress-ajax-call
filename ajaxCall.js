 var row = '';
 $.ajax({
    type: 'POST',
    dataType: 'json',
    url: pvn_script_vars.ajaxurl,
    data: {
        action: 'pvn_function_posts',
        security: pvn_script_vars.security,
        row: row,
    },
    beforeSend:function(){
        // code showing status for ajax response...
    },
    success: function(response){
		// code after getting response...
    }
});