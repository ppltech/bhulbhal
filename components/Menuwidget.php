<?php
namespace app\components;
use yii;
use yii\base\Widget;
use yii\helpers\Html;
use app\models\UmsRole;
use app\models\UmsRoleOptionMap;
use app\models\UmsOption;

class Menuwidget extends Widget
{
	
	public $str;
	public $message;
	public $menuoptions;
	
	public function init(){
		$session=\Yii::$app->session;
		$rolearr=array();
		foreach ($session['loggedUser']->umsUserRoleMaps as $values){
			array_push($rolearr, $values->role_id);
		}
		
		
		$detailmenu=UmsOption::find()->joinWith('umsRoleOptionMaps')->where(['role_id'=>$rolearr])->all();
		//print_r($detailmenu);
		$this->menuoptions=$detailmenu;
		$paired=$this->generatePair($detailmenu);
		
		$result=$this->parseTree($paired);
		
		$this->message=$this->printTree($result);
		
		
		parent::init();
		if($this->message===null) {
			$this->message= array();
		}else{
			$this->message=$this->message;
		}
	}
	public function run(){
		
		return $this->render('menuWidgetView',['message' => $this->message]);
	}
	
	private function generatePair($detailmenu){
		$tree=array();
		foreach ($detailmenu as $value) {
			$parent=null;
			if($value->parent_option_id==0){
				$parent=null;
			}else{
				$parent=$value->parent_option_id;
			}
			$tree[$value->option_id]=$parent;
		}
		
		return $tree;
	}
	
	private function parseTree($tree, $root = null) {
		$return = array();
		# Traverse the tree and search for direct children of the root
		foreach($tree as $child => $parent) {
			# A direct child is found
			if($parent == $root) {
				# Remove item from tree (we don't need to traverse this again)
				unset($tree[$child]);
				# Append the child into result array and parse its children
				$return[] = array(
						'name' => $child,
						'children' => $this->parseTree($tree, $child)
				);
			}
		}
		return empty($return) ? null : $return;
	}
	
	/* private function printTree($tree) {
		
		if(!is_null($tree) && count($tree) > 0) {
			$this->str .='<ul>';
			foreach($tree as $node) {
				$this->str.='<li>'.$node['name'];
				$this->printTree($node['children']);
				$this->str.='</li>';
			}
			$this->str.='</ul>';
		}
		return $this->str;
	} */
	public $cont=0;
	private function printTree($tree) {
		$this->cont++;
		
		if(!is_null($tree) && count($tree) > 0) {
			if($this->cont==1){
				$this->str .='<ul class="nav nav-main">';
			}else{
				$this->str .='<ul class="nav nav-children">';
			}
			
			foreach($tree as $node) {
				if(count($node['children'])==0){
					$this->str.='<li class="nav-active"><a href="'.$this->textProvider('link', $node['name']).'">
                                        <i class="fa '.$this->textProvider('iconclass', $node['name']).'" aria-hidden="true"></i><span>'.$this->textProvider('name', $node['name']).'</span></a>';	
				}else{
					$this->str.='<li class="nav-parent"><a href="'.$this->textProvider('link', $node['name']).'">
                                        <i class="fa '.$this->textProvider('iconclass', $node['name']).'" aria-hidden="true"></i><span>'.$this->textProvider('name', $node['name']).'</span></a>';	
				}
													
                                        
				$this->printTree($node['children']);
				$this->str.='</li>';
				
			}
			$this->str.='</ul>';
			
		}
		
		return $this->str;
	}
	
	private function textProvider($type,$id){
		$return='';
		switch($type){
			case 'name':
				foreach ($this->menuoptions as $values){
					if($values->option_id==$id)
					{
						$return=$values->option_name;
					}
				}
				break;
			case 'link':
				foreach ($this->menuoptions as $values){
					if($values->option_id==$id)
					{
						if($values->option_link=='#'){
							$return='javascript:void(0)';
						}else{
							$return=Yii::$app->homeUrl.$values->option_link;
						}
						
					}
				}
				break;
			case 'iconclass':
				foreach ($this->menuoptions as $values){
					if($values->option_id==$id)
					{
						$return=$values->icon_class;
					}
				}
				break;
		}
		return $return;
	}
	public function actionTree(){
		$tree = array('H' => null,'F' => 'G','G' => 'D','E' => 'D','A' => 'E','B' => 'C','C' => 'E','D' => null);
	}
}