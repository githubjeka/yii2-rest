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
        return $behaviors;
    }

    public function actionLogin()
    {
        $model = new LoginForm();

        if ($model->load(\Yii::$app->getRequest()->getBodyParams(), '') && $model->login()) {
            echo \Yii::$app->user->identity->getAuthKey();
        }

        return $model;
    }

    public function actionIndex()
    {
        if (\Yii::$app->user->isGuest) {
            throw new \HttpHeaderException();
        }
        return \Yii::$app->user->getId();
    }
}
