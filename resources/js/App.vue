<template>
  <router-view :key="$route.path"></router-view>
  <the-footer></the-footer>
</template>


<script>
import TheFooter from './components/layouts/TheFooter.vue';

export default {
  components: {
    TheFooter,
  },
  methods: {

    // async loadPosts() {
    //   await this.loadCategories();
    //   try {
    //     // this.$store.dispatch('posts/setIsLoading', true);
    //     await this.$store.dispatch('posts/loadPosts');
    //   } catch (error) {
    //     this.error = error.message || 'Something went wrong!';
    //     console.log(error);
    //   }
    //   //   this.$store.dispatch('posts/setIsLoading', false);
    // },

    async loadCategories() {
      try {
        await this.$store.dispatch('categories/loadCategories');
      } catch (error) {
        this.error = error.message || 'Something went wrong!';
        console.log(error);
      }
    }
  },
  created() {
    // this.loadPosts();
    this.loadCategories();
  },
  beforeCreate() {
    this.$store.dispatch('loadStoredUser');
    this.$store.dispatch('loadUser');
  }
}
</script>

<style>
.active {
  color: rgb(96, 203, 99) !important;
  background-color: none !important;
}
</style>
