<?php 
	$this->load->view('templates/header');
?>
	<div id="content">

<?php
	$this->load->view('templates/items');
?>

	</div>

	<div id="side">
		<div class="cell add">
			<a href="item/add">写文章</a>
		</div>
		<div class="cell countdown">
			距离天亮还有<span>6</span>个小时
		</div>
	
		<div class="cell hot_topic">
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

