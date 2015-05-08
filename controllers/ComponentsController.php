<?php

namespace adzadzadz\modules\blogger\controllers;

use Yii;
use yii\web\Controller;
use yii\filters\AccessControl;
use yii\filters\VerbFilter;
use adzadzadz\modules\blogger\models\Post;
use adzadzadz\modules\blogger\models\BloggerTerms;
use adzadzadz\modules\blogger\models\BloggerTermAssignments;
use yii\helpers\Html;

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
                    'fetchterms'  => ['post'],
                    'insertterm'  => ['post'],
                ],
            ],
        ];
    }

    public function actionInsertterm()
    {
        if(Yii::$app->request->isAjax) {
            $postTerms = new BloggerTerms;

            if ($postTerms->load(Yii::$app->request->post()) && $postTerms->save()) {
                return 'Saved';
            }
            return Html::errorSummary($postTerms, ['class' => 'errors']);
        }

        throw new BadRequestHttpException();
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

    public function actionFetchterms($type, $post_id = null)
    {   
        $postTermsAssignments = null;
        $postTerms = BloggerTerms::find()->where(['type' => $type, 'status' => BloggerTerms::STATUS_ACTIVE])->all();
        if ($post_id != null) {
            $postTermsAssignments = BloggerTermAssignments::find()->where(['type' => $type, 'post_id' => $post_id, 'status' => BloggerTermAssignments::STATUS_ACTIVE])->all();            

        }        
        if ($postTerms == null) {
            return "Nothing found";
        }
        if(Yii::$app->request->isAjax) {
            return $this->renderPartial('@blogger/views/bloggercomponents/_postterms',[
                'postTermsAssignments' => $postTermsAssignments,
                'postTerms' => $postTerms,
            ]);
	    }

	    return $postTerms;
    }
}