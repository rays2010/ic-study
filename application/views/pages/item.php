<?php 
	$this->load->view('templates/header');

	if($page == 'index'){
		$nickname = $this->users->get_nickname($item['author_id']);
		echo anchor('/', '首页');
		echo '<br>';
		echo anchor('/user/'.$item['author_id'], $nickname.'的个人主页');
		echo '<br>';
		echo $item['text'];
		echo '<br>';
		echo '作者：'.$nickname;
		echo '<br>';
		echo $item['created'];
		echo '<br>';
		echo $item['status'];
		echo '<br>';
		echo '评论数'.$item['comment_count'];
	} else if($page == 'add'){
		echo anchor('/', '首页');
		echo form_open('item/add');
		echo form_textarea(array('name'=>'text', 'placeholder'=>'输入话题...'));
		echo '<br>';
		echo form_submit(array('value'=>'添加'));
		echo form_close();
	} else if($page == 'edit'){
		echo anchor('/', '首页');
		echo form_open('item/edit');
		echo form_textarea(array('name'=>'title', 'placeholder'=>'输入话题...', 'value'=> $item['title']));
		echo form_hidden('iid', $item['iid']);
		echo '<br>';
		echo form_submit(array('value'=>'更新'));
		echo form_close();
	}

	$this->load->view('templates/footer');
?>