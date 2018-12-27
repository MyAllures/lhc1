<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:57:"D:\www\PHPTutorial\WWW\lhc/app/users\view\flyk\index.html";i:1545827449;}*/ ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>分类盈亏</title>
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
            <form action="<?php echo url('index'); ?>" method="get" id="form1" class="layui-form">
                <div class="layui-card">
                    <div class="layui-card-header">
                        分类盈亏&nbsp;[<?php echo $kithe; ?>期]
                        <div class="layui-btn-group" style="float:right;">
                            <a class="layui-btn layui-btn-primary layui-btn-sm" href="javascript:location.reload();">刷新</a>
                        </div>
                    </div>
                    <div class="layui-form-item" style="margin-top: 10px;margin-bottom: 10px;">
                        <div class="layui-inline" style="width: 150px;">
                            <div class="layui-input-block" style="margin-left: 0;">
                                <?php if($kitheAll): ?>
                                <select name="kithe">
                                    <option value="" selected="selected">选择期数：</option>
                                    <?php if(is_array($kitheAll) || $kitheAll instanceof \think\Collection || $kitheAll instanceof \think\Paginator): if( count($kitheAll)==0 ) : echo "" ;else: foreach($kitheAll as $key=>$k): ?>
                                    <option value="<?php echo $k['nn']; ?>">第<?php echo $k['nn']; ?>期</option>
                                    <?php endforeach; endif; else: echo "" ;endif; ?>
                                </select>
                                <?php endif; ?>
                            </div>
                        </div>
                        <div class="layui-inline">
                            <div class="layui-input-block" style="margin-left: 0;">
                                <button class="layui-btn" lay-submit>提交</button>
                            </div>
                        </div>
                    </div>

                    <div class="layui-card-body" pad15>
                        <table class="layui-table">
                            <thead>
                            <tr>
                                <th>序号</th>
                                <th>类别</th>
                                <th>注数</th>
                                <th>下注金额</th>
                                <th>实投</th>
                                <th>本级占成</th>
                                <th>会员盈亏</th>
                                <td>本级盈亏</td>
                                <td>类别</td>
                            </tr>
                            </thead>
                            <tbody>
                            <?php if($res): if(is_array($res) || $res instanceof \think\Collection || $res instanceof \think\Paginator): if( count($res)==0 ) : echo "" ;else: foreach($res as $key=>$r): ?>
                            <tr>
                                <td><?php echo $key+1; ?></td>
                                <td><?php echo $r['class2']; ?></td>
                                <td><?php echo $r['rs5']['re']; ?></td>
                                <td><a href="<?php echo url('index2',['class2'=>$r['class2'],'kithe'=>$kithe]); ?>"><?php echo $r['rs5']['sum_m']; ?></a></td>
                                <td><?php echo round($r['rs5']['sum_st'],0); ?></td>
                                <td><?php echo round($r['rs5']['dagu_zc'],0); ?></td>
                                <td><?php echo round($r['rs5']['sum_mt'],0); ?></td>
                                <td><?php echo round($r['rs5']['sum_ct'],0); ?></td>
                                <td><?php echo $r['class2']; ?></td>
                            </tr>
                            <?php endforeach; endif; else: echo "" ;endif; endif; ?>
                            <tr>
                                <td colspan="2" align="center">总计：</td>
                                <td><?php echo $z_re; ?></td>
                                <td><?php echo $z_sum; ?></td>
                                <td><?php echo round($z_st,0); ?></td>
                                <td><?php echo round($z_dagu,0); ?></td>
                                <td><?php echo round($sum_mt,0); ?></td>
                                <td><?php echo round($sum_ct,0); ?></td>
                                <td></td>
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
