<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:61:"D:\www\PHPTutorial\WWW\lhc/app/users\view\zong\edit_zong.html";i:1545401657;}*/ ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>总代理资料修改</title>
    <meta name="renderer" content="webkit">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <link rel="stylesheet" href="/file/admin/layuis/layui/css/layui.css" media="all">
    <link rel="stylesheet" href="/file/admin/layuis/style/admin.css" media="all">
    <link rel="stylesheet" href="/file/admin/layui/bootstrap/css/bootstrap.min.css">
    <script src="/file/admin/layui/jquery.min.js"></script>
    <script src="/file/admin/layui/base.js"></script>
    <link rel="stylesheet" href="/file/admin/layui/base.css">
    <style type="text/css">
        .layui-form-label {
            width: 150px!important;
        }
        .layui-form-item .layui-input-block{
            margin-left: 190px!important;
        }
        .rs1 input{
            width: 60%;
        }
        .layui-form-item .layui-input-inline {
            float: left;
            width: 190px;
            margin-right: 10px;
            margin-left: 40px;
        }
    </style>
</head>
<body>
<div class="layui-fluid">
    <div class="layui-row layui-col-space15">
        <div class="layui-col-md12">
            <div class="layui-card">
                <div class="layui-card-header">总代理资料修改
                    <a  style="float: right; margin-top:6px;" href="javascript:history.go(-1)" layadmin-event="back" class="layui-btn layui-btn-primary layui-btn-sm">返回</a>
                </div>
                <div class="layui-card-body" pad15>
                    <form class="layui-form" action="<?php echo url('saveedit',['act'=>'edit','id'=>\think\Request::instance()->get('id')]); ?>" method="post" id="form">
                        <div class="layui-form-item">
                            <label class="layui-form-label">上级用户：</label>
                            <div class="layui-input-block">
                                <div class="layui-form-mid layui-word-aux">
                                    <input name="guanid" type="hidden" value="<?php echo $data['id']; ?>" />
                                    <?php echo $data['guan']; ?>
                                </div>
                            </div>
                        </div>
                        <div class="layui-form-item">
                            <label class="layui-form-label">账号：</label>
                            <div class="layui-input-inline layui-form-mid">
                               <?php echo $data['kauser']; ?>
                            </div>
                        </div>
                        <div class="layui-form-item">
                            <label class="layui-form-label">密码：</label>
                            <div class="layui-input-block">
                                <input type="password" class="layui-input" name="kapassword" lay-verify="required">
                            </div>
                        </div>
                        <div class="layui-form-item">
                            <label class="layui-form-label">姓名：</label>
                            <div class="layui-input-block">
                                <input type="text" class="layui-input" name="xm" lay-verify="required">
                            </div>
                        </div>
                        <div class="layui-form-item">
                            <label class="layui-form-label">分配余额：</label>
                            <div class="layui-input-block">
                                <input type="text" class="layui-input layui-disabled" name="kylllx2" value="<?php echo $sfsfsf; ?>" readonly="readonly">
                            </div>
                        </div>
                        <div class="layui-form-item">
                            <label class="layui-form-label">总信用额：</label>
                            <div class="layui-input-inline">
                                <input type="text" class="layui-input" name="cs" value="<?php echo $data['cs']; ?>" lay-verify="required|number">
                            </div>
                            <div class="layui-form-mid">
                                <span style="color:red;">(如果修改总信用额比原来的值小那么下级所有用户总信用额将变成0)</span>
                            </div>
                        </div>
                        <div class="layui-form-item">
                            <label class="layui-form-label">可用信用额度：</label>
                            <div class="layui-input-inline">
                                <input type="text" class="layui-input layui-disabled" name="kyx" value="<?php echo $maxnum; ?>" readonly>
                            </div>
                        </div>
                        <div class="layui-form-item">
                            <label class="layui-form-label">走飞：</label>
                            <div class="layui-input-block">
                                <?php if($data['pz'] == 0): ?>
                                <input type="hidden" name="tv5" value="是" >
                                <div class="layui-form-mid layui-word-aux">
                                    <img name="tv5_b" src="/file/lhc_images/icon_21x21_selectboxon.gif" class="cursor zoufei"><span>(充许走飞)</span>
                                </div>
                                <?php else: ?>
                                <input type="hidden" name="tv5" value="否" >
                                <div class="layui-form-mid layui-word-aux">
                                    <img name="tv5_b" src="/file/lhc_images/icon_21x21_selectboxoff.gif" class="cursor zoufei"><span>(禁止走飞)</span>
                                </div>
                                <?php endif; ?>
                            </div>
                        </div>
                        <div class="layui-form-item">
                            <label class="layui-form-label">状态：</label>
                            <div class="layui-input-block">
                                <?php if($data['stat'] == 0): ?>
                                <input type="hidden" name="tv6" value="是">
                                <div class="layui-form-mid layui-word-aux">
                                    <img name="tv6_b" src="/file/lhc_images/icon_21x21_selectboxon.gif" class="cursor status"><span>(开启)</span>
                                </div>
                                <?php else: ?>
                                <input type="hidden" name="tv6" value="否">
                                <div class="layui-form-mid layui-word-aux">
                                    <img name="tv6_b" src="/file/lhc_images/icon_21x21_selectboxoff.gif" class="cursor status"><span>(禁止)</span>
                                </div>
                                <?php endif; ?>
                            </div>
                        </div>
                        <div class="layui-form-item">
                            <label class="layui-form-label">股东占成：</label>
                            <div class="layui-input-block">
                                <select name="sj">
                                    <?php if($iend > 0): $__FOR_START_21534__=$istart;$__FOR_END_21534__=$iend;for($i=$__FOR_START_21534__;$i < $__FOR_END_21534__;$i+=10){ if($i == 0): ?>
                                    <option value="<?php echo $i; ?>" <?php if($data['sj'] == $i): ?> selected="selected"<?php endif; ?>>不占成</option>
                                    <?php else: ?>
                                    <option value="<?php echo $i; ?>" <?php if($data['sj'] == $i): ?> selected="selected"<?php endif; ?>><?php echo $i; ?>%</option>
                                    <?php endif; } else: ?>
                                    <option value="0">不占成</option>
                                    <?php endif; ?>
                                </select>
                            </div>
                        </div>
                        <div class="layui-form-item">
                            <label class="layui-form-label">总代理占成：</label>
                            <div class="layui-input-inline">
                                <select name="sf">
                                    <?php if($iend > 0): $__FOR_START_6014__=$istart;$__FOR_END_6014__=$iend;for($i=$__FOR_START_6014__;$i < $__FOR_END_6014__;$i+=10){ if($i == 0): ?>
                                    <option value="0" <?php if($data['sf'] == $i): ?> selected="selected"<?php endif; ?>>不占成</option>
                                    <?php else: ?>
                                    <option value="<?php echo $i; ?>" <?php if($data['sf'] == $i): ?> selected="selected"<?php endif; ?>><?php echo $i; ?>%</option>
                                    <?php endif; } else: ?>
                                    <option value="0">不占成</option>
                                    <?php endif; ?>
                                </select>
                            </div>
                            <div class="layui-form-mid">
                                <span style="color: red;">(如果修改占成下级所有用户占成将变成0)</span>
                            </div>
                            <input name="sff" type="hidden" id="sff" value="<?php echo $iend; ?>" />
                        </div>

                        <div class="layui-form-item">
                            <label class="layui-form-label">自否允许特B：</label>
                            <div class="layui-input-block">
                                <select name="tmb" id="tmb">
                                    <?php if($tmb == 1): ?>
                                    <option value="0">允许</option>
                                    <option value="1" selected>不允许</option>
                                    <?php else: ?>
                                    <option value="0" selected>允许</option>
                                    <option value="1">不允许</option>
                                    <?php endif; ?>
                                </select>
                            </div>
                        </div>
                        <div class="layui-form-item">
                            <label class="layui-form-label">会员人数：</label>
                            <div class="layui-input-block rs1">
                                <input type="text" class="layui-input" name="rs" value="<?php echo $data['rs']; ?>">
                                <input name="rs1" type="hidden"  value="<?php echo $rs1; ?>" />
                                <input name="rs2" type="hidden" value="<?php echo $rs2; ?>" />
                                <div class="layui-form-mid layui-word-aux">
                                    最多:<?php echo $rs1; ?>
                                </div>
                            </div>
                        </div>

                        <div class="layui-form-item">
                            <label class="layui-form-label">登录时间：</label>
                            <div class="layui-input-inline layui-form-mid">
                                <?php echo $data['zlogin']; ?>
                            </div>
                        </div>
                        <div class="layui-form-item">
                            <label class="layui-form-label">登录IP：</label>
                            <div class="layui-input-inline layui-form-mid">
                                <?php echo $data['zip']; ?>
                            </div>

                        </div>
                        <div class="layui-form-item">
                            <label class="layui-form-label">注册时间：</label>
                            <div class="layui-input-inline layui-form-mid">
                                <?php echo $data['adddate']; ?>
                            </div>
                        </div>
                        <div class="layui-form-item">
                            <label class="layui-form-label">登录次数：</label>
                            <div class="layui-input-inline layui-form-mid">
                                <?php echo $data['look']; ?>
                            </div>
                        </div>


                        <table class="layui-table layui-fluid">
                            <thead>
                            <tr>
                                <th>类型</th>
                                <th>佣金%A</th>
                                <th>佣金%B</th>
                                <th>佣金%C</th>
                                <th>佣金%D</th>
                                <th>单注限额</th>
                                <th>单项(号)限额</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php if(is_array($result) || $result instanceof \think\Collection || $result instanceof \think\Paginator): if( count($result)==0 ) : echo "" ;else: foreach($result as $key=>$d): ?>
                            <tr>
                                <td><?php echo $d['ds']; ?>
                                    <input name="ds[]" type="hidden" value="<?php echo $d['ds']; ?>"/>
                                    <input name="ygid[]" type="hidden" value="<?php echo $d['id']; ?>" />
                                </td>
                                <td><input type="text" name="m[]" value="<?php echo $d['yg']; ?>" maxValue="<?php echo $d['row']['yg']; ?>"></td>
                                <td><input type="text" name="ygb[]" value="<?php echo $d['ygb']; ?>" maxValue="<?php echo $d['row']['ygb']; ?>"></td>
                                <td><input type="text" name="ygc[]" value="<?php echo $d['ygc']; ?>" maxValue="<?php echo $d['row']['ygc']; ?>"></td>
                                <td><input type="text" name="ygd[]" value="<?php echo $d['ygd']; ?>" maxValue="<?php echo $d['row']['ygd']; ?>"></td>
                                <td><input type="text" name="mm[]" value="<?php echo $d['xx']; ?>" maxValue="<?php echo $d['row']['xx']; ?>"></td>
                                <td><input type="text" name="mmm[]" value="<?php echo $d['xxx']; ?>" maxValue="<?php echo $d['row']['xxx']; ?>"></td>
                            </tr>
                            <?php endforeach; endif; else: echo "" ;endif; ?>
                            </tbody>
                        </table>
                        <div class="layui-form-item">
                            <div class="layui-input-block">
                                <button type="submit" class="layui-btn" lay-submit="" lay-filter="demo1">保存总代理</button>
                                <button type="reset" class="layui-btn layui-btn-primary">重置</button>
                            </div>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>

