import axios from 'axios';
export default {
    namespaced: true,
    state() {
        return {
            posts: [],
            isLoading: false,
        };
    },
    getters: {
        getPosts(state) {
            return state.posts;
        },
        getIsLoading(state) {
            return state.isLoading;
        },
    },

    mutations: {
        setPosts(state, payload) {
            state.posts = payload;
        },
        setIsLoading(state, payload) {
            state.isLoading = payload;
        },
    },
    actions: {
        async loadPosts(context) {
            try {
                context.commit('setIsLoading', true);
                const response = await axios.get('/api/posts');
                // console.log(typeof response.data.data);
                const data = await response.data.data;
                // const posts = Object.keys(data).map((key) => {
                //     return {
                //         id: key,
                //         title: data[key].title,
                //         body: data[key].body,
                //     };
                // });
                context.commit('setPosts', data);
            } catch (error) {
                console.log(error);
            }
            context.commit('setIsLoading', false);
        },
        setIsLoading(context, payload) {
            context.commit('setIsLoading', payload);
        },
    },
};
