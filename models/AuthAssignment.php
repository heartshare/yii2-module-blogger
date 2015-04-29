<?php

namespace adzadzadz\modules\blogger\models;

use Yii;

class AuthAssignment extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%auth_assignment}}';
    }

}
