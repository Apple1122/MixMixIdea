var app = require('express');
var server = require('http').createServer(app);;
var io = require('socket.io')(server);
var Redis = require('ioredis');
var redis = new Redis();
redis.subscribe('ncu-channel', function (err, count) {
    console.log('connect!');
});
redis.on('message', function (channel, notification) {
    console.log(notification);
    notification = JSON.parse(notification);
    // 將訊息推播給使用者
    io.emit('notification', notification.data);
});
// 監聽 3000 port
server.listen(6379, function () {
    console.log('Listening on Port 6379');
});


io.on('connection', (socket) => {
    socket.on('got', () => {
        console.log('yes');
        socket.emit('got2', '123');
    });
    
});  