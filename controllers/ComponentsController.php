<?php

namespace adzadzadz\modules\blogger\controllers;

use Yii;
use yii\web\Controller;
use yii\filters\AccessControl;
use yii\filters\VerbFilter;
use adzadzadz\modules\blogger\models\Post;

class ComponentsController extends Controller
{
	public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['update'],
                'rules' => [
                    [
                        'actions' => ['update', 'fetch'],
                        'allow' => true,
                        'roles' => ['bloggerAuthor', 'bloggerEditor'],
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

    public function actionUpdate($component = null)
    {	
    	if(Yii::$app->request->isAjax) {
    		if ($component === null) {
    			return $this->render('error');
    		}
	        if(!Post::addPostComponent(
	        	$component,
                Yii::$app->request->post('component_id', 'uncategorized'),
                Yii::$app->request->post('component_name', 'uncategorized')
            )) return 'Couldn\'t save Post Type.';

	        return ucfirst($component) . ' <strong>' . Yii::$app->request->post('component_name', 'uncategorized') . '</strong> has been added';
	    }

	    throw new BadRequestHttpException();
    }

    public function actionFetch()
    {
    	if(Yii::$app->request->isAjax) {
	        $postComponent = Post::getPostComponent(Yii::$app->request->post('component'));
	        if ($postComponent == null) {
	            return 'Component is not available.';
	        }
	        return json_encode($postComponent);
	    }

	    throw new BadRequestHttpException();
    }
}