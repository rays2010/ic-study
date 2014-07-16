<?php

	$this->load->view('templates/header');


	if($page == 'list'){

		echo anchor('/user/'.$id, '个人主页');
		echo '<br><br>';
		foreach ($list as $k => $v) {
			$id = $v['receiver_id'];
			$nickname = $this->users->get_nickname($id);
			echo '--- 与用户'.anchor('/letter/'.$id, $nickname ).'的对话';
			echo '<br>';
			echo '（1条未读）';
			echo '<br><br>';
		}

	} else if($page == 'sendto'){

		

		echo anchor('/letter', '返回').'<br><br>';

		echo '私信给'.$nickname;
		echo form_open('letter/send/'.$id);
		echo form_textarea(array('name' => 'text', 'placeholder'=> '随便写点...'));
		echo '<br>';
		echo form_submit(array('value' => '发过去')); 
		echo '<br>';
		echo form_close();

		$msg = unserialize($list['content']);
		$msg = array_sort($msg, 'created', 'desc');
		foreach ($msg as $k => $v) {
			echo $k.' - ';
			echo $this->users->get_nickname(($v['author_id'])).'说：';
			echo '<br>';
			echo $v['text'];
			echo '<br> at:'.$v['created'];
			echo '<br><br>';
		}
	}

	$this->load->view('templates/footer');
?>