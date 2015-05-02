<?php

namespace adzadzadz\modules\blogger\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use adzadzadz\modules\blogger\models\BloggerPosts;

class Post extends BloggerPosts
{
	public function getPostTypes()
	{
		$all = BloggerPosts::find()
	    ->where(['type' => $type, 'status' => SELF::STATUS_ACTIVE])
	    ->all();
	}
	
	public function getPostsByType($type)
	{
		return BloggerPosts::find()
	    ->where(['type' => $type, 'status' => SELF::STATUS_ACTIVE])
	    ->all();;
	}

	public function getPostById($id)
	{
		return BloggerPosts::findOne($id);
	}

	public function getAllPosts()
	{
		return BloggerPosts::find()
        ->indexBy('post_id')
        ->all();
	}

	public function deletePost($id)
	{
		$post = BloggerPosts::findOne($id);
        return $post->delete();
	}
}