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

	// echo '<br>';
	// echo '<br>';
	// echo '文章列表：';
	// echo '<br>';

	// foreach ($item as $k => $v) {
	// 	echo anchor('/item/'.$v->iid, $v->text);
	// 	echo ' - ';
	// 	if($is_owner){
	// 		echo anchor('/item/edit/'.$v->iid, '(修改)');
	// 		echo anchor('/item/del/'.$v->iid, '(删除)');
	// 	}
	// 	echo '<br>';
	// }
?>

<div id="home">
	<img src="../img/avatar2.jpg" alt="">
	<h2>奇犽·揍敌客 <a href="" class="mail">私信</a></h2>
</div>

<div id="content">
	<div class="item">
		<a class="avatar" href=""><img src="../img/avatar1.jpg" alt=""></a>
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
		<a class="avatar" href=""><img src="../img/avatar1.jpg" alt=""></a>
		<div class="panel">
			<div class="meta">
				<a class="nickname" href="#">睡不着先生一号</a>
				<span class="time">于1分钟前</span>
			</div>
			<div class="cover">
				<img src="../img/pic1.jpg" alt="">
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
		<a class="avatar" href=""><img src="../img/avatar1.jpg" alt=""></a>
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