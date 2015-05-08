<?php
	
	$this->title = 'Add';

	use yii\helpers\Html;
	use yii\helpers\Url;
	use yii\web\View;

	use adzadzadz\modules\blogger\assets\MainAsset;
	MainAsset::register($this);

	$this->params['breadcrumbs'][] = ['label' => 'Blogger', 'url' => ['/blogger']];
	$this->params['breadcrumbs'][] = $this->title;

	echo $this->render('../bloggercomponents/nav');

	echo $this->render('_fields', [
		'postModel' => $postModel
	]); 

?>

<div id="post-update-url" data-action="<?= Url::toRoute(['posts/insert']) ?>"></div>