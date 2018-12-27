<?php
namespace app\admin\controller;
use app\admin\controller\Common;
use think\Db;
use app\admin\model\Admin;
use think\Env;
use think\Request;
use think\Loader;

class Login extends Common{
	//登录页
	public function index(){
		return $this->fetch();
	}

	/**
	 * 密码加密方式 md5(md5(密码)+秘钥)
	 * 用户登录中心
	 * @return null
	 */
	public function login(){
		if(request()->isAjax()){
			if(!$res=Db::name('admin')->field('id')->where(['username'=>trim(input('post.username'))])->find()) {
                echo -2;
                exit;
			}
			$data=[
				'username'=>trim(input('post.username')),
				'password'=>md5(input('post.password'))
			];
			$admin=new Admin();
			echo $admin->login($data);
		}else{
			$this->error('非法访问');
		}
	}
	
	/**
	 * 退出登录
	 * @return null
	 */
	public function logout(){
		session('lhc_admin',null);
		cookie('lhc',null);
		$this->redirect('login/index');
	}

}

