<?php

	$this->title = "Permissions";

	use yii\helpers\Url;
	use yii\helpers\Html;

?>

<h3>Manage Permissions</h3>

<div class="row">
	<div class="col-sm-8">
		<h4>Add</h4>
		<?= Html::beginForm(['permissions/addpermission'], 'post', ['enctype' => 'multipart/form-data']) ?>
			<div class="row">
				<div class="col-sm-6">				
					<div class="form-group">
						<label for="user-id">User</label>
						<select name="userId" id="user-id" class="form-control">
						<?php foreach ($userList as $each) { ?>
							<option value="<?= $each->id ?>"><?= $each->username ?></option>
						<?php } ?>
						</select>
					</div>
				</div>
				<div class="col-sm-6">
					<div class="form-group">
						<label for="permission-name">Permission</label>
						<select name="permissionName" id="permission-name" class="form-control">
						<?php foreach ($permissionList as $each) { ?>
							<option value="<?= $each->name ?>"><?= $each->name ?></option>
						<?php } ?>
						</select>
					</div>
					<input type="submit" value="Add" class="btn btn-danger pull-right">
				</div>
			</div>
		<?= Html::endForm() ?>		
	</div>
</div>

<div class="row">
	<div class="col-sm-8">
		<h4>Remove</h4>
		<?= Html::beginForm(['permissions/addpermission'], 'post', ['enctype' => 'multipart/form-data']) ?>
			<div class="row">
				<div class="col-sm-6">				
					<div class="form-group">
						<label for="user-id">User</label>
						<select name="userId" id="user-id" class="form-control">
						<?php foreach ($userList as $each) { ?>
							<option value="<?= $each->id ?>"><?= $each->username ?></option>
						<?php } ?>
						</select>
					</div>
				</div>
				<div class="col-sm-6">
					<div class="form-group">
						<label for="permission-name">Permission</label>
						<select multiple name="permissionName" id="permission-name" class="form-control">
						<?php foreach ($permissionList as $each) { ?>
							<option value="<?= $each->name ?>"><?= $each->name ?></option>
						<?php } ?>
						</select>
					</div>
					<input type="submit" value="Add" class="btn btn-danger pull-right">
				</div>
			</div>
		<?= Html::endForm() ?>
	</div>
</div>