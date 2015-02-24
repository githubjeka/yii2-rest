<?php
namespace rest\versions\v1\controllers;

use common\models\LoginForm;
use yii\filters\RateLimiter;
use yii\rest\ActiveController;

class UserController extends ActiveController
{
    public $modelClass = 'rest\versions\v1\models\User';

    public function behaviors()
    {
        $behaviors = parent::behaviors();
        
        $behaviors['rateLimiter'] = [
            'class' => RateLimiter::className(),
            'enableRateLimitHeaders' => false,
        ];
        
        $behaviors['verbs'] = [
            'class' => \yii\filters\VerbFilter::className(),
            'actions' => [
                'login' => ['POST', 'OPTIONS'],
            ],   
        ];
        
        return $behaviors;
    }

    public function actionLogin()
    {
        if (\Yii::$app->getRequest()->getMethod() === 'OPTIONS') {
            \Yii::$app->getResponse()->getHeaders()->set('Allow', 'POST');
        } else {
             $model = new LoginForm();

            if ($model->load(\Yii::$app->getRequest()->getBodyParams(), '') && $model->login()) {
                echo \Yii::$app->user->identity->getAuthKey();
            } else {
                $model->validate();
                return $model;
            }
        }
    }

    public function actionIndex()
    {
        if (\Yii::$app->user->isGuest) {
            throw new \HttpHeaderException();
        }
        return \Yii::$app->user->getId();
    }
}
