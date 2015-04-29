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
                'rules' => [
                    [
                        'actions' => ['index', 'addpermission', 'deletepermission', 'getpermissions'],
                        'allow' => true,
                        'roles' => ['bloggerAdmin'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'addpermission' => ['post'],
                    'getpermission' => ['post'],
                    'deletepermission' => ['post'],
                ],
            ],
        ];
    }

    public function actionIndex()
    {    	
        return $this->render('index',[
        	'permissionList' => Permissions::getPermissionSet(),
        	'userList'       => User::find()->where(['status' => User::STATUS_ACTIVE])->all(),
            'assignedUsers'  => Permissions::getAssignedUsers(),
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

            Yii::$app->session->setFlash('success', 'Permission added succesfully.');
			$this->redirect(['permissions/index']);
    	} else {
            Yii::$app->session->setFlash('error', 'Permission not saved for some reason.');             
    		$this->redirect(['permissions/index']);
    	}
    }

    public function actionDeletepermission()
    {
        if(Yii::$app->request->isAjax) {
            if(!empty(Yii::$app->request->post())) {
                $role = Yii::$app->authManager->createRole(Yii::$app->request->post('role_name'));
                if (Yii::$app->authManager->revoke($role, Yii::$app->request->post('user_id')) == true) {
                    return 'Success!!! Permission removed.';
                }
            }
            return 'I couldn\'t remove the permission for some reason.';
        }
    }

    public function actionGetpermissions()
    {
        if(Yii::$app->request->isAjax) {
            if(!empty(Yii::$app->request->post())) {
                $permissions = Permissions::getUserAssignments(Yii::$app->request->post('user_id'));
                return $this->renderPartial('_assignedpermissions',[
                    'user_id'      => Yii::$app->request->post('user_id'),
                    'permissions'  => $permissions,
                ]);
            }
            Yii::$app->session->setFlash('error', 'Some kind of error'); 
            return $this->renderPartial('_assignedpermissions',[
                'permissions'  => null,
                'user_id'      => null,
            ]);
        }
    }
}