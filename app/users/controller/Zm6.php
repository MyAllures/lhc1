<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/12/22
 * Time: 17:13
 */
namespace app\users\controller;
use app\users\controller\Common;
use think\Db;
/*即时注单 -- 正1-6*/
class Zm6 extends Common{
    public function index(){
        $sess=session('lhc_users');
        $row=Db::name('guan')->where(['kauser'=>$sess['kauser']])->find();
        $ids=input('ids') ? input('ids') : '正码1';
        if ($ids=="正码1") {
            $z6color="494949";
            $z5color="494949";
            $z4color="494949";
            $z3color="494949";
            $z2color="494949";
            $z1color="ff0000";
        }elseif ($ids=="正码2"){
            $z6color="494949";
            $z5color="494949";
            $z4color="494949";
            $z3color="494949";
            $z1color="494949";
            $z2color="ff0000";

        }elseif ($ids=="正码3"){
            $z6color="494949";
            $z5color="494949";
            $z4color="494949";
            $z2color="494949";
            $z1color="494949";
            $z3color="ff0000";
        }elseif ($ids=="正码4"){
            $z6color="494949";
            $z5color="494949";
            $z2color="494949";
            $z3color="494949";
            $z1color="494949";
            $z4color="ff0000";
        }elseif ($ids=="正码5"){
            $z6color="494949";
            $z2color="494949";
            $z4color="494949";
            $z3color="494949";
            $z1color="494949";
            $z5color="ff0000";
        }elseif ($ids=="正码6"){
            $z2color="494949";
            $z5color="494949";
            $z4color="494949";
            $z3color="494949";
            $z1color="494949";
            $z6color="ff0000";
        }

        $best=$row['best'];
        $zm=$row['zm'];
        $zm6=$row['zm6'];
        $lm=$row['lm'];
        $zt=$row['zt'];
        $tm=$row['tm'];
        $sx=$row['sx'];
        $bb=$row['bb'];
        $gg=$row['gg'];
        $ws=$row['ws'];
        $xx=$row['xx'];
        $wx=$row['wx'];
        $pz=$row['pz'];
        $gg=$row['gg'];

        $tm=$zm6;

        $R=38;

        $kithe=input('kithe') ? input('kithe') :getKitheNum();
        if($kithe != getKitheNum())$ftime=20000000;
        $ka_guanid=$row['id'];

        //请求参数
        $tm2=input('tm2') ? input('tm2') : 0;
        $tm1=input('tm1') ? input('tm1') : 0;

        //不同
        $res_bl=Db::name('bl')->where(['class1'=>'正1-6'])->field('distinct(class2)')->select();

        foreach ($res_bl as $k2=>$v2){
            if ($row['lx']==1){
                $r1=Db::name('tan')->field('sum(sum_m) as sum_m,sum(sum_m*guan_zc/10) as sum_mzc')->where(['kithe'=>$kithe,'lx'=>0,'guan'=>$row['kauser'],'class2'=>$v2['class2']])->select();
            }
            if ($row['lx']==2){
                $r1=Db::name('tan')->field('sum(sum_m) as sum_m,sum(sum_m*zong_zc/10) as sum_mzc')->where(['kithe'=>$kithe,'lx'=>0,'zong'=>$row['kauser'],'class2'=>$v2['class2']])->select();
            }
            if ($row['lx']==3){
                $r1=Db::name('tan')->field('sum(sum_m) as sum_m,sum(sum_m*dai_zc/10) as sum_mzc')->where(['kithe'=>$kithe,'lx'=>0,'dai'=>$row['kauser'],'class2'=>$v2['class2']])->select();
            }
            $Rs6=$r1[0];
            if ($Rs6['sum_m']!=""){
                $sum_m3[$k2] = $Rs6['sum_m'];
            }else{
                $sum_m3[$k2] =0;
            }
            if ($Rs6['sum_mzc']!=""){
                $sum_m3zc[$k2] = $Rs6['sum_mzc'];
            }else{
                $sum_m3zc[$k2] =0;
            }
        }

        /*第一个表格  start*/
        $z_re=0;
        $z_sum=0;
        $z_sumzc=0;
        $z_suma=0;
        $z_sumb=0;
        $z_ds=0;
        $z_xx=0;
        $z_pz=0;
        $res=Db::name('bl')->field('distinct(class1)')->where(['class1'=>['neq','花会']])->order('id asc')->select();
        foreach ($res as $k=>$v){
            if($row['lx']==1){
                $r1=Db::name('tan')->field('sum(sum_m) as sum_m,sum(sum_m*guan_zc/10) as sum_mzc,count(*) as re')->where(['kithe'=>$kithe,'lx'=>0,'guan'=>$row['kauser'],'class1'=>$v['class1']])->select();
            }

            if($row['lx']==2){
                $r1=Db::name('tan')->field('sum(sum_m) as sum_m,sum(sum_m*zong_zc/10) as sum_mzc,count(*) as re')->where(['kithe'=>$kithe,'lx'=>0,'zong'=>$row['kauser'],'class1'=>$v['class1']])->select();
            }
            if($row['lx']==3){
                $r1=Db::name('tan')->field('sum(sum_m) as sum_m,sum(sum_m*dai_zc/10) as sum_mzc,count(*) as re')->where(['kithe'=>$kithe,'lx'=>0,'dai'=>$row['kauser'],'class1'=>$v['class1']])->select();
            }
            $Rs5=$r1[0];
            $sum_tm[$k]=$v['class1'];
            $sum_re[$k]=$Rs5['re'];
            if ($Rs5['sum_m'])
                $sum_m[$k] = $Rs5['sum_m'];
            else $sum_m[$k] =0;
            if ($Rs5['sum_mzc'])
                $sum_mzc[$k] = $Rs5['sum_mzc'];
            else
                $sum_mzc[$k] =0;
            $z_re+=$Rs5['re'];
            $z_sum+=$Rs5['sum_m'];
            $z_sumzc+=$Rs5['sum_mzc'];
        }

        if ($row['lx']==1){
            $r1=Db::name('tan')->field('sum(sum_m) as sum_m,sum(sum_m*guan_zc/10) as sum_mzc,count(*) as re')->where(['kithe'=>$kithe,'lx'=>0,'guan'=>$row['kauser'],'class1'=>'过关'])->select();
        }
        if ($row['lx']==2){
            $r1=Db::name('tan')->field('sum(sum_m) as sum_m,sum(sum_m*zong_zc/10) as sum_mzc,count(*) as re')->where(['kithe'=>$kithe,'lx'=>0,'zong'=>$row['kauser'],'class1'=>'过关'])->select();
        }
        if ($row['lx']==3){
            $r1=Db::name('tan')->field('sum(sum_m) as sum_m,sum(sum_m*dai_zc/10) as sum_mzc,count(*) as re')->where(['kithe'=>$kithe,'lx'=>0,'dai'=>$row['kauser'],'class1'=>'过关'])->select();
        }
        $ii=count($res)-1;
        $Rs6=$r1[0];
        $sum_tm[$ii]="过关";
        $sum_re[$ii]=$Rs6['re'];
        if ($Rs6['sum_m']){
            $sum_m[$ii] = $Rs6['sum_m'];
        }else{
            $sum_m[$ii] =0;
        }
        if ($Rs5['sum_mzc']!=""){
            $sum_mzc[$ii] = $Rs5['sum_mzc'];
        }else{
            $sum_mzc[$ii] =0;
        }
        $z_re+=$Rs6['re'];
        $z_sum+=$Rs6['sum_m'];
        $z_sumzc+=$Rs5['sum_mzc'];
        $ii++;
        $b=0;
        $fg=0;
        $i=0;
        $i=0;
        /*第一个表格  end*/


        $kitheAll=Db::name('kithe')->order(['nn'=>'desc'])->select();
        return $this->fetch('',[
            'ids'=>$ids,
            'kithe'=>$kithe,
            'kitheAll'=>$kitheAll,
            'tm2'=>$tm2,
            'tm'=>$tm,
            'tm1'=>$tm1,
            'sum_m'=>$sum_m,
            'z_sum'=>$z_sum,
            'sum_mzc'=>$sum_mzc,
            'z_sumzc'=>$z_sumzc,
        ]);
    }

