<?php
// +----------------------------------------------------------------------
// | ThinkPHP [ WE CAN DO IT JUST THINK ]
// +----------------------------------------------------------------------
// | Copyright (c) 2006-2016 http://thinkphp.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: 流年 <liu21st@gmail.com>
// +----------------------------------------------------------------------
use think\Db;
// 应用公共文件

/*cookie的值加密*/
function setcookieValue($value){
	return urlencode($value ^ md5(config('cookiekey')));
}

/*cookie的解密*/
function getcookieValue($value){
	return urldecode($value) ^ md5(config('cookiekey'));
}

/**
 * 生成秘钥
 */
function getSalt(){
	$str='';
	for($i=0;$i<10;$i++){
		$str.=config('salt')[rand(0,strlen(config('salt'))-1)];
	}
	return $str;
}
/**
 * 获取加密密码
 */
function getPassword($pass,$salt=null){
	return empty($salt) ? md5(md5($pass).getSalt()) : md5(md5($pass).$salt);
}

/**
 * 自动关闭
 */
function closePage(){
	echo '<script type="text/javscript">window.close();</script>';
}



function setLoginToken($phone = '') {
	$str = md5(uniqid(md5(microtime(true)), true));
	$str = sha1($str.$phone);
	return $str;
}

//开奖期数  表ka_kithe
function getKitheNum(){
    $res=db('kithe')->where(['na'=>0])->order(['id'=>'desc'])->field('id,nn,nd,na,n1,n2,n3,n4,n5,n6,lx,kitm,kitm1,kizt,kizt1,kizm,kizm1,kizm6,kizm61,kigg,kigg1,kilm,kilm1,kisx,kisx1,kibb,kibb1,kiws,kiws1,zfb,zfbdate,zfbdate1,best,zckg')->find();
    if(!$res)return 1;
    if($res['na']==0 || $res['n1']==0 || $res['n2']==0 || $res['n3']==0 || $res['n4']==0 || $res['n5']==0 || $res['n6']==0){
        return $res['nn'];
    }else{
        return $res['nn']+1;
    }
}

/**
 * 获取最新期数的字段信息  对应 变量$Current_KitheTable[$i]
 * @param $i
 * @return mixed
 */
function getKithe($i){
    $sz=[
        'id', //0
        'nn',
        'nd',
        'na',
        'n1',
        'n2',
        'n3',
        'n4',
        'n5',
        'n6',
        'lx',  //10
        'kitm',
        'kitm1',
        'kizt',
        'kizt1',       //封盘倒计时
        'kizm',
        'kizm1',
        'kizm6',
        'kizm61',
        'kigg',
        'kigg1',//20
        'kilm',
        'kilm1',
        'kisx',
        'kisx1',
        'kibb',
        'kibb1',
        'kiws',
        'kiws1',
        'zfb',
        'zfbdate',   //30       封盘时间
        'zfbdate1',
        'best',
        'zckg'
    ];
    $result=db('kithe')->where(['na'=>0])->order(['id'=>'desc'])->value($sz[$i]);
    return $result;
}

/**
 * 下注总额  表ka_tan  不带类型  getTanKitheSum  带类型
 * @return int
 */
function getKitheSum(){
    $sess=session('lhc_index');
    $res=db('tan')->field(['sum(sum_m) sum'])->where(['kithe'=>getKitheNum(),'username'=>$sess['kauser']])->order(['id'=>'desc'])->select();
    if($res && $res[0]['sum'])return $res[0]['sum'];
    else return 0;
}

/**
 * 会员类型
 * @return array
 * @throws \think\db\exception\DataNotFoundException
 * @throws \think\db\exception\ModelNotFoundException
 * @throws \think\exception\DbException
 */
function getUserType(){
    $res=[];
    $lhc_index=session('lhc_index');
    $result=db('mem')->find($lhc_index['id']);
    $res[]=$result['abcd'];
    if($result){
        if($result['ma']!=$result['abcd'] && $result['ma']!='')$res[]='A';
        if($result['mb']!=$result['abcd'] && $result['mb']!='')$res[]='B';
        if($result['mc']!=$result['abcd'] && $result['mc']!='')$res[]='C';
        if($result['md']!=$result['abcd'] && $result['md']!='')$res[]='D';
    }
    return $res;
}

/**
 * 获取球号对应的颜色
 * @param $i
 * @return string
 */
