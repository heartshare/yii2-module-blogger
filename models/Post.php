<?php

namespace adzadzadz\modules\blogger\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use adzadzadz\modules\blogger\models\BloggerPosts;
use adzadzadz\modules\blogger\models\SettingsSetup;

class Post extends BloggerPosts
{
	public function addPostType($typeId = null, $typeName = null)
	{
		// Fetch Saved Post Types
		$postTypes = SettingsSetup::getSettingByKey('post_types');
		
		$newType[] = [
			'post_type_id'   => $typeId,
			'post_type_name' => $typeName,
		];

		// Insert if 'post_types' does not exist
		if ($postTypes === null) {
			return SettingsSetup::addSetting('post_types', json_encode($newType));
		}

		// Convert post_types value back to php array for update
		$savedPostTypes = json_decode($postTypes['value']);

		// Re entering post types to the array
		foreach ($savedPostTypes as $each) {
			if ($each->post_type_id != $typeId) {
				$newPostTypeValue[] = [
					'post_type_id'   => $each->post_type_id,
					'post_type_name' => $each->post_type_name,
				];
			}			
		}

		// Add the new post type
		$newPostTypeValue[] = [
			'post_type_id'   => $typeId,
			'post_type_name' => $typeName,
		];

		// Update
		return SettingsSetup::updateSettingByKey('post_types', json_encode($newPostTypeValue));
	}

	public function getPostTypes()
	{	
		// Fetch Saved Post Types
		$postTypes = SettingsSetup::getSettingByKey('post_types');
		return json_decode($postTypes['value']);
	}
	
	public function getPostsByType($type = null)
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