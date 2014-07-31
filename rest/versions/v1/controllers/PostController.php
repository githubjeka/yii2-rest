<?php
namespace rest\versions\v1\controllers;

use yii\filters\auth\QueryParamAuth;
use yii\rest\ActiveController;

class PostController extends ActiveController
{
    public $modelClass = 'rest\versions\v1\models\Post';

    public function behaviors()
    {
        $behaviors = parent::behaviors();
        $behaviors['authenticator'] = [
            'class' => QueryParamAuth::className(),
        ];
        return $behaviors;
    }
}
