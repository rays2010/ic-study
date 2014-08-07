<?php 
	$this->load->view('templates/header');

	if($page['name'] == 'index'){
		
?>

<div id="content">

	<?php foreach ($topics as $k => $v) { ?>
	<div class="item_topic">
		<div class="panel">
			<div class="cover">
				<?php echo img(image($v['t_cover'], '300')); ?>
			</div>
			<div class="wrap">
				<h2>话题：<?php echo anchor('topic/'.$v['tid'], $v['t_title']); ?> </h2>
				<div class="text">
					<?php echo $v['t_excerpt']; ?>
				</div>
				<div class="act">
					<a href=""><?php echo $v['nickname']; ?></a> <span class="time">发起于<?php echo $v['t_created']; ?></span>
					<a href="" class="fr">参与话题</a>
					<span class="fr mr10">10人已参与</span>
				</div>
			</div>
		</div>
	</div>
	<?php } ?>
</div>

<div id="side">
	<div class="cell add">
		<a href="topic/create">创建话题</a>
	</div>
</div>
		
<?php } else if($page['name'] == 'single'){ ?>
	
		<div id="content">
			<?php foreach ($items as $k => $v) { ?>
				<div class="item">
				<?php echo anchor('/user/'.$v['uid'], img(image($v['avatar'], 'square')), array('class'=>'avatar')); ?>
				<div class="panel">
					<div class="meta">
						<?php echo anchor('/user/'.$v['uid'], $v['nickname'], array('class'=>'nickname mr5')); ?>
						<span class="time">
						<?php echo anchor('/item/'. $v['iid'], $v['created']); ?>
						</span>
					</div>
					<?php if(!empty($v['cover'])){ ?>
					<div class="cover">
						<img src="<?php echo image($v['cover'], 'square'); ?>" alt="">
					</div>
					<?php } ?>
					<div class="text">
						<?php echo nl2br($v['text']); ?>
					</div>
					<div class="act">
						<?php 
							if($v['isUp'] == 1){
								echo anchor('/item/unup/'. $v['iid'], '已赞', array('class'=>'fr')); 
							} else {
								echo anchor('/item/up/'. $v['iid'], '赞', array('class'=>'fr')); 
							}
							if($v['praise_count']>0){
								echo '<span class="fr">（'.$v['praise_count'].'人赞过）</span>';
							}
						?>
						<?php echo anchor('/letter/'.$v['uid'], '聊天' , array('class'=>'fr mr15')); ?>
					</div>
				</div>
		</div>
			<?php } ?>
		</div>

		<div id="side">
			<div class="cell add">
				<?php echo anchor('/topic/add/'.$topic['tid'], '添加内容') ?>
			</div>
			<div class="topic">
				<?php echo img(image($topic['t_cover'], '300')); ?>
				<h2>话题：<?php echo $topic['t_title']; ?></h2>
				<p><?php echo $topic['t_excerpt']; ?></p>
			</div>
		</div>

<?php 
	} else if($page['name'] == 'add'){ 

	echo '<div id="content">';
	echo '<div id="add_post">';
	$this->load->view('templates/editor', array(
		'path'=>'topic/add/'.$topic['tid'],
		'parent' => $topic['tid'],
	));
	echo '</div>';
	echo '</div>';
?>

	<div id="side">
		<div class="cell add">
			<?php echo anchor('/topic/'.$topic['tid'], '返回话题') ?>
		</div>
		<div class="topic">
			<?php echo img(image($topic['t_cover'], '300')); ?>
			<h2>话题：<?php echo $topic['t_title']; ?></h2>
			<p><?php echo $topic['t_excerpt']; ?></p>
		</div>
	</div>
<?php
	} else if($page['name'] == 'create'){

		echo '<div id="content">';
		echo '<div id="add_post">';
		echo '<h2>投稿一个话题</h2>';

		// 显示封面
		if(isset($upload['url'])){
			echo img(image($upload['url'], '300'));
		} else if(isset($upload['msg'])){
			echo '<span style="color:#fff;">'.$upload['msg'].'</span>';
		}

		// 提示
		if($msg) echo '<span style="color:white;">'.$msg.'</span>';

		/*配图*/
		echo form_open_multipart('topic/create');
		echo '<input type="file" name="userfile" size="20" />';
		echo form_submit(array('value'=>'上传'));
		echo form_hidden('folder', 'img');
		echo form_close();
		/*end*/

		echo form_open('topic/create');
		echo form_input(array('name'=>'title', 'placeholder'=>'标题...', 'class'=>'title'));
		echo form_textarea(array('name'=>'text', 'placeholder'=>'输入话题...'));
		if(isset($upload['url'])){
			echo form_hidden('cover', $upload['url']);
		}
		echo form_submit(array('value'=>'发布', 'class'=>'submit'));
		echo form_close();
		echo '</div>';
		echo '</div>';

		echo '<div id="side"><div class="cell desc">投稿说明</div></div>';
	} else if($page['name'] == 'in'){
		echo 'a';
	}

	$this->load->view('templates/footer');
?>