    //ajax加载
    public function server_tm(){
        $sess=session('lhc_users');
        $row=Db::name('guan')->where(['kauser'=>$sess['kauser']])->find();
        $best=$row['best'];
        $zm=$row['zm'];
        $zm6=$row['zm6'];
        $lm=$row['lm'];
        $zt=$row['zt'];
        $tm=$row['tm'];
        $sx=$row['sx'];
        $bb=$row['bb'];
        $gg=$row['gg'];
        $ws=$row['ws'];
        $xx=$row['xx'];
        $wx=$row['wx'];
        $pz=$row['pz'];
        $ztm_tm=$zm6;
        $class1=input('class1');
        $class2=input('class2');
        $kithe=input('kithe') ? input('kithe') : getKitheNum();

        $z_re=0;
        $z_sum=0;
        $z_suma=0;
        $z_sumb=0;
        $z_ds=0;
        $z_xx=0;
        $z_pz=0;

        $z7_sum=0;
        $z7_ds=0;


//大小
        $z_re_dx=0;
        $z_sum_dx=0;
        $z_suma_dx=0;
        $z_sumb_dx=0;
        $z_ds_dx=0;
        $z_xx_dx=0;
        $z_pz_dx=0;

        $z7_sum_dx=0;
        $z7_ds_dx=0;
//单双
        $z_re_ds=0;
        $z_sum_ds=0;
        $z_suma_ds=0;
        $z_sumb_ds=0;
        $z_ds_ds=0;
        $z_xx_ds=0;
        $z_pz_ds=0;

        $z7_sum_ds=0;
        $z7_ds_ds=0;
//经绿蓝
        $z_re_bs=0;
        $z_sum_bs=0;
        $z_suma_bs=0;
        $z_sumb_bs=0;
        $z_ds_bs=0;
        $z_xx_bs=0;
        $z_pz_bs=0;

        $z7_sum_bs=0;
        $z7_ds_bs=0;
//合大合小
        $z_re_hdx=0;
        $z_sum_hdx=0;
        $z_suma_hdx=0;
        $z_sumb_hdx=0;
        $z_ds_hdx=0;
        $z_xx_hdx=0;
        $z_pz_hdx=0;

        $z7_sum_hdx=0;
        $z7_ds_hdx=0;
//合单合双
        $z_re_hds=0;
        $z_sum_hds=0;
        $z_suma_hds=0;
        $z_sumb_hds=0;
        $z_ds_hds=0;
        $z_xx_hds=0;
        $z_pz_hds=0;

        $z7_sum_hdx=0;
        $z7_ds_hdx=0;
//尾大尾小
        $z_re_wdx=0;
        $z_sum_wdx=0;
        $z_suma_wdx=0;
        $z_sumb_wdx=0;
        $z_ds_wdx=0;
        $z_xx_wdx=0;
        $z_pz_wdx=0;

        $z7_sum_wdx=0;
        $z7_ds_wdx=0;

        if ($row['lx']==1){ $vvvv=['guan'=>$row['kauser']] ; }
        if ($row['lx']==2){ $vvvv=['zong'=>$row['kauser']] ;}
        if ($row['lx']==3){ $vvvv=['dai'=>$row['kauser']] ;}


//        $bbbb="count(*) as re,SUM(sum_m) As sum_money";
//        $tm2=input('tm2');
//        for ($i=1;$i<=49;$i=$i+1){
//            $sum_tm1[$i]=$i;
//        }

        $result=Db::name('bl')->field('distinct(class3),class1,class2')->where(['class1'=>$class1,'class2'=>$class2])->order(['class3'=>'desc'])->select();

        $ii=0;
        foreach ($result as $v){
//            if ($ii<49){
//                $tem_index=intval($v['class3']);
////                $my_money=$sum_money1[$tem_index];  //?没什么必要
//            }else{
//                $my_money=0;
//            }
//            $my_money=0;
            if ($row['lx']==1){
                $field1="sum(sum_m) as sum_m,count(*) as re,sum(sum_m*(guan_ds-zong_ds)/1000) as sum_ds,sum(0-sum_m*rate*guan_zc/10) as sum_m3";
                $w1=array_merge($vvvv,['kithe'=>$kithe,'username'=>['neq',$row['kauser']],'class1'=>$v['class1'],'class2'=>$class2,'class3'=>$v['class3']]);
                $r=Db::name('tan')->field($field1)->where($w1)->select();
                $Rs5=$r[0];

                $field1="sum(sum_m*rate) as sum_money,count(*) as re,sum(sum_m*(user_ds/100)) as sum_ds,sum(sum_m) as sum_m3";
                $w1=array_merge($vvvv,['kithe'=>$kithe,'username'=>$row['kauser'],'class1'=>$v['class1'],'class2'=>$class2,'class3'=>$v['class3']]);
                $r=Db::name('tan')->field($field1)->where($w1)->select();
                $Rs7=$r[0];

                $field1="sum(sum_m*guan_zc/10) as sum_moneya";
                $w1=array_merge($vvvv,['kithe'=>$kithe,'class1'=>$v['class1'],'class2'=>$class2,'class3'=>$v['class3']]);
                $r=Db::name('tan')->field($field1)->where($w1)->select();
                $RsA=$r[0];

                $field1="sum(sum_m*guan_zc/10) as sum_moneyb";
                $w1=array_merge($vvvv,['kithe'=>$kithe,'class1'=>$v['class1'],'class2'=>'特B','class3'=>$v['class3']]);
                $r=Db::name('tan')->field($field1)->where($w1)->select();
                $RsB=$r[0];

            }
            if ($row['lx']==2){
                $field1="sum(sum_m) as sum_m,count(*) as re,sum(sum_m*(zong_ds-dai_ds)/1000) as sum_ds,sum(0-sum_m*rate*zong_zc/10) as sum_m3";
                $w1=array_merge($vvvv,['kithe'=>$kithe,'username'=>['neq',$row['kauser']],'class1'=>$v['class1'],'class2'=>$class2,'class3'=>$v['class3']]);
                $r=Db::name('tan')->field($field1)->where($w1)->select();
                $Rs5=$r[0];

                $field1="sum(sum_m*rate) as sum_money,count(*) as re,sum(sum_m*(user_ds/100)) as sum_ds,sum(sum_m) as sum_m3";
                $w1=array_merge($vvvv,['kithe'=>$kithe,'username'=>$row['kauser'],'class1'=>$v['class1'],'class2'=>$class2,'class3'=>$v['class3']]);
                $r=Db::name('tan')->field($field1)->where($w1)->select();
                $Rs7=$r[0];

                $field1="sum(sum_m*zong_zc/10) as sum_moneya";
                $w1=array_merge($vvvv,['kithe'=>$kithe,'class1'=>$v['class1'],'class2'=>$class2,'class3'=>$v['class3']]);
                $r=Db::name('tan')->field($field1)->where($w1)->select();
                $RsA=$r[0];

                $field1="sum(sum_m*zong_zc/10) as sum_moneyb";
                $w1=array_merge($vvvv,['kithe'=>$kithe,'class1'=>$v['class1'],'class2'=>'特B','class3'=>$v['class3']]);
                $r=Db::name('tan')->field($field1)->where($w1)->select();
                $RsB=$r[0];

            }
            if ($row['lx']==3){
                $field1="sum(sum_m) as sum_m,count(*) as re,sum(sum_m*(dai_ds-user_ds)/1000) as sum_ds,sum(0-sum_m*rate*dai_zc/10) as sum_m3";
                $w1=array_merge($vvvv,['kithe'=>$kithe,'username'=>['neq',$row['kauser']],'class1'=>$v['class1'],'class2'=>$class2,'class3'=>$v['class3']]);
                $r=Db::name('tan')->field($field1)->where($w1)->select();
                $Rs5=$r[0];

                $field1="sum(sum_m*rate) as sum_money,count(*) as re,sum(sum_m*(user_ds/100)) as sum_ds,sum(sum_m) as sum_m3";
                $w1=array_merge($vvvv,['kithe'=>$kithe,'username'=>$row['kauser'],'class1'=>$v['class1'],'class2'=>$class2,'class3'=>$v['class3']]);
                $r=Db::name('tan')->field($field1)->where($w1)->select();
                $Rs7=$r[0];

                $field1="sum(sum_m*dai_zc/10) as sum_moneya";
                $w1=array_merge($vvvv,['kithe'=>$kithe,'class1'=>$v['class1'],'class2'=>$class2,'class3'=>$v['class3']]);
                $r=Db::name('tan')->field($field1)->where($w1)->select();
                $RsA=$r[0];

                $field1="sum(sum_m*dai_zc/10) as sum_moneyb";
                $w1=array_merge($vvvv,['kithe'=>$kithe,'class1'=>$v['class1'],'class2'=>'特B','class3'=>$v['class3']]);
                $r=Db::name('tan')->field($field1)->where($w1)->select();
                $RsB=$r[0];

            }

            //自定义数据处理
            foreach ($Rs5 as $k1=>$v1){
                if(!$v)$Rs5[$k1]=0;
            }
            foreach ($Rs7 as $k1=>$v1){
                if(!$v)$Rs7[$k1]=0;
            }
            foreach ($RsA as $k1=>$v1){
                if(!$v)$RsA[$k1]=0;
            }
            foreach ($RsB as $k1=>$v1){
                if(!$v)$RsB[$k1]=0;
            }

            $Rsbl = Db::name('bl')->where(['class1'=>$v['class1'],'class2'=>$class2,'class3'=>$v['class3']])->find();
//            if($Rs5['sum_m']!=""){$my_sum_m_5=$Rs5['sum_m'];}else{$my_sum_m_5=$my_money;}
//            $my_re_5=$Rs5['re'];
//            $my_sum_ds_5=$Rs5['sum_ds'];
//            $my_sum_m3_5=$Rs5['sum_m3'];
//            $my_sum_m_7=$Rs7['sum_money'];
//            $my_re_7=$Rs7['re'];
//            $my_sum_ds_7=$Rs7['sum_ds'];
//            $my_sum_m3_7=$Rs7['sum_m3'];
//            $my_sum_moneya=$RsA['sum_moneya'];
//            $my_sum_moneyb=$RsB['sum_moneyb'];
//            $my_rate=$Rsbl['rate'];


            //一条记录用"###"隔开.每列数据用"@@@"隔开. 这是以只有两个列数据的情况.


            if ($v['class2']=="红波") {
                $sum_color[$ii]="ff0000";
            }else if ($v['class3']=="蓝波"){
                $sum_color[$ii]="0000FF";
            }else if ($v['class3']=="绿波"){
                $sum_color[$ii]="00FF00";
            }else if ($v['class3']=="大"){
                $sum_color[$ii]="FF9900";
            }else if ($v['class3']=="小"){
                $sum_color[$ii]="FF9900";
            }else if ($v['class3']=="单"){
                $sum_color[$ii]="FF0066";
            }else if ($v['class3']=="双"){
                $sum_color[$ii]="FF0066";
            }else{
                $sum_color[$ii]="333333";
            }

            $sum_tm[$ii]=$v['class3'];
            $sum_re[$ii]=$Rs5['re'];
            if ($Rs5['sum_m']!=""){
                $sum_m[$ii] = $Rs5['sum_m'];
            }else{
                $sum_m[$ii] =0;
            }

            if ($RsA['sum_moneya']!=""){$sum_ma[$ii] =$RsA['sum_moneya'];}else{$sum_ma[$ii] =0;}
            if ($RsB['sum_moneyb']!=""){$sum_mb[$ii] =$RsB['sum_moneyb'];}else{$sum_mb[$ii] =0;}

            $sum_ds[$ii]=$Rs5['sum_ds'];
            $sum_xx[$ii]=$Rs5['sum_m3'];

            if ($Rsbl['rate']!=""){
                $sum_bl[$ii]=$Rsbl['rate'];
            }else{
                $sum_bl[$ii]=0;
            }

            if($sum_tm[$ii]=="大"||$sum_tm[$ii]=="小"){
                $z_re_dx+=$Rs5['re'];

                $z_sum_dx+=$Rs5['sum_m'];

                $z_suma_dx+=$RsA['sum_moneya'];
                $z_sumb_dx+=$RsB['sum_moneyb'];
                $z_ds_dx+=$Rs5['sum_ds'];
                $z_xx_dx+=$Rs5['sum_m3'];
                $z_pz_dx+=$Rs7['sum_m3'];
            }elseif($sum_tm[$ii]=="单"||$sum_tm[$ii]=="双"){
                $z_re_ds+=$Rs5['re'];

                $z_sum_ds+=$Rs5['sum_m'];

                $z_suma_ds+=$RsA['sum_moneya'];
                $z_sumb_ds+=$RsB['sum_moneyb'];
                $z_ds_ds+=$Rs5['sum_ds'];
                $z_xx_ds+=$Rs5['sum_m3'];
                $z_pz_ds+=$Rs7['sum_m3'];
            }elseif($sum_tm[$ii]=="红波"||$sum_tm[$ii]=="绿波"||$sum_tm[$ii]=="蓝波"){
                $z_re_bs+=$Rs5['re'];

                $z_sum_bs+=$Rs5['sum_m'];

                $z_suma_bs+=$RsA['sum_moneya'];
                $z_sumb_bs+=$RsB['sum_moneyb'];
                $z_ds_bs+=$Rs5['sum_ds'];
                $z_xx_bs+=$Rs5['sum_m3'];
                $z_pz_bs+=$Rs7['sum_m3'];
            }elseif($sum_tm[$ii]=="合大"||$sum_tm[$ii]=="合小"){
                $z_re_hdx+=$Rs5['re'];

                $z_sum_hdx+=$Rs5['sum_m'];

                $z_suma_hdx+=$RsA['sum_moneya'];
                $z_sumb_hdx+=$RsB['sum_moneyb'];
                $z_ds_hdx+=$Rs5['sum_ds'];
                $z_xx_hdx+=$Rs5['sum_m3'];
                $z_pz_hdx+=$Rs7['sum_m3'];
            }elseif($sum_tm[$ii]=="合单"||$sum_tm[$ii]=="合双"){
                $z_re_hds+=$Rs5['re'];

                $z_sum_hds+=$Rs5['sum_m'];

                $z_suma_hds+=$RsA['sum_moneya'];
                $z_sumb_hds+=$RsB['sum_moneyb'];
                $z_ds_hds+=$Rs5['sum_ds'];
                $z_xx_hds+=$Rs5['sum_m3'];
                $z_pz_hds+=$Rs7['sum_m3'];
            }elseif($sum_tm[$ii]=="尾大"||$sum_tm[$ii]=="尾小"){
                $z_re_wdx+=$Rs5['re'];

                $z_sum_wdx+=$Rs5['sum_m'];

                $z_suma_wdx+=$RsA['sum_moneya'];
                $z_sumb_wdx+=$RsB['sum_moneyb'];
                $z_ds_wdx+=$Rs5['sum_ds'];
                $z_xx_wdx+=$Rs5['sum_m3'];
                $z_pz_wdx+=$Rs7['sum_m3'];
            }

            $z_re+=$Rs5['re'];

            $z_sum+=$Rs5['sum_m'];

            $z_suma+=$RsA['sum_moneya'];
            $z_sumb+=$RsB['sum_moneyb'];
            $z_ds+=$Rs5['sum_ds'];
            $z_xx+=$Rs5['sum_m3'];
            $z_pz+=$Rs7['sum_m3'];

            $sum_sx1[$ii]=$Rs7['sum_money'];
            if ($Rs7['sum_m3']!=""){$sum_pz1[$ii]=$Rs7['sum_m3'];}else{
                $sum_pz1[$ii]=0;}

            $ii++;
        }

        for($i=0;$i<$ii;$i++)
        {
            /*
            if ($i==0){
            $sum_sx[0]=($z_suma+$z_sumb+$z_ds)+$sum_xx[0]-$sum_sx1[0];
            }else{
            $sum_sx[$i]=($z_suma+$z_sumb+$z_ds)+$sum_xx[$i]-$sum_sx1[$i];}
            */
            if($sum_tm[$i]=="大"||$sum_tm[$i]=="小"){
                $sum_sx[$i]=$z_suma_dx-$z_ds_dx-$z_pz_dx*((1-getQuotaField(38,'yg')/100))-($sum_ma[$i]-$sum_pz1[$i])*$sum_bl[$i];
            }elseif($sum_tm[$i]=="单"||$sum_tm[$i]=="双"){
                $sum_sx[$i]=$z_suma_ds-$z_ds_ds-$z_pz_ds*((1-getQuotaField(38,'yg')/100))-($sum_ma[$i]-$sum_pz1[$i])*$sum_bl[$i];
            }elseif($sum_tm[$i]=="红波"||$sum_tm[$i]=="绿波"||$sum_tm[$i]=="蓝波"){
                $sum_sx[$i]=$z_suma_bs-$z_ds_bs-$z_pz_bs*((1-getQuotaField(38,'yg')/100))-($sum_ma[$i]-$sum_pz1[$i])*$sum_bl[$i];
            }elseif($sum_tm[$i]=="合大"||$sum_tm[$i]=="合小"){
                $sum_sx[$i]=$z_suma_hdx-$z_ds_hdx-$z_pz_hdx*((1-getQuotaField(38,'yg')/100))-($sum_ma[$i]-$sum_pz1[$i])*$sum_bl[$i];
            }elseif($sum_tm[$i]=="合单"||$sum_tm[$i]=="合双"){
                $sum_sx[$i]=$z_suma_hds-$z_ds_hds-$z_pz_hds*((1-getQuotaField(38,'yg')/100))-($sum_ma[$i]-$sum_pz1[$i])*$sum_bl[$i];
            }elseif($sum_tm[$i]=="尾大"||$sum_tm[$i]=="尾小"){
                $sum_sx[$i]=$z_suma_wdx-$z_ds_wdx-$z_pz_wdx*((1-getQuotaField(38,'yg')/100))-($sum_ma[$i]-$sum_pz1[$i])*$sum_bl[$i];
            }
        }


        $b=0;
        for($b=0;$b<$ii;$b++)
        {
            $i=0;
            for($i=0;$i<$ii-1;$i++)
            {
                if($sum_sx[$i]>$sum_sx[$i+1]){

                    $tmp=$sum_tm[$i+1];
                    $sum_tm[$i+1]=$sum_tm[$i];
                    $sum_tm[$i]=$tmp;

                    $tmp=$sum_m[$i+1];
                    $sum_m[$i+1]=$sum_m[$i];
                    $sum_m[$i]=$tmp;

                    $tmp=$sum_re[$i+1];
                    $sum_re[$i+1]=$sum_re[$i];
                    $sum_re[$i]=$tmp;

                    $tmp=$sum_ma[$i+1];
                    $sum_ma[$i+1]=$sum_ma[$i];
                    $sum_ma[$i]=$tmp;

                    $tmp=$sum_mb[$i+1];
                    $sum_mb[$i+1]=$sum_mb[$i];
                    $sum_mb[$i]=$tmp;

                    $tmp=$sum_ds[$i+1];
                    $sum_ds[$i+1]=$sum_ds[$i];
                    $sum_ds[$i]=$tmp;

                    $tmp=$sum_xx[$i+1];
                    $sum_xx[$i+1]=$sum_xx[$i];
                    $sum_xx[$i]=$tmp;

                    $tmp=$sum_bl[$i+1];
                    $sum_bl[$i+1]=$sum_bl[$i];
                    $sum_bl[$i]=$tmp;

                    $tmp=$sum_sx[$i+1];
                    $sum_sx[$i+1]=$sum_sx[$i];
                    $sum_sx[$i]=$tmp;
                    $tmp=$sum_pz1[$i+1];
                    $sum_pz1[$i+1]=$sum_pz1[$i];
                    $sum_pz1[$i]=$tmp;
                    $tmp=$sum_color[$i+1];
                    $sum_color[$i+1]=$sum_color[$i];
                    $sum_color[$i]=$tmp;
                }
            }
        }

        $fg=0;
        $i=0;

        for($i=0;$i<$ii;$i++)
        {
            if(($sum_sx[$i]+$ztm_tm)>=0 || $sum_bl[$i]==0 ){
                $ffxx=0;}else{
//(波色走总-最大亏-波色预计赢利)/(赔率-1+用户的退水/100)
                if($sum_tm[$i]=="大"||$sum_tm[$i]=="小"){
                    $ffxx=(-$sum_sx[$i]-$ztm_tm)/($sum_bl[$i]+getQuotaField(38,'yg')/100-1);
                }elseif($sum_tm[$i]=="单"||$sum_tm[$i]=="双"){
                    $ffxx=(-$sum_sx[$i]-$ztm_tm)/($sum_bl[$i]+getQuotaField(38,'yg')/100-1);
                }elseif($sum_tm[$i]=="红波"||$sum_tm[$i]=="绿波"||$sum_tm[$i]=="蓝波"){
                    $ffxx=(-$sum_sx[$i]-$ztm_tm)/($sum_bl[$i]+getQuotaField(38,'yg')/100-1);
                }elseif($sum_tm[$i]=="合大"||$sum_tm[$i]=="合小"){
                    $ffxx=(-$sum_sx[$i]-$ztm_tm)/($sum_bl[$i]+getQuotaField(38,'yg')/100-1);
                }elseif($sum_tm[$i]=="合单"||$sum_tm[$i]=="合双"){
                    $ffxx=(-$sum_sx[$i]-$ztm_tm)/($sum_bl[$i]+getQuotaField(38,'yg')/100-1);
                }elseif($sum_tm[$i]=="尾大"||$sum_tm[$i]=="尾小"){
                    $ffxx=(-$sum_sx[$i]-$ztm_tm)/($sum_bl[$i]+getQuotaField(38,'yg')/100-1);
                }

                /*
                if ($i==0){
                if(((0-$sum_sx[0])-$ztm_tm)==0 or $sum_bl[0]==0 ){
                $ffxx=0;
                }else{$ffxx=(((0-$sum_sx[0])-$ztm_tm)/$sum_bl[0]);}

                }else{
                if(((0-$sum_sx[$i])-$ztm_tm)==0 or $sum_bl[$i]==0 ){
                $ffxx=0;}else{$ffxx=(((0-$sum_sx[$i])-$ztm_tm)/$sum_bl[$i]);}
                */

            }

            $bl=round($ffxx,0);//intval($ffxx);
            if($ffxx>=1){
                $fg=$fg+1;
                if ($i==0){
                    $sum_pz[0]="<button onclick=show_win('".$sum_tm[0]."','".$bl."','".$sum_bl[0]."','".$class1."','".$class2."','".$kithe."')    ><font color=ff6600>走飞</font>  ".$bl."</button>";
                }else{
                    $sum_pz[$i]="<button  onclick=show_win('".$sum_tm[$i]."','".$bl."','".$sum_bl[$i]."','".$class1."','".$class2."','".$kithe."')    ><font color=ff6600>走飞</font>  ".$bl."</button>";}
            }else{
                $sum_pz[$i]="0";
                $sum_pz[$i]="<button  onclick=show_win('".$sum_tm[$i]."','".$bl."','".$sum_bl[$i]."','".$class1."','".$class2."','".$kithe."')    ><font color=ff6600>走飞</font>  ".$bl."</button>";
            }
        }

        $arr=[];
        for($i=0;$i<$ii;$i++)
        {
            $arr[$i]=[
//                $class2,
                $sum_tm[$i],
                $sum_re[$i],
                round($sum_m[$i],0),
                round($sum_ma[$i],0),
                $sum_mb[$i],
                round($sum_ds[$i],0),
                round($sum_xx[$i],0),
                round($sum_sx[$i],0),
                $sum_pz[$i],
                $sum_pz1[$i],
                $sum_bl[$i],
                $fg,
                $sum_tm[$i],
                $sum_color[$i]
            ];
        }
        $z_suma=$z_suma-$z_pz;
        $arr[$ii]=[0,$z_re,$z_sum,$z_suma,$z_sumb,$z_ds,$z_xx,'','',$z_pz,$ztm_tm,$fg];
        return json($arr);
    }

