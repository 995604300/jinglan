<?php

/* @var $this yii\web\View */
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\helpers\Url;
use liyunfang\pager\LinkPager;
use kartik\select2\Select2;

use kartik\grid\GridView;
use kartik\daterange\DateRangePicker;

$this->title = '首页';
$this->params['breadcrumbs'][] = '';
?>

<div class="wrapper wrapper-content" style="margin-top:50px;">
    <div class="row titleLab">

        <div class="col-sm-12">
            <div class="ibox float-e-margins">
                <div class="ibox-title" style="position: relative;">

                </div>
                <div class="ibox-content" style="border-style:none;" id="indexTab">

                </div>

            </div>


            <div class="col-sm-12">
                <div id="history"></div>
            </div>
        </div>
    </div>
</div>
<?php
$css = <<<Css
    .level-text{
        display: inline-block;
        vertical-align: middle;
        font-weight: 600;
        width: 60px;
    }
    .titleLab .ibox-title label.level-label{
        font-size: 14px;
        line-height: 17px;
        float:none;
        top: inherit;
        position: inherit;
        display: inline-block;
        vertical-align: middle;
        margin-bottom: 0;
        padding: 5px 10px;
    }
    i.level-i{
        display: inline-block;
        vertical-align: middle;
        height: 34px;
    }
    .level-form-select{
        width: 100px;
        display: inline-block;
        vertical-align: middle;
    }
Css;
$this->registerCss($css)
?>

<script>
    //点击修改账号信息
    $('.current').click(function () {
        layer.open({
            title: "修改账号信息",
            type: 2,
            area: ['800px', '450px'],
            //点击遮罩关闭
            shadeClose: true,
            content: "<?=Url::toRoute([
                                          'index/update',
                                          'type' => 2
                                      ])?>",
            scrollbar: false,
            btn: ['确定'],
            yes: function (index) {
                /* 获取新渲染页面dom */
                var body = layer.getChildFrame('body', index);
                /* 获取当前账号修改的的value */
                var nickname = body.find('#user-nickname').val();    //昵称
                var email = body.find('#user-email').val();     //邮箱
                var mobile = body.find('#user-phone').val();     //手机号
                $.ajax({
                    url: "<?=Url::toRoute([
                                              'index/update',
                                              'type' => 2
                                          ])?>",
                    type: 'POST', //GET
                    async: true,    //或false,是否异步
                    data: {
                        'nickname': nickname,
                        'email': email,
                        'mobile': mobile,
                    },    //账号信息
                    timeout: 5000,    //超时时间
                    dataType: 'json',    //返回的数据格式：json/xml/html/script/jsonp/text
                    beforeSend: function (xhr) {    //请求相应之前方法
                        console.log(email)
                    },
                    success: function (data) {    //请求成功
                        //                        location.replace(location.href);    //刷新首页
                        layer.closeAll();     //关闭弹窗
                        if(data == 1) {
                            layer.msg('修改成功！', {icon: 1});
                        } else {
                            layer.msg('修改失败！', {icon: 5});
                        }

                    },
                })
            },
        })
    });
</script>


