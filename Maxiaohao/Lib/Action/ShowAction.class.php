<?php
class ShowAction extends Action
{
	public function show($id = 0){
		$User = M('User');
        $Question = M('Question');
		// 读取数据
        $data1 = array();
        $data2 = array();
		if ($id === 0) {
        	$data1 = $User->order('rand()')->find();
        }else {
        	$data1 = $User -> where("uid='$id'") -> find();
        }

        $uid = $data1['uid'];
		$data2 = $Question->where("uid='$uid'")->find();
        
		if($data1&&$data2) {
		$this->user = $data1;// 模板变量赋值
		$this->question = $data2;
		$this->display();
		}else{
		$this->error('数据错误');
    	}
	}


	public function my_fav()
	{
		$Tempuser = D('Tempuser');
		$User = D('User');
		

		if ($Tempuser->create()&&$User->create()) {
			$openid = $Tempuser->openid;
			$condition = "openid='$openid'";
			if(($Tempuser->where($condition)->find() == null)&&($User->where($condition)->find() == null))
			{

				$this->ajaxReturn('ok','notexsit',0);
			}else {
				
				$this->ajaxReturn('dontneed','dontneed',1);
			}
		}else{
		
		$this->error('查询错误！');
		}
	}
	

	public function newWechat()
	{
		
		$Tempuser = M('Tempuser');
		
		if($Tempuser->create()) {
            //基本信息表
			
			$result = $Tempuser->add();

		if($result) {
			$this->ajaxReturn($result,"temp_user_id",1);
		}else{
		
		$this->error('写入错误！');
	}
	}else{
	$this->error($Tempuser->getError());
	}
	}



}

?>