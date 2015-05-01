<?php
	
	use yii\helpers\Html;
	use yii\helpers\Url;

?>

<div class="row">
	<?= $this->render('../bloggercomponents/nav') ?>
	<section class="blogger-post-actions col-md-12">
		<div>
		<?php if (Yii::$app->user->can('bloggerAuthor')): ?>
			<a href="<?= Url::toRoute(['insert']) ?>" style="margin-right: 10px;"><i class="fa fa-plus"></i> Add New Post</a> 
			<a href="<?= Url::toRoute(['insert']) ?>"><i class="fa fa-bars"></i> View All Posts</a>
		<?php endif ?>
		</div>
	</section>
	<section class="main col-md-12">
		<?= $this->render('post-content',[
			'post' => $post,
			'single' => $single,
		]) ?>
	</section>
</div>