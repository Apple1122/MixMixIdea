<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport"  content="user-scalable=no">  
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-title" content="Mix2Ideas攪攪腦">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" type="text/css" href="/css/reset.css" />
	<link rel="stylesheet" type="text/css" href="/css/animate.css" />
	<script src="https://cdnjs.cloudflare.com/ajax/libs/vue/2.5.16/vue.min.js"></script>
    <title>Mix2Ideas攪攪腦－攪動你的想法吧！</title>
</head>
<body>
    <!-- 準備給 Vue 的掛載點 -->
    <div id="app">
		<router-view></router-view>
    </div>
    <!-- 載入打包後的 js 檔 -->
	<script src="/js/hello.js"></script>
	
</body>
</html>
<script>
	$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});
</script>
<style>
    @media (min-width: 400px) and (max-width: 1000px) {
	html, body {
		position: fixed;
	}
	
	html, body {
		position: relative;
		overflow: hidden;
	}
	
	body {
		position: fixed;
		overflow: hidden;
	}
	
	body,#app {
		position: fixed;
		height: 100%;
		overflow: hidden;
		width: 100%;
		font-size: 1.0em;
	}

	.container{
		box-sizing: border-box;
		padding: 0% 3%;
		width: 100%;
		height: 100%;
		background: transparent url("/img/bg-img.png") no-repeat center;
		background-size: 90%;
	}

}
</style>