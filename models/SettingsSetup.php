<?php

namespace adzadzadz\modules\blogger\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use adzadzadz\modules\blogger\models\BloggerSettings;

class SettingsSetup extends BloggerSettings
{
	public function getSettingByKey($key = null)
	{
		if($key !== null) {
			return BloggerSettings::find()
		    ->where(['key' => $key])
		    ->limit(1)->one();
		}
		return false;
	}

	public function updateSettingByKey($key = null, $value = null)
	{
		if($key !== null && $value !== null) {
			$setting = BloggerSettings::findOne(['key' => $key]);
			$setting->value = $value;
			return $setting->save();
		}
		return false;
	}
}