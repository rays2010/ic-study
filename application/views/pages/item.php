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
		echo '<br>';
		echo '<br>';
		echo '评论数'.count($comment);
		echo '<br>';
		echo '<br>';

		foreach ($comment as $k => $v) {
			$nickname = $this->users->get_nickname($v['author_id']);

			if($v['parent_id'] == 0){
				echo $v['content'];
				echo 'by:'.anchor('/user/'.$v['author_id'] , $nickname);
				echo '<br>';
				echo 'at:'.$v['created'];
				echo '<br>';
				echo form_open('comment/reply/'.$v['cid']);
				echo form_input(array('name'=>'text', 'placeholder'=>'回复'.$nickname.'...'));
				echo form_hidden('cid', $v['cid']);
				echo form_hidden('iid', $v['item_id']);
				echo form_submit(array('value'=>'回复'));
				echo form_close();
			} else {
				foreach ($comment as $kk => $vv) {
					if($v['parent_id'] == $vv['cid']){
						echo '<br>';
						echo $v['content'];
						echo '<br>';
					}
				}
			}
		}

		echo form_open('comment/add/'.$item['iid']);
		echo form_textarea(array('name'=>'text', 'placeholder'=>'输入想说的话...', 'value'=> ''));
		echo form_hidden('iid', $item['iid']);
		echo '<br>';
		echo form_submit(array('value'=>'评论'));
		echo form_close();
	} else if($page == 'add'){
		echo anchor('/', '首页');
		echo '<br><br>';
		echo '添加文章：';
		echo form_open('item/add');
		echo form_textarea(array('name'=>'text', 'placeholder'=>'输入想说的话...'));
		echo '<br>';
		echo form_submit(array('value'=>'添加'));
		echo form_close();
	} else if($page == 'edit'){
		echo anchor('/', '首页');
		echo form_open('item/edit');
		echo form_textarea(array('name'=>'title', 'placeholder'=>'输入想说的话...', 'value'=> $item['title']));
		echo form_hidden('iid', $item['iid']);
		echo '<br>';
		echo form_submit(array('value'=>'更新'));
		echo form_close();
	}

	$this->load->view('templates/footer');
?>