<?php
class view {
	var $smarty;

	 function  __construct() {
		//定数
		$documentroot = dirname(__FILE__) . '/';
		require_once ($documentroot . '../libs/Smarty.class.php');
		$this->smarty = new Smarty;
	}

	function screenView($resource_name){
		$this->smarty->assign("tplfile",$resource_name.'.tpl');
		$this->smarty->display("template.tpl");
	}

	function screenViewAdmin ($resource_name) {
		$this->smarty->assign("tplfile",$resource_name.'.tpl');
		$this->smarty->display("adminTemplate.tpl");
	}

	function screenView_login($resource_name){
		$this->smarty->assign("tplfile",$resource_name.'.tpl');
		$this->smarty->display("template_login.tpl");
	}

	function setAssign($item,$value){
		$this->smarty->assign($item, $value);
	}

	function setAssignAry($ary){
		foreach ($ary as $k => $v) {
			$this->smarty->assign($k, $v);
		}
	}

}
?>
