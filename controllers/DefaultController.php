<?php

namespace adzadzadz\modules\blogger\controllers;

use yii\web\Controller;

class DefaultController extends Controller
{

    public function actionIndex()
    {
        return $this->redirect(['posts/index']);
    }
}