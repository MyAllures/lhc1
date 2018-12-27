<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:57:"D:\www\PHPTutorial\WWW\lhc/app/users\view\zhudan\cha.html";i:1545826768;}*/ ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>注单查询结果</title>
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
                    <span style="color: red;">
                        <?php if(!empty($kithe) and !empty($username)): ?>
                        [<?php echo $username; ?>]会员注单[<?php echo $kithe; ?>期]查询列表
                        <?php else: ?>
                        注单查询表表
                        <?php endif; ?>
                    </span>
                    <div class="layui-inline" style="margin-left: 20%;">
                        当前报表-->>
                        <?php if($kithe): ?>
                            查第<?php echo $kithe; ?>期
                        <?php else: ?>
                            日期区间：<?php echo \think\Request::instance()->post('start'); ?>-----<?php echo \think\Request::instance()->post('stop'); endif; ?>
                        &nbsp;&nbsp;&nbsp;&nbsp;投注品种：
                        <?php if(\think\Request::instance()->post('class2')): ?>
                            <?php echo \think\Request::instance()->post('class2'); else: ?>
                            全部
                        <?php endif; ?>
                       &nbsp;&nbsp;&nbsp;查询种类：
                        <?php if(\think\Request::instance()->post('class')): switch(\think\Request::instance()->post('class')): case "1": ?>会员账号<?php break; case "1": ?>下注单号<?php break; case "1": ?>下注盘类<?php break; endswitch; ?>
                            ：<?php echo \think\Request::instance()->post('key'); else: ?>
                            全部
                        <?php endif; ?>
                    </div>
                    <div class="layui-btn-group" style="float:right;">
                        <a class="layui-btn layui-btn-primary layui-btn-sm" href="<?php echo url('index'); ?>">返回</a>
                        <a class="layui-btn layui-btn-primary layui-btn-sm" href="javascript:location.reload();">刷新</a>
                    </div>
                </div>
                <form action="<?php echo url('cha'); ?>" method="post" id="form1" class="layui-form">
                    <div class="layui-form-item" style="margin-top: 10px;margin-bottom: 10px;">
                    <div class="layui-inline">
                        <div class="layui-input-inline">
                            <select name="class" id="class">
                                <option  value="" selected>-全部-</option>
                                <option value="1">会员账号</option>
                                <option value="2">下注单号</option>
                                <option value="3">下注盘类</option>
                            </select>
                        </div>
                    </div>
                    <div class="layui-inline">
                        <div class="layui-input-inline" style="width: 150px;">
                            <input type="text" name="key" autocomplete="off" class="layui-input" placeholder="用户名">
                        </div>
                    </div>
                    <div class="layui-inline">
                        <div class="layui-input-block" style="margin-left: 0;">
                            <select name="class2" id="class2">
                                <option value="" selected="selected">-----选择投注品种-----</option>
                                <option value="特A">特码：特A</option>
                                <option value="特B">特码：特B</option>
                                <option value="正A">正码：正A</option>
                                <option value="正B">正码：正B</option>
                                <option value="正1特">正特：正1特</option>
                                <option value="正2特">正特：正2特</option>
                                <option value="正3特">正特：正3特</option>
                                <option value="正4特" >正特：正4特</option>
                                <option value="正5特" >正特：正5特</option>
                                <option value="正6特" >正特：正6特</option>
                                <option value="正码1" >正1-6：正码1</option>
                                <option value="正码2"  >正1-6：正码2</option>
                                <option value="正码3"  >正1-6：正码3</option>
                                <option value="正码4"  >正1-6：正码4</option>
                                <option value="正码5" >正1-6：正码5</option>
                                <option value="正码6" >正1-6：正码6</option>
                                <option value="过关" >过关</option>
                                <option value="三全中" >连码：三全中</option>
                                <option value="三中二" >连码：三中二</option>
                                <option value="二全中" >连码：二全中</option>
                                <option value="二中特"  >连码：二中特</option>
                                <option value="特串" >连码：特串</option>
                                <option value="特肖" >生肖：特肖</option>
                                <option value="四肖"  >生肖：四肖</option>
                                <option value="五肖" >生肖：五肖</option>
                                <option value="六肖"  >生肖：六肖</option>
                                <option value="三肖" >生肖：三肖</option>
                                <option value="二肖" >生肖：二肖</option>
                                <option value="一肖" >生肖：一肖</option>
                                <option value="半波" >半波</option>
                                <option value="半半波" >半半波</option>
                                <option value="头数">头数</option>
                                <option value="尾数">尾数</option>
                                <option value="正特尾数">正特尾数</option>
                                <option value="正肖">正肖</option>
                                <option value="七色波">七色波</option>
                            </select>
                        </div>
                    </div>
                    <div class="layui-inline" style="width: 150px;">
                        <div class="layui-input-block" style="margin-left: 0;">
                            <?php if($kitheAll): ?>
                            <select name="kithe">
                                <option value="" selected="selected">按时间来查</option>
                                <?php if(is_array($kitheAll) || $kitheAll instanceof \think\Collection || $kitheAll instanceof \think\Paginator): if( count($kitheAll)==0 ) : echo "" ;else: foreach($kitheAll as $key=>$k): ?>
                                <option value="<?php echo $k['nn']; ?>">第<?php echo $k['nn']; ?>期</option>
                                <?php endforeach; endif; else: echo "" ;endif; ?>
                            </select>
                            <?php endif; ?>
                        </div>
                    </div>
                    <div class="layui-inline">
                        <div class="layui-input-inline" style="width: 150px;">
                            <input type="text" name="start" id="start" placeholder="开始时间" autocomplete="off" class="layui-input" lay-key="1">
                        </div>
                        <div class="layui-form-mid">-</div>
                        <div class="layui-input-inline" style="width: 150px;">
                            <input type="text" name="end" id="stop" placeholder="结束时间" autocomplete="off" class="layui-input" lay-key="2">
                        </div>
                    </div>

                    <div class="layui-inline">
                        <div class="layui-input-block" style="margin-left: 0;">
                            <button class="layui-btn" lay-submit>提交</button>
                        </div>
                    </div>
                </div>
                </form>
                <div class="layui-card-body" pad15>
                    <table class="layui-table">
                        <thead>
                        <tr>
                            <th>会员</th>
                            <th>下单时间</th>
                            <th>期数</th>
                            <th>下注金额</th>
                            <th>赔率</th>
                            <th>退佣%</th>
                            <th>类型1</th>
                            <td>类型2</td>
                            <td>球号</td>
                        </tr>
                        </thead>
                        <tbody>
                        <?php if($result): if(is_array($result) || $result instanceof \think\Collection || $result instanceof \think\Paginator): if( count($result)==0 ) : echo "" ;else: foreach($result as $key=>$r): ?>
                            <tr>
                                <td><?php echo $r['id']; ?></td>
                                <td><?php echo $r['username']; ?>(<span style="color:#ff6600;"><?php echo $r['mem']['xm']; ?></span>)</td>
                                <td><?php echo $r['kithe']; ?></td>
                                <td><?php echo $r['sum_m']; ?></td>
                                <td><?php echo $r['rate']; ?></td>
                                <td><?php echo round($r['user_ds'],2); ?></td>
                                <td><?php echo $r['class1']; ?></td>
                                <td><?php echo $r['class2']; ?></td>
                                <td><?php echo $r['class3']; ?></td>
                            </tr>
                        <?php endforeach; endif; else: echo "" ;endif; ?>
                            <tr>
                                <td colspan="2" align="center">总计：</td>
                                <td><?php echo $z_re; ?></td>
                                <td></td>
                                <td><?php echo $z_sum; ?></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>
                            <tr><td colspan="9" align="center"><?php echo $page; ?></td></tr>
                        <?php else: ?>
                        <tr><td colspan="9">暂无数据</td></tr>
                        <?php endif; ?>
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
