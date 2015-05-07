<?php

	use yii\helpers\Html;

?>

<?php foreach ($postTerms as $each) { ?>
<div class="checkbox">
<label>
<input type="checkbox" name="category[]" id="blogger-fetched-category-" value="<?= $each->term_id ?>" > <?= $each->name ?>
<!--  //Html::activeCheckbox($postTermsModel, 'agree', ['checked' => ''])  -->
</label>
</div>
<?php } ?>
