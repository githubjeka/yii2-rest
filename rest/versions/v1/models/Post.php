<?php

namespace rest\versions\v1\models;

use\common\models\Post as CommonPost;

class Post extends CommonPost
{
    const STATUS_DELETED = 3;

    public function delete()
    {
        $result = false;
        if ($this->beforeDelete()) {

            $result = $this->updateAttributes(['status' => self::STATUS_DELETED]);
            $this->afterDelete();
        };

        return $result;
    }

    public static function find()
    {
        return parent::find()->where('status <>' . self::STATUS_DELETED);
    }
}
