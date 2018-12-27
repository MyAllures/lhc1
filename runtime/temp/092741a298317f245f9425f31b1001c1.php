<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:62:"D:\www\PHPTutorial\WWW\lhc/app/users\view\daili\add_daili.html";i:1545052079;}*/ ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>新增会员</title>
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
    </style>
</head>
<body>
<div class="layui-fluid">
    <div class="layui-row layui-col-space15">
        <div class="layui-col-md12">
            <div class="layui-card">
                <div class="layui-card-header">添加代理用户
                    <a  style="float: right; margin-top:6px;" href="javascript:history.go(-1)" layadmin-event="back" class="layui-btn layui-btn-primary layui-btn-sm">返回</a>
                </div>
                <div class="layui-card-body" pad15>
                    <form class="layui-form" action="<?php echo url('savedaili',['id'=>$ids,'act'=>'add']); ?>" method="post" id="form">

                        <div class="layui-form-item">
                            <label class="layui-form-label">上级用户：</label>
                            <div class="layui-input-block">
                                <div class="layui-form-mid layui-word-aux">
                                    <?php if($users['lx'] == 2): ?>
                                        <input type="hidden" name="zongid" value="<?php echo $zongid; ?>">
                                        <?php echo $users['kauser']; elseif($users['lx'] == 1): ?>
                                    <select name="temppid" lay-filter="temp" lay-verify="required">
                                        <?php if(!empty($res)): ?>
                                            <option value="0" selected></option>
                                        <?php if(is_array($res) || $res instanceof \think\Collection || $res instanceof \think\Paginator): if( count($res)==0 ) : echo "" ;else: foreach($res as $key=>$r): ?>
                                            <option value="<?php echo $r['id']; ?>" <?php if($r['selected'] == true): ?>selected="selected"<?php endif; ?>><?php echo $r['kauser']; ?>--<?php echo $r['cs_end']; ?></option>
                                        <?php endforeach; endif; else: echo "" ;endif; endif; ?>
                                    </select>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                        <div class="layui-form-item">
                            <label class="layui-form-label">账号：</label>
                            <div class="layui-input-block">
                                <input type="text" class="layui-input" name="kauser" lay-verify="required">
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
                            <label class="layui-form-label">总信用额：</label>
                            <div class="layui-input-block">
                                <input type="text" class="layui-input" name="cs" value="0" lay-verify="required|number">
                            </div>
                        </div>
                        <div class="layui-form-item">
                            <label class="layui-form-label">可用信用额度：</label>
                            <div class="layui-input-block">
                                <input type="text" class="layui-input" name="kyx" value="<?php echo $maxnum; ?>" readonly>
                            </div>
                        </div>
                        <div class="layui-form-item">
                            <label class="layui-form-label">走飞：</label>
                            <div class="layui-input-block">
                                <input type="hidden" name="tv5" value="是" >
                                <div class="layui-form-mid layui-word-aux">
                                    <img name="tv5_b" src="/file/lhc_images/icon_21x21_selectboxon.gif" class="cursor zoufei"><span>(充许走飞)</span>
                                </div>
                            </div>
                        </div>
                        <div class="layui-form-item">
                            <label class="layui-form-label">状态：</label>
                            <div class="layui-input-block">
                                <input type="hidden" name="tv6" value="是">
                                <div class="layui-form-mid layui-word-aux">
                                    <img name="tv6_b" src="/file/lhc_images/icon_21x21_selectboxon.gif" class="cursor status"><span>(开启)</span>
                                </div>
                            </div>
                        </div>
                        <div class="layui-form-item">
                            <label class="layui-form-label">总代占成：</label>
                            <div class="layui-input-block">
                                <select name="sj">
                                    <?php if($iend > 0): $__FOR_START_30330__=$istart;$__FOR_END_30330__=$iend;for($i=$__FOR_START_30330__;$i < $__FOR_END_30330__;$i+=10){ if($i == 0): ?>
                                    <option value="0">不占成</option>
                                    <?php else: ?>
                                    <option value="<?php echo $i; ?>"><?php echo $i; ?>%</option>
                                    <?php endif; } else: ?>
                                    <option value="0">不占成</option>
                                    <?php endif; ?>
                                </select>
                            </div>
                            <input name="sff" type="hidden" id="sff" value="<?php echo $iend; ?>" />
                        </div>
                        <div class="layui-form-item">
                            <label class="layui-form-label">代理占成：</label>
                            <div class="layui-input-block">
                                <select name="sf">
                                    <?php if($iend > 0): $__FOR_START_6849__=$istart;$__FOR_END_6849__=$iend;for($i=$__FOR_START_6849__;$i < $__FOR_END_6849__;$i+=10){ if($i == 0): ?>
                                    <option value="0">不占成</option>
                                    <?php else: ?>
                                    <option value="<?php echo $i; ?>"><?php echo $i; ?>%</option>
                                    <?php endif; } else: ?>
                                    <option value="0">不占成</option>
                                    <?php endif; ?>
                                </select>
                            </div>
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
                                <input type="text" class="layui-input" name="rs" value="0">
                                <div class="layui-form-mid layui-word-aux">
                                    最多:<?php echo $rs1; ?>
                                </div>
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
                            <?php if(is_array($dataType) || $dataType instanceof \think\Collection || $dataType instanceof \think\Paginator): if( count($dataType)==0 ) : echo "" ;else: foreach($dataType as $key=>$d): ?>
                            <tr>
                                <td><?php echo $d['ds']; ?><input name="ds[]" type="hidden" id="ds[]" value="<?php echo $d['ds']; ?>" /></td>
                                <td><input type="text" name="m[]" value="<?php echo $d['yg']; ?>"></td>
                                <td><input type="text" name="ygb[]" value="<?php echo $d['ygb']; ?>"></td>
                                <td><input type="text" name="ygc[]" value="<?php echo $d['ygc']; ?>"></td>
                                <td><input type="text" name="ygd[]" value="<?php echo $d['ygd']; ?>"></td>
                                <td><input type="text" name="mm[]" value="<?php echo $d['xx']; ?>"></td>
                                <td><input type="text" name="mmm[]" value="<?php echo $d['xxx']; ?>"></td>
                            </tr>
                            <?php endforeach; endif; else: echo "" ;endif; ?>
                            </tbody>
                        </table>
                        <div class="layui-form-item">
                            <div class="layui-input-block">
                                <button type="submit" class="layui-btn" lay-submit="" lay-filter="demo1">保存代理</button>
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
                $(this).next().html('禁止走飞');
            }
            if(value=='否'){
                $('[name=tv5]').val('是');
                $(this).attr('src','/file/lhc_images/icon_21x21_selectboxon.gif');
                $(this).next().html('充许走飞');
            }
        });

        //状态点击
        $('.status').click(function(){
            var value=$('[name=tv6]').val();
            if(value=='是'){
                $('[name=tv6]').val('否');
                $(this).attr('src','/file/lhc_images/icon_21x21_selectboxoff.gif');
                $(this).next().html('禁止');
            }
            if(value=='否'){
                $('[name=tv6]').val('是');
                $(this).attr('src','/file/lhc_images/icon_21x21_selectboxon.gif');
                $(this).next().html('开启');
            }
        });
    });
</script>