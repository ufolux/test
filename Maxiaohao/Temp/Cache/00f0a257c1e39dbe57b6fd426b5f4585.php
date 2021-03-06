<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//WAPFORUM//DTD XHTML Mobile 1.0//EN" "http://www.wapforum.org/DTD/xhtml-mobile10.dtd">
<html lang="zh-cn">

<head>
    <title>今日之星<?php echo ($user["uid"]); ?>号</title>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta content="application/xhtml+xml;charset=UTF-8" http-equiv="Content-Type">
    <meta http-equiv="Content-Type" content="text/html;charset=utf-8">
    <meta content="no-cache,must-revalidate" http-equiv="Cache-Control">
    <meta content="no-cache" http-equiv="pragma">
    <meta content="0" http-equiv="expires">
    <meta content="telephone=no, address=no" name="format-detection">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta name="viewport" content="width=device-width,initial-scale=1.0,maximum-scale=1.0,user-scalable=0" />
    <meta name="format-detection" content="telephone=no">
    <meta name="apple-mobile-web-app-capable" content="yes" />
    <!-- 必须在框架前引入 -->
    <script type="text/javascript" src="__PUBLIC__/Js/jquery-1.11.0.min.js"></script>

    <script type="text/javascript" src="__PUBLIC__/Js/jquery.form.js"></script>
    <!-- 最新 Bootstrap 核心 CSS 文件 -->
    <link rel="stylesheet" href="http://cdn.bootcss.com/twitter-bootstrap/3.0.3/css/bootstrap.min.css">


    <!-- 最新的 Bootstrap 核心 JavaScript 文件 -->
    <script src="http://cdn.bootcss.com/twitter-bootstrap/3.0.3/js/bootstrap.min.js"></script>

    <script language="JavaScript">
    <!--
    //将openid和微信账号加入tempuser表
    $(function() {
        $('#input_wechat').ajaxForm({
            beforeSubmit: checkForm, // pre-submit callback
            success: complete, // post-submit callback
            dataType: 'json'
        });

        function checkForm() {
            if ('' == $.trim($('#new_wechat').val())) {
                $('#result').html('不能为空').show();
                return false;
            }
            if ('' == $.trim($('#new_openid').val())) {
                $('#result').html('发生错误').show();
                return false;
            }
            //可以在此添加其它判断
        }

        function complete(data) {
            if (data.status == 1) {
                $('#result').html('提交成功').show();
                $('#submit_new_wechat').attr('style', 'display:none');
                // 更新列表
            } else {
                $('#result').html(data.info).show();
            }
        }
    });
    </script>
    <style type="text/css">
    dt {
        font-size: 18px;
    }
    dd {
        font-size: 16px;
    }
    #input_new_wechat {
        margin-top: 20%;
        margin-bottom: 10%;
        font-size:18px;
        color: white;
        font-family: Microsoft YaHei;
    }
    #my_fav, #another_one {
        font-size: 18px;
        font-family:'Microsoft Yahei'；
    }
    #love {
        float: left;
        width: 50%;
    }
    #another {
        float: left;
        width: 50%;
    }
    #result {
        text-align: center;
        font-size: 18px;
        font-family:'Microsoft Yahei';
        color: white;
    }
    #wrap {
        background-color: #327671;
        width: 80%;
        height: 200px;
        top: 30%;
        left: 10%;
        position:fixed;
        z-index: 2;
    }
    #overlay {
        position:fixed;
        background-color: rgb(119, 119, 119);
        opacity: 0.5;
        cursor: pointer;
        width:100%;
        height: 100%;
        top: 0px;
        left: 0px;
        z-index: 1;
    }
    #nav_bar {
        display: block;
        position: fixed;
        width: 100%;
        height: auto;
        top: 0px;
        left: 0px;
        border-bottom-left-radius:5px;
        border-bottom-right-radius: 5px;
        color: white;
        background-color: #327671;
        padding-bottom: 10px;
    }

    #showInfo_area {
        margin-top: 25%;
    }
    </style>
</head>

