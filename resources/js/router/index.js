import { createRouter, createWebHistory } from 'vue-router';

import Home from '../pages/Home.vue';
import SinglePost from '../pages/SinglePost.vue';
import PostsByCategory from '../pages/PostsByCategory.vue';
import SearchPage from '../pages/SearchPage.vue';
import NotFound from '../pages/NotFound.vue';
import Login from '../auth/login.vue';
import Register from '../auth/Register.vue';

const routes = [
    {
        path: '/',
        component: Home,
        name: 'home',
    },
    {
        path: '/posts/:id',
        component: SinglePost,
        name: 'single-post',
        props: true,
    },
    {
        path: '/category/:id',
        component: PostsByCategory,
        name: 'posts-by-category',
        props: true,
    },
    {
        path: '/search',
        component: SearchPage,
        name: 'search',
        props: true,
    },
    {
        path: '/auth/login',
        component: Login,
        name: 'login',
    },
    {
        path: '/auth/register',
        component: Register,
        name: 'register',
    },
    { path: '/:notFound(.*)', component: NotFound },
];

export default createRouter({
    scrollBehavior(_, _2, savedPosition) {
        if (savedPosition) {
            return savedPosition;
        }
        return { left: 0, top: 0 };
    },
    history: createWebHistory(),
    routes,
    linkActiveClass: 'active',
});
