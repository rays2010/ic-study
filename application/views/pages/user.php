<?php 
	$this->load->view('templates/header');

	echo anchor('/', '首页');
	echo '<br>';
	echo '<br>';
	echo $user['nickname'].'的个人主页';
	echo ' ';
	echo ' ';
	if(!$is_owner){
		echo '（'.anchor('/letter/'.$user['uid'], '私信').'）';
	} else {
		echo '（'.anchor('/letter/', '私信列表').'）';
	}

	echo '<br>';
	echo '<br>';
	echo '文章列表：';
	echo '<br>';

	foreach ($item as $k => $v) {
		echo anchor('/item/'.$v->iid, $v->text);
		echo ' - ';
		if($is_owner){
			echo anchor('/item/edit/'.$v->iid, '(修改)');
			echo anchor('/item/del/'.$v->iid, '(删除)');
		}
		echo '<br>';
	}

	$this->load->view('templates/footer');
?>