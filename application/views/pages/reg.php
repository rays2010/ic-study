<?php 
	$this->load->helper('form');

	// 注册表单
	echo form_open('reg/create');
?>
	<input type="text" name="mail" value="" placeholder="邮箱地址">
	<input type="text" name="nickname" value="" placeholder="昵称">
	<input type="password" name="pw" value="" placeholder="密码">
	<input type="submit" name="" value="注册">
<?php 
	echo form_close();
?>