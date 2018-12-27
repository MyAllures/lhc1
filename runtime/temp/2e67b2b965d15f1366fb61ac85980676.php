<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:55:"D:\www\PHPTutorial\WWW\lhc/app/users\view\zt\index.html";i:1545823965;}*/ ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>走飞--正特</title>
    <meta name="renderer" content="webkit">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <link rel="stylesheet" href="/file/admin/layuis/layui/css/layui.css" media="all">
    <link rel="stylesheet" href="/file/admin/layuis/style/admin.css" media="all">
    <link rel="stylesheet" href="/file/admin/layui/bootstrap/css/bootstrap.min.css">
    <script src="/file/admin/layui/jquery.min.js"></script>
    <script src="/file/admin/layui/base.js"></script>
    <script src="/file/admin/layuis/layui/layui.js"></script>
    <script>
        layui.use('layer',function () {
            var layer=layui.layer;

        })
        //显示弹窗
        function show_win(class3,bl,rate,class1,class2,kithe){
            layer.open({
                type: 2,
                title: '['+class3+'码]请设定',
                shadeClose: true,
                shade: false,
                maxmin: true,
                area: ['450px', '320px'],
                content: '<?php echo url('updatePz'); ?>?class1='+class1+'&class2='+class2+'&class3='+class3+'&sum_m='+bl+'&rate='+rate+'&kithe='+kithe,
            });
        }
    </script>
