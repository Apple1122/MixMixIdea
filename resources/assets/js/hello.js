require('./bootstrap');
import VueRouter from 'vue-router';
import routes from './routes';
import ChartJsPluginDataLabels from 'chartjs-plugin-datalabels';
import Chart from 'chart.js';

Chart.defaults.global.defaultFontSize = 20;
Chart.defaults.global.defaultFontFamily =  'Microsoft JhengHei';

// Set Up Router for vue - Andy
Vue.use(VueRouter);
const router = new VueRouter({
  routes,
  mode: 'history'
})

// New An Instance
var vm = new Vue({
  router,
  el: '#app',
  components: {
    ChartJsPluginDataLabels
  }
});