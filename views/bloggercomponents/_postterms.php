<?php

	use yii\helpers\Html;

?>

<?php foreach ($postTerms as $eachTerms): ?>
	<div class="checkbox">
	<label>
	<input type="checkbox" name="category[]" id="blogger-fetched-category-" value="<?= $eachTerms->term_id ?>" > <?= $eachTerms->name ?>

	<?php foreach ($postTermsAssignments as $eachAssignments): ?>
		<?php if ($eachAssignments->term_id == $eachTerms->term_id): ?>
			<input type="checkbox" name="category[]" id="blogger-fetched-category-<?= $eachTerms->term_id" value="<?= $eachTerms->term_id ?>" checked> <?= $eachTerms->name ?>
		<?php endif ?>
	<?php endforeach ?>

	</label>
	</div>
<?php endforeach ?>
