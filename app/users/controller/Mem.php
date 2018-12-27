<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/12/15
 * Time: 11:11
 */
namespace app\users\controller;
use app\users\controller\Common;
use think\Db;
use think\Loader;
use think\log\driver\Test;
use think\Request;

class Mem extends Common{
    public function __construct(Request $request = null)
    {
        $this->pd=true;
        parent::__construct($request);
    }

    public function index(){
        $sess=session('lhc_users');
        if($sess['vip']==1){
            exit('当前您是子账户');
        }
        $data=Db::name('guan')->find($sess['id']);
        if($data['lx']==1){
            $where['guanid']=$data['id'];
        }elseif($data['lx']==2){
            $where['zongid']=$data['id'];
        }elseif($data['lx']==3){
            $where['danid']=$data['id'];
        }
        if(input('?stat')){
            $where['stat']=input('stat');
        }
        if(input('size')){
            $where['stat']=['between',[0,1]];
        }
        if(input('ids1')){
            $where['zongid']=input('ids1');
        }
        if(input('ids2')){
            $where['danid']=input('ids2');
        }
        $result_all=Db::name('mem')->where($where)->order(['id'=>'desc'])->paginate(null,null,['query'=>$this->request->param()]);
        $result=$result_all->all();
        $res=[];
        $ids1=input('?ids1') ? input('ids1'): 0;
        if($data['lx']==1){
            $res=Db::name('guan')->where(['lx'=>2,'guan'=>$data['kauser']])->field('id,kauser')->select();
            foreach ($res as $k=>$v){
                if($v['id']==$ids1){
                    $res[$k]['select']=true;
                }else{
                    $res[$k]['select']=false;
                }
            }
        }
        $res1=[];
        $ids2 = input('?ids2') ? input('ids2') : 0;
        if($data['lx']<=2){
            if($data['lx']==1){
                $res1=Db::name('guan')->where(['lx'=>3,'guan'=>$data['kauser']])->field('id,kauser')->select();
            }else{
                $res1=Db::name('guan')->where(['lx'=>3,'zong'=>$data['kauser']])->field('id,kauser')->select();
            }
            foreach ($res1 as $k=>$v){
                if($v['id']==$ids2){
                    $res1[$k]['select']=true;
                }else{
                    $res1[$k]['select']=false;
                }
            }
        }
        return $this->fetch('',[
            'res'=>$res,
            'res1'=>$res1,
            'data'=>$data,
            'result'=>$result,
            'page'=>$result_all->render(),
        ]);
    }
    //默认只有lx=3的代理才能添加会员
    public function addMem(){
        $sess=session('lhc_users');
        if($sess['vip']==1){
            exit('当前您是子账户');
        }
        $id=input('id') ? input('id') :$sess['id'];
        $data=Db::name('guan')->find($id);
        $danid=0;
        $res1=[];
        $tmb=0;
        $maxnum=0;
        $ids=$data['id'];
        $rs1=0;
        if(input('id')){
            $rx=Db::name('guan')->where(['lx'=>3,'id'=>input('id')])->field('id,kauser,sf,cs,rs')->find();
            if($rx){
                $r=Db::name('mem')->field(['sum(cs) sum'])->where(['danid'=>$rx['id']])->select();
                $mumu=empty($r) ? 0:$r[0]['sum'];
                //��ǰ����������ע�Ľ��
                $r=Db::name('tan')->field(['sum(sum_m) sum'])->where(['kithe'=>getKitheNum(),'username'=>$rx['kauser']])->select();
                $mkmk=empty($r) ? 0 : $r[0]['sum'];
                $rs1=Db::name('mem')->where(['danid'=>$rx['id']])->count();
                $rs1=$rx['rs']-$rs1;   //当前代理还能添加的会员数量
                $danid=$rx['id'];
                $maxnum=$rx['cs']-$mumu-$mkmk;
                $istar=0;
                $iend=$rx['sf'];
            }else{
                $maxnum=2000000000;
                $istar=0;
                $iend=100;
            }
        }
        $pd=input('?id') ? input('?id') : 0;
        if($data['lx'] <=2){
            if($data['lx']==1){
                $res1=Db::name('guan')->field('id,kauser,sf,cs')->where(['lx'=>3,'guan'=>$data['kauser']])->select();
            }
            if($data['lx']==2){
                $res1=Db::name('guan')->field('id,kauser,sf,cs')->where(['lx'=>3,'zong'=>$data['kauser']])->select();
            }
            foreach ($res1 as $k=>$v){
                if($v['id']==input('id')){
                    $res1[$k]['select']=true;
                }else{
                    $res1[$k]['select']=false;
                }
            }
        }
        if($data['lx']==3){
            $res=Db::name('guan')->field('id,kauser,sf,cs,tmb,rs')->where(['kauser'=>$data['kauser'],'lx'=>3])->find();
            if($res){
                //当前代理创建的会员的总的信用额度
                $r=Db::name('mem')->field(['sum(cs) sum'])->where(['danid'=>$res['id']])->select();
                $mumu=empty($r) ? 0:$r[0]['sum'];
                //当前代理本期下注的总金额
                $r=Db::name('tan')->field(['sum(sum_m) sum'])->where(['kithe'=>getKitheNum(),'username'=>$res['kauser']])->select();
                $mkmk=empty($r) ? 0 : $r[0]['sum'];
                $rs1=Db::name('mem')->where(['danid'=>$res['id']])->count();
                $rs1=$res['rs']-$rs1;
                $danid=$res['id'];
                $maxnum=$res['cs']-$mumu-$mkmk;
                $istar=0;
                $iend=$res['sf'];
                $tmb=$res['tmb'];
            }else{
                $maxnum=2000000000;
                $istar=0;
                $iend=100;
                $tmb=0;
            }
        }
        return $this->fetch('',[
            'data'=>$data,
            'danid'=>$danid,
            'res1'=>$res1,
            'tmb'=>$tmb,
            'ids'=>$ids,
            'rs1'=>$rs1,
            'maxnum'=>$maxnum,
        ]);
    }

