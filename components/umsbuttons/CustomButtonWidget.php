<?php
namespace app\components\umsbuttons;
use yii;
use yii\base\Widget;

class CustomButtonWidget extends  Widget{
	public $button;
	public $type;
	
	public function init()
	{
		parent::init();
		$session=\Yii::$app->session;
		$rolearr=array();
		foreach ($session['loggedUser']->umsUserRoleMaps as $values){
			array_push($rolearr, $values->role_id);
		}
		//print_r($rolearr);
		if ($this->button=== 'create') {
			
			$this->type=$_SERVER['REQUEST_URI'];
			$this->button= ' my button '.$this->type;
		}
	}
	
	public function run()
	{
		//return \yii\helpers\Html::encode($this->button);
		return $this->render('CustomButtonWidgetViews',['message' => $this->button]);
	}
}