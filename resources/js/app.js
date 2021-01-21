require('./bootstrap');
import Vue from 'vue';

// window.Vue = require('vue');
import App from './App.vue';
import VueRouter from 'vue-router';
import VueAxios from 'vue-axios';
import axios from 'axios';
import { routes } from './routes';
import Vuetify from 'vuetify/lib'

// Vue.use(Vuetify)

Vue.use(VueRouter);
Vue.use(VueAxios, axios);

const router = new VueRouter({
    mode: 'history',
    routes: routes
});

const app = new Vue({
    el: '#app',
    vuetify: new Vuetify(),
    router: router,
    render: h => h(App),
});