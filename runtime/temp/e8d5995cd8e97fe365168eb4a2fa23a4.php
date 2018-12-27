<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:62:"D:\www\PHPTutorial\WWW\lhc/app/users\view\didan\kithe_tan.html";i:1545825987;}*/ ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>会员下注状况</title>
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
            <form action="" method="post" id="form1" class="layui-form">
                <div class="layui-card">
                    <div class="layui-card-header">
                        <span style="color: red;"><?php echo $data['kauser']; ?></span>&nbsp;&nbsp;&nbsp;<?php echo $kithe; ?>期&nbsp;会员下注状况
                        <div class="layui-btn-group" style="float:right;">
                            <a class="layui-btn layui-btn-primary layui-btn-sm" href="<?php echo url('index'); ?>">返回上一层</a>
                            <a class="layui-btn layui-btn-primary layui-btn-sm" href="javascript:location.reload();">刷新</a>
                        </div>
                    </div>
                    <div class="layui-card-body" pad15>
                        <table class="layui-table">
                            <thead>
                            <tr>
                                <th>序号</th>
                                <th>会员</th>
                                <th>单号</th>
                                <th>下注时间</th>
                                <th>内容</th>
                                <th>赔率</th>
                                <th>金额</th>
                                <td>佣金</td>
                                <td>会员收付</td>
                            </tr>
                            </thead>
                            <tbody>
                                <?php if($result): if(is_array($result) || $result instanceof \think\Collection || $result instanceof \think\Paginator): if( count($result)==0 ) : echo "" ;else: foreach($result as $key=>$r): ?>
                                <tr>
                                    <td><?php echo $r['id']; ?></td>
                                    <td><?php echo $r['username']; ?></td>
                                    <td><?php echo $r['num']; ?></td>
                                    <td><?php echo $r['adddate']; ?></td>
                                    <td><?php if($r['class1'] == '过关'): if(is_array($r['c2']) || $r['c2'] instanceof \think\Collection || $r['c2'] instanceof \think\Paginator): if( count($r['c2'])==0 ) : echo "" ;else: foreach($r['c2'] as $k=>$c): ?>
                                            <?php echo $c; ?>@<?php echo $r['c3'][$k*2-1]; endforeach; endif; else: echo "" ;endif; else: ?>
                                        <?php echo $r['class2']; ?>:<?php echo $r['class3']; endif; ?></td>
                                    <td><?php echo $r['rate']; ?></td>
                                    <td><?php echo $r['sum_m']; ?></td>
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
                                        <?php echo $r['sum_m']*$r['rate']-$r['sum_m']+$r['sum_m']*$r['user_ds']/100; else: ?>
                                        <?php echo $r['sum_m']*$r['user_ds']/100-$r['sum_m']; endif; ?>
                                    </td>
                                </tr>
                                <?php endforeach; endif; else: echo "" ;endif; endif; ?>
                                <tr>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td>小计</td>
                                    <td>共下注《<?php echo $num; ?>注》</td>
                                    <td></td>
                                    <td><?php echo $z_sum; ?></td>
                                    <td><?php echo $z_userds; ?></td>
                                    <td><?php echo $z_user; ?></td>
                                </tr>
                                <tr>
                                    <td colspan="9" align="center"><?php echo $page; ?></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<script src="/file/admin/layui/layui.js"></script>
<link rel="stylesheet" href="/file/admin/layui/base.css">
<script>
    layui.use('form',function(){
        var form = layui.form;
        var layer=layui.layer;
        form.on('submit(save)', function (data){
            var params = data.field;
            $.post(
                "<?php echo url('save'); ?>",
                params,
                function(response){
                    if (response.code == 0){
                        layer.msg(response.msg,{icon:1},function(){
                            var index = parent.layer.getFrameIndex(window.name);
                            parent.layer.close(index);
                            window.parent.location.reload();
                        });
                    }else{
                        layer.msg(response.msg,{icon:2});
                    }
                },
                "json"
            );
            return false;
        });
        form.render();
    });
</script>
</body>
</html>
