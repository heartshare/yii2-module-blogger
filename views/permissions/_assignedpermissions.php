<?php

	use yii\helpers\Url;
	use yii\helpers\Html;

?>

<label>User permissions</label>
<div class="form-group" id="perm-wrap">
<div id="del-permission-form" data-action="<?= Url::toRoute(['permissions/deletepermission']) ?>">
	<input type="hidden" id="del-permission-userid" value="<?= $user_id ?>">
	<select id="del-permission-rolename" class="form-control">
	<?php foreach ($permissions as $each) { ?>
		<option value="<?= $each->roleName ?>"><?= $each->roleName ?></option>
	<?php } ?>
	</select>
</div>
</div>