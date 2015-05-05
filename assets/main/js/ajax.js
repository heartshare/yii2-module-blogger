$(document).ready(function () {

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

// ======================== Post Types Fetched through ajax ========================

// NAVBAR STUFF ====
// FAKE PROGRESS BAR
$('#blogger-post-types-list-progress .progress-bar').animate({
    width: "100%",
}, 1300, function() {
  // Animation complete.
});

var url = $('#blogger-post-types-list').data('action');
$.ajax({
    url: url,
    type: 'GET',
    beforeSend: function(){
    },
    success: function(result){
        $('#blogger-post-types-list').html(result);
    }
});
// END - NAVBAR STUFF ====

$('.blogger-input-post-type').focus(function() {
    var url = $('#blogger-post-types-list').data('action-json');
    $.ajax({
        url: url,
        type: 'GET',
        beforeSend: function(){
        },
        success: function(result){
            var buttons = '';
            buttons = "<h5><strong>Predefined Types:</strong></h5>";
            $.each(JSON.parse(result), function(idx, obj) {
                buttons += '<button class="btn btn-info btn-sm post-type-container-button">';
                buttons += obj.name;
                buttons += '</button> ';
            });

            $('#predefined-post-types-list').html(buttons);
        }
    });
});

$("body").on("click", ".post-type-container-button", function() {
    var post_type = $(this).html();
    $('.blogger-input-post-type').val(post_type);
});

// ====================== END Post Types Fetched through ajax =======================


// ================================ Category Stuff  ======================================
$('#blogger-add-new-category-btn').click(function() {
    var url = $(this).data('action');
    var data = $('#blogger-add-category').val();
    $.ajax({
        url: url,
        type: 'POST',
        data: {
            component_id : data.toLowerCase().replace(' ', '_'),
            component_name : data,
        },
        beforeSend: function(){
            $('#post-result').html('');
        },
        success: function(result){
            $('#post-result').html('<div class="alert alert-success">' + result + '<div>');
        }
    });
});

});
