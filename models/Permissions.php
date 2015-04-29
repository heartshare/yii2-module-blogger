<?php

namespace adzadzadz\modules\blogger\models;

use Yii;
use yii\base\Model;

use yii\data\ActiveDataProvider;
use adzadzadz\modules\blogger\models\AuthAssignment;

class Permissions extends Model
{
	public function getPermissionSet()
	{
		return Yii::$app->authManager->getRoles();
	}

	public function getAssignedUsers()
	{
		return AuthAssignment::find()->orderby('user_id')->all();
	}

	public function getUserAssignments($id = null)
	{
		return Yii::$app->authManager->getAssignments($id);
	}

}