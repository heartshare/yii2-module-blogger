<?php

namespace adzadzadz\modules\blogger\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use adzadzadz\modules\blogger\models;

class Post extends Posts
{
	public function getPostsByType($type)
	{
		$all = Posts::find()
	    ->where(['type' => $type, 'status' => SELF::STATUS_ACTIVE,])
	    ->all();

	    if($all === null) {
	    	return false;
	    }	

		return $all;
	}
}