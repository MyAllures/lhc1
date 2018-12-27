<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:58:"D:\www\PHPTutorial\WWW\lhc/app/users\view\index\index.html";i:1545646836;}*/ ?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>代理--操作系统</title>
  <meta name="renderer" content="webkit">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=0">
  <meta http-equiv="Access-Control-Allow-Origin" content="*">

  <link rel="stylesheet" href="/file/admin/layuis/layui/css/layui.css" media="all">
  <link rel="stylesheet" href="/file/admin/layuis/style/admin.css" media="all">
  <script src="/file/admin/layui/jquery.min.js"></script>
  <script src="/file/admin/layui/base.js"></script>
  <script src="/file/admin/layui/vue.js"></script>
  <script>
  /^http(s*):\/\//.test(location.href) || alert('请先部署到 localhost 下再访问');
  </script>
  <style>
    .layui-nav .layui-nav-item a{
      padding: 0 14px;
    }

  </style>
</head>
<body class="layui-layout-body">
  <div id="LAY_app">
    <div class="layui-layout layui-layout-admin">
      <div class="layui-header">
        <!-- 头部区域 -->
        <ul class="layui-nav layui-layout-left">
          <li class="layui-nav-item layadmin-flexible" lay-unselect>
            <a href="javascript:;" layadmin-event="flexible" title="侧边伸缩">
              <i class="layui-icon layui-icon-shrink-right" id="LAY_app_flexible"></i>
            </a>
          </li>
          <!--<li class="layui-nav-item layui-hide-xs" lay-unselect>-->
            <!--<a lay-href="<?php echo url('home/console'); ?>" title="导航">-->
              <!--<i class="layui-icon layui-icon-website"></i>-->
            <!--</a>-->
          <!--</li>-->
          <!--<li class="layui-nav-item" lay-unselect>-->
            <!--<a href="javascript:;" layadmin-event="refresh" title="刷新">-->
              <!--<i class="layui-icon layui-icon-refresh-3"></i>-->
            <!--</a>-->
          <!--</li>-->
        </ul>
        <ul class="layui-nav layui-layout-right" lay-filter="layadmin-layout-right">
          <li class="layui-nav-item" lay-unselect>
            <a lay-href="<?php echo url('jszd/index'); ?>" layadmin-event="message" lay-text="即时注单">即时注单</a>
          </li>
          <li class="layui-nav-item layui-hide-xs" lay-unselect>
            <a lay-href="<?php echo url('zoufei/index'); ?>" layadmin-event="message" lay-text="走飞">走飞</a>
          </li>

          <?php if($admin['vip'] == 0): ?>  <!--子账户不能访问 start-->
            <?php if($admin['lx'] <= 1): ?>
            <li class="layui-nav-item layui-hide-xs" lay-unselect>
              <a lay-href="<?php echo url('zong/index'); ?>" layadmin-event="message" lay-text="总代理">总代理</a>
            </li>
            <?php endif; if($admin['lx'] <= 2): ?>
            <li class="layui-nav-item layui-hide-xs" lay-unselect>
              <a lay-href="<?php echo url('daili/index'); ?>" layadmin-event="message" lay-text="代理">代理</a>
            </li>
            <?php endif; ?>
            <li class="layui-nav-item layui-hide-xs" lay-unselect>
              <a lay-href="<?php echo url('mem/index'); ?>" layadmin-event="message" lay-text="会员">会员</a>
            </li>
            <li class="layui-nav-item layui-hide-xs" lay-unselect>
              <a lay-href="<?php echo url('zi/index'); ?>" layadmin-event="message" lay-text="子账号">子账号</a>
            </li>
          <?php endif; ?>                             <!--子账户不能访问 end-->


          <li class="layui-nav-item layui-hide-xs" lay-unselect>
            <a lay-href="<?php echo url('baobiao/index'); ?>" layadmin-event="message" lay-text="报表">报表</a>
          </li>
          <li class="layui-nav-item layui-hide-xs" lay-unselect>
            <a lay-href="<?php echo url('flyk/index'); ?>" layadmin-event="message" lay-text="分类盈亏">分类盈亏</a>
          </li>
          <li class="layui-nav-item layui-hide-xs" lay-unselect>
            <a lay-href="<?php if($admin['lx'] == 1): ?><?php echo url('zhudan/index'); elseif($admin['lx'] == 2): ?><?php echo url('zhudan/index2',['username'=>$admin['kauser']]); else: ?><?php echo url('zhudan/index3',['username'=>$admin['kauser']]); endif; ?>" layadmin-event="message" lay-text="注单查询">注单查询</a>
          </li>

          <?php if($admin['lx'] == 1): ?>
          <li class="layui-nav-item layui-hide-xs" lay-unselect>
            <a lay-href="<?php echo url('didan/index'); ?>" layadmin-event="message" lay-text="底单">底单</a>
          </li>
          <?php endif; ?>
          <li class="layui-nav-item layui-hide-xs" lay-unselect>
            <a lay-href="<?php echo url("kakithe/index"); ?>" layadmin-event="message" lay-text="开奖结果">开奖结果</a>
          </li>
          <li class="layui-nav-item layui-hide-xs" lay-unselect>
            <a lay-href="<?php if($admin['vip'] == 0): ?><?php echo url('guan/index'); else: ?><?php echo url("guan/zi"); endif; ?>" layadmin-event="message" lay-text="个人资料">个人资料</a>
          </li>
          <?php if($admin['vip'] == 0): ?>
          <li class="layui-nav-item layui-hide-xs" lay-unselect>
            <a lay-href="<?php echo url('bucang/index'); ?>" layadmin-event="message" lay-text="自动补仓设置">自动补仓设置</a>
          </li>
          <?php endif; ?>
          <li class="layui-nav-item" lay-unselect>
            <a href="javascript:;">
              <cite><?php echo $admin['kauser']; ?></cite>
            </a>
            <dl class="layui-nav-child">
              <?php if($admin['vip'] == 0): ?> <dd><a lay-href="<?php echo url("guan/savepass"); ?>">修改密码</a></dd>  <hr><?php endif; ?>

              <dd style="text-align: center;cursor:pointer" onclick="loginOut()"><a>退出</a></dd>
            </dl>
          </li>
          <li class="layui-nav-item layui-hide-xs">
            <a href="javascript:;" data-type="test2" id="ttt222"><i class="layui-icon layui-icon-more-vertical"></i></a>
          </li>
       
        </ul>
      </div>
      <!-- 关于 -->
      <div id="is-about-set">
        <div class="layui-card-header">版本信息</div>
        <div class="layui-card-body layui-text layadmin-about">
      
            <p>当前版本：<em id="version">1.0</em></p>
            <p>基于框架：<em id="kuangjia">TP5.020+Layui2.0</em></p>
        </div>

        <div class="layui-card-header">关于版权</div>
        <div class="layui-card-body layui-text layadmin-about">
          
          <blockquote class="layui-elem-quote" style="border: none;" id="copyright_about">
          </blockquote>
             <p>© 2018 <a href="http://conpany.1088900.cn/">树叶网络科技</a> 版权所有</p>
          <p id="copyright"></p>
        </div>
      </div>
      <!-- 侧边菜单 -->
      <div class="layui-side layui-side-menu">
        <div class="layui-side-scroll">
          <div class="layui-logo">
            <span id="webname" class="layui-bg-red" style="font-size: 30px;"><?php echo getConfigField('webname'); ?></span>
          </div>
          
          <ul class="layui-nav layui-nav-tree" lay-shrink="all" id="LAY-system-side-menu" lay-filter="layadmin-system-side-menu">
            <li data-name="app" class="layui-nav-item layui-nav-itemed">
              <a href="javascript:;" lay-tips="应用" lay-direction="2">
                <i class="layui-icon layui-icon-app"></i>
                <cite>用户管理</cite>
              </a>
              <dl class="layui-nav-child">
                  <dd><a lay-href="<?php echo url("user/index"); ?>">用户管理</a></dd>
                  <dd><a lay-href="<?php echo url("admin/changepass"); ?>">修改密码</a></dd>
              </dl>
            </li>
          </ul>
        </div>
      </div>

      <!-- 页面标签 -->
      <div class="layadmin-pagetabs" id="LAY_app_tabs">
        <div class="layui-icon layadmin-tabs-control layui-icon-prev" layadmin-event="leftPage"></div>
        <div class="layui-icon layadmin-tabs-control layui-icon-next" layadmin-event="rightPage"></div>
        <div class="layui-icon layadmin-tabs-control layui-icon-down">
          <ul class="layui-nav layadmin-tabs-select" lay-filter="layadmin-pagetabs-nav" lay-shrink="all">
            <li class="layui-nav-item">
              <a href="javascript:;"></a>
              <dl class="layui-nav-child layui-anim-fadein">
                <dd layadmin-event="closeThisTabs"><a href="javascript:;">关闭当前标签页</a></dd>
                <dd layadmin-event="closeOtherTabs"><a href="javascript:;">关闭其它标签页</a></dd>
                <dd layadmin-event="closeAllTabs"><a href="javascript:;">关闭全部标签页</a></dd>
              </dl>
            </li>
          </ul>
        </div>
        <div class="layui-tab" lay-unauto lay-allowClose="true" lay-filter="layadmin-layout-tabs">
          <ul class="layui-tab-title" id="LAY_app_tabsheader">
            <li lay-id="<?php echo url("kakithe/index"); ?>" class="layui-this"><i class="layui-icon layui-icon-home"></i></li>
          </ul>
        </div>
      </div>
      
      
      <!-- 主体内容 -->
      <div class="layui-body" id="LAY_app_body">
        <div class="layadmin-tabsbody-item layui-show">
          <iframe src="<?php echo url("kakithe/index"); ?>" frameborder="0" class="layadmin-iframe"></iframe>
        </div>
      </div>
      
      <!-- 辅助元素，一般用于移动设备下遮罩 -->
      <div class="layadmin-body-shade" layadmin-event="shade"></div>
    </div>
  </div>

  <script src="/file/admin/layuis/layui/layui.js"></script>
  <script>
    // $.ajax({
    //     type: "get",
    //     url: "<?php echo url(''); ?>",
    //     async:false,
    //     data: {}
    //   }).success(function (data) {
    //     $("#version").text(data.version);
    //     $("#kuangjia").text(data.kuangjia);
    //     $("#copyright").text(data.banquan);
    //     $("#copyright_about").text(data.new);
    //     $("#webname").text(data.webname);
        
    //   }).fail(function (jqXHR, textStatus, errorThrown) {
    //     //错误信息
    //   });
  layui.config({
    base: '/file/admin/layuis/'    //静态资源所在路径
  }).extend({
    index: 'lib/index' //主入口模块
  }).use(['index'],function () {
    
    var $ = layui.$
      ,admin = layui.admin
      ,element = layui.element
      ,router = layui.router();
      element.render();
      var html = $("#is-about-set").html();

      var active = {
        test2: function(){
        admin.popupRight({
          id: 'LAY_adminPopupLayerTest'
          ,success: function(){
            $('#'+ this.id).html(html);
          }
        });
      }
    };
    $('#ttt222').on('click', function(){
      var type = $(this).data('type');
      active[type] && active[type].call(this);
    });
  });
  function loginOut() 
  {
    location.href="<?php echo url('login/logout'); ?>";
  }
  </script>
</body>
</html>