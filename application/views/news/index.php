<?php foreach($news as $news_item): ?>
<h2><?php echo $news_item['title']; ?></h2>
<div class="main">
	<?php echo $news_item['text']; ?>
</div>
<p><a href="/index.php/news/<?php echo $news_item['slug']; ?>">view article</a></p>
<?php endforeach ?>