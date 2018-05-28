require('./bootstrap');
import Login from './components/Login'
import CourseList from './components/CourseList'
import TWaiting from './components/TWaiting'
import SWaiting from './components/SWaiting'

var vm = new Vue({
  el: '#app',
  data: {
    currentComponent: 'login'
  },
  components: {
    'login': Login,
    'courselist': CourseList,
    't_w': TWaiting,
    's_w': SWaiting
  },
  methods: {
    swapComponent: function (component) {
      this.currentComponent = component;
    }
  }
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

function send(){
  socket.emit('got', 'sss');
};