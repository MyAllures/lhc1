<?php
namespace app\users\controller;
use think\Request;
use think\Db;
class Index extends Common{
	//后台首页
	public function index(){
	    $users=session('lhc_users');
	    if($users['vip']==1){
            $data=Db::name('zi')->find($users['id']);
        }else{
            $data=Db::name('guan')->where(['kauser'=>$users['kauser']])->find();
        }
        $data['vip']=$users['vip'];
		return $this->fetch('',[
		    'admin'=>$data
        ]);
	}
}



?>