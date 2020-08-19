<?php 
namespace frontend\controllers;

use Yii;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use frontend\models\Data;
use yii\helpers\HtmlPurifier;

/**
 * Api controller
 */
class ApiController extends \JsonRpc2\Controller
{
    
    public function actionView($id)
    {
        $json_data = Data::find()->where(['page_uid' => $id])->one();
        if(empty($json_data)){
            $data = new Data();
            $data->page_uid = HtmlPurifier::process($id);
            $data->save();
        }
        
        return $json_data;
    }
    
    public function actionUpdate($data)
    {
        $values = (array)$data;
        foreach ($values as &$value) {
            $value = HtmlPurifier::process($value);
            if(empty($value))
                $value = null;
        }
        
        $modelData = Data::findOne(['page_uid' => $values['page_id']]);          
        $modelData->attributes = $values;
        $json_data = $modelData->save();
        
        return $modelData;
    }
}
