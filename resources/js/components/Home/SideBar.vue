<template>
  <aside class="col-lg-4 sidebar-home">
    <search-block></search-block>

    <!-- categories -->
    <category-block></category-block>

    <!-- recent post -->
    <div v-if="!isPostLoading && !isRecentLoading" class="widget">
      <h4 class="widget-title">Recent Post</h4>
      <widget-post-item
        v-for="post in recentPosts"
        :key="post.id"
        :postId="post.id"
        :title="post.title"
        :image="post.image"
        :date="post.created_at"
      >
      </widget-post-item>
    </div>

    <!-- Social -->
    <social-block></social-block>
  </aside>
</template>


<script>
import SearchBlock from '../HomeSideBar/SearchBlock.vue';
import SocialBlock from '../HomeSideBar/SocialBlock.vue';
import CategoryBlock from '../HomeSideBar/CategoryBlock.vue';

import WidgetPostItem from '../Posts/WidgetPostItem.vue';
export default {
  components: {
    SearchBlock,
    SocialBlock,
    CategoryBlock,
    WidgetPostItem,
  },
  data() {
    return {
      recentPosts: {},
      isRecentLoading: false,
    };
  },
  methods: {
    async getRecent() {
      const response = await this.$axios.get('/api/recent');
      this.recentPosts = await response.data.data;

    },
  },
  computed: {
    // postsRecent() {
    //   if (!this.$store.getters['posts/getIsLoading']) {
    //     this.isRecentLoading = true;
    //     const posts = this.$store.getters['posts/getPosts'];
    //     this.isRecentLoading = false;
    //     const recent = posts.slice(0, 4);
    //     return recent.reverse();
    //   }
    // },
    isPostLoading() {
      return this.$store.getters['posts/getIsLoading'];
    },
  },
  mounted() {
    this.isRecentLoading = true;
    this.getRecent();
    this.isRecentLoading = false;
  },

}
</script>
