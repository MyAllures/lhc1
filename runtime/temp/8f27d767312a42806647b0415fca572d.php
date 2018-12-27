<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:64:"D:\www\PHPTutorial\WWW\lhc/app/users\view\baobiao\find_guan.html";i:1545293774;}*/ ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>股东报表查询</title>
    <meta name="renderer" content="webkit">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <link rel="stylesheet" href="/file/admin/layuis/layui/css/layui.css" media="all">
    <link rel="stylesheet" href="/file/admin/layuis/style/admin.css" media="all">
    <link rel="stylesheet" href="/file/admin/layui/bootstrap/css/bootstrap.min.css">
    <script src="/file/admin/layui/jquery.min.js"></script>
    <script src="/file/admin/layui/base.js"></script>
</head>
<body>
<div class="layui-fluid">
    <div class="layui-row layui-col-space15">
        <div class="layui-col-md12">
            <div class="layui-card">
                <div class="layui-card-header">
                    [<?php echo $data['kauser']; ?>]股东报表查询
                    <div class="layui-inline" style="margin-left: 20%;">
                        当前报表--&gt;&gt;
                        <?php if($kithe): ?>
                        查第<?php echo $kithe; ?>期
                        <?php else: ?>
                        日期区间：<?php echo $start; ?>-----<?php echo $stop; endif; ?>
                        &nbsp;&nbsp;&nbsp;&nbsp;投注品种：
                        <?php if($class2): ?>
                        <?php echo $class2; else: ?>
                        全部
                        <?php endif; ?>
                    </div>
                    <div class="layui-btn-group" style="float:right;">
                        <a class="layui-btn layui-btn-primary layui-btn-sm" href="<?php echo url('index'); ?>">返回报表</a>
                        <a class="layui-btn layui-btn-primary layui-btn-sm" href="javascript:location.reload();">刷新</a>
                    </div>
                </div>

                <div class="layui-card-body" pad15>
                    <table class="layui-table" align="center">
                        <thead>
                        <tr>
                            <th rowspan="2" class="layui-bg-cyan">序号</th>
                            <th rowspan="2" class="layui-bg-cyan">总代理账号</th>
                            <th rowspan="2" class="layui-bg-cyan">注数</th>
                            <th rowspan="2" class="layui-bg-cyan">下注金额</th>
                            <th colspan="2" class="layui-bg-cyan" align="center">会    员</th>
                            <th colspan="3" align="center" class="layui-bg-blue">总    代</th>
                            <th rowspan="2" class="layui-bg-orange" align="center">总代上交</th>
                            <th colspan="5" align="center" class="layui-bg-green">股    东</th>
                            <th rowspan="2" class="layui-bg-red">上交公司</th>
                        </tr>
                        <tr>
                            <th class="layui-bg-cyan">退佣</th>
                            <th class="layui-bg-cyan">盈亏</th>
                            <th class="layui-bg-blue">退佣</th>
                            <th class="layui-bg-blue">占成盈亏</th>
                            <th class="layui-bg-blue">盈亏</th>
                            <th class="layui-bg-green">占成</th>
                            <th class="layui-bg-green">占成金额</th>
                            <th class="layui-bg-green">退佣</th>
                            <th class="layui-bg-green">占成盈亏</th>
                            <th class="layui-bg-green">总盈亏</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php if($res): if(is_array($res) || $res instanceof \think\Collection || $res instanceof \think\Paginator): if( count($res)==0 ) : echo "" ;else: foreach($res as $key=>$r): if($username != $r['zong']): ?>
                            <tr>
                                <td><?php echo $key+1; ?></td>
                                <td><?php echo $r['zong']; ?> <span style="color: #ff6600;">(<?php echo $r['guan']['xm']; ?>)</span></td>
                                <td><?php echo $r['rs5']['re']; ?></td>
                                <td><a href="<?php echo url('findzong',['kithe'=>$kithe,'guanname'=>$data['kauser'],'username'=>$r['zong'],'start'=>$start,'stop'=>$stop]); ?>"><?php echo $r['rs5']['sum_m']; ?></a></td>

                                <td><?php echo number_format($r['rs6']['user_ds']+$r['rs7']['user_ds'],2); ?></td>    <!--会员退佣-->
                                <td><?php echo number_format($r['rs6']['sum_m']+$r['rs7']['sum_m'],2); ?></td>        <!--会员盈亏-->
                                <td><?php echo number_format($r['rs6']['zong_ds']+$r['rs7']['zong_ds'],2); ?></td>    <!--总代退佣-->
                                <td><?php echo number_format($r['rs6']['zongsf']+$r['rs7']['zongsf']-$r['rs6']['zong_ds']-$r['rs7']['zong_ds'],2); ?></td>   <!--总代占成盈亏-->
                                <td><?php echo number_format($r['rs6']['zongsf']+$r['rs7']['zongsf'],2); ?></td>   <!--总代盈亏-->
                                <td><?php echo $r['zs']; ?></td>      <!--总代上交-->
                                <td><?php echo $r['guan_zc']*10; ?></td>          <!--股东占成-->
                                <td><?php echo number_format($r['rs5']['guan_zc'],2); ?></td>
                                <td><?php echo number_format($r['rs6']['guan_ds']+$r['rs7']['guan_ds'],2); ?></td>
                                <td><?php echo number_format($r['rs6']['guansf']+$r['rs7']['guansf']-$r['rs6']['guan_ds']-$r['rs7']['guan_ds'],2); ?></td>
                                <td><?php echo number_format($r['rs6']['guansf']+$r['rs7']['guansf'],2); ?></td>
                                <td><?php echo $r['gs']; ?></td>     <!--上交公司-->
                            </tr>
                        <?php else: ?>
                        <tr>
                            <td><?php echo $key+1; ?></td>
                            <td><?php echo $r['zong']; ?>【补仓】</td>
                            <td><?php echo $r['rs5']['re']; ?></td>
                            <td><a href="<?php echo url('findzong',['kithe'=>$kithe,'guanname'=>$username,'agentname'=>$username,'dai'=>$username,'username'=>$username,'start'=>$start,'stop'=>$stop,'class2'=>$class2]); ?>"><?php echo $r['rs5']['sum_m']; ?></a></td>

                            <td></td>    <!--会员退佣-->
                            <td> </td>        <!--会员盈亏-->
                            <td> </td>    <!--总代退佣-->
                            <td></td>   <!--总代占成盈亏-->
                            <td> </td>   <!--总代盈亏-->
                            <td> </td>      <!--总代上交-->
                            <td> </td>          <!--股东占成-->
                            <td><?php echo number_format($r['rs5']['sum_m']*-1,2); ?></td>
                            <td><?php echo number_format($r['rs6']['user_ds']+$r['rs7']['user_ds'],2); ?></td>
                            <td><?php echo number_format($r['rs6']['sum_m']+$r['rs7']['sum_m']-$r['rs6']['user_ds']-$r['rs7']['user_ds'],2); ?></td>
                                <td><?php echo number_format($r['rs6']['sum_m']+$r['rs7']['sum_m'],2); ?></td>
                            <td><?php echo $r['gs']; ?></td>     <!--上交公司-->
                        </tr>
                        <?php endif; endforeach; endif; else: echo "" ;endif; ?>

                        <tr>
                            <td></td>
                            <td>小计</td>
                            <td><?php echo $z_re; ?></td>
                            <td><?php echo $z_sum; ?></td>
                            <td><?php echo number_format($z_userds,2); ?></td>
                            <td><?php echo number_format($z_usersf,2); ?></td>
                            <td><?php echo number_format($z_zongds,2); ?></td>
                            <td><?php echo number_format($z_zongsf-$z_zongds,2); ?></td>
                            <td><?php echo number_format($z_zongsf,2); ?></td>
                            <td><?php echo number_format($zong_sf,2); ?></td>
                            <td></td>
                            <td><?php echo number_format($_total,2); ?></td>
                            <td><?php echo number_format($z_guands,2); ?></td>
                            <td><?php echo number_format($z_guansf-$z_guands,2); ?></td>
                            <td><?php echo number_format($z_guansf,2); ?></td>
                            <td><?php echo number_format($zz_sf,2); ?></td>
                        </tr>
                        <tr>
                            <td colspan="2" align="right">股东（结果）：</td>
                            <td colspan="14" align="left"><?php echo number_format($z_guansf,2); ?></td>
                        </tr>
                        <tr>
                            <td colspan="2" align="right">公司（结果）：</td>
                            <td colspan="14" align="left"><?php echo number_format($zz_sf,2); ?></td>
                        </tr>
                        <tr>
                            <td align="center" colspan="16"> <img src="/file/lhc_images/slogo_10.gif" width="15" height="11" align="absmiddle" />操作提示：收付金额的已经算佣金进去了！</td>
                        </tr>
                        <?php endif; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="/file/admin/layui/layui.js"></script>
<link rel="stylesheet" href="/file/admin/layui/base.css">
<style>
    .layui-table[lay-skin="row"] th {
        border-width: 0 1px 0 0;
        text-align: center;
    }
    .layui-table td, .layui-table th {
        position: relative;
        padding: 9px 15px;
        min-height: 20px;
        line-height: 20px;
        font-size: 14px;
        text-align: center;
    }
</style>
<script>

    layui.use('form',function(){
        var form = layui.form;
        var layer=layui.layer;

        form.render();
    });
</script>
</body>
</html>
