<?php

/* @var $this yii\web\View */
use yii\helpers\Html;
use yii\helpers\Url;

$this->title = Yii::$app->name;
if (class_exists('\yii\debug\Module')) {
    Yii::$app->view->off(\yii\web\View::EVENT_END_BODY, [
        \yii\debug\Module::getInstance(),
        'renderToolbar',
    ]);
}
?>
<div id="wrapper">
    <!--左侧导航开始-->
    <nav class="navbar-default navbar-static-side" role="navigation">
        <div class="nav-close"><i class="fa fa-times-circle"></i>
        </div>
        <div class="sidebar-collapse">
            <ul class="nav" id="side-menu">
                <li class="nav-header">
                    <div class="profile-element dropdown">
                        <span class="logo">
                            <a class="logo-title" href="https://jlweb.rulaiyun.cn" title="跳转至统计图页面">安徽精蓝测绘管理平台</a>
                        </span>
                    </div>
                    <div class="logo-element">
                        <img alt="image" src="<?php echo Url::to('@web/img/logo_with_title.png'); ?>"/>
                    </div>
                </li>
                    <li><!--一级级菜单-->
                        <a href="category/index" class="J_menuItem">
                            <span class="nav-label">项目分类</span>
                        </a>
                    </li>
                <li><!--一级级菜单-->
                    <a href="project/index" class="J_menuItem">
                        <span class="nav-label">项目管理</span>
                    </a>
                </li>
            </ul>
        </div>
    </nav>
    <!--左侧导航结束-->
    <!--右侧部分开始-->
    <div id="page-wrapper" class="gray-bg dashbard-1">
        <div class="row border-bottom">
            <nav class="navbar navbar-static-top" role="navigation" style="margin-bottom: 0">
                <a class="navbar-minimalize" href='#' style="color: #797979;">
                    <i class="fa fa-bars" data-toggle="tooltip" title="缩小左侧菜单" data-placement="bottom"></i>
                </a>
                <?php if (Yii::$app->user->identity->username === 'admin'
                    || \Yii::$app->user->can('setting/flush-cache')) { ?>
                    <a class="navbar-flush-cache" href="#" style="color: #797979;">
                        <i class="fa fa-history" data-toggle="tooltip" title="清除缓存" data-placement="bottom"></i>
                    </a>
                <?php } ?>
                <ul class="nav navbar-top-links" style="height: 50px;line-height: 50px;">

                        <span style="margin-right: 20px"><a class="auth_key" href=" javascript:void(0);">修改密码</a></span>

                </ul>
            </nav>
        </div>
        <div class="row content-tabs">
            <button class="roll-nav roll-left J_tabLeft"><i class="fa fa-backward"></i>
            </button>
            <nav class="page-tabs J_menuTabs">
                <div class="page-tabs-content">
                    <a href="javascript:;" class="active J_menuTab" data-id="index_v1.html">首页</a>
                </div>
            </nav>
            <button class="roll-nav roll-right J_tabRight"><i class="fa fa-forward"></i> </button>
            <div class="btn-group roll-nav roll-right">
                <button class="dropdown J_tabClose" data-toggle="dropdown">关闭操作<span class="caret"></span></button>
                <ul role="menu" class="dropdown-menu dropdown-menu-right">
                    <li class="J_tabShowActive"><a>定位当前选项卡</a>
                    </li>
                    <li class="divider"></li>
                    <li class="J_tabCloseAll"><a>关闭全部选项卡</a>
                    </li>
                    <li class="J_tabCloseOther"><a>关闭其他选项卡</a>
                    </li>
                </ul>
            </div>
            <a data-url=<?= Url::toRoute('site/logout'); ?> class="roll-nav roll-right J_tabExit login-out"><i class="fa fa fa-sign-out"></i> 退出</a>
        </div>
        <div class="row J_mainContent" id="content-main">
            <iframe class="J_iframe" name="iframe0" width="100%" height="100%"
                    src="<?= Url::toRoute('index/welcome'); ?>" frameborder="0" data-id="index_v1.html"
                    seamless></iframe>
        </div>
        <div class="footer footer-index">
            <div>
                版本号:<span>v1.0.1</span>
            </div>
        </div>
    </div>
    <!--右侧部分结束-->
    <!--右侧边栏开始-->
    <div id="right-sidebar" class="gray-bg dashbard-1">
        <div class="border-bottom row">
            <nav class="navbar navbar-static-top" role="navigation" style="margin-bottom: 0">
                <a class="navbar-minimalize" href="#tab-1">
                    <i class="fa fa-bars"></i>
                </a>
            </nav>
        </div>
        <div class="sidebar-container">


            <div class="tab-content">
                <div id="tab-1" class="tab-pane active">
                    <div class="sidebar-title">
                        <h3><i class="fa fa-comments-o"></i> 主题设置</h3>
                        <small><i class="fa fa-tim"></i> 你可以从这里选择和预览主题的布局和样式，这些设置会被保存在本地，下次打开的时候会直接应用这些设置。</small>
                    </div>
                    <div class="skin-setttings">
                        <div class="title">主题设置</div>
                        <div class="setings-item">
                            <span>收起左侧菜单</span>
                            <div class="switch">
                                <div class="onoffswitch">
                                    <input type="checkbox" name="collapsemenu" class="onoffswitch-checkbox"
                                           id="collapsemenu">
                                    <label class="onoffswitch-label" for="collapsemenu">
                                        <span class="onoffswitch-inner"></span>
                                        <span class="onoffswitch-switch"></span>
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="setings-item">
                            <span>固定顶部</span>

                            <div class="switch">
                                <div class="onoffswitch">
                                    <input type="checkbox" name="fixednavbar" class="onoffswitch-checkbox"
                                           id="fixednavbar">
                                    <label class="onoffswitch-label" for="fixednavbar">
                                        <span class="onoffswitch-inner"></span>
                                        <span class="onoffswitch-switch"></span>
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="setings-item">
                            <span>
                                固定宽度
                            </span>

                            <div class="switch">
                                <div class="onoffswitch">
                                    <input type="checkbox" name="boxedlayout" class="onoffswitch-checkbox"
                                           id="boxedlayout">
                                    <label class="onoffswitch-label" for="boxedlayout">
                                        <span class="onoffswitch-inner"></span>
                                        <span class="onoffswitch-switch"></span>
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="title">皮肤选择</div>
                        <div class="setings-item default-skin nb">
                                <span class="skin-name ">
                         <a href="#" class="s-skin-0">
                             默认皮肤
                         </a>
                    </span>
                        </div>
                        <div class="setings-item blue-skin nb">
                                <span class="skin-name ">
                        <a href="#" class="s-skin-1">
                            蓝色主题
                        </a>
                    </span>
                        </div>
                        <div class="setings-item yellow-skin nb">
                            <span class="skin-name ">
                                <a href="#" class="s-skin-3">
                                    黄色/紫色主题
                                </a>
                            </span>
                        </div>
                    </div>
                </div>

            </div>

        </div>
    </div>
    <!--右侧边栏结束-->

