<?php 

	$this->load->view('templates/header');

	// if(!empty($topic)){
	// 	echo '<br><br>';
	// 	echo '本周话题：';
	// 	echo '<br><br>';
	// 	echo anchor('/topic/'. $topic['tid'], $topic['title']);
	// }

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
		<div class="item">
			<a class="avatar" href=""><img src="img/avatar1.jpg" alt=""></a>
			<div class="panel">
				<div class="meta">
					<a class="nickname" href="#">睡不着先生一号</a>
					<span class="time">于1分钟前</span>
				</div>
				<div class="text">
					算一个小调查，我经常会去问身边的人。<br><br>

					电影或者电视剧里设定的答案，似乎都很美好，一个明知道不会有结果的人，下定了决心，要等到最后，10年，20年，甚至是更多年，很多人抹着眼泪说，这才是真爱，但我却觉得，毛骨悚然。<br><br>

					而我的版本可能是这样。<br><br>

					就像是与朋友约定好了，在老地方相见，你提前到了，就先站在那里等，时间一分一秒的过去，你每一刻都在期待，那个朋友能出现在你的视线里，冲你挥挥手，或仓促的跑过来，说抱歉来晚了，而你说，没事我也刚到。<br>
				</div>
				<div class="act">
					<a href="" class="fr">赞（1）</a>
					<a href="" class="fr mr15">聊天</a>
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
			<h3>本周话题</h3>
			<div class="content">
				<p>在我不长的人生里，有很多告别 上学前班的当天，就学会了，朝校门口的妈妈用力挥手 小学毕业的最后一天，则是与同位合作把名字刻到课桌的桌洞里 高中或者大学……
				<a href="" class="">（123人回应）</a>
				</p>
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

