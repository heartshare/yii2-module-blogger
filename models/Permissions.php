<?php

namespace adzadzadz\modules\blogger\models;

use Yii;
use yii\base\Model;

use yii\data\ActiveDataProvider;
use adzadzadz\modules\blogger\models\AuthItem;

class Permissions extends AuthItem
{
	public function getPermissionSet()
	{
		return AuthItem::find()->all();
	}
}