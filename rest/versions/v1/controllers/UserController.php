<?php
namespace rest\versions\v1\controllers;

use common\models\LoginForm;
use yii\rest\ActiveController;

class UserController extends ActiveController
{
    public $modelClass = 'common\models\User';

    public function actionLogin()
    {
        $model = new LoginForm();

        if ($model->load(\Yii::$app->getRequest()->getBodyParams(), '') && $model->login()) {
            echo \Yii::$app->user->identity->getAuthKey();
        } else {
            return $model;
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
