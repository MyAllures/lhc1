<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:59:"D:\www\PHPTutorial\WWW\lhc/app/users\view\zoufei\index.html";i:1545467160;}*/ ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>走飞</title>
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
                <div class="layui-card-header">走飞
                    <div class="layui-inline" style="margin: 0 0 0 100px;">
                        <div class="layui-inline">
                            <div class="layui-input-inline">期数
                                <select name="kithe" id="ki" style="color:blue;">
                                    <?php if(is_array($kitheAll) || $kitheAll instanceof \think\Collection || $kitheAll instanceof \think\Paginator): if( count($kitheAll)==0 ) : echo "" ;else: foreach($kitheAll as $key=>$k): ?>
                                    <option value="<?php echo url('index',['tm'=>$tm,'tm1'=>$tm1,'tm2'=>$tm2,'zm_num'=>$zm_num,'kithe'=>$k['nn']]); ?>" <?php if($kithe == $k['nn']): ?>selected="selected"<?php endif; ?>>第<?php echo $k['nn']; ?>期</option>
                                    <?php endforeach; endif; else: echo "" ;endif; ?>
                                </select>
                            </div>
                        </div>
                        <div class="layui-inline">
                            <div class="layui-input-inline">占成：
                                <select name="menu2" id="zc">
                                    <?php if($tm == 0): ?>
                                    <option value="<?php echo url('index',['tm'=>0,'tm1'=>$tm1,'tm2'=>$tm2,'zm_num'=>$zm_num,'kithe'=>$k['nn']]); ?>" selected>全部</option>
                                    <option value="<?php echo url('index',['tm'=>1,'tm1'=>$tm1,'tm2'=>$tm2,'zm_num'=>$zm_num,'kithe'=>$k['nn']]); ?>">成数</option>
                                    <?php else: ?>
                                    <option value="<?php echo url('index',['tm'=>0,'tm1'=>$tm1,'tm2'=>$tm2,'zm_num'=>$zm_num,'kithe'=>$k['nn']]); ?>">全部</option>
                                    <option value="<?php echo url('index',['tm'=>1,'tm1'=>$tm1,'tm2'=>$tm2,'zm_num'=>$zm_num,'kithe'=>$k['nn']]); ?>" selected>成数</option>
                                    <?php endif; ?>
                                </select>
                            </div>
                        </div>
                        <div class="layui-inline">
                            <div class="layui-input-inline">类别：
                                <select name="menu1" id="lb">
                                    <?php if($tm1 == 1): ?>
                                    <option value="<?php echo url('index',['tm'=>$tm,'tm1'=>1,'tm2'=>$tm2,'zm_num'=>$zm_num,'kithe'=>$k['nn']]); ?>" selected>全部</option>
                                    <option value="<?php echo url('index',['tm'=>$tm,'tm1'=>0,'tm2'=>$tm2,'zm_num'=>$zm_num,'kithe'=>$k['nn']]); ?>">特码</option>
                                    <?php else: ?>
                                    <option value="<?php echo url('index',['tm'=>$tm,'tm1'=>1,'tm2'=>$tm2,'zm_num'=>$zm_num,'kithe'=>$k['nn']]); ?>">全部</option>
                                    <option value="<?php echo url('index',['tm'=>$tm,'tm1'=>0,'tm2'=>$tm2,'zm_num'=>$zm_num,'kithe'=>$k['nn']]); ?>" selected>特码</option>
                                    <?php endif; ?>
                                </select>
                            </div>
                        </div>
                        <div class="layui-inline">
                            <div class="layui-input-inline">查看方式：
                                <select name="select" id="ck">
                                    <?php if($tm2 == 1): ?>
                                    <option value="<?php echo url('index',['tm'=>$tm,'tm1'=>$tm2,'tm2'=>1,'zm_num'=>$zm_num,'kithe'=>$k['nn']]); ?>" selected>吃码</option>
                                    <option value="<?php echo url('index',['tm'=>$tm,'tm1'=>$tm2,'tm2'=>0,'zm_num'=>$zm_num,'kithe'=>$k['nn']]); ?>">预计盈利</option>
                                    <?php else: ?>
                                    <option value="<?php echo url('index',['tm'=>$tm,'tm1'=>$tm2,'tm2'=>1,'zm_num'=>$zm_num,'kithe'=>$k['nn']]); ?>">吃码</option>
                                    <option value="<?php echo url('index',['tm'=>$tm,'tm1'=>$tm2,'tm2'=>0,'zm_num'=>$zm_num,'kithe'=>$k['nn']]); ?>" selected>预计盈利</option>
                                    <?php endif; ?>
                                </select>
                            </div>
                        </div>
                    </div>
                    <form action="" class="layui-form layui-inline" style="margin-left:50px;">
                        <div class="layui-inline">吃码占成
                            <input type="text" name="jifei" value="<?php echo $jifei; ?>" style="height: 23px;width: 60px">%
                            <input type="submit" value="设置" style="height: 25px;line-height: 25px;width: 50px;" >
                        </div>
                    </form>
                    <div class="layui-btn-group" style="float:right;">
                        <a class="layui-btn layui-btn-primary layui-btn-sm" href="javascript:location.reload();">刷新</a>
                    </div>
                </div>

                <div class="layui-card-body" pad15>
                    <table class="layui-table">
                        <thead>
                        <tr>
                            <th>号码</th>
                            <th>金额</th>
                            <th>吃码</th>
                            <th><?php echo $zf; ?></th>
                        </tr>
                        </thead>
                        <tbody>
                            <?php $__FOR_START_23300__=1;$__FOR_END_23300__=50;for($i=$__FOR_START_23300__;$i < $__FOR_END_23300__;$i+=1){ ?>
                            <tr>
                                <td><span style="color:#<?php echo $sum_color[$i]; ?>;"><?php echo $sum_tm1[$i]; ?></span></td>
                                <td><?php echo $sum_money1[$i]; ?></td>
                                <td><?php echo $sum_zm[$i]; ?></td>
                                <td>
                                    <?php if($tm2 == 0): ?>
                                        <span style="color:<?php if($sum_zf[$i] < 0): ?>#ff0000<?php else: ?>#FFF4E1<?php endif; ?>"><?php echo $sum_zf[$i]; ?></span>
                                    <?php else: ?>
                                        <button><span style="color: #ff6600;">补<?php echo $sum_zf[$i]; ?></span></button>
                                    <?php endif; ?>
                                </td>
                            </tr>
                            <?php } ?>
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

        form.render();
    });
</script>
</body>
</html>
