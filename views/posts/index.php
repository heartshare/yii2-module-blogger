<?php
	
	$this->title = 'Posts';

	use yii\helpers\Html;

	$this->params['breadcrumbs'][] = $this->title;
?>
	
<div class="row">
	<section class="main col-sm-8">
	<?php foreach ($posts as $post) { ?>
		
		<?= $this->render('single',[
			'post' => $post,
		]) ?>

	<?php } ?>
	</section>
	<aside class="sidebar col-sm-4">
		<input type="text" placeholder="Search" class="form-control">
	</aside>
</div>