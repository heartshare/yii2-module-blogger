<?php 

	$this->title = 'Edit';

	use yii\helpers\Html;
	use yii\helpers\Url;
	use yii\web\View;

	use adzadzadz\modules\blogger\assets\MainAsset;
	MainAsset::register($this);

	$this->params['breadcrumbs'][] = ['label' => 'Blogger', 'url' => ['/blogger']];
	$this->params['breadcrumbs'][] = $this->title;

	echo $this->render('../bloggercomponents/nav');
	
	echo $this->render('_fields', [
		'postModel' => $postModel,
		'post'      => $post,
	]);

?>

<div id="post-update-url" data-action="<?= Url::toRoute(['posts/update', 'id' => $post['post_id'] ]) ?>"></div>