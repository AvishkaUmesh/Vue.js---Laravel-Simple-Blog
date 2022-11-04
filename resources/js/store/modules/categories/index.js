import axios from 'axios';
export default {
    namespaced: true,
    state() {
        return {
            categories: [],
            isLoading: false,
        };
    },
    getters: {
        getCategories(state) {
            return state.categories;
        },
        getIsLoading(state) {
            return state.isLoading;
        },
    },

    mutations: {
        setCategories(state, payload) {
            state.categories = payload;
        },
        setIsLoading(state, payload) {
            state.isLoading = payload;
        },
    },
    actions: {
        async loadCategories(context) {
            context.commit('setIsLoading', true);
            try {
                const response = await axios.get(
                    'http://127.0.0.1:8000/api/category'
                );
                const data = await response.data.data;
                context.commit('setCategories', data);
            } catch (error) {
                console.log(error);
            }
            context.commit('setIsLoading', false);
        },
    },
};
