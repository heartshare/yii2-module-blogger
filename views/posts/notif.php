<?php if(!empty(Yii::$app->session->getFlash('success'))): ?>
<div class="alert alert-success alert-dismissible fade in">
	<button type="button" class="close" data-dismiss="alert" aria-label="Close">
		<span aria-hidden="true">&times;</span>
	</button>
	<?= Yii::$app->session->getFlash('success') ?>
</div>
<?php endif; ?>
<?php if(!empty(Yii::$app->session->getFlash('error'))): ?>
<div class="alert alert-danger alert-dismissible fade in">
	<button type="button" class="close" data-dismiss="alert" aria-label="Close">
		<span aria-hidden="true">&times;</span>
	</button>
	<?= Yii::$app->session->getFlash('error') ?>
</div>	
<?php endif; ?>