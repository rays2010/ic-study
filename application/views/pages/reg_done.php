<?php 
	
	$this->load->helper('url');

	echo anchor('/reg', '返回');
	echo anchor('/', '主页');

	print_r($error);
	
?>