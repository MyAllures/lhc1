<?php
namespace app\users\controller;
use app\users\controller\Common;
use think\Db;
class Zoufei extends Common{
    public function index(){
        $ids="特A";
        $sess=session('lhc_users');
        $row=Db::name('guan')->where(['kauser'=>$sess['kauser']])->find();
        $best=$row['best'];
        $zm=$row['zm'];
        $zm6=$row['zm6'];
        $lm=$row['lm'];
        $zt=$row['zt'];
        $zf_num=$row['tm'];
        $sx=$row['sx'];
        $bb=$row['bb'];
        $gg=$row['gg'];
        $ws=$row['ws'];
        $xx=$row['xx'];
        $wx=$row['wx'];
        $pz=$row['pz'];
        $kithe=input('?kithe') ? input('kithe') : getKitheNum();
        if ($kithe!=getKitheNum())$ftime=20000000;
        $ka_guanid=$row['id'];
        if ($row['lx']==1){
            $r1=Db::name('guan')->field('SUM(cs) As sum_m')->where(['lx'=>2,'guanid'=>$ka_guanid])->select();
            $fagenttime=60000;
        }
        if ($row['lx']==2){
            $r1=Db::name('guan')->field('SUM(cs) As sum_m')->where(['lx'=>3,'zongid'=>$ka_guanid])->select();
        }
        if ($row['lx']==3){
            $r1=Db::name('mem')->field('SUM(cs) As sum_m')->where(['danid'=>$ka_guanid])->select();
        }
        $mumu=$r1[0]['sum_m'];
        $r2=Db::name('tan')->where(['kithe'=>getKitheNum(),'username'=>$row['kauser']])->field('SUM(sum_m) As sum_m1')->select();
        $mkmk=$r2[0]['sum_m1'];
        $sum_sumz=$row['cs']-$mkmk-$mumu;
        $R=0;
        $XF=11;
        if(getKithe(29)==0 || getKithe($XF)==0)exit('封盘中...');
        $tm=input('?tm') ? input('tm') :1;
        $tm1=input('?tm1') ? input('tm1') :1;
        $tm2=input('?tm2') ? input('tm2') :1;
        $jifei=100;
        if ($tm2=="0"){
            $zf="预计盈利";
        }else{
            $zf="走飞";
        }
        $d_ShowTable=Db::name('bl')->field('rate,class3,class1,class2')->where(['class2'=>'特A'])->select();
        $y=is_array($d_ShowTable) ? count($d_ShowTable) : 0;
        $vvvv=[];
        if ($row['lx']==1){
            $vvvv=['guan'=>$row['kauser'],'username'=>['neq',$row['kauser']]];
            $vbbb=" count(*) as re,SUM(sum_m) As sum_money,SUM(sum_m*(guan_ds-zong_ds)/100) As sum_ds,SUM(0-sum_m*rate*guan_zc/10) As sum_m3,SUM(sum_m*guan_zc/10) As sum_m4,SUM(0-sum_m*rate) As sum_m5,SUM(0-sum_m*(guan_ds-zong_ds)/100*guan_zc/10) As sum_ds1 ";
        }
        if ($row['lx']==2){
            $vvvv=['zong'=>$row['kauser'],'username'=>['neq',$row['kauser']]];
            $vbbb=" count(*) as re,SUM(sum_m) As sum_money,SUM(sum_m*(zong_ds-dai_ds)/100) As sum_ds,SUM(0-sum_m*rate*zong_zc/10) As sum_m3,SUM(sum_m*zong_zc/10) As sum_m4,SUM(0-sum_m*rate) As sum_m5,SUM(0-sum_m*(zong_ds-dai_ds)/100*zong_zc/10) As sum_ds1 ";
        }
        if ($row['lx']==3){
            $vvvv=['dai'=>$row['kauser'],'username'=>['neq',$row['kauser']]];
            $vbbb=" count(*) as re,SUM(sum_m) As sum_money,SUM(sum_m*(dai_ds-user_ds)/100) As sum_ds,SUM(0-sum_m*rate*dai_zc/10) As sum_m3,SUM(sum_m*dai_zc/10) As sum_m4,SUM(0-sum_m*rate) As sum_m5,SUM(0-sum_m*(dai_ds-user_ds)/100*dai_zc/10) As sum_ds1 ";
        }
        foreach (range(1,49) as $k=>$v){
            $i=$k+1;
            $sum_tm1[$i]=$i;
            $vw=array_merge($vvvv,['kithe'=>$kithe,'class1'=>'特码','class3'=>$k+1]);
            $rs5=Db::name('tan')->field($vbbb)->where($vw)->select();
            $rs2=Db::name('tan')->field($vbbb)->where(['kithe'=>$kithe,'class1'=>'特码','class3'=>$k+1,'username'=>$row['kauser']])->select();
            $Rsbl=Db::name('bl')->where(['class1'=>'特码','class2'=>'特A','class3'=>$k+1])->find();
            if ($Rsbl['rate']!=""){
                $sum_bl[$k+1]=$Rsbl['rate'];
            }else{
                $sum_bl[$k+1]=0;
            }
            if (!empty($rs5[0]['sum_money'])) $sum_money=$rs5[0]['sum_money']; else $sum_money=0;
            if (!empty($rs5[0]['re']))   $re=$rs5['re']; else $re=0;
            if (!empty($rs5[0]['sum_ds'])){$sum_ds=$rs5['sum_ds'];}else{ $sum_ds=0;}
            if (!empty($rs5[0]['sum_m3'])){$sum_m3=$rs5['sum_m3'];}else{ $sum_m3=0;}
            if (!empty($rs5[0]['sum_m4'])){$sum_m4=$rs5['sum_m4'];}else{$sum_m4=0;}
            if (!empty($rs5[0]['sum_m5'])){$sum_m5=$rs5['sum_m5'];}else{$sum_m5=0;}
            if (!empty($rs5[0]['sum_ds1'])){$sum_ds1=$rs5['sum_ds1'];}else{$sum_ds1=0;}
            if (!empty($rs2[0]['sum_money'])){
                $sum_money-=$rs2[0]['sum_money'];
                $sum_m4-=$rs2[0]['sum_money'];
                $sum_m3-=$rs2[0]['sum_m5'];
                $sum_ds-=$rs2[0]['sum_ds'];
                $sum_m5-=$rs2[0]['sum_m5'];
                $sum_ds1-=$rs2[0]['sum_ds'];
            }
            if ($tm==0){
                $sum_money1[$k+1]=$sum_money;
                $sum_zq[$k+1]=$sum_m5;
                $sum_dsds[$k+1]=$sum_ds;
            }else{
                $sum_money1[$k+1]=$sum_m4;
                $sum_zq[$k+1]=$sum_m3;
                $sum_dsds[$k+1]=$sum_ds1;
            }
            $sum_zm[$k+1]=$sum_money1[$k+1]*$jifei/100  ;
            $sum_zf[$k+1]=$sum_money1[$k+1]*(1-$jifei/100);
            //全部
            if ($tm1==1){
                //单
                if ($i%2==1){
                    $w1=array_merge($vvvv,['kithe'=>$kithe,'class1'=>'特码','class3'=>'单']);
                    $rs5=Db::name('tan')->field($vbbb)->where($w1)->select();
                    $rs2=Db::name('tan')->field($vbbb)->where(['kithe'=>$kithe,'class1'=>'特码','class3'=>'单','username'=>$row['kauser']])->select();
                    if ($rs5[0]['sum_money']!=""){$sum_money=$rs5[0]['sum_money'];}else{$sum_money=0;}
                    if ($rs5[0]['re']!=""){
                        if ($rs5[0]['sum_ds']!=""){$sum_ds=$rs5[0]['sum_ds'];}else{$sum_ds=0;}
                        if ($rs5[0]['sum_m3']!=""){$sum_m3=$rs5[0]['sum_m3'];}else{$sum_m3=0;}
                        if ($rs5[0]['sum_m4']!=""){$sum_m4=$rs5[0]['sum_m4'];}else{$sum_m4=0;}
                        if ($rs5[0]['sum_m5']!=""){$sum_m5=$rs5[0]['sum_m5'];}else{$sum_m5=0;}
                        if ($rs5[0]['sum_ds1']!=""){$sum_ds1=$rs5[0]['sum_ds1'];}else{$sum_ds1=0;}
                        if ($rs2[0]['sum_money']!=""){
                            $sum_money-=$rs2[0]['sum_money']/25;
                            $sum_m4-=$rs2[0]['sum_money']/25;
                            $sum_m3-=$rs2[0]['sum_m5'];
                            $sum_m5-=$rs2[0]['sum_m5'];
                            $sum_ds1-=$rs2[0]['sum_ds'];
                        }
                        if ($tm==0){
                            $sum_money1[$i]+=$sum_money/25;
                        }else{
                            $sum_money1[$i]+=$sum_m4/25;
                        }
                        if ($tm==0){
                            $sum_zq[$i]=$sum_zq[$i]+$sum_m5;
                            $sum_dsds[$i]=$sum_dsds[$i]+$sum_ds/25;
                        }else{
                            $sum_dsds[$i]=$sum_dsds[$i]+$sum_ds1/25;
                            $sum_zq[$i]=$sum_zq[$i]+$sum_m3;
                        }
                        $sum_zm[$i]=$sum_money1[$i]*$jifei/100;
                        $sum_zf[$i]=$sum_money1[$i]*(1-$jifei/100);
                    }
                }
                //大单
                if ($i%2==1 && $i>24){
                    $w1=array_merge($vvvv,['kithe'=>$kithe,'class1'=>'特码','class3'=>'大单']);
                    $rs5=Db::name('tan')->field($vbbb)->where($w1)->select();
                    $rs2=Db::name('tan')->field($vbbb)->where(['kithe'=>$kithe,'class1'=>'特码','class3'=>'大单','username'=>$row['kauser']])->select();
                    if ($rs5[0]['sum_money']!=""){$sum_money=$rs5[0]['sum_money'];}else{$sum_money=0;}
                    if ($rs5[0]['re']!=""){
                        if ($rs5[0]['sum_ds']!=""){$sum_ds=$rs5[0]['sum_ds'];}else{$sum_ds=0;}
                        if ($rs5[0]['sum_m3']!=""){$sum_m3=$rs5[0]['sum_m3'];}else{$sum_m3=0;}
                        if ($rs5[0]['sum_m4']!=""){$sum_m4=$rs5[0]['sum_m4'];}else{$sum_m4=0;}
                        if ($rs5[0]['sum_m5']!=""){$sum_m5=$rs5[0]['sum_m5'];}else{$sum_m5=0;}
                        if ($rs5[0]['sum_ds1']!=""){$sum_ds1=$rs5[0]['sum_ds1'];}else{$sum_ds1=0;}
                        if ($rs2[0]['sum_money']!=""){
                            $sum_money-=$rs2[0]['sum_money']/13;
                            $sum_m4-=$rs2[0]['sum_money']/13;
                            $sum_m3-=$rs2[0]['sum_m5'];
                            $sum_m5-=$rs2[0]['sum_m5'];
                            $sum_ds1-=$rs2[0]['sum_ds'];
                        }
                        if ($tm==0){
                            $sum_money1[$i]=$sum_money1[$i]+$sum_money*1.1/13;
                        }else{
                            $sum_money1[$i]=$sum_money1[$i]+$sum_m4*1.1/13;
                        }

                        if ($tm==0){
                            $sum_zq[$i]=$sum_zq[$i]+$sum_m5;
                            $sum_dsds[$i]=$sum_dsds[$i]+$sum_ds/13;
                        }else{
                            $sum_dsds[$i]=$sum_dsds[$i]+$sum_ds1/13;
                            $sum_zq[$i]=$sum_zq[$i]+$sum_m3;
                        }
                        $sum_zm[$i]=$sum_money1[$i]*$jifei/100;
                        $sum_zf[$i]=$sum_money1[$i]*(1-$jifei/100);
                        $sum_yl[$i]=$sum_zm[$i]*$sum_bl[$i];

                    }
                }

                //小单
                if ($i%2==1&&$i<24 or $i==49){
                    $w1=array_merge($vvvv,['kithe'=>$kithe,'class1'=>'特码','class3'=>'小单']);
                    $rs5x=Db::name('tan')->field($vbbb)->where($w1)->select();
                    $rs5=$rs5x[0];
                    $rs2x=Db::name('tan')->field($vbbb)->where(['kithe'=>$kithe,'class1'=>'特码','class3'=>'小单','username'=>$row['kauser']])->select();
                    $rs2=$rs2x[0];

                    if ($rs5['sum_money']!=""){$sum_money=$rs5['sum_money'];}else{$sum_money=0;}
                    if ($rs5['re']!=""){
                        if ($rs5['sum_ds']!=""){$sum_ds=$rs5['sum_ds'];}else{$sum_ds=0;}
                        if ($rs5['sum_m3']!=""){$sum_m3=$rs5['sum_m3'];}else{$sum_m3=0;}
                        if ($rs5['sum_m4']!=""){$sum_m4=$rs5['sum_m4'];}else{$sum_m4=0;}
                        if ($rs5['sum_m5']!=""){$sum_m5=$rs5['sum_m5'];}else{$sum_m5=0;}
                        if ($rs5['sum_ds1']!=""){$sum_ds1=$rs5['sum_ds1'];}else{$sum_ds1=0;}
                        if ($rs2['sum_money']!=""){
                            $sum_money-=$rs2['sum_money']/13;
                            $sum_m4-=$rs2['sum_money']/13;
                            $sum_m3-=$rs2['sum_m5'];
                            $sum_m5-=$rs2['sum_m5'];
                            $sum_ds1-=$rs2['sum_ds'];
                        }
                        if ($tm==0){
                            $sum_money1[$i]=$sum_money1[$i]+$sum_money*1.1/13;
                        }else{
                            $sum_money1[$i]=$sum_money1[$i]+$sum_m4*1.1/13;
                        }
                        if ($tm==0){
                            $sum_zq[$i]=$sum_zq[$i]+$sum_m5;
                            $sum_dsds[$i]=$sum_dsds[$i]+$sum_ds/13;
                        }else{
                            $sum_dsds[$i]=$sum_dsds[$i]+$sum_ds1/13;
                            $sum_zq[$i]=$sum_zq[$i]+$sum_m3;
                        }
                        $sum_zm[$i]=$sum_money1[$i]*$jifei/100;
                        $sum_zf[$i]=$sum_money1[$i]*(1-$jifei/100);
                        $sum_yl[$i]=$sum_zm[$i]*$sum_bl[$i];

                    }
                }

                //双
                if ($i%2==0 or $i==49){
                    $w1=array_merge($vvvv,['kithe'=>$kithe,'class1'=>'特码','class3'=>'双']);
                    $rs5x=Db::name('tan')->field($vbbb)->where($w1)->select();
                    $rs5=$rs5x[0];
                    $rs2x=Db::name('tan')->field($vbbb)->where(['kithe'=>$kithe,'class1'=>'特码','class3'=>'双','username'=>$row['kauser']])->select();
                    $rs2=$rs2x[0];
                    if ($rs5['sum_money']!=""){$sum_money=$rs5['sum_money'];}else{$sum_money=0;}
                    if ($rs5['re']!=""){
                        if ($rs5['sum_ds']!=""){$sum_ds=$rs5['sum_ds'];}else{$sum_ds=0;}
                        if ($rs5['sum_m3']!=""){$sum_m3=$rs5['sum_m3'];}else{$sum_m3=0;}
                        if ($rs5['sum_m4']!=""){$sum_m4=$rs5['sum_m4'];}else{$sum_m4=0;}
                        if ($rs5['sum_m5']!=""){$sum_m5=$rs5['sum_m5'];}else{$sum_m5=0;}
                        if ($rs5['sum_ds1']!=""){$sum_ds1=$rs5['sum_ds1'];}else{$sum_ds1=0;}
                        if ($rs2['sum_money']!=""){
                            $sum_money-=$rs2['sum_money']/25;
                            $sum_m4-=$rs2['sum_money']/25;
                            $sum_m3-=$rs2['sum_m5'];
                            $sum_m5-=$rs2['sum_m5'];
                            $sum_ds1-=$rs2['sum_ds'];
                        }

                        if ($tm==0){
                            $sum_money1[$i]=$sum_money1[$i]+$sum_money/25;
                        }else{
                            $sum_money1[$i]=$sum_money1[$i]+$sum_m4/25;
                        }

                        if ($tm==0){
                            $sum_zq[$i]=$sum_zq[$i]+$sum_m5;
                            $sum_dsds[$i]=$sum_dsds[$i]+$sum_ds/25;
                        }else{
                            $sum_dsds[$i]=$sum_dsds[$i]+$sum_ds1/25;
                            $sum_zq[$i]=$sum_zq[$i]+$sum_m3;
                        }
                        $sum_zm[$i]=$sum_money1[$i]*$jifei/100;
                        $sum_zf[$i]=$sum_money1[$i]*(1-$jifei/100);
                    }
                }

                //大双
                if ($i%2==0&&$i>25 or $i==49){
                    $w1=array_merge($vvvv,['kithe'=>$kithe,'class1'=>'特码','class3'=>'大双']);
                    $rs5x=Db::name('tan')->field($vbbb)->where($w1)->select();
                    $rs5=$rs5x[0];
                    $rs2x=Db::name('tan')->field($vbbb)->where(['kithe'=>$kithe,'class1'=>'特码','class3'=>'大双','username'=>$row['kauser']])->select();
                    $rs2=$rs2x[0];
                    if ($rs5['sum_money']!=""){$sum_money=$rs5['sum_money'];}else{$sum_money=0;}
                    if ($rs5['re']!=""){
                        if ($rs5['sum_ds']!=""){$sum_ds=$rs5['sum_ds'];}else{$sum_ds=0;}
                        if ($rs5['sum_m3']!=""){$sum_m3=$rs5['sum_m3'];}else{$sum_m3=0;}
                        if ($rs5['sum_m4']!=""){$sum_m4=$rs5['sum_m4'];}else{$sum_m4=0;}
                        if ($rs5['sum_m5']!=""){$sum_m5=$rs5['sum_m5'];}else{$sum_m5=0;}
                        if ($rs5['sum_ds1']!=""){$sum_ds1=$rs5['sum_ds1'];}else{$sum_ds1=0;}
                        if ($rs2['sum_money']!=""){
                            $sum_money-=$rs2['sum_money']/13;
                            $sum_m4-=$rs2['sum_money']/13;
                            $sum_m3-=$rs2['sum_m5'];
                            $sum_m5-=$rs2['sum_m5'];
                            $sum_ds1-=$rs2['sum_ds'];
                        }
                        if ($tm==0){
                            $sum_money1[$i]=$sum_money1[$i]+$sum_money*1.1/13;
                        }else{
                            $sum_money1[$i]=$sum_money1[$i]+$sum_m4*1.1/13;
                        }

                        if ($tm==0){
                            $sum_zq[$i]=$sum_zq[$i]+$sum_m5;
                            $sum_dsds[$i]=$sum_dsds[$i]+$sum_ds/13;
                        }else{
                            $sum_dsds[$i]=$sum_dsds[$i]+$sum_ds1/13;
                            $sum_zq[$i]=$sum_zq[$i]+$sum_m3;
                        }
                        $sum_zm[$i]=$sum_money1[$i]*$jifei/100;
                        $sum_zf[$i]=$sum_money1[$i]*(1-$jifei/100);
                        $sum_yl[$i]=$sum_zm[$i]*$sum_bl[$i];
                    }
                }


                //小双
                if ($i%2==0&&$i<25 or $i==49){
                    $w1=array_merge($vvvv,['kithe'=>$kithe,'class1'=>'特码','class3'=>'小双']);
                    $rs5x=Db::name('tan')->field($vbbb)->where($w1)->select();
                    $rs5=$rs5x[0];
                    $rs2x=Db::name('tan')->field($vbbb)->where(['kithe'=>$kithe,'class1'=>'特码','class3'=>'小双','username'=>$row['kauser']])->select();
                    $rs2=$rs2x[0];
                    if ($rs5['sum_money']!=""){$sum_money=$rs5['sum_money'];}else{$sum_money=0;}
                    if ($rs5['re']!=""){
                        if ($rs5['sum_ds']!=""){$sum_ds=$rs5['sum_ds'];}else{$sum_ds=0;}
                        if ($rs5['sum_m3']!=""){$sum_m3=$rs5['sum_m3'];}else{$sum_m3=0;}
                        if ($rs5['sum_m4']!=""){$sum_m4=$rs5['sum_m4'];}else{$sum_m4=0;}
                        if ($rs5['sum_m5']!=""){$sum_m5=$rs5['sum_m5'];}else{$sum_m5=0;}
                        if ($rs5['sum_ds1']!=""){$sum_ds1=$rs5['sum_ds1'];}else{$sum_ds1=0;}
                        if ($rs2['sum_money']!=""){
                            $sum_money-=$rs2['sum_money']/13;
                            $sum_m4-=$rs2['sum_money']/13;
                            $sum_m3-=$rs2['sum_m5'];
                            $sum_m5-=$rs2['sum_m5'];
                            $sum_ds1-=$rs2['sum_ds'];
                        }

                        if ($tm==0){
                            $sum_money1[$i]=$sum_money1[$i]+$sum_money*1.1/12;
                        }else{
                            $sum_money1[$i]=$sum_money1[$i]+$sum_m4*1.1/12;
                        }

                        if ($tm==0){
                            $sum_zq[$i]=$sum_zq[$i]+$sum_m5;
                            $sum_dsds[$i]=$sum_dsds[$i]+$sum_ds/12;
                        }else{
                            $sum_dsds[$i]=$sum_dsds[$i]+$sum_ds1/12;
                            $sum_zq[$i]=$sum_zq[$i]+$sum_m3;
                        }

                        $sum_zm[$i]=$sum_money1[$i]*$jifei/100;
                        $sum_zf[$i]=$sum_money1[$i]*(1-$jifei/100);
                        $sum_yl[$i]=$sum_zm[$i]*$sum_bl[$i];
                    }
                }



                //大
                if ($i>=25){
                    $w1=array_merge($vvvv,['kithe'=>$kithe,'class1'=>'特码','class3'=>'大']);
                    $rs5x=Db::name('tan')->field($vbbb)->where($w1)->select();
                    $rs5=$rs5x[0];
                    $rs2x=Db::name('tan')->field($vbbb)->where(['kithe'=>$kithe,'class1'=>'特码','class3'=>'大','username'=>$row['kauser']])->select();
                    $rs2=$rs2x[0];
                    if ($rs5['sum_money']!=""){$sum_money=$rs5['sum_money'];}else{$sum_money=0;}
                    if ($rs5['re']!=""){
                        if ($rs5['sum_ds']!=""){$sum_ds=$rs5['sum_ds'];}else{$sum_ds=0;}
                        if ($rs5['sum_m3']!=""){$sum_m3=$rs5['sum_m3'];}else{$sum_m3=0;}
                        if ($rs5['sum_m4']!=""){$sum_m4=$rs5['sum_m4'];}else{$sum_m4=0;}
                        if ($rs5['sum_m5']!=""){$sum_m5=$rs5['sum_m5'];}else{$sum_m5=0;}
                        if ($rs5['sum_ds1']!=""){$sum_ds1=$rs5['sum_ds1'];}else{$sum_ds1=0;}
                        if ($rs2['sum_money']!=""){
                            $sum_money-=$rs2['sum_money']/25;
                            $sum_m4-=$rs2['sum_money']/25;
                            $sum_m3-=$rs2['sum_m5'];
                            $sum_m5-=$rs2['sum_m5'];
                            $sum_ds1-=$rs2['sum_ds'];
                        }

                        if ($tm==0){
                            $sum_money1[$i]=$sum_money1[$i]+$sum_money/25;
                        }else{
                            $sum_money1[$i]=$sum_money1[$i]+$sum_m4/25;
                        }

                        if ($tm==0){
                            $sum_zq[$i]=$sum_zq[$i]+$sum_m5;
                            $sum_dsds[$i]=$sum_dsds[$i]+$sum_ds/25;
                        }else{
                            $sum_dsds[$i]=$sum_dsds[$i]+$sum_ds1/25;
                            $sum_zq[$i]=$sum_zq[$i]+$sum_m3;
                        }
                        $sum_zm[$i]=$sum_money1[$i]*$jifei/100;
                        $sum_zf[$i]=$sum_money1[$i]*(1-$jifei/100);
                    }
                }

                //尾大
                if ($i%10>4){
                    $w1=array_merge($vvvv,['kithe'=>$kithe,'class1'=>'特码','class3'=>'尾大']);
                    $rs5x=Db::name('tan')->field($vbbb)->where($w1)->select();
                    $rs5=$rs5x[0];
                    $rs2x=Db::name('tan')->field($vbbb)->where(['kithe'=>$kithe,'class1'=>'特码','class3'=>'尾大','username'=>$row['kauser']])->select();
                    $rs2=$rs2x[0];

                    if ($rs5['sum_money']!=""){$sum_money=$rs5['sum_money'];}else{$sum_money=0;}
                    if ($rs5['re']!=""){
                        if ($rs5['sum_ds']!=""){$sum_ds=$rs5['sum_ds'];}else{$sum_ds=0;}
                        if ($rs5['sum_m3']!=""){$sum_m3=$rs5['sum_m3'];}else{$sum_m3=0;}
                        if ($rs5['sum_m4']!=""){$sum_m4=$rs5['sum_m4'];}else{$sum_m4=0;}
                        if ($rs5['sum_ds1']!=""){$sum_ds1=$rs5['sum_ds1'];}else{$sum_ds1=0;}
                        if ($rs2['sum_money']!=""){
                            $sum_money-=$rs2['sum_money']/25;
                            $sum_m4-=$rs2['sum_money']/25;
                            $sum_m3-=$rs2['sum_m5'];
                            $sum_m5-=$rs2['sum_m5'];
                            $sum_ds1-=$rs2['sum_ds'];
                        }

                        if ($tm==0){
                            $sum_money1[$i]=$sum_money1[$i]+$sum_money/22.0663;   //}

                        }else{
                            $sum_money1[$i]=$sum_money1[$i]+$sum_m4/22.0663;     //}
                        }
                        if ($tm==0){
                            $sum_zq[$i]=$sum_zq[$i]+$sum_m5;
                            $sum_dsds[$i]=$sum_dsds[$i]+$sum_ds/25;
                        }else{
                            $sum_dsds[$i]=$sum_dsds[$i]+$sum_ds1/25;
                            $sum_zq[$i]=$sum_zq[$i]+$sum_m3;
                        }
                        $sum_zm[$i]=$sum_money1[$i]*$jifei/100;
                        $sum_zf[$i]=$sum_money1[$i]*(1-$jifei/100);
                        $sum_yl[$i]=$sum_zm[$i]*$sum_bl[$i];
                    }
                }

                //小
                if ($i<=24 or $i==49){
                    $w1=array_merge($vvvv,['kithe'=>$kithe,'class1'=>'特码','class3'=>'小']);
                    $rs5x=Db::name('tan')->field($vbbb)->where($w1)->select();
                    $rs5=$rs5x[0];
                    $rs2x=Db::name('tan')->field($vbbb)->where(['kithe'=>$kithe,'class1'=>'特码','class3'=>'小','username'=>$row['kauser']])->select();
                    $rs2=$rs2x[0];
                    if ($rs5['sum_money']!=""){$sum_money=$rs5['sum_money'];}else{$sum_money=0;}
                    if ($rs5['re']!=""){
                        if ($rs5['sum_ds']!=""){$sum_ds=$rs5['sum_ds'];}else{$sum_ds=0;}
                        if ($rs5['sum_m3']!=""){$sum_m3=$rs5['sum_m3'];}else{$sum_m3=0;}
                        if ($rs5['sum_m4']!=""){$sum_m4=$rs5['sum_m4'];}else{$sum_m4=0;}
                        if ($rs5['sum_m5']!=""){$sum_m5=$rs5['sum_m5'];}else{$sum_m5=0;}
                        if ($rs5['sum_ds1']!=""){$sum_ds1=$rs5['sum_ds1'];}else{$sum_ds1=0;}
                        if ($rs2['sum_money']!=""){
                            $sum_money-=$rs2['sum_money']/25;
                            $sum_m4-=$rs2['sum_money']/25;
                            $sum_m3-=$rs2['sum_m5'];
                            $sum_m5-=$rs2['sum_m5'];
                            $sum_ds1-=$rs2['sum_ds'];
                        }

                        if ($tm==0){
                            $sum_money1[$i]=$sum_money1[$i]+$sum_money/25;
                        }else{
                            $sum_money1[$i]=$sum_money1[$i]+$sum_m4/25;
                        }

                        if ($tm==0){
                            $sum_zq[$i]=$sum_zq[$i]+$sum_m5;
                            $sum_dsds[$i]=$sum_dsds[$i]+$sum_ds/25;
                        }else{
                            $sum_dsds[$i]=$sum_dsds[$i]+$sum_ds1/25;
                            $sum_zq[$i]=$sum_zq[$i]+$sum_m3;
                        }

                        $sum_zm[$i]=$sum_money1[$i]*$jifei/100;
                        $sum_zf[$i]=$sum_money1[$i]*(1-$jifei/100);
                    }
                }

                //尾小
                if ($i%10<5){
                    $w1=array_merge($vvvv,['kithe'=>$kithe,'class1'=>'特码','class3'=>'尾小']);
                    $rs5x=Db::name('tan')->field($vbbb)->where($w1)->select();
                    $rs5=$rs5x[0];
                    $rs2x=Db::name('tan')->field($vbbb)->where(['kithe'=>$kithe,'class1'=>'特码','class3'=>'尾小','username'=>$row['kauser']])->select();
                    $rs2=$rs2x[0];
                    if ($rs5['sum_money']!=""){$sum_money=$rs5['sum_money'];}else{$sum_money=0;}
                    if ($rs5['re']!=""){
                        if ($rs5['sum_ds']!=""){$sum_ds=$rs5['sum_ds'];}else{$sum_ds=0;}
                        if ($rs5['sum_m3']!=""){$sum_m3=$rs5['sum_m3'];}else{$sum_m3=0;}
                        if ($rs5['sum_m4']!=""){$sum_m4=$rs5['sum_m4'];}else{$sum_m4=0;}
                        if ($rs5['sum_m5']!=""){$sum_m5=$rs5['sum_m5'];}else{$sum_m5=0;}
                        if ($rs5['sum_ds1']!=""){$sum_ds1=$rs5['sum_ds1'];}else{$sum_ds1=0;}
                        if ($rs2['sum_money']!=""){
                            $sum_money-=$rs2['sum_money']/25;
                            $sum_m4-=$rs2['sum_money']/25;
                            $sum_m3-=$rs2['sum_m5'];
                            $sum_m5-=$rs2['sum_m5'];
                            $sum_ds1-=$rs2['sum_ds'];
                        }

                        if ($i==49){
                            if ($tm==0){
                                $sum_money1[$i]=$sum_money1[$i]+$sum_money*22.73/1000;
                            }else{
                                $sum_money1[$i]=$sum_money1[$i]+$sum_m4*22.73/1000;
                            }
                        }

                        if ($tm==0){
                            $sum_money1[$i]=$sum_money1[$i]+$sum_money/22.0663;
                        }else{
                            $sum_money1[$i]=$sum_money1[$i]+$sum_m4/22.0663;
                        }
                        if ($tm==0){
                            $sum_zq[$i]=$sum_zq[$i]+$sum_m5;
                            $sum_dsds[$i]=$sum_dsds[$i]+$sum_ds/25;
                        }else{
                            $sum_dsds[$i]=$sum_dsds[$i]+$sum_ds1/25;
                            $sum_zq[$i]=$sum_zq[$i]+$sum_m3;
                        }
                        $sum_zm[$i]=$sum_money1[$i]*$jifei/100;
                        $sum_zf[$i]=$sum_money1[$i]*(1-$jifei/100);
                        $sum_yl[$i]=$sum_zm[$i]*$sum_bl[$i];
                    }
                    if ($i==49){
                        $sum_zm[$i]=$sum_money1[$i]*$jifei/100;
                        $sum_zf[$i]=$sum_money1[$i]*(1-$jifei/100);
                        $sum_yl[$i]=$sum_zm[$i]*$sum_bl[$i];
                    }
                }

                //合单
                if ((($i%10)+intval($i/10))%2==1){
                    $w1=array_merge($vvvv,['kithe'=>$kithe,'class1'=>'特码','class3'=>'合单']);
                    $rs5x=Db::name('tan')->field($vbbb)->where($w1)->select();
                    $rs5=$rs5x[0];
                    $rs2x=Db::name('tan')->field($vbbb)->where(['kithe'=>$kithe,'class1'=>'特码','class3'=>'合单','username'=>$row['kauser']])->select();
                    $rs2=$rs2x[0];
                    if ($rs5['sum_money']!=""){$sum_money=$rs5['sum_money'];}else{$sum_money=0;}
                    if ($rs5['re']!=""){
                        if ($rs5['sum_ds']!=""){$sum_ds=$rs5['sum_ds'];}else{$sum_ds=0;}
                        if ($rs5['sum_m3']!=""){$sum_m3=$rs5['sum_m3'];}else{$sum_m3=0;}
                        if ($rs5['sum_m4']!=""){$sum_m4=$rs5['sum_m4'];}else{$sum_m4=0;}
                        if ($rs5['sum_m5']!=""){$sum_m5=$rs5['sum_m5'];}else{$sum_m5=0;}
                        if ($rs5['sum_ds1']!=""){$sum_ds1=$rs5['sum_ds1'];}else{$sum_ds1=0;}
                        if ($rs2['sum_money']!=""){
                            $sum_money-=$rs2['sum_money']/25;
                            $sum_m4-=$rs2['sum_money']/25;
                            $sum_m3-=$rs2['sum_m5'];
                            $sum_m5-=$rs2['sum_m5'];
                            $sum_ds1-=$rs2['sum_ds'];
                        }

                        if ($tm==0){
                            $sum_money1[$i]=$sum_money1[$i]+$sum_money/25;
                        }else{
                            $sum_money1[$i]=$sum_money1[$i]+$sum_m4/25;
                        }

                        if ($tm==0){
                            $sum_zq[$i]=$sum_zq[$i]+$sum_m5;
                            $sum_dsds[$i]=$sum_dsds[$i]+$sum_ds/25;
                        }else{
                            $sum_dsds[$i]=$sum_dsds[$i]+$sum_ds1/25;
                            $sum_zq[$i]=$sum_zq[$i]+$sum_m3;
                        }
                        $sum_zm[$i]=$sum_money1[$i]*$jifei/100;
                        $sum_zf[$i]=$sum_money1[$i]*(1-$jifei/100);
                    }

                }
                //合双
                if ((($i%10)+intval($i/10))%2==0 or $i==49){
                    $w1=array_merge($vvvv,['kithe'=>$kithe,'class1'=>'特码','class3'=>'合双']);
                    $rs5x=Db::name('tan')->field($vbbb)->where($w1)->select();
                    $rs5=$rs5x[0];
                    $rs2x=Db::name('tan')->field($vbbb)->where(['kithe'=>$kithe,'class1'=>'特码','class3'=>'合双','username'=>$row['kauser']])->select();
                    $rs2=$rs2x[0];
                    if ($rs5['sum_money']!=""){$sum_money=$rs5['sum_money'];}else{$sum_money=0;}
                    if ($rs5['re']!=""){
                        if ($rs5['sum_ds']!=""){$sum_ds=$rs5['sum_ds'];}else{$sum_ds=0;}
                        if ($rs5['sum_m3']!=""){$sum_m3=$rs5['sum_m3'];}else{$sum_m3=0;}
                        if ($rs5['sum_m4']!=""){$sum_m4=$rs5['sum_m4'];}else{$sum_m4=0;}
                        if ($rs5['sum_m5']!=""){$sum_m5=$rs5['sum_m5'];}else{$sum_m5=0;}
                        if ($rs5['sum_ds1']!=""){$sum_ds1=$rs5['sum_ds1'];}else{$sum_ds1=0;}
                        if ($rs2['sum_money']!=""){
                            $sum_money-=$rs2['sum_money']/25;
                            $sum_m4-=$rs2['sum_money']/25;
                            $sum_m3-=$rs2['sum_m5'];
                            $sum_m5-=$rs2['sum_m5'];
                            $sum_ds1-=$rs2['sum_ds'];
                        }

                        if ($tm==0){
                            $sum_money1[$i]=$sum_money1[$i]+$sum_money/25;
                        }else{
                            $sum_money1[$i]=$sum_money1[$i]+$sum_m4/25;
                        }
                        if ($tm==0){
                            $sum_zq[$i]=$sum_zq[$i]+$sum_m5;
                            $sum_dsds[$i]=$sum_dsds[$i]+$sum_ds/25;
                        }else{
                            $sum_dsds[$i]=$sum_dsds[$i]+$sum_ds1/25;
                            $sum_zq[$i]=$sum_zq[$i]+$sum_m3;
                        }
                        $sum_zm[$i]=$sum_money1[$i]*$jifei/100;
                        $sum_zf[$i]=$sum_money1[$i]*(1-$jifei/100);
                    }
                }
                //红波
                if (getColor($i)=="红波"){
                    $w1=array_merge($vvvv,['kithe'=>$kithe,'class1'=>'特码','class3'=>'红波']);
                    $rs5x=Db::name('tan')->field($vbbb)->where($w1)->select();
                    $rs5=$rs5x[0];
                    $rs2x=Db::name('tan')->field($vbbb)->where(['kithe'=>$kithe,'class1'=>'特码','class3'=>'红波','username'=>$row['kauser']])->select();
                    $rs2=$rs2x[0];
                    if ($rs5['sum_money']!=""){$sum_money=$rs5['sum_money'];}else{$sum_money=0;}
                    if ($rs5['re']!=""){
                        if ($rs5['sum_ds']!=""){$sum_ds=$rs5['sum_ds'];}else{$sum_ds=0;}
                        if ($rs5['sum_m3']!=""){$sum_m3=$rs5['sum_m3'];}else{$sum_m3=0;}
                        if ($rs5['sum_m4']!=""){$sum_m4=$rs5['sum_m4'];}else{$sum_m4=0;}
                        if ($rs5['sum_m5']!=""){$sum_m5=$rs5['sum_m5'];}else{$sum_m5=0;}
                        if ($rs5['sum_ds1']!=""){$sum_ds1=$rs5['sum_ds1'];}else{$sum_ds1=0;}
                        if ($rs2['sum_money']!=""){
                            $sum_money-=$rs2['sum_money']/17;
                            $sum_m4-=$rs2['sum_money']/17;
                            $sum_m3-=$rs2['sum_m5'];
                            $sum_m5-=$rs2['sum_m5'];
                            $sum_ds1-=$rs2['sum_ds'];
                        }

                        if ($tm==0){
                            $sum_money1[$i]=$sum_money1[$i]+$sum_money/17;
                        }else{
                            $sum_money1[$i]=$sum_money1[$i]+$sum_m4/17;
                        }

                        if ($tm==0){
                            $sum_zq[$i]=$sum_zq[$i]+$sum_m5;
                            $sum_dsds[$i]=$sum_dsds[$i]+$sum_ds/17;
                        }else{
                            $sum_dsds[$i]=$sum_dsds[$i]+$sum_ds1/17;
                            $sum_zq[$i]=$sum_zq[$i]+$sum_m3;
                        }
                        $sum_zm[$i]=$sum_money1[$i]*$jifei/100;
                        $sum_zf[$i]=$sum_money1[$i]*(1-$jifei/100);
                    }
                }

                //蓝波
                if (getColor($i)=="蓝波"){
                    $w1=array_merge($vvvv,['kithe'=>$kithe,'class1'=>'特码','class3'=>'蓝波']);
                    $rs5x=Db::name('tan')->field($vbbb)->where($w1)->select();
                    $rs5=$rs5x[0];
                    $rs2x=Db::name('tan')->field($vbbb)->where(['kithe'=>$kithe,'class1'=>'特码','class3'=>'蓝波','username'=>$row['kauser']])->select();
                    $rs2=$rs2x[0];
                    if ($rs5['sum_money']!=""){$sum_money=$rs5['sum_money'];}else{$sum_money=0;}
                    if ($rs5['re']!=""){
                        if ($rs5['sum_ds']!=""){$sum_ds=$rs5['sum_ds'];}else{$sum_ds=0;}
                        if ($rs5['sum_m3']!=""){$sum_m3=$rs5['sum_m3'];}else{$sum_m3=0;}
                        if ($rs5['sum_m4']!=""){$sum_m4=$rs5['sum_m4'];}else{$sum_m4=0;}
                        if ($rs5['sum_m5']!=""){$sum_m5=$rs5['sum_m5'];}else{$sum_m5=0;}
                        if ($rs5['sum_ds1']!=""){$sum_ds1=$rs5['sum_ds1'];}else{$sum_ds1=0;}
                        if ($rs2['sum_money']!=""){
                            $sum_money-=$rs2['sum_money']/16;
                            $sum_m4-=$rs2['sum_money']/16;
                            $sum_m3-=$rs2['sum_m5'];
                            $sum_m5-=$rs2['sum_m5'];
                            $sum_ds1-=$rs2['sum_ds'];
                        }
                        if ($tm==0){
                            $sum_money1[$i]=$sum_money1[$i]+$sum_money/16;
                        }else{
                            $sum_money1[$i]=$sum_money1[$i]+$sum_m4/16;
                        }
                        if ($tm==0){
                            $sum_zq[$i]=$sum_zq[$i]+$sum_m5;
                            $sum_dsds[$i]=$sum_dsds[$i]+$sum_ds/16;
                        }else{
                            $sum_dsds[$i]=$sum_dsds[$i]+$sum_ds1/16;
                            $sum_zq[$i]=$sum_zq[$i]+$sum_m3;
                        }

                        $sum_zm[$i]=$sum_money1[$i]*$jifei/100;
                        $sum_zf[$i]=$sum_money1[$i]*(1-$jifei/100);
                    }
                }

                //绿波
                if (getColor($i)=="绿波"){
                    $w1=array_merge($vvvv,['kithe'=>$kithe,'class1'=>'特码','class3'=>'绿波']);
                    $rs5x=Db::name('tan')->field($vbbb)->where($w1)->select();
                    $rs5=$rs5x[0];
                    $rs2x=Db::name('tan')->field($vbbb)->where(['kithe'=>$kithe,'class1'=>'特码','class3'=>'绿波','username'=>$row['kauser']])->select();
                    $rs2=$rs2x[0];

                    if ($rs5['sum_money']!=""){$sum_money=$rs5['sum_money'];}else{$sum_money=0;}
                    if ($rs5['re']!=""){
                        if ($rs5['sum_ds']!=""){$sum_ds=$rs5['sum_ds'];}else{$sum_ds=0;}
                        if ($rs5['sum_m3']!=""){$sum_m3=$rs5['sum_m3'];}else{$sum_m3=0;}
                        if ($rs5['sum_m4']!=""){$sum_m4=$rs5['sum_m4'];}else{$sum_m4=0;}
                        if ($rs5['sum_m5']!=""){$sum_m5=$rs5['sum_m5'];}else{$sum_m5=0;}
                        if ($rs5['sum_ds1']!=""){$sum_ds1=$rs5['sum_ds1'];}else{$sum_ds1=0;}
                        if ($rs2['sum_money']!=""){
                            $sum_money-=$rs2['sum_money']/16;
                            $sum_m4-=$rs2['sum_money']/16;
                            $sum_m3-=$rs2['sum_m5'];
                            $sum_m5-=$rs2['sum_m5'];
                            $sum_ds1-=$rs2['sum_ds'];
                        }
                        if ($tm==0){
                            $sum_money1[$i]=$sum_money1[$i]+$sum_money/16;
                        }else{
                            $sum_money1[$i]=$sum_money1[$i]+$sum_m4/16;
                        }

                        if ($tm==0){
                            $sum_zq[$i]=$sum_zq[$i]+$sum_m5;
                            $sum_dsds[$i]=$sum_dsds[$i]+$sum_ds/16;
                        }else{
                            $sum_dsds[$i]=$sum_dsds[$i]+$sum_ds1/16;
                            $sum_zq[$i]=$sum_zq[$i]+$sum_m3;
                        }
                        $sum_zm[$i]=$sum_money1[$i]*$jifei/100;
                        $sum_zf[$i]=$sum_money1[$i]*(1-$jifei/100);
                    }
                }

            }
            //结束全部

            $sum_sum=0;
            $sum_sumds=0;
            $sum_zmzm=0;
            $sum_zmzm1=0;
            $sum_re=0;
            $sum_zfzf=0;
            $zm_num=input('zm_num') ? input('zm_num') : '';
            if ($zm_num!=""){
                for ($i=1;$i<=49;$i=$i+1){
                    if ($sum_zm[$i]>$zm_num){
                        $sum_zm[$i]=$zm_num;
                        $sum_zf[$i]=$sum_money1[$i]-$sum_zm[$i];
                    }
                }
            }
        }
        for ($i=1;$i<=49;$i=$i+1){
            $sum_sum=$sum_sum+$sum_money1[$i];
            $sum_sumds=$sum_sumds+$sum_dsds[$i];
            $sum_zmzm=$sum_zmzm+$sum_zm[$i];
        }
        for ($i=1;$i<=49;$i=$i+1){
            $sum_zf1[$i]=$sum_sum+$sum_sumds+$sum_zq[$i];
            if ($sum_zf1[$i]<0){
                $sum_re=$sum_re+1;
            }
            if ($tm2==0){
                $sum_zf[$i]=$sum_sum+$sum_sumds+$sum_zq[$i];
            }
        }
        $rake=42.5;
        $ds=13;

        //第二段
        if ($zf_num!="" and $rake!=""  and  $zm_num==""){
            $zf_num=$zf_num;
            $sum_zmzm=0;
            for ($i=1;$i<=49;$i=$i+1){
                if (((0-$sum_zf1[$i]-$zf_num)/$rake)>1){
                    $sum_zm[$i]=$sum_zm[$i]-intval(((0-$sum_zf1[$i])-intval($zf_num))/($sum_bl[$i]+4.5));
                    if ($tm2==0){
                    }else{
                        $sum_zf[$i]=$sum_money1[$i]-$sum_zm[$i];
                    }
                }
                $sum_zmzm1=$sum_zmzm1+$sum_zm[$i];
            }
            $sum_zmzm=$sum_zmzm1;

            $zm_num=intval(($sum_zmzm1+$zf_num)/($sum_bl[49]+4.5));       //$i==50  源程序错误关闭
            $sum_zmzm2=0;
            for ($i=1;$i<=49;$i=$i+1){
                if (($sum_money1[$i]-$zm_num)>1){
                    if ($tm2==1){
                        $sum_zf[$i]=$sum_zf[$i]+($sum_sum-$sum_zmzm1)/($rake-1.87);
                    }
                }
                $sum_zm[$i]=$sum_money1[$i]-$sum_zf[$i];
                $sum_zmzm2=$sum_zmzm2+$sum_zm[$i];
            }
        }
        $zm_num=intval(($sum_zmzm2+$zf_num)/($rake-1.87));
        if ($tm2==1){
            $sum_zmzm=$sum_zmzm2;
        }
        //表格内容
        for ($I=1; $I<=49; $I=$I+1){
            $rskf =Db::table('m_color')->find($I);
            if ($rskf['color']=="r") {
                $sum_color[$I]="ff0000";
            }elseif ($rskf['color']=="b"){
                $sum_color[$I]="0000FF";
            }elseif ($rskf['color']=="g"){
                $sum_color[$I]="397100";
            }
        }
        $sumzfzf=0;
        for($b=1;$b<=49;$b++){
            $sumzfzf+=$sum_zf[$b];      //又是这个$i  50 /49
        }
        for($b=1;$b<=49;$b++)
        {
            $i=1;
            for($i=1;$i<=48;$i++)
            {
                if ($sumzfzf!=0){
                    $bbs=$sum_zf[$i];
                    $bbs1=$sum_zf[$i+1];
                }else{
                    $bbs=$sum_money1[$i+1];
                    $bbs1=$sum_money1[$i];
                }
                if($bbs>$bbs1){
                    $tmp=$sum_tm1[$i+1];
                    $sum_tm1[$i+1]=$sum_tm1[$i];
                    $sum_tm1[$i]=$tmp;
                    $tmp=$sum_color[$i+1];
                    $sum_color[$i+1]=$sum_color[$i];
                    $sum_color[$i]=$tmp;
                    $tmp=$sum_zf[$i+1];
                    $sum_zf[$i+1]=$sum_zf[$i];
                    $sum_zf[$i]=$tmp;
                    $tmp=$sum_money1[$i+1];
                    $sum_money1[$i+1]=$sum_money1[$i];
                    $sum_money1[$i]=$tmp;
                    $tmp=$sum_zm[$i+1];
                    $sum_zm[$i+1]=$sum_zm[$i];
                    $sum_zm[$i]=$tmp;
                }
            }
        }
        $kitheAll=Db::name('kithe')->order(['nn'=>'desc'])->select();
        
        return $this->fetch('',[
            'tm'=>$tm,      //占成  0全部 1成数
            'tm1'=>$tm1,
            'tm2'=>$tm2,
            'kitheAll'=>$kitheAll,
            'kithe'=>$kithe,
            'zm_num'=>$zm_num,
            'zf'=>$zf,
            'sum_bl'=>$sum_bl,      //所有球号赔率的数组
            'jifei'=>$jifei,
            'sum_color'=>$sum_color,
            'sum_tm1'=>$sum_tm1,
            'sum_money1'=>$sum_money1,
            'sum_zm'=>$sum_zm,
            'sum_zf'=>$sum_zf,


        ]);
    }

}