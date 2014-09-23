<?php
namespace rest\versions\v1;

use yii\base\Module;

class RestModule extends Module
{
    public function init()
    {
        parent::init();

        \Yii::$app->user->identityClass = 'rest\versions\v1\models\User';
    }
}