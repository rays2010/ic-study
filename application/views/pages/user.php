<?php 
	$this->load->view('templates/header');

	echo anchor('/', '首页');
	echo '<br>';
	echo '<br>';
	echo $user['nickname'].'的个人主页';
	echo ' ';
	echo '(关注他)';
	echo ' ';
	echo '(私信)';

	echo '<br>';
	echo '<br>';
	echo '文章列表：';
	echo '<br>';

	foreach ($item as $k => $v) {
		echo anchor('/item/'.$v->iid, $v->text);
		echo ' - ';
		if($is_owner){
			echo anchor('/item/edit/'.$v->iid, '(修改)');
		}
		echo '<br>';
	}

	echo '<br>';
	echo '<br>';
	echo '粉丝列表：';
	echo '<br>';
	echo '<br>';

	echo '<br>';
	echo '<br>';
	echo '关注列表：';
	echo '<br>';
	echo '<br>';

	$this->load->view('templates/footer');
?>