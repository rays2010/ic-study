<?php 

	$this->load->view('templates/header');

	if($user['logged_in']){
		echo $user['nickname'].'('.$user['mail'].')'.'已登录';
		echo '<br>';
		echo anchor('/user/'.$user['uid'], '个人主页');
		echo '<br>';
		echo anchor('/item/add', '添加文章');
		echo '<br>';
		echo anchor('/topic/add', '添加话题');
		echo '<br>';
		echo anchor('/logout', '退出', array('title'=>'退出'));
	} else {
		echo anchor('/reg', '注册', array('title'=>'注册'));
		echo anchor('/login', '登录', array('title'=>'登录'));
	}


	echo '<br><br>';
	echo '本周话题：';
	echo '<br><br>';
	echo anchor('/topic/'. $topic['tid'], $topic['title']);

	echo '<br><br>';
	echo '最新文章：';
	echo '<br><br>';

	foreach ($item as $k => $v) {
		echo anchor('/item/'. $v['iid'], $v['text']);
		echo 'by:'.anchor('/user/'.$v['author_id'] , $this->users->get_nickname($v['author_id']));
		echo '<br>';
		echo '<br>';
	}

	$this->load->view('templates/footer');

?>