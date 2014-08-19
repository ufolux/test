<?php
define(HOSTNAME, 'maxiaohao.hints.me/test/index.php/');
class WechatAction extends Action {
	public function index() {
		
		/* 加载微信SDK */
		import('@.ORG.wechat');

		$options = array(
		'token'=>'maxiaohao' //填写你设定的key
		);
        
		$weObj = new Wechat($options);
        //$weObj->valid();

		$type = $weObj->getRev()->getRevType();
		
		switch($type) {
			case Wechat::MSGTYPE_TEXT:
				$this -> responseText($weObj);
				break;
			case Wechat::MSGTYPE_EVENT:
			    $this -> responseEvent($weObj);
				break;
		default:
			$this ->defaultRes($weObj);
		}

	}

    private function responseText($weObj)
    {
        $openid = trim($weObj->getRev()->getRevFrom());
    	$content = trim($weObj->getRev()->getRevContent());
        

        if (!(strstr($content,'岁')&&strstr($content, '的')))
        {
            switch ($content) {
            case '1':  
                $result = $this -> memLogin($openid);
                $weObj -> text($result ) -> reply();
                break;
            case '2':
                $result = $this -> showMemInfo($openid);
                $weObj -> text($result ) -> reply();
                break;
            case '主页君':
                $this ->defaultRes($weObj);
                break;
            default:
                $this ->defaultRes($weObj);
                break;
            }
            }else{
                $keywordArr = explode('的',$content);
                if (!count($keywordArr) > 1) {
                    $this->defaultRes($weObj);    
                }else{
                    $age = str_replace('岁','',$keywordArr[0]);
                    $attribute = $keywordArr[1];
                    $condition = array();
                    $condition['age'] = $age;
                    $condition['attribute'] = $attribute;

                    $User = M('User');
                    $userArr = $User->where($condition)->limit(1)->order('rand()')->select();

                    if (count($userArr) == 1) {
                       $newsData = array(
                        "0"=>array(
                            'Title'=>$userArr[0]['uid'],
                            'Description'=>'我'.$userArr[0]['age'].'岁   是'.$userArr[1]['attribute'],
                            'PicUrl'=>'__PUBLIC__/'.$useArr[0]['picurl'],
                            'Url'=>HOSTNAME.'Show/show/id/'.$userArr[0]['uid'].'?openid='.$openid
                        )
                    );
                        $weObj->news($newsData)->reply();
                    }else{
                        $weObj->text("没有符合你的哥哥呢")->reply();
                    }
                 

                

            }
         }
     
     }

    private function responseEvent($weObj)
    {   
        $rev = $weObj -> getRev();
        $key = $rev -> getRevEvent();
        switch ($key) {
            case 'subscribe':
                $this -> defaultRes($weObj);
                break;
            
            case 'unsubscribe':
                exit(0);
                break;
            default:
                $this -> defaultRes($weObj);
        }
        
    }

    private function memLogin($openid)
    {
        $User = M('User');
        $isUserExsited = $User -> where("openid='$openid'") -> select();
        
        
        if (count($isUserExsited) > 0) {
            $result = '亲，注册了就别再注册了';
            return $result;
        }else {
            $result = '<a href="'.HOSTNAME.'Form/login?openid='.$openid.'">点击这里成为今日之星</a>';
            return $result;
        }
    }

    private function showMemInfo($openid)
    {
            $result = '<a href="'.HOSTNAME.'Show/show?openid='.$openid.'">查看今日之星</a>';
            return $result;
    }
    private function defaultRes($weObj)
    {
         $weObj -> text("欢迎关注，圈子乱，我不乱，官方微信公众账号
微信号：ourworlddddd
希望我们都可以找到那份纯净
回复下列数字进入相应功能
1.我也要参加
2.查看“今日之星”
需要主菜单请随时回复“主页君”哦。
高级查看请输入“xx-xx岁的0/0.5/1”") -> reply();
    }


}
?>