function getColor($i,$pd=true){
    $result=db('color')->field(['id','color'])->where(['id'=>$i])->find();
    $color='';
    if($pd){
        if ($result['color']=="r"){$color="红波";}
        if ($result['color']=="b"){$color="蓝波";}
        if ($result['color']=="g"){$color="绿波";}
    }else{
        $color=$result['color'];
    }
    return $color;
}

/**
 *获取二级下注类型 对应的所有信息
 * @param $class2
 * @return false|PDOStatement|string|\think\Collection
 * @throws \think\db\exception\DataNotFoundException
 * @throws \think\db\exception\ModelNotFoundException
 * @throws \think\exception\DbException
 */
function getBlByClass2($class2){
    $result=db('bl')->where(['class2'=>$class2])->select();
    return $result;
}

/**
 * 通过rate_id来获取赔率表的字段  代替ka_bl($i,$b) 函数
 * @param $id
 * @return array|false|PDOStatement|string|\think\Model
 * @throws \think\db\exception\DataNotFoundException
 * @throws \think\db\exception\ModelNotFoundException
 * @throws \think\exception\DbException
 */
function getBlById($id){
    $result=db('bl')->where(['id'=>$id])->find();
    return $result;
}

/**
 * 获取每期对应的购买详细数据
 * @param $field
 * @param string $class1
 * @param string $class2
 * @return mixed
 */
function getTanField($field,$class1='',$class2=''){
    $where=[];
    if(!empty($class1))$where['class1']=$class1;
    if(!empty($class2))$where['class2']=$class2;
    return db('tan')->where($where)->value($field);
}

/**
 * 获取最新期数用户的下注金额  可以代替 ka_kk1($i)函数
 * @param $class1 下注类型1
 * @param $class2 下注类型2
 * @param $class2 下注类型3
 * @return number
 */
function getTanKitheSum($class1='',$class2='',$class3='',$username=true){
    $user=session('lhc_index');
    if($username){
        $where=['kithe'=>getKitheNum(),'username'=>$user['kauser']];
    }else{
        $where=['kithe'=>getKitheNum()];
    }

    if($class1)$where['class1']=$class1;
    if($class2)$where['class2']=$class2;
    if($class3)$where['class3']=$class3;
    $res=db('tan')->where($where)->order(['id'=>'desc'])->field(['sum(sum_m) sum'])->select();
    return $res[0]['sum'] ? $res[0]['sum'] : 0;
}

/**
 * 获取用户字段信息   代替了ka_memuser
 * @param $field
 * @return mixed
 */
function getMemField($field){
    $user=session('lhc_index');
    $result=db('mem')->where(['kauser'=>$user['kauser']])->order(['id'=>'desc'])->value($field);
    return $result;
}

/**
 * 获取指定用户配额表quota的制定字段值   原先对应 ka_memds($rate_id,$size) /ka_guands方法
 * @param $xc   数组位置
 * @param $field  字段    ds,yg,xx(单注限额),xxx(单号限额),ygb,ygc,ygd  分别对应0-6
 * @return mixed
 * @throws \think\db\exception\DataNotFoundException
 * @throws \think\db\exception\ModelNotFoundException
 * @throws \think\exception\DbException
 */
function getQuotaField($xc,$field,$username=''){
    $session=session('lhc_index');
    if(!$username)$user=$session['kauser'];
    elseif($username=='dai')$user=getMemField('dan');       //代理?
    elseif($username=='zong')$user=getMemField('zong');     //总代理？
    elseif($username=='guan')$user=getMemField('guan');     //管理员？？
    else $user=$username;
    $result=db('quota')->order(['id'=>'asc'])->where(['username'=>$user])->select();
    return $result[$xc][$field];
}

/**
 * 获取配置表的字段
 * @param $field
 * @return mixed
 * @throws \think\db\exception\DataNotFoundException
 * @throws \think\db\exception\ModelNotFoundException
 * @throws \think\exception\DbException
 */
function getConfigField($field){
    $res=Db::table('config')->order(['id'=>'asc'])->value($field);
    return $res;
}

//生成订单
function randStr($len=12) {
    $chars='0123456789'; // 字符，以建立密码
    mt_srand((double)microtime()*1000000*getmypid()); // 随机数发生器 (必须做)
    $password='';
    while(strlen($password)<$len) $password.=substr($chars,(mt_rand()%strlen($chars)),1);
    return $password;
}
?>