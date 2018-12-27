<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:55:"D:\www\PHPTutorial\WWW\lhc/app/users\view\lm\index.html";i:1545824087;}*/ ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>走飞--连码</title>
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
                title: '['+class3+']请设定',
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
                        <a class="layui-btn layui-btn-primary layui-btn-sm" href="<?php echo url('',['ids'=>'三全中','kithe'=>$kithe]); ?>">三全中</a>
                        <a class="layui-btn layui-btn-primary layui-btn-sm" href="<?php echo url('',['ids'=>'三中二','kithe'=>$kithe]); ?>">三中二</a>
                        <a class="layui-btn layui-btn-primary layui-btn-sm" href="<?php echo url('',['ids'=>'二全中','kithe'=>$kithe]); ?>">二全中</a>
                        <a class="layui-btn layui-btn-primary layui-btn-sm" href="<?php echo url('',['ids'=>'二中特','kithe'=>$kithe]); ?>">二中特</a>
                        <a class="layui-btn layui-btn-primary layui-btn-sm" href="<?php echo url('',['ids'=>'特串','kithe'=>$kithe]); ?>">特串</a>
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
                            <th>序号</th>
                            <th>号码</th>
                            <th>注数</th>
                            <th>下注总额</th>
                            <th>占成</th>
                            <th>佣金</th>
                            <th>彩金</th>
                            <th>预计盈利</th>
                            <th>走飞</th>
                            <th>走飞金额</th>
                            <th>当前赔率</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td colspan="11">0</td>
                        </tr>
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
                class1:'连码',
                class2:class2,
                kithe:kithe
            },
            dataType:'json',
            success:function (response,status,xhr) {
                if(response!=''){
                    var str='';
                    for (i=0;i<response.length-1;i++){     //1-49的位置
                        num2="<strong style='color: #"+response[i][13]+";'>"+response[i][0]+"</strong>";
                        if(i==response.length){
                            num2='<strong style="color: #ff6600">总计</strong>';
                            num1='';
                        }else{
                            num1=i+1;
                        }
                        num3=response[i][1];
                        var num4='';
                        if(i!=(response.length-2)){
                            num4='<a href="<?php echo url('jszd/look',['kithe'=>$kithe,'lx'=>0,'id'=>31]); ?>?class2=<?php echo $ids; ?>&class3='+response[i][12]+'">'+response[i][3]+'</a>';
                        }else{
                            num4=response[i][2];
                        }
                        num5=response[i][3];
                        num6=response[i][4];
                        num7=response[i][5];
                        num8=response[i][6];
                        num9=response[i][7];
                        num10=response[i][8];
                        if(response[i][9]!=0 && i!=(response.length-2)){
                            num11='<a href="<?php echo url('jszd/look',['kithe'=>$kithe,'lx'=>1,'id'=>31]); ?>?class2=<?php echo $ids; ?>&class3='+response[i][12]+'">'+response[i][9]+'</a>';
                        }else{
                            num11=response[i][9];
                        }
                        num12=response[i][10];
                        num13=response[i][11];
                        str+="<tr><td>"+num1+"</td><td>"+num2+"</td><td>"+num3+"</td><td>"+num4+"</td><td>"+num5+"</td><td>"+num6+"</td><td>"+num7+"</td><td>"+num8+"</td><td>"+num9+"</td><td>"+num10+"</td><td>"+num11+"</td></tr>";
                    }
                    $('#Hm > tbody').html(str);
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