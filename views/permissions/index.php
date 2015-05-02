<?php

	$this->title = "Permissions";

	use yii\helpers\Url;
	use yii\helpers\Html;
	use yii\web\View;

	use adzadzadz\modules\blogger\assets\MainAsset;
	MainAsset::register($this);

	$this->params['breadcrumbs'][] = ['label' => 'Blogger', 'url' => ['/blogger']];
	$this->params['breadcrumbs'][] = $this->title;

?>

<?= $this->render('../bloggercomponents/nav') ?>
<br><br>
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
							<option value="<?= $each->id ?>">ID: <?= Html::encode($each->id) ?> | Username: <?= Html::encode($each->username) ?></option>	
						<?php } ?>
						</select>
					</div>
				</div>
				<div class="col-sm-6">
					<div class="form-group">
						<label for="permission-name">Permission</label>
						<select name="permissionName" id="permission-name" class="form-control">
						<?php foreach ($permissionList as $each) { ?>
							<option value="<?= Html::encode($each->name) ?>"><?= Html::encode($each->name) ?></option>
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
		<div class="row">
			<div id="assigned-user-form" class="col-sm-6" data-action="<?= Url::toRoute(['permissions/getpermissions']) ?>">
				<div class="form-group">
					<label for="assigned-user-id">Assigned user</label>
					<select name="user_id" id="assigned-user-id" class="form-control">
					<?php foreach ($assignedUsers as $each) { ?>
						<option value="<?= $each->user_id ?>">ID: <?= Html::encode($each->user_id) ?></option>
					<?php } ?>
					</select>
				</div>
				<button id="get-user-permissions" class="btn btn-danger pull-right">Get Permissions</button>
			</div>
			<div class="col-sm-6">
				<div id="assigned-user-permissions"></div>
				<button id="button-delete-user-permission" class="hidden">Remove now!</button>
			</div>
		</div>
	</div>
</div>