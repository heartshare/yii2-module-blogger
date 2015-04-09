<?php 

	use yii\helpers\Url;

?>

<article>
	<header>
		<h2>
			<?= $post->title ?> 
			<?php if (\Yii::$app->user->can('bloggerEditPost')): ?>
				<small><a href="<?= Url::toRoute(['edit', 'id' => $post->post_id]) ?>">(edit)</a></small>
			<?php endif ?>
		</h2>
	</header>
	<section class="content excerpt">
		<?= $post->content ?>
	</section>
	<footer>
		<i>Authored by:</i> <strong><?= $post->author_id ?></strong> <br>
		<i>Updated at:</i> <strong><?= date("Y-m-d H:i:s", $post->updated_at) ?></strong> <br>
	</footer>
</article>
