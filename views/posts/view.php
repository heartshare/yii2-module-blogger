<?php
	
	$this->title = 'All';

	use yii\helpers\Html;
	use yii\helpers\Url;

	$this->render('notif');
?>

<div class="row">
	<section class="blogger-post-actions col-md-12">
		<div>
		<?php if (Yii::$app->user->can('bloggerAuthor')): ?>
			<a href="<?= Url::toRoute(['insert']) ?>" style="margin-right: 10px;"><i class="fa fa-plus"></i> Add New Post</a> 
			<a href="<?= Url::toRoute(['view']) ?>"><i class="fa fa-bars"></i> View All Posts</a>
		<?php endif ?>
		</div>
	</section>
	<section class="main col-md-8">

		<table class="table table-striped">
			<thead>
				<tr>
					<th>Title</th>
					<th>Excerpt</th>
					<th>Actions</th>
				</tr>
			</thead>
			<tbody>
			<?php foreach ($allPosts as $post) { ?>
				<tr>
					<td><?= $post->title ?></td>
					<td><?= $post->excerpt ?></td>
					<td><a href="<?= Url::toRoute(['edit', 'id' => $post->post_id]) ?>">Edit</a> / <a href="<?= Url::toRoute(['edit', 'id' => $post->post_id]) ?>">Delete</a></td>
				</tr>
			</tbody>
			<?php } ?>
		</table>
	
	</section>
	<aside class="sidebar col-md-4">
		<input type="text" placeholder="Search" class="form-control">
	</aside>
</div>