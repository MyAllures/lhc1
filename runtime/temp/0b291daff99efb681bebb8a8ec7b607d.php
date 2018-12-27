<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:58:"D:\www\PHPTutorial\WWW\lhc/app/users\view\flyk\index2.html";i:1545827554;}*/ ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>投注品种</title>
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
                    &nbsp;&nbsp;&nbsp;&nbsp; 投注品种<?php echo \think\Request::instance()->get('class2'); ?>
                    <div class="layui-btn-group" style="float:right;">
                        <a class="layui-btn layui-btn-primary layui-btn-sm" href="javascript:history.back();">返回</a>
                        <a class="layui-btn layui-btn-primary layui-btn-sm" href="javascript:location.reload();">刷新</a>
                    </div>
                </div>
                <div class="layui-card-body" pad15>
                    <table class="layui-table">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>会员</th>
                            <th>下单时间</th>
                            <th>期数</th>
                            <th>下注金额</th>
                            <th>类型</th>
                            <th>内容</th>
                            <td>会员佣金</td>
                            <td>会员收付</td>
                            <td>代理佣金</td>
                        </tr>
                        </thead>
                        <tbody>
                        <?php if($res): if(is_array($res) || $res instanceof \think\Collection || $res instanceof \think\Paginator): if( count($res)==0 ) : echo "" ;else: foreach($res as $key=>$r): ?>
                        <tr>
                            <td><?php echo $r['id']; ?></td>
                            <td><?php echo $r['username']; ?>(<span style="color: #ff6600;"><?php echo $r['mem']['xm']; ?></span>).<?php echo $r['abcd']; ?></td>
                            <td><?php echo $r['adddate']; ?></td>
                            <td><?php echo $r['kithe']; ?>期</td>
                            <td><?php echo $r['sum_m']; ?></td>
                            <td><?php echo $r['class1']; ?></td>
                            <td><?php echo $r['class2']; ?>: <span style="color: #ff6600"><?php echo $r['class3']; ?></span>@ <span style="color: #ff0000;"><?php echo $r['rate']; ?></span></td>
                            <td>
                                <?php if($r['bm'] == 2): ?>
                                    0
                                <?php else: ?>
                                    <?php echo $r['sum_m']*$r['user_ds']/100; endif; ?>
                            </td>
                            <td>
                                <?php if($r['bm'] == 2): ?>
                                0
                                <?php elseif($r['bm'] == 1): ?>
                                <?php echo $r['sum_m']*$r['rate']-$r['sum_m']+$r['sum_m']*$rs['user_ds']/100;; else: ?>
                                <?php echo $r['sum_m']*$r['user_ds']/100-$r['sum_m']; endif; ?>
                            </td>
                            <td>
                                <?php if($r['bm'] == 2): ?>
                                0
                                <?php else: ?>
                                <?php echo $r['daids_one']; endif; ?>
                            </td>
                        </tr>
                        <?php endforeach; endif; else: echo "" ;endif; endif; ?>
                        <tr>
                            <td colspan="2" align="center">总计：</td>
                            <td><?php echo $z_re; ?></td>
                            <td></td>
                            <td><?php echo $z_sum; ?></td>
                            <td></td>
                            <td></td>
                            <td><?php echo number_format($z_userds,2); ?></td>
                            <td><?php echo number_format($z_user,2); ?></td>
                            <td><?php echo number_format($z_daids,2); ?></td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="/file/admin/layui/layui.js"></script>
<link rel="stylesheet" href="/file/admin/layui/base.css">
<script>
    layui.use('laydate',function () {
        var laydate=layui.laydate;
        laydate.render({
            elem:'#start',
        })
        laydate.render({
            elem:'#stop',
        })
    })

    layui.use('form',function(){
        var form = layui.form;
        var layer=layui.layer;

        form.render();
    });
</script>
</body>
</html>
