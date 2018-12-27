<?php
namespace app\admin\controller;
use think\Request;

class Index extends Common{
	//后台首页
	public function index(){
	    $admin=session('lhc_admin');
		return $this->fetch('',['admin'=>$admin]);
	}

}



?>