    public function savePz(){
        $result=['code'=>1,'msg'=>''];
        if(!input('?act') || input('act')!='zsave'){
            $result['msg']='请求参数不正确';
            return json([$result]);
        }
        if(!input('?tm') || !input('tm')){ //存在但为空
            $result['msg']='预估风险值不能为空';
            return json($result);
        }
        $sess=session('lhc_users');
        $res=Db::name('guan')->where(['kauser'=>$sess['kauser']])->update(['tm'=>input('tm')]);
        if($res){
            $result['code']=0;
            $result['msg']='更新成功';
            return json($result);
        }else{
            $result['msg']='更新失败';
            return json($result);
        }
    }

    //下注明细
    public function look(){
        $sess=session('lhc_users');
        $data=Db::name('guan')->where(['kauser'=>$sess['kauser']])->find();
        $kithe=input('kithe') ? input('kithe') :getKitheNum();
        $bb=input('id');
        switch ($bb)
        {
            case 1:
                $class1="特码";
                break;
            case 2:
                $class1="正特";
                $class2=input('class2');
                break;
            case 3:
                $class1="正码";
                break;
            case 31:
                $class1="正1-6";
                break;
            case 4:
                $class1="五行";
                $class2=input('class2');
                break;
            case 5:
                $class1="生肖";
                $class2=input('class2');
                break;
            case 6:
                $class1="半波";
                $class2=input('class2');
                break;
            case 61:
                $class1="半半波";
                $class2=input('class2');
                break;
            case 611:
                $class1="七色波";
                $class2=input('class2');
                break;
            case 6111:
                $class1="正肖";
                $class2=input('class2');
                break;
            case 71:
                $class1="头数";
                $class2=input('class2');
                break;
            case 7:
                $class1="尾数";
                $class2=input('class2');
                break;
            case 72:
                $class1="正特尾数";
                $class2=input('class2');
                break;
            case 8:
                $class1="连码";
                $class2=input('class2');
                break;
            case 9:
                $class1="过关";
                $class2=input('class2');
                break;
            case 10:
                $class1=input('class1');
                $class2=input('class2');
                break;
            case 11:
                $class1="生肖连";
                $class2=input('class2');
                break;
            case 12:
                $class1="不中";
                $class2=input('class2');
                break;
            case 13:
                $class1="中一";
                $class2=input('class2');
                break;
            case 14:
                $class1="尾数连";
                $class2=input('class2');
                break;
            default:
                $class1="特码";
                break;
        }
        $class3=input('class3') ? input('class3') : '';

        $where=[];
        if($data['lx']==1){
            $where['guan']=$data['kauser'];
        }
        if($data['lx']==2){
            $where['zong']=$data['kauser'];
        }
        if($data['lx']==3){
            $where['dai']=$data['kauser'];
        }

        if(input('lx') && input('lx')==1){
            $where['username']=$data['kauser'];
        }else{
            $where['username']=['neq',$data['kauser']];
        }
        if ($class1=="特码" or $class1=="正码" ){
            $w=array_merge($where,['kithe'=>$kithe,'class1'=>$class1,'class3'=>$class3]);
            $result=Db::name('tan')->where($w)->order(['id'=>'desc'])->paginate(30);
        }else {
            if($class2){
                $w=array_merge($where,['kithe'=>$kithe,'class2'=>$class2,'class1'=>$class1,'class3'=>$class3]);
            }else{
                $w=array_merge($where,['kithe'=>$kithe,'class1'=>$class1,'class3'=>$class3]);
            }
            $result=Db::name('tan')->where($w)->order(['id'=>'desc'])->paginate(30);
        }

        $sum_m=0;
        $user_ds=0;
        $res=$result->all();
        foreach ($res as $k=>$v){
            $sum_m+=$v['sum_m'];
            $user_ds+=($v['sum_m']*$v['user_ds']/100);
        }
        return $this->fetch('',[
            'class1'=>$class1,
            'class3'=>$class3,
            'data'=>$data,
            'res'=>$res,
            'page'=>$result->render(),
            'sum_m'=>$sum_m,
            'user_ds'=>$user_ds,
        ]);
    }

