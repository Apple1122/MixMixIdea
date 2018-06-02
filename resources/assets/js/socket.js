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
// 監聽 6379 port
server.listen(6379, function () {
    console.log('Listening on Port 6379');
});

io.on('connection', (socket) => {

    socket.on("createRoom", (roomId) => {
        socket.join(roomId)
        if (io.nsps['/'].adapter.rooms[roomId])
            var currentPeople = io.nsps['/'].adapter.rooms[roomId].length;
        console.log(socket.id);
        console.log(io.nsps['/'].adapter.rooms);
        socket.broadcast.to(roomId).emit('updateCurrentPeople', currentPeople);
    });

    socket.on("joinRoom", (roomId) => {
        socket.join(roomId);
        if (io.nsps['/'].adapter.rooms[roomId])
            var currentPeople = io.nsps['/'].adapter.rooms[roomId].length;
        console.log(socket.id + " join\n");
        console.log(io.nsps['/'].adapter.rooms);
        console.log("\n");
        console.log(currentPeople);
        console.log("\n");

        socket.emit('updateCurrentPeople', currentPeople);
        socket.broadcast.to(roomId).emit('updateCurrentPeople', currentPeople);
    });

    socket.on("gameStart", (roomId) => {
        console.log("on gameStart");
        socket.broadcast.to(roomId).emit('gameStart');        
    })

    socket.on("teacherLeave", (roomId) => {
        socket.broadcast.to(roomId).emit('teacherLeave');
        socket.leave(roomId);
        socket.disconnect();
    });

    socket.on("leaveRoom", (roomId) => {
        socket.leave(roomId)
        socket.disconnect();
        if (io.nsps['/'].adapter.rooms[roomId])
            var currentPeople = io.nsps['/'].adapter.rooms[roomId].length;

        console.log(socket.id + " left \n");
        console.log(io.nsps['/'].adapter.rooms);
        console.log("\n");
        socket.broadcast.to(roomId).emit('updateCurrentPeople', currentPeople);
    });

    socket.on("sendMessage", (msg) => {
        let roomId = Object.keys(io.sockets.adapter.sids[socket.id])[0];
        console.log("room: " + roomId + "\nmsg: " + msg);
        socket.broadcast.to(roomId).emit('updateChat', msg);
    });

    //for testing
    socket.on("got", (data) => {
        console.log(socket.id);
        socket.send("got");
    });

});

function getRoomPeopleCount(roomId) {
    return io.nsps['/'].adapter.rooms[roomId].length;
}