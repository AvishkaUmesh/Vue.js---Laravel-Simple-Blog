<template>
  <the-nav></the-nav>
  <the-main-layout id="top">
    <section>
      <div class="py-4"></div>
      <h1 class="h2 mb-4">
        Posts By
        <mark>{{ name }}</mark>
      </h1>
      <h2 v-if="posts.data.length <= 0">No Posts</h2>
      <post-list-item
        v-else
        v-for="post in posts.data"
        :key="post.id"
        :id="post.id"
        :title="post.title"
        :body="post.body"
        :image="post.image"
        :date="post.created_at"
      >
      </post-list-item>

      <Pagination
        :data="posts"
        @pagination-change-page="getPostsByCategory"
        @click="scrollToTop('top')"
      />
    </section>
  </the-main-layout>
</template>


<script>
export default {
  props: ['id'],
  data() {
    return {

      posts: {},
      isLoading: false,
    }
  },
  computed: {
    name() {
      let catName = null;
      const categories = this.$store.getters['categories/getCategories'];
      const cat = categories.filter(cat => cat.id == this.id);
      cat.forEach(c => {
        console.log(c.name);
        catName = c.name;
      });
      return catName;
    },
  },

  methods: {
    async getPostsByCategory(page = 1) {
      try {
        this.isLoading = true;
        const response = await this.$axios.get(`/api/category/${this.id}/posts?page=` + page);
        this.posts = await response.data.data;
        this.isLoading = false;
      } catch (error) {
        console.log(error);
      }
    },
    scrollToTop() {
      let a = document.getElementById('top');

      a.scrollIntoView({
        behavior: 'smooth',
        block: 'start'
      });
    },
  },
  created() {
    this.getPostsByCategory();
  },
}
</script>
