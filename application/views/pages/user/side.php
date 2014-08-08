<div id="side">
	<div class="cell card clearfix">
		<?php echo img(image($user['avatar'], 'square')); ?>
		<h2><?php echo $user['nickname']; ?></h2>
		<span>现居：<?php echo $user['location']; ?></span>
		<?php if( $user['uid'] != $my['uid']){ ?>
		<a href="" class="mail">私信</a>
		<?php } ?>
	</div>
	<div class="cell">
		<a href="/user/<?php echo $user['uid']; ?>">全部</a>
	</div>
	<div class="cell">
		<a href="/user/item/<?php echo $user['uid']; ?>">发布的文章</a>
	</div>
	<div class="cell">
		<a href="/user/topic/<?php echo $user['uid']; ?>">创建的话题</a>
	</div>
	<div class="cell">
		<a href="/user/join/<?php echo $user['uid']; ?>">参与的话题</a>
	</div>
</div>