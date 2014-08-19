<?php include_once"TransmitHelper.php"?>

<?php

/***waiting for test*/

class EventHandler{
	//Don't declare var out of function

	public function subscribeReciever($postObj){
        $flag = 0;
        $contentStr = "";
		
		$textTpl = "<xml>
<ToUserName><![CDATA[%s]]></ToUserName>
<FromUserName><![CDATA[%s]]></FromUserName>
<CreateTime>%s</CreateTime>
<MsgType><![CDATA[text]]></MsgType>
<Content><![CDATA[%s]]></Content>
<FuncFlag>%d</FuncFlag>
</xml>";
        
        $contentStr = <<<welcome
				"欢迎关注，圈子乱，我不乱，官方微信公众账号
				微信号：ourworlddddd
				希望我们都可以找到那份纯净
				回复下列数字进入相应功能
				1.注册你的信息
				2.查看别的人
				3.看看有没有人喜欢你
				需要主菜单请随时回复“主页君”哦。
welcome;
		

				break;
		
		$resultStr = sprintf($textTpl, $postObj->FromUserName, $postObj->ToUserName, time(), $contentStr, $flag);

		return $resultStr;

    }

    public function unsubscribeReciever($postObj)
    {	
        $unsubscribe = "unsubscribe";
        writeLog($unsubscribe);
    	//out log
    }

}

?>