</body>
</html>
<script src="/file/admin/layui/layui.js"></script>

<script>
    $(function(){
        //加载layui
        layui.use(['form','table'],function(){
            var form=layui.form;
            form.on('select(temp)', function(data){
                if(data.value==0 ||data.value==undefined){
                    alert('请选择上级用户');
                }else{
                    location.href="<?php echo url('daili/adddaili'); ?>?id="+data.value;
                }
            });
        })

        $('#form').submit(function(){
            //数据验证
            var select=$('[name=temppid]').val();
            if(select==0){
                alert('请选择上级用户');
                return false;
            }
            if(parseFloat($('[name=cs]').val()) > <?php echo $maxnum; ?>){
                alert('对不起,总代理总信用额度最高限制：<?php echo $maxnum; ?>');
                return false;
            }
            if(parseFloat($('[name=rs]').val()) > <?php echo $rs1; ?>){
                alert('对不起,总代理人数最高限制：<?php echo $rs1; ?>');
                return false;
            }
            if(!confirm("确认提交？")){
                return false;
            }
        });
        //走飞点击
        $('.zoufei').click(function () {
            var value=$('[name=tv5]').val();
            if(value=='是'){
                $('[name=tv5]').val('否');
                $(this).attr('src','/file/lhc_images/icon_21x21_selectboxoff.gif');
                $(this).next().html('(禁止走飞)');
            }
            if(value=='否'){
                $('[name=tv5]').val('是');
                $(this).attr('src','/file/lhc_images/icon_21x21_selectboxon.gif');
                $(this).next().html('(充许走飞)');
            }
        });

        //状态点击
        $('.status').click(function(){
            var value=$('[name=tv6]').val();
            if(value=='是'){
                $('[name=tv6]').val('否');
                $(this).attr('src','/file/lhc_images/icon_21x21_selectboxoff.gif');
                $(this).next().html('(禁止)');
            }
            if(value=='否'){
                $('[name=tv6]').val('是');
                $(this).attr('src','/file/lhc_images/icon_21x21_selectboxon.gif');
                $(this).next().html('(开启)');
            }
        });

    });
</script>