    //走飞修改
    public function updatePz(){
        $data=$this->request->param();
        return $this->fetch('',[
            'data'=>$data
        ]);
    }

    public function saveUpPz(){
        if(input('act')!='save' || !$this->request->isAjax())return json(['code'=>1,'msg'=>'非法访问']);
        $sess=session('lhc_users');
        $guan=Db::name('guan')->find($sess['id']);
        $rate=input('rate');
        $kithe=input('kithe');
        $R=5;
        $XF=13;
        if ($kithe==getKitheNum()){ //必须是当前最新盘才行
            if (getKithe(29)==0 or getKithe($XF)==0) {
                return json(['code'=>1,'msg'=>'封盘中...']);
            }
        }else{
            return json(['code'=>1,'msg'=>'封盘中...']);
        }
        if ($sess['vip']==1) {
            return json(['code'=>1,'msg'=>'对不起,子账号不能走飞!']);
        }
        if ($guan['pz']==1) {
            return json(['code'=>1,'msg'=>'对不起,你不能走飞!']);
        }
        if (!input('sum_m')) {
            return json(['code'=>1,'msg'=>'金额有误，请输入数字!']);
        }
        $text=date("Y-m-d H:i:s");
        $num=randStr();
//
//        if (input('class3')=="单"||input('class3')=="双") $R=2;
//        if (input('class3')=="大"||input('class3')=="小") $R=3;
//        if (input('class3')=="合单"||input('class3')=="合双") $R=4;
//        if (input('class3')=="红波"||input('class3')=="蓝波"||input('class3')=="绿波") $R=10;
//        if (input('class3')=="家禽"||input('class3')=="野兽") $R=24;
//        if (input('class3')=="尾大"||input('class3')=="尾小") $R=33;
//        if (input('class3')=="大单"||input('class3')=="小单") $R=34;
//        if (input('class3')=="大双"||input('class3')=="小双") $R=35;

        if ($guan['lx']==1){
            $username=$guan['kauser'];
            $user_ds=getQuotaField($R,'yg');
            $dai_ds=$user_ds;
            $zong_ds=$user_ds;
            $guan_ds=$user_ds;
            $dai_zc=0;
            $zong_zc=0;
            $guan_zc=0;
            $dagu_zc=10;
            $dai=$guan['kauser'];
            $zong=$guan['kauser'];
            $guan=$guan['kauser'];
        }
        if ($guan['lx']==2){
            $username=$guan['kauser'];
            $user_ds=getQuotaField($R,'yg',$guan['kauser']);
            $dai_ds=$user_ds;
            $zong_ds=$user_ds;
            $guan_ds=$user_ds;
            $dai_zc=0;
            $zong_zc=0;
            $guan_zc=$guan['sj']/10;
            $dagu_zc=10-$guan['sj']/10;
            $dai=$guan['kauser'];
            $zong=$guan['kauser'];
            $guan=$guan['guan'];
        }
        if ($_SESSION['lx']==3){
            $guanss1=$guan['guan'];
            $sf=Db::name('guan')->where(['kauser'=>$guanss1])->value('sj');
            $username=$guan['kauser'];
            $user_ds=getQuotaField($R,'yg',$guan['kauser']);
            $dai_ds=$user_ds;
            $zong_ds=$user_ds;
            $guan_ds=$user_ds;
            $dai_zc=0;
            $zong_zc=$guan['sj']/10;
            $guan_zc=10-$guan['sj']/10-($sf+$guan['sf'])/10;
            $dagu_zc=($sf+$guan['sf'])/10;

            if($sf==0){
                $guan_zc=10-$guan['sj']/10;
                $dagu_zc=0;
            }
            if($guan['sf']+$guan['sj']==100){
                $zong_zc=10;
                $guan_zc=0;
                $dagu_zc=0;
            }
            $dai=$guan['kauser'];
            $zong=$guan['zong'];
            $guan=$guan['guan'];
        }
//        if ($guan['lx']==2){ $vvvv=" and zong='".$_SESSION['kauser']."'  ";}
//        if ($guan['lx']==3){ $vvvv=" and dai='".$_SESSION['kauser']."'  ";}

        $arr=[
            'num'=>$num,
            'username'=>$username,
            'kithe'=>getKitheNum(),
            'adddate'=>$text,
            'class1'=>input('class1'),
            'class2'=>input('class2'),
            'class3'=>input('class3'),
            'rate'=>input('rate'),
            'sum_m'=>input('sum_m'),
            'user_ds'=>$user_ds,
            'dai_ds'=>$dai_ds,
            'zong_ds'=>$zong_ds,
            'guan_ds'=>$guan_ds,
            'dai_zc'=>$dai_zc,
            'zong_zc'=>$zong_zc,
            'guan_zc'=>$guan_zc,
            'dagu_zc'=>$dagu_zc,
            'bm'=>0,
            'dai'=>$dai,
            'zong'=>$zong,
            'guan'=>$guan,
            'abcd'=>'A',
            'lx'=>0
        ];
        $res=Db::name('tan')->insert();
        if($res){
            return json(['code'=>0,'补仓成功']);
        }else{
            return json(['code'=>1,'msg'=>'补仓失败']);
        }
    }

}