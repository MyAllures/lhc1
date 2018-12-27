<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:56:"D:\www\PHPTutorial\WWW\lhc/app/users\view\mem\index.html";i:1544876767;}*/ ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>会员列表</title>
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
                    <?php if($data['lx'] == 1): ?>
                    总代
                    <select name="ids1" class="zaselect_ste" id="ids1" lay-ignore>
                        <option value="0">全部</option>
                        <?php if($res): if(is_array($res) || $res instanceof \think\Collection || $res instanceof \think\Paginator): if( count($res)==0 ) : echo "" ;else: foreach($res as $key=>$r1): ?>
                        <option value="<?php echo $r1['id']; ?>" <?php if($r1['select']): ?>selected="selected"<?php endif; ?>><?php echo $r1['kauser']; ?></option>
                        <?php endforeach; endif; else: echo "" ;endif; endif; ?>
                    </select>
                    <?php endif; if($data['lx'] != 2): ?>
                    --代理
                    <select name="ids1" class="zaselect_ste" id="ids2" lay-ignore>
                        <option value="0">全部</option>
                        <?php if($res1): if(is_array($res1) || $res1 instanceof \think\Collection || $res1 instanceof \think\Paginator): if( count($res1)==0 ) : echo "" ;else: foreach($res1 as $key=>$r2): ?>
                        <option value="<?php echo $r2['id']; ?>" <?php if($r2['select']): ?>selected="selected"<?php endif; ?>><?php echo $r2['kauser']; ?></option>
                        <?php endforeach; endif; else: echo "" ;endif; endif; ?>
                    </select>
                    <?php endif; ?>
                    <div class="layui-btn-group" style="float:right;">
                        <a class="layui-btn layui-btn-primary layui-btn-sm" href="<?php echo url('index',['size'=>'all']); ?>" ><i class="layui-icon-group"></i>所有代理</a>
                        <a class="layui-btn layui-btn-primary layui-btn-sm" href="<?php echo url('index',['stat'=>0]); ?>">开启</a>
                        <a class="layui-btn layui-btn-primary layui-btn-sm" href="<?php echo url('index',['stat'=>1]); ?>">禁止</a>
                        <a class="layui-btn layui-btn-primary layui-btn-sm" href="<?php echo url('addmem'); ?>">添加会员</a>
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
                            <th>信用额度/余额</th>
                            <th>代理</th>
                            <?php if($data['lx'] <= 2): ?><th>总代</th><?php endif; if($data['lx'] == 1): ?><th>股东</th><?php endif; ?>
                            <th>代%</th>
                            <?php if($data['lx'] <= 2): ?><th>总%</th><?php endif; if($data['lx'] == 1): ?> <th>股%</th><?php endif; ?>
                            <th>类型</th>
                            <th>状况</th>
                            <th>注册时间</th>
                            <th>登录次数</th>
                            <th>操作</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php if($result != null): if(is_array($result) || $result instanceof \think\Collection || $result instanceof \think\Paginator): if( count($result)==0 ) : echo "" ;else: foreach($result as $key=>$r): ?>
                        <tr>
                            <td><?php echo $r['id']; ?></td>
                            <td><?php echo $r['kauser']; ?></td>
                            <td><?php echo $r['xm']; ?></td>
                            <td><?php echo $r['cs']; ?>/<?php echo $r['ts']; ?></td>
                            <td><?php echo $r['dan']; ?></td>
                            <?php if($data['lx'] <= 2): ?> <td><?php echo $r['zong']; ?></td><?php endif; if($data['lx'] == 1): ?> <td><?php echo $r['guan']; ?></td><?php endif; ?>
                            <td><?php echo $r['dan_zc']*10; ?>%</td>
                            <?php if($data['lx'] <= 2): ?><td><?php echo $r['zong_zc']*10; ?>%</td><?php endif; if($data['lx'] == 1): ?><td><?php echo $r['zong_zc']*10; ?>%</td><?php endif; ?>
                            <td><?php echo $r['abcd']; ?>盘</td>
                            <td><?php if($r['stat'] == 0): ?><img src="/file/lhc_images/icon_21x21_selectboxon.gif"><?php else: ?><img src="/file/lhc_images/icon_21x21_selectboxoff.gif"><?php endif; ?></td>
                            <td><?php echo $r['adddate']; ?></td>
                            <td><?php echo $r['look']; ?></td>
                            <td>
                                <a class="layui-btn layui-btn-xs" href="<?php echo url('updatemem',['id'=>$r['id']]); ?>">编辑</a>
                                <!--<a class="layui-btn layui-btn-danger layui-btn-xs" lay-event="del">删除</a>-->
                            </td>
                        </tr>
                        <?php endforeach; endif; else: echo "" ;endif; else: ?>
                        <tr>
                            <?php if($data['lx'] == 1): ?><td colspan="15" align="center">暂无数据</td><?php endif; if($data['lx'] == 2): ?><td colspan="13" align="center">暂无数据</td><?php endif; if($data['lx'] == 3): ?><td colspan="11" align="center">暂无数据</td><?php endif; ?>
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
            location.href="<?php echo url('index'); ?>?ids1="+$(this).val();
        });
        $('#ids2').change(function(){
            location.href="<?php echo url('index'); ?>?ids2="+$(this).val();
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