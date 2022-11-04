<template>
  <div class="widget widget-categories">
    <h4 class="widget-title"><span>Categories</span></h4>
    <ul v-if="!isLoading" class="list-unstyled widget-list">
      <li v-for="cat in categories" :key="cat.id">
        <router-link
          :to="{ name: 'posts-by-category', params: { id: cat.id } }"
          class="d-flex"
          >{{ cat.name }}</router-link
        >
      </li>
    </ul>
  </div>
</template>

<script>
export default {

  computed: {
    isLoading() {
      return this.$store.getters['categories/getIsLoading'];
    },
    categories() {
      return this.$store.getters['categories/getCategories'];
    },
  },

}
</script>