    //保存会员  新增两张表的数据   ka_mem  和 ka_quota 表
    public function saveMem(){
        if(input('?act') && input('act')=='add' && input('?id')){
            if(input('rs1')<=0){
                $this->error('对不起，会员已满');
            }
            if (!input('kauser')) {
                $this->error('用户名不能为空');
            }
            if (!input('kapassword')) {
                $this->error('密码不能为空');
            }
            if(!input('xy')){
                $this->error('最低限额不能为空');
            }
            if (input('cs') > input('kyx')) {
                $this->error('信用额度超过可用信用额!');
            }
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
            //新增数据
            $pass = md5(input('kapassword'));
            $text=date("Y-m-d H:i:s");
            $ip=$this->request->ip();
            $row=Db::name('guan')->where(['id'=>input('danid')])->find();
            $guan=$row['guan'];
            $guanid=$row['guanid'];
            $zongid=$row['zongid'];
            $zong=$row['zong'];
            $danid=$row['id'];
            $dan=$row['kauser'];
            $dan_zc=$row['sf']/10;
            $zong_zc=$row['sj']/10;
            $rows=Db::name('guan')->where(['id'=>$zongid])->find();
            $guan_zc=$rows['sj']/10;
            $dagu_zc=10-$guan_zc-$dan_zc-$zong_zc;
            //新增数据
            $arr=[
                'kauser'=>input('kauser'),
                'kapassword'=>$pass,
                'xm'=>input('xm'),
                'tmb'=>input('tmb'),
                'cs'=>input('cs'),
                'ts'=>input('ts'),
                'guan'=>$guan,
                'zong'=>$zong,
                'dan'=>$dan,
                'stat'=>$stat,
                'xy'=>input('xy'),
                'guanid'=>$guanid,
                'zongid'=>$zongid,
                'danid'=>$danid,
                'look'=>0,
                'adddate'=>$text,
                'slogin'=>$text,
                'zlogin'=>$text,
                'sip'=>$ip,
                'zip'=>$ip,
                'abcd'=>input('abcd'),
                'dan_zc'=>$dan_zc,
                'guan_zc'=>$guan_zc,
                'zong_zc'=>$zong_zc,
                'dagu_zc'=>$dagu_zc,
                'ma'=>input('ma'),
                'mb'=>input('mb'),
                'mc'=>input('mc'),
                'md'=>input('md')
            ];
            if(!Db::name('mem')->insert($arr)){
                $this->error('新增会员失败');
            }
            $insertId=Db::name('mem')->getLastInsID();

            //当前代理所有的
            $data=Db::name('quota')->where(['lx'=>0,'userid'=>$danid,'flag'=>0])->select();
            foreach ($data as $k=>$v){
                switch (input('abcd')){
                    case 'A':
                        $yg=$v['yg'];
                        break;
                    case 'B':
                        $yg=$v['ygb'];
                        break;
                    case 'C':
                        $yg=$v['ygc'];
                        break;
                    case 'D':
                        $yg=$v['ygd'];
                        break;
                    default:
                        $yg=$v['yg'];
                        break;
                }
                $sz=[
                    'yg'=>$yg,
                    'ygb'=>0,
                    'ygc'=>0,
                    'ygd'=>0,
                    'xx'=>$v['xx'],
                    'xxx'=>$v['xxx'],
                    'username'=>input('kauser'),
                    'userid'=>$insertId,
                    'lx'=>0,
                    'flag'=>1,
                    'guanid'=>$guanid,
                    'zongid'=>$zongid,
                    'danid'=>$danid,
                    'memid'=>$insertId,
                    'ds'=>$v['ds'],
                    'abcd'=>input('abcd')
                ];
                Db::name('quota')->insert($sz);
            }
            $this->success('新增会员成功','index');
        }
    }


