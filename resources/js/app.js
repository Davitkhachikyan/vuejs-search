require('./bootstrap');
window.Vue = require('vue').default;


import VueGoodTablePlugin from 'vue-good-table';

// import the styles
import 'vue-good-table/dist/vue-good-table.css'
import 'materialize-css'
import 'materialize-css/dist/css/materialize.css'

Vue.use(VueGoodTablePlugin);


Vue.component('pagination', require('laravel-vue-pagination'));
import App from './App.vue';


import VueAxios from "vue-axios";
import axios from "axios";
Vue.use(VueAxios, axios);




const app = new Vue(Vue.util.extend( App)).$mount('#app');
