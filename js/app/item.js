define(["jquery"], function(){
	var $pic = $('.pic');

	// 鼠标图片悬浮
	$pic.hover(function() {
		$(this).find('.act').show();
	}, function() {
		$(this).find('.act').hide();
	});

	// 点赞图片
	$('.heart').live('click', function(){
		$(this).addClass('hearted').removeClass('heart');
		console.log('已红心');
	});

	// 取消点赞图片
	$('.hearted').live('click', function(){
		$(this).addClass('heart').removeClass('hearted');
		console.log('取消已红心');
	});

	// 加入专辑
	

});