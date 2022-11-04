<template>
  <article v-if="!isLoading" class="widget-card">
    <div class="d-flex">
      <img class="card-img-sm" :src="'/images/posts/' + this.image" />
      <div class="ml-3">
        <h5>
          <router-link
            :to="{ name: 'single-post', params: { id: postId } }"
            class="post-title"
            >{{ title }}</router-link
          >
        </h5>
        <ul class="card-meta list-inline mb-0">
          <li class="list-inline-item mb-0">
            <i class="ti-calendar"></i>{{ date }}
          </li>
        </ul>
      </div>
    </div>
  </article>
  <h2 v-else>load</h2>
</template>

<script>
export default {
  props: ['postId', 'title', 'date', 'id', 'image'],
  data() {
    return {
      isLoading: false,
    }
  },
  computed: {
    isPostLoading() {
      this.isLoading = true;
      const status = this.$store.getters['posts/getIsLoading'];
      if (status) {
        return this.isLoading = true;
      } else {
        return this.isLoading = false;
      }
    },
  },

}
</script>
