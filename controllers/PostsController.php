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

    public function actionEdit($id)
    {		
    	$post = Post::getPostById($id);
    	if($post === null) {
    		return $this->render('error');
    	}
    	return $this->render('edit',[
    		'post' => $post,
    	]);
    }
}