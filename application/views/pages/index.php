<?php 

	$this->load->view('templates/header');

	if(!empty($topic)){
		echo '<br><br>';
		echo '本周话题：';
		echo '<br><br>';
		echo anchor('/topic/'. $topic['tid'], $topic['title']);
	}

	// if(!empty($item)){
	// 	echo '<br><br>';
	// 	echo '最新文章：';
	// 	echo '<br><br>';
	// 	foreach ($item as $k => $v) {
	// 		echo anchor('/item/'. $v['iid'], $v['text']);
	// 		echo 'by:'.anchor('/user/'.$v['author_id'] , $this->users->get_nickname($v['author_id']));
	// 		echo '<br>';
	// 		echo '<br>';
	// 	}
	// }

?>
	<div id="content">

	<?php 
		if(!empty($item)){ 
		foreach ($item as $k => $v) {
	?>
		<div class="item">
			<a class="avatar" href=""><?php echo img(image($v['avatar'], 'square')); ?></a>
			<div class="panel">
				<div class="meta">
					<?php echo anchor('/user/'.$v['uid'] , $v['nickname'], array('class'=>'nickname')); ?>
					<span class="time">
					<?php echo anchor('/item/'. $v['iid'], '于1分钟前'); ?>
					</span>
				</div>
				<?php if(!empty($v['cover'])){ ?>
				<div class="cover">
					<img src="<?php echo $v['cover']; ?>" alt="">
				</div>
				<?php } ?>
				<div class="text">
					<?php echo $v['text']; ?>
				</div>
				<div class="act">
					<a href="" class="fr">赞（1）</a>
					<?php echo anchor('/letter/'.$v['uid'], '聊天' , array('class'=>'fr mr15')); ?>
				</div>
			</div>
		</div>
	<?php 
			}
		} 
	?>

		<div class="item">
			<a class="avatar" href=""><img src="img/avatar1.jpg" alt=""></a>
			<div class="panel">
				<div class="meta">
					<a class="nickname" href="#">睡不着先生一号</a>
					<span class="time">于1分钟前</span>
				</div>
				<div class="cover">
					<img src="img/pic1.jpg" alt="">
				</div>
				<div class="text">
					还有没睡觉的同学嘛
				</div>
				<div class="act">
					<span>来自话题：</span><a href="">这么晚了你怎么还不睡觉</a>
					<a href="" class="fr">赞（1）</a>
					<a href="" class="fr mr15">聊天</a>
				</div>
			</div>
		</div>

		<div class="item">
			<a class="avatar" href=""><img src="img/noname.jpg" alt=""></a>
			<div class="panel">
				<div class="meta">
					<a class="nickname" href="#">匿名信#11223</a>
					<span class="time">于1分钟前</span>
				</div>
				<div class="cover">
					
				</div>
				<div class="music">
					<embed src="http://www.xiami.com/widget/0_1769477290/singlePlayer.swf" type="application/x-shockwave-flash" width="257" height="33" wmode="transparent"></embed>
				</div>
				<div class="text">
					睡不着，重复循环一首歌
				</div>
				<div class="act">
					<span>来自：</span><a href="">匿名箱</a>
					<a href="" class="fr">赞（1）</a>
				</div>
			</div>
		</div>

		<div class="item">
			<a class="avatar" href=""><img src="img/avatar1.jpg" alt=""></a>
			<div class="panel">
				<div class="meta">
					<a class="nickname" href="#">睡不着先生一号</a>
					<span class="time">于1分钟前</span>
				</div>
				<div class="cover">
					
				</div>
				<div class="music">
					<embed src="http://www.xiami.com/widget/0_1769477290/singlePlayer.swf" type="application/x-shockwave-flash" width="257" height="33" wmode="transparent"></embed>
				</div>
				<div class="text">
					睡不着，重复循环一首歌
				</div>
				<div class="act">
					<a href="" class="fr">赞（1）</a>
					<a href="" class="fr mr15">聊天</a>
				</div>
			</div>
		</div>

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

