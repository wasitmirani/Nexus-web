import Vue from "vue";
import VueRouter from "vue-router";

Vue.use(VueRouter);

function setComponent(path_file) {
    const route_path = "./components/backend/" + path_file + "Component.vue";
    return import ("" + route_path);
}

const routes = [
    // { path: "*", component: () => setComponent("error/404") },
    {
        path: "/",
        // component: () => setComponent("home/Dashboard")
        redirect: { path: '/articles' }
    },
    {
        path: "/articles",
        component: () => setComponent("content/Article")
            // redirect: { path: '/' }
    },
    {
        path: "/new/article",
        component: () => setComponent("content/CreateArticle")
            // redirect: { path: '/' }
    },
];

const router = new VueRouter({
    routes,
    linkActiveClass: "active",
    linkExactActiveClass: "exact-active" // short for `routes: routes`
});

export default router;