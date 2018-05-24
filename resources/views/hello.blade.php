<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
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