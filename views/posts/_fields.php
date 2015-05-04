<?php

	use yii\helpers\Html;
	use yii\helpers\Url;
	use adzadzadz\modules\blogger\assets\CkeditorAsset;
	CkeditorAsset::register($this);
?>

<article class="col-md-9">
	<div id="post-result"></div>
	<div class="form-group border-btm">
		<?= Html::activeLabel($postModel, 'title') ?>
		<?= Html::activeInput('text', $postModel, 'title', ['class' => 'form-control']) ?>
	</div>
	<div class="form-group border-btm">
	<?= Html::activeLabel($postModel, 'content') ?>
	<?= Html::activeTextarea($postModel, 'content', ['class' => 'form-control ckeditor'] ) ?>
	</div>
	<div class="form-group border-btm">
	<?= Html::activeLabel($postModel, 'excerpt') ?>
	<?= Html::activeTextarea($postModel, 'excerpt', ['class' => 'form-control ckeditor', 'rows' => 5] ) ?>
	</div>
</article>

<aside class="col-md-3">
	<div class="row update-actions">
		<div class="col-md-12">
			<div class="form-group border-btm">
				<?= Html::submitButton($this->title == 'Add'? 'Publish': 'Update', ['id' => 'post-update', 'class' => 'btn btn-lg btn-primary btn-block', 'data-loading-text' => 'Loading...', 'autocomplete' => 'off']) ?>
			</div>
		</div>
		<div class="col-md-12">
			<div class="form-group border-btm">
				<?= Html::activeLabel($postModel, 'type') ?>
				<?= Html::activeInput('text', $postModel, 'type', ['class' => 'form-control blogger-input-post-type', 'placeholder' => 'Enter Post Type']) ?>
				<div id="predefined-post-types-list"></div>
			</div>
		</div>
		<div class="col-md-12">
			<div class="form-group border-btm">
				<label for="blogger-input-category">Category:</label>
				<select id="blogger-input-category" type="text" class="form-control" data-action="<?= Url::toRoute(['posts/fetch']) ?>" multiple>
				  <option value="volvo">Volvo</option>
				  <option value="saab">Saab</option>
				  <option value="opel">Opel</option>
				  <option value="audi">Audi</option>
				</select>
			</div>
		</div>
		<div class="col-md-12">
			<div class="form-group">
				<label for="blogger-input-tag">Tags:</label>
				<select id="blogger-input-tag" type="text" class="form-control" data-action="<?= Url::toRoute(['posts/fetch']) ?>" multiple>
				  <option value="volvo">Volvo</option>
				  <option value="saab">Saab</option>
				  <option value="opel">Opel</option>
				  <option value="audi">Audi</option>
				</select>
			</div>
		</div>
	</div>
</aside>