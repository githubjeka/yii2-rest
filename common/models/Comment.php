<?php

namespace common\models;

use yii\behaviors\TimestampBehavior;

/**
 * This is the model class for table "tbl_comment".
 *
 * @property integer $id
 * @property string $content
 * @property integer $created_at
 * @property integer $updated_at
 * @property integer $post_id
 */
class Comment extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%comment}}';
    }

    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            TimestampBehavior::className(),
        ];
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [
                ['content'],
                'filter',
                'filter' => function ($value) {
                    return \Yii::$app->formatter->asHtml($value);
                }
            ],
            [['content', 'post_id'], 'required'],
            [['content'], 'string', 'max' => 128],
            [['post_id'], 'exist', 'targetClass' => Post::className(), 'targetAttribute' => 'id'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'content' => 'Content',
            'post_id' => 'Post ID',
        ];
    }

    public function fields()
    {
        return [
            'id',
            'content',
            'created_at' => function () {
                return date('d-m-y H:i', $this->created_at);
            },
        ];
    }
}
