<?php 
	$this->load->view('templates/header');

	if($page['name'] == 'index'){
		$nickname = $this->users->get_nickname($item['author_id']);
		echo anchor('/', '首页');

		echo '<br>';
		echo anchor('/user/'.$item['author_id'], $nickname.'的个人主页');
		echo '<br>';
		echo $item['text'];
		if($item['author_id'] == $my['uid']){
			echo anchor('/item/edit/'.$item['iid'], '编辑');
		}
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

			if(!empty($v['child'])){
				foreach ($v['child'] as $kk => $vv) {
					$nickname2 = $this->users->get_nickname($vv['author_id']);
					echo $vv['content'];
					echo 'by:'.anchor('/user/'.$vv['author_id'] , $nickname2);
					echo '<br>';
					echo 'at:'.$vv['created'];
					echo '<br>';
					echo '<br>';
				}
			}
		}

		echo form_open('comment/add/'.$item['iid']);
		echo form_textarea(array('name'=>'text', 'placeholder'=>'输入想说的话...', 'value'=> ''));
		echo form_hidden('iid', $item['iid']);
		echo '<br>';
		echo form_submit(array('value'=>'评论'));
		echo form_close();
	} else if($page['name'] == 'add'){
		echo '<div id="content">';
		echo '<div id="add_post">';
		echo '<h2>添加文章</h2>';
		$this->load->view('templates/editor', array('path'=>'item/add'));
		echo '</div>';
		echo '</div>';

		echo '<div id="side"><div class="cell desc">投稿说明</div></div>';
		
	} else if($page['name'] == 'edit'){
		echo anchor('/', '首页');
		echo form_open('item/edit/'.$item['iid']);
		echo form_textarea(array('name'=>'title', 'placeholder'=>'输入想说的话...', 'value'=> $item['title']));
		echo '<br>';
		echo form_submit(array('value'=>'更新'));
		echo form_close();
	}

	$this->load->view('templates/footer');
?>