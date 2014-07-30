require(['./common'], function(common){
	
	// 依赖关系
	requirejs.config({
		"shim": {
	        "jquery.uploadify": ["jquery"],
	    }
	})

	// 加载图片上传组件
	require(["app/uploadify"]);
});