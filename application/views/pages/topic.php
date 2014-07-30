<?php 
	$this->load->view('templates/header');

	if($page == 'index'){
		// echo anchor('/','首页');
		// echo '<br>';
		// echo anchor('topic/add', '添加话题');
		// echo '<br>';
		// echo '<br>';
		// echo '话题列表页：';
		// echo '<br>';
		// echo '<br>';

		// foreach ($topics as $k => $v) {
		// 	echo anchor('topic/'.$v['tid'], $v['title']);
		// 	echo '<br>';
		// }
?>

<div id="content">
	<div class="item_topic">
		<div class="panel">
			<div class="cover">
				<img src="img/cover.jpg" alt="">
			</div>
			<div class="wrap">
				<h2>话题：夏天到来的标志</h2>
				<div class="text">
					算一个小调查，我经常会去问身边的人。<br><br>

					电影或者电视剧里设定的答案，似乎都很美好，一个明知道不会有结果的人，下定了决心，要等到最后，10年，20年，甚至是更多年，很多人抹着眼泪说，这才是真爱，但我却觉得，毛骨悚然。<br><br>

					而我的版本可能是这样。<br><br>
				</div>
				<div class="act">
					<a href="">极地</a> <span class="time">发起于1分钟前</span>
					<a href="" class="fr">参与话题</a>
					<span class="fr mr10">10人已参与</span>
				</div>
			</div>
		</div>
	</div>

	<div class="item_topic">
		<div class="panel">
			<div class="cover">
				<img src="img/cover2.jpg" alt="">
			</div>
			<div class="wrap">
				<h2>话题：失恋</h2>
				<div class="text">
					算一个小调查，我经常会去问身边的人。<br><br>

					电影或者电视剧里设定的答案，似乎都很美好，一个明知道不会有结果的人，下定了决心，要等到最后，10年，20年，甚至是更多年，很多人抹着眼泪说，这才是真爱，但我却觉得，毛骨悚然。<br><br>

					而我的版本可能是这样。<br><br>
				</div>
				<div class="act">
					<a href="">努努猫</a> <span class="time">发起于7月30日</span>
					<a href="" class="fr">参与话题</a>
					<span class="fr mr10">230人已参与</span>
				</div>
			</div>
		</div>
	</div>

</div>

<div id="side">
	<div class="cell add">
		<a href="topic/add">投稿话题</a>
	</div>
</div>
		
<?php } else if($page == 'single'){
		echo anchor('/topic','全部话题');
		echo '<br>';
		echo $topic['title'];
		echo '<br>';
		echo $topic['cover'];

	} else if($page == 'add'){

		echo '<div id="content">';
		echo '<div id="add_post">';
		echo '<h2>投稿一个话题</h2>';
		echo form_open('topic/add');
		echo form_textarea(array('name'=>'text', 'placeholder'=>'输入话题...'));
		echo form_submit(array('value'=>'发布', 'class'=>'submit'));
		echo form_close();
		echo '</div>';
		echo '</div>';

		echo '<div id="side"><div class="cell desc">投稿说明</div></div>';
	}

	$this->load->view('templates/footer');
?>