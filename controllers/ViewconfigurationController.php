<?php

namespace app\controllers;

use app\models\UmsViewConfiguration;

class ViewconfigurationController extends \yii\web\Controller
{
    public function actionIndex()
    {
        return $this->render('index');
    }
    
    public function actionGettableinfo($table){
    	//echo $table;
    	$model=UmsViewConfiguration::find()->where(['table_name'=>$table])->all();
    	return $this->renderPartial('tableinfo',['model'=>$model]);
    }

}
