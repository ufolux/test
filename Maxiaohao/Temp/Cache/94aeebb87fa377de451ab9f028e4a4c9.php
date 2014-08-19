<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//WAPFORUM//DTD XHTML Mobile 1.0//EN" "http://www.wapforum.org/DTD/xhtml-mobile10.dtd">
<html lang="zh-cn">

<head>
    <title>成为今日之星吧</title>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Mobile Devices Support @begin -->
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
    <!-- apple devices fullscreen -->
    <meta name="apple-mobile-web-app-status-bar-style" content="black-translucent" />
    <!-- Mobile Devices Support @end -->
    <meta name="format-detection" content="telephone=no">
    <meta name="apple-mobile-web-app-capable" content="yes" />
    <!-- 必须在框架前引入 -->
    <script type="text/javascript" src="__PUBLIC__/Js/jquery-1.11.0.min.js"></script>

    <script type="text/javascript" src="__PUBLIC__/Js/jquery.form.js"></script>
    <!-- 最新 Bootstrap 核心 CSS 文件 -->
    <link rel="stylesheet" href="http://cdn.bootcss.com/twitter-bootstrap/3.0.3/css/bootstrap.min.css">


    <!-- 最新的 Bootstrap 核心 JavaScript 文件 -->
    <script src="http://cdn.bootcss.com/twitter-bootstrap/3.0.3/js/bootstrap.min.js"></script>

    <script type="text/javascript" src="__PUBLIC__/Js/validate_form.js"></script>
    <script type="text/javascript" src="__PUBLIC__/Js/location_select.js"></script>
    <script type="text/javascript">
    function show(image) {
        //var node = document.getElementById("showimg");
        // // 显示图片在showpic层中
        //node.setAttribute("src", "__PUBLIC__/Upload/" + image);
        var picurl = document.getElementById("picUrl");
        picurl.setAttribute("value", "Upload/" + image);
        var node = document.getElementById("fileInputContainer");
        var picurl_1 = "__PUBLIC__Upload/" + image;
        node.setAttribute("src", picurl_1);
        getImgUrl();
    }

    function getSelectValue() {
        var s1 = document.getElementById("s1").value;
        var s2 = document.getElementById("s2").value;
        var s3 = document.getElementById("s3").value;

        var location = s1 + s2 + s3;

        var node = document.getElementById("loc");
        node.setAttribute("value", location);
    }

    function getImgUrl() {
        var epicurl = document.getElementById("picUrl").value;

        console.warn(epicurl + "ok");

        var node = document.getElementById("epicurl");
        node.setAttribute("value", 'localhost:83/test/Public/' + epicurl);

    }
    </script>
    <style>
    .fileInputContainer {
        height:200px;
        position:relative;
        width: 100%;
        cursor:pointer;
    }
    .fileInput {
        height:200px;
        overflow: hidden;
        font-size: 300px;
        position:absolute;
        right:0;
        top:0;
        opacity: 0;
        filter:alpha(opacity=0);
        
    }
        #nav_bar {
        display: block;
        position: fixed;
        z-index: 100;
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

    #info_form {
        margin-top: 25%;
        width: 100%;
    }
    </style>

</head>

