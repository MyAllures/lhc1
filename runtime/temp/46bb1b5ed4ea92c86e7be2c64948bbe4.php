<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:58:"D:\www\PHPTutorial\WWW\lhc/app/users\view\mem\add_mem.html";i:1544862223;}*/ ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>代理</title>
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
                <div class="layui-card-header">添加会员
                    <a  style="float: right; margin-top:6px;" href="javascript:history.go(-1)" layadmin-event="back" class="layui-btn layui-btn-primary layui-btn-sm">返回</a>
                </div>
                <div class="layui-card-body" pad15>
                    <form class="layui-form" action="<?php echo url('savemem',['id'=>$ids,'act'=>'add']); ?>" method="post" id="form">

                        <div class="layui-form-item">
                            <label class="layui-form-label">上级用户：</label>
                            <div class="layui-input-block">
                                <input name="danid" type="hidden" value="<?php echo $danid; ?>" />
                                <?php if($data['lx'] == 3): ?>
                                    <?php echo $data['kauser']; endif; if($data['lx'] <= 2): ?>
                                <select name="temppid" id="temp" lay-filter="temp">
                                    <option value="0">请选择上级代理用户</option>
                                    <?php if(!empty($res1)): if(is_array($res1) || $res1 instanceof \think\Collection || $res1 instanceof \think\Paginator): if( count($res1)==0 ) : echo "" ;else: foreach($res1 as $key=>$r): ?>
                                    <option value="<?php echo $r['id']; ?>" <?php if($r['select']): ?>selected="selected"<?php endif; ?>><?php echo $r['kauser']; ?></option>
                                    <?php endforeach; endif; else: echo "" ;endif; endif; ?>
                                </select>
                                <?php endif; ?>
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
                            <label class="layui-form-label">盘口：</label>
                            <div class="layui-input-block">
                                <select name="abcd" id="abcd">
                                    <option value="A" selected="selected">A盘</option>
                                    <option value="B">B盘</option>
                                    <option value="C">C盘</option>
                                    <option value="D">D盘</option>
                                </select>    &nbsp;&nbsp;&nbsp;是否多选：
                                <input  name="ma" type="checkbox" value="A" title="A盘"/>
                                <input  name="mb" type="checkbox" value="B" title="B盘"/>
                                <input  name="mc" type="checkbox" value="C" title="C盘"/>
                                <input  name="md" type="checkbox" value="D" title="D盘"/>
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
                            <label class="layui-form-label">最低限额：</label>
                            <div class="layui-input-block">
                                <input type="text" class="layui-input" name="xy" value="0" lay-verify="required|number">
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
                        <input name="rs1" type="hidden" id="rs1" value="<?php echo $rs1; ?>" />
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
                    location.href="<?php echo url('addmem'); ?>?id="+data.value;
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
            if(!confirm("确认提交？")){
                return false;
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