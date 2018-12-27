<?php
namespace app\admin\controller;
use app\admin\controller\Common;
use think\Db;
class Admin extends Common{
	//修改密码
	public function changePass(){
		if($this->request->isAjax()){
			$up=session('lhc_admin');
			$res=Db::name('admin')->find($up['id']);
			if(!$res){
				$this->error('当前管理员不存在');
			}
			$password=md5(input('password1'));
			if($password==$res['password']){
				if(input('password2')!=input('password3')){
                    echo '两次密码不一致';
                    exit;
                }
				if(strlen(input('password2')) >= 5 && strlen(input('password2')) <= 32){
					$rz=[
						'id'=>$res['id'],
						'password'=>md5(input('password2')),
					];
					if(Db::name('admin')->update($rz)){
						echo 'success';
					}else{
						echo '修改失败';
					}
				}else{
					echo '密码长度在5-32位之间';
				}
			}else{
				echo '原密码不正确';
			}
			exit;
		}
		$admin=session('lhc_admin');
		$data=Db::name('admin')->find($admin['id']);
		return $this->fetch('',['data'=>$data]);
	}
}


?>