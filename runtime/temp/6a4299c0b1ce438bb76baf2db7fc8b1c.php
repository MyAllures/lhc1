<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:57:"D:\www\PHPTutorial\WWW\lhc/app/users\view\zong\index.html";i:1545384334;}*/ ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>总代理</title>
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
                <div class="layui-card-header">总代理
                    <div class="layui-inline">
                        <form action="<?php echo url('index'); ?>" method="post" style="margin-left: 50px;">
                            <label class="layui-form-label" style="width: 150px;">总代理账号：</label>
                            <div class="layui-input-inline"><input type="text" class="layui-input" lay-ignore name="kauser"></div>
                            <div class="layui-inline"><button lay-submit class="layui-btn layui-btn-sm">确认搜索</button></div>
                        </form>
                    </div>
                    <div class="layui-btn-group" style="float:right;">
                        <a class="layui-btn layui-btn-primary layui-btn-sm" href="<?php echo url('index',['size'=>'all']); ?>" ><i class="layui-icon-group"></i>所有总代理</a>
                        <a class="layui-btn layui-btn-primary layui-btn-sm" href="<?php echo url('index',['stat'=>0]); ?>">开启</a>
                        <a class="layui-btn layui-btn-primary layui-btn-sm" href="<?php echo url('index',['stat'=>1]); ?>">禁止</a>
                        <a class="layui-btn layui-btn-primary layui-btn-sm" href="<?php echo url('addzong'); ?>">添加总代理</a>
                        <a class="layui-btn layui-btn-primary layui-btn-sm" href="javascript:location.reload();">刷新</a>
                    </div>
                </div>
                <div class="layui-card-body" pad15>
                    <table class="layui-table" lay-even style="overflow:scroll;!important;">
                        <thead>
                        <tr>
                            <th>序号</th>
                            <th>账号</th>
                            <th>姓名</th>
                            <th>信用额度/分配余额</th>
                            <th>股东</th>
                            <th>代/会</th>
                            <th>总%</th>
                            <th>股%</th>
                            <th>走飞</th>
                            <th>状况</th>
                            <th>注册时间</th>
                            <th>登录次数</th>
                            <th>操作</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php if($res != null): if(is_array($res) || $res instanceof \think\Collection || $res instanceof \think\Paginator): if( count($res)==0 ) : echo "" ;else: foreach($res as $key=>$r): ?>
                        <tr>
                            <td><?php echo $r['id']; ?></td>
                            <td><a href=""><?php echo $r['kauser']; ?></a></td>
                            <td><?php echo $r['xm']; ?></td>
                            <td><?php echo $r['cs']; ?>/<?php echo $r['cs_used']; ?></td>
                            <td><?php echo $r['guan']; ?></td>

                            <td><?php echo $r['memnum1']; ?>/<?php echo $r['memnum2']; ?></td>
                            <td><?php echo $r['sf']; ?>%</td>
                            <td><?php echo $r['sj']; ?>%</td>
                            <td><?php if($r['pz'] == 0): ?><img src="/file/lhc_images/icon_21x21_selectboxon.gif"><?php else: ?><img src="/file/lhc_images/icon_21x21_selectboxoff.gif"><?php endif; ?></td>
                            <td><?php if($r['stat'] == 0): ?><img src="/file/lhc_images/icon_21x21_selectboxon.gif"><?php else: ?><img src="/file/lhc_images/icon_21x21_selectboxoff.gif"><?php endif; ?></td>
                            <td><?php echo $r['adddate']; ?></td>
                            <td><?php echo $r['look']; ?></td>
                            <td>
                                <a class="layui-btn layui-btn-xs" href="<?php echo url('editZong',['id'=>$r['id']]); ?>">编辑</a>
                                <a class="layui-btn layui-btn-xs" href="<?php echo url('daili/adddaili',['id'=>$r['id']]); ?>">添加代理</a>
                                <!--<a class="layui-btn layui-btn-danger layui-btn-xs" lay-event="del">删除</a>-->
                            </td>
                        </tr>
                        <?php endforeach; endif; else: echo "" ;endif; else: ?>
                        <tr>
                            <td colspan="14" align="center">暂无数据</td>
                        </tr>
                        <?php endif; ?>
                        </tbody>
                    </table>
                    <div id="pages"><?php echo $page; ?></div>
                </div>
            </div>
        </div>
    </div>
</div>

</body>
</html>
<script src="/file/admin/layui/layui.js"></script>
<link rel="stylesheet" href="/file/admin/layui/base.css">
<style>
    .layui-table-body{
        overflow: auto;!important;
    }
</style>
<script>
    layui.use(['table'],function(){

    });

    $(function(){
        $('#ids1').change(function(){
            location.href="<?php echo url('index'); ?>?id="+$(this).val();
        });
    });
    function DelParter(id){
        var index = layer.confirm(
            '确定要删除?',
            {
                btn : ['确定','取消']
            },
            function(){
                $.post(
                    "<?php echo url(''); ?>",
                    {
                        id : id
                    },
                    function(data){
                        if(data.code == 0){
                            layer.msg(data.msg,{icon : 1,time : 2000},function(){
                                pageReload();
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

    function Edit(id){
        layer.open({
            type: 2,
            title: '编辑合作伙伴',
            shadeClose: true,
            shade: false,
            maxmin: true,
            area: ['600px', '500px'],
            content: '<?php echo url(''); ?>?id='+id
        });
    }

    function Add(){
        layer.open({
            type: 2,
            title: '新增合作伙伴',
            shadeClose: true,
            shade: false,
            maxmin: true,
            area: ['600px', '500px'],
            closeBtn: 1,
            content: '<?php echo url(''); ?>'
            /*
            end: function (){
                location.reload();
            }
            */
        });
    }

    function pageReload(){
        table.reload('tableShow', {
            where : queryData
        });
    }
</script>