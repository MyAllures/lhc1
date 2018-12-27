<?php
namespace app\index\controller;
use app\index\controller\Common;
use think\Db;
use think\Loader;
class User extends Common{
	/*用户列表*/
	public function index(){
	    $lhc_index=session('lhc_index');
        $user=Db::name('mem')->find($lhc_index['id']);
		return $this->fetch('',['user'=>$user,'user_type'=>getUserType()]);
	}

}

?>