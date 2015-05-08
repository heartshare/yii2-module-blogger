$(document).ready(function () {

// USER PERMISSIONS
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
// END USER PERMISSIONS

// UPDATE POST
$('#post-update').click(function (){
    var url = $('#post-update-url').data('action');
    $.ajax({
        url: url,
        type: 'POST',
        data: {
            'BloggerPosts[title]'   : $('#bloggerposts-title' ).val(),
            'BloggerPosts[content]' : CKEDITOR.instances['bloggerposts-content'].getData(),
            'BloggerPosts[excerpt]' : CKEDITOR.instances['bloggerposts-excerpt'].getData(),
            'BloggerPosts[type]' : $('#bloggerposts-type').val().toLowerCase().replace(' ', '_'),
            'BloggerPosts[slug]' : $('#bloggerposts-slug').val().toLowerCase().replace(' ', '-'),
        },
        beforeSend: function(){
            $('#post-update').button('loading');
            $('#post-result').html('');
        },
        success: function(result){
            $('#post-update').button('reset');
            if(result != 'Saved') {
                $('#post-result').html('<div class=\"alert alert-danger\">' + result + '</div>');
            } else {
                $('#post-result').html('<div class=\"alert alert-success\">' + result + '</div>');
            }
        },
    });
} );
// END UPDATE POST

// INSERT POST
$('#post-update').click(function (){
    var url = $('#post-update-url').data('action');
    $.ajax({
        url: url,
        type: 'POST',
        data: {
            'BloggerPosts[title]'   : $('#bloggerposts-title' ).val(),
            'BloggerPosts[content]' : CKEDITOR.instances['bloggerposts-content'].getData(),
            'BloggerPosts[excerpt]' : CKEDITOR.instances['bloggerposts-excerpt'].getData(),
            'BloggerPosts[type]' : $('#bloggerposts-type').val().toLowerCase().replace(' ', '_'),
            'BloggerPosts[slug]' : $('#bloggerposts-slug').val().toLowerCase().replace(' ', '-'),
        },
        beforeSend: function(){
            $('#post-update').button('loading');
            $('#post-result').html('');
        },
        success: function(result){
            $('#post-update').button('reset');
            if(result != 'Saved') {
                $('#post-result').html('<div class=\"alert alert-danger\">' + result + '</div>');
            } else {
                $('#post-result').html('<div class=\"alert alert-success\">' + result + '</div>');
            }
        },
    });
} );
// END INSERT POST

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
    var data = $('#blogger-add-category-input').val();
    $.ajax({
        url: url,
        type: 'POST',
        data: {
            'BloggerTerms[type]' : 'category',
            'BloggerTerms[name]' : data,
        },
        beforeSend: function(){
            $('#post-result').html('');
        },
        success: function(result){
            $('#post-result').html('<div class="alert alert-success">' + result + '<div>');
        }
    });
});

if ( $("#blogger-set-post-category").length ) {

    var url = $("#blogger-set-post-category").data('action');
    $.ajax({
        url: url,
        type: 'POST',
        beforeSend: function(){
            $('#blogger-set-post-category').html('');
        },
        success: function(result){
            $('#blogger-set-post-category').html(result);
        }
    });
}

});
