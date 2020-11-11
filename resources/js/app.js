/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

import VueRouter from 'vue-router'
Vue.use(VueRouter)


import { routes } from './routes'

//sweet alert
import Swal from 'sweetalert2'
import Axios from 'axios';
window.Swal = Swal;
const Toast = Swal.mixin({
  toast: true,
  position: 'top-end',
  showConfirmButton: false,
  timer: 5000
});
window.Toast = Toast;

Vue.component('App', require('./components/App.vue').default);


const router = new VueRouter({
    routes, // short for `routes: routes`
  })

const app = new Vue({
    el: '#app',
    router
});
