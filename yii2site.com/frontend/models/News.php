<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "news".
 *
 * @property int $id
 * @property string|null $title
 * @property string|null $preview
 * @property string|null $content
 * @property int|null $id_autor
 */
class News extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'news';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['content'], 'string'],
            [['id_autor'], 'integer'],
            [['title'], 'string', 'max' => 100],
            [['preview'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => 'Title',
            'preview' => 'Preview',
            'content' => 'Content',
            'id_autor' => 'Id Autor',
        ];
    }
    
    public function getRubrics()
    {
        return $this->hasMany(\frontend\models\Rubric::className(), ['id' => 'id_rubric'])
            ->viaTable('news2rubric', ['id_news' => 'id']);
    }

    /**
     * {@inheritdoc}
     * @return \frontend\models\NewsQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \frontend\models\NewsQuery(get_called_class());
    }
}
