import './bootstrap';
import { createApp } from 'vue';
import router from './router';
import store from './store';
import axios from 'axios';

import App from './App.vue';
import LaravelVuePagination from 'laravel-vue-pagination';
import ThePagination from './components/layouts/ThePagination.vue';
import PostListItem from './components/Posts/PostListItem.vue';
import TheMainLayout from './components/layouts/TheMainLayout.vue';
import WidgetPostItem from './components/posts/WidgetPostItem.vue';
import TheNav from './components/layouts/TheNav.vue';

const app = createApp(App);

app.use(router);
app.use(store);

app.component('the-pagination', ThePagination);
app.component('post-list-item', PostListItem);
app.component('the-main-layout', TheMainLayout);
app.component('widget-post-item', WidgetPostItem);
app.component('the-nav', TheNav);
app.component('Pagination', LaravelVuePagination);

app.config.globalProperties.$axios = axios;

window.axios.interceptors.response.use(
    (response) => response,
    (error) => {
        if (error.response.status === 401) {
            store.dispatch('logout');
        }
        return Promise.reject(error);
    }
);

app.mount('#app');
