<?php 

	use yii\helpers\Html;
	use yii\helpers\Url;
	use yii\web\View;
	

?>
<article class="col-sm-8">
	<div class="update-actions">
		<div class="pull-right"><?= Html::submitButton('Update', ['id' => 'post-update', 'class' => 'btn btn-lg btn-primary', 'data-loading-text' => 'Loading...', 'autocomplete' => 'off']) ?></div>
	</div>

	<table class="table">
		<tr>
			<td><?= Html::activeLabel($postModel, 'title') ?></td>
			<td><?= Html::activeInput('text', $postModel, 'title', ['class' => 'form-control', 'value' => $post['title']]) ?></td>
		</tr>
		<tr>
			<td><?= Html::activeLabel($postModel, 'content') ?></td>
			<td><?= Html::activeTextarea($postModel, 'content', ['class' => 'form-control ckeditor'] ) ?></td>
		</tr>
		<tr>
			<td><?= Html::activeLabel($postModel, 'excerpt') ?></td>
			<td><?= Html::activeTextarea($postModel, 'excerpt', ['class' => 'form-control ckeditor', 'rows' => 5] ) ?></td>
		</tr>
	</table>
</article>

<aside class="col-sm-4">

</aside>

<?php $this->registerJsFile(\Yii::getAlias('@bloggerAssets') . '/ckeditor/ckeditor.js', ['depends' => [\yii\web\JqueryAsset::className()]]); ?>

<?php 

	$jsScript = "

		$('#post-update').click(function (){
			var url = '" . Url::toRoute(['posts/update', 'id' => $post['post_id'] ]) . "';
			$.ajax({
		        url: url,
		        type: 'POST',
		        data: {
		            '" . Html::getInputName( $postModel, 'title' ) . "'   : $('#" . Html::getInputId( $postModel, 'title' ) . "').val(),
		            '" . Html::getInputName( $postModel, 'content' ) . "' : CKEDITOR.instances['" . Html::getInputId( $postModel, 'content' ) . "'].getData(),
		            '" . Html::getInputName( $postModel, 'excerpt' ) . "' : CKEDITOR.instances['" . Html::getInputId( $postModel, 'excerpt' ) . "'].getData(),
		        },
		        beforeSend: function(){
		        	$('#post-update').button('loading');
		        },
		        success: function(result){
		            $('#post-update').button('reset');
				    $('#post-update').before().html('Saved');
				},
		    });
		} );
				
	";

?>

<?php $this->registerJs($jsScript, View::POS_READY, 'post-update-ajax') ?>
