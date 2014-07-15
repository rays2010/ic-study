<?php 
	$this->load->view('templates/header');

	if($page == 'index'){
		echo anchor('/','首页');
		echo '<br>';
		echo anchor('topic/add', '添加话题');
		echo '<br>';
		echo '<br>';
		echo '话题列表页：';
		echo '<br>';
		echo '<br>';

		foreach ($topics as $k => $v) {
			echo anchor('topic/'.$v['tid'], $v['title']);
			echo '<br>';
		}
		
	} else if($page == 'single'){
		echo anchor('/topic','全部话题');
		echo '<br>';
		echo $topic['title'];
		echo '<br>';
		echo $topic['cover'];

	} else if($page == 'add'){
		echo anchor('topic', '返回');
		echo '<br>';
		echo '添加一个话题';
		echo form_open('topic/add');
		echo form_textarea(array('name'=>'text', 'placeholder'=>'输入话题...'));
		echo '<br>';
		echo form_submit(array('value'=>'添加'));
		echo form_close();
	}

	$this->load->view('templates/footer');
?>