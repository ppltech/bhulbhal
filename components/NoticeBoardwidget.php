<?php
namespace app\components;
use yii\base\Widget;
use yii\helpers\Html;
use app\models\Notice;

class NoticeBoardwidget extends Widget
{
	public $message;
public function init(){
	$session=\Yii::$app->session;
	if(!isset($session['loggedUser'])){
		$this->message=Notice::findAll(['active'=>1,'access'=>0]);
	}else if($session['loggedUser']==''){
		$this->message=Notice::findAll(['active'=>1,'access'=>0]);
	}else{
		$this->message=Notice::findAll(['active'=>1,'access'=>1]);
	}
                
parent::init();
	if($this->message===null) {
	$this->message= array();
	}else{
	$this->message=$this->message;
	}
}
public function run(){
                 
return $this->render('noticBoardWidgetView',['message' => $this->message]);
}

}