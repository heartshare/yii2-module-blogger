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
                'only' => ['edit', 'add'],
                'rules' => [
                    [
                        'actions' => ['edit'],
                        'allow' => true,
                        'roles' => ['bloggerEditPost'],
                    ],
                    [
                        'actions' => ['add'],
                        'allow' => true,
                        'roles' => ['bloggerCreatePost'],
                    ],
                    [
                        'actions' => ['view'],
                        'allow' => true,
                        'roles' => ['bloggerAuthor'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'update' => ['post'],
                ],
            ],
        ];
    }

    public function actionIndex()
    {
    	$posts = Post::getPostsByType('blog');

        return $this->render('index', [
        	'posts' => $posts,
            'single' => false,
        ]);
    }

    public function actionType($postType)
    {
        $posts = Post::getPostsByType($postType);
        return $this->renderPartial('@adz/views/bloggercomponents/_posttypes',[
            'postTypes' => $posts,
        ]);

    }

    public function actionSingle($id = null)
    {
        $post = Post::getPostById($id);

        if($post === null) {
            return $this->render('error');
        }

        return $this->render('single',[
            'post' => $post,
            'single' => true,
        ]);
    }

    public function actionEdit($id = null)
    {		
    	$post = Post::getPostById($id);

    	if($post === null) {
    		return $this->render('error');
    	}

    	return $this->render('edit',[
    		'post' => $post,
            'postModel' => $post,
    	]);
    }

    public function actionUpdate($id)
    {
        if(\Yii::$app->request->isAjax) {
             $postModel = BloggerPosts::findOne($id);
            
            if ($postModel->load(\Yii::$app->request->post()) && $postModel->save()) {          
               return 'Saved';
            }            
            return \yii\helpers\Html::errorSummary($postModel, ['class' => 'errors']);
        }

        throw new BadRequestHttpException();
    }

    public function actionInsert()
    {   
        $postModel = new BloggerPosts;
        if(\Yii::$app->request->isAjax) {
            if ($postModel->load(\Yii::$app->request->post()) && $postModel->save()) {          
               return 'Saved';
            }
            return \yii\helpers\Html::errorSummary($postModel, ['class' => 'errors']);
        }
        if(empty(\Yii::$app->request->post())) {
            return $this->render('add', [
                'postModel' => $postModel,
            ]);
        }          
    }

    public function actionDelete($id = null)
    {
        if($id === null) {
            return $this->render('error');
        }
        if (\Yii::$app->user->can('bloggerAdmin')) {
            $deleteResult = Post::deletePost($id);

            \Yii::$app->session->setFlash('success', 'Post Deleted');
            return $this->redirect(['view']);
        } else {
            return $this->render('error');
        }
    }

    public function actionView($id = null)
    {
        if (\Yii::$app->user->can('bloggerAdmin')) {
            $allPosts = Post::getAllPosts();

            return $this->render('view', [
                'allPosts' => $allPosts,
            ]);
        } else {
            return $this->render('error');
        }
    }

}