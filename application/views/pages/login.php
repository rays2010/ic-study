<?php 

	$this->load->helper('form');
	echo form_open('login');
?>
	<input type="text" name="mail" value="" placeholder="邮箱地址">
	<input type="text" name="pw" value="" placeholder="密码">
	<input type="submit" name="" value="登录">
<?php 
	echo form_close();
?>