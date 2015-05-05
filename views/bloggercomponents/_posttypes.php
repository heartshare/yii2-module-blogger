<?php 

	use yii\helpers\Url;

?>

<?php foreach ($postTypes as $each) { ?>
	<a href="<?= Url::toRoute(['posts/view', 'postType' => $each->id]) ?>" class="nav-items"><?= ucfirst($each->name) ?></a>
<?php } ?>