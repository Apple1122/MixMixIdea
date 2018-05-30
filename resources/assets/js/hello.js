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
