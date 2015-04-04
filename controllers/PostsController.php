<?php

namespace adzadzadz\modules\blogger\controllers;

use yii\web\Controller;
use adzadzadz\modules\blogger\models\Post;

class PostsController extends Controller
{
    public function actionIndex()
    {
    	$posts = Post::getPostsByType('blog');

        return $this->render('index', [
        	'posts' => $posts,
        ]);
    }
}