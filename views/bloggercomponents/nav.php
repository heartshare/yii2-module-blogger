<?php 

	use yii\helpers\Url;

?>

<section class="blogger-post-actions col-md-12">
	<div>
	<?php if (Yii::$app->user->can('bloggerAuthor')): ?>
		<a href="<?= Url::toRoute(['permissions/index']) ?>" style="margin-right: 10px;"><i class="fa fa-plus"></i> Manage Permissions</a> 
		<a href="<?= Url::toRoute(['posts/insert']) ?>" style="margin-right: 10px;"><i class="fa fa-plus"></i> Add New Post</a> 
		<a href="<?= Url::toRoute(['posts/view']) ?>"><i class="fa fa-bars"></i> View All Posts</a>
	<?php endif ?>
	</div>
</section>