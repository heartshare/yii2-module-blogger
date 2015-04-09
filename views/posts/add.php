<?php
	
	$this->title = 'Add';

	use yii\helpers\Html;
	use yii\helpers\Url;
	use yii\web\View;

	$this->params['breadcrumbs'][] = ['label' => 'Blogger', 'url' => ['/blogger']];
	$this->params['breadcrumbs'][] = $this->title;


	echo $this->render('_fields', ['postModel' => $postModel]); 

	$jsScript = "
		
		$('#post-update').click(function (){
			var url = '" . Url::toRoute(['posts/insert']) . "';
			$.ajax({
		        url: url,
		        type: 'POST',
		        data: {
		            '" . Html::getInputName( $postModel, 'title' ) . "'   : $('#" . Html::getInputId( $postModel, 'title' ) . "').val(),
		            '" . Html::getInputName( $postModel, 'content' ) . "' : CKEDITOR.instances['" . Html::getInputId( $postModel, 'content' ) . "'].getData(),
		            '" . Html::getInputName( $postModel, 'excerpt' ) . "' : CKEDITOR.instances['" . Html::getInputId( $postModel, 'excerpt' ) . "'].getData(),
		            '" . Html::getInputName( $postModel, 'type' ) . "' : $('#" . Html::getInputId( $postModel, 'type' ) . "').val(),
		        },
		        beforeSend: function(){
		        	$('#post-update').button('loading');
		        },
		        success: function(result){
		            $('#post-update').button('reset');
				    $('#post-update').before().html(result);
				},
		    });
		} );
				
	";

	 $this->registerJs($jsScript, View::POS_READY, 'post-update-ajax');
?>