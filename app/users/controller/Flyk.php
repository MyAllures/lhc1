<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/12/19
 * Time: 14:47
 */
namespace app\users\controller;
use app\users\controller\Common;
use think\Db;
/*分类盈亏*/
class Flyk extends  Common{
    public  function  index(){
        $kithe=input('?kithe') ? input('kithe') : getKitheNum();
        $sess=session('lhc_users');
        $data=Db::name('guan')->where(['kauser'=>$sess['kauser']])->find();
        $z_re=0;
        $z_st=0;
        $z_sum=0;
        $z_dagu=0;
        $z_guan=0;
        $z_zong=0;
        $z_dai=0;
        $sum_mt=0;
        $sum_ct=0;
        $re=0;

        if($data['lx']==1){
            $res=Db::name('tan')->where(['kithe'=>$kithe,'guan'=>$data['kauser']])->field('class2')->distinct(true)->select();
        }
        if($data['lx']==2){
            $res=Db::name('tan')->where(['kithe'=>$kithe,'zong'=>$data['kauser']])->field('class2')->distinct(true)->select();
        }
        if($data['lx']==3){
            $res=Db::name('tan')->where(['kithe'=>$kithe,'dai'=>$data['kauser']])->field('class2')->distinct(true)->select();
        }

        foreach ($res as $k=>$v){
            if($data['lx']==1){
                $Rs5=Db::name('tan')->where(['kithe'=>$kithe,'class2'=>$v['class2'],'guan'=>$data['kauser']])->field(['sum(sum_m) sum_m','count(*) re','sum(sum_m*guan_zc/10) dagu_zc','sum(sum_m*rate*bm-sum_m+sum_m*Abs(user_ds)/100) sum_mt','sum(sum_m*rate*guan_zc/10*bm-sum_m*guan_zc/10+sum_m*Abs(guan_ds)/100*guan_zc/10) sum_ct','sum(sum_m-sum_m*abs(user_ds)/100) sum_st'])->select();
            }
            if($data['lx']==2){
                $Rs5=Db::name('tan')->where(['kithe'=>$kithe,'class2'=>$v['class2'],'zong'=>$data['kauser']])->field(['sum(sum_m) sum_m','count(*) re','sum(sum_m*guan_zc/10) dagu_zc','sum(sum_m*rate*bm-sum_m+sum_m*Abs(user_ds)/100) sum_mt','sum(sum_m*rate*guan_zc/10*bm-sum_m*guan_zc/10+sum_m*Abs(guan_ds)/100*guan_zc/10) sum_ct','sum(sum_m-sum_m*abs(user_ds)/100) sum_st'])->select();
            }
            if($data['lx']==3){
                $Rs5=Db::name('tan')->where(['kithe'=>$kithe,'class2'=>$v['class2'],'dai'=>$data['kauser']])->field(['sum(sum_m) sum_m','count(*) re','sum(sum_m*guan_zc/10) dagu_zc','sum(sum_m*rate*bm-sum_m+sum_m*Abs(user_ds)/100) sum_mt','sum(sum_m*rate*guan_zc/10*bm-sum_m*guan_zc/10+sum_m*Abs(guan_ds)/100*guan_zc/10) sum_ct','sum(sum_m-sum_m*abs(user_ds)/100) sum_st'])->select();
            }
            $z_st+=$Rs5[0]['sum_st'];
            $z_re+=$Rs5[0]['re'];
            $z_sum+=$Rs5[0]['sum_m'];
            $z_dagu+=$Rs5[0]['dagu_zc'];
            $sum_mt+=$Rs5[0]['sum_mt'];
            $sum_ct+=$Rs5[0]['sum_ct'];
            $res[$k]['rs5']=$Rs5[0];
        }

        $kitheAll=Db::name('kithe')->field('nn')->order(['nn'=>'desc'])->select();
        return $this->fetch('',[
            'res'=>$res,
            'z_st'=>$z_st,
            'z_sum'=>$z_sum,
            'z_re'=>$z_re,
            'z_dagu'=>$z_dagu,
            'sum_mt'=>$sum_mt,
            'sum_ct'=>$sum_ct,
            'kithe'=>$kithe,
            'kitheAll'=>$kitheAll,
            ]);
    }

    public function index2(){
        if(!input('?kithe') || !input('?class2'))return $this->error('非法访问');
        $sess=session('lhc_users');
        $data=Db::name('guan')->where(['kauser'=>$sess['kauser']])->find();
        $z_re=0;
        $z_sum=0;
        $z_dagu=0;
        $where['kithe']=input('kithe');
        $where['class2']=input('class2');
        if($data['lx']==1){
            $where['guan']=$data['kauser'];
            $res=Db::name('tan')->where($where)->order('id desc')->select();
        }
        if($data['lx']==2){
            $where['zong']=$data['kauser'];
            $res=Db::name('tan')->where($where)->order('id desc')->select();
        }
        if($data['lx']==3){
            $where['dai']=$data['kauser'];
            $res=Db::name('tan')->where($where)->order('id desc')->select();
        }
        $z_userds=0;        //会员佣金总计
        $z_user=0;          //会员盈亏总计
        $z_daids=0;         //代理佣金总计
        foreach ($res as $k=>$v){
            $z_re++;
            $z_sum+=$v['sum_m'];
            $res[$k]['mem']=Db::name('mem')->where(['kauser'=>$v['username']])->find();
            $res[$k]['daids_one']=0;
            if($v['bm']!=2){
                if($v['bm']==1)$z_user+=($v['sum_m']*$v['rate']-$v['sum_m']+$v['sum_m']*abs($v['user_ds'])/100);
                else $z_user+=($v['sum_m']*abs($v['user_ds'])/100-$v['sum_m']);
                $z_userds+=$v['sum_m']*abs($v['user_ds'])/100;
                $res[$k]['daids_one']=($v['sum_m']*abs($v['dai_ds']-$v['user_ds'])/100);
                $z_daids+=($v['sum_m']*abs($v['dai_ds']-$v['user_ds'])/100);
            }
        }
        return $this->fetch('',[
            'z_re'=>$z_re,
            'z_userds'=>$z_userds,
            'z_user'=>$z_user,
            'z_daids'=>$z_daids,
            'z_sum'=>$z_sum,
            'res'=>$res,
            'data'=>$data
        ]);
    }
}