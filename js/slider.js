require(['./common'], function(common){
	requirejs.config({
		"shim": {
	        "jquery.localscroll": ["jquery"],
	        "jquery.parallax": ["jquery"],
	        "jquery.scrollTo": ["jquery"]
	    }
	})

	require(["app/main"]);
});