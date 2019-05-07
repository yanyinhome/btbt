// The Vue build version to load with the `import` command
// (runtime-only or standalone) has been set in webpack.base.conf with an alias.
import Vue from 'vue';
import App from './App';
import router from './router/app';
import axios from 'axios';
import Qs from 'qs';
import ElementUI from 'element-ui';
import VueAwesomeSwiper from 'vue-awesome-swiper';
Vue.use(VueAwesomeSwiper)
import 'swiper/dist/css/swiper.css'
import 'element-ui/lib/theme-chalk/index.css';
Vue.use(ElementUI);
import echarts from 'echarts';
Vue.prototype.$echarts = echarts;
// 引入组件
import './assets/js/component';
require('animate.css');
Vue.config.productionTip = false;
// 创建全局eventbus
Vue.prototype.$bus = new Vue();
import VueTouch from 'vue-touch'
        Vue.use(VueTouch, {name: 'v-touch'})
        VueTouch.config.swipe = {
             threshold: 100 //手指左右滑动距离
        }
// const Other = ['login', 'register', 'forget'];
// router.beforeEach((to, from, next) => {
//   // 跳转前判断是否登录
//   if (Other.join('*').match(to.fullPath.replace('/', '')) || Other.join('*').match(to.name) !== null) {
//     next();
//   } else {
//     Vue.prototype.axios.post('')
//       .then(({data}) => {
//         // 如果返回值为2000，则跳转到登录页
//         if (data.status === 2000) {
//           router.push('login');
//         } else {
//           next();
//         }
//       })
//       .catch(function (error) {
//         console.log(error);
//       });
//   }
// });
Vue.filter('hideTel', function (value) {
if (typeof (value) !== 'string') {
    value = value.toString();
  }
  return value.replace(/(\d{3})\d{4}(\d{4})/, '$1****$2');
});
Vue.prototype.$axios = axios;
Vue.prototype.axios = axios.create({
  baseURL:'http://houtai2.cadhx.com/',//http://btox.sosocnc.com/    /http://btox.sosocnc.com   本地: http://ceshi.cadhx.com 
  timeout: 10000,
  withCredentials: false,
  transformRequest: [function (data) {
    data = Qs.stringify(data);
    return data;
  }],
  headers: { 'Content-Type': 'application/x-www-form-urlencoded' }
});
/* eslint-disable no-new */
new Vue({
  el: '#app',
  router,
  components: { App },
  template: '<App/>'
});