// 配置文件
requirejs.config({
	baseUrl: '/js/lib',
	paths: {
		app: '../app'
	},
	urlArgs: 'v=' + (new Date()).getTime()
})

// 加载全局模块
require(["app/user", "app/item"]);