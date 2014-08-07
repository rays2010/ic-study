<?php 

	// 显示封面
	if(isset($upload['url'])){
		echo img(image($upload['url'], 'square'));
	} else if(isset($upload['msg'])){
		echo '<span style="color:#fff;">'.$upload['msg'].'</span>';
	}

	// 提示
	if(isset($msg)) echo '<span style="color:white;">'.$msg.'</span>';

	/*配图*/
	echo form_open_multipart($path);
	echo '<input type="file" name="userfile" size="20" />';
	echo form_submit(array('value'=>'上传'));
	echo form_hidden('folder', 'img');
	echo form_close();
	/*end*/

	echo form_open($path);
	echo '<ul class="attach"><li><a href="">添加图片</a></li><li><a href="">添加音乐</a></li></ul>';
	echo form_textarea(array('name'=>'text', 'placeholder'=>'输入想说的话...'));
	if(isset($upload['url'])){
		echo form_hidden('cover', $upload['url']);
	}
	if(isset($parent)){
		echo form_hidden('parent', $parent);
	}
	echo '<div class="clearfix">';
	echo form_submit(array('value'=>'发布', 'class'=>'submit'));
	echo '</div>';
	echo form_close();

?>