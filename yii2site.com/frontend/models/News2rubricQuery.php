<?php

namespace frontend\models;

/**
 * This is the ActiveQuery class for [[\app\models\News2rubric]].
 *
 * @see \app\models\News2rubric
 */
class News2rubricQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return \app\models\News2rubric[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return \app\models\News2rubric|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
