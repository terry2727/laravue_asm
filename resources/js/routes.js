import AppUsers from "./components/appuser/AppUsers.vue";
import AddAppUser from "./components/appuser/AddAppUser.vue";
import EditAppUser from "./components/appuser/EditAppUser.vue";
import Devices from "./components/device/Devices.vue";
import AddDevice from "./components/device/AddDevice.vue";
import EditDevice from "./components/device/EditDevice.vue";

export const routes = [
    {
        name: "home",
        path: "/",
        component: AppUsers,
    },
    {
        name: "add",
        path: "/add",
        component: AddAppUser,
    },
    {
        name: "edit",
        path: "/edit/:id",
        component: EditAppUser,
    },
    {
        name: "appusers",
        path: "/appusers",
        component: AppUsers,
    },
    {
        name: "add_device",
        path: "/add_device",
        component: AddDevice,
    },
    {
        name: "edit_device",
        path: "/edit_device/:id",
        component: EditDevice,
    },
    {
        name: "devices",
        path: "/devices",
        component: Devices,
    },
];
