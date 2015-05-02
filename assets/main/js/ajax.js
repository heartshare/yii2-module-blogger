$('#get-user-permissions').click(function (){
	var url = $('#assigned-user-form').data('action');
	$.ajax({
        url: url,
        type: 'POST',
        data: {
            'user_id'   : $('#assigned-user-id').val(),
        },
        beforeSend: function(){
        	$('#assigned-user-permissions').html('<h3>Please wait.</h3>');
        },
        success: function(result){
		    $('#assigned-user-permissions').html(result);
		    $('#button-delete-user-permission').attr('class','btn btn-danger pull-right');
		}
    });
} );

$('#button-delete-user-permission').click(function (){

	var url = $('#del-permission-form').data('action');
	$.ajax({
        url: url,
        type: 'POST',
        data: {
            'user_id'   : $('#del-permission-userid').val(),
            'role_name' : $('#del-permission-rolename').val(),
        },
        beforeSend: function(){
        	$('#button-delete-user-permission').attr('class', 'hidden');
        	$('#perm-wrap').html('<h3>Please wait.</h3>');
        },
        success: function(result){
		    $('#perm-wrap').html(result);
		}
    });
} );