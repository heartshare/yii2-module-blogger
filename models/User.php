<?php

namespace adzadzadz\modules\blogger\models;

use Yii;


class User extends \yii\db\ActiveRecord
{
	const STATUS_DELETED = 0;
    const STATUS_ACTIVE = 10;

    public static function tableName()
    {
        return '{{%user}}';
    }
}