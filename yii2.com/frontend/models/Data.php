<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "data".
 *
 * @property int $id
 * @property string $page_uid
 * @property string $name
 * @property string $email
 * @property string $created дата добавления
 */
class Data extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'data';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['page_uid'], 'required'],
            [['page_uid'], 'unique', 'targetClass' => self::className(),'message' => 'Извините, уже существует в базе данных',],
            [['created'], 'safe'],
            [['page_uid', 'name', 'email'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'page_uid' => 'Page Uid',
            'name' => 'Name',
            'email' => 'Email',
            'created' => 'Created',
        ];
    }
}
