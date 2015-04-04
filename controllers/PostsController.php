<?php

namespace adzadzadz\modules\blogger\controllers;

use yii\web\Controller;

class PostsController extends Controller
{
    public function actionIndex()
    {
        return $this->render('index');
    }
}