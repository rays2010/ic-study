<?php 
	$this->load->view('templates/header');

	// echo anchor('/', '首页');
	// echo '<br>';
	// echo '<br>';
	// echo $user['nickname'].'的个人主页';
	// echo ' ';
	// echo ' ';
	// if(!$is_owner){
	// 	echo '（'.anchor('/letter/'.$user['uid'], '私信').'）';
	// } else {
	// 	echo '（'.anchor('/letter/', '私信列表').'）';
	// }
?>

<div id="content">
	<?php 
	foreach ($item as $k => $v) { ?>

	<div class="item">
		<?php echo anchor('/user/'.$v['uid'], img(image($v['avatar'], 'square')), array('class'=>'avatar')); ?>
		<div class="panel">
			<div class="meta">
				<?php echo anchor('/user/'.$v['uid'], $v['nickname'], array('class'=>'nickname mr5')); ?>
				<span class="time">
				<?php echo anchor('/item/'. $v['iid'], $v['created']); ?>
				</span>
				<?php
					if($page['is_master']){
						echo anchor('/item/del/'.$v['iid'], '删除', array('class'=>'fr'));
					}
				?>
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
				<?php if(!empty($v['t_title'])){ ?>
				<span>来自话题：</span><a href=""><?php echo $v['t_title']; ?></a>
				<?php } ?>
				<a href="" class="fr">赞（1）</a>
				<?php echo anchor('/letter/'.$v['uid'], '聊天' , array('class'=>'fr mr15')); ?>
			</div>
		</div>
	</div>
	<?php } ?>

</div>

<div id="side">
	<div class="cell card clearfix">
		<?php echo img(image($user['avatar'], 'square')); ?>
		<h2><?php echo $user['nickname']; ?></h2>
		<span>现居：<?php echo $user['location']; ?></span>
		<?php if(!$page['is_master']){ ?>
		<a href="" class="mail">私信</a>
		<?php } ?>
	</div>
	<div class="cell">
		发表文章（33）
	</div>
	<div class="cell">
		参与话题（2）
	</div>
	<div class="cell">
		发起话题（1）
	</div>
</div>

<?php
	$this->load->view('templates/footer');
?>