</head>
<body>
<div class="layui-fluid">
    <div class="layui-row layui-col-space15">
        <div class="layui-col-md12">
            <div class="layui-card">
                <div class="layui-card-header">
                    <?php echo $ids; ?>统计[<?php echo $kithe; ?>期]
                    <div class="layui-inline">
                        选择期数：
                        <select name="temppid" style="color: #0A5D94;">
                            <?php if(is_array($kitheAll) || $kitheAll instanceof \think\Collection || $kitheAll instanceof \think\Paginator): if( count($kitheAll)==0 ) : echo "" ;else: foreach($kitheAll as $key=>$k): ?>
                            <option value="<?php echo $k['nn']; ?>" <?php if($kithe == $k['nn']): ?>selected="selected"<?php endif; ?>>第<?php echo $k['nn']; ?>期</option>
                            <?php endforeach; endif; else: echo "" ;endif; ?>
                        </select>
                    </div>
                    <form action="" method="post" class="layui-form layui-inline" style="margin-left:50px;">
                        <div class="layui-inline">预估风险值：
                            <input type="text" name="tm" value="<?php echo $tm; ?>" style="height: 23px;width: 60px">
                            <input type="submit" value="走飞计算" id="sub" style="height: 25px;line-height: 25px;width: 80px;background-color: #CCCCCC;" >
                        </div>
                    </form>

                    <div class="layui-btn-group" style="float:right;">
                        <a class="layui-btn layui-btn-primary layui-btn-sm" href="<?php echo url('',['ids'=>'正1特','kithe'=>$kithe]); ?>">正1特</a>
                        <a class="layui-btn layui-btn-primary layui-btn-sm" href="<?php echo url('',['ids'=>'正2特','kithe'=>$kithe]); ?>">正2特</a>
                        <a class="layui-btn layui-btn-primary layui-btn-sm" href="<?php echo url('',['ids'=>'正3特','kithe'=>$kithe]); ?>">正3特</a>
                        <a class="layui-btn layui-btn-primary layui-btn-sm" href="<?php echo url('',['ids'=>'正4特','kithe'=>$kithe]); ?>">正4特</a>
                        <a class="layui-btn layui-btn-primary layui-btn-sm" href="<?php echo url('',['ids'=>'正5特','kithe'=>$kithe]); ?>">正5特</a>
                        <a class="layui-btn layui-btn-primary layui-btn-sm" href="<?php echo url('',['ids'=>'正6特','kithe'=>$kithe]); ?>">正6特</a>
                    </div>
                </div>
                <div class="layui-card-body" pad15>
                    <table class="layui-table">
                        <tbody>
                        <tr>
                            <td >特码：<a href="<?php echo url('jszd/index'); ?>"><span style="color: #FF3333;"><?php echo $sum_m[0]; ?></span><span color="#000000">-</span><span style="color: #FF3333;"><?php echo $sum_mzc[0]; ?></span></a></td>
                            <td  >正特：<a href="<?php echo url('zt/index'); ?>"><span style="color: #FF3333;"><?php echo $sum_m[1]; ?></span><span color="#000000">-</span><span style="color: #FF3333;"><?php echo $sum_mzc[1]; ?></span></a></td>
                            <td  >正码：<a href="<?php echo url('zm/index'); ?>"><span style="color: #FF3333;"><?php echo $sum_m[2]; ?></span><span color="#000000">-</span><span style="color: #FF3333;"><?php echo $sum_mzc[2]; ?></span></a></td>
                            <td  >正1-6：<a href="<?php echo url('zm6/index'); ?>"><span style="color: #FF3333;"><?php echo $sum_m[3]; ?></span><span color="#000000">-</span><span style="color: #FF3333;"><?php echo $sum_mzc[3]; ?></span></a></td>
                            <td  >连码：<a href="<?php echo url('lm/index'); ?>"><span style="color: #FF3333;"><?php echo $sum_m[4]; ?></span><span color="#000000">-</span><span style="color: #FF3333;"><?php echo $sum_mzc[4]; ?></span></a></td>
                            <td  >过关：<a href="<?php echo url('gg/index'); ?>"><span style="color: #FF3333;"><?php echo $sum_m[5]; ?></span><span color="#000000">-</span><span style="color: #FF3333;"><?php echo $sum_mzc[5]; ?></span></a></td>
                            <td  >半波：<a href="<?php echo url('bb/index'); ?>"><span style="color: #FF3333;"><?php echo $sum_m[6]; ?></span><span color="#000000">-</span><span style="color: #FF3333;"><?php echo $sum_mzc[6]; ?></span></a></td>
                            <td  >半半波：<a href="<?php echo url('bbb/index'); ?>"><span style="color: #FF3333;"><?php echo $sum_m[10]; ?></span><span color="#000000">-</span><span style="color: #FF3333;"><?php echo $sum_mzc[10]; ?></span></a></td>
                            <td  >特尾：<a href="<?php echo url('ws/index'); ?>"><span style="color: #FF3333;"><?php echo $sum_m[8]; ?></span><span color="#000000">-</span><span style="color: #FF3333;"><?php echo $sum_mzc[8]; ?></span></a></td>
                            <td  >五行：<a href="<?php echo url('wx/index'); ?>"><span style="color: #FF3333;"><?php echo $sum_m[9]; ?></span><span color="#000000">-</span><span style="color: #FF3333;"><?php echo $sum_mzc[9]; ?></span></a></td>
                        </tr>
                        <tr>
                            <td  >生肖：<a href="<?php echo url('sx/index'); ?>" ><span style="color: #FF3333;"><?php echo $sum_m[7]; ?></span><span color="#000000">-</span><span style="color: #FF3333;"><?php echo $sum_mzc[7]; ?></span></a></td>
                            <td >特头：<a href="<?php echo url('ts/index'); ?>"><span style="color: #FF3333;"><?php echo $sum_m[11]; ?></span><span color="#000000">-</span><span style="color: #FF3333;"><?php echo $sum_mzc[11]; ?></span></a></td>
                            <td  >平特尾（尾数）：<a href="<?php echo url('ztws/index'); ?>"><span style="color: #FF3333;"><?php echo $sum_m[12]; ?></span><span color="#000000">-</span><span style="color: #FF3333;"><?php echo $sum_mzc[12]; ?></span></a></td>
                            <td  >七色波：<a href="<?php echo url('qsb/index'); ?>"><span style="color: #FF3333;"><?php echo $sum_m[13]; ?></span><span color="#000000">-</span><span style="color: #FF3333;"><?php echo $sum_mzc[13]; ?></span></a></td>
                            <td  >正肖：<a href="<?php echo url('zhx/index'); ?>"><span style="color: #FF3333;"><?php echo $sum_m[14]; ?></span><span color="#000000">-</span><span style="color: #FF3333;"><?php echo $sum_mzc[14]; ?></span></a></td>
                            <td  >不中：<a href="<?php echo url('zx/index'); ?>"><span style="color: #FF3333;"><?php echo $sum_m[15]; ?></span><span color="#000000">-</span><span style="color: #FF3333;"><?php echo $sum_mzc[15]; ?></span></a></td>
                            <td  >尾数连：<a href="<?php echo url('wsl/index'); ?>"><span style="color: #FF3333;"><?php echo $sum_m[16]; ?></span><span color="#000000">-</span><span style="color: #FF3333;"><?php echo $sum_mzc[16]; ?></span></a></td>
                            <td  >生肖连：<a href="<?php echo url('lx/index'); ?>"><span style="color: #FF3333;"><?php echo $sum_m[17]; ?></span><span color="#000000">-</span><span style="color: #FF3333;"><?php echo $sum_mzc[17]; ?></span></a></td>
                            <td  >中一：<a href="<?php echo url('szy/index'); ?>"><span style="color: #FF3333;"><?php echo $sum_m[18]; ?></span><span color="#000000">-</span><span style="color: #FF3333;"><?php echo $sum_mzc[18]; ?></span></a></td>
                            <td align="right">
                                总：<span style="color:#333333;"><?php echo $z_sum; ?></span><span style="color:#000000;">-</span><span style="color:#333333;"><?php echo $z_sumzc; ?></span>
                            </td>
                        </tr>
                        </tbody>
                    </table>

                    <table class="layui-table" id="Hm">
                        <thead>
                        <tr>
                            <th>号码</th>
                            <th>赔率</th>
                            <th>金额</th>
                            <th>输赢</th>
                            <th>走飞</th>
                            <th>已补</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td colspan="6">0</td>
                        </tr>
                        </tbody>
                    </table>
                    <table class="layui-table" id="Hm1">
                        <thead>
                        <tr>
                            <th>号码</th>
                            <th>赔率</th>
                            <th>总额</th>
                            <th>输赢</th>
                            <th>走飞</th>
                            <th>已补</th>
                        </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    function reload(class2='<?php echo $ids; ?>',kithe='<?php echo $kithe; ?>',tm2=<?php echo $tm2; ?>){
        $.ajax({
            url:'<?php echo url("server_tm"); ?>',
            type:'post',
            data:{
                class1:'正特',
                class2:class2,
                kithe:kithe
            },
            dataType:'json',
            success:function (response,status,xhr) {
                if(response!=''){
                    var str='',
                        str1='';
                    for (i=0;i<response.length-1;i++){     //1-49的位置
                        var tem10='';
                        if(i!=(response.length-2)){
                            tem10='<a href="<?php echo url('jszd/look',['kithe'=>$kithe,'lx'=>0,'id'=>2]); ?>?class2=<?php echo $ids; ?>&class3='+response[i][12]+'">'+response[i][3]+'</a>';
                        }else{
                            tem10=response[i][2];
                        }
                        var tem4=0;
                        if(response[i][7]<0){
                            tem4='<span style="color:#ff0011;">'+response[i][7]+'</span>';
                        }else{
                            tem4='<span style="color:#2233ff;">'+response[i][7]+'</span>';
                        }
                        var tem=5;
                        if(response[i][9]!=0 && i!=(response.length-2)){
                            tem5='<a href="<?php echo url('jszd/look',['kithe'=>$kithe,'lx'=>1,'id'=>2]); ?>?class2=<?php echo $ids; ?>&class3='+response[i][12]+'">'+response[i][9]+'</a>';
                        }else{
                            tem5='<span>'+response[i][9]+'</span>';
                        }
                        if (i<49){
                            str+="<tr><td><strong style='color: #"+response[i][13]+";'>"+response[i][0]+"</strong></td><td>"+response[i][10]+"</td><td>"+tem10+"</td><td>"+tem4+"</td><td>"+response[i][8]+"</td><td>"+tem5+"</td></tr>";
                        }else{
                            str1+="<tr><td><strong style='color: #"+response[i][13]+";'>"+response[i][0]+"</strong></td><td>"+response[i][10]+"</td><td>"+tem10+"</td><td>"+tem4+"</td><td>"+response[i][8]+"</td><td>"+tem5+"</td></tr>";
                        }
                    }
                    str+="<tr><td colspan='2'>下注总额："+response[response.length-1][2]+"</td><td colspan='2'>占成总额："+response[response.length-1][3]+"</td><td colspan='2'>走飞总额："+response[response.length-1][9]+"</td></tr>";
                    $('#Hm > tbody').html(str);
                    $('#Hm1 > tbody').html(str1);
                }
            }
        })
    }
    reload();


    layui.use(['layer'],function () {
        var layer=layui.layer;
        //走飞计算
        $('#sub').click(function () {
            $.ajax({
                url:'<?php echo url("savePz"); ?>',
                type:'post',
                data:{
                    tm:$('[name=tm]').val(),
                    act:'zsave'
                },
                dataType:'json',
                success:function (response,status,xhr){
                    if(response.code>0){
                        layer.msg(response.msg,{icon:2});
                        $('[name=tm]').val(<?php echo $tm; ?>);
                    }else{
                        layer.msg(response.msg,{icon:1});
                        location.reload();
                    }
                }
            })
            return false;
        });


        //出货类别
        $('[name=menu1]').change(function () {
            location.href="<?php echo url(''); ?>?kithe=<?php echo $kithe; ?>&tm1=<?php echo $tm1; ?>&tm=<?php echo $tm; ?>&tm2="+$(this).val();
        });
        //期数选择
        $('[name=temppid]').change(function () {
            location.href="<?php echo url(''); ?>?kithe="+$(this).val();
        });
    })

</script>
</body>
</html>