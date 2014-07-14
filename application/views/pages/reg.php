<?php 
	$this->load->helper('form');
	echo form_open('reg/create');
?>
	<input type="text" name="mail" value="" placeholder="邮箱地址">
	<input type="text" name="nickname" value="" placeholder="昵称">
	<input type="text" name="pw" value="" placeholder="密码">
	<input type="submit" name="" value="注册">
</form>