<?php

namespace adzadzadz\modules\blogger\models;

use Yii;

/**
 * This is the model class for table "{{%blogger_terms}}".
 *
 * @property integer $term_id
 * @property string $type
 * @property integer $parent_id
 * @property string $name
 * @property string $description
 * @property integer $status
 * @property integer $created_at
 * @property integer $updated_at
 * @property integer $author_id
 * @property integer $updater_id
 */
class BloggerTerms extends \yii\db\ActiveRecord
{
    const STATUS_DELETED = 0;
    const STATUS_ACTIVE = 10;

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%blogger_terms}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['type', 'name'], 'required'],
            [['parent_id', 'status', 'created_at', 'updated_at', 'author_id', 'updater_id'], 'integer'],
            [['name', 'description'], 'string'],
            [['type'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'term_id' => 'Term ID',
            'type' => 'Type',
            'parent_id' => 'Parent ID',
            'name' => 'Name',
            'description' => 'Description',
            'status' => 'Status',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'author_id' => 'Author ID',
            'updater_id' => 'Updater ID',
        ];
    }

}
