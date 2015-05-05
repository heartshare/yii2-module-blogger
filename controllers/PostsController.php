<?php

namespace adzadzadz\modules\blogger\controllers;

use Yii;
use yii\web\Controller;
use yii\filters\AccessControl;
use yii\filters\VerbFilter;
use yii\web\BadRequestHttpException;
use adzadzadz\modules\blogger\models\Post;
use adzadzadz\modules\blogger\models\BloggerPosts;
use yii\helpers\Html;
   
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
                    'fetch'  => ['post'],
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

    public function actionTypes($renderView = true)
    {
        $postTypes = Post::getPostTypes();
        if ($postTypes == null) {
            return '';
        }
        if ($renderView === true) {
            return $this->renderPartial('@blogger/views/bloggercomponents/_posttypes',[
                'postTypes' => $postTypes,
            ]);    
        }
        return json_encode($postTypes);
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

    	return $this->render('@blogger/views/posts/edit',[
    		'post' => $post,
            'postModel' => $post,
    	]);
    }

    public function actionUpdate($id)
    {
        if(Yii::$app->request->isAjax) {
             $postModel = BloggerPosts::findOne($id);
            return var_dmup(Yii::$app->request->post('category'));
            if(!Post::addPostComponent(
                'post_types', 
                Yii::$app->request->post('BloggerPosts')['type'],
                str_replace("_"," ",Yii::$app->request->post('BloggerPosts')['type'])
            )) return 'Couldn\'t save Post Type.';

            if ($postModel->load(Yii::$app->request->post()) && $postModel->save()) {          
               return 'Saved';
            }            
            return Html::errorSummary($postModel, ['class' => 'errors']);
        }

        throw new BadRequestHttpException();
    }

    public function actionInsert()
    {   
        $postModel = new BloggerPosts;
        if(Yii::$app->request->isAjax) {
            
            if(!Post::addPostComponent(
                'post_types', 
                Yii::$app->request->post('BloggerPosts')['type'],
                str_replace("_"," ",Yii::$app->request->post('BloggerPosts')['type'])
            )) return 'Couldn\'t save Post Type.';

            if ($postModel->load(Yii::$app->request->post()) && $postModel->save()) {          
               return 'Saved';
            }
            return Html::errorSummary($postModel, ['class' => 'errors']);
        }
        if(empty(Yii::$app->request->post())) {
            return $this->render('@blogger/views/posts/add', [
                'postModel' => $postModel,
            ]);
        }          
    }

    public function actionDelete($id = null)
    {
        if($id === null) {
            return $this->render('error');
        }
        if (Yii::$app->user->can('bloggerAdmin')) {
            $deleteResult = Post::deletePost($id);

            Yii::$app->session->setFlash('success', 'Post Deleted');
            return $this->redirect(['view']);
        } else {
            return $this->render('error');
        }
    }

    public function actionView($postType = null)
    {
        if (Yii::$app->user->can('bloggerAdmin')) {
            if ($postType === null) {
                $allPosts = Post::getAllPosts();

                return $this->render('@blogger/views/posts/view', [
                    'posts' => $allPosts,
                ]);
            }

            $posts = Post::getPostsByType($postType);

            return $this->render('@blogger/views/posts/view', [
                'posts' => $posts,
            ]);
        } else {
            return $this->render('error');
        }
    }

}