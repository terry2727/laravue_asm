import AppUsers from "./components/appuser/AppUsers.vue";
import AddAppUser from "./components/appuser/AddAppUser.vue";
import EditAppUser from "./components/appuser/EditAppUser.vue";
import Devices from "./components/device/Devices.vue";
import AddDevice from "./components/device/AddDevice.vue";
import EditDevice from "./components/device/EditDevice.vue";
import Router from "vue-router";
import Vue from "vue";
import store from "./store.js";
// import Home from './views/Home.vue';
// import About from './views/About.vue';
import Login from "./components/auth/Login.vue";
// import Secure from './components/Secure.vue';
import Register from "./components/auth/Register.vue";

export const routes = [
    {
        name: "home",
        path: "/",
        component: AppUsers,
        meta: {
            requiresAuth: true
        }
    },
    {
        name: "add",
        path: "/add",
        component: AddAppUser,
        meta: {
            requiresAuth: true
        }
    },
    {
        name: "edit",
        path: "/edit/:id",
        component: EditAppUser,
        meta: {
            requiresAuth: true
        }
    },
    {
        name: "appusers",
        path: "/appusers",
        component: AppUsers,
        meta: {
            requiresAuth: true
        }
    },
    {
        name: "add_device",
        path: "/add_device",
        component: AddDevice,
        meta: {
            requiresAuth: true
        }
    },
    {
        name: "edit_device",
        path: "/edit_device/:id",
        component: EditDevice,
        meta: {
            requiresAuth: true
        }
    },
    {
        name: "devices",
        path: "/devices",
        component: Devices,
        meta: {
            requiresAuth: true
        }
    },
    {
        path: "/login",
        name: "login",
        component: Login
    },
    {
        path: "/register",
        name: "register",
        component: Register
    }
    //   {
    //     path: '/secure',
    //     name: 'secure',
    //     component: Secure,
    //     meta: {
    //       requiresAuth: true
    //     }
    //   },
    //   {
    //     path: '/about',
    //     name: 'about',
    //     component: About
    //   }
];

// export default routes;
