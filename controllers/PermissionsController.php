<?php

namespace adzadzadz\modules\blogger\controllers;

use yii\web\Controller;
use Yii;
use yii\filters\AccessControl;
use yii\filters\VerbFilter;
use adzadzadz\modules\blogger\models\Permissions;
use adzadzadz\modules\blogger\models\User;

class PermissionsController extends Controller
{
	public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['edit', 'add'],
                'rules' => [
                    [
                        'actions' => ['index', 'add', 'delete'],
                        'allow' => true,
                        'roles' => ['bloggerAdmin'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    // 'addpermission' => ['post'],
                ],
            ],
        ];
    }

    public function actionIndex()
    {    	
        return $this->render('index',[
        	'permissionList' => Permissions::getPermissionSet(),
        	'userList'       => User::find()->all(),
        	'assignedUsers'  => '',
        ]);
    }

    public function actionAddpermission()
    {
    	if (!empty(Yii::$app->request->post())) {
    		$auth = Yii::$app->authManager;

    		if (Yii::$app->request->post('permissionName') != null) {
	    		${Yii::$app->request->post('permissionName')} = $auth->createRole(Yii::$app->request->post('permissionName'));
	    	}			

			$auth->assign(${Yii::$app->request->post('permissionName')}, Yii::$app->request->post('userId'));

			$this->redirect(['index']);
    	} else {
    		$this->redirect(['permissions/index']);
    	}
    } 

}