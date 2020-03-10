require('./bootstrap');
// include vue main lib
window.Vue = require("vue");
// include vue route
import VueRouter from 'vue-router';
Vue.use(VueRouter);
// include axios and vue-axios module
import VueAxios from 'vue-axios';
import axios from 'axios';
Vue.use(VueAxios, axios);


import HomeComponent from './components/HomeComponent.vue';
import CreateComponent from './components/CreateComponent.vue';
import IndexComponent from './components/IndexComponent.vue';
import EditComponent from './components/EditComponent.vue';

const routes = [
  {
      name: 'home',
      path: '/',
      component: HomeComponent
  },
  {
      name: 'create',
      path: '/create',
      component: CreateComponent
  },
  {
      name: 'posts',
      path: '/posts',
      component: IndexComponent
  },
  {
      name: 'edit',
      path: '/edit/:id',
      component: EditComponent
  }
];

//load example vue component
// Vue.component('example-component', require('./component/ExampleComponent.vue'));
// 
const router = new VueRouter({mode: 'history'});
const app = new Vue(Vue.util.extend({router})).$mount('#app');