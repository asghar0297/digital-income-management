import Vue from 'vue'
import VueRouter from 'vue-router';
Vue.use(VueRouter);

const login = () => import('../pages/login.vue')
const register = () => import('../pages/register.vue')
const categoryList = () => import('../pages/category/list.vue')
const categoryAdd = () => import('../pages/category/add.vue')


const routes = [
    {
        name: 'login',
        path:  '/',
        component: login
    },
    {
        name: 'register',
        path:  '/register',
        component: register
    },
    {
        name: 'category',
        path:  '/category',
        component: categoryList
    },
    {
        name: 'addCategory',
        path:  '/category/create',
        component: categoryAdd
    }
]



const router = new VueRouter({
    mode:'history',
    routes:routes
})


export default router
