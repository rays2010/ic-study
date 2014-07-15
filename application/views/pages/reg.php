<?php
	$this->load->view('templates/header');

	if($page == 'index'){
		// 注册表单
		echo form_open('reg/add');
		echo form_input(array('name'=>'mail', 'placeholder'=> '邮箱地址'));
		echo '<br>';
		echo form_input(array('name'=>'nickname', 'placeholder'=> '昵称'));
		echo '<br>';
		echo form_password(array('name'=>'pw', 'placeholder'=> '密码'));
		echo '<br>';
		echo form_submit(array('value'=>'注册'));
		echo form_close();
	} else if($page == 'finish') {
		echo '注册完成';
		echo anchor('/', '返回首页');
	} else if ($page == 'error'){
		echo '注册失败';
		echo '<br>';
		echo '失败原因：'.$error['msg'];
		echo '<br>';
		echo anchor('/reg', '返回注册');
	}
	
	$this->load->view('templates/footer');	
?>