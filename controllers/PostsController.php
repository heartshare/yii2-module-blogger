<?php

namespace adzadzadz\modules\blogger\controllers;

use yii\web\Controller;
use yii\filters\AccessControl;
use yii\filters\VerbFilter;
use yii\web\BadRequestHttpException;
use adzadzadz\modules\blogger\models\Post;
use adzadzadz\modules\blogger\models\BloggerPosts;

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
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'update' => ['post']
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

        $postModel = BloggerPosts::findOne($id);

    	return $this->render('edit',[
    		'post' => $post,
            'postModel' => $postModel,
    	]);
    }

    public function actionUpdate($id)
    {
        if(\Yii::$app->request->isAjax) {
             $model = BloggerPosts::findOne($id);
            
            if ($model->load(\Yii::$app->request->post()) && $model->save()) {          
               return 'Saved';
            }            
            return 'There seems to be an error.';
        }

        throw new BadRequestHttpException();
    }

    public function actionDelete()
    {
        
    }
}