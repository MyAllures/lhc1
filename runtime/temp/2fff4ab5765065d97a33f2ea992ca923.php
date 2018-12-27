<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:58:"D:\www\PHPTutorial\WWW\lhc/app/users\view\didan\index.html";i:1545132301;}*/ ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>底单</title>
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
                        总底单
                        <div class="layui-btn-group" style="float:right;">
                            <a class="layui-btn layui-btn-primary layui-btn-sm" href="javascript:location.reload();">刷新</a>
                        </div>
                    </div>
                    <div class="layui-card-body" pad15>
                        <table class="layui-table">
                            <thead>
                            <tr>
                                <th>序号</th>
                                <th>日期</th>
                                <th>期数</th>
                                <th>金额</th>
                                <th>佣金</th>
                                <th>结果</th>
                            </tr>
                            </thead>
                            <tbody>
                                <?php if(is_array($result) || $result instanceof \think\Collection || $result instanceof \think\Paginator): if( count($result)==0 ) : echo "" ;else: foreach($result as $key=>$r): if(isset($r['rs5'])): ?>
                                    <tr>
                                        <td><?php echo $r['id']; ?></td>
                                        <td><a href="<?php echo url('kithetan',['kithe'=>$r['nn']]); ?>"><?php echo substr($r['nd'],0,10); ?>星期<?php echo $r['week']; ?></a></td>
                                        <td><?php echo $r['nn']; ?>期</td>
                                        <td><a href="<?php echo url('kithetan',['kithe'=>$r['nn']]); ?>"><?php echo $r['rs5']['sum_m']; ?></a></td>
                                        <td><?php echo number_format($r['rs6']['user_ds']+$r['rs7']['user_ds'],2); ?></td>
                                        <td><?php echo number_format($r['rs6']['sum_m']+$r['rs7']['sum_m'],2); ?></td>
                                    </tr>
                                <?php endif; endforeach; endif; else: echo "" ;endif; ?>
                                <tr>
                                    <td></td>
                                    <td>小计</td>
                                    <td></td>
                                    <td><?php echo $z_sum; ?></td>
                                    <td><?php echo $z_userds; ?></td>
                                    <td><?php echo $z_usersf; ?></td>
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
