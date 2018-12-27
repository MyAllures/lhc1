<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:63:"D:\www\PHPTutorial\WWW\lhc/app/users\view\daili\edit_daili.html";i:1545904793;}*/ ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>修改代理</title>
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
                <div class="layui-card-header">代理用户编辑
                    <a  style="float: right; margin-top:6px;" href="javascript:history.go(-1)" layadmin-event="back" class="layui-btn layui-btn-primary layui-btn-sm">返回</a>
                </div>
                <div class="layui-card-body" pad15>
                    <form class="layui-form" action="<?php echo url('saveUpdate',['id'=>$id,'act'=>'update']); ?>" method="post" id="form">
                        <table class="layui-table">
                            <tbody>
                            <tr>
                                <td>
                                    <div class="layui-form-item">
                                        <label class="layui-form-label">上级用户：</label>
                                        <div class="layui-form-mid layui-word-aux" style="color:ff6600">
                                            <?php echo $row2['guan']; ?>(股)---<?php echo $row2['zong']; ?>(总)
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <div class="layui-form-item">
                                        <label class="layui-form-label">分配余额：</label>
                                        <div class="layui-inline">
                                            <input type="text" class="layui-input" name="kylllx2" value="<?php echo $sfsfsf; ?>" readonly>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="layui-form-item">
                                        <label class="layui-form-label">账号：</label>
                                        <div class="layui-form-mid">
                                            <?php echo $row2['kauser']; ?>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <div class="layui-form-item">
                                        <label class="layui-form-label"> 姓名：</label>
                                        <div  class="layui-inline" style="width:100px;">
                                            <input type="text" class="layui-input" name="xm" value="<?php echo $row2['xm']; ?>" lay-verify="required">
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="layui-form-item">
                                        <label class="layui-form-label">密码：</label>
                                        <div class="layui-inline">
                                            <input type="password" name="kapassword" class="layui-input">
                                        </div>
                                        <span style="color:red;">(不修改请留空)</span>
                                    </div>
                                </td>
                                <td>
                                    <div class="layui-form-item">
                                       <label class="layui-form-label">  总信用额：</label>
                                        <div  class="layui-inline" style="width:80px;">
                                            <input type="text" class="layui-input" name="cs" value="<?php echo $row2['cs']; ?>">
                                        </div>
                                        &nbsp;&nbsp;&nbsp;&nbsp;
                                        可用信用额度：
                                        <div class="layui-inline">
                                            <input type="text" name="kyx" value="<?php echo $maxnum; ?>" class="layui-input" lay-verify="required">
                                        </div>
                                        <br>
                                        <span style="color:red;">(如果修改总信用额比原来的值小那么下级所有用户总信用额将变成0)</span>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="layui-form-item">
                                        <label class="layui-form-label">走飞：</label>
                                        <div class="layui-inline">
                                            <?php if($row2['pz'] == 0): ?>
                                            <input type="hidden" name="tv5" value="是">
                                            <div class="layui-form-mid layui-word-aux">
                                                <img name="tv5_b" src="/file/lhc_images/icon_21x21_selectboxon.gif" class="cursor status1"><span>(充许走飞)</span>
                                            </div>
                                            <?php else: ?>
                                            <input type="hidden" name="tv5" value="否">
                                            <div class="layui-form-mid layui-word-aux">
                                                <img name="tv5_b" src="/file/lhc_images/icon_21x21_selectboxoff.gif" class="cursor status1"><span>(禁止走飞)</span>
                                            </div>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <div class="layui-form-item">
                                        <label class="layui-form-label">状态：</label>
                                        <div class="layui-inline">
                                            <?php if($row2['stat'] == 0): ?>
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
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="layui-form-item">
                                        <label class="layui-form-label">总代占成：</label>
                                        <div class="layui-inline">
                                            <select name="sj">
                                                <?php $__FOR_START_21471__=$istar;$__FOR_END_21471__=$iend;for($i=$__FOR_START_21471__;$i < $__FOR_END_21471__;$i+=10){ ?>
                                                <option value="<?php echo $i; ?>" <?php if($row2['sj'] == $i): ?>selected<?php endif; ?>><?php if($i == 0): ?>不占成<?php else: ?><?php echo $i; ?>%<?php endif; ?></option>
                                                <?php } ?>
                                            </select>
                                            <input name="sff" type="hidden" id="sff" value="<?php echo $iend; ?>" />
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <div class="layui-form-item">
                                        <label class="layui-form-label">代理占成：</label>
                                        <div class="layui-inline">
                                            <select name="sf">
                                                <?php $__FOR_START_19264__=$istar;$__FOR_END_19264__=$iend;for($i=$__FOR_START_19264__;$i < $__FOR_END_19264__;$i+=10){ ?>
                                                <option value="<?php echo $i; ?>" <?php if($row2['sf'] == $i): ?>selected<?php endif; ?>><?php if($i == 0): ?>不占成<?php else: ?><?php echo $i; ?>%<?php endif; ?></option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="layui-form-item">
                                        <label class="layui-form-label">登录时间：</label>
                                        <div class="layui-form-mid">
                                            <?php echo $row2['zlogin']; ?>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <div class="layui-form-item">
                                        <label class="layui-form-label">登录IP：</label>
                                        <div class="layui-form-mid">
                                            <?php echo $row2['zip']; ?>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="layui-form-item">
                                        <label class="layui-form-label">注册时间：</label>
                                        <div class="layui-form-mid">
                                            <?php echo $row2['adddate']; ?>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <div class="layui-form-item">
                                        <label class="layui-form-label">登录次数：</label>
                                        <div class="layui-form-mid">
                                            <?php echo $row2['look']; ?>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="layui-form-item">
                                        <label class="layui-form-label">自否允许特B：</label>
                                        <div class="layui-inline">
                                            <select name="tmb" id="">
                                                <option value="0" <?php if($row2['tmb'] == 0): ?>selected<?php endif; ?>>允许</option>
                                                <option value="1" <?php if($row2['tmb'] == 1): ?>selected<?php endif; ?>>不允许</option>
                                            </select>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <div class="layui-form-item">
                                        <label class="layui-form-label">会员人数：</label>
                                        <div class="layui-inline">
                                            <input type="text" name="rs" value="<?php echo $row2['rs']; ?>" class="layui-input">
                                        </div>
                                        最多：<span style="color: red;"><?php echo $rs1; ?></span>
                                        <input name="rs1" type="hidden" id="rs1" value="<?php echo $rs1; ?>" />
                                        <input name="rs2" type="hidden" id="rs2" value="<?php echo $rs2; ?>" />
                                    </div>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                        <table class="layui-table">
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
                            <?php if($r2): if(is_array($r2) || $r2 instanceof \think\Collection || $r2 instanceof \think\Paginator): if( count($r2)==0 ) : echo "" ;else: foreach($r2 as $key=>$r): ?>
                            <tr>
                                <td>
                                    <input name="ygid[]" type="hidden" id="ygid[]" value="<?php echo $r['id']; ?>" />
                                    <input name="ds[]" type="hidden" id="ds[]" value=<?php echo $r['ds']; ?> />
                                    <?php echo $r['ds']; ?>
                                </td>
                                <td>
                                    <input type="text" class="layui-input" class="m" name="m[]" value="<?php echo $r['yg']; ?>" realval="<?php if($row2['abcd'] == 'A'): ?><?php echo $r['row']['yg']; elseif($row2['abcd'] == 'B'): ?><?php echo $r['row']['ygb']; elseif($row2['abcd'] == 'C'): ?><?php echo $r['row']['ygc']; elseif($row2['abcd'] == 'D'): ?><?php echo $r['row']['ygd']; endif; ?>">
                                </td>
                                <td>
                                    <input type="text" class="layui-input" class="ygb" name="ygb[]" value="<?php echo $r['ygb']; ?>" realval="<?php echo $r['row']['ygb']; ?>">
                                </td>
                                <td>
                                    <input type="text" class="layui-input" class="ygc" name="ygc[]" value="<?php echo $r['ygc']; ?>" realval="<?php echo $r['row']['ygc']; ?>">
                                </td>
                                <td>
                                    <input type="text" class="layui-input" class="ygd" name="ygd[]" value="<?php echo $r['ygd']; ?>" realval="<?php echo $r['row']['ygd']; ?>">
                                </td>
                                <td>
                                    <input type="text" class="layui-input" class="mm" name="mm[]" value="<?php echo $r['xx']; ?>" realval="<?php echo $r['row']['xx']; ?>" lay-verify="number">
                                </td>
                                <td>
                                    <input type="text" class="layui-input" class="mmm" name="mmm[]" value="<?php echo $r['xxx']; ?>" realval="<?php echo $r['row']['xxx']; ?>">
                                </td>
                            </tr>
                            <?php endforeach; endif; else: echo "" ;endif; else: ?>
                            <tr><td colspan="4">暂无数据</td></tr>
                            <?php endif; ?>
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
<style>
    .layui-text em, .layui-word-aux{
        color: #000000!important;
    }
    .layui-form-item .layui-input-inline{
        margin-left: 40px;
    }
</style>
<script>
    $(function(){
        //加载layui
        layui.use(['form','table'],function(){
            var form=layui.form;
            form.on('select(temp)', function(data){
                if(data.value==0 ||data.value==undefined){
                    alert('请选择上级用户');
                }else{
                    location.href="<?php echo url('addmem'); ?>?id="+data.value;
                }
            });
        })
        $('#form').submit(function(){
            //数据验证
            if($(['name=xm']).val()==''){
                layer.msg('姓名不能为空',{icon:2});
                return false;
            }
            if(parseFloat($('[name=kyx]').val() > <?php echo $maxnum; ?>)){
                layer.msg('对不起,上级总信用额度最高可使用<?php echo $maxnum; ?>',{icon:2});
                return false;
            }
            if(!layer.confirm("确认提交？")){
                return false;
            }
            return true;
        });

        //数据验证
        $('.m,.ygb,.ygc,.ygd,.mm,.mmm').blur(function () {
            if($(this).val()==''){$(this).val(0)}
            if(parseFloat($(this).val())>parseFloat($(this).attr('realval'))){
                layer.msg('不能高于上级的'+parseFloat($(this).attr('realval'))+'值');
            }
        })

        //走飞点击
        $('.status1').click(function(){
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