import { createStore } from 'vuex';
import axios from 'axios';

import postsModule from './modules/posts/index';
import categoriesModule from './modules/categories/index';
import { isLoggedIn, logout } from '../util/auth';

const store = createStore({
    modules: {
        posts: postsModule,
        categories: categoriesModule,
    },

    state() {
        return {
            isLoggedIn: false,
            user: {},
        };
    },

    mutations: {
        setUser(state, payload) {
            state.user = payload;
        },
        setLoggedIn(state, payload) {
            state.isLoggedIn = payload;
        },
    },
    actions: {
        loadStoredUser(context) {
            context.commit('setLoggedIn', isLoggedIn());
        },

        async loadUser({ commit, dispatch }) {
            if (isLoggedIn()) {
                try {
                    const user = (await axios.get('/user')).data;
                    commit('setUser', user);
                    commit('setLoggedIn', true);
                } catch (error) {
                    // console.log(error);
                    dispatch('logout');
                }
            }
        },
        logout({ commit }) {
            commit('setUser', {});
            commit('setLoggedIn', false);
            logout();
        },
    },
});

export default store;
