<?php
namespace app\components;
use yii;
use yii\base\Widget;
use app\models\Company;

class CompanyTreeWidget extends Widget
{
	public $str;
	public $message;
	public $companyoptions;
	
	public function init(){
		
		$detailcompany= Company::find()->all();
		$this->companyoptions=$detailcompany;
		$paired=$this->generatePair($detailcompany);
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
		
		return $this->render('companyWidgetView',['message' => $this->message]);
	}
	
	private function generatePair($detailmenu){
		$tree=array();
		foreach ($detailmenu as $value) {
			$parent=null;
			if($value->parent_sys_company_id==0){
				$parent=null;
			}else{
				$parent=$value->parent_sys_company_id;
			}
			$tree[$value->sys_company_id]=$parent;
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
	}   */
	
	public $cont=0;
	
  	private function printTree($tree) {
		$this->cont++;
		
		if(!is_null($tree) && count($tree) > 0) {
			$this->str .='<ul>';
			
			
			foreach($tree as $node) {
				$this->str.='<li id="company_node_'.$node['name'].'">'.$this->textProvider('name', $node['name']).'';
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
				foreach ($this->companyoptions as $values){
					if($values->sys_company_id==$id)
					{
						$return=$values->company_name;
					}
				}
				break;
			case 'link':
				/* foreach ($this->companyoptions as $values){
					if($values->sys_company_id==$id)
					{
						if($values->option_link=='#'){
							$return='javascript:void(0)';
						}else{
							$return=Yii::$app->homeUrl.$values->option_link;
						}
						
					}
				} */
				$return='javascript:void(0)';
				break;
			case 'iconclassS':
				/* foreach ($this->companyoptions as $values){
					if($values->sys_company_id==$id)
					{
						$return=$values->icon_class;
					}
				} */
				$return='fa-minus';
				break;
			case 'iconclassP':
				/* foreach ($this->companyoptions as $values){
				 if($values->sys_company_id==$id)
				 {
				 $return=$values->icon_class;
				 }
				 } */
				$return='fa-plus';
				break;
		}
		return $return;
	}

}