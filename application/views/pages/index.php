<?php 

	$this->load->view('templates/header');

	// if(!empty($topic)){
	// 	echo '<br><br>';
	// 	echo '本周话题：';
	// 	echo '<br><br>';
	// 	echo anchor('/topic/'. $topic['tid'], $topic['title']);
	// }
?>
	<div id="content">

	<?php 
		if(!empty($item)){ 
		foreach ($item as $k => $v) {

		if($v['type'] == 'noname'){ ?>

		<div class="item">
			<?php echo anchor('#', img('upload/avatar/default.jpg', 'square'), array('class'=>'avatar')); ?>
			<div class="panel">
				<div class="meta">
					<span>匿名信</span>
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
					<span>来自：</span><a href="">匿名箱</a>
				</div>
			</div>
		</div>


	<?php	} else if ($v['type'] == 'post'){
	?>
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
					<?php if(!empty($v['t_title'])){ ?>
					<span>来自话题：</span><a href=""><?php echo $v['t_title']; ?></a>
					<?php } ?>
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
	<?php 
				}
			}
		} else {
			echo '还没有人发过内容';
		}
	?>

	</div>

	<div id="side">
		<div class="cell add">
			<a href="item/add">写文章</a>
		</div>
		<div class="cell countdown">
			距离天亮还有<span>6</span>个小时
		</div>
	
		<div class="cell topic">
			<h3>最新话题：失恋</h3>
			<div class="content">
				<div class="clearfix text">
				<img class="cover" src="img/cover.jpg" alt="">
				手 小学毕业的最后一天，则是与同位合作把名字刻到课桌的桌洞里 高中或者大学……
				<a href="" class="">（123人参与）</a>
				</div>
			</div>
		</div>

		<div class="cell noname">
			<h3>匿名箱</h3> 
			<div class="content">
				<p>匿名信一旦投递，将不再跟你有关联，别人会看到你发出的匿名信。
				</p>
				<a href="#" class="">写信</a><span>到匿名箱</span>
			</div>
		</div>

	</div>


<?php

	$this->load->view('templates/footer');

?>

