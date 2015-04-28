<?php

use Yii;
use adzadzadz\modules\blogger\models\SettingsSetup;

$auth = Yii::$app->authManager;

$admin = $auth->createRole('bloggerAdmin');
$editor = $auth->createRole('bloggerEditor'); 
$author = $auth->createRole('bloggerAuthor');

$auth->assign($admin, 3);

?>