<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:57:"D:\www\PHPTutorial\WWW\lhc/app/users\view\guan\index.html";i:1545825818;}*/ ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>修改子账户</title>
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
                <div class="layui-card-body">
                    <form class="layui-form" id="form1" method="post" enctype="multipart/form-data">
                        <div class="layui-form-item">
                            <label class="layui-form-label">账号：</label>
                            <div class="layui-form-mid layui-word-aux"><?php echo $guan['kauser']; ?></div>
                        </div>
                        <div class="layui-form-item">
                            <label class="layui-form-label">密码：</label>
                            <div class="layui-input-inline">
                                <input type="password" class="layui-input" name="kapassword"  placeholder="请输入密码">
                            </div>
                            <div class="layui-form-mid layui-word-aux" style="color:red!important;"> (不修改请留空)</div>
                        </div>
                        <div class="layui-form-item">
                            <label class="layui-form-label">姓名：</label>
                            <div class="layui-input-inline">
                                <input type="text" class="layui-input" name="xm" value="<?php echo $guan['xm']; ?>" placeholder="请输入姓名" lay-verify="required">
                            </div>
                        </div>
                        <div class="layui-form-item">
                            <label class="layui-form-label"> 分配余额：</label>
                            <div class="layui-form-mid layui-word-aux"><?php echo $sum_num; ?></div>
                        </div>
                        <div class="layui-form-item">
                            <label class="layui-form-label"> 总信用额：</label>
                            <div class="layui-form-mid layui-word-aux"><?php echo $guan['cs']; ?></div>
                        </div>
                        <div class="layui-form-item">
                            <label class="layui-form-label"> 走飞：</label>
                            <div class="layui-form-mid layui-word-aux"><?php if($guan['pz'] == 0): ?><img src="/file/lhc_images/icon_21x21_selectboxon.gif"/> <?php else: ?><img src="/file/lhc_images/icon_21x21_selectboxoff.gif"/><?php endif; ?></div>
                        </div>
                        <div class="layui-form-item">
                            <label class="layui-form-label"> 状态：</label>
                            <div class="layui-form-mid layui-word-aux"><?php if($guan['stat'] == 0): ?><img src="/file/lhc_images/icon_21x21_selectboxon.gif"/> <?php else: ?><img src="/file/lhc_images/icon_21x21_selectboxoff.gif"/><?php endif; ?></div>
                        </div>
                        <div class="layui-form-item">
                            <label class="layui-form-label"> 占成：</label>
                            <div class="layui-form-mid layui-word-aux"><?php echo $guan['sf']; ?></div>
                        </div>
                        <div class="layui-form-item">
                            <label class="layui-form-label"> 登录时间：</label>
                            <div class="layui-form-mid layui-word-aux"><?php echo $guan['zlogin']; ?></div>
                        </div>
                        <div class="layui-form-item">
                            <label class="layui-form-label"> 登录IP：</label>
                            <div class="layui-form-mid layui-word-aux"><?php echo $guan['zip']; ?></div>
                        </div>
                        <div class="layui-form-item">
                            <label class="layui-form-label"> 注册时间：</label>
                            <div class="layui-form-mid layui-word-aux"><?php echo $guan['slogin']; ?></div>
                        </div>
                        <div class="layui-form-item">
                            <label class="layui-form-label"> 登录次数：</label>
                            <div class="layui-form-mid layui-word-aux"><?php echo $guan['look']; ?></div>
                        </div>
                        <div class="layui-form-item">
                            <div class="layui-input-block">
                                <input type="hidden" value="<?php echo $guan['id']; ?>" name="id" />
                                <button type="submit" lay-submit lay-filter="save" class="layui-btn">修改资料</button>
                            </div>
                        </div>
                        <table class="layui-table layui-fluid">
                            <thead>
                            <tr>
                                <th>类型</th>
                                <th>佣金%A</th>
                                <th>佣金%B</th>
                                <th>佣金%C</th>
                                <th>佣金%D</th>
                                <th>单注限额</th>
                                <th>单项(号)限额</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php if(!empty($guan['quota'])): if(is_array($guan['quota']) || $guan['quota'] instanceof \think\Collection || $guan['quota'] instanceof \think\Paginator): if( count($guan['quota'])==0 ) : echo "" ;else: foreach($guan['quota'] as $key=>$q): ?>
                            <tr>
                                <td><?php echo $q['ds']; ?></td>
                                <td><?php echo $q['yg']; ?></td>
                                <td><?php echo $q['ygb']; ?></td>
                                <td><?php echo $q['ygc']; ?></td>
                                <td><?php echo $q['ygd']; ?></td>
                                <td><?php echo $q['xx']; ?></td>
                                <td><?php echo $q['xxx']; ?></td>
                            </tr>
                            <?php endforeach; endif; else: echo "" ;endif; ?>
                            <tr><td colspan="7" align="center"><span style="color:red;">(如果修改佣金,单注限额,单项(号)限额比原来的值小那么下级所有用户相应的将变成0)</span></td></tr>
                            <?php else: ?>
                            <tr><td colspan="7" align="center">暂无数据</td></tr>
                            <?php endif; ?>
                            </tbody>
                        </table>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="/file/admin/layui/layui.js"></script>
<link rel="stylesheet" href="/file/admin/layui/base.css">
<script>
    layui.use(['form','table'],function(){
        var form = layui.form;
        var layer=layui.layer;
        form.on('submit(save)', function (data){
            var params = data.field;
            $.post(
                "<?php echo url('saveGuan'); ?>",
                params,
                function(response){
                    layer.msg(response.msg,{icon:6});
                },
                "json"
            );
            return false;
        });
        form.rende
        form.render();
    });

</script>
</body>
</html>