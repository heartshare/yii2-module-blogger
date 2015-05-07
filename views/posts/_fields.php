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
				<?= Html::activeLabel($postModel, 'slug') ?>
				<?= Html::activeInput('text', $postModel, 'slug', ['class' => 'form-control blogger-input-post-slug', 'placeholder' => 'Enter Slug']) ?>
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
			<div id="blogger-category-set-container" class="form-group border-btm">
				<label>Category:</label>
				<ul class="nav nav-tabs" role="tablist" id="myTab">
					<li role="presentation" class="active"><a href="#blogger-set-post-category" aria-controls="blogger-set-post-category" role="tab" data-toggle="tab">Set</a></li>
					<li role="presentation"><a href="#blogger-add-category" aria-controls="blogger-add-category" role="tab" data-toggle="tab">Add</a></li>
				</ul>
				<div class="tab-content">
					<div role="tabpanel" class="tab-pane active" id="blogger-set-post-category" data-action="<?= Url::toRoute(['components/fetchterms', 'type' => 'category']) ?>"></div>
					<div role="tabpanel" class="tab-pane" id="blogger-add-category">
						<input type="text" class="form-control" id="blogger-add-category-input" placeholder="Category">
						<button id="blogger-add-new-category-btn" class="btn btn-primary btn-sm pull-right" data-action="<?= Url::toRoute(['components/insertterm']) ?>" >Add</button>
						<div class="clearfix"></div>
					</div>
				</div>
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