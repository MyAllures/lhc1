<?php
namespace app\admin\model;
use think\Model;
use think\Db;
use think\Request;
class Admin extends Model{	
	public function login($data){
		$res=db('admin')->where($data)->find();
		if($res){
			//登录成功
			if(input('?post.remember')){
				cookie('lhc',setcookieValue($res['username']),3600*24*7);	//默认保存一周的时间
			}
			session('lhc_admin',['username'=>$res['username'],'id'=>$res['id']]);	//保存的是代理用户的信息
            $upd=[
                'LastLogin'=>date('Y-m-d H:i;s',time()),
                'LastLoginIP'=>\request()->ip()
            ];
            Db::name('admin')->where(['id'=>$res['id']])->update($upd);
            Db::name('admin')->where(['id'=>$res['id']])->setInc('look');
            return 1;
		}else{
			return -1;
		}
	}
}

?>