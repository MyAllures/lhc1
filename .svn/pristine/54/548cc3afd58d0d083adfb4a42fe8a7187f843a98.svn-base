<?php
namespace app\index\controller;

class Index extends Common{
	//后台首页
	public function index(){
	    $webname=$this->checkSys('webname');
	    $user=session('lhc_index');
		return $this->fetch('',['webname'=>$webname,'user'=>$user]);
	}

}



?>