<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "news2rubric".
 *
 * @property int $id
 * @property int $id_news
 * @property int $id_rubric
 */
class News2rubric extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'news2rubric';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_news', 'id_rubric'], 'required'],
            [['id_news', 'id_rubric'], 'integer'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'id_news' => 'Id News',
            'id_rubric' => 'Id Rubric',
        ];
    }

    /**
     * {@inheritdoc}
     * @return \frontend\models\News2rubricQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \frontend\models\News2rubricQuery(get_called_class());
    }
}
