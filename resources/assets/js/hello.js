require('./bootstrap');
import Login from './components/Login'
import CourseList from './components/CourseList'

var vm = new Vue({
  el: '#app',
  data: {
    currentComponent: 'login'
  },
  components: {
    'login': Login,
    'courselist': CourseList
  },
  methods: {
    swapComponent: function (component) {
      this.currentComponent = component;
    }
  }
});