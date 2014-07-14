<?php 
	// 载入库
	$this->load->helper('url');
	
	if($user['logged_in']){
		echo $user['nickname'].'('.$user['mail'].')'.'已登录';
		echo anchor('/logout', '退出', array('title'=>'退出'));
	} else {
		echo anchor('/reg', '注册', array('title'=>'注册'));
		echo anchor('/login', '登录', array('title'=>'登录'));
	}

?>