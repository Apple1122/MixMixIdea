require('./bootstrap');
import VueRouter from 'vue-router';
import routes from './routes';

// Set Up Router for vue - Andy
Vue.use(VueRouter);
const router = new VueRouter({
  routes,
  mode: 'history'
})

// New An Instance
var vm = new Vue({
  router,
  el: '#app'
});

var io = require('socket.io-client');
// 建立 socket.io 的連線
var socket = io.connect('http://localhost:6379');
// 當從 socket.io server 收到 notification 時將訊息印在 console 上
socket.on('notification', function (message) {
  console.log(message);
  socket.emit('got', message);
});

socket.on('got2', function (message) {
  console.log(message);
});

function send() {
  socket.emit('got', 'sss');
};