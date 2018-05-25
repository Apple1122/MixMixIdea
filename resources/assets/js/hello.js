require('./bootstrap');
// 匯入 Hello.vue 檔，不需加副檔名
import Login from './components/Login'
import CourseList from './components/CourseList'

var vm = new Vue({
  // 找到 hello.blade.php 中指定的掛載點元素
  el: '#app',
  data: {
    currentComponent: 'login'
  },
  // 使用我們建立的 Hello(.vue) 元件
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