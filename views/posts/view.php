<?php
	
	$this->title = 'All';

	use yii\helpers\Html;
	use yii\helpers\Url;

	$this->render('../bloggercomponents/notif')
	
?>

<div class="row">
	<?= $this->render('../bloggercomponents/nav') ?>
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
					<td><a href="<?= Url::toRoute(['edit', 'id' => $post->post_id]) ?>">Edit</a> / <a href="<?= Url::toRoute(['delete', 'id' => $post->post_id]) ?>">Delete</a></td>
				</tr>
			</tbody>
			<?php } ?>
		</table>
	
	</section>
	<aside class="sidebar col-md-4">
		<input type="text" placeholder="Search" class="form-control">
	</aside>
</div>