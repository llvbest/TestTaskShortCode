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
        $modelData = Data::find()->where(['page_uid' => $id])->one();
        if(empty($modelData)){
            $data = new Data();
            $data->page_uid = HtmlPurifier::process($id);
            $data->save();
        }
        
        return $modelData;
    }
    
    public function actionUpdate($data)
    {
        $values = (array)$data;
        foreach ($values as &$value) {
            $value = HtmlPurifier::process($value);
        }
        
        $modelData = Data::findOne(['page_uid' => $values['page_id']]);          
        $modelData->attributes = $values;
        if ($modelData->validate()) {
            // все данные корректны
            $modelData->save();
        } else {
            // данные не корректны: $errors - массив содержащий сообщения об ошибках
            $modelData = ['error' => $modelData->errors];
        }
        
        return $modelData;
    }
}
