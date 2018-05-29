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