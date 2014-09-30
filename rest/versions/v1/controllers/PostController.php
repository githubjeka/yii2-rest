<?php
namespace rest\versions\v1\controllers;

use rest\versions\v1\models\Post;
use yii\data\ActiveDataProvider;
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

    public function actions()
    {
        return array_merge(
            parent::actions(),
            [
                'index' => [
                    'class' => 'yii\rest\IndexAction',
                    'modelClass' => $this->modelClass,
                    'checkAccess' => [$this, 'checkAccess'],
                    'prepareDataProvider' => function ($action) {
                        /* @var $model Post */
                        $model = new $this->modelClass;

                        $query = $model::find();

                        $dataProvider = new ActiveDataProvider(['query' => $query,]);

                        $model->setAttribute('title', @$_GET['title']);
                        $query->andFilterWhere(['like', 'title', $model->title]);

                        return $dataProvider;
                    }
                ]
            ]
        );
    }
}
