<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title><?php echo $title; ?></title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Place favicon.ico and apple-touch-icon.png in the root directory -->
    <link rel="stylesheet" href="<?php echo base_url('css/main.css');?>">
</head>
<body>

	<header id="header">
        <div class="wrap clearfix">
            <h1 id="logo"><a href="/" title="失眠">失眠</a></h1>
            <nav id="nav">
                <ul class="list-h">
                    <li class="select"><a href="/" title="首页">首页</a></li>
                    <li><a href="/topic" title="话题">话题</a></li>
                    <li><a href="/" title="匿名箱">匿名箱</a></li>
                </ul>
            </nav>
            <div id="user">
				<?php if($current_user['is_login']){ ?>
				<div class="login">
					<a class="avatar" href="#" title=""><?php echo $current_user['nickname']; ?></a>
					<a class="msg" href="">未读消息（<span>0</span>）</a>
					<a class="down" href="#">+</a>
	    			<ul class="drop">
	    				<li><?php echo anchor('/user/'.$current_user['uid'], '个人主页'); ?></li>
		            	<li><a href="/item/add">添加文章</a></li>
		            	<li><a href="/topic/add">添加话题</a></li>
		            	<li><a title="退出" href="/logout">退出</a></li>
	    			</ul>
    			</div>
				<?php } else { ?>
            	<a title="注册" href="http://local.ci.com/reg">注册</a>
            	<a title="登录" href="http://local.ci.com/login">登录</a>
            	<?php } ?>
            </div>
        </div>
    </header>
    <!-- header./END -->

    <div id="main" class="clearfix">