<body>
    <div id="overlay" style="display: none" class="container"></div>
    <div id="nav_bar" class="container">
        <center>
            <h1 id="nav_h1">今日之星<?php echo ($user["uid"]); ?>号</h1>
        </center>
    </div>


    <div id="showInfo_area" class="container">
        <div class="row container">
            <div>
                <img id="show_img" class="img-responsive" src="__PUBLIC__<?php echo ($user["picurl"]); ?>" alt="Responsive image" />
            </div>
        </div>
        <div class="row container">
            <dl class="dl-horizontal">
                <dt>uid:</dt>
                <dd><?php echo ($user["uid"]); ?></dd>
            </dl>

        </div>

        <div class="row container">
            <dl class="dl-horizontal">
                <dt>location:</dt>
                <dd><?php echo ($user["location"]); ?></dd>
            </dl>

        </div>

        <div class="row container">
            <dl class="dl-horizontal">
                <dt>attribute:</dt>
                <dd><?php echo ($user["attribute"]); ?></dd>
            </dl>

        </div>

        <div class="row container">
            <dl class="dl-horizontal">
                <dt>age:</dt>
                <dd><?php echo ($user["age"]); ?></dd>
            </dl>

        </div>

        <div class="row container">
            <dl class="dl-horizontal">
                <dt>q1:</dt>
                <dd><?php echo ($question["q1"]); ?></dd>
            </dl>

        </div>

        <div class="row container">
            <dl class="dl-horizontal">
                <dt>q2:</dt>
                <dd><?php echo ($question["q2"]); ?></dd>
            </dl>

        </div>

        <div class="row container">
            <dl class="dl-horizontal">
                <dt>q3:</dt>
                <dd><?php echo ($question["q3"]); ?></dd>
            </dl>

        </div>

        <div class="row container">
            <dl class="dl-horizontal">
                <dt>q4:</dt>
                <dd><?php echo ($question["q4"]); ?></dd>
            </dl>

        </div>

        <div class="row container">
            <dl class="dl-horizontal">
                <dt>q5:</dt>
                <dd><?php echo ($question["q5"]); ?></dd>
            </dl>

        </div>

        <div class="row container">
            <dl class="dl-horizontal">
                <dt>q6:</dt>
                <dd><?php echo ($question["q6"]); ?></dd>
            </dl>

        </div>

        <div class="row container">
            <dl class="dl-horizontal">
                <dt>q7:</dt>
                <dd><?php echo ($question["q7"]); ?></dd>
            </dl>

        </div>

        <div class="row container">
            <dl class="dl-horizontal">
                <dt>q8:</dt>
                <dd><?php echo ($question["q8"]); ?></dd>
            </dl>

        </div>

    </div>

    <div id="button_area" class="container">
        <div id='love' class="container col-xs-6">
            <form id="loveit" method="post" action="__URL__/my_fav">
                <INPUT id="tempuser_openid" type="hidden" name="openid" value="<?php echo $_GET['openid'];?>" />
                <!-- <INPUT type="hidden" name="wopenid" value="<?php echo ($user["openid"]); ?>"/> -->
                <button name="button" id='my_fav' class="btn btn-primary form-control btn-lg" type='submit'>我的菜</button>
            </form>
        </div>
        <div id='another' class="container col-xs-6">
            <button name="button" id='another_one' class="btn btn-primary form-control btn-lg" type='button' onclick="location.reload()">换一个</button>
        </div>

    </div>

    <div id="wechat_info" style="display: none;" class="container">
        <p>加微信：<?php echo ($user["wechat"]); ?></p>
    </div>
    <div class="footer">
        <br>
        <br>
    </div>
    <!-- 浮动层 -->


    <div id="wrap" style="display: none" class="container">
        <form class="form-group" id="input_wechat" action="__URL__/newWechat" method="post" onsubmit="return saveReport();">
            <div id="input_new_wechat" class="form-group col-xs-12">
                <lable for="new_wechat">请输入你的微信账号：</lable>
                <input id="new_wechat" class="form-control" type="text" name="wechat" />
            </div>
            <div id="result" class="result form-group col-xs-12" style="display:none;">
            </div>
            <div>
                <input id="new_openid" type="hidden" name="openid" value="<?php echo $_GET['openid'];?>" />
            </div>

            <div class="col-xs-12">
                <input id='submit_new_wechat' class="btn btn-primary form-control btn-lg" type='submit' name="submit_new_wechat" value="确认提交" />
            </div>
        </form>

    </div>

    <!--  -->
    <script type="text/javascript">
    $(function() {
        $('#loveit').ajaxForm({
            beforeSubmit: check, // pre-submit callback
            success: exsitHandler, // post-submit callback
            dataType: 'json'
        });

        function check() {
            if ('' == $.trim($('#tempuser_openid').val())) {
                alert('发生错误');
                return false;
            }
            //可以在此添加其它判断
        }

        function exsitHandler(data) {
            if (data.status == 0) {
                var overlay = document.getElementById("overlay");
                var wrap = document.getElementById("wrap");
                overlay.setAttribute("style", "");
                wrap.setAttribute("style", "");
                // 更新列表
            }
            if (data.status == 1) {
                alert('添加他为好友吧');
                var wechat_info = document.getElementById("wechat_info");
                wechat_info.setAttribute("style", "block");
            }
        }
    });
    $("#overlay").click(function() {
        $("#overlay").hide();
        $("#wrap").hide();
    });
    </script>


</body>

</html>