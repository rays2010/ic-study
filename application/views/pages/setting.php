<?php

	$this->load->view('templates/header');

?>

<div id="content">

<div id="setting">
<?php
	if($page['name'] == 'profile'){

		echo form_open('setting/profile');
		echo '<h3>修改资料</h3>';
		echo '<p>';
		echo form_label('邮箱', 'mail');
		echo form_input(array('name' => 'mail', 'placeholder'=> '邮箱地址', 'value' => $my['mail'], 'disabled' => 'disabled'));
		echo '</p> <p>';
		echo form_label('昵称', 'nickname');
		echo form_input(array('name' => 'nickname', 'placeholder' => '昵称', 'value' => $my['nickname']));
		echo '</p> <p>';
		echo form_label('居住地', 'location');
		echo form_input(array('name' => 'location', 'placeholder' => '居住地', 'value' => $my['location']));
		echo '</p> <p>';
		echo form_label('', '');
		echo form_submit(array('value' => '保存修改', 'class'=>'confirm')); 
		echo '</p>';
		echo form_close();
	} else if ($page['name'] == 'avatar') {

		echo form_open_multipart('setting/avatar');
		echo '<h3>修改头像</h3>';
		echo '<p>';
		echo form_label('当前头像', '');
		if(!empty($page['img_url'])){
			echo img(image($page['img_url'], 'square'));
		} else {
			echo img(image($my['avatar'], 'square'));
		}
		echo $data['error'];
		echo '<input type="file" name="userfile" size="20" />';
		echo '</p> <p>';
		echo form_label('', '');
		echo $page['error'];
		echo '</p> <p>';
		echo form_label('', '');
		echo form_submit(array('value' => '上传', 'class'=>'confirm')); 
		echo '</p>';
		echo form_close();

	} else if ($page['name'] == 'pw'){
		echo form_open('setting/pw');
		echo '<h3>修改密码</h3>';
		echo '<p>';
		echo form_label('旧密码', 'old_pw');
		echo form_password(array('name' => 'old_pw', 'placeholder' => '旧密码'));
		echo '</p> <p>';
		echo form_label('新密码', 'new_pw');
		echo form_password(array('name' => 'new_pw', 'placeholder' => '新密码'));
		echo '</p> <p>';
		echo form_label('', '');
		echo form_submit(array('value' => '保存修改', 'class'=>'confirm')); 
		echo '</p>';
		echo form_close();
	}
?>
</div>
</div>

<div id="side">
	<div class="cell">
		<a href="/setting">个人资料</a>
	</div>
	<div class="cell">
		<a href="/setting/avatar">修改头像</a>
	</div>
	<div class="cell">
		<a href="/setting/pw">修改密码</a>
	</div>
</div>

<?php
	$this->load->view('templates/footer');
?>