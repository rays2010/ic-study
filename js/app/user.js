define(["jquery"], function(){
	$(document).ready(function(){
		$btn = $('#user .down, #user .drop');
		$box = $('#user .drop');

		$btn.hover(function(){
			$box.show();
		}, function(){
			$box.hide();
		});
	});
});