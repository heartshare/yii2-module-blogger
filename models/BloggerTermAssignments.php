<?php

namespace adzadzadz\modules\blogger\models;

use Yii;

/**
 * This is the model class for table "{{%blogger_term_assignments}}".
 *
 * @property integer $assignment_id
 * @property string $type
 * @property string $term_id
 * @property string $post_id
 * @property integer $status
 * @property integer $created_at
 * @property integer $updated_at
 * @property integer $author_id
 * @property integer $updater_id
 */
class BloggerTermAssignments extends \yii\db\ActiveRecord
{
    const STATUS_DELETED = 0;
    const STATUS_ACTIVE = 10;
    
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%blogger_term_assignments}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['type', 'term_id', 'post_id', 'created_at'], 'required'],
            [['status', 'created_at', 'updated_at', 'author_id', 'updater_id'], 'integer'],
            [['type', 'term_id', 'post_id'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'assignment_id' => 'Assignment ID',
            'type' => 'Type',
            'term_id' => 'Term ID',
            'post_id' => 'Post ID',
            'status' => 'Status',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'author_id' => 'Author ID',
            'updater_id' => 'Updater ID',
        ];
    }

    public function updateAssignments($term_id = null, $type = null, $post_id = null)
    {   
        if ($post_id != null) {
            $postTerms = BloggerTermAssignments::find()->where(['post_id' => $post_id, 'type' => 'category', 'status' => SELF::STATUS_ACTIVE])->all();
            if (!empty($postTerms)) {

            } else {
                $postTerms = new BloggerTermAssignments;
                $postTerms->post_id = '';
                $
            }

        }
        
        return $postTerms;
    }
}
