<?php
	
	$this->title = 'Posts';
	
?>

<div class="container">
	
	<div class="row">
		<aside class="left col-sm-8">
		<?php foreach ($posts as $post) { ?>
			<article>
				<header><h2><?= $post->title ?></h2></header>
				<section class="content excerpt">
					<?= $post->content ?>
				</section>
				<footer>
					<i>Authored by:</i> <strong><?= $post->author_id ?></strong> <br>
					<i>Updated at:</i> <strong><?= date("Y-m-d H:i:s", $post->updated_at) ?></strong> <br>
				</footer>
			</article>
		<?php } ?>
		</aside>
		<aside class="right sidebar col-sm-4">
			
		</aside>
	</div>

</div>
