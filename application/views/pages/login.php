<?php

	$this->load->view('templates/header');

	echo '<div id="start">';
	echo '<h2>日子过的就像那些不眠的晚上</h2>';

	echo form_open('login', array('class'=>'login clearfix'));
	echo '<div class="fr">没有帐号？<a href="/reg">点击注册</a></div>';
	echo '<h3>登录不眠</h3>';
	echo form_input(array('name' => 'mail', 'placeholder'=> '邮箱地址'));
	echo form_password(array('name' => 'pw', 'placeholder' => '密码'));
	echo form_submit(array('value' => '登录', 'class'=>'confirm fl')); 
	echo '<a href="#" class="mt10 fl ml15">忘记密码</a>';
	echo form_close();

	echo '</div>';

	$this->load->view('templates/footer');
?>