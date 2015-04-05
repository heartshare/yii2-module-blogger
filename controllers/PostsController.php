<?php

namespace adzadzadz\modules\blogger\controllers;

use yii\web\Controller;
use yii\filters\AccessControl;
use adzadzadz\modules\blogger\models\Post;
use adzadzadz\modules\blogger\models\Permissions;

class PostsController extends Controller
{

    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['edit'],
                'rules' => [
                    [
                        'actions' => ['edit'],
                        'allow' => true,
                        'roles' => ['bloggerEditPost'],
                    ],
                ],
            ],
        ];
    }

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

    public function actionUpdate($id)
    {

    }

    public function actionDelete()
    {
        
    }
}