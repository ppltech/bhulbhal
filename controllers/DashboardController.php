<?php

namespace app\controllers;

use app\models\UmsUser;
use yii\web\Session;
use app\models\UmsOption;
use app\models\UmsRoleOptionMap;
use phpDocumentor\Reflection\Types\This;

class DashboardController extends \yii\web\Controller
{
    public function actionIndex()
    {
    	$this->layout='ums';
    	$model = new UmsUser();
    	$session = new Session();
    	
        return $this->render('index');
    }
    
    
    


}
