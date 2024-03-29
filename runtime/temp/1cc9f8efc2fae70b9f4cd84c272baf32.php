<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:60:"D:\www\PHPTutorial\WWW\lhc/app/users\view\baobiao\index.html";i:1545359883;}*/ ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>报表查询</title>
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
                        报表查询
                        <div class="layui-btn-group" style="float:right;">
                            <a class="layui-btn layui-btn-primary layui-btn-sm" href="javascript:location.reload();">刷新</a>
                        </div>
                    </div>

                    <div class="layui-card-body" pad15>
                        <form action="<?php echo $url; ?>" method="post" id="form1" class="layui-form">
                            <div class="layui-form-item">
                                <lable class="layui-form-label">分类报表：</lable>
                                <div class="layui-input-inline">
                                    <select name="class2">
                                        <option value="" selected="selected">-----全部-----</option>
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
                                        <option value="一肖" >生肖：一肖</option>
                                        <option value="三全中" >连码：三全中</option>
                                        <option value="三中二" >连码：三中二</option>
                                        <option value="二全中" >连码：二全中</option>
                                        <option value="二中特"  >连码：二中特</option>
                                        <option value="五不中" >五不中</option>
                                        <option value="六不中" >六不中</option>
                                        <option value="七不中" >七不中</option>
                                        <option value="八不中" >八不中</option>
                                        <option value="九不中" >九不中</option>
                                        <option value="十不中" >十不中</option>
                                        <option value="十一不中" >十一不中</option>
                                        <option value="十二不中" >十二不中</option>
                                        <option value="特串" >连码：特串</option>
                                        <option value="特肖" >生肖：特肖</option>
                                        <option value="二肖" >合肖：二肖</option>
                                        <option value="三肖" >合肖：三肖</option>
                                        <option value="四肖" >合肖：四肖</option>
                                        <option value="五肖" >合肖：五肖</option>
                                        <option value="六肖" >合肖：六肖</option>
                                        <option value="七肖" >合肖：七肖</option>
                                        <option value="八肖" >合肖：八肖</option>
                                        <option value="九肖" >合肖：九肖</option>
                                        <option value="十肖" >合肖：十肖</option>
                                        <option value="十一肖" >合肖：十一肖</option>
                                        <option value="二肖连中" >二肖连中</option>
                                        <option value="三肖连中" >三肖连中</option>
                                        <option value="四肖连中" >四肖连中</option>
                                        <option value="五肖连中" >五肖连中</option>
                                        <option value="二肖连不中" >二肖连不中</option>
                                        <option value="三肖连不中" >三肖连不中</option>
                                        <option value="四肖连不中" >四肖连不中</option>
                                        <option value="半波" >半波</option>
                                        <option value="半半波" >半半波</option>
                                        <option value="头数">头数</option>
                                        <option value="尾数">尾数</option>
                                        <option value="正特尾数">正特尾数</option>
                                        <option value="正肖" >正肖</option>
                                        <option value="七色波" >七色波</option>
                                        <option value="二尾连中" >二尾连中</option>
                                        <option value="三尾连中" >三尾连中</option>
                                        <option value="四尾连中" >四尾连中</option>
                                        <option value="二尾连不中" >二尾连不中</option>
                                        <option value="三尾连不中" >三尾连不中</option>
                                        <option value="四尾连不中" >四尾连不中</option>
                                    </select>
                                </div>
                                <div class="layui-form-mid"> <input name="ac2" type="hidden" value="A" />(投注品种)</div>
                            </div>
                            <div class="layui-form-item">
                                <lable class="layui-form-label">日期区间：</lable>
                                <div class="layui-input-inline">
                                    <input type="text" name="start" class="layui-input" placeholder="开始时间" id="start">
                                </div>
                                <div class="layui-form-mid">&nbsp;~ &nbsp;</div>
                                <div class="layui-input-inline">
                                    <input type="text" name="stop"  class="layui-input" placeholder="结束时间" id="stop">
                                </div>
                            </div>
                            <div class="layui-form-item">
                                <lable class="layui-form-label">选择期数：</lable>
                                <div class="layui-input-inline">
                                    <select name="kithe">
                                        <?php if($kithe): ?>
                                        <option value="">按时间来查</option>
                                        <?php if(is_array($kithe) || $kithe instanceof \think\Collection || $kithe instanceof \think\Paginator): if( count($kithe)==0 ) : echo "" ;else: foreach($kithe as $key=>$k): ?>
                                        <option value="<?php echo $k['nn']; ?>">第<?php echo $k['nn']; ?>期</option>
                                        <?php endforeach; endif; else: echo "" ;endif; else: ?>
                                        <option value="">没有数据</option>
                                        <?php endif; ?>
                                    </select>
                                </div>
                                <div class="layui-form-mid" style="color: red;">（如果选择了期数,上面的日期将无效！）</div>
                            </div>
                            <div class="layui-form-item">
                                <label class="layui-form-label"></label>
                                <div class="layui-input-inline">
                                    <button class="layui-btn" lay-submit>查询</button>
                                </div>
                            </div>
                        </form>
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
