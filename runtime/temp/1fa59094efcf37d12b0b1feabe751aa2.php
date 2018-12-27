<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:59:"D:\www\PHPTutorial\WWW\lhc/app/users\view\bucang\index.html";i:1545100544;}*/ ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>自动补仓设置</title>
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
                    补仓设置 <label for="che" style="margin-left:30px;"><input type="checkbox" lay-ignore name="best" id="che" value="1" <?php if($users['best'] == 1): ?>checked="checked"<?php endif; ?>>&nbsp;
                    启动自动补</label> <?php if($users['pz'] == 1): ?><span style="color: red;">对不起,您未开启补仓功能,有问题请联系你上级！</span><?php endif; ?>
                    <div class="layui-btn-group" style="float:right;">
                        <a class="layui-btn layui-btn-primary layui-btn-sm" href="javascript:location.reload();">刷新</a>
                    </div>
                </div>
                <div class="layui-card-body" pad15>
                    <table class="layui-table">
                        <thead>
                        <tr>
                            <th>项目</th>
                            <th>自补设置(限额)</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td>特码</td>
                            <td><input type="text" name="tm1" value="<?php echo $users['tm1']; ?>" lay-verify="required|number"></td>
                        </tr>
                        <tr>
                            <td>双面</td>
                            <td><input type="text" name="xx1" value="<?php echo $users['xx1']; ?>" lay-verify="required|number"></td>
                        </tr>
                        <tr>
                            <td>正特</td>
                            <td><input type="text" name="zt1" value="<?php echo $users['zt1']; ?>" lay-verify="required|number"></td>
                        </tr>
                        <tr>
                            <td>合肖</td>
                            <td><input type="text" name="sx1" value="<?php echo $users['sx1']; ?>" lay-verify="required|number"></td>
                        </tr>
                        <tr>
                            <td>正码</td>
                            <td><input type="text" name="zm1" value="<?php echo $users['zm1']; ?>" lay-verify="required|number"></td>
                        </tr>
                        <tr>
                            <td>半波</td>
                            <td><input type="text" name="bb1" value="<?php echo $users['bb1']; ?>" lay-verify="required|number"></td>
                        </tr>
                        <tr>
                            <td>三全中</td>
                            <td><input type="text" name="lm1" value="<?php echo $users['lm1']; ?>" lay-verify="required|number"></td>
                        </tr>
                        <tr>
                            <td>三中二</td>
                            <td><input type="text" name="lm2" value="<?php echo $users['lm2']; ?>" lay-verify="required|number"></td>
                        </tr>
                        <tr>
                            <td>二全中</td>
                            <td><input type="text" name="lm3" value="<?php echo $users['lm3']; ?>" lay-verify="required|number"></td>
                        </tr>
                        <tr>
                            <td>二中特</td>
                            <td><input type="text" name="lm4" value="<?php echo $users['lm4']; ?>" lay-verify="required|number"></td>
                        </tr>
                        <tr>
                            <td>特串</td>
                            <td><input type="text" name="lm5" value="<?php echo $users['lm5']; ?>" lay-verify="required|number"></td>
                        </tr>
                        <tr>
                            <td>一肖（平特肖）</td>
                            <td><input type="text" name="yx1" value="<?php echo $users['yx1']; ?>" lay-verify="required|number"></td>
                        </tr>
                        <tr>
                            <td>过关</td>
                            <td><input type="text" name="gg1" value="<?php echo $users['gg1']; ?>" lay-verify="required|number"></td>
                        </tr>
                        <tr>
                            <td>五行</td>
                            <td><input type="text" name="wx1" value="<?php echo $users['gg1']; ?>" lay-verify="required|number"></td>
                        </tr>
                        <tr>
                            <td>二肖连中</td>
                            <td><input type="text" name="lx1" value="<?php echo $users['lx1']; ?>" lay-verify="required|number"></td>
                        </tr>
                        <tr>
                            <td>三肖连中</td>
                            <td><input type="text" name="lx2" value="<?php echo $users['lx2']; ?>" lay-verify="required|number"></td>
                        </tr>
                        <tr>
                            <td>四肖连中</td>
                            <td><input type="text" name="lx3" value="<?php echo $users['lx3']; ?>" lay-verify="required|number"></td>
                        </tr>
                        <tr>
                            <td>五肖连中</td>
                            <td><input type="text" name="lx4" value="<?php echo $users['lx4']; ?>" lay-verify="required|number"></td>
                        </tr>
                        <tr>
                            <th>二肖连不中</th>
                            <th><input type="text" name="lx5" value="<?php echo $users['lx5']; ?>" lay-verify="required|number"></th>
                        </tr>
                        <tr>
                            <th>三肖连不中</th>
                            <th><input type="text" name="lx6" value="<?php echo $users['lx6']; ?>" lay-verify="required|number"></th>
                        </tr>
                        <tr>
                            <th>四肖连不中</th>
                            <th><input type="text" name="lx7" value="<?php echo $users['lx7']; ?>" lay-verify="required|number"></th>
                        </tr>
                        <tr>
                            <th>七色波</th>
                            <th><input type="text" name="qsb1" value="<?php echo $users['qsb1']; ?>" lay-verify="required|number"></th>
                        </tr>
                        <tr>
                            <th>五不中</th>
                            <th><input type="text" name="qbz1" value="<?php echo $users['qbz1']; ?>" lay-verify="required|number"></th>
                        </tr>
                        <tr>
                            <th>六不中</th>
                            <th><input type="text" name="qbz2" value="<?php echo $users['qbz2']; ?>" lay-verify="required|number"></th>
                        </tr>
                        <tr>
                            <th>七不中</th>
                            <th><input type="text" name="qbz3" value="<?php echo $users['qbz3']; ?>" lay-verify="required|number"></th>
                        </tr>
                        <tr>
                            <th>八不中</th>
                            <th><input type="text" name="qbz4" value="<?php echo $users['qbz4']; ?>" lay-verify="required|number"></th>
                        </tr>
                        <tr>
                            <th>九不中</th>
                            <th><input type="text" name="qbz5" value="<?php echo $users['qbz5']; ?>" lay-verify="required|number"></th>
                        </tr>
                        <tr>
                            <th>十不中</th>
                            <th><input type="text" name="qbz6" value="<?php echo $users['qbz6']; ?>" lay-verify="required|number"></th>
                        </tr>
                        <tr>
                            <th>十一不中</th>
                            <th><input type="text" name="qbz7" value="<?php echo $users['qbz7']; ?>" lay-verify="required|number"></th>
                        </tr>
                        <tr>
                            <th>十二不中</th>
                            <th><input type="text" name="qbz8" value="<?php echo $users['qbz8']; ?>" lay-verify="required|number"></th>
                        </tr>
                        <tr>
                            <th>二尾连中</th>
                            <th><input type="text" name="wsl1" value="<?php echo $users['wsl1']; ?>" lay-verify="required|number"></th>
                        </tr>
                        <tr>
                            <th>三尾连中</th>
                            <th><input type="text" name="wsl2" value="<?php echo $users['wsl2']; ?>" lay-verify="required|number"></th>
                        </tr>
                        <tr>
                            <th>四尾连中</th>
                            <th><input type="text" name="wsl3" value="<?php echo $users['wsl3']; ?>" lay-verify="required|number"></th>
                        </tr>
                        <tr>
                            <th>二尾连不中</th>
                            <th><input type="text" name="wsl4" value="<?php echo $users['wsl4']; ?>" lay-verify="required|number"></th>
                        </tr>
                        <tr>
                            <th>三尾连不中</th>
                            <th><input type="text" name="wsl5" value="<?php echo $users['wsl5']; ?>" lay-verify="required|number"></th>
                        </tr>
                        <tr>
                            <th>四尾连不中</th>
                            <th><input type="text" name="wsl6" value="<?php echo $users['wsl6']; ?>" lay-verify="required|number"></th>
                        </tr>
                        <tr>
                            <th>尾数（平特尾）</th>
                            <th><input type="text" name="ws1" value="<?php echo $users['ws1']; ?>" lay-verify="required|number"></th>
                        </tr>
                        <tr>
                            <td colspan="2" align="center">
                                <input type="hidden" value="<?php echo $users['id']; ?>" name="id" />
                                <button type="submit" class="layui-btn"  lay-submit lay-filter="save">保存</button>
                                <button type="reset" class="layui-btn layui-btn-primary"  lay-submit lay-filter="save">重置</button>
                            </td>
                        </tr>
                        <tr>
                            <td height="25" colspan="2" bordercolor="cccccc" style="LINE-HEIGHT: 23px; color: blue;"><span class="STYLE5"><strong align=center>注意：<br>
          选择“自动补仓”功能后，<font size=3><span style="color: red;">请务必填写“限额”</span></font>。<br>
          说明：自动补仓从你开启此项功能开始，每一个新单都会帮你进行超额计算，同时限定<u>最小自动下调金额</u>不小于1。<br>
          例如：某占成设置为300，如果此时你的占成小于300系统则不会自动帮你补；必须占成大于300时，系统才会帮你补掉大于300的那部分。</strong></span></td>
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
