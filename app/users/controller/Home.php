<?php
namespace app\admin\controller;
use think\Controller;

class Home extends Controller{
	public function console(){
		return $this->fetch();
	}
}

?>