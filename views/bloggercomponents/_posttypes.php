<?php 

	use yii\helpers\Url;

?>

<?php foreach ($postTypes as $each) { ?>
	<a href="<?= Url::toRoute(['posts/view', 'postType' => $each->post_type_name]) ?>" class="nav-items"><?= ucfirst($each->post_type_name) ?></a>
<?php } ?>