</div>

<?php
$css = <<<CSS
    /*------logo块------*/
    .logo img{
        width: 34px;
        vertical-align: middle;
        margin-right: 2px;
    }
    .logo-title{
       font-size:16px;
       color: #fff;
       display: inline-block;
       vertical-align: -4px;
    }
    .nav-header{
        padding-left: 19px;
    }
    
    /*-----顶部用户信息切换模式按钮块-----*/
    .navbar-static-top{
        text-align: right;
        background: #fff;
    }
    #userInfo{
        display: inline-block;
    }
    .navbar-minimalize{
        font-size: 20px;
        position: absolute;
        left: 40px;
        height: 50px;
        line-height: 50px;
    }
   .navbar-flush-cache{
        font-size: 20px;
        position: absolute;
        left: 70px;
        height: 50px;
        line-height: 50px;
    }
    /*-----后台登录后首页页脚-----*/
    .footer-index{
        background: #5b6e84;
        border-top: 1px solid #e7eaec;
        padding: 10px 20px;
        height: 40px;
        position: absolute;
        left: 0;
        right: 0;
        bottom: 0;
        text-align: center;
        color: #fff;
        text-align: right;
        font-weight: 600;
        padding-right: 40px;
        box-sizing: border-box;
    }
    .logo-element img{
        width: 30px;
        height: auto;
    }
    .admin-info span{
        margin-right: 10px;
        font-weight: 600;
        color: #6C6C6C;
    }
    /*清除缓存与缩小左侧菜单按钮 tooltip 样式*/
    .navbar-minimalize .tooltip {
        min-width: 40px;
    }
    .navbar-flush-cache .tooltip {
        min-width: 40px;
    }
    .navbar-default {
        background-color: #2f4050;
        border-color: #2f4050;
        position: relative
}
CSS;
$this->registerCss($css);
?>

