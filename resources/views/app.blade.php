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
    <title>Mix2Ideas攪攪腦－攪動你的想法吧！</title>
</head>
<body>
    <!-- 準備給 Vue 的掛載點 -->
    <div id="app">
        <div :is="currentComponent" :swap-component="swapComponent"></div>
    </div>
    <!-- 載入打包後的 js 檔 -->
    <script src="/js/hello.js"></script>
</body>
</html>

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
	
	body {
		position: fixed;
		height: 100%;
		overflow: hidden;
		width: 100%;
		font-size: 1.0em;
	}
}
</style>