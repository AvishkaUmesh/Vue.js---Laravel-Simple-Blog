<template>
  <the-nav></the-nav>
  <the-main-layout>
    <div class="py-4"></div>
    <div v-if="isLoading">Loading...</div>
    <div v-if="!isLoading">
      <h2 v-if="!searchTerm">No search term found in query</h2>
      <section v-else>
        <h1 class="h2 mb-4">
          Search results for
          <mark>{{ searchTerm }}</mark>
        </h1>
        <h3 class="text-center pt-5" v-if="searchPosts.length <= 0">
          No Posts Found
        </h3>
        <post-list-item
          v-else
          v-for="post in searchPosts"
          :key="post.id"
          :id="post.id"
          :title="post.title"
          :body="post.body"
          :image="post.image"
          :date="post.created_at"
        >
        </post-list-item>
      </section>
    </div>
  </the-main-layout>
</template>

<script>
export default {
  data() {
    return {
      isLoading: false,
      searchPosts: {}
    }
  },
  watch: {
    $route: function () {
      this.getSearchPosts();
    }
  },

  computed: {
    // searchPosts() {
    //   if (this.$route.query.searchTerm) {
    //     const searchTerms = this.$route.query.searchTerm;
    //     const posts = this.$store.getters['posts/getPosts'];

    //     return posts.filter(post => post.title.includes(searchTerms));
    //   }



    // },
    searchTerm() {
      return this.$route.query.searchTerm;
    }
  },
  methods: {
    async getSearchPosts() {
      if (this.$route.query.searchTerm) {
        try {
          this.isLoading = true;
          const term = this.$route.query.searchTerm;
          const response = await this.$axios.get(`/api/search/${term}`);
          this.searchPosts = response.data.data;
          this.isLoading = false;
        } catch (error) {
          this.isLoading = false;
          console.log(error);
        }
      }
    }
  },
  created() {
    this.getSearchPosts();
  }
}
</script>