    //修改会员
    public function updateMem(){
        if(!input('?id')){
            $this->error('非法访问');
        }
        $result=Db::name('mem')->find(input('id'));
        if(!$result)$this->error('当前会员不存在!');
        $id=input('id');
        $dai=Db::name('guan')->field('id,kauser,sf,cs,tmb')->where(['id'=>$result['danid'],'lx'=>3])->find();
        if($dai){
            $r1=Db::name('mem')->field('sum(cs) sum')->where(['danid'=>$dai['id']])->select();
            $mumu=$r1[0]['sum'];
            $r1=Db::name('tan')->field('sum(sum_m) sum')->where(['kithe'=>getKitheNum(),'username'=>$dai['kauser']])->select();
            $mkmk=$r1[0]['sum'];
            $maxnum=$dai['cs']-$mumu-$mkmk+$result['cs'];       //当前代理总信用额 剩余的值
            $danid=$dai['id'];
            $istar=0;
            $iend=$dai['sf'];
            $tmb=$dai['tmb'];
        }else{
            $maxnum=2000000000;
            $istar=0;
            $iend=100;
            $tmb=0;
        }

        //第二个表格  六合彩下注限制
        $r2=Db::name('quota')->where(['lx'=>0,'userid'=>input('id'),'flag'=>1])->select();
        foreach ($r2 as $k=>$v){
            $r2[$k]['row']=Db::name('quota')->where(['ds'=>$v['ds'],'lx'=>$v['lx'],'userid'=>$danid,'flag'=>0])->find();
        }

        return $this->fetch('',[
            'id'=>$id,
            'result'=>$result,
            'maxnum'=>$maxnum,
            'tmb'=>$tmb,
            'istar'=>$istar,
            'iend'=>$iend+1,
            'r2'=>$r2,
        ]);
    }

    public function saveUpdate(){
        if(!$this->request->isPost() && input('act')!='update')$this->error('非法访问');
        if(getKithe(29)==1 || getKithe(33)==0)$this->error('对不起,现在不能设置占成!');
        if(!input('xy'))$this->error('最低限额不能为空');
        if(input('cs') >input('kyx'))$this->error('信用额度超过可用信用额');
        $stat=input('tv6')=='是' ? 0 : 1;
        $row=Db::name('mem')->find(input('id'));
        $cs=$row['cs'];
        $ts=$row['ts'];
        $abcd=$row['abcd'];
        $danid=$row['danid'];
        $where=[
            'id'=>input('id'),
            'xm'=>input('xm'),
            'cs'=>input('cs'),
            'stat'=>$stat,
            'xy'=>input('xy'),
            'tmb'=>input('tmb'),
            'abcd'=>input('abcd'),
            'ma'=>input('ma'),
            'mb'=>input('mb'),
            'mc'=>input('mc'),
            'md'=>input('md'),
        ];
        if(input('kapassword')){
            $where['kapassword']=trim(md5(input('kapassword')));
        }
        if(input('cs')>$cs){
            $where['ts']=$ts+(input('cs')-$cs);
        }
        if(input('cs')<$cs){
            $where['ts']=$ts-($cs-input('cs'));
        }
        $pd1=Db::name('mem')->update($where);

        if (input('sf')!=$row['dan_zc']*10 ){
            $rows=Db::name('guan')->find($danid);
            $vvz=($rows['sj']+$rows['sf']-input('sf'))/10;
            $zongsj=$vvz;
            $exe=Db::name('mem')->where(['id'=>input('id')])->update(['dan_zc'=>input('sf')/10,'zong_zc'=>$vvz]);
        }

        if ($abcd==input('abcd')){
            $yg=input('m/a');
            $ds=input('ds/a');
            $ygid=input('ygid/a');
            $mm=input('mm/a');
            $mmm=input('mmm/a');
            for ($I=0; $I<count($yg); $I=$I+1)
            {
                $_POST['mmm'.$I];
                $exe=Db::name('quota')->where(['id'=>$ygid[$I]])->update(['yg'=>$yg[$I],'xx'=>$mm[$I],'xxx'=>$mmm[$I],'abcd'=>input('abcd')]);
            }
        }else{
            $result = Db::name('quota') ->where(['lx'=>0,'userid'=>$danid,'flag'=>0])->select();
            $t=0;
            foreach ($result as $k=>$v){
                if(input('abcd') =='A')$yg=$v['yg'];
                if(input('abcd') =='B')$yg=$v['ygb'];
                if(input('abcd') =='C')$yg=$v['ygc'];
                if(input('abcd') =='D')$yg=$v['ygd'];
                $exe=Db::name('quota')->where(['userid'=>input('id'),'ds'=>$v['ds'],'flag'=>1])->update(['yg'=>$yg,'xx'=>$v['xx'],'xxx'=>$v['xxx'],'ds'=>$v['ds'],'abcd'=>input('abcd')]);
            }
        }
        $this->success('会员信息修改成功',url('index'));

    }
}