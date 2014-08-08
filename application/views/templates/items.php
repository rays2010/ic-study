<?php 
		if(!empty($items)){ 
		foreach ($items as $k => $v) {

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
					<?php 
						if($v['uid'] == $my['uid']){
							echo anchor('/item/del/'.$v['iid'], '删除' , array('class'=>'fr'));
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
					<?php 
						if($v['uid'] != $my['uid']){
							echo anchor('/letter/'.$v['uid'], '聊天' , array('class'=>'fr mr15'));
						}
					?>
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