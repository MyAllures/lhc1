<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:56:"D:\www\PHPTutorial\WWW\lhc/app/users\view\zi\add_zi.html";i:1545019056;}*/ ?>
<html>
<head>
    <meta charset="utf-8">
    <title>新增子账户</title>
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
                            <div class="layui-input-block">
                                <input type="text" class="layui-input" name="kauser"  placeholder="请输入账号" lay-verify="required">
                            </div>
                        </div>

                        <div class="layui-form-item">
                            <label class="layui-form-label">密码：</label>
                            <div class="layui-input-block">
                                <input type="text" class="layui-input" name="kapassword"  placeholder="请输入密码" lay-verify="required">
                            </div>
                        </div>
                        <div class="layui-form-item">
                            <div class="layui-input-block">
                                <input type="hidden" value="<?php echo $users['id']; ?>" name="pid" />
                                <button type="submit" class="layui-btn"  lay-submit lay-filter="save">保存</button></div>
                        </div>
                    </form>
                </div>
            </div>
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
                "<?php echo url('savezi'); ?>",
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