<?php $this->beginBlock('js_block'); ?>
<script>

    $(".login-out").on("click",function() {
        var that = this;
        layer.confirm('确认退出登录吗？', {
                btn: ['确定', '取消']
            }
            ,function(index, layero){
                // 确定回调
                window.location.href = $(that).attr('data-url');
            }
            ,function(index, layero){
                // 取消回调 TODO...

            });
    })
    var index="1";

    //点击修改密码
    $('.auth_key').click(function () {
        layer.open({
            title: "修改密码",
            type: 2,
            area: ['500px', '400px'],
            //点击遮罩关闭
            shadeClose: true,
            content: '<?=Url::toRoute([
                                          'index/update',
                                      ])?>',
            scrollbar: false,
            btn: ['确定'],
            yes: function (index) {
                /* 获取新渲染页面dom */
                var body = layer.getChildFrame('body', index);
                /* 获取选择页面的value */
                var key_old = body.find('#auth_key_old').val();
                var key_new = body.find('#user-auth_key_new').val();
                var tishi = body.find('#user-auth_key_new').next('.help-block').html();
                var key_two = body.find('#auth_key_new_two').val();
                if(tishi) {
                    alert(tishi);
                    return false;
                }
                /* 验证新密码为空 */
                if(!key_old) {
                    alert('原密码不能为空');
                    return false;
                }
                /* 验证新密码为空 */
                if(!key_new) {
                    alert('新密码不能为空');
                    return false;
                }
                /* 验证新密码为空 */
                if(key_new.trim().length != key_new.length) {
                    alert('新密码不能以空格开始或结尾！');
                    return false;
                }
                /* 验证确认密码为空 */
                if(!key_two) {
                    alert('确认密码不能为空');
                    return false;
                }
                /* 验证新密码与确认密码是否输入一致 */
                if(key_new != key_two) {
                    alert('请确认密码是否输入一致');
                    return false;
                }
                $.ajax({
                    url: '<?=Url::toRoute([
                                              'index/update',
                                          ])?>',
                    type: 'POST', //GET
                    async: true,    //或false,是否异步
                    data: {'key_old': key_old,'key_new':key_new,'key_two':key_two},    //下级id数组
                    timeout: 5000,    //超时时间
                    dataType: 'json',    //返回的数据格式：json/xml/html/script/jsonp/text
                    beforeSend: function (xhr) {    //请求相应之前方法
                        //                        console.log(key_new+';;;'+key_old)
                    },
                    success: function (data) {    //请求成功
                        layer.closeAll();     //关闭弹窗
                        if(data == 1){
                            layer.msg('修改成功！', {icon: 1});
                        } else if(data == 2) {
                            layer.msg('修改失败，原密码输入错误！', {icon: 5});
                        } else if(data == 3) {
                            layer.msg('修改失败，密码输入不一致！', {icon: 5});
                        } else if(data == 4) {
                            layer.msg('修改失败！', {icon: 5});
                        }else if(data == 5) {
                            layer.msg('修改失败，原密码不能为空！', {icon: 5});
                        }
                    },
                })
            },
        })
    });
</script>

<?= Html::jsFile('@web/js/plugins/metisMenu/jquery.metisMenu.js') ?>
<?= Html::jsFile('@web/js/plugins/slimscroll/jquery.slimscroll.min.js') ?>
<?= Html::jsFile('@web/js/hplus.min.js') ?>
<?= Html::jsFile('@web/js/contabs.min.js') ?>
<?= Html::jsFile('@web/js/plugins/pace/pace.min.js') ?>

<script>
    $('.navbar-flush-cache').on('click',function(e) {
        $.ajax({
            url:'<?= url::toRoute(['setting/flush-cache']); ?>',
            type:'GET',
            dataType:'json',
            success:function (res)
            {
                layer.alert(res.message)
            }
        });
        return false;
    })

</script>
<?php $this->endBlock(); ?>


