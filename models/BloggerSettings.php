<?php

namespace adzadzadz\modules\blogger\models;

use Yii;
use yii\behaviors\TimestampBehavior;
use yii\behaviors\BlameableBehavior;

/**
 * This is the model class for table "{{%blogger_settings}}".
 *
 * @property integer $id
 * @property string $key
 * @property string $value
 * @property integer $status
 * @property integer $created_at
 * @property integer $updated_at
 * @property integer $author_id
 * @property integer $updater_id
 */
class BloggerSettings extends \yii\db\ActiveRecord
{
    const STATUS_DELETED = 0;
    const STATUS_ACTIVE = 10;

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%blogger_settings}}';
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
            [['key', 'value'], 'required'],
            [['status', 'created_at', 'updated_at', 'author_id', 'updater_id'], 'integer'],
            [['key', 'value'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'key' => 'Key',
            'value' => 'Value',
            'status' => 'Status',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'author_id' => 'Author ID',
            'updater_id' => 'Updater ID',
        ];
    }
}
