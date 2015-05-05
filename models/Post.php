<?php

namespace adzadzadz\modules\blogger\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use adzadzadz\modules\blogger\models\BloggerPosts;
use adzadzadz\modules\blogger\models\SettingsSetup;

class Post extends BloggerPosts
{
	public function addPostComponent($settingKey, $id = null, $name = null)
	{
		// Fetch Saved Post Types
		$postComponent = SettingsSetup::getSettingByKey($settingKey);
		
		$newComponent[] = [
			'id'   => $id,
			'name' => $name,
		];

		// Insert if 'postComponent' does not exist
		if ($postComponent === null) {
			return SettingsSetup::addSetting($settingKey, json_encode($newComponent));
		}

		// Convert postComponent value back to php array for update
		$savedPostComponent = json_decode($postComponent['value']);

		// Re entering post types to the array
		foreach ($savedPostComponent as $each) {
			if ($each->id != $id) {
				$updateComponent[] = [
					'id'   => $each->id,
					'name' => $each->name,
				];
			}			
		}

		// Add the new post type
		$updateComponent[] = [
			'id'   => $id,
			'name' => $name,
		];

		// Update
		return SettingsSetup::updateSettingByKey($settingKey, json_encode($updateComponent));
	}

	public function getPostComponent($component)
	{	
		// Fetch Saved Post Types
		$postTypes = SettingsSetup::getSettingByKey($component);
		return json_decode($postTypes['value']);
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
		->where(['status' => SELF::STATUS_ACTIVE])
        ->indexBy('post_id')
        ->all();
	}

	public function deletePost($id)
	{
		$post = BloggerPosts::findOne($id);
        $post->status = SELF::STATUS_DELETED;
        return $post->save();
	}
}