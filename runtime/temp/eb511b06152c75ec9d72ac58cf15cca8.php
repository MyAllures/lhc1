<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:60:"D:\www\PHPTutorial\WWW\lhc/app/users\view\zhudan\index3.html";i:1545826968;}*/ ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>代理注单查询</title>
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
            <form action="<?php echo url('cha'); ?>" method="post" id="form1" class="layui-form">
                <div class="layui-card">
                    <div class="layui-card-header">
                        <span style="color: red;"><?php echo $username; ?></span>代理注单查询&nbsp;[<?php echo $kithe; ?>期]
                        <div class="layui-btn-group" style="float:right;">
                            <a class="layui-btn layui-btn-primary layui-btn-sm" href="javascript:history.back();">返回上一页</a>
                            <a class="layui-btn layui-btn-primary layui-btn-sm" href="javascript:location.reload();">刷新</a>
                        </div>
                    </div>
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

                    <div class="layui-card-body" pad15>
                        <table class="layui-table">
                            <thead>
                            <tr>
                                <th>序号</th>
                                <th>会员账号</th>
                                <th>注数</th>
                                <th>下注金额</th>
                                <th>实投</th>
                                <?php if($data['lx'] == 1): ?>
                                <th>股东占成</th>
                                <?php endif; if($data['lx'] <= 2): ?>
                                <th>总代占成</th>
                                <?php endif; ?>
                                <td>代理占成</td>
                            </tr>
                            </thead>
                            <tbody>
                            <?php if($res): if(is_array($res) || $res instanceof \think\Collection || $res instanceof \think\Paginator): if( count($res)==0 ) : echo "" ;else: foreach($res as $key=>$r): ?>
                            <tr>
                                <td><?php echo $key+1; ?></td>
                                <td><?php echo $r['username']; ?>(<span style="color:#ff6600;"><?php echo $r['guan']['xm']; ?></span>)</td>
                                <td><?php echo $r['rs5']['re']; ?></td>
                                <td><?php echo $r['rs5']['sum_m']; ?></td>
                                <td><?php echo round($r['rs5']['sum_st'],2); ?></td>
                                <?php if($data['lx'] == 1): ?>
                                <td><?php echo round($r['rs5']['guan_zc'],2); ?></td>
                                <?php endif; if($data['lx'] <= 2): ?>
                                <td><?php echo round($r['rs5']['zong_zc'],2); ?></td>
                                <?php endif; ?>
                                <td><?php echo round($r['rs5']['dai_zc'],2); ?></td>
                            </tr>
                            <?php endforeach; endif; else: echo "" ;endif; endif; ?>
                            <tr>
                                <td colspan="2" align="center">总计：</td>
                                <td><?php echo $z_re; ?></td>
                                <td><?php echo $z_sum; ?></td>
                                <td><?php echo $z_st; ?></td>
                                <?php if($data['lx'] == 1): ?>
                                <td><?php echo $z_guan; ?></td>
                                <?php endif; if($data['lx'] <= 2): ?>
                                <td><?php echo $z_zong; ?></td>
                                <?php endif; ?>
                                <td><?php echo $z_dai; ?></td>
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

        form.render();
    });
</script>
</body>
</html>
