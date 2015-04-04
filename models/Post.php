<?php

namespace adzadzadz\modules\blogger\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use adzadzadz\modules\blogger\models\BloggerPosts;

class Post extends BloggerPosts
{
	public function getPostsByType($type)
	{
		$all = BloggerPosts::find()
	    ->where(['type' => $type, 'status' => SELF::STATUS_ACTIVE])
	    ->all();

	    if($all === null) {
	    	return false;
	    }	

		return $all;
	}

	public function getPostById($id)
	{
		return BloggerPosts::findOne($id);
	}
}