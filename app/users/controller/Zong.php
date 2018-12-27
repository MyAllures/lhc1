<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/12/21
 * Time: 10:48
 */
namespace app\users\controller;
use think\Db;
use app\users\controller\Common;
use think\Request;
/*总代理--栏目*/
class Zong extends Common{
    public function __construct(Request $request = null)
    {
        $this->pd=true;
        parent::__construct($request);
    }

    public function index(){
        $data=$this->guan;
        if($data['lx'] >1)$this->error('您权限不足以访问');

        $where=['lx'=>2,'guan'=>$data['kauser']];
        if(input('kauser')){
            $where['kauser']=['like','%'.input('kauser').'%'];
        }
        if(input('?stat')){
            $where['stat']=input('stat');
        }
        if(input('?size') && input('size')=='all'){
            $where['stat']=['between',[0,1]];
        }
        $ids=input('ids') ? input('ids') : 0;

        $result=Db::name('guan')->where($where)->order('id desc')->paginate();
        $res=$result->all();
        foreach ($res as $k=>$v){
            $r1=Db::name('guan')->field('SUM(cs) As sum_m')->where(['lx'=>3,'zongid'=>$v['id']])->select();
            $mumu=$r1[0]['sum_m'];
            $r1=Db::name('tan')->field('SUM(sum_m) As sum_m')->where(['kithe'=>getKitheNum(),'username'=>$v['kauser']])->select();
            $mkmk=$r1[0]['sum_m'];

            $res[$k]['memnum1']=Db::name('guan')->where(['lx'=>3,'zongid'=>$v['id']])->count();
            $res[$k]['memnum2']=Db::name('mem')->where(['zongid'=>$v['id']])->count();
            $res[$k]['cs_used']=$v['cs']-$mumu-$mkmk;

        }
        return $this->fetch('',[
            'res'=>$res,
            'page'=>$result->render(),
        ]);
    }

    public function addzong(){
        $data=$this->guan;
        if($data['lx'] >1)$this->error('您权限不足以访问');
        if($data){
            $r1=Db::name('guan')->where(['lx'=>2,'guanid'=>$data['id']])->field('SUM(cs) sum_m')->select();
            $mumu=$r1[0]['sum_m'];
            $r1=Db::name('tan')->field('sum(sum_m) sum_m')->where(['kithe'=>getKitheNum(),'username'=>$data['kauser']])->select();
            $mkmk=$r1[0]['sum_m'];
            $r1=Db::name('guan')->where(['lx'=>2,'guanid'=>$data['id']])->field('SUM(rs) As memnum2')->select();
            $rs1=$r1[0]['memnum2'];
            $rs1=$data['rs']-$rs1;
            $guanid=$data['id'];
            $maxnum=$data['cs']-$mumu-$mkmk;
            $istar=0;
            $iend=$data['sf'];
            $tmb=$data['tmb'];
        }else{
            $maxnum=2000000000;
            $istar=0;
            $iend=100;
            $tmb=0;
        }

        $typeData='';
        if($guanid){
            $typeData=Db::name('quota')->where(['userid'=>$guanid,'lx'=>0,'flag'=>0])->select();
        }else{
            $typeData=Db::name('guands')->where(['lx'=>0])->select();
        }
        return $this->fetch('',[
            'data'=>$data,
            'maxnum'=>$maxnum,
            'istart'=>$istar,
            'iend'=>$iend+1,
            'tmb'=>$tmb,
            'rs1'=>$rs1,
            'dataType'=>$typeData
        ]);
    }


