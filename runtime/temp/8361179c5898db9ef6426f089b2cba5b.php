<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:55:"D:\www\PHPTutorial\WWW\lhc/app/users\view\zi\index.html";i:1545027655;}*/ ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>子账户</title>
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
                    [<?php echo $data['kauser']; ?>]子账号管理
                    <div class="layui-btn-group" style="float:right;">
                        <a class="layui-btn layui-btn-primary layui-btn-sm" id="add">添加子账号</a>
                        <a class="layui-btn layui-btn-primary layui-btn-sm" href="javascript:location.reload();">刷新</a>
                    </div>
                </div>
                <div class="layui-card-body" pad15>
                    <table class="layui-table">
                        <thead>
                        <tr>
                            <th>编号</th>
                            <th>分类名称</th>
                            <th>所属代理</th>
                            <th>加入时间</th>
                            <th>操作</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php if(!empty($result)): if(is_array($result) || $result instanceof \think\Collection || $result instanceof \think\Paginator): if( count($result)==0 ) : echo "" ;else: foreach($result as $key=>$r): ?>
                        <tr>
                            <th><?php echo $r['id']; ?></th>
                            <th><?php echo $r['kauser']; ?></th>
                            <th><?php echo $r['guan']; ?></th>
                            <th><?php echo $r['adddate']; ?></th>
                            <th>
                                <a class="layui-btn layui-btn-xs" onclick="update(<?php echo $r['id']; ?>)">编辑</a>
                                <a class="layui-btn layui-btn-danger layui-btn-xs" onclick="deleteId(<?php echo $r['id']; ?>)">删除</a>
                            </th>
                        </tr>
                        <?php endforeach; endif; else: echo "" ;endif; endif; ?>
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
    layui.use(['layer'],function(){
        var layer=layui.layer;
        $('#add').click(function(){
            add();
        });

    });

    function add(){
        layer.open({
            type: 2,
            title: '新增子账户',
            shadeClose: true,
            shade: false,
            maxmin: true,
            area: ['600px', '270px'],
            content: '<?php echo url('addzi'); ?>'
        });
    }

    function update(id){
        layer.open({
            type: 2,
            title: '修改子账户',
            shadeClose: true,
            shade: false,
            maxmin: true,
            area: ['600px', '270px'],
            content: '<?php echo url('updatezi'); ?>?id='+id
        });
    }

    function deleteId(id){
        var index = layer.confirm(
            '确定要删除?',
            {
                btn : ['确定','取消']
            },
            function(){
                $.post(
                    "<?php echo url('deleteZi'); ?>",
                    {
                        id : id
                    },
                    function(data){
                        if(data.code == 0){
                            layer.msg(data.msg,{icon : 1,time : 2000},function(){
                                location.reload();
                            });
                        }
                        else{
                            layer.msg(data.msg,{icon : 2});
                        }
                    },
                    "json"
                );
            }
        );
    }
</script>
</body>
</html>
