<?php
	
	$this->title = 'Posts';

	use yii\helpers\Html;
	use yii\helpers\Url;

?>
	
<div class="row">
	<?= $this->render('../bloggercomponents/nav') ?>
	<section class="main col-md-8">
	<?php foreach ($posts as $post) { ?>
		
		<?= $this->render('post-content',[
			'post' => $post,
			'single' => $single,
		]) ?>

		<div class="clearfix"><hr></div>

	<?php } ?>
	</section>
	<aside class="sidebar col-md-4">
		<input type="text" placeholder="Search" class="form-control">
	</aside>
</div>