    public function savezong(){
        if(!input('?act') || input('act')!='add')$this->error('');
        if (!input('kauser')) {
            $this->error('用户名不能为空 ');
        }
        if (!input('kapassword')) {
            $this->error('密码不能为空');
        }
        if (input('cs') > input('kyx')) {
            $this->error('信用额度超过可用信用额!');
        }

        if (input('sf')+input('sj') >input('sff')) {  //股东占成+总代占成  不能超过股东的占成
            $this->error('对不起,请正确设置占成!');
        }
        if (input('tv5')=="是") $pz=0; else $pz=1;
        if (input('tv6')=="是") $stat=0; else $stat=1;

        $num=Db::name('guan')->where(['kauser'=>input('kauser')])->count();
        if($num!=0){
            $this->error('这一用户名称已被占用，请得新输入！');
        }
        $num=Db::name('mem')->where(['kauser'=>input('kauser')])->count();
        if($num!=0){
            $this->error('这一用户名称已被某会员占用，请得新输入！');
        }
        $num=Db::name('zi')->where(['kauser'=>input('kauser')])->count();
        if($num!=0){
            $this->error('这一用户名称已被某子用户占用，请得新输入！');
        }
        $pass = md5(input('kapassword'));
        $text=date("Y-m-d H:i:s");
        $ip=$this->request->ip();

        $row= Db::name('guan')->find(input('guanid'));
        $guan=$row['kauser'];

        $arr=[
            'kapassword'=>$pass,
            'kauser'=>input('kauser'),
            'xm'=>input('xm'),
            'tmb'=>input('tmb'),
            'rs'=>input('rs'),
            'cs'=>input('cs'),
            'ts'=>input('cs'),
            'sj'=>input('sj'),
            'sf'=>input('sf'),
            'guan'=>$guan,
            'zong'=>input('kauser'),
            'tm'=>500000,
            'zm'=>50000,
            'zt'=>50000,
            'zm6'=>500000,
            'lm'=>50000,
            'gg'=>50000,
            'xx'=>500000,
            'sx'=>50000,
            'bb'=>50000,
            'ws'=>50000,
            'guanid'=>input('guanid'),
            'zongid'=>0,
            'lx'=>2,
            'look'=>0,
            'pz'=>$pz,
            'ztws'=>0,
            'stat'=>$stat,
            'adddate'=>$text,
            'slogin'=>$text,
            'zlogin'=>$text,
            'sip'=>$ip,
            'zip'=>$ip
        ];
        if(!Db::name('guan')->insert($arr)){
            $this->error('新增代理失败');
        }
        $inserId=Db::name('guan')->getLastInsID();


        $yg=input('m/a');
        $ygb=input('ygb/a');
        $ygc=input('ygc/a');
        $ygd=input('ygd/a');
        $xx=input('mm/a');
        $xxx=input('mmm/a');
        $ds=input('ds/a');

        for ($I=0; $I<count($yg); $I=$I+1)
        {
            $sz=[
                'yg'=>$yg[$I],
                'ygb'=>$ygb[$I],
                'ygc'=>$ygc[$I],
                'ygd'=>$ygd[$I],
                'xx'=>$xx[$I],
                'xxx'=>$xxx[$I],
                'ds'=>$ds[$I],
                'username'=>input('kauser'),
                'userid'=>$inserId,
                'lx'=>0,
                'flag'=>0,
                'guanid'=>input('guanid'),
                'zongid'=>0,
                'danid'=>0,
                'memid'=>0
            ];
            Db::name('quota')->insert($sz);
        }
        $this->success('总代理添加成功',url('index'));
    }

    //修改总代
    public function editZong(){
        if(!input('id'))$this->error('非法访问');
        $data=Db::name('guan')->where(['id'=>input('id'),'lx'=>2])->find();
        if(!$data)$this->error('当前总代不存在！');

        //当前总代的所属股东
        $row=Db::name('guan')->field('id,kauser,sf,cs,tmb,rs')->where(['id'=>$data['guanid'],'lx'=>1])->find();
        if($row){
            $r1=Db::name('guan')->where(['lx'=>2,'guanid'=>$row['id']])->field('SUM(cs) sum_m')->select();
            $mumu=$r1[0]['sum_m'];
            $r1=Db::name('tan')->field('sum(sum_m) sum_m')->where(['kithe'=>getKitheNum(),'username'=>$row['kauser']])->select();
            $mkmk=$r1[0]['sum_m'];
            $r1=Db::name('guan')->where(['lx'=>2,'guanid'=>$row['id']])->field('SUM(rs) As memnum2')->select();
            $rs1=$r1[0]['memnum2'];

            $r1=Db::name('guan')->where(['lx'=>3,'zongid'=>$data['id']])->field('SUM(rs) As memnum2')->select();
            $rs2=$r1[0]['memnum2'];

            $rs1=$row['rs']-$rs1+$data['rs'];  //剩余人数
            $guanid=$row['id'];
            $maxnum=$row['cs']-$mumu-$mkmk+$data['cs'];
            $istar=0;
            $iend=$row['sf'];
            $tmb=$row['tmb'];
        }else{
            $maxnum=2000000000;
            $istar=0;
            $iend=100;
            $tmb=0;
        }
        //计算当前用户可用余额
        $r2=Db::name('guan')->where(['lx'=>3,'zongid'=>$data['id']])->field('SUM(cs) As sum_m')->select();
        $mumuf=$r2[0]['sum_m'];
        $r2=Db::name('tan')->where(['kithe'=>getKitheNum(),'username'=>$data['kauser']])->field('SUM(sum_m) As sum_m')->select();
        $mkmkf=$r2[0]['sum_m'];
        $sfsfsf=$data['cs']-$mumuf-$mkmkf;

        //select * from  ka_quota where lx=0 and userid=".$_GET['id']." and flag=0 order by id
        $result=Db::name('quota')->where(['userid'=>input('id'),'lx'=>0,'flag'=>0])->select();
        foreach ($result as $k=>$v){
            $result[$k]['row']=Db::name('quota')->where(['ds'=>$v['ds'],'lx'=>$v['lx'],'userid'=>$v['guanid'],'flag'=>0])->find();
        }
        return $this->fetch('',[
            'data'=>$data,
            'row'=>$row,
            'maxnum'=>$maxnum,
            'istart'=>$istar,
            'iend'=>$iend+1,
            'tmb'=>$tmb,
            'rs1'=>$rs1,
            'rs2'=>$rs2,
            'sfsfsf'=>$sfsfsf,
            'result'=>$result,
        ]);
    }

}