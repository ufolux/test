<?php
/**
* 
*/
define(UPLOAD, './Public/Upload/'.$_POST['openid'].'/');
define(OPENID,$_POST['openid']);

class FormAction extends Action
{

    
	public function insert(){
		$User = D('User');
		$Question = D('Question');
		if($User->create()&&$Question->create()) {
            //基本信息表
			$data1 = array();
            $data1['picurl'] = $User->picurl;
			$data1['wechat'] = $User->wechat;
			$data1['openid'] = $User->openid;
			$data1['location'] = $User->location;
			$data1['attribute'] = $User->attribute;
			$data1['age'] = $User->age;
			$id = $User->add($data1);
            //问题表
			$data2 = array();
			$data2['uid'] = $id;
			$data2['q1'] = $Question->q1;
			$data2['q2'] = $Question->q2;
			$data2['q3'] = $Question->q3;
			$data2['q4'] = $Question->q4;
			$data2['q5'] = $Question->q5;
			$data2['q6'] = $Question->q6;
			$data2['q7'] = $Question->q7;
			$data2['q8'] = $Question->q8;

			$result = $Question->add($data2);

		

		if($result) {
		$this->success('操作成功！');
		}else{
		$this->error('写入错误！');
	}
	}else{
	$this->error($User->getError());
	}
	}



	public function edit($id=0){
		$Form = M('Form');
		$this->vo = $Form->find($id);
		$this->display();
		}
	public function update(){
		$Form = D('Form');
        if($Form->create()) {
        $result = $Form->save();
        if($result) {
        $this->success('操作成功！');
        }else{
        $this->error('写入错误！');
        }
        }else{
        $this->error($Form->getError());
        }
        }

    // public function login(){  
        

    //     $Dao=M('User');  
        
    //     $picurl=$Dao->where("openid='$_POST[openid]'")->getField('picurl');  
    //     $this->assign('filelist',$picurl);  
    //     $this->display();     
    // }      
     
    function upload(){  
        //文件上传地址提交给他，并且上传完成之后返回一个信息，让其写入数据库     
        if(empty($_FILES)){  
            $this->error('必须选择上传文件');     
        }else{
            $epicurl = $_POST['epicurl'];
            if ($this->delDirAndFile($epicurl)) {
                $a=$this->up();  
                $picname = OPENID.'/m_'.$a[0]['savename'];
                if(isset($a)){  
                //写入数据库的自定义c方法  
                echo '<body onload="showPic();">
                <script type="text/javascript">
                function showPic()
                {parent.show("'.$picname.'");}
                </script>
                </body>';   
                // $this->success('上传成功');     
                }else{  
                $this-error('上传文件异常，请与系统管理员联系');     
            } 
            }else{
                
            }
            
             
        }  
    }  
     

 private function delDirAndFile($path, $delDir = true) {
    if (is_array($path)) {
        foreach ($path as $subPath)
            delDirAndFile($subPath, $delDir);
    }
    if (is_dir($path)) {
        $handle = opendir($path);
        if ($handle) {
            while (false !== ( $item = readdir($handle) )) {
                if ($item != "." && $item != "..")
                    is_dir("$path/$item") ? delDirAndFile("$path/$item", $delDir) : unlink("$path/$item");
            }
            closedir($handle);
            if ($delDir)
                return rmdir($path);
        }
    } else {
        if (file_exists($path)) {
            return unlink($path);
        } else {
            return FALSE;
        }
    }
    clearstatcache();
 }


     
    private function up(){  
        //完成与thinkphp相关的，文件上传类的调用     
        import('@.ORG.UploadFile');//将上传类UploadFile.class.php拷到Lib/Org文件夹下  
        $upload=new UploadFile();  
        $upload->maxSize='512000';//默认为-1，不限制上传大小  
        $upload->savePath= UPLOAD;//保存路径建议与主文件平级目录或者平级目录的子目录来保存     
        $upload->saveRule=uniqid;//上传文件的文件名保存规则  
        $upload->uploadReplace=true;//如果存在同名文件是否进行覆盖  
        $upload->allowExts=array('jpg','jpeg','gif');//准许上传的文件类型  
        $upload->allowTypes=array('image/jpg','image/jpeg','image/gif');//检测mime类型  
        $upload->thumb=true;//是否开启图片文件缩略图  
        $upload->thumbMaxWidth='500';  
        $upload->thumbMaxHeight='200';  
        $upload->thumbPrefix='m_';//缩略图文件前缀  
        $upload->thumbRemoveOrigin=1;//如果生成缩略图，是否删除原图  
         
        if($upload->upload()){  
            $info=$upload->getUploadFileInfo();  
            return $info;  
        }else{  
            $this->error($upload->getErrorMsg());//专门用来获取上传的错误信息的     
        }     
    }  
     

}

?>