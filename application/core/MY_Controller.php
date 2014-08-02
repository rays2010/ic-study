<?php  

	class MY_Controller extends CI_Controller
	{
	 	function __construct(){
	  		parent::__construct();
	  		// 从session中取得当前用户信息
	    	$this->data['my'] = $this->auth->get_current_user();
	    }
	}

?>