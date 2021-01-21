require("./bootstrap");
import Vue from "vue";

// window.Vue = require('vue');
import App from './App.vue';
import VueRouter from 'vue-router';
import VueAxios from 'vue-axios';
import axios from 'axios';
import {routes} from './routes';
import Store from './store';
import 'vuetify/dist/vuetify.min.css';
import Vuetify from 'vuetify';
 
Vue.prototype.$http = axios;
const token = localStorage.getItem('token')
if (token) {
  Vue.prototype.$http.defaults.headers.common['Authorization'] = `Bearer ${token}`;
}

Vue.use(Vuetify);
Vue.use(VueRouter);
Vue.use(VueAxios, axios);

const router = new VueRouter({
    mode: "history",
    routes: routes
});

const app = new Vue({
    el: "#app",
    vuetify: new Vuetify(),
    router: router,
    store: Store,
    render: h => h(App),
});
