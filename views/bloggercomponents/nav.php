<?php 

	use yii\helpers\Url;

?>
<?php if (Yii::$app->user->can('bloggerAuthor')): ?>
<section id="blogger-post-actions" class="col-md-12">
	<div class="nav-title">Menu</div>
	<div id="blogger-menu-trigger-thinggy-wrapper">
		<div id="blogger-menu-trigger-thinggy">
			<i class="fa fa-cog"></i>
		</div>
	</div>
	<div id="blogger-nav-wrapper">
		<a class="nav-items" href="<?= Url::toRoute(['posts/index']) ?>"><i class="fa fa-plus"></i> Home</a> 
		<?php if (Yii::$app->user->can('bloggerAdmin')): ?>
			<a class="nav-items" href="<?= Url::toRoute(['permissions/index']) ?>"><i class="fa fa-plus"></i> Manage Permissions</a> 
		<?php endif ?>
		<a class="nav-items" href="<?= Url::toRoute(['posts/insert']) ?>"><i class="fa fa-plus"></i> Add New Post</a> 
		<a class="nav-items" href="<?= Url::toRoute(['posts/view']) ?>"><i class="fa fa-bars"></i> View All Posts</a>
		<hr>
		<div class="nav-title">
			Post Types
		</div>
		<div id="blogger-post-types-list" data-action="<?= Url::toRoute(['posts/types']) ?>">
			<div id="blogger-post-types-list-progress" class="progress">
				<div class="progress-bar progress-bar-success progress-bar-striped active" role="progressbar" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100" style="width: 0%">
					<span class="sr-only">80% Complete (success)</span>
				</div>
			</div>
		</div>
		
	</div>
</section>
<?php endif ?>