<?php

namespace adzadzadz\modules\blogger\models;

use Yii;


class User extends \yii\db\ActiveRecord
{
    public static function tableName()
    {
        return '{{%user}}';
    }
}