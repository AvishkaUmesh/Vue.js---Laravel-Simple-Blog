<template>
  <div>
    <the-nav></the-nav>
    <the-banner></the-banner>
    <section id="top"></section>
    <the-main-layout>
      <h2 class="h5 section-title">Posts</h2>

      <h2 v-if="!!isLoading">Loading</h2>
      <post-list-item
        v-else
        v-for="post in postsData.data"
        :key="post.id"
        :id="post.id"
        :title="post.title"
        :body="post.body"
        :image="post.image"
        :date="post.created_at"
      >
      </post-list-item>

      <Pagination
        :data="postsData"
        @pagination-change-page="getResults"
        @click="scrollToTop('top')"
      />
    </the-main-layout>
  </div>
</template>
<script>
import TheBanner from '../components/Home/TheBanner.vue';


export default {
  components: {
    TheBanner,
  },
  data() {
    return {
      postsData: {},
    };
  },
  computed: {
    selectedItem(id) {
      return this.selectedPostId = id;
    },
    // posts() {
    //   return this.$store.getters['posts/getPosts'];
    // },
    isLoading() {
      return this.$store.getters['posts/getIsLoading'];
    },
  },
  mounted() {
    // Fetch initial results
    this.getResults();
    window.addEventListener('scroll', this.handleScroll);
  },

  methods: {
    // Our method to GET results from a Laravel endpoint
    async getResults(page = 1) {
      const response = await this.$axios.get('/api/pages?page=' + page);
      this.postsData = await response.data.data;

    },
    scrollToTop() {
      let a = document.getElementById('top');

      a.scrollIntoView({
        behavior: 'smooth',
        block: 'start'
      });
    },
  }

}
</script>