<body  onLoad="setup('中国','北京','北京');getSelectValue();getImgUrl()">
<div id="nav_bar" class="container">
        <center>
            <h1 id="nav_h1">成为今日之星</h1>
        </center>
    </div>

    <div id="info_form" class="container">


        <div id="myform" class="container">
            <div>
                <h3>请选择一个图片上传</h3>
            </div>
            <!--            // __URL__/show 为thinkphp框架用法,提交至show方法 -->
            <div>
                <form id="picForm" class="form-group" action="__URL__/upload" method="post" enctype="multipart/form-data" target="upframe">

                    <!-- div上传start -->
                    <div id="showpic">
                        <img id="fileInputContainer" class="fileInputContainer" src="__PUBLIC__/Images/uploadPlaceholder.png" onclick="myFile.click()"/>

                        <div>
                            <label for="uploadAImg" class="sr-only"></label>
                            <input id="uploadAImg" type="file" name="myFile" style="display:none" onchange="isValidateFile(this)">
   <!--                          <button class="form-control fileInput" id="submitPic" onclick="myFile.click()"></button> -->
                        </div>

                    </div>
                    <!-- div上传end -->
                    <!--                 <input type="button" id="submitPic" value="选择文件" onclick="myFile.click()">
                <br />-->
                    <div class="col-xs-12">
                        <button type="submit" name="submit" class="form-control btn btn-primary" />上传</button>
                    </div>
                    <input id="epicurl" type="hidden" name="epicurl" value="" />
                    <INPUT type="hidden" name="openid" value="<?php echo $_GET['openid'];?>" />

                </form>
            </div>
        </div>
        <!--        // 这里是重点,upframe为form表单中target的值 -->
        <iframe id="upframe" name="upframe" src="" style="display:none;" role="form">
        </iframe>
    </div>


    <!-- 文字 -->
    <div id="text" class="container">
        <FORM id="textInfo" method="post" action="__URL__/insert" role="form">

            <div class="form-group">
                <label for="InputWechat">微信账号</label>
                <input type="text" name="wechat" class="form-control" id="InputWechat" placeholder="输入微信账号" onchange="isNull(this)">
            </div>


            <div class="form-group">

                <label for="s1">你在哪个地方？</label>
                <select name="country" class="sr-only form-control" id="s1">
                    <option>国家</option>
                </select>
                <label for="s2" class="sr-only"></label>
                <select name="prov" class="form-control" id="s2" onchange="getSelectValue(this)">
                    <option>省份</option>
                </select>
                <label for="s3" class="sr-only"></label>
                <select name="city" class="form-control" id="s3" onchange="getSelectValue(this)">
                    <option>地级市</option>
                </select>
            </div>
            <div>
                <input id="loc" type="hidden" name="location" value="" onchange="">
            </div>

            <div class="form-group">
                <label for="InputAge">芳龄几何？</label>
                <input type="text" name="age" class="form-control" id="InputAge" placeholder="输入年龄" onchange="isNumber(this);isNull(this)">
            </div>
            <!-- radio -->
            <div class="form-group">
                <label style="display: block;">你是（0，0.5，1）？</label>

                <div class="radio-inline">
                    <label>
                        <input type="radio" name="attribute" id="attribute1" value="0" checked>0
                    </label>
                </div>
                <div class="radio-inline">
                    <label>
                        <input type="radio" name="attribute" id="attribute2" value="0.5">0.5
                    </label>
                </div>
                <div class="radio-inline">
                    <label>
                        <input type="radio" name="attribute" id="attribute3" value="1">1
                    </label>
                </div>
            </div>
            <!-- end radio -->






            <div class="form-group">
                <label for="Inputq1">q1</label>
                <TEXTAREA name="q1" class="form-control" id="Inputq1" onchange="isNull(this)"></TEXTAREA>

            </div>
            <div class="form-group">
                <label for="Inputq2">q1</label>
                <TEXTAREA name="q2" class="form-control" id="Inputq2" onchange="isNull(this)"></TEXTAREA>

            </div>
            <div class="form-group">
                <label for="Inputq3">q3</label>
                <TEXTAREA name="q3" class="form-control" id="Inputq3" onchange="isNull(this)"></TEXTAREA>

            </div>
            <div class="form-group">
                <label for="Inputq4">q4</label>
                <TEXTAREA name="q4" class="form-control" id="Inputq4" onchange="isNull(this)"></TEXTAREA>

            </div>
            <div class="form-group">
                <label for="Inputq5">q5</label>
                <TEXTAREA name="q5" class="form-control" id="Inputq5" onchange="isNull(this)"></TEXTAREA>

            </div>
            <div class="form-group">
                <label for="Inputq6">q6</label>
                <TEXTAREA name="q6" class="form-control" id="Inputq6" onchange="isNull(this)"></TEXTAREA>

            </div>
            <div class="form-group">
                <label for="Inputq7">q7</label>
                <TEXTAREA name="q7" class="form-control" id="Inputq7" onchange="isNull(this)"></TEXTAREA>

            </div>
            <div class="form-group">
                <label for="Inputq8">q8</label>
                <TEXTAREA name="q8" class="form-control" id="Inputq8" onchange="isNull(this)"></TEXTAREA>

            </div>

            <div>
                <INPUT id="picUrl" type="hidden" name="picurl" value="" onchange="getImgUrl();isNull(this);" />
                <INPUT type="hidden" name="openid" value="<?php echo $_GET['openid'];?>" />
            </div>

            <hr></hr>
            <div class="col-xs-12">
                <button type="submit" class="btn btn-primary form-control btn-lg">提交</button>
            </div>
        </FORM>
    </div>
    <DIV class="footer">
        <br></br>
    </DIV>
    <style type="text/css">
    texearea {
        resize: none;
    }
    </style>
</body>

</html>