<?php
	$this->load->view('templates/header');

	echo '<div id="start">';
	echo '<h2>日子过的就像那些不眠的晚上</h2>';

	if($page == 'index'){
		// 注册表单
		echo form_open('reg/add', array('class'=>'login clearfix'));
		echo '<div class="fr">已有帐号？<a href="/login">点击登录</a></div>';
		echo '<h3>加入不眠</h3>';
		echo form_input(array('name'=>'mail', 'placeholder'=> '邮箱地址'));
		echo form_input(array('name'=>'nickname', 'placeholder'=> '昵称'));
		echo form_password(array('name'=>'pw', 'placeholder'=> '密码'));
		echo form_submit(array('value'=>'注册', 'class'=>'confirm'));
		echo form_close();
	} else if($page == 'finish') {
		echo '<div class="login clearfix">';
		echo '<h3>注册完成</h3>';
		echo anchor('/', '返回首页');
		echo '</div>';
	} else if ($page == 'error'){
		echo '<div class="login clearfix">';
		echo '<h3>注册失败</p>';
		echo '<p>失败原因：'.$error['msg'].'</p>';
		echo anchor('/reg', '返回注册');
		echo '</div>';
	}

	echo '</div>';
	
	$this->load->view('templates/footer');	
?>