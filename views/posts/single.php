<?php
	
	use yii\helpers\Html;
	use yii\helpers\Url;

	use adzadzadz\modules\blogger\assets\MainAsset;
	MainAsset::register($this);
?>

<?= $this->render('../bloggercomponents/nav') ?>

<div class="row">
	<section class="main col-md-12">
		<?= $this->render('post-content',[
			'post' => $post,
			'single' => $single,
		]) ?>
	</section>
</div>