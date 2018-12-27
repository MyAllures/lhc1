<?php
namespace app\admin\controller;
use think\Controller;
use think\Db;
class Common extends Controller{
	public function _initialize(){
		date_default_timezone_set('Asia/Shanghai');
		$controller=request()->controller();
		$action=request()->action();
		if(!session('lhc_admin')){
			//cookie存在
			if(cookie('?lhc') && $datas=db('admin')->where(['username'=>getcookieValue(cookie('lhc'))])->find()){
				session('lhc_admin',['id'=>$datas['id'],'username'=>$datas['username']]);
                $upd=[
                    'LastLogin'=>date('Y-m-d H:i;s',time()),
                    'LastLoginIP'=>\request()->ip()
                ];
                Db::name('admin')->where(['id'=>$datas['id']])->update($upd);
                Db::name('admin')->where(['id'=>$datas['id']])->setInc('look');
			}else{
				if($controller!='Login')$this->redirect('login/index');
			}
		}else{
			//已登录
			$upd=session('lhc_admin');
			if(Db::name('admin')->where(['username'=>$upd['username']])->find()){
				if(($controller.'/'.$action)=='Login/index')$this->redirect('index/index');
			}else{
				//还有种情况就是用户登录后修改了账号信息
				cookie('lhc',null);
				session('lhc_admin',null);
				$this->error('非法访问');
			}
		}
	}

	/**
	 * 空操作
	 * [_empty description]
	 * @return null
	 */
	public function _empty(){
		exit($this->request->action().' method is undefined!');
	}

	//layui编辑器上传
	public function uploadLayui(){
		$file=request()->file('file');
		if($file){
			$info=$file->move(ROOT_PATH . 'file' . DS . 'layimg');
			if($info){
				return json(['code'=>0,'data'=>['src'=>'/file/layimg/'.$info->getSaveName()]]);
			}else{
				return json(['msg'=>'上传失败']);
			}
		}else{
			return json(['msg'=>$file->getError()]);
		}
	}


}

?>