import AppUsers from "./components/appuser/AppUsers.vue";
import AddAppUser from "./components/appuser/AddAppUser.vue";
import EditAppUser from "./components/appuser/EditAppUser.vue";

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
];
