<?php 
	
	 /**
     * create dir by path
     *
     * @access  public
     * @param   string
     * @param   string
     * @return  boolean
     */
	
	function createdir($path,$mode=0777){
		if (!is_dir($path)){  //判断目录存在否，存在不创建
		   $re=mkdir($path,$mode,true); //第三个参数为true即可以创建多极目录
	       if ($re){
	       		return true;
	       } else {
	            return false;
	       }
		}
    }
    // $path="/aa/bb/cc/cd"; //要创建的目录
    // $mode=0755; //创建目录的模式
    // createdir($path,$mode);//测试

    function mkdirs($dir)  
	{  
	if(!is_dir($dir))  
	{  
	if(!mkdirs(dirname($dir))){  
	return false;  
	}  
	if(!mkdir($dir,0777)){  
	return false;  
	}  
	}  
	return true;  
	}  

?>