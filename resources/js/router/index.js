import {createRouter, createWebHistory} from "vue-router";

const HomeComponent = () => import('@/components/HomeComponent.vue')

//Setting up Routes
const routes = [

    {
        path: '/',
        component: HomeComponent,
        name: 'home',
    },
];

//Registering routes
const router = createRouter({
    history: createWebHistory(import.meta.env.BASE_URL),
    routes
});

/*
router.beforeEach((to, from, next) => {
    document.title = to.meta.title
    if (to.meta.middleware == "guest") {
        if (store.state.auth.authenticated) {
            next({ name: "dashboard" })
        }
        next()
    } else {
        if (store.state.auth.authenticated) {
            next()
        } else {
            next({ name: "login" })
        }
    }
})
*/
export default router