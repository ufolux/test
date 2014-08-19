<?php include_once"TransmitHelper.php"?>
<?php include_once"Wechat/Config/config.php"?>
<?php

class TextHandler{
public function Rev($postObj)
{
	$funcFlag = 0;
        $keyword = trim($postObj->Content);
        $resultStr = "";
        $contentStr = "";
        $fromUserName = $postObj->FromUserName;
        $isUserExsit = flase;
        $transmitHelper = new TransmitHelper();
        

        
        //login
        if($keyword == "主页君")
        {
            $contentStr = <<<welcome
"欢迎关注，圈子乱，我不乱，官方微信公众账号
微信号：ourworlddddd
希望我们都可以找到那份纯净
回复下列数字进入相应功能
1.我也要参加
2.查看“今日之星”
需要主菜单请随时回复“主页君”哦。
高级查看请输入“xx-xx岁的0/0.5/1”
welcome;
            $resultStr = $transmitHelper->transmitText($postObj, $contentStr, $funcFlag);

        }elseif ($keyword == "1"){
            
            if($isUserExsit)
            {
                $contentStr = "亲，注册了就别再注册了。";
                $resultStr = $transmitHelper->transmitText($postObj, $contentStr, $funcFlag);

            }
            else{
                // $dbhelper->Excute($sqlInsertStr);
                $contentStr = "<a href=\"".LOGIN."?OpenID=".$fromUserName."\">在此提交你的资料</a>";
                $resultStr = $transmitHelper->transmitText($postObj, $contentStr, $funcFlag);
            }
            
            
            //return a man
        }else if ($keyword == "2"){
            $explore = new Explore();
            $content = $explore->getRandInfo();
            $dateArray = array();
            $dateArray[] = array("Title"=>$content['id'], 
                                "Description"=>$content['Description'], 
         /*img url*/            "Picurl"=>$loadImagesByGroupName($content['Img']),///
         /*user page*/          "Url" =>"quanzibuluan.sinaapp.com/template/shower.php?OpenID=".$content['OpenID']);
            $resultStr = $transmitHelper->transmitNews($postObj, $dateArray, $funcFlag);

            //return man who love the viewer
        }else if ($keyword == "3"){
            $dateArray = array();
            $dateArray[] = array("Title"=>"多图文1标题", "Description"=>"", "Picurl"=>"http://discuz.comli.com/weixin/weather/icon/cartoon.jpg", "Url" =>"http://m.cnblogs.com/?u=txw1958");
            $dateArray[] = array("Title"=>"多图文2标题", "Description"=>"", "Picurl"=>"http://dd.hiphotos.bdimg.com/wisegame/pic/item/f3529822720e0cf3ac9f1ada0846f21fbe09aaa3.jpg", "Url" =>"http://m.cnblogs.com/?u=txw1958");
            $dateArray[] = array("Title"=>"多图文3标题", "Description"=>"", "Picurl"=>"http://g.hiphotos.bdimg.com/wisegame/pic/item/18cb0a46f21fbe090d338acc6a600c338644adfd.jpg", "Url" =>"http://m.cnblogs.com/?u=txw1958");
            $dateArray[] = array("Title"=>"多图文4标题", "Description"=>"", "Picurl"=>"http://g.hiphotos.bdimg.com/wisegame/pic/item/18cb0a46f21fbe090d338acc6a600c338644adfd.jpg", "Url" =>"http://m.cnblogs.com/?u=txw1958");
            $dateArray[] = array("Title"=>"多图文5标题", "Description"=>"", "Picurl"=>"http://g.hiphotos.bdimg.com/wisegame/pic/item/18cb0a46f21fbe090d338acc6a600c338644adfd.jpg", "Url" =>"http://m.cnblogs.com/?u=txw1958");
            $dateArray[] = array("Title"=>"多图文6标题", "Description"=>"", "Picurl"=>"http://g.hiphotos.bdimg.com/wisegame/pic/item/18cb0a46f21fbe090d338acc6a600c338644adfd.jpg", "Url" =>"http://m.cnblogs.com/?u=txw1958");

            $resultStr = $transmitHelper->transmitNews($postObj, $dateArray, $funcFlag);
        
        //default reply
        }else{
             $contentStr = <<<welcome
"欢迎关注，圈子乱，我不乱，官方微信公众账号
微信号：ourworlddddd
希望我们都可以找到那份纯净
回复下列数字进入相应功能
1.我也要参加
2.查看“今日之星”
需要主菜单请随时回复“主页君”哦。
高级查看请输入“xx-xx岁的0/0.5/1”
welcome;
            $resultStr = $transmitHelper->transmitText($postObj, $contentStr, $funcFlag);


        }
        return $resultStr;
        }

        private function isUserExsit($openid)
        {
            
        }





}
?>
