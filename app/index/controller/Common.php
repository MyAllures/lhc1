<?php
namespace app\index\controller;
use think\Controller;
use think\Db;
use think\Request;

class Common extends Controller{
	public function _initialize(){
	    if($this->checkSys('opwww')==1 || is_bool($this->checkSys('opwww')))$this->error('对不起，系统正在维护中...');
		date_default_timezone_set('Asia/Shanghai');
		$controller=request()->controller();
		$action=request()->action();
		if(!session('lhc_index')){
			//cookie存在
			if(cookie('?lhc_index') && $datas=db('mem')->where(['kauser'=>getcookieValue(cookie('lhc_index')),'stat'=>0])->find()){
				session('lhc_index',['id'=>$datas['id'],'kauser'=>$datas['kauser']]);
                $upd=[
                    'zlogin'=>date('Y-m-d H:i;s',time()),
                    'zip'=>\request()->ip()
                ];
                Db::name('mem')->where(['id'=>$datas['id']])->update($upd);
                Db::name('mem')->where(['id'=>$datas['id']])->setInc('look');
			}else{
				if($controller!='Login')$this->redirect('login/index');
			}
		}else{
			//已登录
			$upd=session('lhc_index');
			if(Db::name('mem')->where(['kauser'=>$upd['kauser'],'stat'=>0])->find()){
				if(($controller.'/'.$action)=='Login/index')$this->redirect('index/index');
			}else{
				//还有种情况就是用户登录后修改了账号信息
				cookie('lhc_index',null);
				session('lhc_index',null);
				$this->error('非法访问');
			}
		}
	}

    //判断系统是否正在维护中
    protected function checkSys($i){
	    $res=Db::table('config')->field('id,webname,weburl,tm,tmdx,tmps,zm,zmdx,ggpz,sanimal,affice,fenb,haffice2,a1,a2,a3,a10,opwww,a4,a5,a6,a7,a8,a9')->find();
        if(!$res)return false;
        else{
            return $res[$i];
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

    //封盘判断
    protected function fp($xf){
        if(!getKithe(29) || !getKithe($xf)){
            echo "<table width=60% border=1 align=center cellpadding=4 cellspacing=1 bordercolor=#ffff00 bgcolor=#Fd0000>          <tr>            <td height=28 align=center bgcolor=ff0000><font color=ffff00>封盘中....</font></td>          </tr>      </table>";
            exit;
        }
    }

    //头部通告
    public function tonggao1(){
	    return '<MARQUEE  scrollDelay=120><SPAN id="Msg"><font color="#FFff00">'.getConfigField('affice').'</font></SPAN></MARQUEE>';
    }


}

?>