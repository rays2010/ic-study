<?php

	$this->load->view('templates/header');

	echo form_open('login');
	echo form_input(array('name' => 'mail', 'placeholder'=> '邮箱地址'));
	echo '<br>';
	echo form_password(array('name' => 'pw', 'placeholder' => '密码'));
	echo '<br>';
	echo form_submit(array('value' => '登录')); 
	echo '<br>';
	echo form_close();

	$this->load->view('templates/footer');
?>