<?php
	$this->load->view('templates/header');
?>

<div id="content">
	
	<?php for($i=10; $i>0; $i--){ ?>
	<div class="item">
		<a class="avatar" href=""><img src="img/noname.jpg" alt=""></a>
		<div class="panel">
			<div class="meta">
				<a class="nickname" href="#">匿名信#100<?php echo $i; ?></a>
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
			</div>
		</div>
	</div>
	<?php } ?>
</div>

<div id="side">
	
	<div class="cell add">
		<a href="item/add">写匿名信</a>
	</div>

	<div class="cell noname">
		<h3>匿名箱</h3> 
		<div class="content">
			<p>匿名信一旦投递，将不再跟你有关联，别人会看到你发出的匿名信。
			</p>
		</div>
	</div>
</div>

<?	
	$this->load->view('templates/footer');	
?>