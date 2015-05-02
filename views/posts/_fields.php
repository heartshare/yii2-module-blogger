<?php

	use yii\helpers\Html;
	
	use adzadzadz\modules\blogger\assets\CkeditorAsset;
	CkeditorAsset::register($this);
?>

<article class="col-md-9">
<div id="post-result"></div>
	<table class="table">
		<tr>
			<td><?= Html::activeLabel($postModel, 'title') ?></td>
			<td><?= Html::activeInput('text', $postModel, 'title', ['class' => 'form-control']) ?></td>
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

<aside class="col-md-3">
	<div class="row update-actions">
		<div class="col-md-12"><?= Html::submitButton($this->title == 'Add'? 'Publish': 'Update', ['id' => 'post-update', 'class' => 'btn btn-lg btn-primary btn-block', 'data-loading-text' => 'Loading...', 'autocomplete' => 'off']) ?></div>
		<div class="col-md-12">
			<div class="clearfix"></div>
			<hr>
		</div>
		<div class="col-md-12">
			<?= Html::activeLabel($postModel, 'type') ?>
			<?= Html::activeInput('text', $postModel, 'type', ['class' => 'form-control', 'placeholder' => 'Enter Post Type']) ?>
		</div>
	</div>
</aside>