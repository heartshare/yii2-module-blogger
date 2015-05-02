<?php
	
	$this->title = 'Posts';

	use yii\helpers\Html;
	use yii\helpers\Url;

	use adzadzadz\modules\blogger\assets\MainAsset;
	MainAsset::register($this);
	
?>

<?= $this->render('../bloggercomponents/nav') ?>

<div class="row">	
	<section class="main col-md-8">
	<?php foreach ($posts as $post) { ?>
		
		<?= $this->render('post-content',[
			'post' => $post,
			'single' => $single,
		]) ?>

		<div class="clearfix"><hr></div>

	<?php } ?>
	</section>
</div>