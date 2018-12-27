<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:59:"D:\www\PHPTutorial\WWW\lhc/app/users\view\zt\update_pz.html";i:1545718706;}*/ ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>走飞设置--正特</title>
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
                            <label class="layui-form-label">号码：</label>
                            <div class="layui-form-mid layui-word-aux"><?php echo $data['class1']; ?>:<?php echo $data['class3']; ?></div>
                        </div>

                        <div class="layui-form-item">
                            <label class="layui-form-label">赔率：</label>
                            <div class="layui-input-inline">
                                <input type="text" class="layui-input" name="rate" value="<?php echo $data['rate']; ?>">
                            </div>
                        </div>
                        <div class="layui-form-item">
                            <label class="layui-form-label">金额：</label>
                            <div class="layui-input-inline">
                                <input type="text" class="layui-input" name="sum_m" value="<?php echo $data['sum_m']; ?>">
                            </div>
                        </div>

                        <div class="layui-form-item">
                            <div class="layui-input-block">
                                <input name="class3" type="hidden" id="class3" value="<?php echo $data['class3']; ?>"/>
                                <input name="class1" type="hidden" id="class1" value="<?php echo $data['class1']; ?>"/>
                                <input name="class2" type="hidden" id="class2" value="<?php echo $data['class2']; ?>"/>
                                <input name="act" type="hidden"  value="save"/>
                                <button type="submit" class="layui-btn"  lay-submit lay-filter="save">补仓</button>
                            </div>
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
                "<?php echo url('saveUpPz'); ?>",
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

