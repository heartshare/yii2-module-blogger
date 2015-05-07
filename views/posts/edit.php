<?php 

	$this->title = 'Edit';

	use yii\helpers\Html;
	use yii\helpers\Url;
	use yii\web\View;

	use adzadzadz\modules\blogger\assets\MainAsset;
	MainAsset::register($this);

	$this->params['breadcrumbs'][] = ['label' => 'Blogger', 'url' => ['/blogger']];
	$this->params['breadcrumbs'][] = $this->title;

	echo $this->render('../bloggercomponents/nav');
	
	echo $this->render('_fields', [
		'postModel' => $postModel,
		'post'      => $post,
	]);

	$jsScript = "
		
		$('#post-update').click(function (){
			var url = '" . Url::toRoute(['posts/update', 'id' => $post['post_id'] ]) . "';
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
				
	";

	$this->registerJs($jsScript, View::POS_READY, 'post-update-ajax') 

?>