import Vue from "vue";
import App from "./App.vue";
import routes from "./routes";
import store from "./store";
import Axios from "axios";

Vue.prototype.$http = Axios;

const token = localStorage.getItem("user-token");
if (token) {
    Vue.prototype.$http.defaults.headers.common["Authorization"] = token;
}

Vue.config.productionTip = false;

new Vue({
    routes,
    store,
    render: h => h(App)
}).$mount("#app");
