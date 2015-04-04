<?php

namespace adzadzadz\modules\blogger\models;

use Yii;
use yii\behaviors\TimestampBehavior;
use yii\behaviors\BlameableBehavior;

/**
 * This is the model class for table "posts".
 *
 * @property integer $post_id
 * @property string $type
 * @property string $title
 * @property string $excerpt
 * @property string $content
 * @property string $access_key
 * @property integer $status
 * @property integer $created_at
 * @property integer $updated_at
 * @property integer $author_id
 * @property integer $updater_id
 */
class Posts extends \yii\db\ActiveRecord
{
    const STATUS_DELETED = 0;
    const STATUS_ACTIVE = 10;
    
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'posts';
    }

    public function behaviors()
    {
        return [
            TimestampBehavior::className(),
             [
                'class' => BlameableBehavior::className(),
                'createdByAttribute' => 'author_id',
                'updatedByAttribute' => 'updater_id',
            ],
        ];
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['type', 'title', 'excerpt', 'content'], 'required'],
            [['title', 'excerpt', 'content'], 'string'],
            [['status', 'created_at', 'updated_at', 'author_id', 'updater_id'], 'integer'],
            [['type', 'access_key'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'post_id' => 'Post ID',
            'type' => 'Type',
            'title' => 'Title',
            'excerpt' => 'Excerpt',
            'content' => 'Content',
            'access_key' => 'Access Key',
            'status' => 'Status',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'author_id' => 'Author ID',
            'updater_id' => 'Updater ID',
        ];
    }
}
