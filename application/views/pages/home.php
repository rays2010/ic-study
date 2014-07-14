<?php 
	$this->load->helper('url');
	
	echo anchor('/reg', '注册', array('title'=>'注册'));
	echo anchor('/login', '登录', array('title'=>'登录'));
?>